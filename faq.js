// Initialize FAQ functionality
document.addEventListener('DOMContentLoaded', function() {
    // Set current year in footer
    document.getElementById('current-year').textContent = new Date().getFullYear();

    // Add click handlers to FAQ questions
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            // Toggle active state of question
            const isActive = question.classList.contains('active');
            
            // Close all other questions
            faqQuestions.forEach(q => {
                q.classList.remove('active');
                const answer = q.nextElementSibling;
                answer.classList.remove('active');
            });
            
            // Toggle current question if it wasn't active
            if (!isActive) {
                question.classList.add('active');
                const answer = question.nextElementSibling;
                answer.classList.add('active');
            }
        });
    });

    
    
});