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
        <div class="header-container">
            <a href="<?php echo esc_url(home_url('/forside')); ?>" class="site-logo">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/logo.png'); ?>" alt="Logo">
            </a>




            <nav class="main-navigation" id="main-nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'menu_class'     => 'menu',
                ));
                ?>
            </nav>
            <div class="header-actions">
                <button class="burger-menu" id="burger" aria-label="Åbn menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <a href="https://massage-kropsterapi-fyn.planway.com/" class="header-cta btn-cta">Book tid</a>
            </div>

        </div>
    </header>

    <script>
        const burger = document.getElementById("burger");
        const nav = document.getElementById("main-nav");

        burger.addEventListener("click", (e) => {
            e.stopPropagation(); 
            nav.classList.toggle("active");

            if (nav.classList.contains("active") && window.innerWidth <= 1024) {
                const rect = burger.getBoundingClientRect();
                nav.style.top = `${rect.bottom + 10 + window.scrollY}px`;
                nav.style.left = `${rect.left + window.scrollX}px`;
            }
        });

        document.addEventListener("click", (e) => {
            const isClickInsideNav = nav.contains(e.target);
            const isClickOnBurger = burger.contains(e.target);

            if (!isClickInsideNav && !isClickOnBurger && window.innerWidth <= 1024) {
                nav.classList.remove("active");
            }
        });

        // Luk menu ved klik på et link
        document.querySelectorAll('#main-nav a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 1024) {
                    nav.classList.remove("active");
                }
            });
        });

        // Mobil submenu toggle
        document.querySelectorAll('.has-submenu > a').forEach(link => {
            link.addEventListener('click', e => {
                if (window.innerWidth <= 1024) {
                    e.preventDefault();
                    link.parentElement.classList.toggle('open');
                }
            });
        });
    </script>