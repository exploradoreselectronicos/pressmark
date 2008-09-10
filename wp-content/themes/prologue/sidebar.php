<div id="sidebar">
	<ul>
	
<li class="bookmarlet">
<small><strong>Aviso</strong>: Sólo los miembros de alguna de las redes de <a href="http://www.exploradoreselectronicos.net">Exploradores Electrónicos</a> pueden postear enlaces, aunque <strong>cualquiera</strong> puede dejar comentarios creándose un usuario en el sitio con su <a href="http://www.exploradoreselectronicos.net/openid">OpenID</a>. Si eres parte de EE.EE. y no eres todavía usuario, símplemente créate un usuario y avisa en el <a href="http://www.exploradoreselectronicos.net/newsgroup">newsgroup</a> para que otro compañero aumente tus <em>poderes</em></small>
</li>	
	
		<li><?php wp_tag_cloud('smallest=4&largest=14&number=500'); ?></li>
		
		<li>
			<?php user_cloud(2); ?>
			<br clear='left'>
		</li>
		
	<li>
			<?php wp_widget_recent_comments(array()); ?>
		</li>
		
		<li class="credits">
			<p>
				<?php
				if ( ! is_user_logged_in() )
					echo '<a href="' . get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_option('siteurl')) . '">' . __('Identifícate') . '</a>';
				else
					echo '<a href="' . get_option('siteurl') . '/wp-login.php?action=logout">' . __('Salir') . '</a>';
				?>
			</p>
		</li>
		
		<?php if ( is_user_logged_in() ) { ?>
		<li class="bookmarlet">
			<p>Arrastra este enlace hasta tus favoritos o a la barra del navegador y pulsa el botón que se genere cuando estés navegando en una página que quieras compartir<br>
			<a href="javascript:Q='';if(navigator.userAgent.indexOf('Safari')>=0){Q=getSelection();}else{Q=document.selection?document.selection.createRange().text:document.getSelection();}location.href='<?php echo get_option('siteurl');?>/index.php?posttext='+encodeURIComponent(Q)+'&posturl='+encodeURIComponent(location.href)+'&posttitle='+encodeURIComponent(document.title);">Compártelo!</a>
			<br/>
			Ubiquity: <b>press</b><link rel="commands" href="<?php bloginfo('template_url'); ?>/ubiquity.js" name="press" />
			</p>
		</li>
		
<li class="bookmarlet">
<p>Puedes descargar la <a href="http://exploradoreselectronicos.net/pressmark.tar.gz">última versión de Pressmark en formato gzip</a> o <a href="http://github.com/exploradoreselectronicos/pressmark/tree/master">hacer un <em>fork</em> desde github</a> para abrir tu propia línea de desarrollo</p>
</li>		
		
		<?php } ?>
	</ul>
</div> <!-- // sidebar -->
