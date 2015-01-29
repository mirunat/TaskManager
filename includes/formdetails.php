<?php
echo '<h1>Task details</h1>'; 
echo "<h3>Notes</h3>";
//var_dump($_SERVER['PHP_SELF']);
$var = $_SERVER['QUERY_STRING'];
//var_dump($var);

$user = $_SESSION['user']['id'];
$queryNote = "select * from notes where user_id = ".$user." and ".$var; 
$dataNote = mysql_query($queryNote) or die(mysql_error());
$matchesNote = mysql_num_rows($dataNote); 
if ($matchesNote == 0) { echo "No notes yet.<br>"; } 
else {
    echo '<ul class="list-group">';
    while($rowNote = mysql_fetch_assoc($dataNote)) {
    	echo '<li class="list-group-item">'.$rowNote['note'].'</p>'; 
    }
    echo '</ul>';
}
echo '<a href="addnewnote.php?'.$var.'">Add new note</a>';

echo '<h3>Collaborators</h3>';
$queryCollaborator = "select name, email from users where  users.id in (select collaborator_id from collaborators inner join users on users.id = 
collaborators.user_id where users.id = ".$user." and collaborators.".$var.")"; 

$dataCollaborator = mysql_query($queryCollaborator) or die(mysql_error());

$matchesCollaborator = mysql_num_rows($dataCollaborator); 
if ($matchesCollaborator == 0) { echo "No collaborators yet.<br>"; } 

else {
    echo '<table class="table table-responsive">
            <tr class="info">
                <td><b>Name</b></td>
                <td><b>Email</b></td>
            <tr>';

    while($rowCollaborator = mysql_fetch_assoc($dataCollaborator)) {
    echo "<tr><td>{$rowCollaborator['name']}</td>";
    echo "<td>{$rowCollaborator['email']}</td></tr>";
    }
    echo '</table>';
}


echo '<a href="addnewcollaborator.php?'.$var.'">Add new collaborator</a>';

echo "<h3>Files</h3>";
$queryFiles = "SELECT `file_id`, `file`, `type`, `size`, `created` FROM `files` where user_id = ".$user." and ".$var;
$dataFiles = mysql_query($queryFiles);

$matchesFiles = mysql_num_rows($dataFiles);

if ($matchesFiles == 0) { echo "No files yet.<br>"; } 
else {
        echo '<table class="table table-responsive">
                <tr class="warning">
                    <td><b>Name</b></td>
                    <td><b>Created</b></td>
                    <td><b>&nbsp;</b></td>
                </tr>';
 
        while($row = mysql_fetch_assoc($dataFiles)) {
            echo "
                <tr>
                    <td>{$row['file']}</td>
                    <td>{$row['created']}</td>
                    <td><a href='get_file.php?id={$row['file_id']}'>Download</a></td>
                </tr>";
        }
 
        // Close table
        echo '</table>'; }

echo '<a href="attachnewfile.php?'.$var.'">Add new file</a><br>';
    
 


