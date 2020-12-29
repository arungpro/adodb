<?php
/*
steps:

docker-compose build
docker-compose run mysql   - in seperate terminal
docker-compose run quexf   - in seperate terminal

Note: do above steps if you have not done already
Drive load via a terminal:  
      while true; do sleep 1; curl http://localhost:8080/mysqli_query_use_result.php ; echo -e ‘\n\n\n\n’$(date);done
*/
$mysqli = mysqli_init();
/* connect to server */
// mysqli_real_connect($mysqli, "mysql", "root", "password", "mydb");
mysqli_real_connect($mysqli, "p:mysql", "root", "password", "mydb");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($result = mysqli_query($mysqli, "SELECT * FROM employeestest where mscol='NO'", MYSQLI_USE_RESULT)) {
    while ($row = $result->fetch_row()) {
      printf ("%s (%s)\n", $row[0], $row[1]);
    }
    $result->free_result();
  }
?>