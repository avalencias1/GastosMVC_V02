<%-- 
    Document   : index
    Created on : 17/11/2023, 8:58:26 p. m.
    Author     : avalencias1
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.util.*"%>
<%@page import="java.text.*"%>

<html>
    <head>
        <title>GESTOR DE GASTOS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <% Date d=new Date();  
        SimpleDateFormat formato =new SimpleDateFormat("dd-MM-yyyy hh:mm:ss a");
        String fechaActual=formato.format(d);        
        %>          
        <h2><%=fechaActual %> </h2>
        
        <h2>Menú de Usuario</h2>
        <ul>
            <li><a href="web/usuario/login.jsp">Login</a></li>
            <li><a href="web/usuario/agregar.jsp">Agregar Usuario</a></li>
            <li><a href="web/usuario/buscar.jsp">Buscar Usuario</a></li>
            <li><a href="web/usuario/modificar.jsp">Modificar Usuario</a></li>
            <li><a href="web/usuario/eliminar.jsp">Eliminar Usuario</a></li>
            <li><a href="web/usuario/listar.jsp">Listar Todos los Usuarios</a></li>
            <li><a href="salir.jsp">Salir</a></li>
        </ul>        
        
        
        
    </body>
</html>