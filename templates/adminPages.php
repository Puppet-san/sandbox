<h1>Page Settings</h1>



<div class="wrap">
	<h1>Page Settings</h1>
	<?php settings_errors(); ?>
	
	<div id="page-settings">
		<form method="post" action="options.php">
			<?php
				settings_fields( 'tomtak_pages' );
				do_settings_sections( 'tomtak_pages' );
			?>
		</form>
	</div>
	
	
</div>
