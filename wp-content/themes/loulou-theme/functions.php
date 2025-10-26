<?php
function loulou_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'gallery', 'caption'));
    add_theme_support('automatic-feed-links');
    
    // Add custom logo support with dimensions
    add_theme_support('custom-logo', array(
        'height'      => 120,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add custom image sizes for products
    add_image_size('product-thumbnail', 400, 400, true);    // Square thumbnails for grid
    add_image_size('product-medium', 600, 600, true);       // Medium square for cards
    add_image_size('product-large', 800, 600, true);        // Large for single product
    add_image_size('product-hero', 1200, 800, true);        // Hero size for main displays

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'loulou-theme'),
    ));
}
add_action('after_setup_theme', 'loulou_theme_setup');

function loulou_theme_scripts() {
    wp_enqueue_style('loulou-theme-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue mobile navigation script
    wp_enqueue_script('loulou-mobile-nav', get_template_directory_uri() . '/resources/js/mobile-nav.js', array(), '1.0.0', true);
    
    // Enqueue contact form script and styles on contact page
    if (is_page('contact')) {
        wp_enqueue_script('loulou-contact-form', get_template_directory_uri() . '/resources/js/contact-form.js', array(), '1.0.0', true);
        wp_enqueue_style('loulou-contact-form-7', get_template_directory_uri() . '/resources/css/contact-form-7.css', array(), '1.0.0');
    }
    
    // Enqueue about page styles
    if (is_page('about') || is_page('a-propos')) {
        wp_enqueue_style('loulou-about-page', get_template_directory_uri() . '/resources/css/about-page.css', array(), '1.0.0');
    }
}
add_action('wp_enqueue_scripts', 'loulou_theme_scripts');

/**
 * Register Custom Post Type for Products (Jams)
 */
function loulou_register_products_post_type() {
    $labels = array(
        'name'                  => _x('Produits', 'Post type general name', 'loulou-theme'),
        'singular_name'         => _x('Produit', 'Post type singular name', 'loulou-theme'),
        'menu_name'             => _x('Nos Confitures', 'Admin Menu text', 'loulou-theme'),
        'name_admin_bar'        => _x('Produit', 'Add New on Toolbar', 'loulou-theme'),
        'add_new'               => __('Ajouter Nouveau', 'loulou-theme'),
        'add_new_item'          => __('Ajouter Nouveau Produit', 'loulou-theme'),
        'new_item'              => __('Nouveau Produit', 'loulou-theme'),
        'edit_item'             => __('Modifier Produit', 'loulou-theme'),
        'view_item'             => __('Voir Produit', 'loulou-theme'),
        'all_items'             => __('Tous les Produits', 'loulou-theme'),
        'search_items'          => __('Rechercher Produits', 'loulou-theme'),
        'parent_item_colon'     => __('Produits Parents:', 'loulou-theme'),
        'not_found'             => __('Aucun produit trouvé.', 'loulou-theme'),
        'not_found_in_trash'    => __('Aucun produit trouvé dans la corbeille.', 'loulou-theme'),
        'featured_image'        => _x('Image du Produit', 'Overrides the "Featured Image" phrase', 'loulou-theme'),
        'set_featured_image'    => _x('Définir image du produit', 'Overrides the "Set featured image" phrase', 'loulou-theme'),
        'remove_featured_image' => _x('Supprimer image du produit', 'Overrides the "Remove featured image" phrase', 'loulou-theme'),
        'use_featured_image'    => _x('Utiliser comme image du produit', 'Overrides the "Use as featured image" phrase', 'loulou-theme'),
        'archives'              => _x('Archives Produits', 'The post type archive label', 'loulou-theme'),
        'insert_into_item'      => _x('Insérer dans le produit', 'Overrides the "Insert into post" phrase', 'loulou-theme'),
        'uploaded_to_this_item' => _x('Téléchargé vers ce produit', 'Overrides the "Uploaded to this post" phrase', 'loulou-theme'),
        'filter_items_list'     => _x('Filtrer liste des produits', 'Screen reader text for the filter links', 'loulou-theme'),
        'items_list_navigation' => _x('Navigation liste des produits', 'Screen reader text for the pagination', 'loulou-theme'),
        'items_list'            => _x('Liste des produits', 'Screen reader text for the items list', 'loulou-theme'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'produits'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-carrot',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('product', $args);
}
add_action('init', 'loulou_register_products_post_type');

/**
 * Register Product Categories Taxonomy
 */
function loulou_register_product_categories() {
    $labels = array(
        'name'                       => _x('Catégories', 'Taxonomy General Name', 'loulou-theme'),
        'singular_name'              => _x('Catégorie', 'Taxonomy Singular Name', 'loulou-theme'),
        'menu_name'                  => __('Catégories', 'loulou-theme'),
        'all_items'                  => __('Toutes les Catégories', 'loulou-theme'),
        'parent_item'                => __('Catégorie Parente', 'loulou-theme'),
        'parent_item_colon'          => __('Catégorie Parente:', 'loulou-theme'),
        'new_item_name'              => __('Nom de Nouvelle Catégorie', 'loulou-theme'),
        'add_new_item'               => __('Ajouter Nouvelle Catégorie', 'loulou-theme'),
        'edit_item'                  => __('Modifier Catégorie', 'loulou-theme'),
        'update_item'                => __('Mettre à jour Catégorie', 'loulou-theme'),
        'view_item'                  => __('Voir Catégorie', 'loulou-theme'),
        'separate_items_with_commas' => __('Séparer les catégories avec des virgules', 'loulou-theme'),
        'add_or_remove_items'        => __('Ajouter ou supprimer catégories', 'loulou-theme'),
        'choose_from_most_used'      => __('Choisir parmi les plus utilisées', 'loulou-theme'),
        'popular_items'              => __('Catégories Populaires', 'loulou-theme'),
        'search_items'               => __('Rechercher Catégories', 'loulou-theme'),
        'not_found'                  => __('Non Trouvé', 'loulou-theme'),
        'no_terms'                   => __('Aucune catégorie', 'loulou-theme'),
        'items_list'                 => __('Liste des catégories', 'loulou-theme'),
        'items_list_navigation'      => __('Navigation liste des catégories', 'loulou-theme'),
    );
    
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
    );
    
    register_taxonomy('product_category', array('product'), $args);
}
add_action('init', 'loulou_register_product_categories');

/**
 * Add Custom Meta Box for Product Information
 */
function loulou_add_product_meta_boxes() {
    add_meta_box(
        'product_details',
        __('Détails du Produit', 'loulou-theme'),
        'loulou_product_details_callback',
        'product',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'loulou_add_product_meta_boxes');

/**
 * Meta Box Callback Function
 */
function loulou_product_details_callback($post) {
    // Add nonce for security
    wp_nonce_field('loulou_save_product_details', 'loulou_product_details_nonce');
    
    // Get current values
    $price = get_post_meta($post->ID, '_product_price', true);
    $size = get_post_meta($post->ID, '_product_size', true);
    $ingredients = get_post_meta($post->ID, '_product_ingredients', true);
    $allergens = get_post_meta($post->ID, '_product_allergens', true);
    $storage = get_post_meta($post->ID, '_product_storage', true);
    $availability = get_post_meta($post->ID, '_product_availability', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th scope="row"><label for="product_price"><?php _e('Prix (€)', 'loulou-theme'); ?></label></th>
            <td><input type="number" step="0.01" id="product_price" name="product_price" value="<?php echo esc_attr($price); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="product_size"><?php _e('Taille du Pot', 'loulou-theme'); ?></label></th>
            <td><input type="text" id="product_size" name="product_size" value="<?php echo esc_attr($size); ?>" class="regular-text" placeholder="ex: 250g, 370g" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="product_ingredients"><?php _e('Ingrédients', 'loulou-theme'); ?></label></th>
            <td><textarea id="product_ingredients" name="product_ingredients" rows="3" class="large-text"><?php echo esc_textarea($ingredients); ?></textarea></td>
        </tr>
        <tr>
            <th scope="row"><label for="product_allergens"><?php _e('Allergènes', 'loulou-theme'); ?></label></th>
            <td><input type="text" id="product_allergens" name="product_allergens" value="<?php echo esc_attr($allergens); ?>" class="regular-text" placeholder="ex: Peut contenir des traces de..." /></td>
        </tr>
        <tr>
            <th scope="row"><label for="product_storage"><?php _e('Conservation', 'loulou-theme'); ?></label></th>
            <td><input type="text" id="product_storage" name="product_storage" value="<?php echo esc_attr($storage); ?>" class="regular-text" placeholder="ex: À conserver au frais après ouverture" /></td>
        </tr>
        <tr>
            <th scope="row"><label for="product_availability"><?php _e('Disponibilité', 'loulou-theme'); ?></label></th>
            <td>
                <select id="product_availability" name="product_availability">
                    <option value="available" <?php selected($availability, 'available'); ?>><?php _e('Disponible', 'loulou-theme'); ?></option>
                    <option value="limited" <?php selected($availability, 'limited'); ?>><?php _e('Stock Limité', 'loulou-theme'); ?></option>
                    <option value="seasonal" <?php selected($availability, 'seasonal'); ?>><?php _e('Saisonnier', 'loulou-theme'); ?></option>
                    <option value="out_of_stock" <?php selected($availability, 'out_of_stock'); ?>><?php _e('Rupture de Stock', 'loulou-theme'); ?></option>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save Product Meta Data
 */
function loulou_save_product_details($post_id) {
    // Check nonce for security
    if (!isset($_POST['loulou_product_details_nonce']) || !wp_verify_nonce($_POST['loulou_product_details_nonce'], 'loulou_save_product_details')) {
        return;
    }
    
    // Check if user has permission to edit the post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Don't save on autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Save meta fields
    $fields = array('product_price', 'product_size', 'product_ingredients', 'product_allergens', 'product_storage', 'product_availability');
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'loulou_save_product_details');

/**
 * Flush rewrite rules on theme activation
 */
function loulou_flush_rewrite_rules() {
    loulou_register_products_post_type();
    loulou_register_product_categories();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'loulou_flush_rewrite_rules');

/**
 * Shortcode for displaying products grid anywhere
 * Usage: [products count="6" category="fruits" columns="3" show_price="yes" show_excerpt="yes"]
 */
function loulou_products_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count' => 6,
        'category' => '',
        'columns' => 3,
        'show_price' => 'yes',
        'show_excerpt' => 'yes',
        'orderby' => 'date',
        'order' => 'DESC'
    ), $atts);

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => intval($atts['count']),
        'orderby' => $atts['orderby'],
        'order' => $atts['order']
    );

    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_category',
                'field'    => 'slug',
                'terms'    => $atts['category'],
            ),
        );
    }

    $products = new WP_Query($args);
    
    if (!$products->have_posts()) {
        return '<p class="text-gray-600 dark:text-gray-400 text-center py-8">Aucun produit trouvé.</p>';
    }

    $columns_class = '';
    switch ($atts['columns']) {
        case '1':
            $columns_class = 'grid-cols-1';
            break;
        case '2':
            $columns_class = 'grid-cols-1 sm:grid-cols-2';
            break;
        case '4':
            $columns_class = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4';
            break;
        default:
            $columns_class = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3';
    }

    ob_start();
    ?>
    <div class="loulou-products-shortcode py-8">
        <div class="grid <?php echo $columns_class; ?> gap-8">
            <?php while ($products->have_posts()) : $products->the_post(); 
                $price = get_post_meta(get_the_ID(), '_product_price', true);
                $availability = get_post_meta(get_the_ID(), '_product_availability', true);
            ?>
                <article class="product-card bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow group">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="relative overflow-hidden">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('product-medium', array(
                                    'class' => 'w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300',
                                    'alt' => get_the_title(),
                                    'loading' => 'lazy'
                                )); ?>
                            </a>
                            
                            <?php if ($availability && $availability !== 'available') : ?>
                                <div class="absolute top-4 right-4">
                                    <?php if ($availability === 'limited') : ?>
                                        <span class="bg-yellow-500 text-white text-xs font-semibold px-2 py-1 rounded-full">⚠️ Limité</span>
                                    <?php elseif ($availability === 'seasonal') : ?>
                                        <span class="bg-orange-500 text-white text-xs font-semibold px-2 py-1 rounded-full">🌸 Saisonnier</span>
                                    <?php elseif ($availability === 'out_of_stock') : ?>
                                        <span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-full">❌ Rupture</span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                        <div class="w-full h-64 bg-gradient-to-br from-rose-200 to-orange-200 dark:from-rose-800 dark:to-orange-800 flex items-center justify-center">
                            <span class="text-6xl">🍯</span>
                        </div>
                    <?php endif; ?>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        
                        <?php if ($atts['show_excerpt'] === 'yes') : ?>
                            <p class="text-gray-600 dark:text-gray-400 mb-4 text-sm leading-relaxed">
                                <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                            </p>
                        <?php endif; ?>
                        
                        <div class="flex items-center justify-between">
                            <?php if ($atts['show_price'] === 'yes' && $price) : ?>
                                <span class="text-lg font-bold text-rose-600 dark:text-rose-400">
                                    <?php echo number_format((float)$price, 2, ',', ' '); ?>€
                                </span>
                            <?php endif; ?>
                            
                            <a href="<?php the_permalink(); ?>" 
                               class="text-rose-600 dark:text-rose-400 hover:text-rose-700 dark:hover:text-rose-300 font-medium text-sm transition-colors">
                                Voir détails →
                            </a>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('products', 'loulou_products_shortcode');

/**
 * Products Widget
 */
class Loulou_Products_Widget extends WP_Widget {
    
    public function __construct() {
        parent::__construct(
            'loulou_products_widget',
            'Loulou - Nos Confitures',
            array('description' => 'Afficher une sélection de vos confitures')
        );
    }
    
    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        
        $count = !empty($instance['count']) ? $instance['count'] : 3;
        $category = !empty($instance['category']) ? $instance['category'] : '';
        $show_price = !empty($instance['show_price']) ? 'yes' : 'no';
        
        echo do_shortcode("[products count='{$count}' category='{$category}' columns='1' show_price='{$show_price}' show_excerpt='no']");
        
        echo $args['after_widget'];
    }
    
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : 'Nos Confitures';
        $count = !empty($instance['count']) ? $instance['count'] : 3;
        $category = !empty($instance['category']) ? $instance['category'] : '';
        $show_price = !empty($instance['show_price']) ? $instance['show_price'] : false;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Titre:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>">Nombre de produits:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="number" value="<?php echo esc_attr($count); ?>" min="1" max="10">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('category'); ?>">Catégorie (slug):</label>
            <input class="widefat" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" type="text" value="<?php echo esc_attr($category); ?>" placeholder="ex: fruits, legumes">
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($show_price); ?> id="<?php echo $this->get_field_id('show_price'); ?>" name="<?php echo $this->get_field_name('show_price'); ?>" />
            <label for="<?php echo $this->get_field_id('show_price'); ?>">Afficher les prix</label>
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['count'] = (!empty($new_instance['count'])) ? intval($new_instance['count']) : 3;
        $instance['category'] = (!empty($new_instance['category'])) ? sanitize_text_field($new_instance['category']) : '';
        $instance['show_price'] = (!empty($new_instance['show_price'])) ? true : false;
        
        return $instance;
    }
}

/**
 * Register the widget
 */
function loulou_register_widgets() {
    register_widget('Loulou_Products_Widget');
}
add_action('widgets_init', 'loulou_register_widgets');

/**
 * Function to regenerate image sizes (run once after adding new sizes)
 * You can call this via admin or temporarily add it to functions.php
 */
function loulou_regenerate_product_images() {
    if (!current_user_can('manage_options')) {
        return;
    }
    
    $products = get_posts(array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'meta_key' => '_thumbnail_id'
    ));
    
    foreach ($products as $product) {
        $attachment_id = get_post_thumbnail_id($product->ID);
        if ($attachment_id) {
            $attachment_path = get_attached_file($attachment_id);
            if ($attachment_path && file_exists($attachment_path)) {
                // Regenerate all sizes
                $metadata = wp_generate_attachment_metadata($attachment_id, $attachment_path);
                wp_update_attachment_metadata($attachment_id, $metadata);
            }
        }
    }
}

// Uncomment the line below, visit your site once, then comment it back
// add_action('init', 'loulou_regenerate_product_images');

/**
 * Contact Form Handling
 */

// Create contact messages table on theme activation
function loulou_create_contact_table() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'contact_messages';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name tinytext NOT NULL,
        email varchar(100) NOT NULL,
        phone varchar(20) DEFAULT '',
        subject varchar(100) NOT NULL,
        message text NOT NULL,
        submitted_at datetime DEFAULT CURRENT_TIMESTAMP,
        status varchar(20) DEFAULT 'new',
        PRIMARY KEY (id)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Create table on theme activation
add_action('after_switch_theme', 'loulou_create_contact_table');

// Handle contact form submission
function handle_contact_form() {
    // Check nonce for security
    if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
        wp_die('Security check failed');
    }
    
    // Sanitize form data
    $name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['contact_email']);
    $phone = sanitize_text_field($_POST['contact_phone']);
    $subject = sanitize_text_field($_POST['contact_subject']);
    $message = sanitize_textarea_field($_POST['contact_message']);
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        wp_send_json_error('Veuillez remplir tous les champs obligatoires.');
        return;
    }
    
    if (!is_email($email)) {
        wp_send_json_error('Veuillez entrer une adresse email valide.');
        return;
    }
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_messages';
    
    // Insert into database
    $result = $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message,
            'submitted_at' => current_time('mysql')
        ),
        array('%s', '%s', '%s', '%s', '%s', '%s')
    );
    
    if ($result === false) {
        wp_send_json_error('Erreur lors de l\'enregistrement. Veuillez réessayer.');
        return;
    }
    
    // Send email notification
    $admin_email = get_option('admin_email');
    $site_name = get_bloginfo('name');
    
    $email_subject = sprintf('[%s] Nouveau message de contact de %s', $site_name, $name);
    
    $email_body = sprintf(
        "Nouveau message de contact reçu:\n\n" .
        "Nom: %s\n" .
        "Email: %s\n" .
        "Téléphone: %s\n" .
        "Sujet: %s\n\n" .
        "Message:\n%s\n\n" .
        "---\n" .
        "Ce message a été envoyé depuis le formulaire de contact de %s",
        $name,
        $email,
        $phone ?: 'Non fourni',
        $subject,
        $message,
        home_url()
    );
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $site_name . ' <' . $admin_email . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );
    
    wp_mail($admin_email, $email_subject, $email_body, $headers);
    
    wp_send_json_success('Votre message a été envoyé avec succès ! Nous vous répondrons bientôt.');
}

// Hook for logged in and non-logged in users
add_action('wp_ajax_handle_contact_form', 'handle_contact_form');
add_action('wp_ajax_nopriv_handle_contact_form', 'handle_contact_form');

// Add admin menu to view contact messages
function loulou_contact_admin_menu() {
    add_menu_page(
        'Messages de Contact',
        'Messages Contact',
        'manage_options',
        'contact-messages',
        'loulou_contact_messages_page',
        'dashicons-email-alt',
        30
    );
}
add_action('admin_menu', 'loulou_contact_admin_menu');

// Display contact messages in admin
function loulou_contact_messages_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_messages';
    
    // Handle status update
    if (isset($_GET['action']) && $_GET['action'] === 'mark_read' && isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $wpdb->update($table_name, array('status' => 'read'), array('id' => $id));
        echo '<div class="notice notice-success"><p>Message marqué comme lu.</p></div>';
    }
    
    $messages = $wpdb->get_results("SELECT * FROM $table_name ORDER BY submitted_at DESC");
    
    echo '<div class="wrap">';
    echo '<h1>Messages de Contact</h1>';
    
    if (empty($messages)) {
        echo '<p>Aucun message pour le moment.</p>';
    } else {
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr>';
        echo '<th>Date</th><th>Nom</th><th>Email</th><th>Sujet</th><th>Status</th><th>Actions</th>';
        echo '</tr></thead><tbody>';
        
        foreach ($messages as $msg) {
            $status_class = $msg->status === 'new' ? 'status-new' : 'status-read';
            echo '<tr class="' . $status_class . '">';
            echo '<td>' . date('d/m/Y H:i', strtotime($msg->submitted_at)) . '</td>';
            echo '<td><strong>' . esc_html($msg->name) . '</strong></td>';
            echo '<td><a href="mailto:' . esc_attr($msg->email) . '">' . esc_html($msg->email) . '</a></td>';
            echo '<td>' . esc_html($msg->subject) . '</td>';
            echo '<td><span class="status-badge ' . $msg->status . '">' . ucfirst($msg->status) . '</span></td>';
            echo '<td>';
            echo '<a href="?page=contact-messages&action=view&id=' . $msg->id . '" class="button">Voir</a> ';
            if ($msg->status === 'new') {
                echo '<a href="?page=contact-messages&action=mark_read&id=' . $msg->id . '" class="button">Marquer lu</a>';
            }
            echo '</td>';
            echo '</tr>';
            
            // Show message details if viewing
            if (isset($_GET['action']) && $_GET['action'] === 'view' && isset($_GET['id']) && $_GET['id'] == $msg->id) {
                echo '<tr><td colspan="6">';
                echo '<div style="background: #f9f9f9; padding: 15px; margin: 10px 0; border-left: 4px solid #0073aa;">';
                echo '<strong>Message complet:</strong><br>';
                echo '<p><strong>Téléphone:</strong> ' . esc_html($msg->phone ?: 'Non fourni') . '</p>';
                echo '<p><strong>Message:</strong></p>';
                echo '<div style="background: white; padding: 10px; border: 1px solid #ddd;">';
                echo nl2br(esc_html($msg->message));
                echo '</div></div></td></tr>';
            }
        }
        echo '</tbody></table>';
    }
    
    echo '</div>';
    
    // Add some admin CSS
    echo '<style>
        .status-badge.new { background: #d63638; color: white; padding: 3px 8px; border-radius: 3px; }
        .status-badge.read { background: #00a32a; color: white; padding: 3px 8px; border-radius: 3px; }
        .status-new { background-color: #fff2f2; }
    </style>';
}
