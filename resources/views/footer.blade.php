<footer class="bg-dark text-white " style="margin-top: 400px">
    <div class="container py-3 ">
        <div class="text-center">
            <p>&copy; 2023 Farm Management System. All rights reserved.</p>
            <p>Designed and developed by Peter Chisanga MWAMBA</p>
        </div>
    </div>
</footer>
<script>
    function confirmDelete(pigId) {
        if (confirm('Are you sure you want to delete this animal?')) {
            document.getElementById('deleteForm' + pigId).submit();
        }
    }
</script>