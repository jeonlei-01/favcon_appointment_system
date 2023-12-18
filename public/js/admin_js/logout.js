document.addEventListener('DOMContentLoaded', function () {
    const logoutForm = document.getElementById('logoutForm');

    logoutForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('/logout', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                Swal.fire('Successfully logged out', '', 'success').then(() => {
                    window.location.href = '/login';
                });
            } else {
                Swal.fire('Logout failed', '', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire('An error occurred', '', 'error');
        });
    });
});
