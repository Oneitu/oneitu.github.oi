document.addEventListener('DOMContentLoaded', function() {
    // Form elements
    const loginForm = document.getElementById('loginForm');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const togglePassword = document.querySelector('.toggle-password');
    const loginBtn = document.querySelector('.login-btn');
    const btnText = document.querySelector('.btn-text');
    const btnLoader = document.querySelector('.btn-loader');
    const errorMessage = document.querySelector('.error-message');
    const loginContainer = document.querySelector('.login-container');
    const welcomeContainer = document.querySelector('.welcome-container');
    const loadingProgress = document.querySelector('.loading-progress');

    // Toggle password visibility
    togglePassword.addEventListener('click', function() {
        const icon = this.querySelector('i');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    // Form submission
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Simulate loading
        btnText.classList.add('hidden');
        btnLoader.classList.remove('hidden');
        loginBtn.disabled = true;
        
        // Simulate API call
        setTimeout(function() {
            const username = usernameInput.value.trim();
            const password = passwordInput.value.trim();
            
            // Simple validation (in a real app, this would be an API call)
            if (username === 'admin' && password === 'password') {
                // Successful login
                btnLoader.classList.add('hidden');
                loginContainer.classList.add('hidden');
                welcomeContainer.classList.remove('hidden');
                
                // Animate the success check
                document.querySelector('.success-circle').style.animation = 'stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards';
                document.querySelector('.success-check').style.animation = 'stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.6s forwards';
                
                // Animate loading bar
                let width = 0;
                const interval = setInterval(function() {
                    if (width >= 100) {
                        clearInterval(interval);
                        // In a real app, redirect to dashboard
                        console.log('Redirecting to dashboard...');
                    } else {
                        width += 2;
                        loadingProgress.style.width = width + '%';
                    }
                }, 30);
            } else {
                // Failed login
                showError();
            }
        }, 1500);
    });

    function showError() {
        // Show error message with animation
        errorMessage.classList.remove('hidden');
        errorMessage.style.animation = 'none';
        void errorMessage.offsetWidth; // Trigger reflow
        errorMessage.style.animation = 'shake 0.5s cubic-bezier(0.36, 0.07, 0.19, 0.97) both';
        
        // Reset form
        btnText.classList.remove('hidden');
        btnLoader.classList.add('hidden');
        loginBtn.disabled = false;
        
        // Highlight error fields
        usernameInput.style.borderColor = 'var(--error-color)';
        passwordInput.style.borderColor = 'var(--error-color)';
        
        setTimeout(function() {
            usernameInput.style.borderColor = '';
            passwordInput.style.borderColor = '';
        }, 2000);
    }

    // Input field animations on focus
    const inputGroups = document.querySelectorAll('.input-group');
    inputGroups.forEach(group => {
        const input = group.querySelector('input');
        const label = group.querySelector('label');
        
        input.addEventListener('focus', function() {
            label.style.color = 'var(--primary-color)';
        });
        
        input.addEventListener('blur', function() {
            if (!input.value) {
                label.style.color = 'var(--dark-gray)';
            }
        });
    });

    // Social icon hover effects
    const socialIcons = document.querySelectorAll('.social-icon');
    socialIcons.forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            const tooltip = this.querySelector('.tooltip');
            tooltip.style.opacity = '1';
            tooltip.style.visibility = 'visible';
        });
        
        icon.addEventListener('mouseleave', function() {
            const tooltip = this.querySelector('.tooltip');
            tooltip.style.opacity = '0';
            tooltip.style.visibility = 'hidden';
        });
    });
});