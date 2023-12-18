
    //for the sweetalert
    document.addEventListener('DOMContentLoaded', function () {
        const loginForm = document.getElementById('passwordForm');
    
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();
    
            const formData = new FormData(this);
            const newPassword = formData.get('password');
            const confirmPassword = formData.get('password_confirmation');
        if (newPassword !== confirmPassword) {
            Swal.fire('New password and confirm password do not match.', '', 'error');
            return;
        }
    
            fetch('/change-password', {
                method: 'POST',
                body: formData
            })
             .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                Swal.fire('Password changed successfully.', '', 'success').then(() => {
                    window.location.href = '/login';
                });
            } else if (data.status === 'error') {
                Swal.fire('The provided old password is incorrect.', '', 'error');
            } else if (data.errors) {
                // Handle validation errors
                const errorMessages = Object.values(data.errors).join('<br>');
                Swal.fire({
                    icon: 'error',
                    html: errorMessages
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire('An error occurred', '', 'error');
        });
    });
}); 

    //for the show and hide password
    const togglePasswordButtons = document.querySelectorAll('.toggle-password');
    togglePasswordButtons.forEach(button => {
    button.addEventListener('click', () => {
        const inputId = button.previousElementSibling.id;
        const inputElement = document.getElementById(inputId);

        if (inputElement.type === 'password') {
            inputElement.type = 'text';
            button.classList.remove('fa-eye');
            button.classList.add('fa-eye-slash');
        } else {
            inputElement.type = 'password';
            button.classList.remove('fa-eye-slash');
            button.classList.add('fa-eye');
        }
    });
});
