<?php

/**
 * Doctor's Clinic Theme Functions
 */

// Theme setup
function doctors_clinic_setup()
{
    // Make theme translation ready
    load_theme_textdomain('doctors-clinic', get_template_directory() . '/languages');

    // Add theme supports
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height' => 80,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'doctors-clinic'),
        'footer' => __('Footer Menu', 'doctors-clinic'),
    ));
}
add_action('after_setup_theme', 'doctors_clinic_setup');

// Enqueue styles and scripts
function doctors_clinic_scripts()
{
    // Main stylesheet
    wp_enqueue_style('doctors-clinic-style', get_stylesheet_uri());
    wp_enqueue_style('doctors-clinic-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');

    // Main JavaScript
    wp_enqueue_script('doctors-clinic-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'doctors_clinic_scripts');

// Register widget areas
function doctors_clinic_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar', 'doctors-clinic'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here', 'doctors-clinic'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'doctors_clinic_widgets_init');

// Post meta information - when post was published
function doctors_clinic_posted_on()
{
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    printf(
        wp_kses_post(__('Posted on %s', 'doctors-clinic')),
        sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        )
    );
}

// Post author information
function doctors_clinic_posted_by()
{
    printf(
        wp_kses_post(__('by %s', 'doctors-clinic')),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );
}

// Post footer with categories and tags
function doctors_clinic_entry_footer()
{
    // Category
    if ('post' === get_post_type()) {
        $categories = get_the_category();
        if ($categories) {
            echo '<span class="cat-links">';
            echo wp_kses_post(__('Categories: ', 'doctors-clinic'));
            echo join(', ', array_map(function ($cat) {
                return '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' . esc_html($cat->name) . '</a>';
            }, $categories));
            echo '</span>';
        }
    }

    // Tags
    $tags = get_the_tags();
    if ($tags) {
        echo '<span class="tags-links">';
        echo wp_kses_post(__('Tags: ', 'doctors-clinic'));
        echo join(', ', array_map(function ($tag) {
            return '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a>';
        }, $tags));
        echo '</span>';
    }
}
