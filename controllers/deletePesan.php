<?php
include '../../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($conn, "DELETE FROM messages WHERE id=$id");
}

header("Location: ../admin/messages.php");
exit;
?>
