$(document).ready(function()
{
	$("#guardar").click(function(e)
		{
				const formulario = $("#formulario");
				const campos = formulario.find("input[type='text']");
				const mensajeVacio = '<p class="empty-message text-danger">Este campo es requerido.</p>';
				campos.each((idx, elem) => {
					const currentInput = $(elem);
					if (!currentInput.val()) {
						e.preventDefault();
						currentInput.addClass("campo-vacio");
						if(!currentInput.parent().find(".empty-message").length)
							currentInput.parent().append(mensajeVacio);
					} else currentInput.parent().find(".empty-message").remove();
				})

				/*if (nombre.val().trim().length > 70)
				{
						alert ("La longitud del campo nombre no puede tener mas de 70 caràcteres");
				}

				if (direccion.val().trim().length > 200)
				{
						alert ("La longitud del campo direcciòn no puede tener mas de 20 caràcteres");
				}*/

		});


	const COLUMN_DEFS = () => [
  {
    className: "col-1",
    targets: [0]
  },
  {
    className: "col-3",
    targets: [1]
  },
  {
    className: "col-3",
    targets: [2]
  },
  {
    className: "col-2 text-center",
    targets: [3]
  },
  {
    className: "col-1",
    targets: [4]
  },
  {
    className: "col-1 text-center",
    targets: [5]
  },
  {
    className: "col-1 text-center",
    targets: [6]
  }
];

/*
		$('#ListarData').DataTable({
			"columnDefs": COLUMN_DEFS(),
			language: {
		    "decimal":        "",
				"emptyTable":     "No hay datos",
				"info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
				"infoEmpty":      "Mostrando 0 a 0 de 0 registros",
				"infoFiltered":   "(Filtro de _MAX_ total registros)",
				"infoPostFix":    "",
				"thousands":      ",",
				"lengthMenu":     "Mostrar _MENU_ registros",
				"loadingRecords": "Cargando...",
				"processing":     "Procesando...",
				"search":         "Buscar:",
				"zeroRecords":    "No se encontraron coincidencias",
				"paginate": {
				    "first":      "Primero",
				    "last":       "Ultimo",
				    "next":       "Próximo",
				    "previous":   "Anterior"
				},
				"aria": {
				    "sortAscending":  ": Activar orden de columna ascendente",
				    "sortDescending": ": Activar orden de columna desendente"
				}
		  }
		});

*/
		/*$.fn.ListarData.isDataTable (),
		$('#ListarData').DataTable( {
		    paging: true,
		    searching: true,
				//dataTables_length: "Mostrar",
				//ListarData_length: "Mostrar",
		} );*/


		const Tabla = $("#LlenarTabla").DataTable({
					"info": false,
					"lengthChange": false,
					"language":
					{
						"search": "Buscar:",
						"infoEmpty": "Mostrar 0 to 0 of 0 entries",
						"zeroRecords": "No se encontraron datos",
		    		"paginate":
						{
							"previous": "Atras",
		      		"next": "Siguiente",
		    		}
		  		}
			});

			$("#buscar-registros").keyup(function() {
				Tabla.search($(this).val()).draw();
		  });

		$("#prueba").hover(function()
		{
			    $(this).css({ "background-color" : "red" , "border-bottom" : "solid #C6D0DA" });
		}, function()
		{
			    $(this).css( {"background-color" : "white" , "border-bottom" : "none" });
		});

		setTimeout(function(){
			$(".alert-success").fadeOut();
		}, 3000);

		$('#resultado').prop('disabled', true);
		var fecha = new Date();
		var ano = fecha.getFullYear();

		var select = $('#ano');
		for(var i=1900;i<=ano;i++)
		{
			select.append('<option id="any" value="'+i+'" >'+i+'</option>');
	 	}

		var options =
		{
			url: "http://localhost:8000/sfp-acciones-especificas/buscar",

			getValue: "nombre_accion_especifica",

			list: {
				match: {
					enabled: true
				}
			}
		};

		//Rutina para agregar opciones a un <select> Año
		function cargar_ano(domElement)
		{
			var fecha = new Date();
			var ano = fecha.getFullYear();
			disable.text = 'Año';
			var select = document.getElementsByName(domElement)[0];
			for(var i=1900;i<=ano;i++)
			{
				var option = document.createElement("option");
				option.text = i;
				select.add(option);
			}
		}

		function cargar_dias()
		{
			//var month = document.getElementById('mes').value;

			var month = $('#mes').val();

			switch(month)
			{
				case 'enero':
				case 'marzo':
				case 'mayor':
				case 'julio':
				case 'agosto':
				case 'octubre':
				case 'diciembre':
					var valormes = 31;
					break;
				case 'febrero':
					var valormes = 28;
					break;
				case 'abril':
				case 'junio':
				case 'septiembre':
				case 'noviembre':
					valormes = 30;
					break;
				default:
					alert('El mes no esta definido '+month);
			}

			var select = $('#diasmes');
			for(var i=1;i<=valormes;i++)
			{
				select.append('<option id="diasmes" value="'+i+'" >'+i+'</option>');
		 	}
		}

});
