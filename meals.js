document.addEventListener('DOMContentLoaded', function () {
    // Handle attendance marking
    const attendanceBtns = document.querySelectorAll('.attendance-btn');
    attendanceBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const meal = this.dataset.meal;
            markAttendance(meal);
        });
    });

    // Handle menu editing (for wardens)
    const editMenuModal = document.getElementById('editMenuModal');
    if (editMenuModal) {
        window.openEditMenu = function () {
            editMenuModal.style.display = 'block';
            populateEditForm();
        };

        // Close modal when clicking outside
        window.addEventListener('click', function (event) {
            if (event.target === editMenuModal) {
                editMenuModal.style.display = 'none';
            }
        });
    }
});

function markAttendance(meal) {
    // In a real application, this would make an API call
    const btn = document.querySelector(`[data-meal="${meal}"]`);
    btn.textContent = 'Marked ✓';
    btn.disabled = true;
    btn.style.background = '#48BB78';
}

function populateEditForm() {
    // This would typically fetch the current menu from the server
    const form = document.getElementById('editMenuForm');
    const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    const meals = ['breakfast', 'lunch', 'dinner'];

    let html = '';
    days.forEach(day => {
        html += `<div class="day-edit">
            <h3>${day}</h3>
            ${meals.map(meal => `
                <div class="meal-edit">
                    <label for="${day.toLowerCase()}-${meal}">
                        ${meal.charAt(0).toUpperCase() + meal.slice(1)}:
                    </label>
                    <input type="text" 
                           id="${day.toLowerCase()}-${meal}"
                           name="${day.toLowerCase()}-${meal}"
                           required>
                </div>
            `).join('')}
        </div>`;
    });

    html += `<div class="form-actions">
        <button type="submit" class="primary-btn">Save Changes</button>
        <button type="button" class="secondary-btn" onclick="document.getElementById('editMenuModal').style.display='none'">Cancel</button>
    </div>`;

    form.innerHTML = html;

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        // In a real application, this would save to the server
        alert('Menu updated successfully!');
        document.getElementById('editMenuModal').style.display = 'none';
    });
}