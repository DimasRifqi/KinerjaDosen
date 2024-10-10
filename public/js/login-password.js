function togglePassword() {
    const passwordField = document.getElementById('password');
    const toggleIcon = document.getElementById('togglePasswordIcon');

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.remove('mdi-eye');
        toggleIcon.classList.add('mdi-eye-off');
    } else {
        passwordField.type = 'password';
        toggleIcon.classList.remove('mdi-eye-off');
        toggleIcon.classList.add('mdi-eye');
    }
}

