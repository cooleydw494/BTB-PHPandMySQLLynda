<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php

  $page = $_GET['page'] ?? 1;
  $per_page = 5;
  $total_count = Photograph::count_all();

  // // Find all the photos
  // $photos = Photograph::find_all();
  // USE PAGINATION
  $pagination = new Pagination((int)$page, $per_page, $total_count);

  $sql = "SELECT * FROM photographs ";
  $sql .= "LIMIT {$per_page} ";
  $sql .= "OFFSET {$pagination->offset()}";
  $photos = Photograph::find_by_sql($sql);

?>
<?php include_layout_template('admin_header.php'); ?>

<h2>Photographs</h2>

<?php echo output_message($message); ?>

<table class="bordered">
  <tr>
    <th>Image</th>
    <th>Filename</th>
    <th>Caption</th>
    <th>Size</th>
    <th>Type</th>
    <th>Comments</th>
    <th>&nbsp;</th>
  </tr>
<?php foreach($photos as $photo): ?>
  <tr>
    <td>
      <a href="../photo.php?id=<?php echo $photo->id; ?>">
        <img src="../<?php echo $photo->image_path(); ?>" width="150" />
      </a>
    </td>
    <td><?php echo $photo->filename; ?></td>
    <td><?php echo $photo->caption; ?></td>
    <td><?php echo $photo->size_as_text(); ?></td>
    <td><?php echo $photo->type; ?></td>
    <td>
      <a href="comments.php?id=<?php echo $photo->id; ?>">
        <?php echo count($photo->comments()); ?>
      </a>
    </td>
    <td><a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a></td>
  </tr>
<?php endforeach; ?>
</table>
<br />
<a href="photo_upload.php">Upload a new photograph</a>

<div id="pagination" style="clear:both;">
	<?php
	if ($pagination->total_pages() > 1) {

		if ($pagination->has_previous_page()) {
			echo "<a style=\"margin-left:2em;\" href=\"list_photos.php?page=" . $pagination->previous_page() . "\">&laquo;Previous</a>";
		}

		for ($i = 1; $i <= $pagination->total_pages(); $i++) {
			if ($i == $pagination->current_page) {
				echo "<a class=\"selected\" style=\"margin-left:1em;\" href=\"list_photos.php?page=" . $i . "\">{$i}</a>";
			} else {
				echo "<a style=\"margin-left:1em;\" href=\"list_photos.php?page=" . $i . "\">{$i}</a>";
			}
		}

		if ($pagination->has_next_page()) {
			echo "<a style=\"margin-left:2em;\" href=\"list_photos.php?page=" . $pagination->next_page() . "\">Next &raquo;</a>";
		}

	}
	 ?>
</div>

<?php include_layout_template('admin_footer.php'); ?>
