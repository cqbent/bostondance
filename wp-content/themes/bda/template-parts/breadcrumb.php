<?php //echo do_shortcode( '[breadcrumb]' ); ?>
<div class="col-xs-6">
	<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
	    <?php if(function_exists('bcn_display'))
	    {
	        bcn_display();
	    }?>
	</div>
</div>