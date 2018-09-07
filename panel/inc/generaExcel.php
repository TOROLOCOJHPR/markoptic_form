<?php

    // require 'objetos.php';
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once ( $root.'/panel/inc/spreadsheet/vendor/autoload.php' );
    require_once ( $root.'/inc/objetos/excel.php');
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xls;

    //inicializar objetos 
    $objExcel = new GeneraExcel;

    $fechaActual = date("Y")."-".date("m")."-".date("d");
    $filename = "Reporte de solicitudes ".$fechaActual.".xls"; /*---- nombre final del archivo ----*/    
    $spreadsheet = new Spreadsheet();  /*----Spreadsheet object-----*/
    $Excel_writer = new Xls($spreadsheet);  /*----- Excel (Xls) Object*/

    $spreadsheet->setActiveSheetIndex(0);
    $activeSheet = $spreadsheet->getActiveSheet();

    //pasar objeto $activeSheet a objeto excel
    $objExcel->setActiveSheet($activeSheet);
    
    //añadir estilo a las celdas
    $objExcel->estiloCeldas();

    //crea los titulos de los datos
    $objExcel->creaExcelTitles();
    
    // crea el total de dispositivos solicitados
    $objExcel->creaExcelSolicitudes();
    
    // crea el total de estaus solicitud
    $objExcel->creaExcelEstatus();
    
    // crea los datos de las solicitantes
    $objExcel->creaExcelDatosSolicitudes();

    header('Content-Type: application/vnd.ms-excel');
    // header('Content-Disposition: attachment;filename="'. $filename .'.xls"'); /*-- $filename is  xsl filename ---*/
    header('Content-Disposition: attachment;filename="'.$filename.'"'); /*-- $filename is  xsl filename ---*/
    header('Cache-Control: max-age=0');
    ob_end_clean();
    $Excel_writer->save('php://output');