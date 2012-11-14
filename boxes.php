<?php
/**
 * Title: Boxes Element
 *
 * Description: Displays custom post type Boxes
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category Cyber Chimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }

function cyberchimps_init_boxes_post_type() {
	register_post_type( 'boxes_lite',
		array(
			'labels' => array(
				'name' => __('Boxes Lite', 'cyberchimps'),
				'singular_name' => __('Boxes Lite', 'cyberchimps'),
			),
			'public' => true,
			'show_ui' => true, 
			'supports' => array('title'),
			'has_archive' => true,
			'menu_icon' => get_template_directory_uri() . '/cyberchimps/lib/images/custom-types/boxes.png',
			'rewrite' => array('slug' => 'boxes')
		)
	);
	
	$meta_boxes = array();
	
	$mb = new Chimps_Metabox('boxes_lite', __( 'Boxes Lite Element', 'cyberchimps' ), array('pages' => array('boxes_lite')));
	$mb
		->tab( __( 'Boxes Lite Element', 'cyberchimps' ) )
			->single_image('cyberchimps_box_image', __( 'Box Image', 'cyberchimps' ), '')
			->text('cyberchimps_box_url', __( 'Box URL', 'cyberchimps' ), '')
			->textarea('cyberchimps_box_text', __( 'Box Text', 'cyberchimps' ), '')
		->end();
		
	foreach ($meta_boxes as $meta_box) {
		$my_box = new RW_Meta_Box_Taxonomy($meta_box);
	}
}
add_action( 'init', 'cyberchimps_init_boxes_post_type' );

add_action( 'boxes_lite', 'cyberchimps_boxes_render_display' );

//Limit number of posts that can be created in free version
function cyberchimps_box_limit() {
	global $pagenow, $typenow;
	
	$count_posts = get_posts( array( 'post_type' => 'boxes_lite', 'post_status' => 'publish' ) );
	$count = count( $count_posts );
	if( $count >= 3 ) {
		echo '<script>
					jQuery(document).ready(function($) {
						$("#menu-posts-boxes_lite .wp-submenu-wrap li").each(function(){
							if($(this).find("a").attr("href") == "post-new.php?post_type=boxes_lite" ){
								$(this).remove();
							}
						});
					});
					</script>';
		if( $pagenow == 'edit.php' && $typenow == 'boxes_lite' ){
			echo '<script>
					jQuery(document).ready(function($) {
						$(".wrap h2 a").remove();
					});
					</script>';
		}
		if( $pagenow == 'post.php' && $typenow == 'boxes_lite' ){
			echo '<script>
					jQuery(document).ready(function($) {
						$(".wrap h2 a").remove();
					});
					</script>';
		}
	}
}
add_action( 'admin_head', 'cyberchimps_box_limit' );

// Define content for boxes
function cyberchimps_boxes_render_display() {
	
	// Intialize box counter
	$box_counter = 1;
	
	// Custom box query
	$args = array(
						'numberposts'     => 3,
						'offset'          => 0,
						'orderby'         => 'post_date',
						'order'           => 'ASC',
						'post_type'       => 'boxes_lite',
						'post_status'     => 'publish'
					);
	$boxes = get_posts( $args );
?>
	<div id="widget-boxes-container" class="row-fluid">
		<div class="boxes">
		<?php
	if( $boxes ):	
		foreach( $boxes as $box ):
				
				// Break after desired number of boxes displayed
				if( $box_counter > 3 )
					break;
				
				// Get the image of the box
				$box_image = get_post_meta( $box->ID, 'cyberchimps_box_image', true );
				
				// Get the URL of the box
				$box_url = get_post_meta( $box->ID, 'cyberchimps_box_url', true );
				// Get the text of the box
				$box_text = get_post_meta( $box->ID, 'cyberchimps_box_text', true );
		?>	
				<div id="box<?php echo $box_counter; ?>" class="box span4">
        <?php if( $box_url != '' ): ?>
					<a href="<?php echo esc_url( $box_url ); ?>" class="box-link">
						<img class="box-image" src="<?php echo esc_url( $box_image ); ?>" />
          </a>
        <?php else: ?>
        	<a class="box-no-url">
						<img class="box-image" src="<?php echo esc_url( $box_image ); ?>" />
          </a>
        <?php endif; ?>
					<h2 class="box-widget-title"><?php echo $box->post_title; ?></h2>
					<p><?php echo wp_kses( $box_text, array( 'br' => array(),'em' => array(),'strong' => array() ) ); ?></p>
				</div><!--end box1-->
		<?php   
			$box_counter++;
			endforeach;
			else: ?>
				<div class="box span4">
					<a href="http://cyberchimps.com" class="box-link">
						<img class="box-image" src="<?php echo get_template_directory_uri(); ?><?php echo apply_filters( 'cyberchimps_box1_image', '/elements/lib/images/boxes/slidericon.png' ); ?>" alt="CyberChimps Slider" />
          </a>
					<h2 class="box-widget-title"><?php _e( 'Responsive iFeature Pro Slider', 'cyberchimps' ); ?></h2>
					<p><?php _e( 'The Responsive iFeature Pro Slider now adjusts dynamically when being viewed by a mobile device such as an iPhone or iPad. It also includes image resizing, and thumbnails.', 'cyberchimps' ); ?></p>
				</div><!--end box1-->
        
        <div class="box span4">
					<a href="http://cyberchimps.com" class="box-link">
						<img class="box-image" src="<?php echo get_template_directory_uri(); ?><?php echo apply_filters( 'cyberchimps_box2_image', '/elements/lib/images/boxes/blueprint.png' ); ?>" alt="CyberChimps Blueprint" />
          </a>
					<h2 class="box-widget-title"><?php _e( 'Responsive Design', 'cyberchimps' ); ?></h2>
					<p><?php _e( 'With Responsive Design, and iFeature Pro your website will now magically adjust to mobile devices such as the iPhone, iPad, and Android devices.', 'cyberchimps' ); ?></p>
				</div><!--end box3-->
        
        <div class="box span4">
					<a href="http://cyberchimps.com" class="box-link">
						<img class="box-image" src="<?php echo get_template_directory_uri(); ?><?php echo apply_filters( 'cyberchimps_box3_image', '/elements/lib/images/boxes/docs.png' ); ?>" alt="CyberChimps Help" />
          </a>
					<h2 class="box-widget-title"><?php _e( 'Excellent Support', 'cyberchimps' ); ?></h2>
					<p><?php _e( 'We designed iFeature Pro to be as easy to design with as possible, if you do run into trouble we provide a support forum, and precise documentation.', 'cyberchimps' ); ?></p>
				</div><!--end box4-->
			
		<?php	endif;
		?>
		</div><!-- end boxes -->
	</div><!-- end row-fluid -->
<?php	
} 
?>