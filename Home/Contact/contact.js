AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true
});

// Form validation and submission
function validateForm(event) {
    event.preventDefault();
    
    // Get form values
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const subject = document.getElementById('subject').value;
    const message = document.getElementById('message').value;
    
    // Simple validation
    if (name.trim() === '' || email.trim() === '' || subject.trim() === '' || message.trim() === '') {
        showMessage('Please fill in all fields.', false);
        return false;
    }
    
    // Email validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        showMessage('Please enter a valid email address.', false);
        return false;
    }
    
    // Show success message
    showMessage('Message sent successfully! We will contact you soon.', true);
    
    // Reset form
    document.getElementById('contactForm').reset();
    
    return false;
}

function showMessage(text, isSuccess) {
    const messageElement = document.getElementById('formMessage');
    messageElement.textContent = text;
    messageElement.style.display = 'block';
    
    if (isSuccess) {
        messageElement.className = 'form-submit-message success';
        messageElement.classList.add('pulse');
    } else {
        messageElement.className = 'form-submit-message';
        messageElement.style.backgroundColor = 'rgba(231, 76, 60, 0.1)';
        messageElement.style.color = '#e74c3c';
        messageElement.style.border = '1px solid #e74c3c';
    }
    
    // Hide message after 5 seconds
    setTimeout(() => {
        messageElement.style.display = 'none';
    }, 5000);
}