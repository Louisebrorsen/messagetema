<section class="behandlingsformer">
    <div class="container">
        <div class="behandlingsformer-grid">
            <?php
            $args = array(
                'post_type' => 'behandlingsformer',
                'posts_per_page' => -1,
                'meta_key'  => 'sorteringsnummer',
                'orderby'   => 'meta_value_num',
                'order'     => 'ASC',
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()): $query->the_post();

                    $description = get_field('description_');
                    $btn_text = get_field('btn_text');
                    $btn_link = get_field('btn_link');
                    $image = get_field('image');
                    $card_link = $btn_link ?: '#';
                    ?>

                    <div class="behandlingsform-card" onclick="window.location.href='<?php echo esc_url($card_link); ?>'">
                        <?php if ($image): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        <?php endif; ?>

                        <h3><?php the_title(); ?></h3>
                        <p><?php echo esc_html($description); ?></p>

                        <?php if ($btn_text): ?>
                            <a class="btn-cta" href="<?php echo esc_url($card_link); ?>" onclick="event.stopPropagation();">
                                <?php echo esc_html($btn_text); ?>
                            </a>
                        <?php endif; ?>
                    </div>

                <?php endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Ingen behandlingsformer fundet.</p>';
            endif;
            ?>
        </div>
    </div>
</section>
