<?php
/**
 * Single post template
 */
get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
        while (have_posts()) {
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    <div class="entry-meta">
                        <?php
                        doctors_clinic_posted_on();
                        doctors_clinic_posted_by();
                        ?>
                    </div>
                </header>

                <div class="entry-content">
                    <?php
                    the_content();
                    
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
            
            // Navigation
            the_post_navigation(array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'doctors-clinic') . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'doctors-clinic') . '</span> <span class="nav-title">%title</span>',
            ));
            
            // Comments
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
        }
        ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();
?>