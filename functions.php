<?php

/**
 * Load template tags
 */
require get_template_directory() . '/template-tags.php';
/**
 * Doctor's Clinic Theme Functions
 *
 * @package Doctors_Clinic
 */

if (!defined('DOCTORS_CLINIC_VERSION')) {
    define('DOCTORS_CLINIC_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function doctors_clinic_setup() {
    // Make theme translation ready
    load_theme_textdomain('doctors-clinic', get_template_directory() . '/languages');
    
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');
    
    // Add support for custom logo
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
    
    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
    
    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height' => 250,
        'width' => 250,
        'flex-width' => true,
        'flex-height' => true,
    ));
    
    // Add support for Block Styles
    add_theme_support('wp-block-styles');
    
    // Add support for full and wide align images
    add_theme_support('align-wide');
    
    // Add support for responsive embedded content
    add_theme_support('responsive-embeds');
    
    // Add support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    ));
    
    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ));
    
    // Add support for editor styles
    add_theme_support('editor-styles');
    
    // Enqueue editor styles
    add_editor_style('assets/css/editor-style.css');
}
add_action('after_setup_theme', 'doctors_clinic_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function doctors_clinic_content_width() {
    $GLOBALS['content_width'] = apply_filters('doctors_clinic_content_width', 1200);
}
add_action('after_setup_theme', 'doctors_clinic_content_width', 0);

/**
 * Register widget area.
 */
function doctors_clinic_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'doctors-clinic'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here.', 'doctors-clinic'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
    // Footer widgets
    register_sidebar(array(
        'name' => __('Footer Widget Area 1', 'doctors-clinic'),
        'id' => 'footer-1',
        'description' => __('Add widgets here for footer column 1.', 'doctors-clinic'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Widget Area 2', 'doctors-clinic'),
        'id' => 'footer-2',
        'description' => __('Add widgets here for footer column 2.', 'doctors-clinic'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Widget Area 3', 'doctors-clinic'),
        'id' => 'footer-3',
        'description' => __('Add widgets here for footer column 3.', 'doctors-clinic'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'doctors_clinic_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function doctors_clinic_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('doctors-clinic-style', get_stylesheet_uri(), array(), DOCTORS_CLINIC_VERSION);
    wp_enqueue_style('doctors-clinic-main', get_template_directory_uri() . '/assets/css/main.css', array(), DOCTORS_CLINIC_VERSION);
    
    // Enqueue main JavaScript
    wp_enqueue_script('doctors-clinic-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), DOCTORS_CLINIC_VERSION, true);
    wp_enqueue_script('doctors-clinic-main', get_template_directory_uri() . '/assets/js/main.js', array(), DOCTORS_CLINIC_VERSION, true);
    
    // Add comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'doctors_clinic_scripts');

/**
 * Implement the Custom Header feature.
 */
function doctors_clinic_custom_header_setup() {
    add_theme_support('custom-header', apply_filters('doctors_clinic_custom_header_args', array(
        'default-image' => '',
        'default-text-color' => '1a6a8d',
        'width' => 1200,
        'height' => 250,
        'flex-height' => true,
        'wp-head-callback' => 'doctors_clinic_header_style',
    )));
}
add_action('after_setup_theme', 'doctors_clinic_custom_header_setup');

/**
 * Styles the header image and text displayed on the blog.
 */
function doctors_clinic_header_style() {
    $header_text_color = get_header_textcolor();
    
    // If no custom options for text are set, let's bail
    if (get_theme_support('custom-header', 'default-text-color') === $header_text_color) {
        return;
    }
    
    // If we get this far, we have custom styles. Let's do this.
    ?>
    <style type="text/css">
    <?php
    // Has the text been hidden?
    if (!display_header_text()) :
        ?>
        .site-title,
        .site-description {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
        }
    <?php
    // If the user has set a custom color for the text use that.
    else :
        ?>
        .site-title a,
        .site-description {
            color: #<?php echo esc_attr($header_text_color); ?>;
        }
    <?php endif; ?>
    </style>
    <?php
}

/**
 * Add custom image sizes.
 */
function doctors_clinic_custom_image_sizes() {
    add_image_size('doctors-clinic-featured', 1200, 800, true);
    add_image_size('doctors-clinic-thumbnail', 300, 200, true);
}
add_action('after_setup_theme', 'doctors_clinic_custom_image_sizes');

/**
 * Add body classes.
 */
function doctors_clinic_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    
    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }
    
    // Add class for sticky posts
    if (is_sticky() && is_home() && !is_paged()) {
        $classes[] = 'sticky';
    }
    
    return $classes;
}
add_filter('body_class', 'doctors_clinic_body_classes');

/**
 * Add pingback url auto-discovery header for singularly identifiable articles.
 */
function doctors_clinic_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'doctors_clinic_pingback_header');

/**
 * Register block patterns
 */
function doctors_clinic_register_block_patterns() {
    if (!function_exists('register_block_pattern')) {
        return;
    }
    
    register_block_pattern(
        'doctors-clinic/hero-section',
        array(
            'title' => __('Hero Section', 'doctors-clinic'),
            'description' => __('A hero section for medical clinics.', 'doctors-clinic'),
            'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}}},"backgroundColor":"light-blue"} -->
            <div class="wp-block-group alignfull has-light-blue-background-color has-background" style="padding-top:80px;padding-bottom:80px"><!-- wp:heading {"textAlign":"center","level":1} -->
            <h1 class="has-text-align-center">Quality Healthcare for Your Family</h1>
            <!-- /wp:heading --></div>
            <!-- /wp:group -->',
            'categories' => array('hero'),
            'keywords' => array('hero', 'medical', 'clinic'),
        )
    );
}
add_action('init', 'doctors_clinic_register_block_patterns');

/**
 * Register block styles
 */
function doctors_clinic_register_block_styles() {
    if (!function_exists('register_block_style')) {
        return;
    }
    
    // Button block style
    register_block_style(
        'core/button',
        array(
            'name' => 'medical-button',
            'label' => __('Medical Style', 'doctors-clinic'),
            'style_handle' => 'doctors-clinic-style',
        )
    );
}
add_action('init', 'doctors_clinic_register_block_styles');
?>