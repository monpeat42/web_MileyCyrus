<!DOCTYPE html>
<html lang="cat">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pàgina web de la Miley Cyrus">
    <meta name="author" content="Maria Monpeat">
    <link rel="icon" href="favicon.ico">
    <title>CONTACTES</title>
    
    <!--Template based on URL below-->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Place your stylesheet here-->
    <link href="css/estils.css" rel="stylesheet" type="text/css">
</head>

<body id="contactes">
<?php include 'encabezado.php'; ?>
 
    <main role="main" class="container">
        <div class="row pt-5 mt-5"><!--mt margin top pt padding to-->
            <div class="col-md-12">
                <h1 class="text-center"> CONTACTE </h1>
    
            </div>
      
    
<form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
<!-- Define la accion que se va a hacer cuando le des click (boton enviar) al formulario, en este caso se recarga el php para enviar los datos. Metodo pos para enviar datos y el nombre para referirse al formulario. --> 
    
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" placeholder="Email" name="email" required="true"><!-- Amb el name et refereixes al html(variable) y el required es per dir si es obligatori o no-->
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" placeholder="Password" name="pass" required="true">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Adresa</label>
    <input type="text" class="form-control" placeholder="Cr.Vall" name="dir1" required="true">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Adresa 2</label>
    <input type="text" class="form-control" placeholder="Segon apartament, casa a la montanya..." name="dir2" required="false">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Ciutat</label>
      <input type="text" class="form-control" placeholder="Ciutat en la que vius" name="ciudad" required="true">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Comunitat Autónoma</label>
      <select id="inputState" class="form-control" name="poblacion" required="true">
        <option selected>Choose...</option>
        <option>Catalunya</option>
           <option>Andalusia</option>
           <option>Galícia</option>
           <option>Múrcia</option>
           <option>Castella i Lleó</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Número</label>
      <input type="text" class="form-control" placeholder="Pis o casa" name="cp" required="true">
    </div>
  </div>
    
  <button type="submit" class="btn btn-dark" style="background-color:deeppink;">Envia</button>
        
</form>
                
    </div>             
<!--aqui se pega la pagina contacto.php -->
 </main><!-- /.container -->
       
<!--Crear la conexion pdo (Crear el objeto) -->   
<?php
if(isset($_POST['submit'])){ 
require_once("conexion_miley.php");

// Creamos el objeto 
$db = new Conexion();
  //Abrir las funciones php
$dbTabla='contacto'; //nombre de la tabla creada en phpmyadmin
    //name in html = columna base de dades
    
$email = $_POST["email"];
$pass = $_POST["pass"];
$pass=md5($pass);
$dir1 =$_POST["dir1"];
$dir2 =$_POST["dir2"];
$ciudad =$_POST["ciudad"];
$poblacion =$_POST["poblacion"];
$cp =$_POST["cp"];

    
$consulta ="INSERT INTO $dbTabla (email, pass, dir1, dir2, ciudad, poblacion, cp) VALUES (:e, :ps, :d1, :d2, :c, :p, :cp)";
//estos valores son los name de el html y despues asignarlos a una letra
    
$result = $db->prepare($consulta);

if($result->execute(array(":e" => $email, ":ps" => $pass, ":d1" => $dir1, ":d2" => $dir2, ":c" => $ciudad, ":p" => $poblacion, ":cp" => $cp))){ 
 	print "<p>Registro insertado correctamente.</p>\n"; 
 } 
else {
	print "<p>Error al insertar el registro.</p>\n"; 
}
}
?>
        
   
<?php include 'footer.php';?>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/scriptd.js"></script>
</body>
</html>