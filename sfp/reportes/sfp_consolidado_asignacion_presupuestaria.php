<?php
    session_start();
    require('../../fpdf16/fpdf.php');
    class PDF extends FPDF
    {
        function __construct()
        {
            //Llama al constructor de su clase Padre.
            //Modificar aka segun la forma del papel del reporte
            parent::__construct('P','mm','letter');
        }
    }
    //$pdf=new FPDF('L','mm','A4');
    //('mm','p't, 'cm', 'in')
    $pdf = new PDF('P','cm','A4');

    //include("conexion.php");
    //$conexion = $conn;
    $linea=0; $mt_asignado=0;

    //Creación del objeto de la clase heredada
    $pdf=new PDF();
    $pdf->SetTopMargin(5.4);
    $pdf->SetLeftMargin(4.5);
    $pdf->AliasNbPages();
    $pdf->SetFont('Times','',9);
    require("../clases/clase_sfp_reportes.php");
    $resultado=uf_sfp_consolidado_asignacion_presupuestaria();
    /*
    // Este SELECT es para hacer hacer el detalle de los intereses
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
    */
    if($resultado===false)
	  {
            echo "<script type=\"text/javascript\">alert('Advertencia, No existen registros para mostrar...');</script>";
	  }
    else
    {
        while($resultados = pg_fetch_object($resultado))
        {
            $spg_cuenta=$resultados->spg_cuenta;
            $denominacion=$resultados->denominacion;
            $asignado=$resultados->asignado;

      	    if ($linea==0)
            {
                  $pdf->AddPage();
                  //Imprimir rectangulo
                  $pdf->Rect(1,1,214,277);
                  //Imprimir Logos cabeceras
                  $pdf->Image('../../imagenes/logo_maderas_orinoco.jpg',194,2,14,14);
                  $pdf->Image('../../imagenes/corpoforestal.jpg',2,2,17,17);
                  //Imprimir pie de paginas
                  $pdf->Image('../../imagenes/GobHeader.jpg',2,259,210,15);
                  $pdf->Line(1,259,215,259);

                  $linea=$linea+8;
                  $pdf->SetXY(50,$linea);
                  $pdf->SetFont('Arial','B',14);
                  $pdf->Cell(135,4,utf8_decode('Consolidado Asignaciòn Presupuestaria'),0,0,'C');

                  //Imprimir numeraciòn de pàginas
                  $linea=$linea+6;
                  $pdf->SetFont('Arial','B',6);
                  $pdf->SetXY(200,$linea);
                  $pdf->Cell(10,10,utf8_decode('Pàgina:').$pdf->PageNo().'/{nb}',0,0,'C');

                  $pdf->Line(1,20,215,20);
                  $pdf->SetFont('Arial','',8);
                  $pdf->SetXY(2,20);
                  $pdf->Cell(15,4,utf8_decode("Còdigo"),0,0,'L');
                  $pdf->Cell(180,4,utf8_decode("Denominaciòn"),0,0,'L');
                  $pdf->Cell(18,4,utf8_decode("Asignaciòn"),0,1,'R');
                  $pdf->Line(1,24,215,24);
                  $linea=$linea+7;
            }

            $linea=$linea+4;
    		    $pdf->SetXY(01,18);
            $pdf->SetXY(01,$linea);
            $pdf->Cell(15,4,$spg_cuenta,0,0,'L');
            $pdf->SetXY(18,$linea);
            $pdf->Cell(165,4,utf8_decode($denominacion),0,0,'L');
            $pdf->SetXY(184,$linea);
            $pdf->Cell(30,4,number_format($asignado,2,",","."),0,1,'R');

            $mt_asignado=$mt_asignado+$asignado;

            if ($linea>=253)
            {
                $linea=0;
            }
  	  }
      $linea=$linea+7;
      $pdf->SetXY(20,$linea);
      $pdf->cell(30,4,'TOTAL ASIGNACION PRESUPUESTARIA',0,0,'L');
      $pdf->SetXY(184,$linea);
      $pdf->Cell(30,4,number_format($mt_asignado,2,",","."),0,1,'R');
      $pdf->Output();
  }
?>
