<?php
include "db_conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `crud` WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?msg=Record deleted successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    } }
 else {
    header("Location: index.php?msg=Invalid ID. Record not deleted.");
 }
?>
