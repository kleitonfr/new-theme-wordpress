<?php if (is_active_sidebar('banner-1') || is_active_sidebar('banner-2')) : ?>

<!-- ### BEGIN - Banners ### -->

<div id="banners" class="text-center">

	<?php if (is_active_sidebar('banner-1')) : ?>

    <?php $banner_1 = get_widget_data_for('Banner 1 - 263 x 263'); ?>

    <?php if ($banner_1) : ?>

    <a 
    	class="d-inline-block"
      href="<?php echo $banner_1[0]->link_url ?>" 
      target="<?php echo $banner_1[0]->link_target_blank ? '_blank' : '_self' ?>"
      <?php if ($banner_1[0]->link_rel !== ''): ?>
      	rel="<?php echo $banner_1[0]->link_rel ?>"
      <?php endif; ?>>
      <img 
        class="img-fluid" 
        src="<?php echo $banner_1[0]->url ?>" 
        <?php if ($banner_1[0]->image_title !== ''): ?>
        	title="<?php echo $banner_1[0]->image_title ?>"
        <?php endif; ?> 
        <?php if ($banner_1[0]->alt !== ''): ?>
        	alt="<?php echo $banner_1[0]->alt ?>"
        <?php endif; ?>>
    </a>

    <?php endif; ?>

  <?php endif; ?>

  <?php if (is_active_sidebar('banner-2')) : ?>

    <?php $banner_2 = get_widget_data_for('Banner 2 - 263 x 263'); ?>

    <?php if ($banner_2) : ?>

    <a 
    	class="d-inline-block"
      href="<?php echo $banner_2[0]->link_url ?>" 
      target="<?php echo $banner_2[0]->link_target_blank ? '_blank' : '_self' ?>"
      <?php if ($banner_2[0]->link_rel !== ''): ?>
      	rel="<?php echo $banner_2[0]->link_rel ?>"
      <?php endif; ?>>
      <img 
        class="img-fluid" 
        src="<?php echo $banner_2[0]->url ?>" 
        <?php if ($banner_2[0]->image_title !== ''): ?>
        	title="<?php echo $banner_2[0]->image_title ?>"
        <?php endif; ?> 
        <?php if ($banner_2[0]->alt !== ''): ?>
        	alt="<?php echo $banner_2[0]->alt ?>"
        <?php endif; ?>>
    </a>

    <?php endif; ?>

  <?php endif; ?>

</div>

<!-- ### END - Banners ### -->

<?php endif; ?>