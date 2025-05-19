<!-- 
Template Name: om mig
-->
<?php get_header(); ?>
<div class="container">
    <div class="content-area">
        <main class="site-main">
            <section class="ommig-content">
                <h1 class="h1-u">
                    <?php echo esc_html(get_field('overskrift')); ?>
                </h1>
                <div class="afsnit1">
                    <div class="left text-section">
                        <h1><?php echo esc_html(get_field('overskrift2')); ?></h1>
                        <p><?php echo wp_kses_post(get_field('tekst1')); ?></p>
                    </div>
                    <div class="right">

                        <?php
                        $billede = get_field('portraet');
                        if ($billede) {
                            echo '<img src="' . esc_url($billede['url']) . '" alt="' . esc_attr($billede['alt']) . '">';
                        }
                        ?>

                    </div>
                </div>
                <?php
                $youtube_link = get_field('video_link');

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