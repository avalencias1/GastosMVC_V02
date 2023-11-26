<%-- 
    Document   : login
    Created on : 25/11/2023, 12:43:38 p. m.
    Author     : invic
--%>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Ingrese con sus credenciales!</h1>
        
        <h2>Login</h2>
        <form id="loginForm" action="usuario?accion=login" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" >Iniciar Sesión</button>
        </form>        
        
    </body>
</html>
