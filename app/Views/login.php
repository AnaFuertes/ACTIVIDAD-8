<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="#" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login con PHP - Bootstrap 4</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <style>

*{
	margin: 0px; 
	padding: 0px; 
	box-sizing: border-box;
}

body, html {
	height: 100%;
	font-family: Poppins-Regular, sans-serif;
}


input {
	outline: none;
	border: none;
}

button {
	outline: none !important;
	border: none;
	background: transparent;
}

button:hover {
	cursor: pointer;
}

/*-- contenedor del Login--*/

.container-login {
	width: 100%;  
  min-height: 100vh;
  display: -webkit-flex;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;

}
.wrap-login {
  width: 400px;
  background: #eceff1;
  border-radius: 20px;
  overflow: hidden;
  padding: 77px 55px 53px 55px;
}


/*----Formulario de user y password----*/

.login-form {
  width: 100%;
}

.login-form-title {
  display: block;
  font-family: Poppins-Bold;
  font-size: 40px;
  color: #333333;
  line-height: 1.5;
  text-align: center;
}


/*------------------------------------------------------------------
[ Input ]*/

.wrap-input100 {
  width: 100%;
  position: relative;
  border-bottom: 2px solid #adadad;
  margin-bottom: 37px;
}

.input100 {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #555555;
  line-height: 1.2;

  display: block;
  width: 100%;
  height: 45px;
  background: transparent;
  padding: 0 5px;
}

/*---------------------------------------------*/ 


.focus-efecto::before {
  content: "";
  display: block;
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 4px; /*ancho de la linea que hace el efecto de barra de progeso en el input al hacer foco*/

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;

  background: #D3D3D3;
  background: -webkit-linear-gradient(left, #FAD02E, #E86A48);
background: -o-linear-gradient(left, #FAD02E, #E86A48);
background: -moz-linear-gradient(left, #FAD02E, #E86A48);
background: linear-gradient(left, #FAD02E, #E86A48);

}

.focus-efecto::after {
  font-family: Poppins-Regular;
  font-size: 15px;
  color: #999999;
  line-height: 1.2;

  content: attr(data-placeholder);
  display: block;
  width: 100%;
  position: absolute;
  top: 16px;
  left: 0px;
  padding-left: 5px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.input100:focus + .focus-efecto::after {
  top: -15px;
}

.input100:focus + .focus-efecto::before {
  width: 100%;
}

.has-val.input100 + .focus-efecto::after {
  top: -15px;
}

.has-val.input100 + .focus-efecto::before {
  width: 100%;
}

/*---------------------------------------------*/


/*------------------------------------------------------------------
[ Button ]*/

.wrap-login-form-btn {
  width: 100%;
  display: block;
  position: relative;
  z-index: 1;
  border-radius: 40px 5px;
  overflow: hidden;
  margin: 0 auto;
}

.login-form-bgbtn {
  position: absolute;
  z-index: -1;
  width: 300%;
  height: 100%;
  background: #D3D3D3;
  background: -webkit-linear-gradient(left, #FAD02E, #E86A48);
background: -o-linear-gradient(left, #FAD02E, #E86A48);
background: -moz-linear-gradient(left, #FAD02E, #E86A48);
background: linear-gradient(left, #FAD02E, #E86A48);
  top: 0;
  left: -100%;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.login-form-btn {
  font-family: Poppins-Medium;
  font-size: 20px;
  color: #fff;
  line-height: 1.2;
  text-transform: uppercase;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  width: 100%;
  height: 50px;
}

.wrap-login-form-btn:hover .login-form-bgbtn {
  left: 0;
}


/*--- Para dispositivos small responsive ---*/

@media (max-width: 576px) {
  .wrap-login {
    padding: 77px 15px 33px 15px;
  }
}
  </style>
  <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="fuentes/iconic/css/material-design-iconic-font.min.css">
</head>
<body>
  <div class="container-login">
    <div class="wrap-login">
      <form class="login-form validate-form" id="formLogin" action="" method="post">
        <span class="login-form-title">LOGIN</span>
        <div class="wrap-input100" data-validate="Usuario incorrecto">
          <input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuario">
          <span class="focus-efecto"></span>
        </div>
        <div class="wrap-input100" data-validate="Password incorrecto">
          <input class="input100" type="password" id="password" name="password" placeholder="Password">
          <span class="focus-efecto"></span>
        </div>
        <div class="container-login-form-btn">
          <div class="wrap-login-form-btn">
            <div class="login-form-bgbtn"></div>
            <button type="submit" name="submit" class="login-form-btn">CONECTAR</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="jquery/jquery-3.3.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="popper/popper.min.js"></script>
  <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="codigo.js"></script>

  <!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $('#formLogin').submit(function(e){
    e.preventDefault();
    var usuario = $.trim($("#usuario").val());    
    var password = $.trim($("#password").val());    
    
    // Define predefined username and password
    var predefinedUsername = "root";
    var predefinedPassword = "12345";

    if(usuario === predefinedUsername && password === predefinedPassword){
      Swal.fire({
        icon: 'success',
        title: '¡Conexión exitosa!',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ingresar'
      }).then((result) => {
        if(result.isConfirmed){
          // Change the URL to the desired page
          window.location.href = "crud.php";
        }
      });
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Usuario y/o contraseña incorrecta',
      });
    }
  });
</script>

<!-- Your HTML form -->
<form id="formLogin">
  <input type="text" id="usuario" placeholder="Usuario">
  <input type="password" id="password" placeholder="Contraseña">
  <button type="submit">Iniciar sesión</button>
</form>



</script>

</body>
</html>
