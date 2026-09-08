<?php
/**
 * Title: Hero do Portal
 * Slug: pmc-caraguatatuba/hero
 * Categories: pmc-caraguatatuba
 * Inserter: true
 * Description: Carrossel de destaques. Cada slide mostra a peça gráfica completa (sem corte
 *              e sem sobreposição de texto) e, logo abaixo, o título, a descrição e o CTA
 *              editáveis pelo WordPress.
 *
 * @package PMC_Caraguatatuba
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pmc_hero_slides = array(
	array(
		'image'   => 'assets/img/hero-header.jpeg',
		'alt'     => 'Campanha Setembro Amarelo: "Escutar é estar presente" — programação nas unidades de saúde.',
		'eyebrow' => 'SAÚDE',
		'title'   => 'Setembro Amarelo nas unidades de saúde',
		'text'    => 'Confira a programação de valorização da vida nas unidades de saúde do município.',
		'cta'     => 'Confira aqui',
		'url'     => '#',
	),
	array(
		'image'   => 'assets/img/hero-header3.png',
		'alt'     => 'Refis 2026 Caraguatatuba prorrogado de 1º de setembro a 30 de outubro de 2026.',
		'eyebrow' => 'TRIBUTOS',
		'title'   => 'Refis 2026 prorrogado',
		'text'    => 'De 1º de setembro a 30 de outubro de 2026. Ficar em dia também é investir na cidade.',
		'cta'     => 'Saiba mais',
		'url'     => '#',
	),
	array(
		'image'   => 'assets/img/hero-header2.png',
		'alt'     => 'Consulta pública para revisão do Plano Municipal de Gestão Integrada de Resíduos Sólidos.',
		'eyebrow' => 'MEIO AMBIENTE',
		'title'   => 'Consulta pública do Plano de Resíduos Sólidos',
		'text'    => 'Participe da revisão do Plano Municipal de Gestão Integrada de Resíduos Sólidos.',
		'cta'     => 'Participe',
		'url'     => '#',
	),
);
?>
<!-- wp:group {"className":"pmc-hero-carousel","layout":{"type":"constrained"}} -->
<div class="wp-block-group pmc-hero-carousel" data-pmc-carousel>

<?php foreach ( $pmc_hero_slides as $pmc_index => $pmc_slide ) : ?>
	<!-- wp:group {"className":"pmc-hero","layout":{"type":"default"}} -->
	<div class="wp-block-group pmc-hero" data-pmc-slide<?php echo 0 === $pmc_index ? '' : ' hidden'; ?>>

		<!-- wp:image {"className":"pmc-hero__media","sizeSlug":"full","linkDestination":"custom"} -->
		<figure class="wp-block-image pmc-hero__media"><a href="<?php echo esc_url( $pmc_slide['url'] ); ?>"><img src="<?php echo esc_url( get_theme_file_uri( $pmc_slide['image'] ) ); ?>" alt="<?php echo esc_attr( $pmc_slide['alt'] ); ?>"/></a></figure>
		<!-- /wp:image -->

		<!-- wp:group {"className":"pmc-hero__content","layout":{"type":"constrained","justifyContent":"left"},"style":{"spacing":{"blockGap":"var:preset|spacing|layout-2x","padding":{"top":"var:preset|spacing|layout-6x","bottom":"var:preset|spacing|layout-6x"}}}} -->
		<div class="wp-block-group pmc-hero__content" style="padding-top:var(--wp--preset--spacing--layout-6x);padding-bottom:var(--wp--preset--spacing--layout-6x)">

			<!-- wp:paragraph {"className":"pmc-hero__eyebrow","textColor":"primary-900","fontSize":"14"} -->
			<p class="pmc-hero__eyebrow has-primary-900-color has-text-color has-14-font-size"><strong><?php echo esc_html( $pmc_slide['eyebrow'] ); ?></strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"className":"pmc-hero__title","textColor":"primary-900","fontSize":"hero"} -->
			<h2 class="wp-block-heading pmc-hero__title has-primary-900-color has-text-color has-hero-font-size"><?php echo esc_html( $pmc_slide['title'] ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"pmc-hero__description","textColor":"text-secondary","fontSize":"18"} -->
			<p class="pmc-hero__description has-text-secondary-color has-text-color has-18-font-size"><?php echo esc_html( $pmc_slide['text'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button {"className":"pmc-hero__cta"} --><div class="wp-block-button pmc-hero__cta"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $pmc_slide['url'] ); ?>"><?php echo esc_html( $pmc_slide['cta'] ); ?> &rarr;</a></div><!-- /wp:button --></div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->
<?php endforeach; ?>

	<!-- wp:group {"className":"pmc-hero__dots","layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-group pmc-hero__dots" role="tablist" aria-label="Destaques">
<?php foreach ( $pmc_hero_slides as $pmc_index => $pmc_slide ) : ?>
		<button type="button" class="pmc-hero__dot" data-pmc-dot role="tab" aria-selected="<?php echo 0 === $pmc_index ? 'true' : 'false'; ?>" aria-label="<?php echo esc_attr( sprintf( 'Ir para o destaque %d: %s', $pmc_index + 1, $pmc_slide['title'] ) ); ?>"></button>
<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
