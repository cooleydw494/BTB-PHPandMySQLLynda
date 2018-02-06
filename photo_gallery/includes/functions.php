<?php

function log_action($action, $message = "") {
  $file = SITE_ROOT.DS.'logs'.DS.'log.txt';
  if ($handle = fopen($file, 'a')) {
    $logmessage = strftime('%Y-%m-%d %H:%M:%S', time()) . " | {$action}: $message" . PHP_EOL;
    fwrite($handle, $logmessage);
    fclose($handle);
  } else {
    echo 'failed to write to log';
  }
}

function strip_zeros_from_date($marked_string="") {
  //remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  //remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to($location = NULL) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

function output_message($message = '') {
  if (!empty($message)) {
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}

function __autoload($class_name) {
  $class_name = strtolower($class_name);
  $path = LIB_PATH.DS.'{$class_name}.php';
  if (file_exists($path)) {
    require_once($path);
  } else {
    die("The file {$class_name}.php could not be found.");
  }
}

function include_layout_template($template = '') {
  include SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template;
}
