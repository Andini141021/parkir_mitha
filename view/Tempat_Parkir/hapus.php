<?php
include '../../config/database.php';
$id = $_GET['id'];
$conn->query("DELETE FROM tempat_parkir WHERE id=$id");
header('Location: index.php');
?>