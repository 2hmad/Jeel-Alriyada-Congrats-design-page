<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <title>لوحة تحكم | مدارس جيل الريادة الاهلية</title>
</head>

<body>
      <div class="templates">
<?php
include('../connection.php');
$sql = "SELECT * FROM template";
$query = mysqli_query($connect, $sql);
while($row = mysqli_fetch_array($query)) {
    $id = $row['id'];
    $name = $row['name'];
    $image = $row['image'];
    $display = $row['display'];
    if($display == 0) {
        echo '
        <div class="template">
            <img src="../'.$image.'" alt="img" />
            <p>'.$name.'</p>
            <a href="update-display.php?id='.$id.'&display=show"><button name="show">Show</button></a>
            <a href="delete-card.php?id='.$id.'"><button name="delete">Delete</button></a>
        </div>
        ';    
    } elseif($display == 1) {
        echo '
        <div class="template">
            <img src="../'.$image.'" alt="img" />
            <p>'.$name.'</p>
            <a href="update-display.php?id='.$id.'&display=hide"><button name="hide">Hide</button></a>
            <a href="delete-card.php?id='.$id.'"><button name="delete">Delete</button></a>
        </div>
        ';    
    }
}
?>
</div>
</body>

</html>