<?php
/**
 * Logo Component
 * 
 * @package LoulouTheme
 */
?>

<div class="site-branding">
    <h1 class="site-title text-2xl font-bold text-rose-600 dark:text-rose-400 m-0">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="no-underline hover:text-rose-700 dark:hover:text-rose-300 transition-colors flex items-center group">
            
            <?php if (has_custom_logo()) : ?>
                <!-- Custom uploaded logo -->
                <div class="logo-container max-w-[200px] transition-transform group-hover:scale-105">
                    <?php 
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    if ($logo) : ?>
                        <img src="<?php echo esc_url($logo[0]); ?>" 
                             alt="<?php echo esc_attr(get_bloginfo('name')); ?>" 
                             class="h-auto max-h-12 w-auto">
                    <?php endif; ?>
                </div>
            <?php else : ?>
                <!-- Text logo with jam jar icon -->
                <span class="flex items-center">
                    <span class="text-3xl mr-3 transform transition-transform group-hover:rotate-12">�</span>
                    <span class="font-serif text-3xl tracking-tight">
                        <?php bloginfo('name'); ?>
                    </span>
                </span>
            <?php endif; ?>
        </a>
    </h1>
    
    <?php
    $loulou_description = get_bloginfo('description', 'display');
    if ($loulou_description || is_customize_preview()) :
    ?>
        <p class="site-description text-sm text-gray-600 dark:text-gray-400 m-0 mt-1 hidden sm:block font-light italic transition-colors">
            <?php echo $loulou_description; ?>
        </p>
    <?php endif; ?>
</div>