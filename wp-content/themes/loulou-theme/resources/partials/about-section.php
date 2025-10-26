<?php
/**
 * About Section Partial
 * 
 * @package LoulouTheme
 */
?>

<!-- About Section -->
<section class="about py-16 bg-gray-50 dark:bg-gray-800 text-center transition-colors duration-200">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gray-900 dark:text-white">
            🌿 Artisanat & Authenticité
        </h2>
        <p class="max-w-4xl mx-auto text-lg leading-relaxed text-gray-700 dark:text-gray-300 mb-8">
            Chez <strong class="text-rose-600 dark:text-rose-400">Loulou Confiture</strong>, chaque pot est fait avec soin, selon des recettes artisanales
            qui respectent les saveurs d'antan. Nous choisissons les meilleurs fruits de saison pour offrir
            des confitures saines, savoureuses et pleines de soleil.
        </p>
        
        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
            <div class="feature-item">
                <div class="text-4xl mb-4">🍓</div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Fruits Frais</h3>
                <p class="text-gray-600 dark:text-gray-400">Sélectionnés avec soin de nos producteurs locaux</p>
            </div>
            <div class="feature-item">
                <div class="text-4xl mb-4">🥄</div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Fait Main</h3>
                <p class="text-gray-600 dark:text-gray-400">Préparé artisanalement en petites quantités</p>
            </div>
            <div class="feature-item">
                <div class="text-4xl mb-4">🌱</div>
                <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">100% Bio</h3>
                <p class="text-gray-600 dark:text-gray-400">Sans additifs, sans conservateurs artificiels</p>
            </div>
        </div>
        
        <a href="<?php echo home_url('/a-propos'); ?>" 
           class="inline-block bg-rose-600 dark:bg-rose-500 text-white font-medium py-3 px-8 rounded-lg shadow-lg hover:bg-rose-700 dark:hover:bg-rose-600 hover:shadow-xl transition-all duration-200 transform hover:-translate-y-1">
            En savoir plus sur notre histoire
        </a>
    </div>
</section>