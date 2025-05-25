<?php
/*
Template Name: udkørende
*/
get_header(); ?>
<div class="container">
    <div class="content-area">
        <main class="site-main">
            <section class="udkoerende-content">
                <div class="section1">
                    <div class="left text-section">
                        <h1><?php echo esc_html(get_field('overskrift')); ?></h1>
                        <p><?php echo wp_kses_post(get_field('tekst1')); ?></p>

                        <a href="https://massage-kropsterapi-fyn.planway.com/" class="btn-cta">Book din tid i dag</a>

                    </div>
                    <div class="right">
                        <?php
                        $omradebillede = get_field('omradekort');
                        if ($omradebillede) {
                            echo '<img src="' . esc_url($omradebillede['url']) . '" alt="' . esc_attr($omradebillede['alt']) . '">';
                        }
                        ?>
                    </div>
                </div>

                <hr class="section-divider">

                <div class="section2">
                    <div class="left">
                        <?php
                        $billede = get_field('billede1');
                        if ($billede) {
                            echo '<img class="center-img" src="' . esc_url($billede['url']) . '" alt="' . esc_attr($billede['alt']) . '">';
                        }
                        ?>
                    </div>
                    <div class="right text-section">
                        <h1><?php echo esc_html(get_field('overskrift2')); ?></h1>
                        <p><?php echo wp_kses_post(get_field('tekst2')); ?></p>

                        <a href="https://massage-kropsterapi-fyn.planway.com/" class="btn-cta">Book din tid i dag</a>

                    </div>
                </div>
                <hr class="section-divider">

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
            </section>
        </main>
    </div>
</div>

<?php get_footer(); ?>