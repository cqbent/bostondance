<?php 
/**
*Template Name: Membership
*/
?>
<?php get_header(); ?>

<div class="container">

    <div class="banner">
        <img src="<?php the_field('header_image'); ?>" alt="community header" width="1007" height="185"/>
    </div>
    <div class="row">
        
        <?php include( locate_template( 'template-parts/breadcrumb.php' )); ?>
            
        <div class="col-xs-6">
            <div class="photo-credit">
                <p>
                    <?php the_field('header_image_caption');?>
                </p>
            </div>
        </div>
    </div>
</div>

<div id="content" class="site-content"><!--site content start-->
    <div class="container"><!--container Start-->
        <div class="row"><!--row start-->

            <div class="col-sm-10 primary-part">
                <div id="primary" class="content-area"><!--primary start-->
                    <main id="main" class="site-main" role="main"><!--site main start-->
                         <?php while (have_posts()) : the_post(); ?>
                        <h3><?php the_content(); ?></h3>
                        <div class="row custom-row">
                            <?php if(have_rows('membership_plans')): ?>
                            <?php while(have_rows('membership_plans')): the_row(); ?>
                            <div class="col-xs-4 membership-wrapper">
                                <div class="membership-block">
                                    <div class="header-block">
                                        <span>
                                           <?php the_sub_field('plan_title'); ?>
                                        </span>
                                        <span>
                                            <?php the_sub_field('cost'); ?>
                                        </span>
                                        <span>
                                            <?php the_sub_field('membership_condition'); ?>
                                        </span>
                                    </div>
                                    <div class="content">
                                       <?php echo get_sub_field('plan_details'); ?>
                                    <div class="sign-up">
                                        <a href="<?php the_sub_field('link_url'); ?>" target="_blank"><?php the_sub_field('link_title'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; 
                        endif; ?>
                            </div>
                            <div class="row custom-row-premium">
                            <?php while(have_rows('membership_plans_premium')): the_row(); ?>
                                <div class="col-xs-3 membership-wrapper">
                                    <div class="membership-block">
                                        <div class="header-block">
                                            <span class="membership-title">
                                               <?php the_sub_field('plan_title'); ?>
                                            </span>
                                            <span class="membership-cost">
                                                <?php the_sub_field('cost'); ?>
                                            </span>
                                            <span class="membership-condition">
                                                <?php the_sub_field('membership_condition'); ?>
                                            </span>
                                        </div>
                                        <div class="content">
                                            <?php echo get_sub_field('plan_details'); ?>
                                            <div class="sign-up">
                                                <a href="<?php the_sub_field('link_url'); ?>" target="_blank"><?php the_sub_field('link_title'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endwhile ; ?>
                                            <div class="contact-details">
                                                <p><?php the_field('bottom_text'); ?></p>
                                            </div>
                                        </div>
                                    <?php endwhile ;?>
                                    </main><!--site main end-->
                                </div><!--primary End-->
                            </div>

                              <?php get_sidebar();?>
                             
                        </div><!--row end-->

                    </div><!--container end-->
                <?php get_footer(); ?>

  <h2>Are You Joining Us as A:</h2>

  <div class="membership-wrapper">
    <div class="membership-block">
      <div class="header-wrapper">
        Individual
      </div>
      <div class="content">
        <h3>Are you a:</h3>
        <div class="panel-group" id="accordian1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 data-toggle="collapse" data-parent="#accordion1" href="#collapse1" class="panel-title expand">
                <div class="right-arrow pull-right">+</div>
                <a href="#">Dance Participant</a>
              </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
              <div class="panel-body">
                Dance Participant Membership $35
                You’ll get:
                -Discounts on tickets, dancewear, services from our community partners
                -Discounts on BDA services and programs: Floor, Camera, Gala
                -Individual listing in the BDA Member Directory OR listing on the BDA Allied Professionals Page
                -Partnerships/ Networking
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 data-toggle="collapse" data-parent="#accordion1" href="#collapse2" class="panel-title expand">
                <div class="right-arrow pull-right">+</div>
                <a href="#">Dance Participant</a>
              </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
              <div class="panel-body">
                Dance Lover Membership $50
                You’ll get:
                -Discounts on tickets, dancewear, services from our community partners
                -Discounts on Gala
                -Individual listing in the BDA Member Directory
                -Partnerships/ Networking
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>