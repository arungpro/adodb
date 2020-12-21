<?php
// Section 1
include("/usr/share/php/adodb/adodb.inc.php");
$db = newADOConnection('mysqli');
$db->connect("mysql", "root", "password", "mydb");

$createQuery = "CREATE TABLE IF NOT EXISTS employees(id int(11) NOT NULL auto_increment, empid varchar(250)  NOT NULL default '', PRIMARY KEY(id))";


$db->execute($createQuery);

for ($i=0; $i < 50; $i++) {
    $db->execute("INSERT INTO employees(empid) values('my')");
}
// Section 2
$result = $db->execute("SELECT * FROM employees");
if ($result === false) die("failed");
 
// Section 3
while (!$result->EOF) {
    for ($i=0, $max=$result->fieldCount(); $i < $max; $i++) {
        print $result->fields[$i].' ';
    }
    $result->moveNext();
    print "<br>\n";
}
?>