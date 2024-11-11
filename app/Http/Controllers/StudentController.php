<?php

namespace App\Http\Controllers;

use App\Models\Student;
//use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function storeStudent(Request $request ){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('images', $imageName, 'public');
        }

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Student added successfully.');
    }
    public function getStudent(){
        $student = Student::all();
        return view('/welcome',compact('student'));
    }
    public function editStudent($id){
        $studentData = Student::findOrFail($id);
        return view('student.edit',compact('studentData'));
    }
    public function updateStudent(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,'.$id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;

        if($request->hasFile('image')){
            if($student->image){
                Storage::disk('public')->delete($student->image);
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $student->image = $request->file('image')->storeAs('images', $imageName, 'public');
        }
        $student->save();
        return redirect()->route('dashboard')->with('success', 'Student updated successfully!');
    }

    public function deleteStudent($id){
        $student = Student::findOrFail($id);
        if($student->image){
            Storage::disk('public')->delete($student->image);
        }
        $student->delete();
        return redirect()->route('dashboard')->with('success', 'Student deleted successfully!');
    }
}
