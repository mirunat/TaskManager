<?php
session_start();
include('dbconnection.php');
include('functions.php');
$user = $_SESSION['user']['id'];

if(isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if($id <= 0) {
        die('The ID is invalid!');
    }
    else {
       
        $queryD = 
            "SELECT `file_id`, `file`, `type`, `size`, `created`, `data`  FROM `files` where user_id = ".$user." and 
             `file_id` = {$id}";
        $resultD = mysql_query($queryD);
 
        while ($rowD = mysql_fetch_assoc($resultD) ) {

        header("Content-Type: ". $rowD['type']);
        header("Content-Length: ". $rowD['size']);
        header("Content-Disposition: attachment; filename=". $rowD['file']);

        echo $rowD['data']; }
    }
            
       
    }

else {
    echo 'Error! No ID was passed.';
}
?>