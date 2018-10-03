<?php
/**
 * Title: Portfolio Lite Element
 *
 * Description: Displays four portfolio images having optional custom links
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category Cyber Chimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

// Don't load directly
if( !defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Portfolio Lite Page Options
add_action( 'init', 'cyberchimps_portfolio_lite_page_options' );

function cyberchimps_portfolio_lite_page_options() {
	/**
	 * Set up Portfolio Lite on Page options
	 */

	// set directory
	$directory = get_template_directory_uri();

	$page_fields = array(
		// Image one
		array(
			'type'  => 'single_image',
			'id'    => 'cyberchimps_portfolio_lite_image_one',
			'class' => '',
			'name'  => __( 'First Portfolio Image', 'primo' ),
			'std'   => $directory . '/cyberchimps/lib/images/portfolio.jpg'
		),
		array(
			'type'  => 'text',
			'id'    => 'cyberchimps_portfolio_lite_image_one_caption',
			'class' => '',
			'name'  => __( 'First Portfolio Image Caption', 'primo' ),
			'std'   => __( 'Image 1', 'primo' )
		),
		array(
			'type'  => 'checkbox',
			'id'    => 'cyberchimps_portfolio_link_toggle_one',
			'class' => 'checkbox',
			'name'  => __( 'First Porfolio Link', 'primo' ),
			'std'   => 1
		),
		array(
			'type'  => 'text',
			'id'    => 'cyberchimps_portfolio_link_url_one',
			'class' => '',
			'name'  => __( 'Link URL', 'primo' ),
			'std'   => esc_url( home_url() )
		),

		// Image two
		array(
			'type'  => 'single_image',
			'id'    => 'cyberchimps_portfolio_lite_image_two',
			'class' => '',
			'name'  => __( 'Second Portfolio Image', 'primo' ),
			'std'   => $directory . '/cyberchimps/lib/images/portfolio.jpg'
		),
		array(
			'type'  => 'text',
			'id'    => 'cyberchimps_portfolio_lite_image_two_caption',
			'class' => '',
			'name'  => __( 'Second Portfolio Image Caption', 'primo' ),
			'std'   => __( 'Image 2', 'primo' )
		),
		array(
			'type'  => 'checkbox',
			'id'    => 'cyberchimps_portfolio_link_toggle_two',
			'class' => 'checkbox',
			'name'  => __( 'Second Porfolio Link', 'primo' ),
			'std'   => 1
		),
		array(
			'type'  => 'text',
			'id'    => 'cyberchimps_portfolio_link_url_two',
			'class' => '',
			'name'  => __( 'Link URL', 'primo' ),
			'std'   => esc_url( home_url() )
		),

		// Image three
		array(
			'type'  => 'single_image',
			'id'    => 'cyberchimps_portfolio_lite_image_three',
			'class' => '',
			'name'  => __( 'Third Portfolio Image', 'primo' ),
			'std'   => $directory . '/cyberchimps/lib/images/portfolio.jpg'
		),
		array(
			'type'  => 'text',
			'id'    => 'cyberchimps_portfolio_lite_image_three_caption',
			'class' => '',
			'name'  => __( 'Third Portfolio Image Caption', 'primo' ),
			'std'   => __( 'Image 3', 'primo' )
		),
		array(
			'type'  => 'checkbox',
			'id'    => 'cyberchimps_portfolio_link_toggle_three',
			'class' => 'checkbox',
			'name'  => __( 'Third Porfolio Link', 'primo' ),
			'std'   => 1
		),
		array(
			'type'  => 'text',
			'id'    => 'cyberchimps_portfolio_link_url_three',
			'class' => '',
			'name'  => __( 'Link URL', 'primo' ),
			'std'   => esc_url( home_url() )
		),

		// Image four
		array(
			'type'  => 'single_image',
			'id'    => 'cyberchimps_portfolio_lite_image_four',
			'class' => '',
			'name'  => __( 'Fourth Portfolio Image', 'primo' ),
			'std'   => $directory . '/cyberchimps/lib/images/portfolio.jpg'
		),
		array(
			'type'  => 'text',
			'id'    => 'cyberchimps_portfolio_lite_image_four_caption',
			'class' => '',
			'name'  => __( 'Fourth Portfolio Image Caption', 'primo' ),
			'std'   => __( 'Image 4', 'primo' )
		),
		array(
			'type'  => 'checkbox',
			'id'    => 'cyberchimps_portfolio_link_toggle_four',
			'class' => 'checkbox',
			'name'  => __( 'Fourth Porfolio Link', 'primo' ),
			'std'   => 1
		),
		array(
			'type'  => 'text',
			'id'    => 'cyberchimps_portfolio_link_url_four',
			'class' => '',
			'name'  => __( 'Link URL', 'primo' ),
			'std'   => esc_url( home_url() )
		),
	);
	/*
	 * configure your meta box
	 */
	$page_config = array(
		'id'             => 'portfolio_lite_options', // meta box id, unique per meta box
		'title'          => __( 'Portfolio Lite Options', 'primo' ), // meta box title
		'pages'          => array( 'page' ), // post types, accept custom post types as well, default is array('post'); optional
		'context'        => 'normal', // where the meta box appear: normal (default), advanced, side; optional
		'priority'       => 'low', // order of meta box: high (default), low; optional
		'fields'         => $page_fields, // list of meta fields (can be added by field arrays)
		'local_images'   => false, // Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => true //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);

	/*
	 * Initiate your meta box
	 */
	$page_meta = new Cyberchimps_Meta_Box( $page_config );
}

// Portfolio Lite element action
add_action( 'portfolio_lite', 'cyberchimps_portfolio_lite_content' );

// Defining content of the portfolio-lite element
function cyberchimps_portfolio_lite_content() {

	// call globals
	global $post;

	// Getting options of portfolio-lite when added to page
	if( is_page() ) {

		// Geting title option
		$title_enable = get_post_meta( $post->ID, 'cyberchimps_portfolio_title_toggle', true );
		$title        = get_post_meta( $post->ID, 'cyberchimps_portfolio_title', true );

		// Getting Image URL for each protfolio
		$img1 = get_post_meta( $post->ID, 'cyberchimps_portfolio_lite_image_one', true );
		$img2 = get_post_meta( $post->ID, 'cyberchimps_portfolio_lite_image_two', true );
		$img3 = get_post_meta( $post->ID, 'cyberchimps_portfolio_lite_image_three', true );
		$img4 = get_post_meta( $post->ID, 'cyberchimps_portfolio_lite_image_four', true );

		// Getting caption for each protfolio
		$caption1 = get_post_meta( $post->ID, 'cyberchimps_portfolio_lite_image_one_caption', true );
		$caption2 = get_post_meta( $post->ID, 'cyberchimps_portfolio_lite_image_two_caption', true );
		$caption3 = get_post_meta( $post->ID, 'cyberchimps_portfolio_lite_image_three_caption', true );
		$caption4 = get_post_meta( $post->ID, 'cyberchimps_portfolio_lite_image_four_caption', true );

		// Getting Custom URL toggle
		$url_toggle1 = get_post_meta( $post->ID, 'cyberchimps_portfolio_link_toggle_one', true );
		$url_toggle2 = get_post_meta( $post->ID, 'cyberchimps_portfolio_link_toggle_two', true );
		$url_toggle3 = get_post_meta( $post->ID, 'cyberchimps_portfolio_link_toggle_three', true );
		$url_toggle4 = get_post_meta( $post->ID, 'cyberchimps_portfolio_link_toggle_four', true );

		// Getting URL of custom link
		$url1 = get_post_meta( $post->ID, 'cyberchimps_portfolio_link_url_one', true );
		$url2 = get_post_meta( $post->ID, 'cyberchimps_portfolio_link_url_two', true );
		$url3 = get_post_meta( $post->ID, 'cyberchimps_portfolio_link_url_three', true );
		$url4 = get_post_meta( $post->ID, 'cyberchimps_portfolio_link_url_four', true );
	}

	// Getting options of portfolio-lite when added to blog
	else {

		// Geting title option
		$title_enable = cyberchimps_get_option( 'cyberchimps_blog_portfolio_title_toggle', 1 );
		$title        = cyberchimps_get_option( 'cyberchimps_blog_portfolio_title', 'Portfolio' );

		// Getting Image URL for each protfolio
		$img1 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_lite_image_one', get_template_directory_uri() . apply_filters( 'cyberchimps_portfolio_lite_img1', '/cyberchimps/lib/images/portfolio.jpg' ) );
		$img2 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_lite_image_two', get_template_directory_uri() . apply_filters( 'cyberchimps_portfolio_lite_img2', '/cyberchimps/lib/images/portfolio.jpg' ) );
		$img3 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_lite_image_three', get_template_directory_uri() . apply_filters( 'cyberchimps_portfolio_lite_img3', '/cyberchimps/lib/images/portfolio.jpg' ) );
		$img4 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_lite_image_four', get_template_directory_uri() . apply_filters( 'cyberchimps_portfolio_lite_img4', '/cyberchimps/lib/images/portfolio.jpg' ) );

		// Getting caption for each protfolio
		$caption1 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_lite_image_one_caption', 'CyberChimps' );
		$caption2 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_lite_image_two_caption', 'CyberChimps' );
		$caption3 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_lite_image_three_caption', 'CyberChimps' );
		$caption4 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_lite_image_four_caption', 'CyberChimps' );

		// Getting Custom URL toggle
		$url_toggle1 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_link_toggle_one' );
		$url_toggle2 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_link_toggle_two' );
		$url_toggle3 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_link_toggle_three' );
		$url_toggle4 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_link_toggle_four' );

		// Getting URL of custom link
		$url1 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_link_url_one' );
		$url2 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_link_url_two' );
		$url3 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_link_url_three' );
		$url4 = cyberchimps_get_option( 'cyberchimps_blog_portfolio_link_url_four' );
	}

	// Set the title to default value if null is supplied
	$title = ( $title != '' ) ? $title : 'Portfolio';

	// Set the markup for title
	$title_output = ( $title_enable == 'on' OR $title_enable == '1' ) ? $title : '';

	// Post-specific variables 	
	$image = get_post_meta( $post->ID, 'portfolio_image', true );
	$title = get_the_title();

	// Post-specific variables
	$image = get_post_meta( $post->ID, 'portfolio_image', true );
	$title = get_the_title();

	// Setting portfolio link and rel
	if( $url_toggle1 == 1 ) {
		$portfolio_link1 = $url1;
		$portfolio_rel1  = "";
	}
	else {
		$portfolio_link1 = $img1;
		$portfolio_rel1  = 'rel=cyberchimps-lightbox';
	}

	if( $url_toggle2 == 1 ) {
		$portfolio_link2 = $url2;
		$portfolio_rel2  = "";
	}
	else {
		$portfolio_link2 = $img2;
		$portfolio_rel2  = 'rel=cyberchimps-lightbox';
	}

	if( $url_toggle3 == 1 ) {
		$portfolio_link3 = $url3;
		$portfolio_rel3  = "";
	}
	else {
		$portfolio_link3 = $img3;
		$portfolio_rel3  = 'rel=cyberchimps-lightbox';
	}

	if( $url_toggle4 == 1 ) {
		$portfolio_link4 = $url4;
		$portfolio_rel4  = "";
	}
	else {
		$portfolio_link4 = $img4;
		$portfolio_rel4  = 'rel=cyberchimps-lightbox';
	}
	?>

	<!-- Start of markup for portfolio element -->
	<div id="portfolio" class="row-fluid">
		<div id="gallery" class="span12">

			<!-- Display the title -->
			<h2 class="entry-title"><?php echo esc_html( $title_output ); ?></h2>

			<ul class="row-fluid">

				<!-- Portfolio 1 -->
				<li id="portfolio_wrap" class="span3">
					<div class="portfolio-item">
						<a href='<?php echo esc_url( $portfolio_link1 ); ?>' <?php echo esc_attr( $portfolio_rel1 ); ?> title='<?php echo esc_attr( $caption1 ); ?>'><img
								src='<?php echo esc_url( $img1 ); ?>' alt='Image 1'/>

							<div class='portfolio_caption'><?php echo esc_html( $caption1 ); ?></div>
						</a>
					</div>
				</li>

				<!-- Portfolio 2 -->
				<li id="portfolio_wrap" class="span3">
					<div class="portfolio-item">
						<a href='<?php echo esc_url( $portfolio_link2 ); ?>' <?php echo esc_attr( $portfolio_rel2 ); ?> title='<?php echo esc_attr( $caption2 ); ?>'><img
								src='<?php echo esc_url( $img2 ); ?>' alt='Image 1'/>

							<div class='portfolio_caption'><?php echo esc_html( $caption2 ); ?></div>
						</a>
					</div>
				</li>

				<!-- Portfolio 3 -->
				<li id="portfolio_wrap" class="span3">
					<div class="portfolio-item">
						<a href='<?php echo esc_url( $portfolio_link3 ); ?>' <?php echo esc_attr( $portfolio_rel3 ); ?> title='<?php echo esc_attr( $caption3 ); ?>'><img
								src='<?php echo esc_url( $img3 ); ?>' alt='Image 1'/>

							<div class='portfolio_caption'><?php echo esc_html( $caption3 ); ?></div>
						</a>
					</div>
				</li>

				<!-- Portfolio 4 -->
				<li id="portfolio_wrap" class="span3">
					<div class="portfolio-item">
						<a href='<?php echo esc_url( $portfolio_link4 ); ?>' <?php echo esc_attr( $portfolio_rel4 ); ?> title='<?php echo esc_attr( $caption4 ); ?>'><img
								src='<?php echo esc_url( $img4 ); ?>' alt='Image 1'/>

							<div class='portfolio_caption'><?php echo esc_html( $caption4 ); ?></div>
						</a>
					</div>
				</li>
			</ul>
		</div>
		<!-- End of #gallery -->
	</div>  <!-- End of .row-fluid -->
	<!-- End of markup for portfolio element -->
<?php
}

?>
