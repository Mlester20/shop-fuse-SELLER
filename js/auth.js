/**
 * Authentication Component - Interactive Features
 * Handles: Tab switching, password visibility, form validation, password strength
 */

(function () {
    'use strict';

    // DOM Elements
    const tabSwitchers = document.querySelectorAll('.tab-switch');
    const authCards = document.querySelectorAll('.auth-card');
    const passwordToggles = document.querySelectorAll('.password-toggle');
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');

    /**
     * Tab Switching Functionality
     * Smoothly switches between login and register cards
     */
    function initTabSwitching() {
        tabSwitchers.forEach(switcher => {
            switcher.addEventListener('click', (e) => {
                e.preventDefault();
                const targetTab = switcher.dataset.target;
                
                // Hide all cards
                authCards.forEach(card => {
                    card.classList.add('hidden');
                    card.classList.remove('active');
                });

                // Show target card
                const targetCard = document.getElementById(`${targetTab}-card`);
                if (targetCard) {
                    targetCard.classList.remove('hidden');
                    targetCard.classList.add('active');
                    
                    // Focus on first input field
                    const firstInput = targetCard.querySelector('input');
                    if (firstInput) {
                        setTimeout(() => firstInput.focus(), 100);
                    }
                }
            });
        });
    }

    /**
     * Password Visibility Toggle
     * Shows/hides password input and toggles eye icon
     */
    function initPasswordToggle() {
        passwordToggles.forEach(toggle => {
            toggle.addEventListener('click', function (e) {
                e.preventDefault();
                
                // Find the associated password input
                const passwordInput = this.previousElementSibling;
                if (!passwordInput || (passwordInput.type !== 'password' && passwordInput.type !== 'text')) {
                    // If sibling is not input, search in parent
                    const parent = this.parentElement;
                    const inputs = parent.querySelectorAll('input[type="password"], input[type="text"]');
                    const input = Array.from(inputs).find(inp => inp.id.includes('password') || inp.id.includes('confirm'));
                    
                    if (input) {
                        togglePasswordVisibility(input, this);
                    }
                } else {
                    togglePasswordVisibility(passwordInput, this);
                }
            });

            // Also support keyboard toggle with spacebar/enter
            toggle.addEventListener('keydown', function (e) {
                if (e.key === ' ' || e.key === 'Enter') {
                    e.preventDefault();
                    this.click();
                }
            });
        });
    }

    /**
     * Helper function to toggle password visibility
     */
    function togglePasswordVisibility(input, toggleBtn) {
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        
        // Update icon appearance
        toggleBtn.classList.toggle('opacity-50', isPassword);
        toggleBtn.setAttribute('aria-pressed', !isPassword);
    }

    /**
     * Form Validation
     * Provides real-time validation feedback
     */
    function initFormValidation() {
        if (loginForm) {
            loginForm.addEventListener('submit', handleLoginSubmit);
            
            // Real-time validation for login
            loginForm.querySelectorAll('input').forEach(input => {
                input.addEventListener('blur', validateField);
                input.addEventListener('change', validateField);
            });
        }

        if (registerForm) {
            registerForm.addEventListener('submit', handleRegisterSubmit);
            
            // Real-time validation for register
            registerForm.querySelectorAll('input').forEach(input => {
                input.addEventListener('blur', validateField);
                input.addEventListener('change', validateField);
                
                // Update password strength on input
                if (input.id === 'register-password') {
                    input.addEventListener('input', updatePasswordStrength);
                }
            });
        }
    }

    /**
     * Validate individual field
     */
    function validateField(event) {
        const field = event.target;
        const errorMessage = field.parentElement.querySelector('.error-message');
        let isValid = true;
        let message = '';

        // Basic field requirements
        if (!field.value.trim() && field.required) {
            isValid = false;
            message = `${field.getAttribute('aria-label') || field.name} is required`;
        }

        // Email validation
        if (field.type === 'email' && field.value.trim()) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(field.value)) {
                isValid = false;
                message = 'Please enter a valid email address';
            }
        }

        // Password confirmation validation
        if (field.id === 'register-confirm-password') {
            const passwordField = document.getElementById('register-password');
            if (field.value !== passwordField.value) {
                isValid = false;
                message = 'Passwords do not match';
            }
        }

        // Update field visual state
        updateFieldState(field, isValid, message, errorMessage);

        return isValid;
    }

    /**
     * Update field visual state and error message
     */
    function updateFieldState(field, isValid, message, errorElement) {
        if (isValid) {
            field.classList.remove('border-red-500', 'focus:ring-red-500');
            field.classList.add('border-green-500', 'focus:ring-green-500');
            if (errorElement) {
                errorElement.classList.add('hidden');
                errorElement.textContent = '';
            }
        } else {
            field.classList.remove('border-green-500', 'focus:ring-green-500');
            field.classList.add('border-red-500', 'focus:ring-red-500');
            if (errorElement) {
                errorElement.classList.remove('hidden');
                errorElement.textContent = message;
            }
        }
    }

    /**
     * Update password strength indicator
     */
    function updatePasswordStrength(event) {
        const password = event.target.value;
        const strengthBars = event.target.closest('form').querySelectorAll('.strength-bar');
        const strengthText = event.target.closest('form').querySelector('.strength-text');
        
        let strength = 0;
        let strengthLabel = 'Weak';
        let strengthColor = 'weak';

        // Check password strength criteria
        if (password.length >= 6) strength++;
        if (password.length >= 10) strength++;
        if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
        if (/\d/.test(password)) strength++;
        if (/[^a-zA-Z\d]/.test(password)) strength++;

        // Determine strength level
        if (strength <= 1) {
            strengthLabel = 'Weak';
            strengthColor = 'weak';
        } else if (strength === 2 || strength === 3) {
            strengthLabel = 'Fair';
            strengthColor = 'fair';
        } else if (strength === 4) {
            strengthLabel = 'Good';
            strengthColor = 'good';
        } else {
            strengthLabel = 'Strong';
            strengthColor = 'strong';
        }

        // Update bars
        strengthBars.forEach((bar, index) => {
            bar.classList.remove('weak', 'fair', 'good', 'strong');
            if (index < Math.ceil(strength / 5 * 4)) {
                bar.classList.add(strengthColor);
            }
        });

        // Update label
        if (strengthText) {
            strengthText.textContent = `Password strength: ${strengthLabel}`;
        }
    }

    /**
     * Handle login form submission
     */
    function handleLoginSubmit(e) {
        e.preventDefault();

        // Validate all fields
        const fields = Array.from(loginForm.querySelectorAll('input[required]'));
        let isFormValid = true;

        fields.forEach(field => {
            if (!validateField({ target: field })) {
                isFormValid = false;
            }
        });

        if (!isFormValid) {
            showNotification('Please fill out all fields correctly', 'error');
            return;
        }

        // Get form data
        const email = document.getElementById('login-email').value;
        const password = document.getElementById('login-password').value;
        const rememberMe = document.querySelector('input[name="remember-me"]').checked;

        // Log form data (in production, send to server)
        console.log('Login attempt:', { email, password, rememberMe });
        showNotification('Login functionality would be handled by backend', 'success');

        // Optionally reset form
        // loginForm.reset();
    }

    /**
     * Handle register form submission
     */
    function handleRegisterSubmit(e) {
        e.preventDefault();

        // Validate all fields
        const fields = Array.from(registerForm.querySelectorAll('input[required]'));
        let isFormValid = true;

        fields.forEach(field => {
            if (!validateField({ target: field })) {
                isFormValid = false;
            }
        });

        if (!isFormValid) {
            showNotification('Please fill out all fields correctly', 'error');
            return;
        }

        // Check terms acceptance
        const termsCheckbox = registerForm.querySelector('input[name="terms"]');
        if (!termsCheckbox.checked) {
            showNotification('Please accept the terms and conditions', 'error');
            return;
        }

        // Get form data
        const fullname = document.getElementById('register-fullname').value;
        const email = document.getElementById('register-email').value;
        const password = document.getElementById('register-password').value;

        // Log form data (in production, send to server)
        console.log('Registration attempt:', { fullname, email, password });
        showNotification('Registration would be processed by backend', 'success');

        // Optionally reset form
        // registerForm.reset();
    }

    /**
     * Show notification message
     */
    function showNotification(message, type = 'info') {
        // Create notification element
        const notification = document.createElement('div');
        const bgColor = type === 'success' ? 'bg-green-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500';
        
        notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg text-white font-medium shadow-lg ${bgColor} animate-pulse z-50`;
        notification.textContent = message;
        notification.setAttribute('role', 'alert');
        
        document.body.appendChild(notification);

        // Remove notification after 3 seconds
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    /**
     * Social login/signup handlers
     */
    function initSocialButtons() {
        const socialButtons = document.querySelectorAll('[aria-label*="with"]');
        
        socialButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const provider = button.getAttribute('aria-label').match(/with (\w+)/)?.[1] || 'provider';
                showNotification(`${provider} integration would be handled by backend`, 'info');
            });
        });
    }

    /**
     * Initialize all components
     */
    function init() {
        initTabSwitching();
        initPasswordToggle();
        initFormValidation();
        initSocialButtons();
        
        // Add smooth scroll behavior
        document.documentElement.style.scrollBehavior = 'smooth';
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Export for testing purposes
    window.AuthComponent = {
        validateField,
        updatePasswordStrength,
        togglePasswordVisibility
    };
})();
