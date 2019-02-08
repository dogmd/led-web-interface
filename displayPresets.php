<?php
	$contents = file_get_contents('presets');
	$presets = array_filter(explode("\n", $contents));
	foreach($presets as $index => $preset) {
		echo '<div class="preset v-align">';
		echo '<div class="btn btn-outline-primary btn-xs preset-select v-align">Select</div>';
		$colors = array_filter(explode(' ', $preset));
		foreach($colors as $color) {
			echo '<div class="preset-color" style="background-color: #'.$color.';"></div>';
		}
		echo '<a class="preset-delete" href="#" for="'.$index.'"><i class="fas fa-times"></i></a>';
		echo '</div>';
	}
?>
