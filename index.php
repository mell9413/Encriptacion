<!DOCTYPE HTML>
<html>
 <head>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
       <script>
     $(function(){
        $("#btn").on("click", function(){
            var formData = $("#formulario").serialize();
            var ruta = "encriptar.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                success: function(datos)
                {
                    $("#respuesta").html(datos);
                }
            });
        });

     });
    </script>
 </head>
 <body>
<div id="respuesta"></div>
<form method="POST" id="formulario">
<table>
<tr>
<td>User:</td><td><input type="user" id="user" name="user"></td>
</tr>
</table>
<button id="btn" type="button">Enviar</button>
</form>
 </body>
</html>