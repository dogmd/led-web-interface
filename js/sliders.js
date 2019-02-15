$('#brightness-slider').slider({
    formatter: function (value) {
        return value + '%';
    }
});

// Solid color sliders
$('#solid-color-red-slider').slider();
$('#solid-color-green-slider').slider();
$('#solid-color-blue-slider').slider();

// Rainbow sliders
$('#rainbow-speed-slider').slider({
    formatter: function (value) {
        return value + ' px/s'
    }
});
$('#rainbow-frequency-slider').slider({
    formatter: function (value) {
        return value + ' rainbows'
    }
});

// Snow sliders
$('#snow-frequency-slider').slider({
    formatter: function (value) {
        return value * 100 + '%'
    }
});
$('#snow-duration-slider').slider({
    formatter: function (value) {
        return value + ' s'
    }
});

// Patriot sliders
//$('#patriot-speed-slider').slider({
//    formatter: function (value) {
//        return value + ' px/s'
//    }
//});

// Runner sliders
$('#runner-speed-slider').slider({
    formatter: function (value) {
        return value + ' px/s'
    }
});
$('#runner-length-slider').slider({
    formatter: function (value) {
        return value + ' px'
    }
});
$('#runner-red-slider').slider();
$('#runner-green-slider').slider();
$('#runner-blue-slider').slider();

// Wipe sliders
$('#wipe-speed-slider').slider({
    formatter: function (value) {
        return value + ' px/s'
    }
});
$('#wipe-red-slider').slider();
$('#wipe-green-slider').slider();
$('#wipe-blue-slider').slider();

// Global effect sliders
$('#twinkle-frequency-slider').slider();
$('#breathe-speed-slider').slider({
  formatter: function (value) {
    return value + ' cycles/s'
  }
});
$('#blink-off-time-slider').slider({
  formatter: function (value) {
    return value + ' s'
  }
});
$('#blink-on-time-slider').slider({
  formatter: function (value) {
    return value + ' s'
  }
});
