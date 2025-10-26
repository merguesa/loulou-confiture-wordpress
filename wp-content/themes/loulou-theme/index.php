<?php
/**
 * The main template file
 *
 * @package LoulouTheme
 */

get_header(); 

// Include hero section
include get_template_directory() . '/resources/partials/hero.php';

// Include about section
include get_template_directory() . '/resources/partials/about-section.php';

// Include products grid
include get_template_directory() . '/resources/partials/products-grid.php';
?>

<!-- Blog Posts Section -->
<main id="primary" class="site-main py-16 bg-white dark:bg-gray-900 transition-colors duration-200">
    <div class="container mx-auto px-6">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Nos dernières actualités</h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">Découvrez nos recettes, conseils et nouveautés</p>
        </div>
        
        <!-- Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white dark:bg-gray-800 rounded-lg shadow-md dark:shadow-xl overflow-hidden hover:shadow-lg dark:hover:shadow-2xl transition-all duration-200'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'w-full h-48 object-cover')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="p-6">
                            <header class="entry-header mb-4">
                                <h3 class="text-xl font-semibold mb-2">
                                    <a href="<?php the_permalink(); ?>" class="text-gray-900 dark:text-white hover:text-rose-600 dark:hover:text-rose-400 transition-colors">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <div class="entry-meta text-sm text-gray-500 dark:text-gray-400">
                                    <time datetime="<?php echo get_the_date('c'); ?>">
                                        <?php echo get_the_date(); ?>
                                    </time>
                                    <span class="mx-2">•</span>
                                    <span><?php the_author(); ?></span>
                                </div>
                            </header>
                            
                            <div class="entry-content text-gray-600 dark:text-gray-300 mb-4">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <footer class="entry-footer">
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-rose-600 dark:text-rose-400 hover:text-rose-700 dark:hover:text-rose-300 font-medium transition-colors">
                                    Lire la suite
                                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </footer>
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
            <div class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Aucun article trouvé</h2>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">Il semble qu'il n'y ait rien ici pour le moment.</p>
                    <a href="<?php echo home_url('/nos-confitures'); ?>" class="inline-block bg-rose-600 dark:bg-rose-500 text-white font-semibold py-3 px-6 rounded-lg hover:bg-rose-700 dark:hover:bg-rose-600 transition-colors">
                        Découvrir nos produits
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
