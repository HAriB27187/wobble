AOS.init({
    duration: 1000,
    once: true
});

// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
    
    // Back to top button
    const backToTop = document.querySelector('.back-to-top');
    if (window.scrollY > 300) {
        backToTop.classList.add('active');
    } else {
        backToTop.classList.remove('active');
    }
    
    // Reveal animation
    const reveals = document.querySelectorAll('.reveal');
    reveals.forEach(reveal => {
        const revealTop = reveal.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        const revealPoint = 150;
        
        if (revealTop < windowHeight - revealPoint) {
            reveal.classList.add('active');
        }
    });
});

// Back to top button click
document.querySelector('.back-to-top').addEventListener('click', function(e) {
    e.preventDefault();
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});


// Login/Logout dropdown functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap dropdowns
    var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
    var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
        return new bootstrap.Dropdown(dropdownToggleEl)
    })
    
    // Add animation to dropdown items
    const userDropdown = document.getElementById('userDropdown');
    if (userDropdown) {
        userDropdown.addEventListener('shown.bs.dropdown', function() {
            const dropdownItems = document.querySelectorAll('.dropdown-menu .dropdown-item');
            dropdownItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    item.style.transition = `all 0.3s ease ${index * 0.05}s`;
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 50);
            });
        });
    }
    
    // Add hover effect to login button
    const loginButton = document.querySelector('#authButtons .btn-primary');
    if (loginButton) {
        loginButton.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        loginButton.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    }
});