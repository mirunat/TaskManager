<?php
session_start();
$user = $_SESSION['user']['id'];

if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if($id <= 0) {
        die('The ID is invalid!');
    }
    else {       
        $queryD = 
            "SELECT `file_id`, `file`, `type`, `size`, `created` FROM `files` where user_id = ".$user." and 
             `file_id` = {$id}";
        $resultD = mysql_query($queryD);
 
        if($resultD) {
            if($mysql_num_rows($resultD)== 1) {
                $rowD = mysqli_fetch_assoc($resultD);
                header("Content-Type: ". $row['type']);
                header("Content-Length: ". $row['size']);
                header("Content-Disposition: attachment; filename=". $row['file']);
                echo $row['data'];
            }
            else {
                echo 'Error! No file exists with that ID.';
            } 
        }
        else {
            echo "Error!";
        }       
    }
}
else {
    echo 'Error! No ID was passed.';
}
?>