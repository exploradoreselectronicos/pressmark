<?php 
if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'post' ) {
	auth_redirect();
	if( !current_user_can( 'publish_posts' ) ) {
		wp_redirect( get_bloginfo( 'url' ) . '/' );
		exit;
	}

	check_admin_referer( 'new-post' );

	$user_id		= $current_user->user_id;
	$post_title		= $_POST['posttitle'];
	$post_url		= $_POST['posturl'];
	$post_content	= $_POST['posttext'];
	$tags			= $_POST['tags'];
	$status			= $_POST['status'];

	// $char_limit		= 40;
	// $post_title		= strip_tags( $post_content );
	// if( strlen( $post_title ) > $char_limit ) {
	// 	$post_title = substr( $post_title, 0, $char_limit ) . ' ... ';
	// }

	$post_id = wp_insert_post( array(
		'post_author'	=> $user_id,
		'post_title'	=> $post_title,
		'post_content'	=> $post_content,
		'tags_input'	=> $tags,
		'post_status'	=> $status
	) );
	
	global $wpdb;
	$wpdb->query( "
			INSERT INTO $wpdb->postmeta
			(post_id,meta_key,meta_value )
			VALUES ('$post_id','pressmark-url','$post_url' )
		" );

	wp_redirect( get_bloginfo( 'url' ) . '/' );
	exit;
}

get_header( ); 

if( current_user_can( 'publish_posts' ) ) {
	require_once dirname( __FILE__ ) . '/post-form.php';
}
?>

<div id="main">
	<h2>Enlaces más recientes <a class="rss" href="<?php bloginfo( 'rss2_url' ); ?>">RSS</a></h2>
	<ul>

<?php
if( have_posts( ) ) {

	$previous_user_id = 0;
	while( have_posts( ) ) {
		the_post( );
?>

<li id="prologue-<?php the_ID(); ?>" class="user_id_<?php the_author_ID( ); ?>">

<?php
		// Don't show the avatar if the previous post was by the same user
		$current_user_id = get_the_author_ID( );
		if( $previous_user_id !== $current_user_id ) {
			echo prologue_get_avatar( $current_user_id, get_the_author_email( ), 48 );
		}
		$previous_user_id = $current_user_id;
?>
	<h3><a href="<?php echo post_custom("pressmark-url"); ?>"><?php echo $post->post_title ?></a></h3>
	<h4>
		<span class="meta">
			<?php the_time( "g:i a" ); ?>, <?php the_time( "l, j \d\e F \d\e Y" ); ?> |
			<?php comments_popup_link( __( '0' ), __( '1' ), __( '%' ) ); ?> |
			<?php edit_post_link( __( 'e' ) ); ?>
			<br />
			<?php the_author_posts_link( ); ?><?php the_tags( __( ' en: ' ), ', ', ' ' ); ?>
			<?php if($post->post_status == 'private') echo " | <span class='private'>privado</span>"?>
		</span>
	</h4>
	<div class="postcontent">
		<?php the_content( __( '(Más ...)' ) ); ?>
	</div> <!-- // postcontent -->
	<div class="bottom_of_entry">&nbsp;</div>
</li>

<?php
	} // while have_posts

} // if have_posts
?>

	</ul>

	<div class="navigation"><p><?php posts_nav_link(); ?></p></div>

</div> <!-- // main -->

<?php
get_footer( );
