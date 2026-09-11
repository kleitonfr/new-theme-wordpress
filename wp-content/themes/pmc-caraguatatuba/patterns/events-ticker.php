<?php
/**
 * Title: Header — faixa de eventos
 * Slug: pmc-caraguatatuba/events-ticker
 * Categories: pmc-caraguatatuba
 * Description: Terceira faixa do header: rótulo EVENTOS em amarelo institucional e lista horizontal rolável de próximos eventos.
 * Inserter: no
 *
 * @package PMC_Caraguatatuba
 *
 * CONTEÚDO ESTÁTICO
 * Os eventos abaixo estão isolados no array `$pmc_eventos` justamente para que a
 * troca por uma consulta (CPT `evento`, por exemplo) não exija tocar na marcação.
 */

$pmc_eventos = array(
	array(
		'dia' => __('05 ABR', 'pmc-caraguatatuba'),
		'titulo' => __('Mutirão de Limpeza - Orla e Parque', 'pmc-caraguatatuba'),
		'url' => '/eventos/mutirao-de-limpeza',
	),
	array(
		'dia' => __('26 ABR', 'pmc-caraguatatuba'),
		'titulo' => __('Vacinação - Quadra do Massaguaçu', 'pmc-caraguatatuba'),
		'url' => '/eventos/vacinacao-massaguacu-abril',
	),
	array(
		'dia' => __('15 MAI', 'pmc-caraguatatuba'),
		'titulo' => __('Vacinação - Quadra do Massaguaçu', 'pmc-caraguatatuba'),
		'url' => '/eventos/vacinacao-massaguacu-maio',
	),
);
?>
<!-- wp:group {"tagName":"div","className":"pmc-events","gradient":"ticker-gradient","textColor":"white","layout":{"type":"default"}} -->
<div
	class="wp-block-group pmc-events has-white-color has-ticker-gradient-gradient-background has-text-color has-background">
	<!-- wp:html -->
	<div class="pmc-events__inner">
		<p class="pmc-events__label">
			<svg class="pmc-events__icon" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
				stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
				<rect x="3" y="4.5" width="18" height="16" rx="2.5"></rect>
				<line x1="3" y1="9.5" x2="21" y2="9.5"></line>
				<line x1="8" y1="2.5" x2="8" y2="6.5"></line>
				<line x1="16" y1="2.5" x2="16" y2="6.5"></line>
			</svg>
			<span class="pmc-events__label-text"><?php esc_html_e('EVENTOS', 'pmc-caraguatatuba'); ?></span>
		</p>

		<nav class="pmc-events__nav" aria-label="<?php esc_attr_e('Próximos eventos', 'pmc-caraguatatuba'); ?>">
			<div class="pmc-events__track" data-pmc-ticker>
				<ul class="pmc-events__list">
					<?php foreach ($pmc_eventos as $pmc_evento): ?>
						<li class="pmc-events__item">
							<a class="pmc-events__link" href="<?php echo esc_url(home_url($pmc_evento['url'])); ?>">
								<span class="pmc-events__date"><?php echo esc_html($pmc_evento['dia']); ?></span>
								<span class="pmc-events__title"><?php echo esc_html($pmc_evento['titulo']); ?></span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
				<ul class="pmc-events__list" aria-hidden="true">
					<?php foreach ($pmc_eventos as $pmc_evento): ?>
						<li class="pmc-events__item">
							<a class="pmc-events__link" href="<?php echo esc_url(home_url($pmc_evento['url'])); ?>"
								tabindex="-1">
								<span class="pmc-events__date"><?php echo esc_html($pmc_evento['dia']); ?></span>
								<span class="pmc-events__title"><?php echo esc_html($pmc_evento['titulo']); ?></span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</nav>
	</div>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->