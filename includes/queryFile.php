<?php 
$name = mysql_real_escape_string($_FILES['uploaded_file']['name']);
$mime = mysql_real_escape_string($_FILES['uploaded_file']['type']);
$data = mysql_real_escape_string(file_get_contents($_FILES['uploaded_file']['tmp_name']));
$size = intval($_FILES['uploaded_file']['size']);
 
$query = "
    INSERT INTO `files` (
        `file`, `type`, `size`, `data`, `created`, `user_id`, `task_id`
    )
    VALUES (
        '{$name}', '{$mime}', {$size}, '{$data}', NOW(), '{$utilisator}', '{$taskId}'
    )";

$result = mysql_query($query);

if($result) {
    echo 'Success! Your file was successfully added!';
    echo "<script>setTimeout(\"location.href = 'alltasks.php';\",1500);</script>";
}
else {
    echo 'Error! Failed to insert the file';
}