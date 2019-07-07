/*$('#hola') -> document.getElementById('hola')
$('.hola') -> document.getElementClassName('hola')
$('[name = hola]') -> document.getElementsByName('hola')*/

$(document).ready(function()
{
	$('#resultado').prop('disabled', true);
	var fecha = new Date();
	var ano = fecha.getFullYear();

	var select = $('#ano');
	for(var i=1900;i<=ano;i++)
	{
		select.append('<option id="any" value="'+i+'" >'+i+'</option>');
 	}

	//$('h1').css({ 'fontSize' : '50px', 'color' : 'red' });
	//$('h1').hover({ 'color' : 'blue' });

	$(".centrado").hover(function()
	{
		    $(this).css({ "background-color" : "yellow" , "border-bottom" : "solid #C6D0DA" });
		}, function()
		{
		    $(this).css( {"background-color" : "white" , "border-bottom" : "none" });
		});
});


function operacion()
{

	var numero1 = document.getElementById('primernumero').value;
	var numero2 = document.getElementById('segundonumero').value;

	if (numero1 == "")
	{
		alert("Introduzaca el primer numero");
		return;
	}

	if (numero2 == "")
	{
		alert("Introduzaca el segundo numero");
		return;
	}

	if (Number(numero2)==0 && operacion=="restar")
	{
		alert("La división por cero (0) no está permitida");
	}
	var operar  = document.getElementById('operacion').value;
	var resultado = sumarnumero(Number(numero1), Number(numero2), operar);

	document.getElementById('resultado').value = resultado;
}

function sumarnumero(numero1, numero2, operar)
{
	switch(operar)
		{
			case "sumar":
				return numero1 + numero2;
				break;
			case "restar":
				return numero1 - numero2;
				break;
			case "multiplicar":
				return numero1 * numero2;
				break;
			case "dividir":
				return numero1 / numero2;
				break;
			default:
				alert("No fue definida algun tipo de operaciones");
				break;
	    }
}


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
			//llenarselect(31);
			var valormes = 31;
			break;

		case 'febrero':
			//llenarselect(28);
			var valormes = 28;
			break;
		case 'abril':
		case 'junio':
		case 'septiembre':
		case 'noviembre':
			//llenarselect(30);
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



function llenarselect(number)
{
	limpiarselec();
	var days = document.getElementById('diasmes');
	var disable = document.createElement('option');
	disable.text = 'Día';
	disable.disabled = true;
	disable.selected = true;
	days.add(disable);

	for(var i = 1; i <= number; i++ )
	{
		var opcion = document.createElement('option');
		opcion.text = i;
		opcion.value = i;
		opcion.id = 'd-m';
		days.add(opcion);
	}


}

function limpiarselec()
{
	var dias = document.getElementById('diasmes');
	var op = document.getElementById('d-m');
	var cantidad = dias.options.length;
	for(var i = 0; i < cantidad; i++)
	{
		dias.remove(op);
	}
}

/*
// Funcion para Cargar los días del mes campo <select>
//Esta funcion se ejecuta cuandoi se carga el formulario con la instruccion
//<body onload="cargar_dias";"cargar_ano"> y solo se ejecuta una sola vez; es decir
//cada vez que se cargue el formulario
function cargar_dias()
{
	var arreglodia = [];
	for(var i = 1; i <= 31; i++)
	{
		arreglodia[i] = i;
	}

	addOptions("diasmes", arreglodia);
}

// Rutina para agregar opciones a un <select> Dia
function addOptions(domElement, arreglodia)
{
	var select = document.getElementsByName(domElement)[0];
	for (value in arreglodia)
	{
		var option = document.createElement("option");
		option.text = arreglodia[value];
		select.add(option);
	}
}

// Rutina para agregar opciones a un <select> Año
function cargar_ano()
{
	var fecha = new Date();
	var ano = fecha.getFullYear();

	var arregloano = [];
	for(var i = 1900; i <= ano; i++)
	{
		arregloano[i] = i;
	}

	addOptionsano("ano", arregloano);
}

// Rutina para agregar opciones a un <select>
function addOptionsano(domElement, arregloano)
{
	var select = document.getElementsByName(domElement)[0];
	for (value in arregloano)
	{
		var option = document.createElement("option");
		option.text = arregloano[value];
		select.add(option);
	}
}

function buscarmes()
{
	var vermes = document.getElementById('n1').value;
	alert(vermes);
}
*/
