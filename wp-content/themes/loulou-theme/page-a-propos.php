<?php
/*
Template Name: À Propos
*/
get_header(); ?>

<main class="about-page">
    <!-- Hero Section -->
    <section class="hero bg-gradient-to-br from-rose-50 via-orange-50 to-pink-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-content">
                    <h1 class="text-5xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                        À propos 
                        <span class="bg-gradient-to-r from-rose-600 to-orange-500 bg-clip-text text-transparent">
                            Loulou Confiture
                        </span>
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                        Une histoire de passion, de tradition familiale et d'amour pour les saveurs authentiques
                        qui se transmettent de génération en génération.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center gap-2 text-rose-600 dark:text-rose-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="font-medium">Fait maison depuis 2025</span>
                        </div>
                        <div class="flex items-center gap-2 text-orange-600 dark:text-orange-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="font-medium">Ingrédients naturels</span>
                        </div>
                    </div>
                </div>
                <div class="image-content">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-rose-500 to-orange-500 rounded-2xl transform rotate-3"></div>
                        <img src="<?php echo get_template_directory_uri(); ?>/resources/images/about-hero.png" 
                             alt="Loulou en cuisine" 
                             class="relative rounded-2xl shadow-2xl w-full h-96 object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Notre Histoire -->
    <section class="story py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">
                        Notre Histoire
                    </h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-rose-500 to-orange-500 mx-auto mb-8"></div>
                </div>

                <div class="space-y-12">
                    <div class="story-item">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                            <div class="order-2 md:order-1">
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                                    🌱 Les Débuts (2025)
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-4">
                                    Tout a commencé dans la cuisine de Maman Leila, surnommée affectueusement "Loulou" 
                                    par sa famille. Passionnée de cuisine depuis son enfance, elle décide de partager ses 
                                    recettes de confitures traditionnelles avec ses voisins et amis.
                                </p>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                    Ses confitures, préparées avec des fruits locaux et beaucoup d'amour, rencontrent 
                                    rapidement un succès fou dans le quartier.
                                </p>
                            </div>
                            <div class="order-1 md:order-2">
                                <div class="bg-rose-100 dark:bg-rose-900 rounded-xl p-8 text-center">
                                    <div class="text-6xl mb-4">👵</div>
                                    <p class="text-rose-600 dark:text-rose-400 font-semibold">Maman Loulou</p>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Fondatrice & Inspiration</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="story-item">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                            <div class="order-1">
                                <div class="bg-orange-100 dark:bg-orange-900 rounded-xl p-8 text-center">
                                    <div class="text-6xl mb-4">🏪</div>
                                    <p class="text-orange-600 dark:text-orange-400 font-semibold">Premier Stand</p>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Marché local</p>
                                </div>
                            </div>
                            <div class="order-2">
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                                    🛒 L'Expansion (2026 hh)
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-4">
                                    Face à la demande croissante, Loulou décide de franchir le pas et installe son premier 
                                    stand sur le marché local. C'est le début d'une aventure entrepreneuriale familiale.
                                </p>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                    Ses filles et petits-enfants rejoignent l'aventure, apportant leurs propres idées 
                                    et innovations tout en préservant les recettes traditionnelles.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="story-item">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                            <div class="order-2 md:order-1">
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                                    🌍 Aujourd'hui (2027) Back to the future
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-4">
                                    Aujourd'hui, Loulou Confiture est devenue une référence locale pour les confitures 
                                    artisanales. Nous continuons de suivre les recettes originales de Maman Loulou, 
                                    tout en proposant de nouvelles saveurs créatives.
                                </p>
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                    Notre mission reste la même : partager le goût authentique du fait-maison avec 
                                    amour et passion.
                                </p>
                            </div>
                            <div class="order-1 md:order-2">
                                <div class="bg-pink-100 dark:bg-pink-900 rounded-xl p-8 text-center">
                                    <div class="text-6xl mb-4">🏆</div>
                                    <p class="text-pink-600 dark:text-pink-400 font-semibold">1 ans d'excellence</p>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Tradition & Innovation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nos Valeurs -->
    <section class="values py-20 bg-gray-50 dark:bg-gray-800">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">
                    Nos Valeurs
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Les principes qui guident notre travail au quotidien
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Qualité -->
                <div class="value-card bg-white dark:bg-gray-900 rounded-xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-rose-100 dark:bg-rose-900 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-rose-600 dark:text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Qualité</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Nous sélectionnons rigoureusement nos fruits et n'utilisons que des ingrédients naturels, 
                        sans conservateurs artificiels.
                    </p>
                </div>

                <!-- Tradition -->
                <div class="value-card bg-white dark:bg-gray-900 rounded-xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-orange-100 dark:bg-orange-900 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Tradition</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Nos recettes ancestrales, transmises de génération en génération, sont le cœur de notre savoir-faire.
                    </p>
                </div>

                <!-- Passion -->
                <div class="value-card bg-white dark:bg-gray-900 rounded-xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-pink-100 dark:bg-pink-900 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-pink-600 dark:text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Passion</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Chaque pot est préparé avec amour et passion, comme si c'était pour notre propre famille.
                    </p>
                </div>

                <!-- Local -->
                <div class="value-card bg-white dark:bg-gray-900 rounded-xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Local</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Nous privilégions les circuits courts et travaillons avec des producteurs locaux de notre région.
                    </p>
                </div>

                <!-- Artisanal -->
                <div class="value-card bg-white dark:bg-gray-900 rounded-xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-yellow-100 dark:bg-yellow-900 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Artisanal</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Chaque pot est fait à la main, en petites quantités, pour garantir une qualité exceptionnelle.
                    </p>
                </div>

                <!-- Authenticité -->
                <div class="value-card bg-white dark:bg-gray-900 rounded-xl p-8 text-center shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Authenticité</h3>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                        Nous restons fidèles à nos racines et à l'esprit familial qui nous anime depuis le premier jour.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Équipe -->
    <section class="team py-20 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">
                    Notre Équipe
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Une famille unie par la passion des bonnes confitures
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Marie -->
                <div class="team-member bg-gray-50 dark:bg-gray-800 rounded-xl p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div class="w-24 h-24 bg-gradient-to-r from-rose-400 to-pink-400 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl text-white font-bold">I</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Ines Bou Rass</h3>
                    <p class="text-rose-600 dark:text-rose-400 font-semibold mb-4">Directrice & Fille de Loulou</p>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Garde précieusement les recettes originales et supervise la production avec le même amour 
                        que sa mère.
                    </p>
                </div>

                <!-- Pierre -->
                <div class="team-member bg-gray-50 dark:bg-gray-800 rounded-xl p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div class="w-24 h-24 bg-gradient-to-r from-orange-400 to-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl text-white font-bold">S</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Salah Boss</h3>
                    <p class="text-orange-600 dark:text-orange-400 font-semibold mb-4">Chef Confiturier</p>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Expert en cuisson et maître des saveurs, il veille à ce que chaque pot respecte 
                        nos standards de qualité. 3asess
                    </p>
                </div>

                <!-- Sophie -->
                <div class="team-member bg-gray-50 dark:bg-gray-800 rounded-xl p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div class="w-24 h-24 bg-gradient-to-r from-pink-400 to-purple-400 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl text-white font-bold">Y</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Yasmine du rouleau papier</h3>
                    <p class="text-pink-600 dark:text-pink-400 font-semibold mb-4">Innovation & Petite-fille</p>
                    <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        Apporte sa créativité pour développer de nouvelles saveurs tout en respectant 
                        la tradition familiale.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta py-20 bg-gradient-to-r from-rose-500 to-orange-500">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-white mb-6">
                Découvrez nos Confitures Artisanales
            </h2>
            <p class="text-xl text-rose-100 mb-8 max-w-3xl mx-auto">
                Laissez-vous séduire par nos saveurs authentiques et découvrez pourquoi 
                nos clients nous font confiance depuis plus de 30 ans.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo home_url('/boutique'); ?>" 
                   class="bg-white text-rose-600 font-bold py-4 px-8 rounded-lg hover:bg-rose-50 transition-colors transform hover:scale-105 shadow-lg">
                    🛒 Voir nos Produits
                </a>
                <a href="<?php echo home_url('/contact'); ?>" 
                   class="bg-transparent border-2 border-white text-white font-bold py-4 px-8 rounded-lg hover:bg-white hover:text-rose-600 transition-colors transform hover:scale-105">
                    📞 Nous Contacter
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>