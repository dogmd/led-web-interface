<?php
    function get_status($pipes) {
        fwrite($pipes[0], 'get');
        fclose($pipes[0]);
        $status = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        echo "<script>updateDOM(".$status.");</script>";
        echo "Status: ".$status;
    }

    function update_status($pipes, $key, $value, $setting_name) {
        fwrite($pipes[0], 'update\n');
        $settings = ['key' => $key, 'value' => $value, 'setting' => $setting_name];
        fwrite($pipes[0], json_encode($settings));
    }
?>
