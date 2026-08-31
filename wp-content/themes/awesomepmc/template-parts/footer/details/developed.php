<?php $desenvolvido_por = get_widget_data_for('Desenvolvido Por'); ?>

<div class="col-sm-6 text-lg-right">
	<i class="fas fa-qrcode fa-2x fa-fw"></i> 
	<span class="developed">
		<?php if (is_active_sidebar('desenvolvido-por')) echo $desenvolvido_por[0]->content; ?>
	</span>
</div>