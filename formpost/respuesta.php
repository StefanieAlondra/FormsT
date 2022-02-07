<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Aprendiendo PHP</title>
    <link href="https://fonts.googleapis.com/css?family=Proza+Libre" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css" media="screen" title="no title">
  </head>
  <body>

    <div class="contenedor">
      <h1>Aprendiendo PHP</h1>

<!-- *******************************validar qu elos campos esten llenos ****************************** -->

      <?php $resultado = $_POST;?>   <!-- crear la variable que almacena la informacion qu entra -->
      <?php $nombre =  $resultado['nombre'];?>
      <?php $apellido = $resultado['apellido'];?>

 <!-- forma1 para nombre  -->

      <?php 
      if (! (filter_has_var(INPUT_POST, 'nombre') && 
            (strlen(filter_input(INPUT_POST, 'nombre')) > 0))){
              //filter_has_var — Comprueba si existe una variable de un tipo concreto existe
              // filter_input — Toma una variable externa concreta por su nombre y opcionalmente la filtra
              //strlen Obtener la longitud de una cadena string
              echo 'El nombre es obligatorio';
            }else {  ?>
                  <p>Nombre: <?php echo $nombre ; ?></p> <!-- muestra los valores obtenidos-->
     <?php  } ?>

<!-- forma1 para apellido  -->
     <?php if(!isset($apellido) || trim($apellido)!= ''){?>  
     <!-- isset verifica que la variable este definida  --> 
     <!-- trim Eliminar espacios en blanco al inicio y final de una cadena -->
      <p>Apellido: <?php echo $apellido ;?></p> 
      <?php  }else {
        echo 'el apellido es obligatorio';
      } ?>
    <hr>
<!-- *******************************validar checkbox ****************************** -->

    <?php 
    if(isset($_POST['notificaciones'])){ 
      //isset verifica que la variable exist al menos en el post
      $notificaciones  = $_POST['notificaciones']; //esta se crea hasta que comprobe qu eexiste 
      if( $notificaciones == 'on'){
        echo "Se ha inscrito correctamente a las notificaciones </br>";
      }
    }      
    ?>

<!-- ************************* Validar checkbox desde un Arreglo ****************************** -->

  <?php 
    if (isset($_POST['curso'])){
      $cursos = $_POST['curso'];
      echo "Tus cursos son: </br>";
      foreach($cursos as $curso){
        echo $curso . '</br>';
      }
    } else{
      echo 'No elegiste cursos </br>';
    }
      ?>
      <hr>

<!-- ************************* Validar select ****************************** -->

      <?php  
      if (isset($_POST ['area'])){
        $area = $_POST['area'];
        echo "<h2>Area de especializacion</h2>";
        switch ($area) {
          case 'fe':
            echo 'Frontend';
            break;
          case 'be':
            echo 'Backend';
            break; 
          case 'fs':
            echo 'FullStack';
            break;
          default:
            echo 'Por favor elige un area';
            break;
        }
      }
      ?>
      <hr>
<!-- ************************* Validar radio button ****************************** -->
  
      <?php  
      $opciones = array(
        'pres' => 'Presencial',
        'online' => 'En Línea'
      ); ?>
      <h2>Tipo de Curso Elegido </h2>
      <?php  
      if (array_key_exists($_POST['opciones'], $opciones)){ //revisa solo llaves
      $tipo_curso = $_POST['opciones']; 
      switch ($tipo_curso) {
          case 'pres':
            echo "Curso tipo Presencial";
            break;
          case 'online':
            echo "Curso tipo Online";
            break; 
        }
      }else{//si no existe la llave
        echo "Sin tipo de curso"; 
      }
      ?>
      <hr>
<!-- ************************* Validar textarea *************************** -->   
      <?php 
      if(isset($_POST['mensaje'])){
        $mensaje = $_POST['mensaje'];
        $nuevo_mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);
        if(strlen($nuevo_mensaje) > 0 && trim($nuevo_mensaje)){
         //checa que mensaje sea mayor qu 0 mo sea qu tenga algo y e trim remueva el espacio n blanco 
        echo "<h2>Mensaje</h2>";
        echo $nuevo_mensaje;
      } else{
        echo 'El mensaje esta vacio';
    }}
        ?>  
     
      <hr>


    </div>

  </body>
</html>
