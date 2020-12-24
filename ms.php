<?php
$mysqli = mysqli_connect("p:mysql", "root", "password", "mydb");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* return name of current default database */
if ($result = $mysqli->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n", $row[0]);
    $result->close();
}

$createQuery = "CREATE TABLE IF NOT EXISTS employeestest(id int(11) NOT NULL auto_increment, empid varchar(250)  NOT NULL default '', PRIMARY KEY(id))";

$mysqli->query($createQuery);


for ($i=0; $i < 5000; $i++) {
    printf("Default database is {$i}.\n");
    $mysqli->query("INSERT INTO employeestest(empid) values('my')");
}

$mysqli->query("INSERT INTO employeestest(empid) values('NO')");

for ($i=0; $i < 5000; $i++) {
  printf("Default database is {$i}.\n");
  $mysqli->query("INSERT INTO employeestest(empid) values('my')");
}

if ($result = $mysqli->query("SELECT * FROM employeestest where empid='NO'")) {
    while ($row = $result->fetch_row()) {
      printf ("%s (%s)\n", $row[0], $row[1]);
    }
    $result->free_result();
  }

/* drop table */
$mysqli->query("DROP TABLE employeestest");

$mysqli->close();
?>