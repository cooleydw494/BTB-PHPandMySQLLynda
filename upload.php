<!DOCTYPE html>
<?php

// in an application, this could be moved to a config file
// http://www.php.net/manual/en/features.file-upload.errors.php
$upload_errors = [
  UPLOAD_ERR_OK => "No errors.",
  UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize.",
  UPLOAD_ERR_FORM_SIZE => "Larger than form MAX_FILE_SIZE.",
  UPLOAD_ERR_PARTIAL => "Partial Upload.",
  UPLOAD_ERR_NO_FILE => "No file.",
  UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
  UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
  UPLOAD_ERR_EXTENSION => "File upload stopped by extension."
];

$error = $_FILES['file_upload']['error'] ?? NULL;
$message = $upload_errors[$error] ?? NULL;

if (isset($_POST['submit'])) {
  $tmp_file = $_FILES['file_upload']['tmp_name'];
  $target_file = basename($_FILES['file_upload']['name']);
  $upload_dir = "uploads";

  // You will probably want to first use file_exists() to make sure
  // there isn't already a file by the same name

  // move_uploaded_file will return false if $tmp_file is not a valid upload file
  // or if it cannot be moved for any other reason :o
  if (move_uploaded_file($tmp_file, $upload_dir."\\".$target_file)) {
    $message = "File uploaded successfully";
  } else {
    $error = $_FILES['file_upload']['error'];
    $message = $upload_errors[$error];
  }
}

?>
<html lang="en">
  <head>
    <title></title>
  </head>
  <body>

    <?php
    // The maximum file size (in bytes) must be declared before the file input field
    // and can't be larger than the setting for upload_max_filesize in php.ini

    // This form value can be manipulated. You should still use it, but you rely
    // on upload_max_filesize as the absolute limit

    // 1 megabyte is actually 1,048,576 bytes.
    // You can round it unless precision matters
     ?>

    <?php if(!empty($message)) { echo "<p>{$message}</p>"; } ?>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
      <input type="file" name="file_upload">
      <input type="submit" name="submit" value="Upload">
    </form>

  </body>
</html>
