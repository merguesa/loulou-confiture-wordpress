<?php
/**
 * Dark Mode Toggle Component - Fixed Position
 * 
 * @package LoulouTheme
 */
?>

<!-- Fixed Dark Mode Toggle -->
<div class="fixed bottom-6 right-6 z-50">
    <button id="theme-toggle" 
            type="button" 
            class="flex items-center justify-center w-12 h-12 rounded-full bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl dark:shadow-2xl transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-rose-500/50 hover:scale-110 transform"
            aria-label="Toggle dark mode">
        <!-- Sun icon (visible in dark mode) -->
        <svg id="theme-toggle-sun-icon" 
             class="w-6 h-6 text-yellow-500 hidden dark:block transition-transform duration-300" 
             fill="currentColor" 
             viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
        </svg>
        
        <!-- Moon icon (visible in light mode) -->
        <svg id="theme-toggle-moon-icon" 
             class="w-6 h-6 text-gray-700 block dark:hidden transition-transform duration-300" 
             fill="currentColor" 
             viewBox="0 0 20 20">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
        </svg>
    </button>
</div>

<script>
// Dark mode toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('theme-toggle');
    const html = document.documentElement;
    
    // Check for saved theme preference or default to 'light' mode
    const currentTheme = localStorage.getItem('theme') || 'light';
    
    // Apply the current theme
    if (currentTheme === 'dark') {
        html.classList.add('dark');
    } else {
        html.classList.remove('dark');
    }
    
    // Toggle theme when button is clicked
    themeToggle.addEventListener('click', function() {
        html.classList.toggle('dark');
        
        // Add a subtle animation on click
        themeToggle.style.transform = 'scale(0.95)';
        setTimeout(() => {
            themeToggle.style.transform = '';
        }, 150);
        
        // Save preference to localStorage
        if (html.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    });
    
    // Optional: Hide/show on scroll for better UX
    let lastScrollTop = 0;
    let isScrolling = false;
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Show button when scrolling up or at top
        if (scrollTop < lastScrollTop || scrollTop < 100) {
            themeToggle.style.opacity = '1';
            themeToggle.style.pointerEvents = 'auto';
        } 
        // Hide button when scrolling down (optional behavior)
        // Uncomment these lines if you want the button to hide when scrolling down
        /*
        else {
            themeToggle.style.opacity = '0.7';
        }
        */
        
        lastScrollTop = scrollTop;
    });
});
</script>