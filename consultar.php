<?php
$conn = new mysqli("service-mysql", "root", "r@@tpass@@", "meubanco");
// Check connection
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}
//else {
//    echo "Conectado!!";
//}

$sql = "SELECT email FROM mensagens";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                echo $row['email']."<br>";
        }
} else {
         echo "Nenhum resultado cadastrado";
}
$conn->close();