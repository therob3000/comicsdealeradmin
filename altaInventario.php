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
  <script src="js/altaInventario.js"></script>
  <style type="text/css">
    .container-full{
      width: 100%
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
              <h3 class="panel-title">Alta de Inventario</h3>
            </div>
            <div class="panel-body">

                <div class="row">
                  <div class="col-md-12">
                    <div class="row">

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Compañia</label>
                          <select class="form-control" id="compania" name="compania_id">

                          </select> 
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Personaje</label>
                          <select class="form-control" id="personaje" name="cat_comic_personaje_id">

                          </select>  
                        </div>
                      </div>

                      
                      

                    </div>
                    <form class="form" id="alta_inventario">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Comic</label>
                          <select class="form-control" id="comic" name="cat_comic_unique_id">

                          </select>  
                        </div>

                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Comprador</label>
                          <select class="form-control" id="comprador" name="inventario_comprador">
                            <option value="yunrock">Yunrock</option>
                            <option value="drdeath">Dr Death</option>
                          </select> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Precio de Entrada: </label>
                          <input type="text" class="form-control" id="precio_entrada" placeholder="Precio de Entrada" name="inventario_precio_entrada">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Precio de Salida: </label>
                          <input type="text" class="form-control" id="precio_salida" placeholder="Precio de Salida" name="inventario_precio_salida">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <button class="btn btn-success" type="submit">Guardar en Inventario</button>
                      </div>
                    </div>
                    </form>
                  </div>

                </div>
              


            </div>

          </div>
        </div>

      </div>




    </div>
  </body>
  </html>