	<footer class="page-footer" role="contentinfo">
		<div class="page-footer__inner">

            <div class="container">

                <!-- subscribe-form -->
                <div class="subscribe-form">
                    <div class="subscribe-form__left-part">
                        <h3 class="subscribe-form__title"> <?php the_field('subscribe_form_title', 'option'); ?> </h3>
                        <p class="subscribe-form__info">
                            <?php the_field('subscribe_form_info', 'option'); ?>
                        </p>
                    </div>

                    <div class="subscribe-form__right-part">
                        <?php print do_shortcode( '[contact-form-7 id="23" title="Footer subscribe form"]' ); ?>
                    </div>
                </div>

                <!-- footer logo -->
                <a href="<?php echo get_home_url(); ?>" class="logo-link logo-link_footer" rel="home">
                    <img src="<?php the_field('footer_logo_image', 'option'); ?>" class="logo-image" alt="logo-image">
                </a>

                <!-- footer-content-->
                <div class="footer-contact">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 footer-contact__item">
                            <a href="mailto: <?php the_field('footer_contact_email', 'option'); ?>" class="footer-contact__item-wrapp">
                                <span class="footer__icon footer__icon_mail"> <i class="fas fa-envelope"></i> </span>
                                <?php the_field('footer_contact_email', 'option'); ?>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 footer-contact__item">
                            <a href="tel: <?php the_field('footer_contact_tel', 'option'); ?>" class="footer-contact__item-wrapp">
                                <span class="footer__icon footer__icon_phone"> <i class="fas fa-phone-volume"></i> </span>
                                <?php the_field('footer_contact_tel', 'option'); ?>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 footer-contact__item">
                            <p class="footer-contact__item-wrapp">
                                <span class="footer__icon footer__icon_location"> <i class="fas fa-map-marker-alt"></i> </span>
                                <?php the_field('footer_contact_adress', 'option'); ?>
                            </p>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-6 footer-contact__item footer-contact__item_social">
                            <nav class="social social_footer">
                                <ul class="social__list">
                                    <li class="social__item">
                                        <a href="https://twitter.com/" class="social__link social__link_footer">
                                            <svg class="svg-inline--fa fa-facebook-f fa-w-9" aria-hidden="true" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512" data-fa-i2svg=""><path fill="currentColor" d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"></path></svg><!-- <i class="fab fa-facebook-f"></i> -->
                                        </a>
                                    </li>
                                    <li class="social__item">
                                        <a href="https://twitter.com/" class="social__link social__link_footer">
                                            <svg class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg><!-- <i class="fab fa-twitter"></i> -->
                                        </a>
                                    </li>
                                    <li class="social__item">
                                        <a href="https://twitter.com/" class="social__link social__link_footer">
                                            <svg class="svg-inline--fa fa-instagram fa-w-14" aria-hidden="true" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg><!-- <i class="fab fa-instagram"></i> -->
                                        </a>
                                    </li>
                                    <li class="social__item">
                                        <a href="https://twitter.com/" class="social__link social__link_footer">
                                            <svg class="svg-inline--fa fa-pinterest-p fa-w-12" aria-hidden="true" data-prefix="fab" data-icon="pinterest-p" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z"></path></svg><!-- <i class="fab fa-pinterest-p"></i> -->
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>

            <!-- copyright info -->
            <p class="copyright">Copyright © <?php echo date("Y"); ?> <a href=" <?php echo get_home_url(); ?>"> <?php the_field('copyright_text', 'option'); ?> </a> </p>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
