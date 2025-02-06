// JavaScript for Toggle Mobile Menu
const mobileMenu = document.querySelector('.mobile-menu');
const nav = document.querySelector('nav ul');

mobileMenu.addEventListener('click', () => {
    nav.classList.toggle('show-menu');
});


// Hero Section Image Slider
 // Change image every 3 seconds


document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});




const joinButton = document.querySelector('.join-us button');

joinButton.addEventListener('mouseover', () => {
    joinButton.classList.add('hovered');
});

joinButton.addEventListener('mouseout', () => {
    joinButton.classList.remove('hovered');
});

joinButton.addEventListener('click', () => {
    alert("Thank you for joining!");
});

const form = document.querySelector('form');
const email = document.querySelector('input[type="email"]');

form.addEventListener('submit', function (event) {
    if (!validateEmail(email.value)) {
        alert("Please enter a valid email address.");
        event.preventDefault();
    }
});

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}


const testimonials = document.querySelectorAll('.testimonial');
let testimonialIndex = 0;

function showTestimonial(index) {
    testimonials.forEach(t => t.style.display = 'none');
    testimonials[index].style.display = 'block';
}

function nextTestimonial() {
    testimonialIndex++;
    if (testimonialIndex >= testimonials.length) {
        testimonialIndex = 0;
    }
    showTestimonial(testimonialIndex);
}

setInterval(nextTestimonial, 5000);  // Change testimonial every 5 seconds
