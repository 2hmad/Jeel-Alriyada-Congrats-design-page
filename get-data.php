<?php
include('connection.php');
if(!empty($_POST["card"])){
          $name = $_POST['card'];
          $sql = "SELECT * FROM template WHERE name='$name'";
          $query = mysqli_query($connect, $sql);
          while($row_image = mysqli_fetch_array($query)) {
            $blob = $row_image['image'];
            $style = $row_image['style'];
                      
            echo '
            <img src='.$blob.'>
            
            <div class="style" style="display:none">'.$style.'</div>
            ';
          }
}  
?>