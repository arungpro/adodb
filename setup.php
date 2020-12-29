<?php
/*
steps
docker-compose build
docker-compose run mysql   - in seperate terminal
docker-compose run quexf   - in seperate terminal

Drive load via a terminal:  
          for ((i=1;i<=10;i++)); do sleep 1; curl http://localhost:8080/setup.php ; echo -e ‘\n\n\n\n’$(date);done
*/

$mysqli = mysqli_init();
/* connect to server */
mysqli_real_connect($mysqli, "p:mysql", "root", "password", "mydb");

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

$createQuery = "CREATE TABLE IF NOT EXISTS employeestest(id int(11) NOT NULL auto_increment, mscol varchar(250)  NOT NULL default '', PRIMARY KEY(id))";

$mysqli->query($createQuery);


for ($i=0; $i < 5000; $i++) {
    printf("Default database is {$i}.\n");
    $mysqli->query("INSERT INTO employeestest(mscol) values('my')");
}

$mysqli->query("INSERT INTO employeestest(mscol) values('NO')");

for ($i=0; $i < 5000; $i++) {
  printf("Default database is {$i}.\n");
  $mysqli->query("INSERT INTO employeestest(mscol) values('my')");
}

$mysqli->close();
?>