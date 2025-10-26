    </div><!-- #content -->

    <footer id="colophon" class="site-footer bg-gray-800 dark:bg-gray-950 text-white py-8 mt-auto transition-colors duration-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="footer-content grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-center sm:text-left">
                <div class="footer-info">
                    <!-- Logo Component -->
                    <div class="mb-6">
                        <div class="inline-block">
                            <h3 class="text-3xl font-bold text-white m-0">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="no-underline hover:text-rose-300 transition-colors flex items-center justify-center sm:justify-start group">
                                    
                                    <?php if (has_custom_logo()) : ?>
                                        <!-- Custom uploaded logo -->
                                        <div class="logo-container max-w-[300px] transition-transform group-hover:scale-105">
                                            <?php 
                                            $custom_logo_id = get_theme_mod('custom_logo');
                                            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                                            if ($logo) : ?>
                                                <img src="<?php echo esc_url($logo[0]); ?>" 
                                                     alt="<?php echo esc_attr(get_bloginfo('name')); ?>" 
                                                     class="h-auto max-h-24 w-auto brightness-0 invert">
                                            <?php endif; ?>
                                        </div>
                                    <?php else : ?>
                                        <!-- Text logo with jam jar icon -->
                                        <span class="flex items-center">
                                            <span class="text-5xl mr-4 transform transition-transform group-hover:rotate-12">🍯</span>
                                            <span class="font-serif text-3xl tracking-tight text-white">
                                                <?php bloginfo('name'); ?>
                                            </span>
                                        </span>
                                    <?php endif; ?>
                                </a>
                            </h3>
                        </div>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed"><?php bloginfo('description'); ?></p>
                </div>
                
                <div class="footer-navigation">
                    <h3 class="text-xl font-bold text-rose-400 mb-4">Navigation</h3>
                    <div class="footer-menu">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'container'      => false,
                                'menu_class'     => 'space-y-2 text-sm',
                                'fallback_cb'    => false,
                            )
                        );
                        ?>
                    </div>
                </div>
                
                <div class="footer-contact sm:col-span-2 lg:col-span-1">
                    <h3 class="text-xl font-bold text-rose-400 mb-4">Contact</h3>
                    <div class="text-gray-300 text-sm space-y-2">
                        <p>📧 bonjour@loulouconfiture.com</p>
                        <p>📞 +216 93 930 930</p>
                        <p>📍 Boumhal Ben Arous Tunisie</p>
                        <div class="pt-4 border-t border-gray-700 mt-4">
                            <p>
                                © <?php echo date('Y'); ?> <?php bloginfo('name'); ?><br>
                                <span class="text-xs">Tous droits réservés.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<!-- Floating Dark Mode Toggle -->
<?php include get_template_directory() . '/resources/partials/dark-mode-toggle.php'; ?>

<?php wp_footer(); ?>

</body>
</html>