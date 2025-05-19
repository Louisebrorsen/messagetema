<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="container header-container">
            <div class="site-branding">
                <a href="<?php echo esc_url(home_url('/forside')); ?>" class="site-logo">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/logo.png'); ?>" alt="Logo">
                </a>
            </div>

            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                ));
                ?>
            </nav>
            <button class="burger-menu" aria-label="Åbn menu">
  <span></span>
  <span></span>
  <span></span>
</button>


            <div class="header-cta">
                <a href="https://massage-kropsterapi-fyn.planway.com/" class="btn-cta">Book tid</a>
            </div>
        </div>
    </header>