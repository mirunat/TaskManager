<?php
session_start();
include('dbconnection.php');
include('functions.php');
$user = $_SESSION['user']['id'];
$queryXML = "select * from tasks where user_id = ".$user;
$result = mysql_query($queryXML);  

$xml = new SimpleXMLElement('<xml/>');
 
    while($row = mysql_fetch_assoc($result)) {
        $mydata = $xml->addChild('mytasks');
        $mydata->addChild('Id',$row['task_id']);
        $mydata->addChild('Task',$row['task']);
        $mydata->addChild('Priority',$row['priority']);
        $mydata->addChild('Created_at',$row['created_at']);
        $mydata->addChild('Deadline_date',$row['deadline']);
        $mydata->addChild('Deadline_time',$row['time']);
    }
 
    $fp = fopen("mytasks.xml","wb");
 
    fwrite($fp,$xml->asXML());
	
    header('Content-Type: application/xml;');
    header('Content-Disposition: attachment; filename=mytasks.xml;');
    readfile('mytasks.xml');

    fclose($fp);
 
?>