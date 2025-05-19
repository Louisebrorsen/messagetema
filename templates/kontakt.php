<section>
    <div class="container">
        <div class="kontaktliste">
            <?php
            $args = array(
                'post_type' => 'kontakt',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $icon = get_field('icon');
                    $info = get_field('information');

                    // Tjek om info er en e-mail
                    if (filter_var($info, FILTER_VALIDATE_EMAIL)) {
                        $link = 'mailto:' . antispambot($info);
                    }
                    // Tjek om info er et telefonnummer (starter med + eller tal)
                    elseif (preg_match('/^\+?[0-9 ]+$/', $info)) {
                        $link = 'tel:' . preg_replace('/\s+/', '', $info); // Fjern mellemrum
                    } else {
                        $link = false; // Ikke link
                    }
            ?>
                    <div class="kontakt-info">
                        <div class="kontakt-item">
                            <?php if ($icon): ?>
                                <i class="mdi <?php echo esc_attr($icon); ?>"></i>
                            <?php endif; ?>
                            <?php if ($link): ?>
                                <p><a href="<?php echo esc_attr($link); ?>"><?php echo esc_html($info); ?></a></p>
                            <?php else: ?>
                                <p><?php echo esc_html($info); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Ingen kontaktpersoner fundet.</p>';
            endif;
            ?>
        </div>
    </div>
</section>
