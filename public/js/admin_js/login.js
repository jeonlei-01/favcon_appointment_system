document.addEventListener('DOMContentLoaded', function () {
        const loginForm = document.getElementById('login-form');
    
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
    
            fetch('/login', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {

                    Swal.fire('Successfully logged in', '', 'success').then(() => {
                        window.location.href = '/admin-dashboard';
                    });
                } else {
                    Swal.fire('Invalid login credentials', '', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('An error occurred', '', 'error');
            });
        });
    });
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
