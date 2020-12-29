<?php
// Section 1
include("/usr/share/php/adodb/adodb.inc.php");
// $db = newADOConnection('pdo');
// $db   = ADOnewConnection('pdo');
$db = newADOConnection('mysqli');
// $db->debug = true;
// $db->connect("mysql", "root", "password", "mydb");
$db->Connect("mysql", "root", "password", "mydb");

// $user     = 'root';
// $password = 'password';
// $dsnString= 'host=mysql;dbname=employeesclose;charset=utf8mb4';
// $db->connect('mysql:' . $dsnString,$user,$password);

$createQuery = "CREATE TABLE IF NOT EXISTS employeesclose(id int(11) NOT NULL auto_increment, empid varchar(250)  NOT NULL default '', PRIMARY KEY(id))";


$db->Execute($createQuery);

for ($i=0; $i < 50; $i++) {
    $db->Execute("INSERT INTO employeesclose(empid) values('YES')");
}
printf ("Added 50 Yes");
for ($i=0; $i < 2; $i++) {
    $db->Execute("INSERT INTO employeesclose(empid) values('ABC')");
}
printf ("Added 2 NO");
// Section 2
$result = $db->Execute("SELECT * FROM employeesclose where empid='YES'");
if ($result === false) die("failed");
 
// Section 3
while (!$result->EOF) {
    for ($i=0, $max=$result->fieldCount(); $i < $max; $i++) {
        print $result->fields[$i].' ';
    }
    $result->moveNext();
    print "<br>\n";
}

$db->Close();


print "<br>\n";
print "<br>\n";
print "<br>\n";

if ($db->IsConnected) {
    print("Connected");
} else {
    print("Not Connected");
}

print "<br>\n";
print "<br>\n";
print "<br>\n";

for ($i=0; $i < 500; $i++) {
    print("just looping");
}
?>