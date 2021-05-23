<?php
include('../connection.php');
if(isset($_GET['id']) && isset($_GET['display'])) {
    if($_GET['display'] == "show") {
        $id = $_GET['id'];
        $query = mysqli_query($connect, "UPDATE template SET display='1' WHERE id='$id'");
        header('Location: cards.php');
    } else {
        $id = $_GET['id'];
        $query = mysqli_query($connect, "UPDATE template SET display='0' WHERE id='$id'");
        header('Location: cards.php');
    }
} else {
    header('Location: cards.php');
}
?>