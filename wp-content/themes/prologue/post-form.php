<?php
$user			= get_userdata( $current_user->ID );
$first_name		= attribute_escape( $user->first_name );
?>

<div id="postbox">
	<form id="new_post" name="new_post" method="post" action="<?php bloginfo( 'url' ); ?>/">
		<input type="hidden" name="action" value="post" />
		<?php wp_nonce_field( 'new-post' ); ?>

		<?php echo prologue_get_avatar( $user->ID, $user->user_email, 48 ); ?>

		<label for="posttitle">T&iacute;tulo:</label>
		<input type="text" name="posttitle" value="<?php echo $_GET['posttitle']; ?>" id="posttitle" class="text"/>
		
		<label for="posturl">Enlace:</label>
		<input type="text" id="posturl" name="posturl" class="text" value="<?php echo $_GET['posturl']; ?>"/>
		
		<label for="posttext">Descripción:</label>
		<textarea name="posttext" id="posttext" rows="3" cols="60"><?php echo $_GET['posttext']; ?></textarea>
	
		<label for="tags">Etiquetas:</label>
		<input type="text" name="tags" id="tags" autocomplete="off" />
		
		<input type="radio" name="status" value="publish" checked="checked"> Público
		<input type="radio" name="status" value="private"> Privado
		
		<input id="submit" type="submit" value="Vale!" align="right" />
	</form>
</div> <!-- // postbox -->
