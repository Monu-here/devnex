<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<script>
    @if (session('message'))
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'success',
                text: '{{ session('message') }}',
                confirmButtonText: 'OK'
            });
        });
    @endif
    @if (session('error'))
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'error',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        });
    @endif
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
    document.getElementById('form').addEventListener('submit', function(event) {
        event.preventDefault();
        var saveBtn = document.getElementById('saveBtn');

        saveBtn.disabled = true;
        saveBtn.innerHTML = 'Please wait...';

        setTimeout(function() {
            event.target.submit();
        }, 2000);
    });
    
</script>
