<?php get_header(); ?>

<main id="main" role="main">

	<div id="error" class="container">

    <div class="row">

    	<div id="content" class="col-lg-12">

    		<!-- Page Header -->

    		<h1 class="widget-title striped-detail__bottom striped-detail__modifier striped-detail__bt pt-0 mb-0">
					<a class="text-secondary" href="">
						<i class="fas fa-exclamation-triangle"></i> Erro 
						<span class="badge badge-muted">404</span>
					</a>
				</h1>

				<!-- ### BEGIN - Error 404 ### -->

			  <div class="card rounded-0 d-block">
			    <div class="card-body text-center mb-5">
			      <h2 class="card-title mt-5">
			      	<span class="text-secondary" href="#">
			      		404
			      	</span>
			      </h2>
			      <div class="card-text text-muted">
								
							<p>Oops! Página não encontrada.</p>
							<p>Parece que esta página já não existe por aqui.</p>
							<p>
								Voltar para a <a class="text-secondary" href="<?php echo esc_url(home_url('/')); ?>">Página Inicial.</a>
							</p>

			      </div>
			    </div>
			    
			  </div>
				
				<div class="bg-secondary p-2 mb-5"></div>

				<!-- ### END - Error 404 ### -->

    	</div>

    </div>

	</div>

</main>

<?php get_footer(); ?>