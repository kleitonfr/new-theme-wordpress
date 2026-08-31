<!-- ### BEGIN - Projects and Programs ### -->

<?php if (is_active_sidebar('acesso-rapido') || is_active_sidebar('acontece-em-caragua')) : ?>

<div id="projectsAndPrograms">
	<h2 class="widget-title striped-detail__bottom striped-detail__modifier striped-detail__bt">
		<a class="text-secondary" href="<?php echo esc_url(home_url('/projetos-e-programas')); ?>">
			<i class="fas fa-tasks"></i> Projetos e Programas 
			<span class="badge badge-muted d-none d-sm-block">Utilidades</span>
		</a>
	</h2>

	<div class="row mt-4 pb-1">
	  <div class="col-sm-5 col-md-4 col-lg-3">
	    <div 
	    	class="nav flex-column nav-pills" 
	    	id="v-pills-tabContentProjectsAndPrograms" 
	    	role="tablist" 
	    	aria-orientation="vertical">
	      <a 
	      	class="nav-link active" 
	      	id="v-pills-shortcut-tab" 
	      	data-toggle="pill"
	      	 href="#v-pills-shortcut" 
	      	 role="tab" 
	      	 aria-controls="v-pills-shortcut" 
	      	 aria-selected="true">Acesso Rápido</a>
	      <a 
	      	class="nav-link" 
	      	id="v-pills-takesPlace-tab" 
	      	data-toggle="pill" 
	      	href="#v-pills-takesPlace" 
	      	role="tab" 
	      	aria-controls="v-pills-takesPlace" 
	      	aria-selected="false">Acontece em Caraguá</a>
	    </div>
	  </div>
	  <div class="col-sm-7 col-md-8 col-lg-9">
	    <div class="tab-content" id="v-pills-tabContentProjectsAndPrograms">
	      <div 
	      	class="tab-pane fade show active" 
	      	id="v-pills-shortcut" 
	      	role="tabpanel" 
	      	aria-labelledby="v-pills-shortcut-tab">

	      	<?php if (is_active_sidebar('acesso-rapido')) : ?>

	      	<ul class="list-inline">

				    <?php $acesso_rapido = get_widget_data_for('Acesso Rápido'); ?>

				    <?php foreach ($acesso_rapido as $key => $banner) : ?>

					    <li class="list-inline-item pb-2 ellipsis ellipsis__modifier">
						  	<a 
						  		id="shortcut-<?php echo ($key + 1); ?>" 
						  		class="text-muted" 
						  		href="<?php echo $banner->link_url ?>" 
						  		target="<?php echo $banner->link_target_blank ? '_blank' : '_self' ?>"
						  		data-toggle="popover" 
						  		data-placement="top" 
						  		data-content="<img class='w-100 h-100' src='<?php echo $banner->url ?>'>" 
						  		data-container="#shortcut-<?php echo ($key + 1); ?>" 
						  		data-trigger="hover" 
						  		data-html="true">
						  		<?php echo $banner->title ?>
						  	</a>
						  </li>

					  <?php endforeach; ?>

					</ul>

					<?php endif; ?>

	      </div>
	      <div 
	      	class="tab-pane fade" 
	      	id="v-pills-takesPlace" 
	      	role="tabpanel" 
	      	aria-labelledby="v-pills-takesPlace-tab">

	      	<?php if (is_active_sidebar('acontece-em-caragua')) : ?>

	      	<ul class="list-inline">

	      		<?php $acontece_em_caragua = get_widget_data_for('Acontece em Caraguá'); ?>

				    <?php foreach ($acontece_em_caragua as $key => $banner) : ?>

					    <li class="list-inline-item pb-2 ellipsis ellipsis__modifier">
						  	<a 
						  		id="takesPlace-<?php echo ($key + 1); ?>" 
						  		class="text-muted" 
						  		href="<?php echo $banner->link_url ?>" 
						  		target="<?php echo $banner->link_target_blank ? '_blank' : '_self' ?>"
						  		data-toggle="popover" 
						  		data-placement="top" 
						  		data-content="<img class='w-100 h-100' src='<?php echo $banner->url ?>'>" 
						  		data-container="#takesPlace-<?php echo ($key + 1); ?>" 
						  		data-trigger="hover" 
						  		data-html="true">
						  		<?php echo $banner->title ?>
						  	</a>
						  </li>

					  <?php endforeach; ?>

					</ul>

					<?php endif; ?>

	      </div>
	    </div>
	  </div>
	</div>
</div>

<?php endif; ?>

<!-- ### END - Projects and Programs ### -->