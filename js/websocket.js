// From: https://developer.mozilla.org/en-US/docs/Web/API/WebSocket
// Create WebSocket connection.
const socket = new WebSocket('ws://localhost:8765');

state = {changeStatus: false};

// Connection opened
socket.addEventListener('open', function (event) {
    requestStatus();
});

socket.addEventListener('close', function(event) {
    console.log(event.code);
});

// Listen for messages (update the DOM)
socket.addEventListener('message', function (event) {
    state = JSON.parse(event.data);
    updateDOM();
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
    console.log(state.powerSettings.brightness);
    $('#brightness-slider').slider('setValue', state.powerSettings.brightness);
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
