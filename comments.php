<?php
/**
 * The template for displaying comments
 *
 * @package Doctors_Clinic
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $doctors_clinic_comment_count = get_comments_number();
            if ('1' === $doctors_clinic_comment_count) {
                printf(
                    esc_html__('One thought on &ldquo;%s&rdquo;', 'doctors-clinic'),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            } else {
                printf(
                    esc_html__('%1$s thoughts on &ldquo;%2$s&rdquo;', 'doctors-clinic'),
                    number_format_i18n($doctors_clinic_comment_count),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            }
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 60,
                'callback' => 'doctors_clinic_comment',
            ));
            ?>
        </ol>

        <?php
        the_comments_navigation();
        
        if (!comments_open()) :
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'doctors-clinic'); ?></p>
            <?php
        endif;
    endif;
    
    comment_form();
    ?>
</div>