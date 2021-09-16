# MantenedorForo
Página web simple basada en PHP, HTML, CSS, validaciones en JS y conexión a BD por PDO

Esta es una página web simple para realizar foros

Contiene una validación de usuarios que obtiene los datos del usuario que ingresa a la plataforma y lo redirecciona a su correspondiente página de inicio

Tiene dos tipos de usuario: Administrador y usuarios 
- El usuario como tal, puede ver el foro y participar de él
- El Administrador del foro puede participar en el foro, eliminar comentarios de otros usuarios y activar y desactivar a los demás usuarios del foro

Contiene una página de registros para los nuevos usuarios 

Se utilizó sesiones con PHP para las páginas a las que se accede desde el login

La conexión a la base de datos se realizó mediante conexión PDO
