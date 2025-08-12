document.addEventListener('DOMContentLoaded', function() {
    // Toggle sidebar on mobile
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');

    
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });
    }
    
    // Add delay to animations based on their data-delay attribute
    const animatedElements = document.querySelectorAll('[style*="--delay"]');
    
    animatedElements.forEach(element => {
        const delay = element.style.getPropertyValue('--delay');
        element.style.animationDelay = delay;
    });
    
    // Notification dropdown
    const notification = document.querySelector('.notification');
    const message = document.querySelector('.message');
    
    if (notification) {
        notification.addEventListener('click', function() {
            // In a real app, this would toggle a dropdown
            console.log('Notification clicked');
        });
    }
    
    if (message) {
        message.addEventListener('click', function() {
            // In a real app, this would toggle a dropdown
            console.log('Message clicked');
        });
    }
    
    // Course card hover effect
    const courseCards = document.querySelectorAll('.course-card');
    
    courseCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const banner = this.querySelector('.course-banner');
            banner.style.transform = 'scale(1.05)';
            banner.style.transition = 'transform 0.3s ease';
        });
        
        card.addEventListener('mouseleave', function() {
            const banner = this.querySelector('.course-banner');
            banner.style.transform = 'scale(1)';
        });
    });
    
    // Deadline item click
    const deadlineItems = document.querySelectorAll('.deadline-item');
    
    deadlineItems.forEach(item => {
        item.addEventListener('click', function(e) {
            if (!e.target.classList.contains('btn-action')) {
                console.log('Deadline item clicked:', this.querySelector('h3').textContent);
                // In a real app, this would navigate to the assignment
            }
        });
    });
    
    // Simulate progress animation on page load
    const progressBars = document.querySelectorAll('.progress-bar .progress');
    
    progressBars.forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0';
        setTimeout(() => {
            bar.style.width = width;
        }, 300);
    });
    
    // Add ripple effect to buttons
    const buttons = document.querySelectorAll('button:not(.menu-toggle)');
    
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const x = e.clientX - e.target.getBoundingClientRect().left;
            const y = e.clientY - e.target.getBoundingClientRect().top;
            
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 1000);
        });
    });
    
    // Simulate loading content
    setTimeout(() => {
        document.body.classList.add('loaded');
    }, 500);
});

// In a real app, you would add more functionality like:
// - Fetching real course data from an API
// - Handling user authentication
// - Implementing actual navigation
// - Adding form submissions

// Announcement Carousel Functionality
function initAnnouncementCarousel() {
    const carousel = document.querySelector('.announcement-carousel');
    const slides = document.querySelectorAll('.announcement-slide');
    const prevBtn = document.querySelector('.carousel-prev');
    const nextBtn = document.querySelector('.carousel-next');
    const indicatorsContainer = document.querySelector('.carousel-indicators');
    
    let currentIndex = 0;
    let autoSlideInterval;
    const slideInterval = 5000; // 5 seconds
    
    // Create indicators
    slides.forEach((_, index) => {
        const indicator = document.createElement('span');
        indicator.dataset.index = index;
        if (index === 0) indicator.classList.add('active');
        indicator.addEventListener('click', () => goToSlide(index));
        indicatorsContainer.appendChild(indicator);
    });
    
    const indicators = document.querySelectorAll('.carousel-indicators span');
    
    // Update slide position
    function updateSlidePosition() {
        slides.forEach((slide, index) => {
            slide.classList.remove('active', 'next', 'prev');
            
            if (index === currentIndex) {
                slide.classList.add('active');
            } else if (index === (currentIndex + 1) % slides.length) {
                slide.classList.add('next');
            } else if (index === (currentIndex - 1 + slides.length) % slides.length) {
                slide.classList.add('prev');
            }
        });
        
        // Update indicators
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === currentIndex);
        });
    }
    
    // Go to specific slide
    function goToSlide(index) {
        currentIndex = (index + slides.length) % slides.length;
        updateSlidePosition();
        resetAutoSlide();
    }
    
    // Next slide
    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSlidePosition();
        resetAutoSlide();
    }
    
    // Previous slide
    function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        updateSlidePosition();
        resetAutoSlide();
    }
    
    // Auto slide
    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, slideInterval);
    }
    
    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }
    
    // Event listeners
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
    
    // Touch events for mobile
    let touchStartX = 0;
    let touchEndX = 0;
    
    carousel.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    }, {passive: true});
    
    carousel.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, {passive: true});
    
    function handleSwipe() {
        const swipeThreshold = 50;
        
        if (touchEndX < touchStartX - swipeThreshold) {
            nextSlide();
        }
        
        if (touchEndX > touchStartX + swipeThreshold) {
            prevSlide();
        }
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') {
            nextSlide();
        } else if (e.key === 'ArrowLeft') {
            prevSlide();
        }
    });
    
    // Initialize
    updateSlidePosition();
    startAutoSlide();
    
    // Pause on hover
    carousel.addEventListener('mouseenter', () => {
        clearInterval(autoSlideInterval);
    });
    
    carousel.addEventListener('mouseleave', () => {
        startAutoSlide();
    });
}

// Initialize carousel when DOM is loaded
document.addEventListener('DOMContentLoaded', initAnnouncementCarousel);

// Enhanced Modal Controller
document.addEventListener('DOMContentLoaded', function() {
    const modalBackdrop = document.getElementById('modalBackdrop');
    const notificationBtn = document.getElementById('notificationBtn');
    const messageBtn = document.getElementById('messageBtn');
    const notificationModal = document.getElementById('notificationModal');
    const messageModal = document.getElementById('messageModal');
    const closeButtons = document.querySelectorAll('.close-modal');
    
    // Current active modal tracker
    let activeModal = null;
    
    // Open modal function
    function openModal(modal) {
        // Close any existing modal first
        if (activeModal) {
            closeModal(activeModal);
        }
        
        modal.classList.add('active');
        modalBackdrop.classList.add('active');
        document.body.style.overflow = 'hidden';
        activeModal = modal;
        
        // Add keyboard focus trap
        trapFocus(modal);
    }
    
    // Close modal function
    function closeModal(modal) {
        modal.classList.remove('active');
        modalBackdrop.classList.remove('active');
        document.body.style.overflow = '';
        activeModal = null;
    }
    
    // Focus trap for accessibility
    function trapFocus(modal) {
        const focusableElements = modal.querySelectorAll(
            'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
        );
        const firstElement = focusableElements[0];
        const lastElement = focusableElements[focusableElements.length - 1];
        
        if (firstElement) {
            firstElement.focus();
        }
        
        modal.addEventListener('keydown', function(e) {
            if (e.key === 'Tab') {
                if (e.shiftKey) {
                    if (document.activeElement === firstElement) {
                        lastElement.focus();
                        e.preventDefault();
                    }
                } else {
                    if (document.activeElement === lastElement) {
                        firstElement.focus();
                        e.preventDefault();
                    }
                }
            }
        });
    }
    
    // Notification modal
    if (notificationBtn && notificationModal) {
        notificationBtn.addEventListener('click', function() {
            openModal(notificationModal);
        });
    }
    
    // Message modal
    if (messageBtn && messageModal) {
        messageBtn.addEventListener('click', function() {
            openModal(messageModal);
        });
    }
    
    // Close buttons
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const modal = this.closest('.notification-modal, .message-modal');
            if (modal) {
                closeModal(modal);
            }
        });
    });
    
    // Close when clicking backdrop
    modalBackdrop.addEventListener('click', function() {
        if (activeModal) {
            closeModal(activeModal);
        }
    });
    
    // Close with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && activeModal) {
            closeModal(activeModal);
        }
    });
    
    // Mark all as read functionality
    const markAllReadBtn = document.querySelector('.mark-all-read');
    if (markAllReadBtn) {
        markAllReadBtn.addEventListener('click', function() {
            const unreadItems = document.querySelectorAll('.notification-item.unread, .message-item.unread');
            const badgeElements = document.querySelectorAll('.badge');
            
            unreadItems.forEach(item => {
                item.classList.remove('unread');
            });
            
            badgeElements.forEach(badge => {
                badge.textContent = '0';
            });
            
            // Visual feedback
            this.textContent = 'Marked!';
            setTimeout(() => {
                this.textContent = 'Mark all as read';
            }, 2000);
        });
    }
});

// Theme Toggle Functionality
document.addEventListener('DOMContentLoaded', function() {
    const themeToggle = document.getElementById('themeToggle');
    const html = document.documentElement;
    
    // Check for saved theme preference or use system preference
    const savedTheme = localStorage.getItem('theme');
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    // Apply initial theme
    if (savedTheme) {
        html.setAttribute('data-theme', savedTheme);
    } else {
        html.setAttribute('data-theme', systemPrefersDark ? 'dark' : 'light');
    }
    
    // Prevent flash of unstyled content
    html.style.visibility = 'visible';
    
    // Toggle theme
    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            
            // Dispatch event for other components to listen to
            document.dispatchEvent(new CustomEvent('themeChanged', { detail: newTheme }));
        });
    }
    
    // Listen for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        if (!localStorage.getItem('theme')) {
            html.setAttribute('data-theme', e.matches ? 'dark' : 'light');
        }
    });
});

// Sidebar Initialization with Flash Prevention
document.addEventListener('DOMContentLoaded', function() {
  // Apply theme before anything renders
  const initializeTheme = () => {
    const html = document.documentElement;
    const savedTheme = localStorage.getItem('theme') || 
                      (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
    
    // Apply theme synchronously
    html.setAttribute('data-theme', savedTheme);
    
    // Remove critical CSS after initial render
    const initialStyles = document.getElementById('initial-styles');
    if (initialStyles) {
      setTimeout(() => initialStyles.remove(), 100);
    }
    
    // Now safe to show content
    html.style.visibility = 'visible';
  };

  // Initialize sidebar state
  const initializeSidebar = () => {
    const sidebar = document.querySelector('.sidebar');
    const menuToggle = document.getElementById('menuToggle');
    const savedState = localStorage.getItem('sidebarCollapsed');
    
    if (savedState === 'true' && window.innerWidth > 1200) {
      sidebar.classList.add('collapsed');
      if (menuToggle) menuToggle.setAttribute('aria-expanded', 'true');
    }
    
    // Add transitions after initial render
    setTimeout(() => {
      sidebar.style.transition = 'transform 0.3s ease, width 0.3s ease';
    }, 50);
  };

  // Call initialization functions
  initializeTheme();
  initializeSidebar();

  // Enhanced menu toggle functionality
  const menuToggle = document.getElementById('menuToggle');
  if (menuToggle) {
    menuToggle.addEventListener('click', function() {
      const sidebar = document.querySelector('.sidebar');
      sidebar.classList.toggle('collapsed');
      localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
      
      // Force synchronous layout update
      sidebar.offsetHeight;
    });
  }
});


