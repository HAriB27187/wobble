document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS library for scroll animations
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true
        });
    }

    // Floating drone animation
    animateDrone();

    // Initialize form validation
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    if (loginForm) {
        loginForm.addEventListener('submit', handleLoginSubmit);
    }

    if (registerForm) {
        registerForm.addEventListener('submit', handleRegisterSubmit);
        
        // Set up password strength meter
        const passwordInput = document.getElementById('password');
        if (passwordInput) {
            passwordInput.addEventListener('input', checkPasswordStrength);
        }

        // Set up password confirmation validation
        const confirmPasswordInput = document.getElementById('confirmPassword');
        if (confirmPasswordInput) {
            confirmPasswordInput.addEventListener('input', validatePasswordMatch);
        }
    }

    // Create tech particle animation
    createTechParticles();
});

// Handle login form submission
function handleLoginSubmit(e) {
    e.preventDefault();
    
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const rememberInput = document.getElementById('remember');
    const submitBtn = e.target.querySelector('.btn-auth');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoader = submitBtn.querySelector('.btn-loader');
    const authMessage = document.getElementById('authMessage');
    
    // Simple validation
    if (!isValidEmail(emailInput.value)) {
        showMessage('Please enter a valid email address', 'error');
        return;
    }
    
    if (passwordInput.value.length < 6) {
        showMessage('Password must be at least 6 characters', 'error');
        return;
    }
    
    // Show loading state
    btnText.classList.add('d-none');
    btnLoader.classList.remove('d-none');
    submitBtn.disabled = true;
    
    // Create form data
    const formData = new FormData();
    formData.append('email', emailInput.value);
    formData.append('password', passwordInput.value);
    if (rememberInput && rememberInput.checked) {
        formData.append('remember', '1');
    }
    
    // Send AJAX request
    fetch('login_process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Reset button state
        btnText.classList.remove('d-none');
        btnLoader.classList.add('d-none');
        submitBtn.disabled = false;
        
        // Show response message
        showMessage(data.message, data.status);
        
        // If login successful, redirect
        if (data.status === 'success') {
            setTimeout(() => {
                window.location.href = 'Homes.php';
            }, 1500);
        }
    })
    .catch(error => {
        // Reset button state
        btnText.classList.remove('d-none');
        btnLoader.classList.add('d-none');
        submitBtn.disabled = false;
        
        // Show error message
        showMessage('An error occurred. Please try again.', 'error');
        console.error('Error:', error);
    });
}

// Handle register form submission
function handleRegisterSubmit(e) {
    e.preventDefault();
    
    const firstNameInput = document.getElementById('firstName');
    const lastNameInput = document.getElementById('lastName');
    const emailInput = document.getElementById('email');
    const phoneInput = document.getElementById('phone');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const agreeTerms = document.getElementById('agreeTerms');
    const submitBtn = e.target.querySelector('.btn-auth');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoader = submitBtn.querySelector('.btn-loader');
    
    // Validation
    if (firstNameInput.value.trim() === '') {
        showMessage('Please enter your first name', 'error');
        return;
    }
    
    if (lastNameInput.value.trim() === '') {
        showMessage('Please enter your last name', 'error');
        return;
    }
    
    if (!isValidEmail(emailInput.value)) {
        showMessage('Please enter a valid email address', 'error');
        return;
    }
    
    if (phoneInput.value.trim() !== '' && !isValidPhone(phoneInput.value)) {
        showMessage('Please enter a valid phone number', 'error');
        return;
    }
    
    if (getPasswordStrength(passwordInput.value) < 2) {
        showMessage('Your password is too weak', 'error');
        return;
    }
    
    if (passwordInput.value !== confirmPasswordInput.value) {
        showMessage('Passwords do not match', 'error');
        return;
    }
    
    if (!agreeTerms.checked) {
        showMessage('You must agree to the terms and conditions', 'error');
        return;
    }
    
    // Show loading state
    btnText.classList.add('d-none');
    btnLoader.classList.remove('d-none');
    submitBtn.disabled = true;
    
    // Create form data
    const formData = new FormData();
    formData.append('firstName', firstNameInput.value);
    formData.append('lastName', lastNameInput.value);
    formData.append('email', emailInput.value);
    formData.append('phone', phoneInput.value);
    formData.append('password', passwordInput.value);
    formData.append('confirmPassword', confirmPasswordInput.value);
    if (agreeTerms.checked) {
        formData.append('agreeTerms', '1');
    }
    
    // Send AJAX request
    fetch('register_process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Reset button state
        btnText.classList.remove('d-none');
        btnLoader.classList.add('d-none');
        submitBtn.disabled = false;
        
        // Show response message
        showMessage(data.message, data.status);
        
        // If registration successful, redirect
        if (data.status === 'success') {
            setTimeout(() => {
                window.location.href = 'login.html';
            }, 1500);
        }
    })
    .catch(error => {
        // Reset button state
        btnText.classList.remove('d-none');
        btnLoader.classList.add('d-none');
        submitBtn.disabled = false;
        
        // Show error message
        showMessage('An error occurred. Please try again.', 'error');
        console.error('Error:', error);
    });
}

// Toggle password visibility
function togglePassword(inputId = 'password') {
    const passwordInput = document.getElementById(inputId);
    const icon = event.currentTarget.querySelector('i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Check password strength
function checkPasswordStrength() {
    const password = document.getElementById('password').value;
    const strength = getPasswordStrength(password);
    const strengthText = document.getElementById('passwordStrength');
    const bars = [
        document.getElementById('bar1'),
        document.getElementById('bar2'),
        document.getElementById('bar3'),
        document.getElementById('bar4')
    ];
    
    // Reset all bars
    bars.forEach(bar => {
        bar.className = 'bar-segment';
    });
    
    let strengthLabel = '';
    let barColor = '';
    
    switch(strength) {
        case 0:
            strengthLabel = 'weak';
            barColor = 'bg-danger';
            for (let i = 0; i < 1; i++) {
                bars[i].classList.add(barColor);
            }
            break;
        case 1:
            strengthLabel = 'fair';
            barColor = 'bg-warning';
            for (let i = 0; i < 2; i++) {
                bars[i].classList.add(barColor);
            }
            break;
        case 2:
            strengthLabel = 'good';
            barColor = 'bg-info';
            for (let i = 0; i < 3; i++) {
                bars[i].classList.add(barColor);
            }
            break;
        case 3:
            strengthLabel = 'strong';
            barColor = 'bg-success';
            for (let i = 0; i < 4; i++) {
                bars[i].classList.add(barColor);
            }
            break;
    }
    
    if (strengthText) {
        strengthText.innerHTML = `Password strength: <span class="text-${barColor.substring(3)}">${strengthLabel}</span>`;
    }
}

// Calculate password strength (0-3)
function getPasswordStrength(password) {
    let strength = 0;
    
    if (password.length >= 8) strength++;
    if (/[A-Z]/.test(password) && /[a-z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;
    
    return Math.min(Math.floor(strength * 3 / 4), 3);
}

// Validate password match
function validatePasswordMatch() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const confirmInput = document.getElementById('confirmPassword');
    
    if (password !== confirmPassword) {
        confirmInput.classList.add('is-invalid');
        if (!confirmInput.nextElementSibling || !confirmInput.nextElementSibling.classList.contains('invalid-feedback')) {
            const feedback = document.createElement('div');
            feedback.classList.add('invalid-feedback');
            feedback.innerText = 'Passwords do not match';
            confirmInput.parentNode.appendChild(feedback);
        }
    } else {
        confirmInput.classList.remove('is-invalid');
        if (confirmInput.nextElementSibling && confirmInput.nextElementSibling.classList.contains('invalid-feedback')) {
            confirmInput.nextElementSibling.remove();
        }
    }
}

// Email validation
function isValidEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

// Phone validation
function isValidPhone(phone) {
    const re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
    return re.test(String(phone));
}

// Display messages
function showMessage(message, type = 'info') {
    const messageElement = document.getElementById('authMessage');
    if (!messageElement) return;
    
    // Remove existing message classes
    messageElement.className = 'auth-status-message';
    
    // Add appropriate class based on message type
    switch(type) {
        case 'success':
            messageElement.classList.add('alert', 'alert-success');
            break;
        case 'error':
            messageElement.classList.add('alert', 'alert-danger');
            break;
        case 'warning':
            messageElement.classList.add('alert', 'alert-warning');
            break;
        default:
            messageElement.classList.add('alert', 'alert-info');
    }
    
    messageElement.innerHTML = message;
    messageElement.style.display = 'block';
    
    // Auto-hide success and info messages after 5 seconds
    if (type === 'success' || type === 'info') {
        setTimeout(() => {
            messageElement.style.opacity = '0';
            setTimeout(() => {
                messageElement.style.display = 'none';
                messageElement.style.opacity = '1';
            }, 500);
        }, 5000);
    }
}

// Animate floating drone
function animateDrone() {
    const drone = document.querySelector('.floating-drone');
    if (!drone) return;
    
    let position = 0;
    const amplitude = 10; // How high/low the drone floats
    const speed = 0.05; // Speed of the floating effect
    
    function animate() {
        position += speed;
        const newY = Math.sin(position) * amplitude;
        
        drone.style.transform = `translateY(${newY}px)`;
        requestAnimationFrame(animate);
    }
    
    animate();
}

// Create tech particle animation
function createTechParticles() {
    const container = document.querySelector('.tech-particles');
    if (!container) return;
    
    const particleCount = 30;
    
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.classList.add('particle');
        
        // Random size between 2px and 6px
        const size = Math.floor(Math.random() * 5) + 2;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        
        // Random position
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 100}%`;
        
        // Random animation duration between 10s and 20s
        const duration = Math.floor(Math.random() * 10) + 10;
        particle.style.animationDuration = `${duration}s`;
        
        // Random animation delay
        particle.style.animationDelay = `${Math.random() * 5}s`;
        
        container.appendChild(particle);
    }
}