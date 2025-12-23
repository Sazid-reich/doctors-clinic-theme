        </div><!-- #content -->

        <footer id="colophon" class="site-footer">
            <div class="container">
                <div class="footer-widgets">
                    <div class="footer-widget">
                        <h3><?php echo esc_html(get_bloginfo('name')); ?></h3>
                        <p>Providing compassionate healthcare since 2005. Our clinic is dedicated to offering comprehensive medical services for the whole family.</p>
                    </div>
                    
                    <div class="footer-widget">
                        <h3><?php esc_html_e('Contact Info', 'doctors-clinic'); ?></h3>
                        <p>123 Medical Center Drive<br>
                        Health City, HC 12345<br>
                        Phone: (123) 456-7890<br>
                        Email: info@clinic.example.com</p>
                    </div>
                    
                    <div class="footer-widget">
                        <h3><?php esc_html_e('Hours', 'doctors-clinic'); ?></h3>
                        <p>Monday - Friday: 8:00 AM - 6:00 PM<br>
                        Saturday: 9:00 AM - 2:00 PM<br>
                        Sunday: Emergency only</p>
                    </div>
                </div>
                
                <div class="footer-bottom">
                    <p>&copy; <?php echo date('Y'); ?> <?php echo esc_html(get_bloginfo('name')); ?>. <?php esc_html_e('All rights reserved.', 'doctors-clinic'); ?></p>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_id' => 'footer-menu',
                        'container' => 'nav',
                        'depth' => 1,
                    ));
                    ?>
                </div>
            </div>
        </footer>
    </div><!-- #page -->

    <?php wp_footer(); ?>
</body>
</html>