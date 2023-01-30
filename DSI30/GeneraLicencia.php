<?php

$IdLicencia = $_GET['IdLicencia'];

//Primero recuperamos los datos
include("FuncionesConexion.php");
$Con = Conectar();
$SQL = "SELECT l.Numero, l.Tipo, c.Nombre, c.FechaNacimiento, l.FechaExp, l.FechaVencimiento, c.Antiguedad, c.Observacion, c.Restricciones, c.TipoSangre, c.Donador, c.TelefonoEmergencia, c.Domicilio
FROM Licencias l, Conductores c
WHERE l.Numero = $IdLicencia 
AND l.idConductor = c.idConductor";
$Result =  Ejecutar($Con, $SQL);
$Fila =mysqli_fetch_row($Result);

$Numero = $Fila[0];
$Tipo = $Fila[1];
$Nombre = $Fila[2];
$FechaNacimiento = $Fila[3];
$FechaExp = $Fila[4];
$FechaVencimiento = $Fila[5];
$Antiguedad = $Fila[6];
$Observacion = $Fila[7];
$Restricciones = $Fila[8];
$TipoSangre = $Fila[9];
$Donador = $Fila[10];
$TelefonoEmergencia = $Fila[11];
$Domicilio = $Fila[12];

Cerrar($Con);

require('fpdf.php');

$pdf = new FPDF('P','cm',array(10,5.5));
$pdf->AddPage();
$pdf->SetXY(0, 0);
$pdf->Image('Licencia.png',0,0,5.5);


//Generar QR
$datos = implode(", ", $Fila);
include('GeneraQr.php');
GenerarQrCode($datos, "QrLicencia.png");






//No. Licencia
$pdf->SetXY(2.6, 2.3);
$pdf->SetFont('Arial','B',5);//cambio de letra
$pdf->Cell(1.2,0.3,'No. Licencia',0,2,'R');
$pdf->SetFont('Arial','B',9);//cambio de letra
$pdf->Cell(1.2,0.3,$Numero,0,2,'R');
//Tipo
$pdf->SetFont('Arial','B',8);//cambio de letra
$pdf->Cell(1.2,0.3,$Tipo,0,2,'R');
//Nombre
$pdf->SetXY(4, 3.3);
$pdf->SetFont('Arial','B',6);//cambio de letra
$pdf->Cell(1.2,0.3,'Nombre',0,2,'R');
$pdf->SetFont('Arial','B',13);//cambio de letra
$pdf->Cell(1.2,0.4,$Nombre,0,0,'R');
//Observaciones
$pdf->SetXY(4, 4);
$pdf->SetFont('Arial','B',5);//cambio de letra
$pdf->Cell(1.2,0.3,'Observaciones',0,2,'R');
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(1.2,0.2,$Observacion,0,0,'R');
//FechaNacimiento
$pdf->SetXY(0.4, 4.1);
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(3,0.3,'Fecha de Nacimiento',0,2,'L');
$pdf->SetFont('Arial','B',8);//cambio de letra
$pdf->Cell(2,0.3,$FechaNacimiento,0,2,'L');
//Fecha de Expedicion
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(3,0.3,'Fecha de Expedicion',0,2,'L');
$pdf->SetFont('Arial','B',8);//cambio de letra
$pdf->Cell(2,0.3,$FechaExp,0,2,'L');
//Valida hasta
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(3,0.3,'Valida Hasta',0,2,'L');
$pdf->SetFont('Arial','B',8);//cambio de letra
$pdf->Cell(2,0.3,$FechaVencimiento,0,2,'L');
//Antiguedad
$pdf->SetFont('Arial','B',7);//cambio de letra
$pdf->Cell(3,0.3,'Antiguedad',0,2,'L');
$pdf->SetFont('Arial','B',8);//cambio de letra
$pdf->Cell(2,0.3,$Antiguedad,0,2,'L');
//Tipo
$pdf->SetXY(0.4, 7.6);
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(0.6,0.3,$Tipo[0],0,0,'C');

$pdf->AddPage();
$pdf->SetXY(0, 0);
$pdf->Image('LicenciaTrasera.png',0,0,5.5);

$pdf->SetXY(0.4, 2.5);
$pdf->Image('QrLicencia.png',0.4,3.1,2);


//Restricciones
$pdf->SetXY(0.4, 2.5);
$pdf->SetFont('Arial','B',6);//cambio de letra
$pdf->Cell(3,0.3,'Restricciones',0,2,'L');
$pdf->SetFont('Arial','B',8);//cambio de letra
$pdf->Cell(2,0.3,$Restricciones,0,0,'L');
//Folio
$pdf->SetXY(1.75, 0.25);
$pdf->SetFont('Arial','B',10);//cambio de letra
$pdf->Cell(2,0.3,$Numero,0,0,'C');
//Domicilio
$pdf->SetXY(4, 1);
$pdf->SetFont('Arial','B',6);//cambio de letra
$pdf->Cell(1.2,0.3,'Domicilio',0,2,'R');
$pdf->SetFont('Arial','B',8);//cambio de letra
$pdf->Cell(1.2,0.3,$Domicilio,0,0,'R');
//Tipo Sangre
$pdf->SetXY(4, 2.5);
$pdf->SetFont('Arial','B',6);//cambio de letra
$pdf->Cell(1.2,0.3,'Grupo Sanguineo',0,2,'R');
$pdf->SetFont('Arial','B',8);//cambio de letra
$pdf->Cell(1.2,0.3,$TipoSangre,0,2,'R');
//Donador
$pdf->SetFont('Arial','B',6);//cambio de letra
$pdf->Cell(1.2,0.3,'Donador',0,2,'R');
$pdf->SetFont('Arial','B',8);//cambio de letra
$pdf->Cell(1.2,0.3,$Donador,0,2,'R');
//NumeroTelefono
$pdf->SetFont('Arial','B',6);//cambio de letra
$pdf->Cell(1.2,0.3,'Numero de Telefono',0,2,'R');
$pdf->SetFont('Arial','B',8);//cambio de letra
$pdf->Cell(1.2,0.3,$TelefonoEmergencia,0,2,'R');
//Expedidor
$pdf->SetXY(4, 5.25);
$pdf->SetFont('Arial','B',4);
$pdf->Cell(1.2,0.2,'M. EN A.P. JUAN MARCOS GRANADOS TORRES',0,2,'R');
$pdf->Cell(1.2,0.3,'M. EN A.P. SECRETARIO DE SEGURIDAD CIUDADANA',0,0,'R');

//Crear carpeta archivosPDF en caso de no existir
$path = 'C:\xampp\htdocs\DSI30\archivosPDF';
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}

//$pdf->Output('F', 'C:\xampp\htdocs\DSI30\archivosPDF\Licencia'.$Nombre.'.pdf');//Guardar en carpeta archivosPDF
$pdf->Output();//Mostrar en Navegador
?>