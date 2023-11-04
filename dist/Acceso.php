<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/fondo.css" rel="stylesheet">
</head>

<body>
  <div class="contai">
    <img class="img_illus" src="img/dis.gif" alt="This is background">
    <div class="content-contai">
      <h1 id="hea">S I C A F I</h1>
      <p id="subheadlin">Bienvenido</p><br>
    </div>
    <div class="field-contai">
      <form action="autenticar.php" method="post" autocomplete="off">
        <fieldset class="len">
          <legend class="len2">Acceder</legend><br>
          <label for="uname">Usuario </label><br>
          <input class="input-field" type="text" id="username" name="username" required size="10"
            style="font-family: Arial; font-size: 16pt; width : 380px; heigth : 1px"><br>
          <br>
          <label for="psw">Contraseña</label><br>
          <input class="input-field" type="password" id="password" name="password" required size="10"
            style="font-family: Arial; font-size: 16pt;width : 380px; heigth : 1px"><br><br>
        </fieldset><br><br>
        <center>
          <button type="submit" class="btns btn-info" style="color: white;">Iniciar Sesión</button>
          <button type="submit" class="btns btn-danger" style="color: white;">Cancelar</button><br><br><br>
          <a href="olvido_contrasena.php">¿Has olvidado tu contraseña?</a>
        </center>
      </form>
    </div>
  </div>

</body>

</html>
