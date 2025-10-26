document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const messagesDiv = document.getElementById('form-messages');
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(contactForm);
            
            // Show loading state
            const submitButton = contactForm.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            submitButton.innerHTML = '⏳ Envoi en cours...';
            submitButton.disabled = true;
            
            // Hide previous messages
            messagesDiv.classList.add('hidden');
            successMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');
            
            // Send AJAX request
            fetch(contactForm.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                messagesDiv.classList.remove('hidden');
                
                if (data.success) {
                    successMessage.textContent = data.data;
                    successMessage.classList.remove('hidden');
                    contactForm.reset();
                } else {
                    errorMessage.textContent = data.data || 'Une erreur s\'est produite. Veuillez réessayer.';
                    errorMessage.classList.remove('hidden');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                messagesDiv.classList.remove('hidden');
                errorMessage.textContent = 'Une erreur s\'est produite. Veuillez réessayer.';
                errorMessage.classList.remove('hidden');
            })
            .finally(() => {
                // Restore button state
                submitButton.innerHTML = originalText;
                submitButton.disabled = false;
            });
        });
    }
});