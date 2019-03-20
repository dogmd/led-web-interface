<!DOCTYPE html>
<html>

<head>
    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>

    <!-- Add bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Add Slider libraries -->
    <script src="js/bootstrap-slider.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap-slider.min.css" />

    <!-- Custom css -->
    <link rel="stylesheet" href="css/toggle.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="application-title">Patio Lights</h1>
            </div>
        </div>
        <div class="row power-brightness">
            <div class="category-header">
                <h3>Power Controls</h3>
            </div>
            <div class="col-md-6 flex">
                <div id="power-control">
                    <span class="lead switch-title">LED Power: </span>

                    <!-- From https://www.abeautifulsite.net/bootstrap-4-switches -->
                    <span class="switch-label">Off</span>
                    <span class="switch switch-sm">
                        <input type="checkbox" class="switch" id="power-switch">
                        <label for="power-switch"></label>
                    </span>
                    <span class="switch-label">On</span>
                </div>
            </div>
            <div class="col-md-6 flex">
                <div id="brightness-control">
                    <span class="lead slider-title">Brightness: </span>
                    <input id="brightness-slider" data-slider-id='brightnessSlider' type="text" data-slider-min="0" data-slider-max="200" data-slider-step="1" data-slider-value="50" />
                </div>
            </div>
        </div>
        <div class="row" id="effects">
            <div class="category-header">
                <h3>Effect Controls</h3>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary btn-lg btn-block effect-option" id="solid-color" selected="selected">Solid Color</button>
                <a href="#solid-color-settings" class="collapse-toggle" id="solid-color-settings-toggle" data-toggle="collapse">Effect Settings <i class="fas fa-angle-right"></i></a>
                <div class="collapse effect-settings" id="solid-color-settings" for="solid-color">
                    <div class="more-info">
                        <a href="#solid-color-info" class="collapse-toggle" data-toggle="collapse">More Info <i class="fas fa-angle-right"></i></a>
                        <div class="collapse" id="solid-color-info">
                            <p>With this effect enabled it sets all strands to the same color specified by settings below. You can click the preview square to bring up a color selector.</p>
                        </div>
                    </div>
                    <div id="solid-color-setting-red">
                        <span class="lead setting-title">Red Value: </span>
                        <input class="setting-input" id="solid-color-red-slider" data-slider-id='solidColorRedSlider' type="text" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="251" />
                    </div>
                    <div id="solid-color-setting-green">
                        <span class="lead setting-title">Green Value: </span>
                        <input class="setting-input" id="solid-color-green-slider" data-slider-id='solidColorGreenSlider' type="text" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="238" />
                    </div>
                    <div id="solid-color-setting-blue">
                        <span class="lead setting-title">Blue Value: </span>
                        <input class="setting-input" id="solid-color-blue-slider" data-slider-id='solidColorBlueSlider' type="text" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="228" />
                    </div>
                    <div id="solid-color-preview" class="v-align">
                        <span class="lead setting-title">Preview: </span>
                        <div class="color-selector-bg" id="solid-color-color-selector-bg">
                            <input type="color" class="color-selector" id="solid-color-color-selector" value="#FBEEE4">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-outline-primary btn-lg btn-block effect-option" id="rainbow">Rainbow</button>
                <a href="#rainbow-settings" class="collapse-toggle" id="rainbow-settings-toggle" data-toggle="collapse">Effect Settings <i class="fas fa-angle-right"></i></a>
                <div class="collapse effect-settings" id="rainbow-settings" for="rainbow">
                    <div class="more-info">
                        <a href="#rainbow-info" class="collapse-toggle" data-toggle="collapse">More Info <i class="fas fa-angle-right"></i></a>
                        <div class="collapse" id="rainbow-info">
                            <p>Creates a rainbow down the entire strip. Can cycle through the rainbow, or not if speed is set to 0. Frequency changes how many rainbows are repeated through the strip. Select solid strip to make the entire strip one color that cycles through a rainbow.</p>
                        </div>
                    </div>
                    <div id="rainbow-setting-frequency">
                        <span class="lead setting-title">Frequency: </span>
                        <input class="setting-input" id="rainbow-frequency-slider" data-slider-id='rainbowFrequencySlider' type="text" data-slider-min="1" data-slider-max="20" data-slider-step="1" data-slider-value="3" />
                    </div>
                    <div id="rainbow-setting-speed">
                        <span class="lead setting-title">Speed: </span>
                        <input class="setting-input" id="rainbow-speed-slider" data-slider-id='rainbowSpeedSlider' type="text" data-slider-min="0" data-slider-max="200" data-slider-step="1" data-slider-value="8" />
                    </div>
                    <div id="rainbow-setting-solid-strip">
                        <button type="button" class="setting-input btn btn-outline-primary btn-block button-checkbox" id="rainbow-solid-strip">Solid Strip</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-outline-primary btn-lg btn-block effect-option" id="snow">Snow</button>
                <a href="#snow-settings" class="collapse-toggle" id="snow-settings-toggle" data-toggle="collapse">Effect Settings <i class="fas fa-angle-right"></i></a>
                <div class="collapse effect-settings" id="snow-settings" for="snow">
                    <div class="more-info">
                        <a href="#snow-info" class="collapse-toggle" data-toggle="collapse">More Info <i class="fas fa-angle-right"></i></a>
                        <div class="collapse" id="snow-info">
                            <p>White snow drifts down through the strands. Change frequency slider to make snow more likely, and the duration slider to change how long it lingers</p>
                        </div>
                    </div>
                    <div id="snow-setting-frequency">
                        <span class="lead setting-title">Frequency: </span>
                        <input class="setting-input" id="snow-frequency-slider" data-slider-id='snowFrequencySlider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.05" data-slider-value="0.5" />
                    </div>
                    <div id="snow-setting-duration">
                        <span class="lead setting-title">Duration: </span>
                        <input class="setting-input" id="snow-duration-slider" data-slider-id='snowDurationSlider' type="text" data-slider-min="0.1" data-slider-max="10" data-slider-step="0.1" data-slider-value="1" />
                    </div>
                    <div id="snow-setting-red">
                        <span class="lead setting-title">Red Value: </span>
                        <input class="setting-input" id="snow-red-slider" data-slider-id='snowRedSlider' type="text" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="251" />
                    </div>
                    <div id="snow-setting-green">
                        <span class="lead setting-title">Green Value: </span>
                        <input class="setting-input" id="snow-green-slider" data-slider-id='snowGreenSlider' type="text" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="238" />
                    </div>
                    <div id="snow-setting-blue">
                        <span class="lead setting-title">Blue Value: </span>
                        <input class="setting-input" id="snow-blue-slider" data-slider-id='snowBlueSlider' type="text" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="228" />
                    </div>
                    <div id="snow-preview" class="v-align">
                        <span class="lead setting-title">Preview: </span>
                        <div class="color-selector-bg" id="snow-color-selector-bg">
                            <input type="color" class="color-selector" id="snow-color-selector" value="#FBEEE4">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-outline-primary btn-lg btn-block effect-option" id="runner">Runner</button>
                <a href="#runner-settings" class="collapse-toggle" id="runner-settings-toggle" data-toggle="collapse">Effect Settings <i class="fas fa-angle-right"></i></a>
                <div class="collapse effect-settings" id="runner-settings" for="runner">
                    <div class="more-info">
                        <a href="#runner-info" class="collapse-toggle" data-toggle="collapse">More Info <i class="fas fa-angle-right"></i></a>
                        <div class="collapse" id="runner-info">
                            <p>A segment of color runs down the strip, change the length slider to change how long the segment is, change the speed slider to change how fast it moves down the strip. Click on preview to bring up a color selector.</p>
                        </div>
                    </div>
                    <div id="runner-setting-speed">
                        <span class="lead setting-title">Speed: </span>
                        <input class="setting-input" id="runner-speed-slider" data-slider-id='runnerSpeedSlider' type="text" data-slider-min="1" data-slider-max="200" data-slider-step="1" data-slider-value="30" />
                    </div>
                    <div id="runner-setting-length">
                        <span class="lead setting-title">Length: </span>
                        <input class="setting-input" id="runner-length-slider" data-slider-id='runnerLengthSlider' type="text" data-slider-min="1" data-slider-max="139" data-slider-step="1" data-slider-value="25" />
                    </div>
                    <div id="runner-setting-red">
                        <span class="lead setting-title">Red Value: </span>
                        <input class="setting-input" id="runner-red-slider" data-slider-id='runnerRedSlider' type="text" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="120" />
                    </div>
                    <div id="runner-setting-green">
                        <span class="lead setting-title">Green Value: </span>
                        <input class="setting-input" id="runner-green-slider" data-slider-id='runnerGreenSlider' type="text" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="81" />
                    </div>
                    <div id="runner-setting-blue">
                        <span class="lead setting-title">Blue Value: </span>
                        <input class="setting-input" id="runner-blue-slider" data-slider-id='runnerBlueSlider' type="text" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="169" />
                    </div>
                    <div id="runner-color-preview" class="v-align">
                        <span class="lead setting-title">Preview: </span>
                        <div class="color-selector-bg" id="runner-color-selector-bg">
                            <input type="color" class="color-selector" id="runner-color-selector" value="#7851A9">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-outline-primary btn-lg btn-block effect-option" id="patriot">Patriot</button>
                <a href="#patriot-settings" class="collapse-toggle" id="patriot-setting-toggle" data-toggle="collapse">Effect Settings <i class="fas fa-angle-right"></i></a>
                <div class="collapse effect-settings" id="patriot-settings" for="patriot">
                    <div class="more-info">
                        <a href="#patriot-info" class="collapse-toggle" data-toggle="collapse">More Info <i class="fas fa-angle-right"></i></a>
                        <div class="collapse" id="patriot-info">
                            <p>Celebrate your favorite country that has a flag colored red, white, and blue! If solid strand is selected, each strand is a solid color, otherwise it is spotted with red white or blue. If speed is not 0, the colors move down the LED strip.</p>
                        </div>
                    </div>
                    <div id="patriot-setting-speed">
                        <span class="lead setting-title">Speed: </span>
                        <input class="setting-input" id="patriot-speed-slider" data-slider-id='patriotSpeedSlider' type="text" data-slider-min="0" data-slider-max="200" data-slider-step="1" data-slider-value="0" />
                    </div>
                    <div id="patriot-setting-solid-strand">
                        <button type="button" class="setting-input btn btn-outline-primary btn-block button-checkbox" id="patriot-solid-strand">Solid Strand</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-outline-primary btn-lg btn-block effect-option" id="custom">Custom Colors</button>
                <a href="#custom-settings" class="collapse-toggle" id="custom-settings-toggle" data-toggle="collapse">Effect Settings <i class="fas fa-angle-right"></i></a>
                <div class="collapse effect-settings" id="custom-settings" for="custom">
                    <div class="more-info">
                        <a href="#custom-info" class="collapse-toggle" data-toggle="collapse">More Info <i class="fas fa-angle-right"></i></a>
                        <div class="collapse" id="custom-info">
                            <p>Set the color of individual strands. Click on "+ Add new preset" to bring up the custom strand creator.</p>
                        </div>
                    </div>
                    <div id="presets">
                      <?php include 'displayPresets.php' ?>                      
                    </div>
                    <a href="#" id="new-preset" data-toggle="modal" data-target="#newPresetModal">+ Add new preset</a>
                </div>
            </div>
        </div>
        <div class="row" id="global-effects">
          <div class="category-header">
            <h3>Global Effect Controls</h3>
          </div>
	    	<div class="col-md-4">
	    		<button type="button" class="btn btn-outline-primary btn-lg btn-block global-effect button-checkbox" id="wipe">Color Wipe</button>
	    		<a href="#wipe-settings" class="collapse-toggle" id="wipe-settings-toggle" data-toggle="collapse">Effect Settings <i class="fas fa-angle-right"></i></a>
	    		<div class="collapse effect-settings" id="wipe-settings" for="wipe">
	    			<div class="more-info">
	    				<a href="#wipe-info" class="collapse-toggle" data-toggle="collapse">More Info <i class="fas fa-angle-right"></i></a>
	    				<div class="collapse" id="wipe-info">
	    					<p>The selected color moves across the strip. Change the speed slider to select how fast it does this, and the length slider to change how long the segment of color is. If Full Strip is selected, the color will move until it fills up the entire strip, then go away. Click on preview to bring up a color selector.</p>
	    				</div>
	    			</div>
	    			<div id="wipe-setting-speed">
	    				<span class="lead setting-title">Speed: </span>
	    				<input class="setting-input" id="wipe-speed-slider" data-slider-id='wipeSpeedSlider' type="text" data-slider-min="1" data-slider-max="200" data-slider-step="1" data-slider-value="30" />
	    			</div>
	    			<div id="wipe-setting-length">
	    				<span class="lead setting-title">Length: </span>
	    				<input class="setting-input" id="wipe-length-slider" data-slider-id='wipeLengthSlider' type="text" data-slider-min="1" data-slider-max="139" data-slider-step="1" data-slider-value="20" />
	    			</div>
	    			<div id="wipe-setting-red">
	    				<span class="lead setting-title">Red Value: </span>
	    				<input class="setting-input" id="wipe-red-slider" data-slider-id='wipeRedSlider' type="text" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="120" />
	    			</div>
	    			<div id="wipe-setting-green">
	    				<span class="lead setting-title">Green Value: </span>
	    				<input class="setting-input" id="wipe-green-slider" data-slider-id='wipeGreenSlider' type="text" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="81" />
	    			</div>
	    			<div id="wipe-setting-blue">
	    				<span class="lead setting-title">Blue Value: </span>
	    				<input class="setting-input" id="wipe-blue-slider" data-slider-id='wipeBlueSlider' type="text" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="169" />
	    			</div>
	    			<div id="wipe-color-preview" class="v-align">
	    				<span class="lead setting-title">Preview: </span>
	    				<div class="color-selector-bg" id="wipe-color-selector-bg">
	    					<input type="color" class="color-selector" id="wipe-color-selector" value="#7851A9">
	    				</div>
	    			</div>
                    <div id="wipe-setting-full-strip">
                        <button type="button" class="setting-input btn btn-outline-primary btn-block button-checkbox" id="wipe-full-strip">Full Strip</button>
                    </div>
	    		</div>
	    	</div>
          <div class="col-md-4">
              <button type="button" class="btn btn-outline-primary btn-lg btn-block button-checkbox global-effect" id="twinkle">Twinkle</button>
              <a href="#twinkle-settings" class="collapse-toggle" id="twinkle-settings-toggle" data-toggle="collapse">Effect Settings <i class="fas fa-angle-right"></i></a>
              <div class="collapse effect-settings" id="twinkle-settings" for="twinkle">
                  <div class="more-info">
                      <a href="#twinkle-info" class="collapse-toggle" data-toggle="collapse">More Info <i class="fas fa-angle-right"></i></a>
                      <div class="collapse" id="twinkle-info">
                          <p>Your strip twinkles, change the frequency slider to change how often it does.</p>
                      </div>
                  </div>
                  <div id="twinkle-setting-frequency">
                      <span class="lead setting-title">Frequency: </span>
                      <input class="setting-input" id="twinkle-frequency-slider" data-slider-id='twinkleFrequencySlider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step="0.05" data-slider-value="0.5" />
                  </div>
		    <div id="twinkle-setting-duration">
			<span class="lead setting-title">Duration: </span>
			<input class="setting-input" id="twinkle-duration-slider" data-slider-id='twinkleDurationSlider' type="text" data-slider-min="0.1" data-slider-max="10" data-slider-step="0.1" data-slider-value="1" />
		    </div>
              </div>
          </div>
          <div class="col-md-4">
              <button type="button" class="btn btn-outline-primary btn-lg btn-block button-checkbox global-effect" id="breathe">Breathe</button>
              <a href="#breathe-settings" class="collapse-toggle" id="breathe-settings-toggle" data-toggle="collapse">Effect Settings <i class="fas fa-angle-right"></i></a>
              <div class="collapse effect-settings" id="breathe-settings" for="breathe">
                  <div class="more-info">
                      <a href="#breathe-info" class="collapse-toggle" data-toggle="collapse">More Info <i class="fas fa-angle-right"></i></a>
                      <div class="collapse" id="breathe-info">
                          <p>The brightness of your strip breathes between your set brightness and 0, change the speed slider to change how fast it does this.</p>
                      </div>
                  </div>
                  <div id="breathe-setting-speed">
                      <span class="lead setting-title">Speed: </span>
                      <input class="setting-input" id="breathe-speed-slider" data-slider-id='breatheSpeedSlider' type="text" data-slider-min="0.1" data-slider-max="50" data-slider-step="0.1" data-slider-value="1" />
                  </div>
              </div>
          </div>
          <div class="offset-md-4 col-md-4">
              <button type="button" class="btn btn-outline-primary btn-lg btn-block button-checkbox global-effect" id="blink">Blink</button>
              <a href="#blink-settings" class="collapse-toggle" id="blink-settings-toggle" data-toggle="collapse">Effect Settings <i class="fas fa-angle-right"></i></a>
              <div class="collapse effect-settings" id="blink-settings" for="blink">
                  <div class="more-info">
                      <a href="#blink-info" class="collapse-toggle" data-toggle="collapse">More Info <i class="fas fa-angle-right"></i></a>
                      <div class="collapse" id="blink-info">
                          <p>Your strip blinks on and off, off time changes how long the strip stays off when it blinks, on time changes how long it stays on between blinks</p>
                      </div>
                  </div>
                  <div id="blink-setting-off-time">
                      <span class="lead setting-title">Off time: </span>
                      <input class="setting-input" id="blink-off-time-slider" data-slider-id='blinkOffTimeSlider' type="text" data-slider-min="0.01" data-slider-max="10" data-slider-step="0.005" data-slider-value="0.25" />
                  </div>
                  <div id="blink-setting-on-time">
                      <span class="lead setting-title">On time: </span>
                      <input class="setting-input" id="blink-on-time-slider" data-slider-id='blinkOnTimeSlider' type="text" data-slider-min="0.01" data-slider-max="10" data-slider-step="0.005" data-slider-value="0.5" />
                  </div>
              </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="newPresetModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">New Preset</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="new-preset-colors">
              <?php for($i = 0; $i < 20; $i++): ?>
                <div class="new-preset-color-bg" style="background-color: #000000">
                  <input type="color" class="new-preset-color" value="#000000">
                </div>
              <?php endfor ?>
            </div>
            <a href="#" id="new-preset-color">+ Add new color</a>
          </div>
          <div class="modal-footer">
            <button class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            <button id="remove-all" class="btn btn-outline-danger">Remove All</button>
            <button id="randomize-colors" class="btn btn-outline-primary">Randomize</button>
            <button id="add-new-preset" type="button" class="btn btn-outline-success" data-dismiss="modal">Save</button>
          </div>
        </div>
      </div>
    </div>

    <script src="js/sliders.js"></script>
    <script src="js/controls.js"></script>
    <script src="js/websocket.js"></script>
</body>
</html>
