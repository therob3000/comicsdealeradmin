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
  <script src="js/altaComic.js"></script>
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
            <h3 class="panel-title">Alta de Comic.</h3>
            </div>
            <div class="panel-body">
              <form class="form" role="form" id="comic">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Compañia</label>
                          <select class="form-control" id="compania" name="compania_id">

                          </select> 
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Personaje</label>
                          <select class="form-control" id="personaje" name="cat_comic_personaje_id">

                          </select>  
                        </div>
                      </div>

                    </div>
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Titulo</label>
                          <input type="text" class="form-control" id="inputEmail3" placeholder="Titulo del Comic" name="cat_comic_titulo">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Idioma</label>
                          <select class="form-control" name="cat_comic_idioma">
                            <option value="esp">Español</option>
                            <option value="ing">Ingles</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Descripcion: </label>

                          <textarea class="form-control" rows="3" name="cat_comic_descripcion"></textarea>
                          
                        </div>
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Numero de Tomo: </label>
                          <input type="text" class="form-control" id="inputEmail3" placeholder="Titulo del Comic" name="cat_comic_numero_ejemplar">
                        </div>
                      </div>
                      <div class="col-md-3">
                       <div class="form-group">
                        <label class="control-label">URL de Imagen: </label>
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Titulo del Comic" name="cat_comic_imagen_url">
                      </div>
                    </div>
                    <div class="col-md-3">
                     <div class="form-group">
                      <label class="control-label">Precio de Portada: </label>
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Titulo del Comic" name="cat_comic_precio_portada">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <button class="btn btn-success" type="submit">Guardar</button>  
                    </div>
                  </div>

                </div>


              </div>

            </form>
          </div>


        </div>

      </div>
    </div>

  </div>




</div>
</body>
</html>