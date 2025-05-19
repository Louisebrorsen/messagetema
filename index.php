<?php get_header(); ?>
<!-- Hero med Video og knap -->
<section class="hero-sektion">

    <?php
    $herovideo = get_field('herovideo');
    if ($herovideo): ?>
        <div class="hero-video-wrapper">
            <video autoplay muted loop width="100%">
                <source src="<?php echo esc_url($herovideo['url']); ?>" type="<?php echo esc_attr($herovideo['mime_type']); ?>">
                Your browser does not support the video tag.
            </video>
        </div>
    <?php endif; ?>

    <div class="hero-content">
        <?php if (get_field('cta-link') && get_field('cta-text')): ?>
            <a class="btn-cta" href="<?php echo esc_url(get_field('cta-link')); ?>">
                <?php echo esc_html(get_field('cta-text')); ?>
            </a>
        <?php endif; ?>
    </div>

</section>

<section class="text-section">
    <div class="container">
        <?php if (get_field('text_section')): ?>
            <div class="content">
                <p> <?php echo get_field('text_section'); ?> </p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Behandlingsformer grid indsat - Kan findes under templates-->
<?php get_template_part('templates/behandlingsformer'); ?>



<!-- Google anmeldelser -->
<section class="reviews-section">
    <div class="container">
        <h2>Anmeldelser</h2>
        <?php
        // Hent ACF-feltet
        $google_reviews_shortcode = get_field('google_reviews_shortcode');

        // Tjek om der er indhold i feltet
        if ($google_reviews_shortcode): ?>
            <div class="google-reviews">
                <?php echo do_shortcode($google_reviews_shortcode); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>