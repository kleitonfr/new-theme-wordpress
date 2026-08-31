<!-- ### BEGIN - Search - Displays on devices with more than 991px ### -->

<div id="searchForm__lg" class="d-none d-lg-block d-xl-block">
	<h2 class="widget-title striped-detail__bottom striped-detail__modifier">
		<i class="fas fa-search"></i> Pesquisar No Site
	</h2>

	<form role="top-search" method="GET" action="<?php echo esc_url(home_url('/')); ?>">
		<div class="input-group">
		  <input 
		  	class="form-control border-0 rounded-0" 
		  	name="s" 
		  	type="search" 
		  	placeholder="Buscar no site..." 
		  	aria-label="Buscar no site..." 
		  	aria-describedby="button-addon-search">
		  <div class="input-group-append">
		    <button class="btn btn-link" type="submit" id="button-addon-search">
		    	<i class="fas fa-arrow-alt-circle-right fa-2x"></i>
		    </button>
		  </div>
		</div>
	</form>
</div>

<!-- ### END - Search ### -->