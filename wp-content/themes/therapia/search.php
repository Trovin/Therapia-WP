<?php get_header(); ?>

	<main id="main" class="site-main" role="main">

        <section class="default-page">

            <div class="container">
                <?php if ( have_posts() ) : ?>

                    <header class="page-header_default">
                        <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    </header>

                        <div class="row">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php $current_post_type = get_post_type( $post_id );
                                    if($current_post_type == 'product') : ?>
                                        <!-- get content part -->
                                        <?php get_template_part( 'template-parts/content', 'search' ); ?>
                                    <?php endif; ?>
                            <?php endwhile; ?>
                        </div>

                    <?php the_posts_navigation(); ?>

                <?php else : ?>

                    <?php get_template_part( 'template-parts/content', 'none' ); ?>

                <?php endif; ?>
            </div>

        </section>

	</main>

<?php get_footer(); ?>
