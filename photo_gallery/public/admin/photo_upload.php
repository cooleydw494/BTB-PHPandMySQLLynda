<?php
require_once '../../includes/initialize.php';
if (!$session->is_logged_in()) { redirect_to("login.php"); }

$max_file_size = 1048576;  //expressed in bytes
                          // 10240 = 10 KB
                          // 102400 = 100KB
                          // 1048576 = 1MB
                          // 10485760 = 10 MB
?>
<?php include_layout_template('admin_header.php'); ?>

  <h2>Photo Upload</h2>

  <form action="photo_upload.php" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <p><input type="file" name="file_upload"></p>
    <p>Caption: <input type="text" name="caption" value=""></p>
    <input type="submit" name="submit" value="Upload">
  </form>

<?php include_layout_template('admin_footer.php'); ?>
