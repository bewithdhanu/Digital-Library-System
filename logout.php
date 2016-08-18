<?php
session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["user_type"]);
unset($_SESSION["admin_id"]);
unset($_SESSION["admin_type"]);
unset($_SESSION["admin_forget_id"]);
unset($_SESSION["admin_forget_type"]);
unset($_SESSION["forget_id"]);
unset($_SESSION["forget_type"]);
session_destroy();
?>
<script>

	window.location="index.php"
		alert("you have been successfully logged out!");
</script>