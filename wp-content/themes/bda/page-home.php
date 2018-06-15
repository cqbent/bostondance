<?php
/**
 * Template Name: Home
 *
 * This is the template that displays Front page by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 *
 * @package bda
 */
get_header(); ?>

<div id="primary"><!--primary start-->
    <main id="main" class="main-container" role="main"><!--main container start-->
        <div class="container"><!--container Start-->
            <div class="main-slider"><!--main slider start-->
            <?php 
            while (have_posts()) : the_post(); 
                            
                // check if the repeater field has rows of data
                if ( have_rows( 'slider' ) ): ?>            
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                        <?php
                            // loop through the rows of data 
                            $i = 0;
                            while (have_rows('slider') ) : the_row();

                                // display a sub field value                               
                                    if ($i == 0) {

                                        echo '<div class="item active">';

                                    } else { 

                                        echo '<div class="item">';

                                    } ?>

                                    <img class="img-responsive"src="<?php the_sub_field('slide_image'); ?>"alt="slider" width="1007" height="592" >
                                    <?php
                                    if ( get_sub_field( 'slide_caption' ) ) { ?>

                                        <div class="photo-credit <?php echo $i; ?>">
                                            <p>
                                                <?php the_sub_field( 'slide_caption' ); ?>
                                            </p>
                                        </div>
                                    <?php
                                    } 

                                    echo '</div>';
                                    $i++;
                            endwhile; ?>
                                                            
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>                           
                    </div> 
                    <?php
                        endif;
                    endwhile; // End of the loop. ?>


                </div><!--main slider end-->

                <?php wp_reset_postdata(); ?>

                <section class="upcoming-events"><!--upcoming events start-->
                    <h2>
                        upcoming events
                    </h2>
                    <div class="row">
                        <?php
                        // echo date('Ymd');
                        $args = array(
                            'post_type' => 'bda_event',
                            'posts_per_page' => 3,
                            'meta_query' => array(
                                array(
                                    'key'     => 'event_dates_%_date',
                                    'compare' => '>=',
                                    'meta_type' => 'DATE',
                                    'value'   => date('Ymd'), 
                                ),
                            ),
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                        );

                        // WP query for upcomming events at front page
                        $query = new WP_Query($args);

                        // Check if the query has post or not
                        if ($query->have_posts()):

                            // Loop for upcomming events
                            while ($query->have_posts()): $query->the_post();
                                ?>
                                <div class="col-xs-4">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="item">
                                            <?php
                                            if (has_post_thumbnail()):

                                                // dispaly thumbnail in costom size
                                                the_post_thumbnail('upcomming-events-thumb');

                                            endif;
                                            ?>
                                            <div class="overlay">
                                                <span>LEARN MORE</span>
                                            </div> 
                                        </div>
                                    </a>
                                    <div class="details">
                                        <div class="name">
                                            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                        </div>
                                        <div class="time">
                                           
                                            <?php $date_break = 1; include( locate_template( 'template-parts/content-date.php' ) ); ?>

                                        </div>

                                        <div class="place">
                                            <p><?php the_field('venue'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;

                            wp_reset_postdata();

                        endif;
                        ?>

                        <a class="all" href="<?php echo esc_url( get_bloginfo( 'url' ) ); ?>/events">SEE ALL EVENTS</a>
                    </div>
                </section><!--upcoming events end-->


                <section class="section-wrapper recent-news-section mob-deg"><!--recents news start-->
                    <div class="row">
                        <div class="col-sm-4 hidden-xs ">
                            <div class="recent-bda">
                                RECENT BDA NEWS
                            </div>
                        </div>
                        <div class="col-sm-8">

                            <?php
                            
                            $query2 = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 1, 'posts_orderby' => 'date') );

                            if ( $query2->have_posts() ):
                                while ( $query2->have_posts() ) : $query2->the_post();
                                    ?>
                                    <a href="<?php the_permalink(); ?>"><?php the_title( '<h2>', '</h2>' ); ?></a>
                                    <div class="post-time">Posted <?php the_date( 'F j, Y' ); ?></div>
                            <?php
                                    the_content();
                                endwhile; wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>
                    <a class="all" href="<?php echo esc_url( get_bloginfo( 'url' ) ); ?>/our-blog">SEE ALL NEWS</a>
                </section><!--recents news end-->

                <section class="section-wrapper"><!--explorer news start-->
                    <div class="row">
                        <?php $frontpage_id = get_option( 'page_on_front' ); 
                        if ( get_field( 'explore_main_page_image', $frontpage_id ) ) { ?>
                            <div class="col-sm-5 left-part">
                                <a href="<?php the_field( 'explore_main_page_link' ); ?>">
                                    <img class="img-responsive" src="<?php the_field( 'explore_main_page_image', $frontpage_id ); ?>" alt="rent-the-floor" width="473" height="550"/>
                                </a>
                            </div>
                        <?php } ?>
                            <div class="col-sm-7 right-part">
                                <div class="row">
                                    <?php
                                    if ( have_rows( 'explore_more_page', $frontpage_id ) ):
                                        while ( have_rows('explore_more_page', $frontpage_id ) ) : the_row(); ?>
                                           <?php $background_option = get_sub_field( 'background_option' ); ?>
                     
                                            <div class="<?php echo $background_option; ?> col-sm-6 event-holder">
                                                <a class="overlay-toggle" href="<?php the_sub_field( 'page_link' ); ?>">
                                                    <div class="overlay-element <?php echo $background_option; ?>"> 
                                                        <?php  if( get_sub_field( 'page_image' ) ) { ?>
                                                            <img src="<?php the_sub_field( 'page_image' ); ?>" width="270" height="201" alt="Our members"/>
                                                        <?php } ?>
                                                        <div class="holder-caption">
                                                            <h2><?php the_sub_field( 'page_title' ); ?></h2>
                                                            
                                                        </div>
                                                        
                                                            <div class="overlay-area" style="background: <?php the_sub_field( 'page_color' ); ?>"></div>
                                                        
                                                    </div>
                                                </a>
                                            </div>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>


                                </div>
                            </div>
                    </div>
                </section><!--explorer news end-->
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
