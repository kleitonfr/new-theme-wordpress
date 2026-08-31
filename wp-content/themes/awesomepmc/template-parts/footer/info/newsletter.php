<div class="col-sm-4">
	<div class="float-md-right">
		<h2 class="text-white h2__modifier mb-0">
			<i class="fas fa-envelope fa-lg fa-fw"></i> 
			Receba nossas <b>Notícias</b>
		</h2>
		<form method="post" action="<?php echo esc_url(home_url('/')); ?>?na=s" onsubmit="return newsletter_check(this)">
			<input type="hidden" name="nlang" value="">
			<div class="input-group striped-detail__top striped-detail__modifier">
				<input 
					class="form-control" 
					type="email" 
					name="ne" 
					placeholder="Email" 
					aria-label="Email" 
					aria-describedby="button-addon-newsletter" 
					required>
				<div class="input-group-append">
					<button 
						class="btn btn-primary" 
						type="submit" 
						id="button-addon-newsletter">
						<i class="fas fa-share fa-lg fa-inverse"></i>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>