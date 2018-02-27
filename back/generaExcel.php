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

    $activeSheet->setCellValue('A9','FOLIO')->getStyle('A9')->getFont()->setBold(true);
    $activeSheet->setCellValue('B9',"PETICIÓN")->getStyle('B9')->getFont()->setBold(true);
    $activeSheet->setCellValue('C9',"¿POR QUE SOLICITÓ?")->getStyle('C9')->getFont()->setBold(true);
    $activeSheet->setCellValue('D9',"MEDIO DE DIFUSIÓN")->getStyle('D9')->getFont()->setBold(true);
    $activeSheet->setCellValue('E9',"DESCRIPCIÓN DEL MEDIO")->getStyle('E9')->getFont()->setBold(true);
    $activeSheet->setCellValue('F9',"FECHA SOLICITUD")->getStyle('F9')->getFont()->setBold(true);
    $activeSheet->setCellValue('G9','NOMBRE(S) BENEFICIARIO')->getStyle('G9')->getFont()->setBold(true);
    $activeSheet->setCellValue('H9',"APELLIDO(S) BENEFICIARIO")->getStyle('H9')->getFont()->setBold(true);
    $activeSheet->setCellValue('I9',"SEXO BENEFICIARIO")->getStyle('I9')->getFont()->setBold(true);
    $activeSheet->setCellValue('J9',"FECHA DE NAC. BENEFICIARIO")->getStyle('J9')->getFont()->setBold(true);
    $activeSheet->setCellValue('K9',"EDAD BENEFICIARIO")->getStyle('K9')->getFont()->setBold(true);
    $activeSheet->setCellValue('L9',"DIRECCIÓN BENEFICIARIO")->getStyle('L9')->getFont()->setBold(true);
    $activeSheet->setCellValue('M9',"COLONIA BENEFICIARIO")->getStyle('M9')->getFont()->setBold(true);
    $activeSheet->setCellValue('N9',"CÓDIGO POSTAL BENEFICIARIO")->getStyle('N9')->getFont()->setBold(true);
    $activeSheet->setCellValue('O9',"CIUDAD BENEFICIARIO")->getStyle('O9')->getFont()->setBold(true);
    $activeSheet->setCellValue('P9',"ESTADO BENEFICIARIO")->getStyle('P9')->getFont()->setBold(true);
    $activeSheet->setCellValue('Q9',"PAÍS BENEFICIARIO")->getStyle('Q9')->getFont()->setBold(true);
    $activeSheet->setCellValue('R9',"TELÉFONO BENEFICIARIO")->getStyle('R9')->getFont()->setBold(true);
    $activeSheet->setCellValue('S9',"EMAIL BENEFICIARIO")->getStyle('S9')->getFont()->setBold(true);
    $activeSheet->setCellValue('T9',"NOMBRE(S) TUTOR")->getStyle('T9')->getFont()->setBold(true);
    $activeSheet->setCellValue('U9',"APELLIDO(S) TUTOR")->getStyle('U9')->getFont()->setBold(true);
    $activeSheet->setCellValue('V9',"PARENTESCO CON EL BENEFICIARIO")->getStyle('V9')->getFont()->setBold(true);
    $activeSheet->setCellValue('W9',"TELÉFONO TUTOR")->getStyle('W9')->getFont()->setBold(true);
    $activeSheet->setCellValue('X9',"EMAIL TUTOR")->getStyle('X9')->getFont()->setBold(true);
    
    $arreglo = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X');
    foreach($arreglo as $columnID) {
        $activeSheet->getColumnDimension($columnID)->setWidth(35);
        $activeSheet->getStyle($columnID."9")->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $activeSheet->getStyle($columnID."9")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
       /* $activeSheet->getStyle($columnID)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $activeSheet->getStyle($columnID)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $activeSheet->getStyle($columnID)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
        $activeSheet->getStyle($columnID)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
      */$activeSheet->getStyle($columnID."9")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $activeSheet->getStyle($columnID."9")->getFill()->getStartColor()->setARGB('FF20afdf');
    }

    //total de dispositivos solicitados
    $objBen->generaTotalSolicitudes($activeSheet);
    $objBen->generaExcelSolicitudes($activeSheet);
  

    header('Content-Type: application/vnd.ms-excel');
    // header('Content-Disposition: attachment;filename="'. $filename .'.xls"'); /*-- $filename is  xsl filename ---*/
    header('Content-Disposition: attachment;filename="'.$filename.'"'); /*-- $filename is  xsl filename ---*/
    header('Cache-Control: max-age=0');
    ob_end_clean();
    $Excel_writer->save('php://output');
?>