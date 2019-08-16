<!-- search form -->
<div class="container">

    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div>
            <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
            <input type="text" class="searchform-input" value="<?php echo get_search_query(); ?>" name="s" id="s" />
            <input type="submit" id="searchsubmit" class="btn searchform-btn" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
        </div>
    </form>

</div>