// const images = document.querySelectorAll('.slider-container img');
// let currentImage = 0;

// setInterval(() => {
//     images[currentImage].classList.remove('active');
//     currentImage = (currentImage + 1) % images.length;
//     images[currentImage].classList.add('active');
// }, 3000);
// Get necessary DOM elements
const sliderWrapper = document.querySelector('.slider-wrapper');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const images = sliderWrapper.querySelectorAll('img');

// Set initial position
let currentIndex = 0;
const totalImages = images.length;

// Function to move to next slide
function moveToNextSlide() {
    currentIndex = (currentIndex + 1) % totalImages;
    updateSlider();
}

// Function to move to previous slide
function moveToPrevSlide() {
    currentIndex = (currentIndex - 1 + totalImages) % totalImages;
    updateSlider();
}

// Function to update slider position
function updateSlider() {
    // Calculate the translation value based on current index
    const translateValue = -currentIndex * 100;
    sliderWrapper.style.transform = `translateX(${translateValue}%)`;
}

// Add event listeners to buttons
nextBtn.addEventListener('click', moveToNextSlide);
prevBtn.addEventListener('click', moveToPrevSlide);

// Optional: Auto-play functionality
function autoPlay() {
    setInterval(moveToNextSlide, 3000); // Move to next slide every 3 seconds
}

// Start auto-play
// autoPlay();

// Stop auto-play on hover
sliderContainer.addEventListener('mouseenter', () => {
    clearInterval(autoPlayInterval);
});

// Resume auto-play when mouse leaves
sliderContainer.addEventListener('mouseleave', () => {
    autoPlayInterval = setInterval(moveToNextSlide, 3000);
});

// Add touch support for mobile devices
let touchStartX = 0;
let touchEndX = 0;

sliderWrapper.addEventListener('touchstart', e => {
    touchStartX = e.changedTouches[0].screenX;
});

sliderWrapper.addEventListener('touchend', e => {
    touchEndX = e.changedTouches[0].screenX;
    if (touchStartX - touchEndX > 50) {
        moveToNextSlide();
    } else if (touchEndX - touchStartX > 50) {
        moveToPrevSlide();
    }
});