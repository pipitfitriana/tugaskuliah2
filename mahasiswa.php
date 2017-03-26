<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akademik";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nim, nama, alamat,progdi FROM mahasiswa";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<br/> nim: " . $row["nim"]. " <br/>
			nama: " . $row["nama"]. "<br/>
			alamat: " . $row["alamat"]. "<br/>
			progdi: " . $row["progdi"]. "<br/>";
}
} else {
echo "0 results";
}
$conn->close();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"&gt;
<html>
<head>
<title>Mahasiswa</title>
<meta http-equiv="Content-Type” content=”text/html; charset=iso-8859-1">
</head>

<body>
<?php
$doc = new DOMDocument();
$doc->load( 'mahasiswa.xml' );

$mahasiswa = $doc->getElementsByTagName( "mahasiswa" );
foreach( $mahasiswa as $mahasiswa )
{
$nims = $mahasiswa->getElementsByTagName( "nim" );
$nim = $nims->item(0)->nodeValue;

$namas= $mahasiswa->getElementsByTagName( "nama" );
$nama= $namas->item(0)->nodeValue;

$alamats = $mahasiswa->getElementsByTagName( "alamat" );
$alamat = $alamats->item(0)->nodeValue;

$progdis = $mahasiswa->getElementsByTagName( "progdi" );
$progdi = $progdis->item(0)->nodeValue;

echo "<b>$nim – $nama – $alamat – $progdi\n</b><br>";
}
?>
</body>
</html>