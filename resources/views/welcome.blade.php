@extends('layouts.root')
@section('content')
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="">ADMINISTRATOR</a>
        <!-- Sidebar Toggle-->
        <button class="order-1 btn btn-link btn-sm order-lg-0 me-4 me-lg-0" id="sidebarToggle" href=""><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="my-2 d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <!--  <a class="nav-link" href="#">Static Navigation</a>
                                    <a class="nav-link" href="#">Light Sidenav</a> -->
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">

                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <!--<a class="nav-link" href="500.html">500 Page</a>-->
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Administrator
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="px-4 container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="w-50">
                            <h1 class="mt-4">Dashboard</h1>
                        </div>
                        <div class="w-50 text-end">
                            <button type="button" class="mt-4 btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addStudentModal">CREATE STUDENT</button>
                        </div>
                    </div>

                    <ol class="mb-4 breadcrumb">
                        <li class="breadcrumb-item active">Student Management System</li>
                    </ol>
                    <!--  allert from sucess -->
                    @if (session('success'))
                        <div id="successAlert" class="alert alert-success">
                            {{ session('success') }}
                        </div>

                        <script>
                            setTimeout(function() {
                                var alert = document.getElementById('successAlert');
                                alert.classList.add('fade-out');
                                alert.style.display = 'none';
                            }, 1500);
                        </script>
                    @endif
                    <!--  allert from sucess -->

                    <!--   model -->
                    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('students.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="studentName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="studentName" name="name"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="studentEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="studentEmail" name="email"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="studentImage" class="form-label">Image</label>
                                            <input type="file" class="form-control" id="studentImage" name="image"
                                                accept="image/*">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Student</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--   model -->

                    <!-- edit model -->

                    <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form id="editStudentForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div id="currentImage" class="mt-2 justify-content-center d-flex">
                                        <img src="" width="120px" height="120px" class="rounded-circle"
                                            alt="Current Image">
                                    </div>

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="editName">Name</label>
                                            <input type="text" name="name" id="editName" class="form-control"
                                                required>
                                        </div>

                                        <div class="mt-3 form-group">
                                            <label for="editEmail">Email</label>
                                            <input type="email" name="email" id="editEmail" class="form-control"
                                                required>
                                        </div>

                                        <div class="mt-3 form-group">
                                            <label for="editImage">Image</label>
                                            <input type="file" name="image" id="editImage" class="form-control">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update Student</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- edit model -->

                    <div class="mb-4 card">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="">
                            <table class="table" id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th style=" custom" scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student as $std)
                                        <tr>
                                            <th scope="row">{{ $std->id }}</th>
                                            <td>{{ $std->name }}</td>
                                            <td>{{ $std->email }}</td>
                                            <td class="d-flex justify-content-center align-items-center"
                                                style="height: 100px;">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    @if (!empty($std->image))
                                                        <img src="{{ asset('storage/' . $std->image) }}"
                                                            class="rounded-circle" width="80px" height="80px">
                                                    @else
                                                        <img src="{{ asset('images/images.png') }}" class="rounded-circle"
                                                            width="80px" height="80px">
                                                    @endif

                                                </div>
                                            </td>
                                            <td class="space-x-4 ">
                                                <div class="w-10 m-auto d-flex justify-content-center align-items-center ">
                                                    <button type="button" class=" btn btn-outline-warning btn-sm me-2"
                                                        onclick="openEditModal({{ $std }})"><i class="fa-solid fa-pen me-1"></i>Edit</button>
                                                    <form method="POST" action={{ route('students.delete', $std->id) }}>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class=" btn btn-outline-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this student?')"><i class="fa-solid fa-trash-can me-1"></i>Delete</button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 mt-auto bg-light">
                <div class="px-4 container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; LaravelCrudApp</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
