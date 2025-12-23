<?php
/**
 * 404 template
 */
get_header();
?>

<main id="primary" class="site-main">
    <div class="container error-404 not-found">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Page Not Found', 'doctors-clinic'); ?></h1>
        </header>

        <div class="page-content">
            <p><?php esc_html_e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'doctors-clinic'); ?></p>
            
            <div class="search-form-wrapper">
                <?php get_search_form(); ?>
            </div>
            
            <div class="helpful-links">
                <h3><?php esc_html_e('You might find these helpful:', 'doctors-clinic'); ?></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home Page', 'doctors-clinic'); ?></a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>"><?php esc_html_e('Our Services', 'doctors-clinic'); ?></a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>"><?php esc_html_e('Contact Us', 'doctors-clinic'); ?></a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('appointments'))); ?>"><?php esc_html_e('Book Appointment', 'doctors-clinic'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>