// Smooth scroll for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Service card hover animation
const serviceCards = document.querySelectorAll('.service-card');
serviceCards.forEach(card => {
    card.addEventListener('mouseenter', () => {
        card.querySelector('.service-icon').style.transform = 'scale(1.1) rotate(5deg)';
    });
    
    card.addEventListener('mouseleave', () => {
        card.querySelector('.service-icon').style.transform = 'scale(1) rotate(0)';
    });
});

// Book service button click handler
// document.querySelectorAll('.book-service').forEach(button => {
//     button.addEventListener('click', function() {
//         const service = this.parentElement.querySelector('h2').textContent;
//         alert(`Thank you for your interest in our ${service} service! We'll contact you shortly.`);
//     });
// });

// CTA button animation
const ctaButton = document.querySelector('.cta-button');
ctaButton.addEventListener('click', () => {
    ctaButton.style.transform = 'scale(0.95)';
    setTimeout(() => {
        ctaButton.style.transform = 'scale(1)';
    }, 200);
});