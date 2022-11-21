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

echo "\nEmails cadastrados:\n". "<br>";

echo '<table border="1" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Email</font> </td> 
      </tr>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $field3name = $row["email"];

        echo '<tr> 
                  <td>'.$field3name.'</td> 
              </tr>';
    }
    $result->free();
} 

// if ($result->num_rows > 0) {
//         // output data of each row
//         while($row = $result->fetch_assoc()) {
//                 echo $row["id"]. " - " . $row["nome"]. " " . $row["email"]. " " . $row["assunto"]. " " . $row["comentario"]. "<br>";
//                 //echo $row['email']."<br>";
//         }
// } else {
//          echo "Nenhum resultado cadastrado";
// }
$conn->close();