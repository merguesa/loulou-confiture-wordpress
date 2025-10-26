<?php
/**
 * The template for displaying product archive pages
 *
 * @package LoulouTheme
 */

get_header(); ?>

<!-- Products Archive Header -->
<section class="archive-header py-16 bg-gradient-to-br from-rose-400 via-pink-500 to-rose-600 text-white text-center">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            🍯 Toutes Nos Confitures
        </h1>
        <p class="text-lg opacity-90 max-w-2xl mx-auto">
            Découvrez notre collection complète de confitures artisanales, 
            préparées avec amour selon nos recettes traditionnelles.
        </p>
    </div>
</section>

<!-- Products Grid -->
<main id="primary" class="site-main py-16 bg-white dark:bg-gray-900 transition-colors duration-200">
    <div class="container mx-auto px-6">
        
        <?php if (have_posts()) : ?>
            
            <!-- Filter Options (Future Enhancement) -->
            <div class="mb-12">
                <div class="flex flex-wrap justify-center gap-4">
                    <?php 
                    $categories = get_terms(array(
                        'taxonomy' => 'product_category',
                        'hide_empty' => true,
                    ));
                    
                    if (!empty($categories)) : ?>
                        <a href="<?php echo get_post_type_archive_link('product'); ?>" 
                           class="px-4 py-2 bg-rose-600 text-white rounded-lg hover:bg-rose-700 transition-colors">
                            Toutes
                        </a>
                        <?php foreach ($categories as $category) : ?>
                            <a href="<?php echo get_term_link($category); ?>" 
                               class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <?php while (have_posts()) : the_post(); 
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
                        case 'out_of_stock':
                            $availability_class = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200';
                            $availability_text = 'Rupture de Stock';
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
                                        'class' => 'w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500',
                                        'alt' => get_the_title(),
                                        'loading' => 'lazy'
                                    )); ?>
                                </a>
                            <?php else : ?>
                                <div class="w-full h-48 bg-gradient-to-br from-rose-200 to-orange-200 dark:from-rose-800 dark:to-orange-800 flex items-center justify-center">
                                    <span class="text-5xl">🍯</span>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Availability Badge -->
                            <div class="absolute top-3 right-3">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $availability_class; ?>">
                                    <?php echo $availability_text; ?>
                                </span>
                            </div>
                        </div>

                        <!-- Product Content -->
                        <div class="product-content p-4">
                            <!-- Product Title -->
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <!-- Product Excerpt -->
                            <p class="text-gray-600 dark:text-gray-400 text-sm mb-3 line-clamp-2">
                                <?php echo wp_trim_words(get_the_excerpt(), 12, '...'); ?>
                            </p>

                            <!-- Product Details -->
                            <div class="flex items-center justify-between mb-3">
                                <?php if ($size) : ?>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">
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
                               class="inline-block w-full text-center bg-rose-600 dark:bg-rose-500 text-white font-medium py-2 px-3 rounded-lg hover:bg-rose-700 dark:hover:bg-rose-600 transition-colors duration-200 text-sm">
                                Découvrir
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <?php 
                the_posts_pagination(array(
                    'prev_text' => '← Précédent',
                    'next_text' => 'Suivant →',
                    'class' => 'pagination-links flex space-x-2'
                )); 
                ?>
            </div>

        <?php else : ?>
            
            <!-- No Products Message -->
            <div class="text-center py-16">
                <div class="text-8xl mb-6">🍯</div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Aucun produit trouvé</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-8">
                    Nos délicieuses confitures artisanales arrivent bientôt !
                </p>
                <a href="<?php echo home_url(); ?>" 
                   class="inline-block bg-rose-600 dark:bg-rose-500 text-white font-medium py-3 px-6 rounded-lg hover:bg-rose-700 dark:hover:bg-rose-600 transition-colors">
                    Retour à l'accueil
                </a>
            </div>
            
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>