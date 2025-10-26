<?php
/**
 * Products Grid Component
 * 
 * @package LoulouTheme
 */

// Get products
$products_query = new WP_Query(array(
    'post_type'      => 'product',
    'posts_per_page' => 6, // Show 6 products
    'post_status'    => 'publish',
    'meta_query'     => array(
        array(
            'key'     => '_product_availability',
            'value'   => 'out_of_stock',
            'compare' => '!='
        )
    )
));
?>

<!-- Products Section -->
<section class="products py-16 bg-white dark:bg-gray-900 transition-colors duration-200">
    <div class="container mx-auto px-6">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                🍯 Nos Délicieuses Confitures
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Découvrez notre gamme de confitures artisanales, préparées avec amour et les meilleurs fruits de saison.
            </p>
        </div>

        <?php if ($products_query->have_posts()) : ?>
            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <?php while ($products_query->have_posts()) : $products_query->the_post(); 
                    // Get product meta
                    $price = get_post_meta(get_the_ID(), '_product_price', true);
                    $size = get_post_meta(get_the_ID(), '_product_size', true);
                    $availability = get_post_meta(get_the_ID(), '_product_availability', true);
                    
                    // Availability badges
                    $availability_class = '';
                    $availability_text = '';
                    switch($availability) {
                        case 'limited':
                            $availability_class = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200';
                            $availability_text = 'Stock Limité';
                            break;
                        case 'seasonal':
                            $availability_class = 'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200';
                            $availability_text = 'Saisonnier';
                            break;
                        default:
                            $availability_class = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200';
                            $availability_text = 'Disponible';
                    }
                ?>
                    <article class="product-card bg-white dark:bg-gray-800 rounded-xl shadow-lg dark:shadow-2xl overflow-hidden hover:shadow-xl dark:hover:shadow-3xl transition-all duration-300 transform hover:-translate-y-2 group">
                        <!-- Product Image -->
                        <div class="product-image relative overflow-hidden">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('product-medium', array(
                                        'class' => 'w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500',
                                        'alt' => get_the_title(),
                                        'loading' => 'lazy'
                                    )); ?>
                                </a>
                            <?php else : ?>
                                <div class="w-full h-64 bg-gradient-to-br from-rose-200 to-orange-200 dark:from-rose-800 dark:to-orange-800 flex items-center justify-center">
                                    <span class="text-6xl">🍯</span>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Availability Badge -->
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold <?php echo $availability_class; ?>">
                                    <?php echo $availability_text; ?>
                                </span>
                            </div>
                        </div>

                        <!-- Product Content -->
                        <div class="product-content p-6">
                            <!-- Product Title -->
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors">
                                <a href="<?php the_permalink(); ?>" class="stretched-link">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <!-- Product Excerpt -->
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                                <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                            </p>

                            <!-- Product Details -->
                            <div class="flex items-center justify-between mb-4">
                                <?php if ($size) : ?>
                                    <span class="text-sm text-gray-500 dark:text-gray-400 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                        <?php echo esc_html($size); ?>
                                    </span>
                                <?php endif; ?>
                                
                                <?php if ($price) : ?>
                                    <span class="text-lg font-bold text-rose-600 dark:text-rose-400">
                                        <?php echo number_format((float)$price, 2, ',', ' '); ?> TND
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Action Button -->
                            <a href="<?php the_permalink(); ?>" 
                               class="inline-block w-full text-center bg-rose-600 dark:bg-rose-500 text-white font-medium py-2 px-4 rounded-lg hover:bg-rose-700 dark:hover:bg-rose-600 transition-colors duration-200">
                                Découvrir
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- View All Button -->
            <div class="text-center">
                <a href="<?php echo home_url('/boutique/'); ?>" 
                   class="inline-block bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white font-medium py-3 px-8 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200">
                    🛒 Voir Notre Boutique Complète
                </a>
            </div>

        <?php else : ?>
            <!-- No Products Message -->
            <div class="text-center py-12">
                <div class="text-6xl mb-4">🍯</div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Bientôt Disponible</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Nos délicieuses confitures artisanales arrivent bientôt !
                </p>
            </div>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </div>
</section>