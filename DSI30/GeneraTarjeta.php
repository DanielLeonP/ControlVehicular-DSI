<?php
$Folio = $_GET['Folio'];

require('fpdf.php');
//Primero recuperamos los datos
include("FuncionesConexion.php");
$Con = Conectar();
$SQL = "SELECT t.TipoServicio, p.Nombre, p.RFC, p.Localidad, p.Municipio, v.Origen, v.Color, v.NumeroSerie, v.Marca, v.Linea, v.Sublinea, v.Cilindro, v.Capacidad, v.Puerta, v.Asiento, v.Combustible, v.Transmision, t.Folio, v.Placa, v.Modelo, t.FechaExp, t.OficinaExp, t.Movimiento, v.NumeroMotor, v.ClaveVehicular, v.Clase, v.Tipo, t.Uso
FROM Propietarios p, Tarjetas t, Vehiculos v
WHERE t.Folio = $Folio
AND p.idPropietario = t.idPropietario
AND t.idVehiculo = v.idVehiculo";
$Result =  Ejecutar($Con, $SQL);
$Fila =mysqli_fetch_row($Result);

$TipoServicio = $Fila[0];
$Nombre = $Fila[1];
$RFC = $Fila[2];
$Localidad = $Fila[3];
$Municipio = $Fila[4];
$Origen = $Fila[5];
$Color = $Fila[6];
$NumeroSerie = $Fila[7];
$Marca = $Fila[8];
$Linea = $Fila[9];
$Sublinea = $Fila[10];
$Cilindro = $Fila[11];
$Capacidad = $Fila[12];
$Puerta = $Fila[13];
$Asiento = $Fila[14];
$Combustible = $Fila[15];
$Transmision = $Fila[16];
$Folio = $Fila[17];
$Placa = $Fila[18];
$Modelo = $Fila[19];
$FechaExp = $Fila[20];
$OficinaExp = $Fila[21];
$Movimiento = $Fila[22];
$NumeroMotor = $Fila[23];
$ClaveVehicular = $Fila[24];
$Clase = $Fila[25];
$Tipo = $Fila[26];
$Uso = $Fila[27];

Cerrar($Con);

$pdf = new FPDF();
$pdf->AddPage();

$pdf->Image('Tarjeta.png',null,null,-140);



//Generar QR
$datos = implode(", ", $Fila);
include('GeneraQr.php');
GenerarQrCode($datos, "QrTarjeta.png");

$pdf->SetXY(40, 109);
$pdf->Image('QrTarjeta.png',55,103,27);






//TipoServicio
$pdf->SetXY(31, 45);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'TIPO DE SERVICIO',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(25,5,$TipoServicio,0,0,'L');

//Propietario
$pdf->SetXY(31, 54);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'PROPIETARIO',0,2,'L');
$pdf->SetXY(48, 54);
$pdf->SetFont('Arial','B',14);//cambio de letra
$pdf->Cell(60,5,$Nombre,0,0,'L');

//RFC
$pdf->SetXY(31, 65);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'RFC',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(40,5,$RFC,0,2,'L');

//lOCALIDAD
$pdf->SetXY(31, 75);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'LOCALIDAD',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(40,5,$Localidad,0,2,'L');

//MUNICIPIO
$pdf->SetXY(31, 85);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'MUNICIPIO',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(40,5,$Municipio,0,2,'L');

//NumeroConstancia
$pdf->SetXY(31, 95);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'NUMERO DE CONSTANCIA',0,2,'L');
$pdf->Cell(25,3,'DE INSCRIPCION (NCI)',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(40,5,' ',0,2,'L');


//ORIGEN
$pdf->SetXY(31, 109);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'ORIGEN',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(40,5,$Origen,0,0,'L');

//COLOR
$pdf->SetXY(31, 118);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'COLOR',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(40,5,$Color,0,2,'L');

//Holograma
$pdf->SetXY(93, 45);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'HOLOGRAMA',0,0,'L');

//FOLIO
$pdf->SetXY(118, 45);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'FOLIO',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(25,5,$Folio,0,2,'L');

//NUMERO SERIE
$pdf->SetXY(89, 65);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'NUMERO DE SERIE',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(25,5,$NumeroSerie,0,0,'L');

//MARCA/LINEA/SUBLINEA
$pdf->SetXY(89, 75);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'MARCA/LINEA/SUBLINEA',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(33,4,$Marca,0,2,'L');
$pdf->Cell(33,4,$Linea,0,2,'L');
$pdf->Cell(33,4,$Sublinea,0,2,'L');

//acilindraje/capacidad/puertas/asientos/combustible
$pdf->SetXY(89, 95);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(7,3.7,'CILINDRAJE',0,2,'L');
$pdf->Cell(7,3.7,'CAPACIDAD',0,2,'L');
$pdf->Cell(7,3.7,'PUERTAS',0,2,'L');
$pdf->Cell(7,3.7,'ASIENTOS',0,2,'L');
$pdf->Cell(7,3.7,'COMBUSTIBLE',0,2,'L');
$pdf->SetXY(109, 95);
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(7,3.7,$Cilindro,0,2,'L');
$pdf->Cell(7,3.7,$Capacidad,0,2,'L');
$pdf->Cell(7,3.7,$Puerta,0,2,'L');
$pdf->Cell(7,3.7,$Asiento,0,2,'L');
$pdf->Cell(7,3.7,$Combustible,0,2,'L');

//TRANSMISION
$pdf->SetXY(89, 114);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'TRANSMISION',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(33,4,$Transmision,0,2,'L');

//CLAVE VEHICULAR / CLASE / TIPO / USO / RFA
$pdf->SetXY(113.5, 95.5);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'CVE VEHICULAR',0,2,'L');

//CLASE / TIPO / USO / RFA
$pdf->SetXY(113.5, 102.5);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(7,3.7,'CLASE',0,2,'L');
$pdf->Cell(7,3.7,'TIPO',0,2,'L');
$pdf->Cell(7,3.7,'',0,2,'L');
$pdf->Cell(7,3.7,'USO',0,2,'L');
$pdf->Cell(7,3.7,'RFA',0,2,'L');

$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->SetXY(115, 98.5);
$pdf->Cell(7,3.7,$ClaveVehicular,0,2,'L');
$pdf->SetXY(124, 98.5);
$pdf->Cell(7,3.7,$Clase,0,2,'L');
$pdf->Cell(7,3.7,$Tipo,0,2,'L');
$pdf->Cell(7,3.7,' ',0,2,'L');
$pdf->Cell(7,3.7,$Uso,0,2,'L');
$pdf->Cell(7,3.7,' ',0,2,'L');

//PLACA
$pdf->SetXY(157, 45);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'PLACA',0,2,'L');
$pdf->SetFont('Arial','B',14);//cambio de letra
$pdf->Cell(38,5,$Modelo . "/: ". $Placa,0,0,'L');

//MODELO
$pdf->SetXY(148, 65);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'MODELO',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(25,5,$Modelo,0,0,'L');

//OPERACION
$pdf->SetXY(148, 75);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'OPERACION',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(25,5,' ',0,0,'L');

//FOLIO
$pdf->SetXY(148, 82);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'FOLIO',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(25,4,'A    124826544',0,2,'L');
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,$Folio,0,2,'L');

//FECHA EXP
$pdf->SetXY(148, 95.5);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'FECHA EXPEDICION',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(25,5,$FechaExp,0,0,'L');

//OFICINA EXP
$pdf->SetXY(148, 102.5);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'OFICINA EXPEDIDORA',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->SetXY(176, 101.5);
$pdf->Cell(25,5,$OficinaExp,0,0,'L');

//MOVIMIENTO
$pdf->SetXY(148, 106);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'MOVIMIENTO',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(25,5,$Movimiento,0,0,'L');

//NUMEROMOTOR
$pdf->SetXY(148, 114);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(25,3,'NUMERO DE MOTOR',0,2,'L');
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(25,5,$NumeroMotor,0,0,'L');

$pdf->Output();
?>