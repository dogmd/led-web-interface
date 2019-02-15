// From: https://developer.mozilla.org/en-US/docs/Web/API/WebSocket
// Create WebSocket connection.
const serverIP = '192.168.8.180';
const socket = new WebSocket('ws://' + serverIP + ':8765');

state = {changeStatus: false};

// Connection opened
socket.addEventListener('open', function (event) {
    requestStatus();
});

socket.addEventListener('close', function(event) {
    alert('Connection to websocket closed with code ' + event.code);
});

// Listen for messages (update the DOM)
socket.addEventListener('message', function (event) {
    state = JSON.parse(event.data);
    updateDOM();
    startAutoUpdate();
});

function parseDOM() {
    effects = {};
    $('button.effect-option, button.global-effect').each(function() {
        effectName = $(this).attr('id');
        settings = {};
        settings['selected'] = $(this).val();
        if (effectName == 'custom') {
            $('#presets .preset').each(function() {
                if ($(this).children().first().attr('selected')) {
                    colors = [];
                    
                    $(this).find('.preset-color').each(function() {
                        color = rgb2hex($(this).css('background-color'), '');
                        colors.push(color);
                    });
                    settings['index'] = $(this).index();
                    settings['colors'] = colors;
                }
            });
        } else {
            $(this).parent().find("[id^=" + effectName + "-setting-]").each(function() {
                settingName = $(this).attr('id').substring((effectName + "-setting-").length);
                settingVal = $(this).children(".setting-input").first().val();
                settings[settingName] = settingVal;
            });
        }
        effects[effectName] = settings;
    });
    power = {};
    power['isOn'] = $('#power-switch').val();
    power['brightness'] = $('#brightness-slider').val();
    state['effects'] = effects;
    state['powerSettings'] = power;
}

function updateDOM() {
    if ($('#power-switch').val() != state.powerSettings.isOn) {
        $('#power-switch').val(state.powerSettings.isOn);
        $('#power-switch').click();
    }
    $('#brightness-slider').slider('setValue', state.powerSettings.brightness);
    
    effects = state.effects;

    $('.global-effect, .effect-option').each(function() {
        effectName = $(this).attr('id');
        if ($(this).val() != effects[effectName].selected) {
            $(this).click();
        }
    });

    $('#presets .preset').eq(effects.custom.index).children().first().click();

    effectNames = Object.keys(effects).forEach(function (effectName) {
        Object.keys(effects[effectName]).forEach(function (settingName) {
            settingId = '#' + effectName + '-setting-' + settingName;
            settingVal = effects[effectName][settingName];
            
            $(settingId + ' input.setting-input').slider('setValue', settingVal);
            $(settingId + ' .button-checkbox.setting-input').each(function() {
                if ($(this).val() != settingVal) {
                    $(this).click();
                }
            });
        });
    });
}

function requestStatus() {
    state['changeStatus'] = false;
    sendState();
}

function updateStatus() {
    state['changeStatus'] = true;
    console.log(state);
    parseDOM();
    sendState();
}

function sendState() {
    socket.send(JSON.stringify(state));
}

function startAutoUpdate() {
    $('.setting-input, #brightness-slider').each(function() {
        if ($(this).attr('data-slider-id')) {
            $('#' + $(this).attr('data-slider-id')).click(updateStatus);
        }
    });
    $('.effect-option, .global-effect, .setting-input, #brightness-slider, #power-switch').click(updateStatus);
}
