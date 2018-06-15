<?php
/*
* Custom Customizer options for bda
*
*/
function bda_customizer_register( $wp_customize ){
	$wp_customize->add_panel( 'bda_theme_option', array(
	  	'priority' => 150,
	  	'capability' => 'edit_theme_options',
	  	'title' => __( 'BDA Theme Options', 'bda' ),
	  	) );
	/*
	* Section for Social Icons
	*
	*/
	$wp_customize->add_section('social_icons', array(
			'title' => __('Header Options', 'bda'),
			'panel' => 'bda_theme_option'
		));

	/*
	* Settings for site logo
	*
	*/
	$wp_customize->add_setting('site_logo', array(			
		  	'type' => 'theme_mod',
  		  	'sanitize_callback' => 'bda_sanitize_url',
		));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,	
			'site_logo',
			array(
				'label' => __( 'Site Logo', 'bda' ),
				'section' => 'social_icons',
			)
		)
	);


   /*
	* Settings for custom link
	*
	*/
	$wp_customize->add_setting('custom_link1', array(			
		'type' => 'theme_mod',
		'sanitize_callback' => 'bda_sanitize_url',
		));
	$wp_customize->add_control('custom_link1', array(
		'label' => 'Button 1 URL',
		'section' => 'social_icons',
		'settings' => 'custom_link1',
		
		));

	$wp_customize->add_setting('custom_link2', array(			
		'type' => 'theme_mod',
		'sanitize_callback' => 'bda_sanitize_url',
		));
	$wp_customize->add_control('custom_link2', array(
		'label' => 'Button 2 URL',
		'section' => 'social_icons',
		'settings' => 'custom_link2',
		
		));

	/*
	* Settings for facebook link
	*
	*/
	$wp_customize->add_setting('facebook_link', array(			
		  	'type' => 'theme_mod',
  		  	'sanitize_callback' => 'bda_sanitize_url',
		));
	$wp_customize->add_control('facebook_link', array(
			'label' => 'Facebook URL',
			'section' => 'social_icons',
			'settings' => 'facebook_link',
			
		));

	/*
	* Settings for twitter link
	*
	*/
	$wp_customize->add_setting('twitter_link', array(
			'type' => 'theme_mod',
			'sanitize_callback' => 'bda_sanitize_url',
		));

	$wp_customize->add_control('twitter_link', array(
				'label' => __('Twitter URL', 'bda'),
				'section' => 'social_icons',
				'settings' => 'twitter_link',
				
		));
	/*
	* Settings for pinterest link
	*
	*/
	$wp_customize->add_setting('pinterest_link', array(
			'type' => 'theme_mod',
			'sanitize_callback' => 'bda_sanitize_url',
		));

	$wp_customize->add_control('pinterest_link', array(
			'label' => __('Pinterest URL', 'bda'),
			'section' => 'social_icons',
			'settings' => 'pinterest_link',
			
		));

	/*
	* Settings for instagram link
	*
	*/
	$wp_customize->add_setting('instagram_link', array(
			'type' => 'theme_mod',
			'sanitize_callback' => 'bda_sanitize_url',
		));

	$wp_customize->add_control('instagram_link', array(
			'label' => __('Instagram URL', 'bda'),
			'section' => 'social_icons',
			'settings' => 'instagram_link',
			
		));

    /*
	* Section for Footer Logo
	*
	*/
	$wp_customize->add_section('footer_options', array(
			'title' => __('Footer Options', 'bda'),
			'panel' => 'bda_theme_option'
		));

	/*
	* Settings for Footer Logo
	*
	*/
	$wp_customize->add_setting('footer_logo', array(			
		  	'type' => 'theme_mod',
  		  	'sanitize_callback' => 'bda_sanitize_url',
		));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,	
			'footer_logo',
			array(
				'label' => __( 'Footer Logo', 'bda' ),
				'section' => 'footer_options',
				
			)
		)
	);


}
add_action( 'customize_register', 'bda_customizer_register' );


/*
* Sanitize call back for url
*
*/
function bda_sanitize_url( $url ) {
	return esc_url_raw( $url );
}
/*
* Sanitize call back for 'html' type text inputs
*
*/
function bda_sanitize_html( $html ) {
	return wp_filter_post_kses( $html );
}