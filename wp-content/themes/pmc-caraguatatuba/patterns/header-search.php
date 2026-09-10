<?php
/**
 * Title: Header — busca com seletor de escopo
 * Slug: pmc-caraguatatuba/header-search
 * Categories: pmc-caraguatatuba
 * Description: Campo de busca em pill único, formado por seletor de escopo, campo de texto e botão.
 * Inserter: no
 *
 * @package PMC_Caraguatatuba
 *
 * NOTA ARQUITETURAL
 * O bloco core/search não possui seletor de escopo. Como o Design System exige
 * "Esta página / Todo o site" como controle funcional, a busca é um formulário
 * HTML próprio dentro de um bloco core/html — e não uma decoração sobreposta ao
 * bloco nativo. O parâmetro enviado é `escopo`; trate-o em `pre_get_posts`.
 */

$pmc_scope = isset( $_GET['escopo'] ) ? sanitize_key( wp_unslash( $_GET['escopo'] ) ) : 'pagina'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
?>
<!-- wp:group {"tagName":"div","className":"pmc-search-wrap","layout":{"type":"default"}} -->
<div class="wp-block-group pmc-search-wrap">
	<!-- wp:html -->
	<form class="pmc-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="pmc-search__scope">
			<label class="pmc-visually-hidden" for="pmc-search-scope"><?php esc_html_e( 'Escopo da busca', 'pmc-caraguatatuba' ); ?></label>
			<select class="pmc-search__select" id="pmc-search-scope" name="escopo">
				<option value="pagina" <?php selected( $pmc_scope, 'pagina' ); ?>><?php esc_html_e( 'Esta página', 'pmc-caraguatatuba' ); ?></option>
				<option value="site" <?php selected( $pmc_scope, 'site' ); ?>><?php esc_html_e( 'Todo o site', 'pmc-caraguatatuba' ); ?></option>
			</select>
		</div>

		<label class="pmc-visually-hidden" for="pmc-search-field"><?php esc_html_e( 'Termo de busca', 'pmc-caraguatatuba' ); ?></label>
		<input
			class="pmc-search__field"
			id="pmc-search-field"
			type="search"
			name="s"
			value="<?php echo esc_attr( get_search_query() ); ?>"
			placeholder="<?php esc_attr_e( 'O que você está buscando?', 'pmc-caraguatatuba' ); ?>"
			autocomplete="off"
		/>

		<button class="pmc-search__submit" type="submit">
			<span class="pmc-visually-hidden"><?php esc_html_e( 'Buscar', 'pmc-caraguatatuba' ); ?></span>
			<svg class="pmc-search__icon" viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
				<circle cx="10.5" cy="10.5" r="6.5"></circle>
				<line x1="15.4" y1="15.4" x2="20.5" y2="20.5"></line>
			</svg>
		</button>
	</form>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->
