<?php
/**
 * Title: Header — marca institucional
 * Slug: pmc-caraguatatuba/header-brand
 * Categories: pmc-caraguatatuba
 * Description: Brasão + nome do município + qualificador, com link para a página inicial.
 * Inserter: no
 *
 * @package PMC_Caraguatatuba
 */

$pmc_home        = esc_url( home_url( '/' ) );
$pmc_home_label  = esc_attr__( 'Página inicial do portal da Prefeitura de Caraguatatuba', 'pmc-caraguatatuba' );
$pmc_crest_label = esc_attr__( 'Brasão de Caraguatatuba', 'pmc-caraguatatuba' );
?>
<!-- wp:group {"tagName":"div","className":"pmc-brand","layout":{"type":"default"}} -->
<div class="wp-block-group pmc-brand">
	<!-- wp:html -->
	<a class="pmc-brand__link" href="<?php echo $pmc_home; // phpcs:ignore WordPress.Security.EscapeOutput ?>" aria-label="<?php echo $pmc_home_label; // phpcs:ignore WordPress.Security.EscapeOutput ?>">
		<?php if ( has_custom_logo() ) : ?>
			<span class="pmc-brand__crest pmc-brand__crest--media">
				<?php echo wp_get_attachment_image( (int) get_theme_mod( 'custom_logo' ), 'full', false, array( 'alt' => '' ) ); ?>
			</span>
		<?php else : ?>
			<span class="pmc-brand__crest" role="img" aria-label="<?php echo $pmc_crest_label; // phpcs:ignore WordPress.Security.EscapeOutput ?>"></span>
		<?php endif; ?>

		<span class="pmc-brand__text">
			<span class="pmc-brand__title"><?php echo esc_html_x( 'Caraguatatuba', 'nome do município exibido no header', 'pmc-caraguatatuba' ); ?></span>
			<span class="pmc-brand__subtitle"><?php esc_html_e( 'Prefeitura Municipal - SP', 'pmc-caraguatatuba' ); ?></span>
		</span>
	</a>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->
