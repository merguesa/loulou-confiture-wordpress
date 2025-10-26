<?php
/**
 * Template Name: Contact Page
 * The template for displaying the contact page
 *
 * @package LoulouTheme
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Hero Section -->
    <section class="contact-hero bg-gradient-to-br from-rose-400 via-pink-300 to-orange-400 dark:from-gray-900 dark:to-gray-800 py-16">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white dark:text-white mb-6 drop-shadow-lg">
                    📞 Contactez-Nous
                </h1>
                <p class="text-xl md:text-2xl text-white dark:text-gray-400 mb-8 drop-shadow-md">
                    Une question ? Envie de passer commande ? Nous sommes là pour vous aider !
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Methods -->
    <section class="contact-methods py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                
                <!-- Email Contact -->
                <div class="contact-card bg-gray-50 dark:bg-gray-800 rounded-xl p-10 md:p-12 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="mb-6">
                        <div class="w-16 h-16 bg-rose-100 dark:bg-rose-900 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-6 h-6 text-rose-600 dark:text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Email</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Écrivez-nous pour toute question ou commande
                        </p>
                    </div>
                    <div class="space-y-4 mb-2">
                        <p class="text-lg font-medium text-gray-900 dark:text-white">
                            bonjour@loulouconfiture.com
                        </p>
                        <a href="mailto:bonjour@loulouconfiture.com?subject=Demande d'information" 
                           class="inline-block bg-rose-600 dark:bg-rose-500 text-white px-6 py-3 rounded-lg hover:bg-rose-700 dark:hover:bg-rose-600 transition-colors font-medium">
                            📧 Envoyer un Email
                        </a>
                    </div>
                </div>

                <!-- Phone Contact -->
                <div class="contact-card bg-gray-50 dark:bg-gray-800 rounded-xl p-10 md:p-12 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="mb-6">
                        <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Téléphone</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Appelez-nous directement pour une réponse immédiate
                        </p>
                    </div>
                    <div class="space-y-4 mb-2">
                        <p class="text-lg font-medium text-gray-900 dark:text-white">
                            +216 93 285 980
                        </p>
                        <a href="tel:+21693285980" 
                           class="inline-block bg-green-600 dark:bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-700 dark:hover:bg-green-600 transition-colors font-medium">
                            📞 Appeler Maintenant
                        </a>
                    </div>
                </div>

                <!-- Location -->
                <div class="contact-card bg-gray-50 dark:bg-gray-800 rounded-xl p-10 md:p-12 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 md:col-span-2 lg:col-span-1">
                    <div class="mb-6">
                        <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Localisation</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Venez nous rendre visite à notre atelier
                        </p>
                    </div>
                    <div class="space-y-4 mb-2">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                            Cite Bel Air<br>
                            Boumhal, Ben Arous Tunisie
                        </p>
                        <button onclick="alert('Fonctionnalité GPS à venir !')" 
                                class="inline-block bg-blue-600 dark:bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-700 dark:hover:bg-blue-600 transition-colors font-medium">
                            🗺️ Voir sur la Carte
                        </button>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="max-w-4xl mx-auto">
                <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-8 md:p-12">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                            📝 Envoyez-nous un Message
                        </h2>
                        <p class="text-lg text-gray-600 dark:text-gray-400">
                            Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais !
                        </p>
                    </div>

                    <?php 
                    // Check if Contact Form 7 is active
                    if (function_exists('wpcf7_contact_form_tag_func')) {
                        // Use Contact Form 7 shortcode - replace with your actual form ID
                        echo do_shortcode('[contact-form-7 id="8c0c2cf" title="custom_form"]');
                    } else {
                        // Fallback to custom form with AJAX
                    ?>
                        <form id="contactForm" class="space-y-6" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>">
                            <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                            <input type="hidden" name="action" value="handle_contact_form">
                            
                            <!-- Name and Email Row -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="contact_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Nom complet *
                                    </label>
                                    <input type="text" id="contact_name" name="contact_name" required 
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                           placeholder="Votre nom et prénom">
                                </div>
                                <div>
                                    <label for="contact_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Adresse email *
                                    </label>
                                    <input type="email" id="contact_email" name="contact_email" required 
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                           placeholder="votre.email@exemple.com">
                                </div>
                            </div>

                            <!-- Phone and Subject Row -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="contact_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Téléphone
                                    </label>
                                    <input type="tel" id="contact_phone" name="contact_phone" 
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                           placeholder="Votre numéro de téléphone">
                                </div>
                                <div>
                                    <label for="contact_subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Sujet *
                                    </label>
                                    <select id="contact_subject" name="contact_subject" required 
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                                        <option value="">Choisissez un sujet</option>
                                        <option value="commande">Passer une commande</option>
                                        <option value="info-produit">Information sur un produit</option>
                                        <option value="livraison">Questions sur la livraison</option>
                                        <option value="collaboration">Proposition de collaboration</option>
                                        <option value="autre">Autre</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="contact_message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Message *
                                </label>
                                <textarea id="contact_message" name="contact_message" rows="6" required 
                                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 resize-none"
                                          placeholder="Écrivez votre message ici... N'hésitez pas à mentionner les produits qui vous intéressent ou toute question spécifique !"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" 
                                        class="bg-gradient-to-r from-rose-500 to-orange-500 hover:from-rose-600 hover:to-orange-600 text-white font-bold py-4 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    🚀 Envoyer le Message
                                </button>
                            </div>
                        </form>

                        <div id="form-messages" class="mt-4 text-center hidden">
                            <div id="success-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded hidden">
                                ✅ Votre message a été envoyé avec succès ! Nous vous répondrons bientôt.
                            </div>
                            <div id="error-message" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded hidden">
                                ❌ Une erreur s'est produite. Veuillez réessayer.
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Hours & Additional Info -->
    <section class="business-info bg-gradient-to-r from-rose-50 to-orange-50 dark:from-gray-800 dark:to-gray-700 py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Hours -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-rose-100 dark:bg-rose-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-rose-600 dark:text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Horaires d'Ouverture</h3>
                    <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <p><strong>Lundi - Vendredi:</strong> 9h00 - 10h00 ba3ed 10 tkalmech</p>
                        <p><strong>Samedi:</strong> 9h00 - 16h00</p>
                        <p><strong>Dimanche:</strong> Fermé</p>
                    </div>
                </div>

                <!-- Response Time -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Temps de Réponse</h3>
                    <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <p><strong>Email:</strong> Sous 24h</p>
                        <p><strong>Téléphone:</strong> Immédiat</p>
                        <p><strong>Commandes:</strong> Confirmation sous 2h</p>
                    </div>
                </div>

                <!-- Delivery -->
                <div class="text-center md:col-span-2 lg:col-span-1">
                    <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Livraison</h3>
                    <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                        <p><strong>Boumhal:</strong> Livraison gratuite</p>
                        <p><strong>Banlieue Sud:</strong> 4 TND</p>
                        <p><strong>Banlieue Nord:</strong> 8 TND</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- JavaScript for form handling -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(contactForm);
        const name = formData.get('name');
        const email = formData.get('email');
        const phone = formData.get('phone');
        const subject = formData.get('subject');
        const message = formData.get('message');
        
        // Create email body
        const emailBody = `Bonjour Loulou Confiture,

Nouveau message de contact:

Nom: ${name}
Email: ${email}
Téléphone: ${phone || 'Non renseigné'}
Sujet: ${subject}

Message:
${message}

---
Ce message a été envoyé depuis le formulaire de contact du site web.`;
        
        // Create mailto link
        const mailtoLink = `mailto:bonjour@loulouconfiture.com?subject=Contact: ${subject}&body=${encodeURIComponent(emailBody)}`;
        
        // Open email client
        window.location.href = mailtoLink;
        
        // Show success message
        alert('Votre client email va s\'ouvrir avec le message pré-rempli. Merci de nous contacter !');
        
        // Reset form
        contactForm.reset();
    });
});
</script>

<?php get_footer(); ?>