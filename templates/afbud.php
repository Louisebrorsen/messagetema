<div class="container afbud text-section">
<?php
$afbud = get_posts(array(
    'post_type' => 'afbudspolitik',
    'numberposts' => 1
));

if ($afbud):
    $post = $afbud[0];
    setup_postdata($post);
    ?>
    <h1><?php the_field('overskrift2'); ?></h1>
    <p><?php the_field('afbudpolitik'); ?></p>
    <?php
    wp_reset_postdata();
else:
    echo '<p>Ingen afbudspolitik fundet.</p>';
endif;
?>
</div>