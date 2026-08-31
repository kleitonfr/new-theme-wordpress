<?php get_template_part('template-parts/main/sidebar/official-gazette', get_post_format()); ?>

<?php get_template_part('template-parts/main/sidebar/search', get_post_format()); ?>

<?php if (is_category() || is_tag() || is_single()) : ?>

	<?php if (in_category('noticias') || is_tag('destaques') || is_single()) : ?>

		<?php get_template_part('template-parts/main/sidebar/categories-menu', get_post_format()); ?>

	<?php endif; ?>

<?php endif; ?>

<?php get_template_part('template-parts/main/sidebar/common-services', get_post_format()); ?>

<?php get_template_part('template-parts/main/sidebar/mayor-schedule', get_post_format()); ?>

<?php if (is_home() || is_category() || is_tag() || is_single()) : ?>

	<?php get_template_part('template-parts/main/sidebar/most-popular', get_post_format()); ?>

<?php endif; ?>

<?php get_template_part('template-parts/main/sidebar/banners', get_post_format()); ?>

<?php if (!is_home()) : ?>

	<?php get_template_part('template-parts/main/resources/banner', get_post_format()); ?>

	<?php get_template_part('template-parts/main/resources/useful-phones', get_post_format()); ?>

<?php endif; ?>

<?php // wp_list_categories(); ?>