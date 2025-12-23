<?php
/**
 * Sidebar template
 */
if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar('sidebar-1'); ?>
    
    <section class="widget">
        <h2 class="widget-title"><?php esc_html_e('Emergency Information', 'doctors-clinic'); ?></h2>
        <p><?php esc_html_e('For life-threatening emergencies, please call 911 or visit the nearest emergency room.', 'doctors-clinic'); ?></p>
    </section>
    
    <section class="widget">
        <h2 class="widget-title"><?php esc_html_e('Quick Contact', 'doctors-clinic'); ?></h2>
        <p><?php esc_html_e('Phone: (123) 456-7890', 'doctors-clinic'); ?><br>
        <?php esc_html_e('Email: info@clinic.example.com', 'doctors-clinic'); ?></p>
    </section>
</aside>