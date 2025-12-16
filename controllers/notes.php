<?php 

$heading = "All notes";


$query = "select * from notes where user_id = 2";
$notes = $db->query($query)->getAll();

require ("views/notes.view.php");
?>