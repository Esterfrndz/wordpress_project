<div class="wrap">

  <?php


  global $wpdb;
  $query = "SELECT * FROM {$wpdb->prefix}usuarios"; // Aquí se debe corregir el prefijo de la tabla
  $usuarios = $wpdb->get_results($query, ARRAY_A);
  if (empty($usuarios)) {
    $usuarios = array();
  }


  // Verificar si se recibió un envío del formulario
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["txtnombre"])) {
    // Obtener los datos del formulario
    $Nombre = $_POST["txtnombre"];


    $tabla_usuarios = $wpdb->prefix . "usuarios";
    $wpdb->insert($tabla_usuarios, array(
      "Nombre" => $Nombre
    )
    );

    // Redirigir al usuario a una página de éxito o mostrar un mensaje de éxito
    echo "Los datos se han guardado correctamente.";
  } else {
    // Si no se recibió un envío del formulario, redirigir al usuario a una página de error o mostrar un mensaje de error
    echo "";
  }


  ?>

  <a id="btnnuevo" class="page-title-action">Añadir usuario</a>
  <br><br><br>

  <table class="wp-list-table widefat fixed striped pages">

    <thead>

      <th>Nombre de usuario</th>
      <th>ShortCode</th>
      <th>Acciones</th>


    </thead>
    <tbody id="the-list">

      <?php foreach ($usuarios as $usuario) {
        $id = $value['UsuarioId'];
        $nombre = $usuario['Nombre'];
        $shortcode = $usuario['ShortCode'];

        echo "
        <tr>
            <td>$nombre</td>
            <td>$shortcode</td>
            <td><a data-id='$id' class='page-title-action'>Borrar</a></td>
        </tr> 
        ";
      }
      ?>
    </tbody>
  </table>
</div>


<!-- Modal -->
<div class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Nueva encuesta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <form method="post">

        <div class="modal-body">

          <div class="form-group">
            <label for="txtnombre" class="col-sm-4 col-form-label">Nombre de usuario</label>
            <div class="col-sm-8">
              <input type="text" id="txtnombre" name="txtnombre" style="width:100%">
            </div>
          </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" name="btnguardar" id="btnguardar">Guardar</button>
        </div>
      </form>

    </div>
  </div>
</div>