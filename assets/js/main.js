/**
 * Doctor's Clinic Theme - Main JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Mobile menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const primaryMenu = document.querySelector('#primary-menu');
    
    if (menuToggle && primaryMenu) {
        menuToggle.addEventListener('click', function() {
            primaryMenu.classList.toggle('show');
            const isExpanded = primaryMenu.classList.contains('show');
            menuToggle.setAttribute('aria-expanded', isExpanded);
        });
    }
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href === '#') return;
            
            if (href.startsWith('#') && document.querySelector(href)) {
                e.preventDefault();
                const targetElement = document.querySelector(href);
                const headerHeight = document.querySelector('.site-header').offsetHeight;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Update URL without scrolling
                history.pushState(null, null, href);
            }
        });
    });
    
    // Add current year to copyright
    const copyrightElement = document.querySelector('.footer-bottom p');
    if (copyrightElement) {
        const currentYear = new Date().getFullYear();
        copyrightElement.innerHTML = copyrightElement.innerHTML.replace('2024', currentYear);
    }
    
    // Form validation for search form
    const searchForm = document.querySelector('.search-form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            const searchInput = this.querySelector('input[type="search"]');
            if (searchInput && searchInput.value.trim() === '') {
                e.preventDefault();
                searchInput.focus();
                searchInput.style.borderColor = '#ff4444';
                setTimeout(() => {
                    searchInput.style.borderColor = '';
                }, 2000);
            }
        });
    }
    
    // Add focus styles for keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Tab') {
            document.body.classList.add('keyboard-navigation');
        }
    });
    
    document.addEventListener('mousedown', function() {
        document.body.classList.remove('keyboard-navigation');
    });
    
    // Service cards hover effect enhancement
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.3s ease';
        });
    });
    
    // Emergency info highlight
    const emergencyWidget = document.querySelector('.widget:first-child');
    if (emergencyWidget) {
        emergencyWidget.style.borderLeft = '4px solid #ff4444';
        emergencyWidget.style.paddingLeft = '1rem';
    }
    
    // Make external links open in new tab
    document.querySelectorAll('a').forEach(link => {
        if (link.hostname !== window.location.hostname) {
            link.setAttribute('target', '_blank');
            link.setAttribute('rel', 'noopener noreferrer');
        }
    });
});