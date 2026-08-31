<div id="accessibilityTools" class="accessibility-tools position-fixed">
	<button 
		id="accessibilityToolsButton" 
		class="btn btn-primary float-left" 
		type="button" 
		data-toggle="tooltip" 
		data-placement="top" 
		data-container="#accessibilityToolsButton" 
		title="Acessibilidade">
		<i class="fas fa-low-vision fa-2x"></i>
	</button>

	<div id="accessibilityIcons" class="float-left" style="display: none;">
		<div class="accessibility-icon position-relative d-inline-block">
			<button 
				id="contrastAdjust" 
    		class="btn btn-light btn-sm float-left" 
    		type="button" 
  			data-toggle="tooltip" 
  			data-placement="top" 
  			data-container="#contrastAdjust" 
  			title="Contraste">
				<i class="fas fa-lightbulb fa-2x fa-fw"></i>
			</button>
		</div>
		<div class="accessibility-icon position-relative d-inline-block">
			<button 
				id="increaseZoom" 
    		class="btn btn-light btn-sm float-left" 
    		type="button" 
  			data-toggle="tooltip" 
  			data-placement="top" 
  			data-container="#increaseZoom" 
  			title="Aumentar">
				<i class="fas fa-search-plus fa-2x fa-fw"></i>
			</button>
		</div>
		<div class="accessibility-icon position-relative d-inline-block">
			<button 
				id="decreaseZoom" 
    		class="btn btn-light btn-sm float-left" 
    		type="button" 
    		disabled="disabled" 
  			data-toggle="tooltip" 
  			data-placement="top" 
  			data-container="#decreaseZoom" 
  			title="Diminuir">
				<i class="fas fa-search-minus fa-2x fa-fw"></i>
			</button>
		</div>
		<div class="accessibility-icon position-relative d-inline-block">
			<button 
				id="redefineZoom" 
    		class="btn btn-light btn-sm float-left" 
    		type="button" 
    		disabled="disabled" 
  			data-toggle="tooltip" 
  			data-placement="top" 
  			data-container="#redefineZoom" 
  			title="Redefinir">
				<i class="fas fa-power-off fa-2x fa-fw"></i>
			</button>
		</div>
	</div>
</div>