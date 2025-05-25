<!-- 
Template Name: erhverv Behandling
-->

<?php get_header(); ?>
<div class="container">
    <div class="content-area">
        <main class="site-main">
            <section class="erhverv-content">
                <div class="section1">
                    <div class="left">
                        <h1><?php echo esc_html(get_field('overskrift')); ?></h1>
                        <p><?php echo wp_kses_post(get_field('tekst1')); ?></p>
                    </div>
                    <div class="right-erhverv">
                        <div class="contact-form-wrapper">
                            <div class="contact-form">
                                <h1><?php echo esc_html(get_field('overskrift3')); ?></h1>
                                <?php echo do_shortcode('[contact-form-7 id="e2c7fc8" title="Contact form erhverv"]'); ?>

                            </div>
                        </div>


                        <div class="kontakt-information">
                            <h3><?php echo esc_html(get_field('overskrift2')); ?></h3>

                            <?php get_template_part('templates/kontakt'); ?>
                        </div>
                        <div class="right-img img-portraet">
                            <?php
                            $billede = get_field('portraet');
                            if ($billede) {
                                echo '<img src="' . esc_url($billede['url']) . '" alt="' . esc_attr($billede['alt']) . '">';
                            }
                            ?>
                        </div>


                    </div>
                </div>
                <div class="afsnit2">
                    <div class="blue-box-wrapper">
                        <div class="blue-box">
                            <h1><?php echo esc_html(get_field('overskriftboks')); ?></h1>
                            <?php
                            $liste = get_field('boks');
                            if ($liste) :
                                $liste = strip_tags($liste);
                                $punkter = explode(PHP_EOL, $liste);
                            ?>
                                <ul>
                                    <?php foreach ($punkter as $punkt) : ?>
                                        <?php if (trim($punkt) !== '') : ?>
                                            <li><?php echo esc_html($punkt); ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </section>
        </main>
    </div>
</div>
<?php get_footer(); ?>