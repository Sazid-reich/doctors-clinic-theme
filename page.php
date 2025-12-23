<?php
/**
 * Page template
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
            </article>
            <?php
            
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
        }
        ?>
    </div>
</main>

<?php
get_footer();
?>
