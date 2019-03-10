<?php
$memtest = new Memcached();
$memtest->addServer("127.0.0.1", 11211);
$conn = mysql_connect("localhost", "tzvsqktpzm", "XWwgPDZ52R") or die(mysql_error());
mysql_select_db("tzvsqktpzm") or die(mysql_error());
$query = "SELECT ID FROM sample_data WHERE name = 'some_data'";
$retval = mysql_query( $query, $conn );
$result = mysql_fetch_array($retval, MYSQL_ASSOC);
$querykey = "KEY" . md5($query);
$memtest->set($querykey, $result);
$result2 = $memtest->get($querykey);
if ($result2) {
print "<p>Data was: " . $result2['ID'] . "</p>";
print "<p>Caching success!</p><p>Retrieved data from memcached!</p>";
}
?>