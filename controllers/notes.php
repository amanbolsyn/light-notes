<?php 

$heading = "All notes";


$query = "select * from notes where user_id = 2";
$notes = $db->query($query)->fetchAll();

require ("views/notes.view.php");
?>