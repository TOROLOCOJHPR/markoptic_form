<?php 
    require 'objetos.php';
    require_once ( 'spreadsheet/vendor/autoload.php' );
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xls;

    $fechaActual = date("Y")."-".date("m")."-".date("d");
    $filename = "Reporte de solicitudes ".$fechaActual.".xls"; /*---- nombre final del archivo ----*/    
    $spreadsheet = new Spreadsheet();  /*----Spreadsheet object-----*/
    $Excel_writer = new Xls($spreadsheet);  /*----- Excel (Xls) Object*/

    $spreadsheet->setActiveSheetIndex(0);
    $activeSheet = $spreadsheet->getActiveSheet();
    $objBen = new Beneficiario;

    //columnas de titulo de estadisticas
    $activeSheet->setCellValue('A1','Total Solicitudes');
    $activeSheet->setCellValue('C1','Estatus Solicitud');
    
    // columnas de titulo de datos de los beneficiarios
    $activeSheet->setCellValue('A9','FOLIO');
    $activeSheet->setCellValue('B9',"PETICIÓN");
    $activeSheet->setCellValue('C9','ESTATUS');
    $activeSheet->setCellValue('D9',"¿POR QUE SOLICITÓ?");
    $activeSheet->setCellValue('E9',"MEDIO DE DIFUSIÓN");
    $activeSheet->setCellValue('F9',"DESCRIPCIÓN DEL MEDIO");
    $activeSheet->setCellValue('G9',"FECHA SOLICITUD");
    $activeSheet->setCellValue('H9','NOMBRE(S) BENEFICIARIO');
    $activeSheet->setCellValue('I9',"APELLIDO(S) BENEFICIARIO");
    $activeSheet->setCellValue('J9',"SEXO BENEFICIARIO");
    $activeSheet->setCellValue('K9',"FECHA DE NAC. BENEFICIARIO");
    $activeSheet->setCellValue('L9',"EDAD BENEFICIARIO");
    $activeSheet->setCellValue('M9',"DIRECCIÓN BENEFICIARIO");
    $activeSheet->setCellValue('N9',"COLONIA BENEFICIARIO");
    $activeSheet->setCellValue('O9',"CÓDIGO POSTAL BENEFICIARIO");
    $activeSheet->setCellValue('P9',"CIUDAD BENEFICIARIO");
    $activeSheet->setCellValue('Q9',"ESTADO BENEFICIARIO");
    $activeSheet->setCellValue('R9',"PAÍS BENEFICIARIO");
    $activeSheet->setCellValue('S9',"TELÉFONO BENEFICIARIO");
    $activeSheet->setCellValue('T9',"EMAIL BENEFICIARIO");
    $activeSheet->setCellValue('U9',"NOMBRE(S) TUTOR");
    $activeSheet->setCellValue('V9',"APELLIDO(S) TUTOR");
    $activeSheet->setCellValue('W9',"PARENTESCO CON EL BENEFICIARIO");
    $activeSheet->setCellValue('X9',"TELÉFONO TUTOR");
    $activeSheet->setCellValue('Y9',"EMAIL TUTOR");
    
    //establecer el tamaño de las columas 
    $arreglo = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y');
    foreach($arreglo as $columnID) {
        $activeSheet->getColumnDimension($columnID)->setWidth(35);
        $activeSheet->getStyle($columnID)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
       /* $activeSheet->getStyle($columnID)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $activeSheet->getStyle($columnID)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $activeSheet->getStyle($columnID)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $activeSheet->getStyle($columnID)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);*/
    }
    //establecer los estilos de las columnas de titulo 
    $arregloTitulo = array('A9','B9','C9','D9','E9','F9','G9','H9','I9','J9','K9','L9','M9','N9','O9','P9','Q9','R9','S9','T9','U9','V9','W9','X9','Y9','A1','C1');
    foreach($arregloTitulo as $titulo){
        $activeSheet->getStyle($titulo)->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $activeSheet->getStyle($titulo)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $activeSheet->getStyle($titulo)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $activeSheet->getStyle($titulo)->getFill()->getStartColor()->setARGB('FF20afdf');
        $activeSheet->getStyle($titulo)->getFont()->setBold(true);
    }
    //total de dispositivos solicitados
    $objBen->generaTotalSolicitudes($activeSheet);
    //total de estaus solicitud
    $objBen->generaEstatusSolicitudes($activeSheet);
    //datos de las solicitudes
    $objBen->generaExcelSolicitudes($activeSheet);
  

    header('Content-Type: application/vnd.ms-excel');
    // header('Content-Disposition: attachment;filename="'. $filename .'.xls"'); /*-- $filename is  xsl filename ---*/
    header('Content-Disposition: attachment;filename="'.$filename.'"'); /*-- $filename is  xsl filename ---*/
    header('Cache-Control: max-age=0');
    ob_end_clean();
    $Excel_writer->save('php://output');
?>