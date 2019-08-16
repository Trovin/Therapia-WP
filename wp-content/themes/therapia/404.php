<?php get_header(); ?>

	<main id="main" class="page-main" role="main">

		<section class="error-404 not-found">

            <div class="container">
                <header class="page-header_inner">
                    <h2 class="page-title page-title_error404"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'theme' ); ?></h2>
                </header>
            </div>

            <div class="container">
                <div class="page-content">
                    <?php get_search_form(); ?>
                </div>
            </div>

		</section>

	</main>

<?php get_footer(); ?>
