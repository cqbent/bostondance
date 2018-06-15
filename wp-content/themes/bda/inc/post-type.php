<?php
add_action( 'init', 'bda_custom_post_types_and_taxes' );


function bda_custom_post_types_and_taxes() {

    /**
     * Register Custom Post Type: Events
     */
    register_post_type( 'bda_event',
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Event' ),
                'add_new' => __( 'Add Event', 'bda' ),
                'add_new_item' => __( 'Add New Event', 'bda' ),
            ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-calendar-alt',     
        'supports'  => array( 'title', 'editor', 'thumbnail', 'excerpt' )
        )
    );

    /**
     * Register Custom Taxonomy for Events
     */
    
    register_taxonomy(
        'event_category',
        'bda_event',
        array(
            'label' => __( 'Event Category' ),
            'rewrite' => array( 'slug' => 'event_category' ),
            'hierarchical' => true,
        )
    );


    /**
     * Register Custom Post Type: Classes
     */
    register_post_type( 'bda_class',
        array(
            'labels' => array(
                'name' => __( 'Classes' ),
                'singular_name' => __( 'Class' ),
                'add_new' => __( 'Add Class', 'bda' ),
                'add_new_item' => __( 'Add New Class', 'bda' ),
            ),
            'public' => true,
            'rewrite' => array( 'slug' => 'classes' ),
            'menu_icon' => 'dashicons-welcome-learn-more',
            'has_archive' => true,     
            'supports'  => array( 'title', 'editor', 'thumbnail' )
        )
    );


    /**
     * Register Custom Post Type: Workshops
     */
    register_post_type( 'bda_workshop',
        array(
            'labels' => array(
                'name' => __( 'Workshops' ),
                'singular_name' => __( 'Workshop' ),
                'add_new' => __( 'Add Workshop', 'bda' ),
                'add_new_item' => __( 'Add New Workshop', 'bda' ),
            ),
            'public' => true,
            'rewrite' => array( 'slug' => 'workshop' ),
            'menu_icon' => 'dashicons-editor-paste-word',
            'has_archive' => true,     
            'supports'  => array( 'title', 'editor', 'thumbnail' )
        )
    );

    
    


    /**
     * Register Custom Post Type: Staffs
     */
    register_post_type( 'bda_staff',
        array(
            'labels' => array(
                'name' => __( 'Staffs' ),
                'singular_name' => __( 'Staff' )
            ),
            'public' => true,
            // 'exclude_from_search' => true,
            'has_archive' => true,     
            'supports'  => array( 'title', 'editor', 'thumbnail', 'excerpt' )
        )
    );

    /**
     * Register Custom Taxonomy for Staff
     */
    
    register_taxonomy(
        'staff_category',
        'bda_staff',
        array(
            'label' => __( 'Staff Category' ),
            'hierarchical' => true,
        )
    );
    
   /**
     * Register Custom Post Type: Auditions
     */
    register_post_type( 'bda_auditions',
        array(
            'labels' => array(
                'name' => __( 'Auditions' ),
                'singular_name' => __( 'Audition' )
            ),
            'public' => true,
            'has_archive' => true,     
            'supports'  => array( 'title', 'editor', 'thumbnail' )
        )
    );

    /**
     * Register Custom Taxonomy for Auditions
     */
    
    register_taxonomy(
        'auditions_category',
        'bda_auditions',
        array(
            'label' => __( 'Audition Category' ),
            'hierarchical' => true,
        )
    );

     /**
     * Register Custom Post Type: Jobs
     */
    register_post_type( 'bda_jobs',
        array(
            'labels' => array(
                'name' => __( 'Jobs' ),
                'singular_name' => __( 'Job' )
            ),
            'public' => true,
            'has_archive' => true,     
            'supports'  => array( 'title', 'editor', 'thumbnail' )
        )
    );

    /**
     * Register Custom Taxonomy for Jobs
     */
    
    register_taxonomy(
        'jobs_category',
        'bda_jobs',
        array(
            'label' => __( 'Job Category' ),
            'hierarchical' => true,
        )
    );
}