<?php
include('../connection.php');
if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = mysqli_query($connect, "DELETE FROM template WHERE id='$id'");
        header('Location: cards.php');
} else {
    header('Location: cards.php');
}
?>