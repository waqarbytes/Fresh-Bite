document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signupForm');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const togglePasswordBtn = document.querySelector('.toggle-password');

    // Toggle password visibility
    togglePasswordBtn.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        confirmPasswordInput.setAttribute('type', type);
        
        // Update icon based on password visibility
        const svg = this.querySelector('svg');
        if (type === 'password') {
            svg.innerHTML = '<path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>';
        } else {
            svg.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-10-7-10-7a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 10 7 10 7a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
        }
    });

    // Form validation
    form.addEventListener('submit', function(e) {
        let isValid = true;
        const email = document.getElementById('email').value;
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;
        const terms = document.getElementById('terms').checked;

        // Reset error messages
        document.querySelectorAll('.error-message').forEach(error => {
            error.textContent = '';
        });

        // Email validation
        if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
            showError('email', 'Please enter a valid email address');
            isValid = false;
        }


        // Password validation
        if (password.length < 8) {
            showError('password', 'Password must be at least 8 characters long');
            isValid = false;
        }

        // Confirm password validation
        if (password !== confirmPassword) {
            showError('confirmPassword', 'Passwords do not match');
            isValid = false;
        }

        // Terms validation
        if (!terms) {
            showError('terms', 'You must agree to the terms and conditions');
            isValid = false;
        }

        // Prevent form submission if validation fails
        if (!isValid) {
            e.preventDefault();
        }
    });

    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const errorElement = field.nextElementSibling;
        if (errorElement && errorElement.classList.contains('error-message')) {
            errorElement.textContent = message;
        }
    }
});