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

echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial">Value1</font> </td> 
          <td> <font face="Arial">Value2</font> </td> 
          <td> <font face="Arial">Value3</font> </td> 
          <td> <font face="Arial">Value4</font> </td> 
          <td> <font face="Arial">Value5</font> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["id"];
        $field2name = $row["nome"];
        $field3name = $row["email"];
        $field4name = $row["assunto"];
        $field5name = $row["comentario"]; 

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td> 
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