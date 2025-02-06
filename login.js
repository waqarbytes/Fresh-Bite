document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const userType = document.getElementById('userType').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Reset error messages
    document.querySelectorAll('.error-message').forEach(elem => {
        elem.style.display = 'none';
    });

    // Validate form
    let isValid = true;

    if (!userType) {
        showError('userType', 'Please select a user type');
        isValid = false;
    }

    if (!email) {
        showError('email', 'Email is required');
        isValid = false;
    } else if (!isValidEmail(email)) {
        showError('email', 'Please enter a valid email');
        isValid = false;
    }

    if (!password) {
        showError('password', 'Password is required');
        isValid = false;
    }

    if (isValid) {
        // Simulate login success
        const button = document.querySelector('.login-btn');
        button.textContent = 'Logging in...';
        button.disabled = true;

        setTimeout(() => {
            alert(`Login successful as ${userType}!`);
            button.textContent = 'Login';
            button.disabled = false;
        }, 1500);
    }
});

function showError(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorElement = field.nextElementSibling;
    errorElement.textContent = message;
    errorElement.style.display = 'block';
}

function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}