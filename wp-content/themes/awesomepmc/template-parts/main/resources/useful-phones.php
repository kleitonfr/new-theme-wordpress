<!-- ### BEGIN - Useful Phones ### -->

<?php $telefones_uteis = get_widget_data_for('Telefones Úteis'); ?>

<div id="usefulPhones">

	<h2 class="widget-title striped-detail__bottom striped-detail__modifier">
		<i class="fas fa-phone fa-flip-horizontal"></i> Telefones Úteis
	</h2>

	<?php if (is_active_sidebar('telefones-uteis')) echo $telefones_uteis[0]->content; ?>
</div>

<!-- ### END - Useful Phones ### -->