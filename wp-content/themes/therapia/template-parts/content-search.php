<!-- search result content -->
<div class="col-lg-3 col-md-6 col-sm-6">

    <div class="product-wrapper__item">
        <a href="<?php echo get_permalink(); ?>" class="product-cart">
            <span class="product-image product-image_lastest" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>;')"></span>
            <span class="product-name"> <?php the_title(); ?> </span>
        </a>
    </div>

</div>
