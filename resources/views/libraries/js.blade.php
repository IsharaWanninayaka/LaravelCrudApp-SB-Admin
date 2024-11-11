<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    function openEditModal(student) {

        document.getElementById('editStudentForm').action = `/student/update/${student.id}`;

        document.getElementById('editName').value = student.name;
        document.getElementById('editEmail').value = student.email;

        const currentImage = document.getElementById('currentImage').querySelector('img');
        currentImage.src = student.image ? `/storage/${student.image}` : '/images/images.png';

        const editStudentModal = new bootstrap.Modal(document.getElementById('editStudentModal'));
        editStudentModal.show();
    }
</script>
