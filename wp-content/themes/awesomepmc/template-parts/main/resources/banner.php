<?php if (is_active_sidebar('banner-3')) : ?>

  <!-- ### BEGIN - Banner ### -->

  <div id="banner" class="text-center">

      <?php $banner_3 = get_widget_data_for('Banner 3 - 263 x 198'); ?>

      <?php if ($banner_3) : ?>

      <a 
      	class="d-inline-block"
        href="<?php echo $banner_3[0]->link_url ?>" 
        target="<?php echo $banner_3[0]->link_target_blank ? '_blank' : '_self' ?>"
        <?php if ($banner_3[0]->link_rel !== ''): ?>
        	rel="<?php echo $banner_3[0]->link_rel ?>"
        <?php endif; ?>>
        <img 
          class="img-fluid" 
          src="<?php echo $banner_3[0]->url ?>" 
          <?php if ($banner_3[0]->image_title !== ''): ?>
          	title="<?php echo $banner_3[0]->image_title ?>"
          <?php endif; ?> 
          <?php if ($banner_3[0]->alt !== ''): ?>
          	alt="<?php echo $banner_3[0]->alt ?>"
          <?php endif; ?>>
      </a>

      <?php endif; ?>

  </div>

  <!-- ### END - Banner ### -->

<?php endif; ?>