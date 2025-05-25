<footer class="site-footer">
    <div class="container">
        <div class="footer-kolonne footer-venstre">
            <h3>Massage & Kropsterapi Fyn</h3>
            <p>Professionel massage i rolige omgivelser eller hjemme hos dig. Slip af med spændinger og giv din krop den omsorg, den fortjener.</p>
        </div>

        <div class="footer-kolonne footer-midte">
            <div class="midter-samle">

                <div class="midter-footer">

                    <nav class="footer-navigation">
                        <h4>Hurtige links</h4>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer-menu',
                            'container'      => false,
                        ));
                        ?>
                        <a href="https://massage-kropsterapi-fyn.planway.com/" class="btn-cta">Book din tid i dag</a>
                    </nav>

                    <div class="kontaktop">
                        <?php get_template_part('templates/kontakt'); ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="footer-kolonne footer-hoejre">
            <div class="venstre">
                <div class="information">
                    <h4>Åbningstider</h4>
                    <p>Mandag-Fredag<br>08-17</p>
                    <p>Tirsdag<br>08-21</p>
                </div>
            </div>
            <div class="hojre">
                <img src="http://massageogkropsterapifyn.dk.linux202.dandomainserver.dk/wp-content/uploads/2025/05/DK-kort-footer-2-scaled.png" alt="">
            </div>

        </div>
        <div class="footeradresse">
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
                    <div class="kontakt-info">
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
        </div>
    </div>

    <div class="footer-bottom">
        <p>
            CVR: 43580000
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Alle rettigheder forbeholdes.
        </p>
    </div>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const burger = document.querySelector(".burger-menu");
        const nav = document.querySelector(".main-navigation");

        burger.addEventListener("click", function() {
            nav.classList.toggle("open");
        });
    });
</script>


<?php wp_footer(); ?>
</body>

</html>