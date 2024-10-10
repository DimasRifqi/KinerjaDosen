function togglePassword(inputId, iconId) {
    const passwordField = document.getElementById(inputId);
    const toggleIcon = document.getElementById(iconId);

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
