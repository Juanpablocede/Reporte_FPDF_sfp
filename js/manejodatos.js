$(document).ready(function()
{
			$("#guardar").click(function()
				{
						var nombres 		= $("#nombres").val();
						var apellidos 	= $("#apellidos").val();
						var direccion		= $("#direccion").val();
						if (nombres == "" || apellidos == "" || direccion == "")
						{
							alert("Algunos de los campos nombres, apellidos o direcciòn; no puede estar en blanco");
						}

				});
});
