<?php
  if($_POST['action'] == 'delete') {
    $toDelete = $_POST['id'];
    $contents = file_get_contents('presets');
    $contents = array_filter(explode("\n", $contents));
    unset($contents[$toDelete]);
    $contents = implode("\n", $contents);
    file_put_contents('presets', $contents);
  }

  if($_POST['action'] == 'add') {
    $colors = implode(' ', $_POST['colors']);
    $contents = file_get_contents('presets');
    $contents = array_filter(explode("\n", $contents));
    array_push($contents, $colors);
    $contents = implode("\n", $contents);
    file_put_contents('presets', $contents);
    include 'displayPresets.php';
  }
?>
