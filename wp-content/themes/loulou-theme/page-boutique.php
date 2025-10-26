<?php
/**
 * Template Name: Boutique Page
 * The template for displaying the boutique/shop page
 *
 * @package LoulouTheme
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Hero Section -->
    <section class="boutique-hero bg-gradient-to-br from-rose-400 via-pink-300 to-orange-400 dark:from-gray-900 dark:to-gray-800 py-16">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white dark:text-white mb-6 drop-shadow-lg">
                    🛒 Notre Boutique
                </h1>
                <p class="text-xl md:text-2xl text-white dark:text-gray-400 mb-8 drop-shadow-md">
                    Découvrez toute notre gamme de confitures artisanales, préparées avec passion et les meilleurs fruits de saison.
                </p>
                
                <!-- Quick Stats - Compact Version -->
                <div class="flex justify-center items-center gap-6 mb-4">
                    <?php
                    $total_products = wp_count_posts('product')->publish;
                    $available_products = new WP_Query(array(
                        'post_type' => 'product',
                        'meta_query' => array(
                            array(
                                'key' => '_product_availability',
                                'value' => 'out_of_stock',
                                'compare' => '!='
                            )
                        )
                    ));
                    $categories = get_terms(array('taxonomy' => 'product_category', 'hide_empty' => true));
                    ?>
                    
                    <div class="flex items-center gap-2 bg-white dark:bg-gray-800 rounded-lg px-4 py-2 shadow-md">
                        <div class="text-lg font-bold text-rose-600 dark:text-rose-400"><?php echo $total_products; ?></div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Produits</div>
                    </div>
                    
                    <div class="flex items-center gap-2 bg-white dark:bg-gray-800 rounded-lg px-4 py-2 shadow-md">
                        <div class="text-lg font-bold text-green-600 dark:text-green-400"><?php echo $available_products->found_posts; ?></div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Disponibles</div>
                    </div>
                    
                    <div class="flex items-center gap-2 bg-white dark:bg-gray-800 rounded-lg px-4 py-2 shadow-md">
                        <div class="text-lg font-bold text-blue-600 dark:text-blue-400"><?php echo count($categories); ?></div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Catégories</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Filters Section -->
    <?php if (!empty($categories) && count($categories) > 1) : ?>
    <section class="filters bg-gray-50 dark:bg-gray-800 py-8 border-b border-gray-200 dark:border-gray-700 sticky top-0 z-40">
        <div class="container mx-auto px-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                
                <!-- Category Filter -->
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300 mr-2">Catégories:</span>
                    <button onclick="filterProducts('all')" class="filter-btn active px-4 py-2 rounded-full text-sm font-medium bg-rose-600 text-white hover:bg-rose-700 transition-colors">
                        Toutes
                    </button>
                    <?php foreach ($categories as $category) : ?>
                        <button onclick="filterProducts('<?php echo $category->slug; ?>')" 
                                class="filter-btn px-4 py-2 rounded-full text-sm font-medium bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                            <?php echo $category->name; ?>
                        </button>
                    <?php endforeach; ?>
                </div>

                <!-- Sort Options -->
                <div class="flex items-center gap-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Trier par:</span>
                    <select id="sortProducts" class="px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-sm">
                        <option value="date">Plus récents</option>
                        <option value="title">Nom (A-Z)</option>
                        <option value="price-low">Prix croissant</option>
                        <option value="price-high">Prix décroissant</option>
                    </select>
                </div>
            </div>
        </div>
    </section>
    <?php else : ?>
    <!-- Simple header when only one category -->
    <section class="simple-header bg-gray-50 dark:bg-gray-800 py-8 border-b border-gray-200 dark:border-gray-700">
        <div class="container mx-auto px-6">
            <div class="flex justify-center">
                <!-- Sort Options Only -->
                <div class="flex items-center gap-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Trier par:</span>
                    <select id="sortProducts" class="px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white text-sm">
                        <option value="date">Plus récents</option>
                        <option value="title">Nom (A-Z)</option>
                        <option value="price-low">Prix croissant</option>
                        <option value="price-high">Prix décroissant</option>
                    </select>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Products Grid -->
    <section class="products-section py-16 bg-white dark:bg-gray-900">
        <div class="container mx-auto px-6">
            
            <!-- Loading Indicator -->
            <div id="loading" class="hidden text-center py-8">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-rose-600"></div>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Chargement...</p>
            </div>

            <!-- Products Grid -->
            <div id="products-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <?php
                $products_query = new WP_Query(array(
                    'post_type'      => 'product',
                    'posts_per_page' => -1, // Show all products
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                ));

                if ($products_query->have_posts()) :
                    while ($products_query->have_posts()) : $products_query->the_post();
                        // Get product meta
                        $price = get_post_meta(get_the_ID(), '_product_price', true);
                        $size = get_post_meta(get_the_ID(), '_product_size', true);
                        $availability = get_post_meta(get_the_ID(), '_product_availability', true);
                        $categories = get_the_terms(get_the_ID(), 'product_category');
                        $category_slugs = $categories ? implode(' ', wp_list_pluck($categories, 'slug')) : '';
                        
                        // Availability styling
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
                                $availability_text = 'Rupture';
                                $availability_icon = '❌';
                                break;
                            default:
                                $availability_class = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200';
                                $availability_text = 'Disponible';
                                $availability_icon = '✅';
                        }
                ?>
                        <article class="product-item bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group"
                                 data-category="<?php echo esc_attr($category_slugs); ?>"
                                 data-price="<?php echo esc_attr($price ? $price : '0'); ?>"
                                 data-title="<?php echo esc_attr(get_the_title()); ?>"
                                 data-availability="<?php echo esc_attr($availability); ?>">
                            
                            <!-- Product Image -->
                            <div class="relative overflow-hidden">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('product-medium', array(
                                            'class' => 'w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300',
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
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold <?php echo $availability_class; ?>">
                                        <?php echo $availability_icon . ' ' . $availability_text; ?>
                                    </span>
                                </div>

                                <!-- Quick View Button -->
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <a href="<?php the_permalink(); ?>" 
                                       class="bg-white text-gray-900 px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                                        Voir détails
                                    </a>
                                </div>
                            </div>

                            <!-- Product Info -->
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                                    <?php echo wp_trim_words(get_the_excerpt(), 12, '...'); ?>
                                </p>

                                <div class="flex items-center justify-between mb-4">
                                    <?php if ($size) : ?>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">
                                            📦 <?php echo esc_html($size); ?>
                                        </span>
                                    <?php endif; ?>
                                    
                                    <?php if ($price) : ?>
                                        <span class="text-lg font-bold text-rose-600 dark:text-rose-400">
                                            <?php echo number_format((float)$price, 2, ',', ' '); ?> TND
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <!-- Categories -->
                                <?php if ($categories) : ?>
                                    <div class="flex flex-wrap gap-1 mb-4">
                                        <?php foreach ($categories as $category) : ?>
                                            <span class="text-xs bg-rose-100 dark:bg-rose-900 text-rose-800 dark:text-rose-200 px-2 py-1 rounded">
                                                <?php echo $category->name; ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Action Button -->
                                <?php if ($availability !== 'out_of_stock') : ?>
                                    <a href="<?php the_permalink(); ?>" 
                                       class="w-full bg-rose-600 dark:bg-rose-500 text-white text-center py-2 px-4 rounded-lg hover:bg-rose-700 dark:hover:bg-rose-600 transition-colors font-medium text-sm">
                                        Découvrir
                                    </a>
                                <?php else : ?>
                                    <button disabled 
                                            class="w-full bg-gray-300 dark:bg-gray-600 text-gray-500 dark:text-gray-400 text-center py-2 px-4 rounded-lg cursor-not-allowed font-medium text-sm">
                                        Indisponible
                                    </button>
                                <?php endif; ?>
                            </div>
                        </article>
                <?php endwhile; ?>
                <?php else : ?>
                    <!-- No Products -->
                    <div class="col-span-full text-center py-16">
                        <div class="text-6xl mb-4">🍯</div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Aucun produit trouvé</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Nos délicieuses confitures arrivent bientôt !
                        </p>
                    </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>

            <!-- Load More Button (for future pagination) -->
            <div class="text-center mt-12">
                <button id="loadMore" class="hidden bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white px-6 py-3 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors font-medium">
                    Charger plus de produits
                </button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section bg-rose-50 dark:bg-gray-800 py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                Envie de Commander ?
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 max-w-2xl mx-auto">
                Contactez-nous pour passer commande ou pour toute question sur nos produits artisanaux.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="mailto:contact@loulouconfiture.com" 
                   class="bg-rose-600 dark:bg-rose-500 text-white px-6 py-3 rounded-lg hover:bg-rose-700 dark:hover:bg-rose-600 transition-colors font-medium">
                    📧 Envoyer un Email
                </a>
                <a href="tel:+33123456789" 
                   class="bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white px-6 py-3 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors font-medium">
                    📞 Appeler
                </a>
            </div>
        </div>
    </section>

</main>

<!-- JavaScript for filtering and sorting -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const sortSelect = document.getElementById('sortProducts');
    const productsGrid = document.getElementById('products-grid');
    const loadingIndicator = document.getElementById('loading');
    
    // Filter functionality
    window.filterProducts = function(category) {
        const products = document.querySelectorAll('.product-item');
        
        // Update active filter button
        filterButtons.forEach(btn => btn.classList.remove('active', 'bg-rose-600', 'text-white'));
        filterButtons.forEach(btn => btn.classList.add('bg-gray-100', 'dark:bg-gray-800', 'text-gray-700', 'dark:text-gray-300'));
        
        event.target.classList.add('active', 'bg-rose-600', 'text-white');
        event.target.classList.remove('bg-gray-100', 'dark:bg-gray-800', 'text-gray-700', 'dark:text-gray-300');
        
        // Filter products
        products.forEach(product => {
            const productCategories = product.dataset.category;
            if (category === 'all' || productCategories.includes(category)) {
                product.style.display = 'block';
                product.style.animation = 'fadeIn 0.3s ease-in';
            } else {
                product.style.display = 'none';
            }
        });
    };
    
    // Sort functionality
    sortSelect.addEventListener('change', function() {
        const sortBy = this.value;
        const products = Array.from(document.querySelectorAll('.product-item'));
        
        products.sort((a, b) => {
            switch(sortBy) {
                case 'title':
                    return a.dataset.title.localeCompare(b.dataset.title);
                case 'price-low':
                    return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                case 'price-high':
                    return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                default: // date
                    return 0; // Keep original order
            }
        });
        
        // Re-append sorted products
        products.forEach(product => productsGrid.appendChild(product));
    });
});

// Add fadeIn animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);
</script>

<?php get_footer(); ?>