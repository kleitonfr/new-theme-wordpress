<?php
/**
 * Title: Header — faixa principal
 * Slug: pmc-caraguatatuba/header-main
 * Categories: pmc-caraguatatuba
 * Description: Segunda faixa do header: marca institucional, busca e navegação principal sobre fundo branco.
 * Inserter: no
 *
 * @package PMC_Caraguatatuba
 */

$pmc_nav = array(
	array( 'label' => __( 'Início', 'pmc-caraguatatuba' ),   'url' => '/',          'active' => true ),
	array( 'label' => __( 'Notícias', 'pmc-caraguatatuba' ), 'url' => '/noticias',  'active' => false ),
	array( 'label' => __( 'Serviços', 'pmc-caraguatatuba' ), 'url' => '/servicos',  'active' => false ),
	array( 'label' => __( 'Galeria', 'pmc-caraguatatuba' ),  'url' => '/galeria',   'active' => false ),
	array( 'label' => __( 'Unidades', 'pmc-caraguatatuba' ), 'url' => '/unidades',  'active' => false ),
);
?>
<!-- wp:group {"tagName":"div","className":"pmc-header-main","backgroundColor":"white","layout":{"type":"default"}} -->
<div class="wp-block-group pmc-header-main has-white-background-color has-background">
	<!-- wp:group {"tagName":"div","className":"pmc-shell pmc-header-main__inner","layout":{"type":"default"}} -->
	<div class="wp-block-group pmc-shell pmc-header-main__inner">
		<!-- wp:pattern {"slug":"pmc-caraguatatuba/header-brand"} /-->

		<!-- wp:pattern {"slug":"pmc-caraguatatuba/header-search"} /-->

		<!-- wp:navigation {"className":"pmc-nav","overlayMenu":"mobile","icon":"menu","ariaLabel":"<?php echo esc_attr__( 'Navegação principal', 'pmc-caraguatatuba' ); ?>","layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap","orientation":"horizontal"},"style":{"spacing":{"blockGap":"var:preset|spacing|layout-1x"}},"fontSize":"14"} -->
		<?php
		foreach ( $pmc_nav as $pmc_item ) {
			$pmc_attrs = array(
				'label' => $pmc_item['label'],
				'url'   => home_url( $pmc_item['url'] ),
				'kind'  => 'custom',
			);

			if ( $pmc_item['active'] ) {
				$pmc_attrs['className'] = 'pmc-nav__item is-active';
			}

			echo "\t\t<!-- wp:navigation-link " . wp_json_encode( $pmc_attrs ) . " /-->\n";
		}
		?>
		<!-- /wp:navigation -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
