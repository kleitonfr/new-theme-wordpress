<?php
/**
 * Title: Header — barra de utilidades
 * Slug: pmc-caraguatatuba/header-utility
 * Categories: pmc-caraguatatuba
 * Description: Primeira faixa do header: links institucionais à esquerda e portais à direita, sobre o azul institucional profundo.
 * Inserter: no
 *
 * @package PMC_Caraguatatuba
 */

$pmc_institucional = array(
	array( 'label' => __( 'Transparência', 'pmc-caraguatatuba' ), 'url' => '/transparencia' ),
	array( 'label' => __( 'Diário Oficial', 'pmc-caraguatatuba' ), 'url' => '/diario-oficial' ),
	array( 'label' => __( 'Ouvidoria', 'pmc-caraguatatuba' ), 'url' => '/ouvidoria' ),
	array( 'label' => __( 'Coronavírus', 'pmc-caraguatatuba' ), 'url' => '/coronavirus' ),
	array( 'label' => __( '156', 'pmc-caraguatatuba' ), 'url' => '/156' ),
);

$pmc_portais = array(
	array( 'label' => __( 'Portal Cidadão', 'pmc-caraguatatuba' ), 'url' => '/portal-cidadao' ),
	array( 'label' => __( 'Portal Empreendedor', 'pmc-caraguatatuba' ), 'url' => '/portal-empreendedor' ),
	array( 'label' => __( 'Portal Servidor', 'pmc-caraguatatuba' ), 'url' => '/portal-servidor' ),
);
?>
<!-- wp:group {"tagName":"div","className":"pmc-utility","backgroundColor":"primary-900","textColor":"white","layout":{"type":"default"}} -->
<div class="wp-block-group pmc-utility has-white-color has-primary-900-background-color has-text-color has-background">
	<!-- wp:html -->
	<div class="pmc-shell pmc-utility__inner">
		<nav class="pmc-utility__nav pmc-utility__nav--institucional" aria-label="<?php esc_attr_e( 'Links institucionais', 'pmc-caraguatatuba' ); ?>">
			<ul class="pmc-utility__list">
				<?php foreach ( $pmc_institucional as $pmc_item ) : ?>
					<li class="pmc-utility__item">
						<a class="pmc-utility__link" href="<?php echo esc_url( home_url( $pmc_item['url'] ) ); ?>"><?php echo esc_html( $pmc_item['label'] ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<nav class="pmc-utility__nav pmc-utility__nav--portais" aria-label="<?php esc_attr_e( 'Portais de serviço', 'pmc-caraguatatuba' ); ?>">
			<ul class="pmc-utility__list pmc-utility__list--separated">
				<?php foreach ( $pmc_portais as $pmc_item ) : ?>
					<li class="pmc-utility__item">
						<a class="pmc-utility__link" href="<?php echo esc_url( home_url( $pmc_item['url'] ) ); ?>"><?php echo esc_html( $pmc_item['label'] ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>
	</div>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->
