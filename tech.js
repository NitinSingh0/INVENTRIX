const registerButtons = document.querySelectorAll('.register-btn');

registerButtons.forEach(button => {
    button.addEventListener('click', () => {
        // Handle registration actions here (e.g., redirect to a registration page)
        alert('Registration button clicked!');
    });
});