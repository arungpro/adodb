<?php
// Section 1
include("/usr/share/php/adodb/adodb.inc.php");
// $db = newADOConnection('pdo');
// $db   = ADOnewConnection('pdo');
$db = newADOConnection('mysqli');
$db->debug = true;
// $db->connect("mysql", "root", "password", "mydb");
$db->PConnect("mysql", "root", "password", "mydb");

// $user     = 'root';
// $password = 'password';
// $dsnString= 'host=mysql;dbname=employees;charset=utf8mb4';
// $db->connect('mysql:' . $dsnString,$user,$password);

$createQuery = "CREATE TABLE IF NOT EXISTS employees(id int(11) NOT NULL auto_increment, empid varchar(250)  NOT NULL default '', PRIMARY KEY(id))";


$db->execute($createQuery);

for ($i=0; $i < 50; $i++) {
    $db->execute("INSERT INTO employees(empid) values('YES')");
}
printf ("Added 50 Yes");
for ($i=0; $i < 2; $i++) {
    $db->execute("INSERT INTO employees(empid) values('NO')");
}
printf ("Added 2 NO");
// Section 2
$result = $db->execute("SELECT * FROM employees where empid='NO'");
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