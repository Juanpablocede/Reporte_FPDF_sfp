<?php

function uf_sfp_consolidado_asignacion_presupuestaria()
{
	include("../php/conexion.php");
	$conexion = $conn;
  $sql = "SELECT ".
            	"spg_cuenta, ".
              "denominacion, ".
              "SUM(asignado) AS asignado ".
           "FROM ".
              "spg_asignacion_ejecucion ".
           "WHERE ".
              "nivel=3 ".
					 "GROUP BY ".
					 		"spg_cuenta, ".
							"denominacion ".
           "ORDER BY ".
              "spg_cuenta ";
    $resultado = pg_query($conexion,$sql);
		return $resultado;

	}// end uf_sfp_consolidado_asignacion_presupuestaria
	//--------------------------------------------------------------------------------------------------------------------
	//--------------------------------------------------------------------------------------------------------------------
	function uf_sfp_asignacion_presupuestaria_estructura()
	{
		include("../php/conexion.php");
		$conexion = $conn;
		$sql = "SELECT ".
								 "SUBSTRING(codestpro1,24,2) AS codestpro1, ".
								 "SUBSTRING(codestpro2,22,4) AS codestpro2, ".
								 "SUBSTRING(codestpro3,24,2) AS codestpro3, ".
								 "SUBSTRING(codestpro4,24,2) AS codestpro4, ".
								 "SUBSTRING(codestpro5,24,2) AS codestpro5, ".
								 "spg_cuenta, ".
								 "denominacion, ".
								 "asignado ".
						 "FROM ".
								"spg_asignacion_ejecucion ".
						 "WHERE ".
								"nivel=3 ".
						 "ORDER BY ".
								 "codestpro2, ".
								 "spg_cuenta ";
	    $resultado = pg_query($conexion,$sql);
			return $resultado;

		}// end uf_sfp_asignacion_presupuestaria_estructura

?>
