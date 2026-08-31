<!-- ### BEGIN - Banners Carousel ### -->

<?php $banners = get_widget_data_for('Banners Carousel - 825 x 188'); ?>

<div 
  id="bannersCarousel" 
  class="carousel slide <?php echo (is_single() || is_page()) ? 'mb-5' : ''; ?>" 
  data-ride="carousel">
  <ol class="carousel-indicators carousel-indicators__adjust">
    <?php foreach ($banners as $key => $banner): ?>
      <?php if ($banner->url !== ''): ?>
      <li 
        data-target="#bannersCarousel" 
        data-slide-to="<?php echo $key; ?>" 
        <?php echo ($key === 0) ? 'class="active"' : null; ?>>
      </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ol>
  <div class="carousel-inner">
    <?php foreach ($banners as $key => $banner): ?>
      <?php if ($banner->url !== ''): ?>
      <div class="carousel-item <?php echo ($key === 0) ? 'active' : null; ?>">
        <a 
          href="<?php echo $banner->link_url ?>" 
          target="<?php echo $banner->link_target_blank ? '_blank' : '_self' ?>"
          <?php if ($banner->link_rel !== ''): ?>
            rel="<?php echo $banner->link_rel ?>"
          <?php endif; ?>>
          <img 
            class="d-block w-100" 
            src="<?php echo $banner->url ?>" 
            <?php if ($banner->image_title !== ''): ?>
              title="<?php echo $banner->image_title ?>"
            <?php endif; ?> 
            <?php if ($banner->alt !== ''): ?>
              alt="<?php echo $banner->alt ?>"
            <?php endif; ?>>
        </a>
      </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>

<!-- ### END - Banners Carousel ### -->