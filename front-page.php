<?php
/**
 * Front page template
 */
get_header();
?>

<main id="primary" class="site-main">

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title"><?php esc_html_e('Quality Healthcare for Your Family', 'doctors-clinic'); ?></h1>
            <p class="hero-description"><?php esc_html_e('Compassionate medical care with over 15 years of experience serving our community. Your health is our priority.', 'doctors-clinic'); ?></p>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('appointments'))); ?>" class="button button-primary">
                <?php esc_html_e('Book Appointment', 'doctors-clinic'); ?>
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section section-padding">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('About Our Clinic', 'doctors-clinic'); ?></h2>
            <div class="about-content">
                <div class="about-item">
                    <h3><?php esc_html_e('Our Mission', 'doctors-clinic'); ?></h3>
                    <p><?php esc_html_e('To provide comprehensive, compassionate healthcare that improves the quality of life for every patient we serve. We believe in treating the whole person, not just symptoms.', 'doctors-clinic'); ?></p>
                </div>
                <div class="about-item">
                    <h3><?php esc_html_e('15+ Years Experience', 'doctors-clinic'); ?></h3>
                    <p><?php esc_html_e('Founded in 2005, our clinic has been a trusted healthcare provider in the community. Our experienced team combines traditional values with modern medical practices.', 'doctors-clinic'); ?></p>
                </div>
                <div class="about-item">
                    <h3><?php esc_html_e('Patient-Focused Approach', 'doctors-clinic'); ?></h3>
                    <p><?php esc_html_e('We take time to listen to our patients, understand their concerns, and develop personalized treatment plans. Your comfort and well-being are our top priorities.', 'doctors-clinic'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section section-padding bg-light">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Our Services', 'doctors-clinic'); ?></h2>
            <div class="services-grid">
                <div class="service-card">
                    <h3><?php esc_html_e('General Consultation', 'doctors-clinic'); ?></h3>
                    <p><?php esc_html_e('Comprehensive medical evaluations, diagnosis, and treatment for common illnesses and chronic conditions.', 'doctors-clinic'); ?></p>
                </div>
                <div class="service-card">
                    <h3><?php esc_html_e('Pediatrics', 'doctors-clinic'); ?></h3>
                    <p><?php esc_html_e('Specialized care for infants, children, and adolescents including vaccinations, wellness checks, and developmental assessments.', 'doctors-clinic'); ?></p>
                </div>
                <div class="service-card">
                    <h3><?php esc_html_e('Diagnostics', 'doctors-clinic'); ?></h3>
                    <p><?php esc_html_e('On-site laboratory testing, EKG, ultrasound, and referral coordination for specialized diagnostic procedures.', 'doctors-clinic'); ?></p>
                </div>
                <div class="service-card">
                    <h3><?php esc_html_e('Preventive Care', 'doctors-clinic'); ?></h3>
                    <p><?php esc_html_e('Annual physicals, health screenings, immunization programs, and personalized wellness plans to maintain optimal health.', 'doctors-clinic'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Doctors Section -->
    <section class="doctors-section section-padding">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Our Medical Team', 'doctors-clinic'); ?></h2>
            <div class="doctors-grid">
                <div class="doctor-card">
                    <h3>Dr. Sarah Johnson</h3>
                    <p class="doctor-specialty"><?php esc_html_e('Family Medicine Specialist', 'doctors-clinic'); ?></p>
                    <p><?php esc_html_e('Board-certified with 12 years of experience in family medicine. Special interest in preventive care and chronic disease management.', 'doctors-clinic'); ?></p>
                </div>
                <div class="doctor-card">
                    <h3>Dr. Michael Chen</h3>
                    <p class="doctor-specialty"><?php esc_html_e('Pediatrician', 'doctors-clinic'); ?></p>
                    <p><?php esc_html_e('Specialized in child healthcare for over 8 years. Focuses on developmental pediatrics and adolescent medicine.', 'doctors-clinic'); ?></p>
                </div>
                <div class="doctor-card">
                    <h3>Dr. Maria Rodriguez</h3>
                    <p class="doctor-specialty"><?php esc_html_e('Internal Medicine', 'doctors-clinic'); ?></p>
                    <p><?php esc_html_e('Over 15 years experience in internal medicine. Expertise in geriatric care and complex medical conditions.', 'doctors-clinic'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment CTA -->
    <section class="appointment-cta section-padding bg-accent">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Schedule Your Visit Today', 'doctors-clinic'); ?></h2>
            <p><?php esc_html_e('New patients are welcome. Same-day appointments available for urgent concerns.', 'doctors-clinic'); ?></p>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="button button-large">
                <?php esc_html_e('Contact Us for Appointment', 'doctors-clinic'); ?>
            </a>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="blog-section section-padding bg-light">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Health Articles & Updates', 'doctors-clinic'); ?></h2>
            <div class="blog-posts">
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 3,
                    'post_status' => 'publish',
                ));
                
                if ($recent_posts) {
                    foreach ($recent_posts as $post) {
                        ?>
                        <article class="blog-post">
                            <h3><a href="<?php echo esc_url(get_permalink($post['ID'])); ?>">
                                <?php echo esc_html($post['post_title']); ?>
                            </a></h3>
                            <div class="post-excerpt">
                                <?php echo esc_html(wp_trim_words($post['post_content'], 30)); ?>
                            </div>
                            <a href="<?php echo esc_url(get_permalink($post['ID'])); ?>" class="read-more">
                                <?php esc_html_e('Read More', 'doctors-clinic'); ?>
                            </a>
                        </article>
                        <?php
                    }
                } else {
                    echo '<p>' . esc_html__('No articles found.', 'doctors-clinic') . '</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Contact Info -->
    <section class="contact-section section-padding">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Contact Information', 'doctors-clinic'); ?></h2>
            <div class="contact-grid">
                <div class="contact-item">
                    <h3><?php esc_html_e('Address', 'doctors-clinic'); ?></h3>
                    <p>123 Medical Center Drive<br>
                    Health City, HC 12345</p>
                </div>
                <div class="contact-item">
                    <h3><?php esc_html_e('Phone', 'doctors-clinic'); ?></h3>
                    <p>(123) 456-7890<br>
                    Emergency: (123) 456-7891</p>
                </div>
                <div class="contact-item">
                    <h3><?php esc_html_e('Email', 'doctors-clinic'); ?></h3>
                    <p>info@clinic.example.com<br>
                    appointments@clinic.example.com</p>
                </div>
                <div class="contact-item">
                    <h3><?php esc_html_e('Clinic Hours', 'doctors-clinic'); ?></h3>
                    <p>Mon-Fri: 8:00 AM - 6:00 PM<br>
                    Sat: 9:00 AM - 2:00 PM</p>
                </div>
            </div>
        </div>
    </section>

</main><!-- #primary -->

<?php
get_footer();
?>