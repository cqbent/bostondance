<?php

    $post_type = '';
    
    if ( is_singular( 'bda_jobs' ) || is_page_template( 'templates/jobs.php' ) || is_tax( 'jobs_category' ) ) {

    	$action = esc_url( home_url( '/jobs/' ) );
        $name = "search";
        $keyword = isset( $_GET['search'] ) ? $_GET['search'] : '';
        $post_type = 'Jobs';

    } elseif ( is_singular( 'bda_event' ) || is_page_template( 'templates/events.php' ) || is_tax( 'event_category') ) {

    	$action = esc_url( home_url( '/events/' ) );
        $name = "search";
        $keyword = isset( $_GET['search'] ) ? $_GET['search'] : '';
        $post_type = 'Events';

    } elseif ( is_singular( 'bda_class' ) || is_page_template( 'templates/classes.php' ) ) {

        $action = esc_url( home_url( '/events/classes' ) );
        $name = "search";
        $keyword = isset( $_GET['search'] ) ? $_GET['search'] : '';
        $post_type = 'Classes';    


    } elseif ( is_singular( 'bda_workshop' ) || is_page_template( 'templates/workshops.php' ) ) {

        $action = esc_url( home_url( '/events/workshops' ) );
        $name = "search";
        $keyword = isset( $_GET['search'] ) ? $_GET['search'] : '';
        $post_type = 'Workshops';    


    } elseif ( is_singular( 'post' ) || is_page_template( 'templates/blog.php' ) || is_archive() ) {
        $action = esc_url( home_url( '/our-blog/' ) );
        $name = "search";
        $keyword = isset( $_GET['search'] ) ? $_GET['search'] : '';
        $post_type = 'Blog';

    }

    $placeholder_text = 'Search '.$post_type;   
?>
<form role="search" method="get" id="sidebar-search" class="searchform" action="<?php echo ( isset( $action ) ) ? $action : '' ; ?>">
    <label class="sidebar-search">
        <input type="text" value="<?php echo ( isset( $keyword ) ) ? $keyword : get_search_query(); ?>" name="<?php echo ( isset( $name ) ) ? $name : 's'; ?>" id="s" placeholder="<?php echo $placeholder_text; ?>" class="search-field"/>
        <button type="submit" id="searchsubmit"  class="search-submit glyphicon glyphicon-search"></button>
    </label>
</form>
