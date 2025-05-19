<?php
/* Template Name: Blogside */
get_header();
?>

<main class="blog-archive container">
    <h1 class="h1-u">Blog</h1>

    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
    );
    $blog_query = new WP_Query($args);
    ?>

    <?php if ($blog_query->have_posts()) : ?>
        <div class="blog-grid">
            <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                <article class="blog-card">
                    <?php
                    // Find første billede som eksisterer
                    $billede = get_field('billede1') ?: get_field('billede2') ?: get_field('billede3') ?: get_field('billede4');
                    $kort_beskrivelse = get_field('beskrivelse');
                    ?>

                    <?php if ($billede): ?>
                        <img src="<?php echo esc_url($billede['url']); ?>" alt="">
                    <?php endif; ?>

                    <h2><?php the_title(); ?></h2>

                    <?php if (trim(strip_tags($kort_beskrivelse)) !== ''): ?>
                        <p><?php echo wp_kses_post($kort_beskrivelse); ?></p>
                    <?php endif; ?>


                    <a class="btn-cta" href="<?php the_permalink(); ?>">
                        <?php echo esc_html(isset($btn_text) ? $btn_text : 'Læs mere'); ?>
                    </a>

                </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    <?php else : ?>
        <p>Ingen blogindlæg fundet.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>