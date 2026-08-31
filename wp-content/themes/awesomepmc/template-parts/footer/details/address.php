<?php $endereco = get_widget_data_for('Endereço'); ?>

<div class="col-sm-6">
	<i class="fas fa-map-marker-alt fa-2x fa-fw"></i> 
	<span class="address">
		<?php if (is_active_sidebar('endereco')) echo $endereco[0]->content; ?>
	</span>
</div>