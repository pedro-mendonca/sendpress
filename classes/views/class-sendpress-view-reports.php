<?php

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

class SendPress_View_Reports extends SendPress_View{
	
	function html($sp){
		
		//Create an instance of our package class...
		$sp_reports_table = new SendPress_Reports_Table();
		//Fetch, prepare, sort, and filter our data...
		$sp_reports_table->prepare_items();
		?>
		<div id="taskbar" class="lists-dashboard rounded group"> 
			<h2><?php _e('Reports','sendpress'); ?></h2>
		</div>
		<!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
		<form id="email-filter" method="get">
			<!-- For plugins, we also need to ensure that the form posts back to our current page -->
		    <input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>" />
		    <!-- Now we can render the completed list table -->
		    <?php $sp_reports_table->display(); ?>
		    <?php wp_nonce_field( $this->_nonce_value ); ?>
		</form>
		<h3>Information</h3>
		<div class='well'>
		<span class="label label-success">Unique</span> The total number of different recipients that have clicked on a link or opened an email.<br><br>

		<span class="label label-info">Total</span> The total number of clicks or opens that have happened. Regardless of who clicked or opened the email.
		</div>
		<?php
	
	}
}
SendPress_View_Reports::cap('sendpress_reports');