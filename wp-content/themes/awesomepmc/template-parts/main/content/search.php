<!-- ### BEGIN - Search - Displays on devices with less than 992px ### -->

<div id="searchForm__xs" class="d-block d-sm-block d-lg-none mb-3">
	<h2 class="widget-title striped-detail__bottom striped-detail__modifier pt-0">
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