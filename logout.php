<?php
session_start();        // start session dulu
session_unset();        // hapus semua session
session_destroy();      // hancurkan session
header("Location: index.php"); // redirect ke homepage
exit();
?>
