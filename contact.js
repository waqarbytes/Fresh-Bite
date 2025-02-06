document.getElementById('contactForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = {
        firstName: document.getElementById('firstName').value,
        lastName: document.getElementById('lastName').value,
        email: document.getElementById('email').value,
        subject: document.getElementById('subject').value,
        message: document.getElementById('message').value
    };

    // Animate submit button
    const submitBtn = document.querySelector('.submit-btn');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
    submitBtn.disabled = true;

    // Simulate form submission
    setTimeout(() => {
        // Show success message
        submitBtn.innerHTML = '<i class="fas fa-check"></i> Message Sent!';
        submitBtn.style.backgroundColor = 'var(--success-color)';

        // Reset form
        setTimeout(() => {
            document.getElementById('contactForm').reset();
            submitBtn.innerHTML = originalText;
            submitBtn.style.backgroundColor = '';
            submitBtn.disabled = false;
        }, 2000);
    }, 1500);
});

// Floating label animation
const inputs = document.querySelectorAll('.input-group input, .input-group textarea');
inputs.forEach(input => {
    input.addEventListener('focus', () => {
        input.parentElement.classList.add('focused');
    });

    input.addEventListener('blur', () => {
        if (!input.value) {
            input.parentElement.classList.remove('focused');
        }
    });
});