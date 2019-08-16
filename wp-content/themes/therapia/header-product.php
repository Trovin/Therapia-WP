<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php get_template_part( 'template-parts/head' ); ?>
</head>


<body <?php body_class("page-body"); ?>>

<header class="page-header page-header_product">
    <div id="header_product-layer"></div>

    <div class="container container_product">
        <div class="page-header__row">
            <a href="<?php echo get_home_url(); ?>" class="logo-link logo-link_product" rel="home">
                <img src="<?php the_field('footer_logo_image', 'option'); ?>" class="logo-image" alt="logo-image">
            </a>

            <!-- mobile menu elements -->
            <div class="mobile-elements">
                <a href="<?php echo get_home_url() . '/cart' ?>" class="cart-link cart-link_mobile">
                    <i class="fas fa-shopping-basket"></i>
                    <?php echo woocommerce_header_add_to_cart_fragment()['#cart-count'];?>
                </a>

                <div class="menu-action">
                    <span class="menu-action__item"></span>
                    <span class="menu-action__item"></span>
                    <span class="menu-action__item"></span>
                </div>
            </div>
            <!-- end mobile menu elements --->


            <div class="page-header__right-part">
                <div class="flex-container">
                    <nav class="main-nav" role="navigation">
                        <?php
                        wp_nav_menu(array('walker' => new mainMenuWalker(), 'container'=>false, 'echo' => true, 'menu_class' => 'main-nav__list', 'theme_location'=>'menu-1', 'fallback_cb'=>false, 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 2, ));
                        ?>
                    </nav>


                    <nav class="social">
                        <ul class="social__list">
                            <li class="social__item">
                                <a href="<?php the_field('facebook_link', 'option'); ?>" class="social__link">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="<?php the_field('twitter_link', 'option'); ?>" class="social__link">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="<?php the_field('instagramm_link', 'option'); ?>" class="social__link">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="<?php the_field('pinterest_link', 'option'); ?>" class="social__link">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <a href="<?php echo get_home_url() . '/cart' ?>" class="cart-link">
                        <i class="fas fa-shopping-basket"></i>
                        <?php echo woocommerce_header_add_to_cart_fragment2()['#cart-count2'];?>
                    </a>
                </div>
            </div>
        </div>
    </div>

</header>
