<div id="sidebar">
	<ul>
		<li><?php wp_tag_cloud('smallest=4&largest=14&number=500'); ?></li>
		
		<li>
			<?php user_cloud(authors); ?>
			<br clear='left'>
		</li>
		
		<!-- <li>
			<?php wp_widget_recent_comments(array()); ?>
		</li> -->
		
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
			</p>
		</li>
		
<li class="bookmarlet">
<p>Puedes descargar la <a href="http://exploradoreselectronicos.net/pressmark.tar.gz">última versión de Pressmark en formato gzip</a> o <a href="http://github.com/exploradoreselectronicos/pressmark/tree/master">hacer un <em>fork</em> desde github</a> para abrir tu propia línea de desarrollo</p>
</li>		
		
		<?php } ?>
	</ul>
</div> <!-- // sidebar -->
