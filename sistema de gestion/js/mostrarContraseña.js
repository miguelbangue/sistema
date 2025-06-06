document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password-input');
    const togglePassword = document.querySelector('.toggle-password');
    const iconomostar = document.getElementById('icon-show');
    const iconocultar = document.getElementById('icon-hide');

    togglePassword.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            iconomostar.style.display = 'none';
            iconocultar.style.display = 'block';
        } else {
            passwordInput.type = 'password';
            iconomostar.style.display = 'block';
            iconocultar.style.display = 'none';
        }
    });
});