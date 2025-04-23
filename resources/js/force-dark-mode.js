document.addEventListener('DOMContentLoaded', () => {
    // Force dark mode
    localStorage.setItem('flux:appearance', 'dark');
    document.documentElement.classList.add('dark');
    // Prevent Flux from changing appearance
    window.addEventListener('storage', (event) => {
        if (event.key === 'flux:appearance' && event.newValue !== 'dark') {
            localStorage.setItem('flux:appearance', 'dark');
            document.documentElement.classList.add('dark');
        }
    });
});