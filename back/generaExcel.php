<?php 
require '../back/PHPExcel.php';
require '../back/conexion.php';
require '../back/objetos.php';
/** Error reporting */
error_reporting(E_ALL);

/** Include path **/
ini_set('include_path', ini_get('include_path').';../Classes/');

/** PHPExcel */
//include 'PHPExcel.php';

/** PHPExcel_Writer_Excel2007 */
require '../back/PHPExcel/Writer/Excel2007.php';

// Create new PHPExcel object
//echo date('H:i:s') . " Create new PHPExcel object\n";
$objPHPExcel = new PHPExcel();
$objBen = new Beneficiario;
$fechaActual = date("Y")."-".date("m")."-".date("d");
header( "Content-type: application/vnd.ms-excel" );
header('Content-Disposition: attachment; filename="Reporte de solicitudes '.$fechaActual.'.xlsx"');
header("Pragma: no-cache");
header("Expires: 0");

// Set properties
//echo date('H:i:s') . " Set properties\n";
$objPHPExcel->getProperties()->setCreator("Fundación Markoptic");
$objPHPExcel->getProperties()->setLastModifiedBy("Fundación Markoptic");
$objPHPExcel->getProperties()->setTitle("Reporte de solicitudes");
$objPHPExcel->getProperties()->setSubject("Reporte de solicitudes de beneficiarios");
$objPHPExcel->getProperties()->setDescription("Reporte con todos las solicitudes de los beneficiarios y sus respectivos datos");

$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle("Beneficiarios");

$objPHPExcel->getActiveSheet()->setCellValue('A9','FOLIO');
$objPHPExcel->getActiveSheet()->setCellValue('B9',"PETICIÓN");
//$objPHPExcel->getActiveSheet()->setCellValue('C1',"NIVEL DE AMPUTACIÓN");
//$objPHPExcel->getActiveSheet()->setCellValue('D1',"ESTATUS SOLICITUD");
$objPHPExcel->getActiveSheet()->setCellValue('C9',"¿POR QUE SOLICITÓ?");
$objPHPExcel->getActiveSheet()->setCellValue('D9',"MEDIO DE DIFUSIÓN");
$objPHPExcel->getActiveSheet()->setCellValue('E9',"DESCRIPCIÓN DEL MEDIO");
$objPHPExcel->getActiveSheet()->setCellValue('F9',"FECHA SOLICITUD");
$objPHPExcel->getActiveSheet()->setCellValue('G9','NOMBRE(S) BENEFICIARIO');
$objPHPExcel->getActiveSheet()->setCellValue('H9',"APELLIDO(S) BENEFICIARIO");
$objPHPExcel->getActiveSheet()->setCellValue('I9',"SEXO BENEFICIARIO");
$objPHPExcel->getActiveSheet()->setCellValue('J9',"FECHA DE NAC. BENEFICIARIO");
$objPHPExcel->getActiveSheet()->setCellValue('K9',"EDAD BENEFICIARIO");
$objPHPExcel->getActiveSheet()->setCellValue('L9',"DIRECCIÓN BENEFICIARIO");
$objPHPExcel->getActiveSheet()->setCellValue('M9',"COLONIA BENEFICIARIO");
$objPHPExcel->getActiveSheet()->setCellValue('N9',"CÓDIGO POSTAL BENEFICIARIO");
$objPHPExcel->getActiveSheet()->setCellValue('O9',"CIUDAD BENEFICIARIO");
$objPHPExcel->getActiveSheet()->setCellValue('P9',"ESTADO BENEFICIARIO");
$objPHPExcel->getActiveSheet()->setCellValue('Q9',"PAÍS BENEFICIARIO");
$objPHPExcel->getActiveSheet()->setCellValue('R9',"TELÉFONO BENEFICIARIO");
$objPHPExcel->getActiveSheet()->setCellValue('S9',"EMAIL BENEFICIARIO");
$objPHPExcel->getActiveSheet()->setCellValue('T9',"NOMBRE(S) TUTOR");
$objPHPExcel->getActiveSheet()->setCellValue('U9',"APELLIDO(S) TUTOR");
//$objPHPExcel->getActiveSheet()->setCellValue('X1',"FECHA DE NAC. TUTOR");
//$objPHPExcel->getActiveSheet()->setCellValue('Y1',"SEXO TUTOR");
//$objPHPExcel->getActiveSheet()->setCellValue('Z1',"VIVE CON EL BENEFICIARIO");
$objPHPExcel->getActiveSheet()->setCellValue('V9',"PARENTESCO CON EL BENEFICIARIO");
$objPHPExcel->getActiveSheet()->setCellValue('W9',"TELÉFONO TUTOR");
$objPHPExcel->getActiveSheet()->setCellValue('X9',"EMAIL TUTOR");

//total de dispositivos solicitados
$objBen->generaTotalSolicitudes($objPHPExcel);
$objBen->generaExcelSolicitudes($objPHPExcel);

//estilos
$estiloInformacion = new PHPExcel_Style();
$alignCenter = array(
    'alignment' =>  array(
        'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
);
$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size' =>10,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '538DD5')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
);

$arreglo = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC');
foreach($arreglo as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setWidth(35);
    $objPHPExcel->getActiveSheet()->getStyle($columnID."9")->applyFromArray($estiloTituloColumnas);
    $objPHPExcel->getActiveSheet()->getStyle($columnID)->applyFromArray($alignCenter);
}

// Rename sheet
//echo date('H:i:s') . " Rename sheet\n";
$objPHPExcel->getActiveSheet()->setTitle('Simple');

		
// Save Excel 2007 file
//echo date('H:i:s') . " Write to Excel2007 format\n";
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
ob_end_clean();
$objWriter->save('php://output');

// Echo done
//echo date('H:i:s') . " Done writing file.\r\n";

?>









