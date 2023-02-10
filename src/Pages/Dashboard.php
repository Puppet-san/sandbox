<?php
/**
* @package TomTakPlugin
*/

// If this file is called directly, abort.

defined( 'ABSPATH') or die();

class TomTak_Dashboard {
	/**
	 * Initialize the dashboard
	 */
	public static function init() {
	
		//Might need javascript stuff later
		add_action( 'admin_footer', array( __CLASS__, 'admin_footer' ) );

		add_meta_box( 'tt-mb-latest-questions', 'Questions', array( __CLASS__, 'sendQuestionList' ), 'tomtak', 'column1', 'core' );
	}

	
	public static function admin_footer() {
		//Might add javascript stuff to dashboard
	}
	
	

	/**
	 * Show latest questions.
	 */
	public static function sendQuestionList() {
		global $wpdb;

		$results = $wpdb->get_results( "SELECT date_format(post_date, '%d %a') as post_day, post_date, count(ID) as post_count from {$wpdb->posts} WHERE post_status IN('publish', 'private_post', 'moderate') AND post_type = 'question' AND post_date > (NOW() - INTERVAL 1 MONTH) GROUP BY post_day ORDER BY post_date ASC" ); // phpcs:ignore

		?>
		<?php if ( $results ) : ?>

		<?php endif; ?>
		<div class="main">

			<?php
			tomtak()->questions = tt_get_questions(
				array(
					'ap_order_by' => 'newest',
				)
			);
			?>

			<?php if ( tt_have_questions() ) : ?>
				<ul class="post-list">
					<?php
					while ( tt_have_questions() ) :
						tt_the_question();
						?>
						<li>
							<a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> -
							<span class="posted"><?php the_date(); ?></span>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>

			<?php wp_reset_postdata(); ?>
		</div>
		<?php
	}
}

TomTak_Dashboard::init();


global $screen_layout_columns;

$screen      = get_current_screen();
$columns     = absint( $screen->get_columns() );
$columns_css = '';

if ( $columns ) {
	$columns_css = " columns-$columns";
}

?>

<div id="tomtak-metaboxes" class="wrap">
	<h1>Q&A Plugin</h1>
	<div id="dashboard-widgets-wrap">
		<div id="dashboard-widgets" class="metabox-holder<?php echo esc_attr( $columns_css ); ?>">
			<div id="postbox-container-1" class="postbox-container">
				<?php do_meta_boxes( 'tomtak', 'column1', '' ); ?>
			</div>

			<div id="postbox-container-2" class="postbox-container">
				<?php do_meta_boxes( 'tomtak', 'column2', '' ); ?>
			</div>
		</div>
	</div>
</div>
<?php

wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false );
wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false );