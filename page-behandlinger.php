<?php get_header(); ?>

<main class="behandling">
    <div class="container-behandling">
        <h1 class="h1-u"><?php echo esc_html(get_field('overskrift')); ?></h1>
    </div>
    <div class="behandlinger">
        <?php get_template_part('templates/behandlingsformer'); ?>
    </div>
    <?php get_template_part('templates/afbud'); ?>

</main>
<?php get_footer(); ?>