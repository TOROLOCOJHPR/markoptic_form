<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once ($root.'/inc/objetos/conexion.php');
    require_once ($root.'/inc/objetos/solicitud.php');

    Class GeneraExcel{
        public $activeSheet;

        public function setActiveSheet($sActiveSheet){$this->activeSheet = $sActiveSheet;}

        //-- crea titulos de los datos
        public function creaExcelTitles(){
            //columnas de titulo de estadisticas
            $this->activeSheet->setCellValue('A1','Total Solicitudes');
            $this->activeSheet->setCellValue('C1','Estatus Solicitud');
    
            // columnas de titulo de datos de los beneficiarios
            $this->activeSheet->setCellValue('A9','FOLIO');
            $this->activeSheet->setCellValue('B9',"PETICIÓN");
            $this->activeSheet->setCellValue('C9','CONDICIÓN');
            $this->activeSheet->setCellValue('D9','ESTATUS');
            $this->activeSheet->setCellValue('E9',"¿POR QUE SOLICITÓ?");
            $this->activeSheet->setCellValue('F9',"MEDIO DE DIFUSIÓN");
            $this->activeSheet->setCellValue('G9',"DESCRIPCIÓN DEL MEDIO");
            $this->activeSheet->setCellValue('H9',"FECHA SOLICITUD");
            $this->activeSheet->setCellValue('I9','NOMBRE(S) BENEFICIARIO');
            $this->activeSheet->setCellValue('J9',"APELLIDO(S) BENEFICIARIO");
            $this->activeSheet->setCellValue('K9',"SEXO BENEFICIARIO");
            $this->activeSheet->setCellValue('L9',"FECHA DE NAC. BENEFICIARIO");
            $this->activeSheet->setCellValue('M9',"EDAD BENEFICIARIO");
            $this->activeSheet->setCellValue('N9',"DIRECCIÓN BENEFICIARIO");
            $this->activeSheet->setCellValue('O9',"COLONIA BENEFICIARIO");
            $this->activeSheet->setCellValue('P9',"CÓDIGO POSTAL BENEFICIARIO");
            $this->activeSheet->setCellValue('Q9',"CIUDAD BENEFICIARIO");
            $this->activeSheet->setCellValue('R9',"ESTADO BENEFICIARIO");
            $this->activeSheet->setCellValue('S9',"PAÍS BENEFICIARIO");
            $this->activeSheet->setCellValue('T9',"TELÉFONO BENEFICIARIO");
            $this->activeSheet->setCellValue('U9',"EMAIL BENEFICIARIO");
            $this->activeSheet->setCellValue('V9',"NOMBRE(S) TUTOR");
            $this->activeSheet->setCellValue('W9',"APELLIDO(S) TUTOR");
            $this->activeSheet->setCellValue('X9',"VIVE CON EL BENEFICIARIO");
            $this->activeSheet->setCellValue('Y9',"PARENTESCO CON EL BENEFICIARIO");
            $this->activeSheet->setCellValue('Z9',"TELÉFONO TUTOR");
            $this->activeSheet->setCellValue('AA9',"EMAIL TUTOR");
        }// crea titulos de los datos

        //-- crea total de solicitudes
        public function creaExcelSolicitudes(){
            $objSolicitud = new Solicitud;

            // valor de variables
            $total_solicitudes = $objSolicitud->muestraSolicitudes();
            $total_solicitudesPSD = $objSolicitud->muestraSolicitudesPSD();
            $total_solicitudesPSI = $objSolicitud->muestraSolicitudesPSI();
            $total_solicitudesCV = $objSolicitud->muestraSolicitudesCV();
            $total_solicitudesPID = $objSolicitud->muestraSolicitudesPID();
            $total_solicitudesPII = $objSolicitud->muestraSolicitudesPII();

            //crea campos excel y les agrega el valor del total de solicitudes
            $this->activeSheet->setCellValue('A2',"TOTAL SOLICITUDES");
            $this->activeSheet->setCellValue('B2', $total_solicitudes);
            $this->activeSheet->setCellValue('A3',"TOTAL PSD");
            $this->activeSheet->setCellValue('B3', $total_solicitudesPSD);
            $this->activeSheet->setCellValue('A4',"TOTAL PSI");
            $this->activeSheet->setCellValue('B4', $total_solicitudesPSI);
            $this->activeSheet->setCellValue('A5',"TOTAL CV");
            $this->activeSheet->setCellValue('B5', $total_solicitudesCV);
            $this->activeSheet->setCellValue('A6',"TOTAL PID");
            $this->activeSheet->setCellValue('B6', $total_solicitudesPID);
            $this->activeSheet->setCellValue('A7',"TOTAL PII");
            $this->activeSheet->setCellValue('B7', $total_solicitudesPII);
            for($i=2; $i<=8; $i++ ){
                $this->activeSheet->getStyle('B'.$i)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);                
            }
        }//-- crea totalde solicitudes

        //-- crea estatus de solicitudes
        public function creaExcelEstatus(){
            $objSolicitud = new Solicitud;

            $estatus = $objSolicitud->muestraSolicitudesEstatus();
            $fila = 2;
            foreach($estatus as $row){
                $this->activeSheet->setCellValue('C'.$fila , $row['estatus']);
                $this->activeSheet->setCellValue('D'.$fila , $row['total']);
                $this->activeSheet->getStyle('D'.$fila)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $fila = $fila + 1;
            }
        }//-- crea estatus solicitudes

        //-- crea los datos de los solicitantes
        public function creaExcelDatosSolicitudes(){
            $fila = 10;
            $objSolicitud = new Solicitud;

            $datos = $objSolicitud->muestraTodos();
            
            foreach($datos as $row){

                $viveConBen = ($row['viveConBen'] == 0) ? "no" : "si";
                
                $this->activeSheet->setCellValue( 'A'.$fila, $row['folio'] );
                $this->activeSheet->setCellValue( 'B'.$fila, $row['peticion'] );
                $this->activeSheet->setCellValue( 'C'.$fila, $row['condicion'] );
                $this->activeSheet->setCellValue( 'D'.$fila, $row['estatus'] );
                $this->activeSheet->setCellValue( 'E'.$fila, $row['porque'] );
                $this->activeSheet->setCellValue( 'F'.$fila, $row['medioDifusion'] );
                $this->activeSheet->setCellValue( 'G'.$fila, $row['descripcionMedioDifusion'] );
                $this->activeSheet->setCellValue( 'H'.$fila, $row['fechaSolicitud'] );
                $this->activeSheet->setCellValue( 'I'.$fila, $row['nombre'] );
                $this->activeSheet->setCellValue( 'J'.$fila, $row['apellido'] );
                $this->activeSheet->setCellValue( 'K'.$fila, $row['sexo'] );
                $this->activeSheet->setCellValue( 'L'.$fila, $row['nacimiento'] );
                $this->activeSheet->setCellValue( 'M'.$fila, $row['edad'] );
                $this->activeSheet->setCellValue( 'N'.$fila, $row['direccion'] );
                $this->activeSheet->setCellValue( 'O'.$fila, $row['colonia'] );
                $this->activeSheet->setCellValue( 'P'.$fila, $row['cp'] );
                $this->activeSheet->setCellValue( 'Q'.$fila, $row['ciudad'] );
                $this->activeSheet->setCellValue( 'R'.$fila, $row['estado'] );
                $this->activeSheet->setCellValue( 'S'.$fila, $row['pais'] );
                $this->activeSheet->setCellValue( 'T'.$fila, $row['telefono'] );
                $this->activeSheet->setCellValue( 'U'.$fila, $row['email'] );
                $this->activeSheet->setCellValue( 'V'.$fila, $row['tutNombre'] );
                $this->activeSheet->setCellValue( 'W'.$fila, $row['tutApellido'] );
                $this->activeSheet->setCellValue( 'X'.$fila, $viveConBen );
                $this->activeSheet->setCellValue( 'Y'.$fila, $row['tutParentesco'] );
                $this->activeSheet->setCellValue( 'Z'.$fila, $row['tutTelefono'] );
                $this->activeSheet->setCellValue( 'AA'.$fila, $row['tutEmail'] );
            
                $fila++;

            }//foreach 
            
        }//-- crea los datos de los solicitantes

        //-- añadir estilo a celdas
        public function estiloCeldas(){
            //establecer el tamaño de las columas 
            $arreglo = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA');
            foreach($arreglo as $columnID) {
                $this->activeSheet->getColumnDimension($columnID)->setWidth(35);
                $this->activeSheet->getStyle($columnID)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            }
            //establecer los estilos de las columnas de titulo 
            $arregloTitulo = array('A1','C1','A9','B9','C9','D9','E9','F9','G9','H9','I9','J9','K9','L9','M9','N9','O9','P9','Q9','R9','S9','T9','U9','V9','W9','X9','Y9','Z9','AA9');
            foreach($arregloTitulo as $titulo){
                $this->activeSheet->getStyle($titulo)->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
                $this->activeSheet->getStyle($titulo)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $this->activeSheet->getStyle($titulo)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $this->activeSheet->getStyle($titulo)->getFill()->getStartColor()->setARGB('FF20afdf');
                $this->activeSheet->getStyle($titulo)->getFont()->setBold(true);
            }
        }//-- añadir estilo a celdas

    }//class