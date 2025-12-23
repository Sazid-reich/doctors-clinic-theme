<?php
/**
 * Main blog template
 */
get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
        if (have_posts()) {
            
            if (is_home() && !is_front_page()) {
                ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>
                <?php
            }
            
            // Start the Loop
            while (have_posts()) {
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php
                        if (is_singular()) {
                            the_title('<h1 class="entry-title">', '</h1>');
                        } else {
                            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                        }
                        ?>
                        <div class="entry-meta">
                            <?php
                            doctors_clinic_posted_on();
                            doctors_clinic_posted_by();
                            ?>
                        </div>
                    </header>

                    <div class="entry-content">
                        <?php
                        the_content(
                            sprintf(
                                wp_kses(
                                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'doctors-clinic'),
                                    array('span' => array('class' => array()))
                                ),
                                wp_kses_post(get_the_title())
                            )
                        );
                        
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'doctors-clinic'),
                            'after' => '</div>',
                        ));
                        ?>
                    </div>

                    <footer class="entry-footer">
                        <?php doctors_clinic_entry_footer(); ?>
                    </footer>
                </article>
                <?php
            }
            
            // Navigation
            the_posts_navigation();
            
        } else {
            get_template_part('template-parts/content', 'none');
        }
        ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();
?>