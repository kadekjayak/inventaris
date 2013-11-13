<?php
$link=mysql_connect("localhost","root","","tester");

$form_data = array(

    'text' => 'perubahan',
);
$where=array(
	'number'=>1,
);

include 'dbFunction.php';
//echo dbDelete("tester.table",$form_data,$link);
/*$result=dbSelect("tester.table","text,number","","");
while ($row=mysql_fetch_row($result)){
	echo $row[0];
	echo $row[1];
};*/

echo dbUpdate("tester.table",$form_data,$where);

mysql_close($link);
?>