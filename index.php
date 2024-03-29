<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
  <link rel="shortcut icon" href="img/ComicDico-01.png">

  <script src="bootstrap/assets/js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/pedidos.js"></script>
  <style type="text/css">
    .container-full{
      width: 100%;
      margin: auto;
    }

  </style>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
      <![endif]-->
    </head>
    <body>
      <!-- Inicia Container Principal -->
      <div class="container-full">
        <div id="modal">
        
        </div>
        <div id="navbar">

        </div>
        
        <div class="col-md-2" id="sidebar">

        </div>

        <div class="col-md-10" id="maincontent">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Pedidos</h3>
            </div>
            <div class="panel-body">
              <table class="table table-condensed">

                <thead>
                  <tr>
                    <th>Ped Id</th>
                    <th>Usuario</th><!--Nombre-->
                    <th>Correo</th>
                    <th>Compañía</th><!--Nombre-->
                    <th>Personaje</th><!--Nombre-->
                    <th>Descripción</th>
                    <th>Lugar</th>
                    <th>Forma de Pago</th>
                    <th>Fecha</th>
                    <th>Editar</th>
                  </tr>
                </thead>
                <tbody id="pedidos">

                </tbody>
              </table>
              <ul class="pagination" id="paginacion">
                
              
              </ul>

            </div>
          </div>

        </div>
        



      </div>
    </body>
    </html>