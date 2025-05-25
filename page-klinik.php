<!-- 
Template Name: Klinik
-->
<?php get_header(); ?>
<div class="container">
    <div class="content-area">
        <main class="site-main">
            <section class="klinik-content">
                <div class="section2">
                    <div class="left text-section">
                        <h1><?php echo esc_html(get_field('overskrift')); ?></h1>
                        <p><?php echo wp_kses_post(get_field('tekst1')); ?></p>

                        <p><?php echo wp_kses_post(get_field('tekst2')); ?></p>

                    </div>
                    <hr class="section-divider2">
                    <div class="right">
                        <div class="info">
                            <h2><?php echo esc_html(get_field('overskrift2')); ?></h2>
                        </div>
                        <?php
                        $args = array(
                            'post_type' => 'kontakt',
                            'posts_per_page' => 1,
                            'meta_query' => array(
                                array(
                                    'key' => 'udvalgt',
                                    'value' => '1',
                                    'compare' => '='
                                )
                            )
                        );

                        $kontakt_query = new WP_Query($args);

                        if ($kontakt_query->have_posts()) :
                            while ($kontakt_query->have_posts()) : $kontakt_query->the_post();
                                $icon = get_field('icon');
                                $link = get_field('link');
                                $info = get_field('information');
                        ?>
                                <div class="kontakt-info" style="margin: 3rem; margin-left: 0;">
                                    <div class="kontakt-item">
                                        <?php if ($icon): ?>
                                            <i class="mdi <?php echo esc_attr($icon); ?>"></i>
                                        <?php endif; ?>
                                        <?php if ($link): ?>
                                            <p><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($info); ?></a></p>
                                        <?php else: ?>
                                            <p><?php echo esc_html($info); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>

                        <div style="margin: 3rem 0;">
                            <iframe src="https://www.google.com/maps?q=Teglgårdsparken+104,+5500+Middelfart&output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>



                        <a href="https://massage-kropsterapi-fyn.planway.com/" class="btn-cta">Book din tid i dag</a>

                    </div>

                </div>
            </section>
            <div class="video-sektion">
                <h3><?php echo esc_html(get_field('videotekst')); ?></h3>
                <?php
                $youtube_link = get_field('video');

                if ($youtube_link) :
                    // Udtræk YouTube-videoens ID fra linket
                    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $youtube_link, $matches);
                    $youtube_id = $matches[1] ?? '';

                    if ($youtube_id) :
                ?>
                        <div class="youtube-wrapper">
                            <iframe src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_id); ?>"
                                title="YouTube video"
                                allowfullscreen
                                loading="lazy"
                                frameborder="0"></iframe>
                        </div>
                <?php
                    else :
                        echo '<p style="color:red;">Kunne ikke finde YouTube-videoens ID.</p>';
                    endif;
                endif;
                ?>
            </div>
        </main>
    </div>
</div>
<?php get_footer(); ?>