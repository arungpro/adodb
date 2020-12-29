<?php
// Section 1
include("/usr/share/php/adodb/adodb.inc.php");

$db = newADOConnection('mysqli');
$db->debug = true;
// change below creds
$db->Connect("mysql", "root", "password", "mydb");

// $createQuery = "CREATE TABLE IF NOT EXISTS employees(id int(11) NOT NULL auto_increment, empid varchar(250)  NOT NULL default '', PRIMARY KEY(id))";

// $db->Execute($createQuery);

// for ($i=0; $i < 50; $i++) {
//  $db->Execute("INSERT INTO employees(empid) values('NA')");
// }
// $db->Execute("INSERT INTO employees(empid) values('ABC')");
// for ($i=0; $i < 50; $i++) {
//     $db->Execute("INSERT INTO employees(empid) values('NA')");
//    }
// Section 2
$result = $db->execute("SELECT * FROM employeesclose where empid='ABC'");
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