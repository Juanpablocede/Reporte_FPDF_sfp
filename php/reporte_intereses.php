<?php

    session_start();

    require('../fpdf16/fpdf.php');
    class PDF extends FPDF
    {
        function __construct()
        {
            //Llama al constructor de su clase Padre.
            //Modificar aka segun la forma del papel del reporte
            parent::__construct('P','mm','letter');
        }
    }

    include("conexion.php");
    $conexion = $conn;

    $ls_totalinteres=0;
    $linea=0;
    $sw=0;
    $mcodper="";
    $li_mes_anti_acumulada=0;
    $li_letra_mes="";
    $li_ano_anti_acumulada="";

    /*$ls_codnomdesde=$_GET["codnomdes"];
    $ls_codnomhasta=$_GET["codnomhas"];
    $ls_codperdesde=$_GET["personaldes"];
    $ls_codperhasta=$_GET["personalhas"];
    $ls_mesdesde=$_GET["mesdesde"];
    $ls_meshasta=$_GET["meshasta"];
    $ls_ano=$_GET["ano"];*/

    $ls_codnomdesde='0001';
    $ls_codnomhasta='0001';
    $ls_codperdesde='0006880620';
    $ls_codperhasta='0006880620';
    $ls_mesdesde='01';
    $ls_meshasta='12';
    $ls_ano='2018';

    //Creación del objeto de la clase heredada
    $pdf=new PDF();
    $pdf->SetTopMargin(5.4);
    $pdf->SetLeftMargin(4.5);
    $pdf->AliasNbPages();
    $pdf->SetFont('Times','',9);
    //$fecha_ini =$_POST['fecha_ini'] ." ". $_POST['hora_ini'];
    //$pdf->f_ini= $fecha_ini;
    //$fecha_fin =$_POST['fecha_fin'] ." ". $_POST['hora_fin'];
    //$pdf->f_fin=$fecha_fin;
    // Este SELECT es para hacer hacer el detalle de los intereses
    $sql = "SELECT
      			sno_fideiperiodointereses.codper,
      			CASE sno_fideiperiodointereses.mescurper
      			    WHEN 1 THEN (	SELECT
      						    sno_anticipoprestaciones.monant
      					    FROM
      						    sno_anticipoprestaciones
      					    WHERE   estant ='P' AND
      						    sno_anticipoprestaciones.codper=sno_fideiperiodointereses.codper AND
      						    EXTRACT(MONTH FROM(sno_anticipoprestaciones.fecant))= 1 AND
      						    EXTRACT(YEAR  FROM(sno_anticipoprestaciones.fecant))= ".$ls_ano.")
      			    WHEN 2 THEN (	SELECT
      						    sno_anticipoprestaciones.monant
      					    FROM
      						    sno_anticipoprestaciones
      					    WHERE   estant ='P' AND
      						    sno_anticipoprestaciones.codper=sno_fideiperiodointereses.codper AND
      						    EXTRACT(MONTH FROM(sno_anticipoprestaciones.fecant))= 2 AND
      						    EXTRACT(YEAR  FROM(sno_anticipoprestaciones.fecant))= ".$ls_ano.")
      			    WHEN 3 THEN (	SELECT
      						    sno_anticipoprestaciones.monant
      					    FROM
      						    sno_anticipoprestaciones
      					    WHERE   estant ='P' AND
      						    sno_anticipoprestaciones.codper=sno_fideiperiodointereses.codper AND
      						    EXTRACT(MONTH FROM(sno_anticipoprestaciones.fecant))= 3 AND
      						    EXTRACT(YEAR  FROM(sno_anticipoprestaciones.fecant))= ".$ls_ano.")
      			    WHEN 4 THEN (	SELECT
      						    sno_anticipoprestaciones.monant
      					    FROM
      						    sno_anticipoprestaciones
      					    WHERE   estant ='P' AND
      						    sno_anticipoprestaciones.codper=sno_fideiperiodointereses.codper AND
      						    EXTRACT(MONTH FROM(sno_anticipoprestaciones.fecant))= 4 AND
      						    EXTRACT(YEAR  FROM(sno_anticipoprestaciones.fecant))= ".$ls_ano.")
      			    WHEN 5 THEN (	SELECT
      						    sno_anticipoprestaciones.monant
      					    FROM
      						    sno_anticipoprestaciones
      					    WHERE   estant ='P' AND
      						    sno_anticipoprestaciones.codper=sno_fideiperiodointereses.codper AND
      						    EXTRACT(MONTH FROM(sno_anticipoprestaciones.fecant))= 5 AND
      						    EXTRACT(YEAR  FROM(sno_anticipoprestaciones.fecant))= ".$ls_ano.")
      			    WHEN 6 THEN (	SELECT
      						    sno_anticipoprestaciones.monant
      					    FROM
      						    sno_anticipoprestaciones
      					    WHERE   estant ='P' AND
      						    sno_anticipoprestaciones.codper=sno_fideiperiodointereses.codper AND
      						    EXTRACT(MONTH FROM(sno_anticipoprestaciones.fecant))= 6 AND
      						    EXTRACT(YEAR  FROM(sno_anticipoprestaciones.fecant))= ".$ls_ano.")
      			    WHEN 7 THEN (	SELECT
      						    sno_anticipoprestaciones.monant
      					    FROM
      						    sno_anticipoprestaciones
      					    WHERE   estant ='P' AND
      						    sno_anticipoprestaciones.codper=sno_fideiperiodointereses.codper AND
      						    EXTRACT(MONTH FROM(sno_anticipoprestaciones.fecant))= 7 AND
      						    EXTRACT(YEAR  FROM(sno_anticipoprestaciones.fecant))= ".$ls_ano.")
      			    WHEN 8 THEN (	SELECT
      						    sno_anticipoprestaciones.monant
      					    FROM
      						    sno_anticipoprestaciones
      					    WHERE   estant ='P' AND
      						    sno_anticipoprestaciones.codper=sno_fideiperiodointereses.codper AND
      						    EXTRACT(MONTH FROM(sno_anticipoprestaciones.fecant))= 8 AND
      						    EXTRACT(YEAR  FROM(sno_anticipoprestaciones.fecant))= ".$ls_ano.")
      			    WHEN 9 THEN (	SELECT
      						    sno_anticipoprestaciones.monant
      					    FROM
      						    sno_anticipoprestaciones
      					    WHERE   estant ='P' AND
      						    sno_anticipoprestaciones.codper=sno_fideiperiodointereses.codper AND
      						    EXTRACT(MONTH FROM(sno_anticipoprestaciones.fecant))= 9 AND
      						    EXTRACT(YEAR  FROM(sno_anticipoprestaciones.fecant))= ".$ls_ano.")
      			    WHEN 10 THEN (	SELECT
      						    sno_anticipoprestaciones.monant
      					    FROM
      						    sno_anticipoprestaciones
      					    WHERE   estant ='P' AND
      						    sno_anticipoprestaciones.codper=sno_fideiperiodointereses.codper AND
      						    EXTRACT(MONTH FROM(sno_anticipoprestaciones.fecant))= 10 AND
      						    EXTRACT(YEAR  FROM(sno_anticipoprestaciones.fecant))= ".$ls_ano.")
      			    WHEN 11 THEN (	SELECT
      						    sno_anticipoprestaciones.monant
      					    FROM
      						    sno_anticipoprestaciones
      					    WHERE   estant ='P' AND
      						    sno_anticipoprestaciones.codper=sno_fideiperiodointereses.codper AND
      						    EXTRACT(MONTH FROM(sno_anticipoprestaciones.fecant))= 11 AND
      						    EXTRACT(YEAR  FROM(sno_anticipoprestaciones.fecant))= ".$ls_ano.")
      			    WHEN 12 THEN (	SELECT
      						    sno_anticipoprestaciones.monant
      					    FROM
      						    sno_anticipoprestaciones
      					    WHERE   estant ='P' AND
      						    sno_anticipoprestaciones.codper=sno_fideiperiodointereses.codper AND
      						    EXTRACT(MONTH FROM(sno_anticipoprestaciones.fecant))= 12 AND
      						    EXTRACT(YEAR  FROM(sno_anticipoprestaciones.fecant))= ".$ls_ano.")
      			END AS anticipos,
      			sno_fideiperiodointereses.anocurper,
      			CASE sno_fideiperiodointereses.mescurper
      			    WHEN 1 THEN 'Enero'
      			    WHEN 2 THEN 'Febrero'
      			    WHEN 3 THEN 'Marzo'
      			    WHEN 4 THEN 'Abril'
      			    WHEN 5 THEN 'Mayo'
      			    WHEN 6 THEN 'Junio'
      			    WHEN 7 THEN 'Julio'
      			    WHEN 8 THEN 'Agosto'
      			    WHEN 9 THEN 'Septiembre'
      			    WHEN 10 THEN 'Octubre'
      			    WHEN 11 THEN 'Noviembre'
      			    WHEN 12 THEN 'Diciembre'
      			END AS mescurper,
      			(sno_fideiperiodo.sueintper+
      			sno_fideiperiodo.bonextper+
      			sno_fideiperiodo.bonfinper+
      			sno_fideiperiodo.bonvacper) 				AS sueldo_integral,
      			(sno_fideiperiodo.diafid + sno_fideiperiodo.diaadi) 	AS Dias,
      			sno_fideiperiodo.apoper 				AS aportes_mes,
      			sno_fideiperiodointereses.monantacu 			AS acumulada_mes,
      			sno_fideiperiodointereses.porint*100 			AS tasa_interes,
      			sno_fideiperiodointereses.monint 			AS monto_interes
      		FROM
      			sno_fideiperiodointereses,
      			sno_fideiperiodo
      		WHERE
      			sno_fideiperiodointereses.codper=sno_fideiperiodo.codper AND
      			sno_fideiperiodointereses.anocurper=sno_fideiperiodo.anocurper AND
      			sno_fideiperiodointereses.mescurper=sno_fideiperiodo.mescurper AND
      			sno_fideiperiodointereses.codnom=sno_fideiperiodo.codnom AND
      			sno_fideiperiodointereses.anocurper='".$ls_ano."' AND
      			sno_fideiperiodointereses.mescurper BETWEEN ".$ls_mesdesde." AND ".$ls_meshasta." AND
      			sno_fideiperiodointereses.codnom BETWEEN '".$ls_codnomdesde."' AND '".$ls_codnomhasta."' AND
      			sno_fideiperiodointereses.codper BETWEEN '".$ls_codperdesde."' AND '".$ls_codperhasta."'
      		ORDER BY
      			sno_fideiperiodointereses.codper,
      			sno_fideiperiodointereses.anocurper,
      			sno_fideiperiodointereses.mescurper";
    //echo $sql; die();
    $resultado = pg_query($conexion,$sql);
    if($resultado===false)
	  {
            $io_mensajes->message("ERROR->".$io_funciones->uf_convertirmsg($io_sql->message));
	  }
    else
    {
        $pdf->AddPage();
        while($resultados = pg_fetch_object($resultado))
        {
	          $codper	        = $resultado["codper"];
	          $anticipos	    = $resultado["anticipos"];
	          $ano            = $resultado["anocurper"];
            $mes            = $resultado["mescurper"];
            $sueldointegral = $resultado["sueldo_integral"];
            $dias           = $resultado["dias"];
            $aportemes      = $resultado["aportes_mes"];
            $acumuladames   = $resultado["acumulada_mes"];
            $tasainteres    = $resultado["tasa_interes"];
            $montointeres   = $resultado["monto_interes"];

      	    if ($sw==0)
      	    {
      		        $mcodper=$codper;
      		        $sw=1;
      	    }

      	    if ($mcodper!=$codper)
            {
              		$linea=$linea+4;
              		$pdf->Line(0,$linea,215,$linea);

              		$linea=$linea+20;
              		$pdf->Line(10,$linea,70,$linea);
              		$linea=$linea+5;
              		$pdf->SetXY(15,$linea);
              		$pdf->SetFont('Arial','B',8);
              		$pdf->Cell(45,04,'Recibi Conforme',0,0,'C');
              		$pdf->SetXY(100,$linea);
              		$pdf->SetFont('Arial','I',16);
              		//$pdf->Cell(80,08,'Total Intereses a Cobrar Bs.:',0,0,'C');
              		//$pdf->Cell(20,08,number_format($ls_totalinteres,2,",","."));

              		$linea=$linea+30;
              		$pdf->SetXY(15,$linea);
              		$pdf->SetFont('Arial','B',8);
              		$pdf->Cell(190,04,$banco,0,0,'C');

              		$linea=0;
              		$ls_totalinteres=0;
              		$mcodper=$codper;
              		$pdf->AddPage();
            }

      	    if ($linea==0)
            {
              		//Este SELECT es para imprimir informacion actual del trabajador

              		if ($ls_mesdesde==1)
              		{
              		    $li_mes_anti_acumulada=12;
              		    $li_letra_mes='Diciembre';
              		    $li_ano_anti_acumulada=$ls_ano-1;
              		}
              		else
              		{
              		    $li_mes_anti_acumulada= $ls_mesdesde-1;
              		    $li_ano_anti_acumulada=$ls_ano;
              		    if($ls_mesdesde==2)
              		    {
              			$li_letra_mes='Enero';
              		    }

              		    if($ls_mesdesde==3)
              		    {
              			$li_letra_mes='Febrero';
              		    }

              		    if($ls_mesdesde==4)
              		    {
              			$li_letra_mes='Marzo';
              		    }

              		    if($ls_mesdesde==5)
              		    {
              			$li_letra_mes='Abril';
              		    }

              		    if($ls_mesdesde==6)
              		    {
              			$li_letra_mes='Mayo';
              		    }
              		    if($ls_mesdesde==7)
              		    {
              			$li_letra_mes='Junio';
              		    }

              		    if($ls_mesdesde==8)
              		    {
              			$li_letra_mes='Julio';
              		    }

              		    if($ls_mesdesde==9)
              		    {
              			$li_letra_mes='Agosto';
              		    }

              		    if($ls_mesdesde==10)
              		    {
              			$li_letra_mes='Septiembre';
              		    }

              		    if($ls_mesdesde==11)
              		    {
              			$li_letra_mes='Octubre';
              		    }

              		    if($ls_mesdesde==12)
              		    {
              			$li_letra_mes='Noviembre';
              		    }

              		}

              		/*if($ls_mesdesde==1)
              		{
              		    $li_letra_mes='Enero';
              		}*/

              		$sql01 = "SELECT
              				    sno_personal.codper,
              				    RTRIM(sno_personal.nomper)||' '||RTRIM(sno_personal.apeper) AS nombres,
              				    sno_personalnomina.fecingper,
              				    sno_personalnomina.sueper,
              				    sno_nomina.desnom,
              				    sno_asignacioncargo.denasicar,
              				    srh_departamento.dendep AS denger,
              				    scb_banco.nomban,
              				    CASE sno_personalnomina.tipcuebanper
              					WHEN 'A' THEN 'Cuenta Ahorro'
              					WHEN 'C' THEN 'Cuenta Corriente'
              					WHEN 'L' THEN 'Cuenta de Activos Liquidos'
              				    END tipocuenta,
              				    sno_personalnomina.codcueban,
              				    (SELECT
              					MAX(sno_fideiperiodointereses_01.moncap)
              				    FROM
              					sno_fideiperiodointereses AS sno_fideiperiodointereses_01
              				    WHERE
              					sno_fideiperiodointereses_01.codper=sno_personal.codper AND
              					sno_fideiperiodointereses_01.mescurper=".$li_mes_anti_acumulada." AND
              					sno_fideiperiodointereses_01.anocurper::INTEGER=$li_ano_anti_acumulada) AS antiguedaanterior
              			    FROM
              				    sno_personal,
              				    sno_personalnomina,
              				    sno_nomina,
              				    sno_asignacioncargo,
              				    srh_gerencia,
              				    scb_banco,
                                                  srh_departamento
              			    WHERE
              				    sno_personal.codper=sno_personalnomina.codper AND
              				    sno_personalnomina.codnom=sno_nomina.codnom AND
                                                  srh_departamento.coddep=sno_personalnomina.coddep AND
              				    sno_personalnomina.codnom=sno_asignacioncargo.codnom AND
              				    sno_personalnomina.codasicar=sno_asignacioncargo.codasicar AND
              				    sno_personalnomina.codban=scb_banco.codban AND
              				    sno_personal.codger=srh_gerencia.codger AND
              				    sno_personalnomina.staper IN('1','2','4') AND
              				    sno_personalnomina.codnom BETWEEN '".$ls_codnomdesde."' AND '".$ls_codnomhasta."' AND
              				    sno_personal.codper='".$codper."'
              			    ORDER BY
              				    sno_personal.codper";
                  //print $sql01; die();
              		$resultado01 = pg_query($conexion,$sql01);
              		while($resultados01 = pg_fetch_object($resultado01))
              		{
              		    $nombres	    = $resultado01["nombres"];
              		    $fingreso	    = $resultado01["fecingper"];
              		    $sueldo	      = $resultado01["sueper"];
              		    $nomina	      = $resultado01["desnom"];
              		    $cargo	      = $resultado01["denasicar"];
              		    $gerencia	    = $resultado01["denger"];
              		    $banco	      = ('Depositado en el Banco de '.$resultado01["nomban"].' '.$resultado01["tipocuenta"].' Nro. '.$resultado01["codcueban"]);
              		    $antiguedadante = $resultado01["antiguedaanterior"];

              		    //Hace rectangulo a toda la pagina
              		    $pdf->Rect(0,0,215,278);
              		    //Imprimir Logos
              		    //$pdf->Image('../../shared/imagebank/logo_mat_proforca.jpg',2,2,15,14);
              		    $pdf->Image('../imagenes/logo_maderas_orinoco.jpg',194,2,15,14);
              		    $pdf->Image('../imagenes/corpoforestal.jpg',3,1,26,22); // Agregar Logo MAT
              		    $pdf->Image('../imagenes/GobHeader.jpg',1,260,210,18); // Agregar Pie de pagina proforca
                                  //Arial bold 15
              		    $pdf->SetFont('Arial','B',14);
              		    //Movernos a la derecha
              		    $linea=7;
              		    $pdf->Ln($linea);
              		    $pdf->SetXY(50,$linea);
              		    $pdf->Cell(135,4,'Recibo de Pago Intereses Prestaciones',0,0,'C');

              		    $linea=$linea+10;
              		    $pdf->SetFont('Arial','',8);
              		    $pdf->Line(0,$linea,215,$linea);
              		    $linea=$linea+1;
              		    $pdf->Line(0,$linea,215,$linea);

              		    $linea=$linea+1;
              		    //Arial bold 8
              		    $pdf->SetFont('Arial','B',8);
              		    $pdf->SetXY(02,$linea);
              		    $pdf->Cell(17,04,'Codigo',0,0,'C');
              		    $pdf->Cell(80,04,'Nombres',0,0,'L');
              		    $pdf->Cell(27,04,'Fecha Ingreso',0,0,'C');
              		    $pdf->Cell(20,04,'Sueldo Basico',0,0,'R');
              		    $pdf->Cell(23,04,'Nomina',0,1,'L');

              		    $linea=$linea+4;
              		    $pdf->SetXY(02,$linea);
              		    $pdf->Cell(17,04,$codper,0,0,'C');
              		    $pdf->Cell(80,04,$nombres,0,0,'L');
              		    $pdf->Cell(27,04,$fingreso,0,0,'C');
              		    $pdf->Cell(20,04,number_format($sueldo,2,",","."),0,0,'R');
              		    $pdf->Cell(23,04,$nomina,0,1,'L');


              		    //linea vertical entre el codigo y nombre
              		    $pdf->Line(19,18,19,27);
              		    //linea vertical entre el nombre, fecha y dependencia
              		    $pdf->Line(102,18,102,36);
              		    //linea vertical entre la fecha y el sueldo
              		    $pdf->Line(125,18,125,27);
              		    //linea vertical entre la sueldo y la nomina
              		    $pdf->Line(146,18,146,27);

              		    $linea=$linea+4;
              		    $pdf->Line(0,$linea,215,$linea);
              		    $linea=$linea+1;
              		    $pdf->SetXY(01,$linea);
              		    $pdf->Cell(101,04,'Cargo',0,0,'L');
              		    $pdf->Cell(11,04,'Dependencia',0,1,'L');

              		    $linea=$linea+4;
              		    $pdf->SetXY(01,$linea);
              		    $pdf->Cell(101,04,$cargo,0,0,'L');
              		    $pdf->Cell(11,04,$gerencia,0,0,'L');

              		    $linea=$linea+4;
              		    $pdf->Line(0,$linea,215,$linea);

              		    $linea=$linea+1;
              		    $pdf->SetXY(02,$linea);
              		    $pdf->Cell(40,04,'Prestaciones Acumuladas a',0,0,'L');
              		    $pdf->Cell(20,04, ($li_letra_mes).'  '.($li_ano_anti_acumulada).' Bs.',0,0,'L');
              		    $pdf->Cell(35,04,number_format($antiguedadante,2,",","."),0,0,'C');

              		    $linea=$linea+4;
              		    $pdf->Line(0,$linea,215,$linea);
              		    $linea=$linea+1;
              		    $pdf->Line(0,$linea,215,$linea);

              		    $linea=$linea+1;
              		    $pdf->SetFont('Arial','',8);
              		    $pdf->SetXY(10,$linea);
              		    $pdf->Cell(10,4,utf8_decode("Año"),0,0,'C');
              		    $pdf->Cell(10,4,'Mes',0,0,'L');
              		    $pdf->Cell(33,4,'Sueldo Integral',0,0,'C');
              		    $pdf->Cell(10,4,utf8_decode("Día"),0,0,'C');
              		    $pdf->Cell(30,4,'Aporte Mes',0,0,'C');
              		    $pdf->Cell(30,4,'Anticipos',0,0,'C');
              		    $pdf->Cell(35,4,'Antiguedad Acumulada',0,0,'C');
              		    $pdf->Cell(17,4,'Tasa',0,0,'C');
              		    $pdf->Cell(35,4,'Interes Mes',0,1,'C');
              		    $linea=$linea+4;
              		    $pdf->Line(0,$linea,215,$linea);
              		    $linea=43;
              		}
  	    }

            $linea=$linea+4;
            $pdf->SetXY(10,$linea);
            $pdf->Cell(10,4,$ano,0,0,'C');
            $pdf->Cell(10,4,$mes,0,0,'L');
            $pdf->Cell(27,4,number_format($sueldointegral, 2,",","."),0,0,'R');
            $pdf->Cell(14,4,$dias,0,0,'R');
            $pdf->Cell(25,4,number_format($aportemes, 2,",","."),0,0,'R');
      	    if ($anticipos!=0)
      	    {
      		      $pdf->Cell(28,4,number_format($anticipos,2,",","."),0,0,'R');
      	    }
      	    else
      	    {
      		      $pdf->Cell(28,4,"",0,0,'R');
      	    }
      	    $pdf->Cell(37,4,number_format($acumuladames,2,",","."),0,0,'R');
            $pdf->Cell(20,4,number_format($tasainteres,2,",","."),0,0,'R');
            $pdf->Cell(30,4,number_format($montointeres,2,",","."),0,1,'R');
      	    $ls_totalinteres=$ls_totalinteres+$montointeres;

      	    if ($linea>=255)
      	    {
            		$pdf->AddPage();
            		$linea=0;
            		//$linea=$linea+1;
            		//$pdf->Line(0,$linea,215,$linea);
      	    }
        }
      	if ($linea<255)
      	{
      	    $linea=$linea+4;
      	    $pdf->Line(0,$linea,215,$linea);

      	    $linea=$linea+20;
      	    $pdf->Line(10,$linea,70,$linea);
      	    $linea=$linea+5;
      	    $pdf->SetXY(15,$linea);
      	    $pdf->SetFont('Arial','B',8);
      	    $pdf->Cell(45,04,'Recibi Conforme',0,0,'C');
      	    $pdf->SetXY(100,$linea);
      	    $pdf->SetFont('Arial','I',16);
      	    //$pdf->Cell(80,08,'Total Intereses a Cobrar Bs.:',0,0,'C');
      	    //$pdf->Cell(20,08,number_format($ls_totalinteres,2,",","."));

      	    $linea=$linea+30;
      	    $pdf->SetXY(15,$linea);
      	    $pdf->SetFont('Arial','B',8);
      	    //$pdf->Cell(190,04,$banco,0,0,'C');
      	}
        $pdf->Output();
        $pdf->free_result($resultado);
    }
?>
