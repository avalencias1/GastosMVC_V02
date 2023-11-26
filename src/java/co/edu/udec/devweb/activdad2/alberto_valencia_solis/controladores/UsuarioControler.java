/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Servlet.java to edit this template
 */
package co.edu.udec.devweb.activdad2.alberto_valencia_solis.controladores;

import co.edu.udec.devweb.activdad2.alberto_valencia_solis.modelo.crud.UsuarioCrud;
import co.edu.udec.devweb.activdad2.alberto_valencia_solis.modelo.entidades.Usuario;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.SQLException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author invic
 */
@WebServlet(name = "UsuarioControler", urlPatterns = {"/usuario"})
public class UsuarioControler extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            
            String strAccion=request.getParameter("accion");
            
            
            
            /* TODO output your page here. You may use following sample code. */
            
            /*out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet UsuarioControler</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet UsuarioControler at " + request.getContextPath() + "</h1>");
            out.println("</body>");
            out.println("</html>");*/
            
            try {
                switch (strAccion) {
                    case "agregar" -> agregarUsuario(request, response);
                    case "actualizar" -> actualizarUsuario(request, response);
                    case "eliminar" -> eliminarUsuario(request, response);
                    case "buscar" -> obtenerUsuario(request, response);
                    case "login" -> loguearUsuario(request, response);                    
                    default -> {
                    }
                }
                // Manejar acción no válida
            } catch (IOException e) {
                // Manejar la excepción
                response.getWriter().write("Error: " + e.getMessage());
            } 
        }
    }

    
private void agregarUsuario(HttpServletRequest request, HttpServletResponse response) throws IOException {
        // Captura los parámetros de la solicitud y crea un nuevo objeto Usuario
        // Luego utiliza UsuarioCrud para agregar el usuario a la base de datos
        Usuario usuario = new Usuario();
        usuario.setCc_usr(request.getParameter("cc_usr"));
        usuario.setPass_usr(request.getParameter("pass_usr"));
        usuario.setNombre_usr(request.getParameter("nombre_usr"));
        usuario.setApellido_usr(request.getParameter("apellido_usr"));
        usuario.setGenero_usr(request.getParameter("genero_usr"));
        usuario.setEmail_usr(request.getParameter("email_usr"));

        UsuarioCrud usuarioCrud = new UsuarioCrud();

        usuarioCrud.agregarUsuario(usuario);

        response.getWriter().write("Usuario agregado exitosamante");
    }

    private void actualizarUsuario(HttpServletRequest request, HttpServletResponse response) throws IOException {
        // Captura los parámetros de la solicitud y crea un nuevo objeto Usuario
        // Luego utiliza UsuarioCrud para actualizar el usuario en la base de datos
        Usuario usuario = new Usuario();
        usuario.setId_usr(Integer.parseInt(request.getParameter("id_usr")));
        usuario.setCc_usr(request.getParameter("cc_usr"));
        usuario.setPass_usr(request.getParameter("pass_usr"));
        usuario.setNombre_usr(request.getParameter("nombre_usr"));
        usuario.setApellido_usr(request.getParameter("apellido_usr"));
        usuario.setGenero_usr(request.getParameter("genero_usr"));
        usuario.setEmail_usr(request.getParameter("email_usr"));

        UsuarioCrud usuarioCrud = new UsuarioCrud();
        
        usuarioCrud.actualizarUsuario(usuario);

        response.getWriter().write("Usuario actualizado exitosamante");
    }

    private void eliminarUsuario(HttpServletRequest request, HttpServletResponse response) throws IOException {
        // Captura el ID del usuario de la solicitud y utiliza UsuarioCrud para eliminarlo
        int idUsuario = Integer.parseInt(request.getParameter("id_usr"));

        // Asegúrate de tener la instancia de UsuarioCrud inicializada correctamente
        // (ya sea a través del constructor o el método init)

        UsuarioCrud usuarioCrud = new UsuarioCrud();
        
        usuarioCrud.eliminarUsuario(idUsuario);

        response.getWriter().write("Usuario eliminado exitosamante");
    }

    private void obtenerUsuario(HttpServletRequest request, HttpServletResponse response) throws IOException {
        // Captura el ID del usuario de la solicitud y utiliza UsuarioCrud para obtenerlo
        int idUsuario = Integer.parseInt(request.getParameter("id_usr"));

        UsuarioCrud usuarioCrud = new UsuarioCrud();

        Usuario usuario = usuarioCrud.obtenerUsuario(idUsuario);

        // Convierte el objeto Usuario a formato JSON o cualquier otro formato deseado
        // Puedes usar bibliotecas como Jackson o Gson para esto
        String jsonResponse = convertirUsuarioAJson(usuario);

        response.getWriter().write(jsonResponse);
    }
    
    private void loguearUsuario(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException, UsuarioCrud.UsuarioNoEncontradoException {
        // Captura el ID del usuario de la solicitud y utiliza UsuarioCrud para obtenerlo

        String idUsuario = request.getParameter("usuario");
        String password = request.getParameter("password");
        
        UsuarioCrud usuarioCrud = new UsuarioCrud();

        try {
                // Realizar el inicio de sesión
                Usuario usuario = usuarioCrud.iniciarSesion(idUsuario, password);

                response.sendRedirect("index.jsp");
            } catch (IllegalArgumentException e) {
                // Manejar el caso en que las credenciales sean incorrectas
                request.setAttribute("mensajeError", "Credenciales incorrectas");
                request.getRequestDispatcher("login.jsp").forward(request, response);
            } catch (UsuarioCrud.UsuarioNoEncontradoException | IOException | SQLException e) { // Manejar otras excepciones
                response.sendError(HttpServletResponse.SC_INTERNAL_SERVER_ERROR, "Error interno del servidor");
            }
        }

        
        
    }
    
    
    
    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

    private String convertirUsuarioAJson(Usuario usuario) throws IOException {
        ObjectMapper objectMapper = new ObjectMapper();
    return objectMapper.writeValueAsString(usuario);
    }

    private static class ObjectMapper {

        public ObjectMapper() {
        }

        private String writeValueAsString(Usuario usuario) {
            throw new UnsupportedOperationException("Not supported yet."); // Generated from nbfs://nbhost/SystemFileSystem/Templates/Classes/Code/GeneratedMethodBody
        }
    }
    
    @Override
    public void destroy() {
        // Cierre de recursos, si es necesario
    }    
    
    

}
