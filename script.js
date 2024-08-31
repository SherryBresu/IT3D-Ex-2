const toggleButton = document.getElementById('mode-toggle');

// Function to toggle between light and dark modes
toggleButton.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');

    // Save the user's theme preference to localStorage
    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('theme', 'dark');
        toggleButton.textContent = 'Light Mode';
    } else {
        localStorage.setItem('theme', 'light');
        toggleButton.textContent = 'Dark Mode';
    }
});

// Load the user's preference on page load
const currentTheme = localStorage.getItem('theme');
if (currentTheme === 'dark') {
    document.body.classList.add('dark-mode');
    toggleButton.textContent = 'Light Mode';
} else {
    toggleButton.textContent = 'Dark Mode';
}
