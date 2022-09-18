<?php
include 'model.php';
 $model = new Model();
  $id = $_REQUEST['id'];

 $delete = $model->delete($id);

 if ($delete) {
    echo "<script>alert('records successfully deleted');</script>";
	echo "<script>window.location.href = 'record.php';</script>";
 }
?>