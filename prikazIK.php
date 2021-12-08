<?php
$mysqli = new mysqli("localhost", "root", "", "knjigolovac");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT * from izdavac	where ID=?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s",$_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cid, $naziv, $adresa, $potpuninaziv);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Naziv</th>";
echo "<th>Adresa</th>";
echo "<th>Potpuni naziv</th>";
echo "</tr>";
echo "<tr>";
echo "<td>" . $cid . "</td>";
echo "<td>" . $naziv . "</td>";
echo "<td>" . $adresa . "</td>";
echo "<td>" . $potpuninaziv . "</td>";
echo "</table>";
?>