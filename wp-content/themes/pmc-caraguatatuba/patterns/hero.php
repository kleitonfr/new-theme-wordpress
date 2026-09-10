<?php
/**
 * Title: Hero — banner de destaques
 * Slug: pmc-caraguatatuba/hero
 * Categories: pmc-caraguatatuba
 * Description: Banner principal em camadas (faixa fotográfica no topo, arte de fundo, véu e conteúdo) com três destaques alternados por carrossel.
 * Inserter: yes
 *
 * @package PMC_Caraguatatuba
 *
 * ESTRUTURA EM CAMADAS
 *   1. .pmc-hero__strip   faixa decorativa no topo   (CSS, decorativa)
 *   2. .pmc-hero          arte de fundo              (CSS, decorativa)
 *   3. .pmc-hero__veil    véu claro da esquerda      (CSS, decorativa)
 *   4. .pmc-hero__slide   conteúdo editável          (blocos nativos)
 *   5. .pmc-hero__dots    controles do carrossel     (core/html)
 *
 * As camadas decorativas vêm de CSS porque um arquivo .html de template part não
 * resolve caminhos de asset do tema; os três caminhos ficam centralizados nas
 * variáveis --pmc-img-* no topo de assets/css/portal.css.
 *
 * O primeiro destaque usa <h1> (é o título da página inicial); os demais usam
 * <h2> com a mesma classe, para não haver mais de um <h1> no documento.
 */

$pmc_slides = array(
	array(
		'tag'       => __( 'SEMAAP', 'pmc-caraguatatuba' ),
		'titulo'    => __( 'Semana do Meio Ambiente 2025', 'pmc-caraguatatuba' ),
		'descricao' => __( 'Participe das ações de preservação ambiental e sustentabilidade no município.', 'pmc-caraguatatuba' ),
		'cta'       => __( 'Saiba mais', 'pmc-caraguatatuba' ),
		'url'       => '/semana-do-meio-ambiente',
		'nivel'     => 1,
	),
	array(
		'tag'       => __( 'SAÚDE', 'pmc-caraguatatuba' ),
		'titulo'    => __( 'Vacinação nos bairros', 'pmc-caraguatatuba' ),
		'descricao' => __( 'Confira o calendário de vacinação nas unidades de saúde do município.', 'pmc-caraguatatuba' ),
		'cta'       => __( 'Saiba mais', 'pmc-caraguatatuba' ),
		'url'       => '/vacinacao',
		'nivel'     => 2,
	),
	array(
		'tag'       => __( 'CIDADE', 'pmc-caraguatatuba' ),
		'titulo'    => __( 'Obras e mobilidade urbana', 'pmc-caraguatatuba' ),
		'descricao' => __( 'Acompanhe as intervenções em andamento nas vias da cidade.', 'pmc-caraguatatuba' ),
		'cta'       => __( 'Saiba mais', 'pmc-caraguatatuba' ),
		'url'       => '/obras',
		'nivel'     => 2,
	),
);
?>
<!-- wp:group {"tagName":"section","className":"pmc-hero","layout":{"type":"default"}} -->
<section class="wp-block-group pmc-hero">
	<!-- wp:html -->
	<div class="pmc-hero__veil" aria-hidden="true"></div>
	<!-- /wp:html -->

	<!-- wp:group {"tagName":"div","className":"pmc-shell pmc-hero__inner","layout":{"type":"default"}} -->
	<div class="wp-block-group pmc-shell pmc-hero__inner">
		<?php foreach ( $pmc_slides as $pmc_i => $pmc_slide ) : ?>
			<?php $pmc_active = 0 === $pmc_i ? ' is-active' : ''; ?>

		<!-- wp:group {"tagName":"div","className":"pmc-hero__slide<?php echo esc_attr( $pmc_active ); ?>","layout":{"type":"default"}} -->
		<div class="wp-block-group pmc-hero__slide<?php echo esc_attr( $pmc_active ); ?>">
			<!-- wp:paragraph {"className":"pmc-hero__tag","backgroundColor":"secondary-600","textColor":"primary-900","fontSize":"14"} -->
			<p class="pmc-hero__tag has-primary-900-color has-secondary-600-background-color has-text-color has-background has-14-font-size"><?php echo esc_html( $pmc_slide['tag'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":<?php echo (int) $pmc_slide['nivel']; ?>,"className":"pmc-hero__title","textColor":"white","fontSize":"hero"} -->
			<h<?php echo (int) $pmc_slide['nivel']; ?> class="wp-block-heading pmc-hero__title has-white-color has-text-color has-hero-font-size"><?php echo esc_html( $pmc_slide['titulo'] ); ?></h<?php echo (int) $pmc_slide['nivel']; ?>>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"pmc-hero__text","textColor":"white","fontSize":"18"} -->
			<p class="pmc-hero__text has-white-color has-text-color has-18-font-size"><?php echo esc_html( $pmc_slide['descricao'] ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"className":"pmc-hero__actions"} -->
			<div class="wp-block-buttons pmc-hero__actions">
				<!-- wp:button {"backgroundColor":"secondary-600","textColor":"primary-900","className":"pmc-hero__cta","style":{"border":{"radius":"999px"}}} -->
				<div class="wp-block-button pmc-hero__cta"><a class="wp-block-button__link has-primary-900-color has-secondary-600-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( home_url( $pmc_slide['url'] ) ); ?>" style="border-radius:999px"><?php echo esc_html( $pmc_slide['cta'] ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->

	<!-- wp:html -->
	<div class="pmc-hero__dots" role="group" aria-label="<?php esc_attr_e( 'Selecionar destaque', 'pmc-caraguatatuba' ); ?>">
		<?php foreach ( $pmc_slides as $pmc_i => $pmc_slide ) : ?>
			<button
				class="pmc-hero__dot<?php echo 0 === $pmc_i ? ' is-active' : ''; ?>"
				type="button"
				data-pmc-dot="<?php echo (int) $pmc_i; ?>"
				<?php echo 0 === $pmc_i ? 'aria-current="true"' : ''; ?>
			>
				<span class="pmc-visually-hidden">
					<?php
					/* translators: 1: posição do destaque, 2: título do destaque. */
					printf( esc_html__( 'Destaque %1$d: %2$s', 'pmc-caraguatatuba' ), (int) $pmc_i + 1, esc_html( $pmc_slide['titulo'] ) );
					?>
				</span>
			</button>
		<?php endforeach; ?>
	</div>
	<!-- /wp:html -->
</section>
<!-- /wp:group -->
