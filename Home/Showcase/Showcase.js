const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const tabId = tab.getAttribute('data-tab');
                
                // Remove active class from all tabs and contents
                tabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                
                // Add active class to current tab and content
                tab.classList.add('active');
                document.getElementById(`${tabId}-content`).classList.add('active');
            });
        });
        
        // Gallery Filtering
        const filterButtons = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const filter = button.getAttribute('data-filter');
                
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to current button
                button.classList.add('active');
                
                // Filter gallery items
                galleryItems.forEach(item => {
                    const category = item.getAttribute('data-category');
                    
                    if (filter === 'all' || filter === category) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
        
        // Testimonial Slider
        const dots = document.querySelectorAll('.dot');
        const testimonials = document.querySelectorAll('.testimonial-card');
        
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                // Hide all testimonials
                testimonials.forEach(testimonial => {
                    testimonial.style.display = 'none';
                });
                
                // Remove active class from all dots
                dots.forEach(d => d.classList.remove('active'));
                
                // Show selected testimonial and activate dot
                testimonials[index].style.display = 'block';
                dot.classList.add('active');
            });
        });
        
        // Initialize by showing first testimonial
        testimonials.forEach((testimonial, index) => {
            testimonial.style.display = index === 0 ? 'block' : 'none';
        });
        
        // Animation on scroll
        function animateOnScroll() {
            const elements = document.querySelectorAll('.drone-card, .gallery-item, .testimonial-card');
            
            elements.forEach(element => {
                const position = element.getBoundingClientRect();
                
                // If element is in viewport
                if(position.top < window.innerHeight && position.bottom >= 0) {
                    element.style.animation = 'fadeIn 0.5s ease-out forwards';
                }
            });
        }
        
        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);