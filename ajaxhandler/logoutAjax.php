<?php
session_start();
unset($_SESSION["current_user"]);
session_destroy(); // Add this too for complete cleanup
$rv = ["status" => "OK"];
echo json_encode($rv);
?>
