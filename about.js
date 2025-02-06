// Initialize AOS
AOS.init({
    duration: 1000,
    once: true
});

// Mobile menu functionality
const mobileMenu = document.querySelector('.mobile-menu');
const nav = document.querySelector('nav ul');

mobileMenu.addEventListener('click', () => {
    nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
    mobileMenu.classList.toggle('active');
});

// Image slider functionality
const sliderWrapper = document.querySelector('.slider-wrapper');
const slides = document.querySelectorAll('.slider-wrapper img');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');

let currentSlide = 0;
const slideWidth = 100; // percentage

function updateSlider() {
    sliderWrapper.style.transform = `translateX(-${currentSlide * slideWidth}%)`;
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    updateSlider();
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    updateSlider();
}

prevBtn.addEventListener('click', prevSlide);
nextBtn.addEventListener('click', nextSlide);

// Auto-advance slides
setInterval(nextSlide, 5000);

// Smooth scroll for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Sticky header behavior
const header = document.querySelector('.sticky-header');
let lastScroll = 0;

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;
    
    if (currentScroll <= 0) {
        header.classList.remove('scroll-up');
        return;
    }
    
    if (currentScroll > lastScroll && !header.classList.contains('scroll-down')) {
        // Scrolling down
        header.classList.remove('scroll-up');
        header.classList.add('scroll-down');
    } else if (currentScroll < lastScroll && header.classList.contains('scroll-down')) {
        // Scrolling up
        header.classList.remove('scroll-down');
        header.classList.add('scroll-up');
    }
    lastScroll = currentScroll;
});