<!DOCTYPE HTML>  
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <title>CURRICULUM</title>
</head>
<body>  

<?php
// define variables and set to empty values
$exp = $for = $aptitudes = $idiomas = "";
$expErr = $forErr = $aptErr = $idiErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {  

  if (isset($_POST['aptitudes'])) {
    $aptitudes = $_POST["aptitudes"];
  } else {
    $aptErr = "Marque al menos una de sus aptitudes";
  } 

  if (isset($_POST['idiomas'])) {
    $idiomas = $_POST['idiomas'];
  } else {  
    $idiErr = "Marque al menos alguno de los idiomas";
  } 

  if (empty($_POST["exp"])) {  
    $expErr = "Coloque su experiencia";  
  } else {  
    $exp = input_data($_POST["exp"]);
  }  
  if (empty($_POST["for"])) {  
    $forErr = "Coloque su formación";  
  } else {  
    $for = input_data($_POST["for"]);
  }
}

function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  
?>

<h2></h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Experiencia Laboral: <br><textarea name="exp" rows="5" cols="40"></textarea>
  <span class="error"><?php echo $expErr;?></span>
  <br><br>
  Formación: <br><textarea name="for" rows="5" cols="40"></textarea>
  <span class="error"><?php echo $forErr;?></span>
  <br><br>
  Idiomas: <br>
    <input type="checkbox" name="idiomas[]" value="Inglés"> Inglés<br>
    <input type="checkbox" name="idiomas[]" value="Portugués"> Portugués <br>
    <input type="checkbox" name="idiomas[]" value="Quechua"> Quechua<br>
    <input type="checkbox" name="idiomas[]" value="Francés"> Francés <br>
    <input type="checkbox" name="idiomas[]" value="Alemán"> Aléman<br>
    <span class="error"><?php echo $idiErr;?></span><br><br>
  Aptitudes: <br>
    <input type="checkbox" name="aptitudes[]" value="Técnica"> Técnica<br>
    <input type="checkbox" name="aptitudes[]" value="Social"> Social <br>
    <input type="checkbox" name="aptitudes[]" value="Lingüística"> Lingüística<br>
    <input type="checkbox" name="aptitudes[]" value="Emocional"> Emocional <br>
    <input type="checkbox" name="aptitudes[]" value="Creativa"> Creativa<br>
    <input type="checkbox" name="aptitudes[]" value="Manejo de conflictos"> Manejo de conflictos <br>
    <input type="checkbox" name="aptitudes[]" value="Númerica"> Númerica<br>
    <span class="error"><?php echo $aptErr;?></span><br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
    if(isset($_POST['submit'])) {  
      if($expErr == "" && $forErr == "" && $aptitudes != "" && count($aptitudes) > 0 && $idiomas != "" && count($idiomas) > 0) {
    echo"<div id = 'title'><h1>Nombre de ejemplo</h1><img src = 'images/siluetagrisanonimo.png' 'style='float: left; padding: 20px;'></div><div id='parent'><div id='wide'>";
    $e = $_POST["exp"];
    $f = $_POST["for"];
    echo "<h2> Experiencia: </h2> <p>$e</p>";
    echo "<h2> Formación: </h2> <p>$f</p></div>";
    echo"<div id='narrow'>";
        echo "<h2> Idiomas: </h2>";
        if (isset($_POST['idiomas'])){
          $name = $_POST["idiomas"];
          foreach ($name as $idiomas){ 
            echo "<li>$idiomas</li>";
          }
        } else {
          echo "Ninguno de los mencionados";
        }
        echo "<h2> Aptitudes: </h2>";
        if (isset($_POST['aptitudes'])){
          $name1 = $_POST["aptitudes"];
          foreach ($name1 as $aptitudes){ 
            echo "<li>$aptitudes</li>";
            }
        } else {
          echo "Ninguna de las mencionadas";
        }
      } else {
        echo "";
      }
    }
?>

</body>
</html>
