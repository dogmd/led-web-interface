// Makes arrow icon on collapse toggle match state
$('.collapse-toggle').click(function () {
    var icon = $(this).find('i.fas');
    if (icon) {
        if (icon.attr('class') == 'fas fa-angle-right') {
            icon.attr('class', 'fas fa-angle-down');
        } else {
            icon.attr('class', 'fas fa-angle-right');
        }
    }
});

// Solid color slider / preview control
$('#solid-color-red-slider, #solid-color-green-slider, #solid-color-blue-slider').change(function (event) {
    manageColor('#solid-color');
});
$('#solid-color-settings-toggle').click(function (event) {
    manageColor('#solid-color');
});
$('#solid-color-color-selector').on('input', function (event) {
    manageColorSliders('#solid-color', event);
});

// Runner slider / preview control
$('#runner-red-slider, #runner-green-slider, #runner-blue-slider').change(function (event) {
    manageColor('#runner');
});
$('#runner-settings-toggle').click(function (event) {
    manageColor('#runner');
});
$('#runner-color-selector').on('input', function (event) {
    manageColorSliders('#runner', event);
});

// Wipe slider / preview control
$('#wipe-red-slider, #wipe-green-slider, #wipe-blue-slider').change(function (event) {
    manageColor('#wipe');
});
$('#wipe-settings-toggle').click(function (event) {
    manageColor('#wipe');
});
$('#wipe-color-selector').on('input', function (event) {
    manageColorSliders('#wipe', event);
});

// Changes sliders to match preview square
function manageColorSliders(effectPrefix, event) {
    var rgb = hex2rgb(event.target.value);
    var redSlider = $(effectPrefix + '-red-slider').slider();
    var greenSlider = $(effectPrefix + '-green-slider').slider();
    var blueSlider = $(effectPrefix + '-blue-slider').slider();
    redSlider.slider('setValue', rgb.r);
    greenSlider.slider('setValue', rgb.g);
    blueSlider.slider('setValue', rgb.b);
    $(effectPrefix + '-color-selector-bg').css('background-color', event.target.value);
}

// Changes the preview square in solid color settings
function manageColor(effectPrefix) {
    var red = $(effectPrefix + '-red-slider').attr('value');
    var green = $(effectPrefix + '-green-slider').attr('value');
    var blue = $(effectPrefix + '-blue-slider').attr('value');

    var rgb = "rgb(" + red + ", " + green + ", " + blue + ")";
    $(effectPrefix + '-color-selector').attr('value', rgb2hex(rgb));
    $(effectPrefix + '-color-selector-bg').css('background-color', rgb);
    if (red == 255 && green == 255 && blue == 255) {
        $(effectPrefix + '-color-selector-bg').css('border-style', 'solid'); // Add black outline if preview is white
    } else {
        $(effectPrefix + '-color-selector-bg').css('border-style', 'hidden');
    }
}

// From https://stackoverflow.com/questions/1740700/how-to-get-hex-color-value-rather-than-rgb-value
function rgb2hex(rgb, hashtag='#') {
    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

    function hex(x) {
        return ("0" + parseInt(x).toString(16)).slice(-2);
    }
    return hashtag + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}

// From https://stackoverflow.com/questions/5623838/rgb-to-hex-and-hex-to-rgb
function hex2rgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}

$('#solid-color').val(true);

function radioButtons(radioClass, clicked) {
    // Get rid of all toggled state 
    $(radioClass).each(function () {
        $(this).removeAttr('selected');
        $(this).val(false);
        var classes = $(this).attr('class');
        classes = classes.replace('btn-primary', 'btn-outline-primary');
        $(this).attr('class', classes);
    });

    // Retoggle proper button
    var classes = clicked.attr('class');
    classes = classes.replace('btn-outline-primary', 'btn-primary');
    clicked.attr('class', classes);
    clicked.attr('selected', '');
    clicked.val(true);
};

// Turn buttons into radio buttons
$('.effect-option').click(function() { radioButtons('.effect-option', $(this)); });
$('.preset-select').click(function() { radioButtons('.preset-select', $(this)); });

$('.button-checkbox').each(function () {
    if ($(this).attr('checked')) {
        $(this).val(true);
    } else {
        $(this).val(false);
    }
});
// Turn buttons into checkboxes
$('.button-checkbox').click(function () {
    if ($(this).attr('checked')) {
        $(this).removeAttr('checked');
        $(this).val(false);
        $(this).removeClass('btn-primary');
        $(this).addClass('btn-outline-primary');
    } else {
        $(this).attr('checked', '');
        $(this).val(true);
        $(this).removeClass('btn-outline-primary');
        $(this).addClass('btn-primary');
    }
});

$('#new-preset-color').click(function() {
  var newColorInput = '<div class="new-preset-color-bg" style="background-color: #000000"><input type="color" class="new-preset-color" value="#000000"></div>'
  $('#new-preset-colors').append(newColorInput);
  newPresetColorListener();
});
newPresetColorListener();

$('#remove-all').click(function() {
  $('.new-preset-color-bg').remove();
});

$('#add-new-preset').click(function() {
  var colors = [];
  $('.new-preset-color').each(function() {
    colors.push($(this).val().replace('#', ''));
  });
  $.ajax({
    method: "POST",
    url: '/editPresets.php',
    data: { action: 'add', colors: colors },
    success: function(html) {
      $('#presets').html(html);
      presetDeleteListener();
      $('.preset-select').click(function() { radioButtons('.preset-select', $(this)); });
    }
  });
});

$('#randomize-colors').click(function() {
  $('.new-preset-color').each(function() {
    var r = Math.floor(Math.random() * 256);
    var g = Math.floor(Math.random() * 256);
    var b = Math.floor(Math.random() * 256);
    var rgb = 'rgb(' + r + ', ' + g + ', ' + b + ')';
    $(this).val(rgb2hex(rgb));
    $(this).parent().css('background-color', rgb);
  });
});
$('#randomize-colors').click();

function presetDeleteListener() {
  $('.preset-delete').click(function() {
    var toDelete = $(this).attr('for');
    $.ajax({
      method: "POST",
      url: '/editPresets.php',
      data: { action:'delete', id: toDelete }
    });
    $('.preset').eq(toDelete).remove();
    if (toDelete == state.effects.custom.index) {
        state.effects.custom = {};
        updateStatus();
    }
  });
}
presetDeleteListener();

function newPresetColorListener() {
  $('.new-preset-color').on('input change', function(event) {
    $(this).parent().css('background-color', event.target.value);
  });
}

$('#power-switch').val(false);

$('#power-control label').click(function() {
    if ($('#power-switch').val() === "true") {
        $('#power-switch').val(false);
    } else {
        $('#power-switch').val(true);
    }
});
