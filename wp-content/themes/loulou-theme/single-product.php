<?php
/**
 * The template for displaying single product pages
 *
 * @package LoulouTheme
 */

get_header(); ?>

<?php while (have_posts()) : the_post(); 
    // Get product meta
    $price = get_post_meta(get_the_ID(), '_product_price', true);
    $size = get_post_meta(get_the_ID(), '_product_size', true);
    $ingredients = get_post_meta(get_the_ID(), '_product_ingredients', true);
    $allergens = get_post_meta(get_the_ID(), '_product_allergens', true);
    $storage = get_post_meta(get_the_ID(), '_product_storage', true);
    $availability = get_post_meta(get_the_ID(), '_product_availability', true);
    
    // Availability info
    $availability_class = '';
    $availability_text = '';
    $availability_icon = '';
    switch($availability) {
        case 'limited':
            $availability_class = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200';
            $availability_text = 'Stock Limité';
            $availability_icon = '⚠️';
            break;
        case 'seasonal':
            $availability_class = 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200';
            $availability_text = 'Saisonnier';
            $availability_icon = '🌸';
            break;
        case 'out_of_stock':
            $availability_class = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200';
            $availability_text = 'Rupture de Stock';
            $availability_icon = '❌';
            break;
        default:
            $availability_class = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200';
            $availability_text = 'Disponible';
            $availability_icon = '✅';
    }
?>

<!-- Single Product Page -->
<main id="primary" class="site-main py-8 bg-white dark:bg-gray-900 transition-colors duration-200">
    <div class="container mx-auto px-6">
        
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                <li><a href="<?php echo home_url(); ?>" class="hover:text-rose-600 dark:hover:text-rose-400">Accueil</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="<?php echo get_post_type_archive_link('product'); ?>" class="hover:text-rose-600 dark:hover:text-rose-400">Nos Confitures</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-gray-900 dark:text-white"><?php the_title(); ?></li>
            </ol>
        </nav>

        <!-- Product Content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            
            <!-- Product Image -->
            <div class="product-image">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="rounded-2xl overflow-hidden shadow-2xl">
                        <?php the_post_thumbnail('product-large', array(
                            'class' => 'w-full h-96 object-cover',
                            'alt' => get_the_title()
                        )); ?>
                    </div>
                <?php else : ?>
                    <div class="w-full h-96 bg-gradient-to-br from-rose-200 to-orange-200 dark:from-rose-800 dark:to-orange-800 rounded-2xl flex items-center justify-center shadow-2xl">
                        <span class="text-9xl">🍯</span>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Product Details -->
            <div class="product-details">
                
                <!-- Title and Availability -->
                <div class="mb-6">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        <?php the_title(); ?>
                    </h1>
                    
                    <div class="flex items-center space-x-4 mb-4">
                        <span class="px-4 py-2 rounded-full text-sm font-semibold <?php echo $availability_class; ?>">
                            <?php echo $availability_icon; ?> <?php echo $availability_text; ?>
                        </span>
                        
                        <?php if ($price) : ?>
                            <span class="text-3xl font-bold text-rose-600 dark:text-rose-400">
                                <?php echo number_format((float)$price, 2, ',', ' '); ?> TND
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Product Description -->
                <div class="prose prose-lg dark:prose-invert mb-8">
                    <?php the_content(); ?>
                </div>

                <!-- Product Information Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                    
                    <?php if ($size) : ?>
                        <div class="info-item bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                            <h3 class="font-semibold text-gray-900 dark:text-white mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-rose-600 dark:text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                Taille du Pot
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400"><?php echo esc_html($size); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if ($ingredients) : ?>
                        <div class="info-item bg-gray-50 dark:bg-gray-800 p-4 rounded-lg sm:col-span-2">
                            <h3 class="font-semibold text-gray-900 dark:text-white mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-rose-600 dark:text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                </svg>
                                Ingrédients
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400"><?php echo esc_html($ingredients); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if ($allergens) : ?>
                        <div class="info-item bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg">
                            <h3 class="font-semibold text-gray-900 dark:text-white mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.314 15.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                Allergènes
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400"><?php echo esc_html($allergens); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if ($storage) : ?>
                        <div class="info-item bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                            <h3 class="font-semibold text-gray-900 dark:text-white mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                Conservation
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400"><?php echo esc_html($storage); ?></p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Call to Action -->
                <div class="text-center lg:text-left">
                    <?php if ($availability !== 'out_of_stock') : ?>
                        <div class="space-y-4">
                            <p class="text-gray-600 dark:text-gray-400">
                                💌 Intéressé par ce produit ? Contactez-nous pour passer commande !
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="mailto:contact@loulouconfiture.com?subject=Commande: <?php echo urlencode(get_the_title()); ?>" 
                                   class="bg-rose-600 dark:bg-rose-500 text-white font-medium py-3 px-6 rounded-lg hover:bg-rose-700 dark:hover:bg-rose-600 transition-colors text-center">
                                    📧 Commander par Email
                                </a>
                                <a href="tel:+33123456789" 
                                   class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-medium py-3 px-6 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-center">
                                    📞 Appeler
                                </a>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="bg-red-50 dark:bg-red-900/20 p-6 rounded-lg text-center">
                            <h3 class="text-lg font-semibold text-red-800 dark:text-red-200 mb-2">Produit Indisponible</h3>
                            <p class="text-red-600 dark:text-red-300">Ce produit est actuellement en rupture de stock.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <?php
        $related_products = new WP_Query(array(
            'post_type'      => 'product',
            'posts_per_page' => 3,
            'post__not_in'   => array(get_the_ID()),
            'orderby'        => 'rand'
        ));
        
        if ($related_products->have_posts()) : ?>
            <section class="related-products py-16 border-t border-gray-200 dark:border-gray-700">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                        Vous Pourriez Aussi Aimer
                    </h2>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php while ($related_products->have_posts()) : $related_products->the_post(); ?>
                        <article class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array(
                                        'class' => 'w-full h-48 object-cover hover:scale-105 transition-transform duration-300',
                                        'alt' => get_the_title()
                                    )); ?>
                                </a>
                            <?php endif; ?>
                            
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                                    <a href="<?php the_permalink(); ?>" class="hover:text-rose-600 dark:hover:text-rose-400 transition-colors">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                
                                <?php 
                                $related_price = get_post_meta(get_the_ID(), '_product_price', true);
                                if ($related_price) : ?>
                                    <p class="text-rose-600 dark:text-rose-400 font-bold">
                                        <?php echo number_format((float)$related_price, 2, ',', ' '); ?> TND
                                    </p>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </section>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>

        <!-- Back to Products -->
        <div class="text-center mt-12">
            <a href="<?php echo get_post_type_archive_link('product'); ?>" 
               class="inline-flex items-center text-rose-600 dark:text-rose-400 hover:text-rose-700 dark:hover:text-rose-300 font-medium transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Retour à toutes nos confitures
            </a>
        </div>
    </div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>