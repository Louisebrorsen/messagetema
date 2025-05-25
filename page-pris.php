<?php
/*
Template Name: priser
*/
get_header(); ?>

<section class="prisoversigt">
    <div class="container">
        <h2 class="h1-u">Priser</h2>
        <p class="text-section prisbeskrivelse"> <?php echo esc_html(get_field('prisbeskrivelse')); ?></p>
        <div class="priskort-grid">
            <?php
            $args = array(
                'post_type' => 'pris',
                'posts_per_page' => -1,
                'meta_key' => 'sorteringsnummer',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            );
            $priser = new WP_Query($args);

            if ($priser->have_posts()):
                while ($priser->have_posts()): $priser->the_post();
                    // Hent ACF-felter
                    $antal1 = get_field('antal1');
                    $antal2 = get_field('antal2');
                    $antal3 = get_field('antal3');
                    $antal4 = get_field('antal4');
                    $pris30 = get_field('pris_30_min');
                    $pris45 = get_field('pris_45_min');
                    $pris60 = get_field('pris_60_min');
                    $pris90 = get_field('pris_90_min');
                    $beskrivelse = get_field('kort_beskrivelse');
            ?>
                    <article class="priskort">
                        <h3><?php the_title(); ?></h3>

                        <ul class="prisliste">
                            <?php if ($pris30): ?><li><span class="minutter"><?php echo esc_html($antal1); ?></span><span class="pris"><?php echo esc_html($pris30); ?> kr.</span></li><?php endif; ?>
                            <?php if ($pris45): ?><li><span class="minutter"><?php echo esc_html($antal2); ?></span><span class="pris"><?php echo esc_html($pris45); ?> kr.</span></li><?php endif; ?>
                            <?php if ($pris60): ?><li><span class="minutter"><?php echo esc_html($antal3); ?></span><span class="pris"><?php echo esc_html($pris60); ?> kr.</span></li><?php endif; ?>
                            <?php if ($pris90): ?><li><span class="minutter"><?php echo esc_html($antal4); ?></span><span class="pris"><?php echo esc_html($pris90); ?> kr.</span></li><?php endif; ?>
                        </ul>


                        <div class="small-btn-cta">
                            <a href="https://massage-kropsterapi-fyn.planway.com/">Book din tid i dag</a>
                        </div>
                        <?php if ($beskrivelse): ?>
                            <p class="kort-beskrivelse"><?php echo esc_html($beskrivelse); ?></p>
                        <?php endif; ?>


                    </article>

            <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p style="color: red;">Ingen priser fundet.</p>';
            endif;
            ?>
        </div>


        <div class="afsnit2">
            <div class="blue-box-wrapper2">
                <div class="blue-box2">
                    <div class="gavekort-sektion">
                        <h1><?php echo esc_html(get_field('gavekorttitel')); ?> </h1>
                        <p><?php echo wp_kses_post(get_field('gavekortbeskrivelse', false, false)); ?></p>
                        <a href="/kontakt" class="btn-cta">Kontakt mig for at høre mere</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="text-section" style="margin-top: 6rem;">
            <?php get_template_part('templates/afbud'); ?>
        </div>
</section>

<?php get_footer(); ?>