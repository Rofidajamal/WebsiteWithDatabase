<?php
include "\db.php";

$Dna = $_POST['DnaSeq'];
$nameGene = $_POST['name_gene'];
$desc = $_POST['descr'];

$s ="";

$selected_function = $_POST['fun-select'];

if($selected_function == 'insert'){
    $sql = "INSERT INTO gene (Sequence, description, GName)
    VALUES ('$Dna','$desc','$nameGene')";
}
else if ($selected_function =='select'){
    $sql = "SELECT * FROM gene WHERE GName = '$nameGene'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo  "ID :   ".$row["ID"]."<br>"." - Sequance: " . $row["Sequence"]." <br>"."<br>"."Description: "."<br>".$row["description"]."<br>"."<br>" ."Name of Gene: "."<br>". $row["GName"] ."<br>"."<br>"."<br>";
        }
    }
    else
        echo "0 results"."<br>";

}
else if ($selected_function == 'update'){
    $sql ="UPDATE gene SET  Sequence='$Dna', description='$desc' WHERE GName='$nameGene'"; 

}
else if ($selected_function == 'delete'){
    $sql = "DELETE FROM gene WHERE GName='$nameGene'";
}
else 
    echo "something is wrong"."<br>";




if ($conn->query($sql) === TRUE) {
    header("Location:/EditingForm.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>