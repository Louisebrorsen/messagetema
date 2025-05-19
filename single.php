<?php
get_header();

// ACF-felter
$beskrivelse        = get_field('beskrivelse');
$overskrift1        = get_field('overskrift1');
$tekst1             = get_field('tekst1');
$billede1           = get_field('billede1');
$overskrift2        = get_field('overskrift2');
$tekst2             = get_field('tekst2');
$billede2           = get_field('billede2');
$overskrift3        = get_field('overskrift3');
$tekst3             = get_field('tekst3');
$billede3           = get_field('billede3');
$overskrift4        = get_field('overskrift4');
$tekst4             = get_field('tekst4');
$billede4           = get_field('billede4');
$videooverskrift    = get_field('videooverskrift');
$youtube_link       = get_field('video');
?>

<main class="blog-content container">

    <h1 class="h1-u"><?php the_title(); ?></h1>

  

    <?php for ($i = 1; $i <= 4; $i++) :
        $overskrift = get_field("overskrift$i");
        $tekst = get_field("tekst$i");
        $billede = get_field("billede$i");
    ?>
        <?php if ($overskrift || $tekst || $billede) : ?>
            <section class="blog-section">
                <?php if ($overskrift) : ?>
                    <h2><?php echo esc_html($overskrift); ?></h2>
                <?php endif; ?>

                <div class="blog-section-content">
                    <?php if ($tekst) : ?>
                        <div class="tekst"><?php echo wp_kses_post($tekst); ?></div>
                    <?php endif; ?>

                    <?php if ($billede) : ?>
                        <div class="billede">
                            <img src="<?php echo esc_url($billede['url']); ?>" alt="<?php echo esc_attr($billede['alt']); ?>">
                        </div>
                    <?php endif; ?>
                </div>
            </section>
            <?php
            // Tjek om der kommer flere afsnit bagefter med indhold
            $next = false;
            for ($j = $i + 1; $j <= 4; $j++) {
                if (get_field("overskrift$j") || get_field("tekst$j") || get_field("billede$j")) {
                    $next = true;
                    break;
                }
            }
            if ($next) :
            ?>
                <hr class="section-divider">
            <?php endif; ?>


        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($youtube_link) :
        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $youtube_link, $matches);
        $youtube_id = $matches[1] ?? '';
        if ($youtube_id) : ?>
            <section class="blog-video">
                <?php if ($videooverskrift) : ?>
                    <h2><?php echo esc_html($videooverskrift); ?></h2>
                <?php endif; ?>

                <div class="youtube-wrapper">
                    <iframe src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_id); ?>"
                        title="YouTube video"
                        allowfullscreen
                        loading="lazy"
                        frameborder="0"></iframe>
                </div>
            </section>
        <?php else : ?>
            <p style="color:red;">Kunne ikke finde YouTube-videoens ID.</p>
    <?php endif;
    endif; ?>

</main>

<?php get_footer(); ?>