<%-- 
    Document   : agregar
    Created on : 25/11/2023, 12:42:30 p. m.
    Author     : invic
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
    if(request.getSession().getAttribute("usuario.login")==null){
        getServletContext().getRequestDispatcher("web/usuario/login.jsp").forward(request, response);
    } 
%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>Hello World!</h1>
    </body>
</html>
