  <script language="javascript"> 
mydate = new Date(); 
myday = mydate.getDay(); 
mymonth = mydate.getMonth(); 
myweekday= mydate.getDate(); 
weekday= myweekday+3; 
     

if(myday == 0) 
day = " Domingo " 

else if(myday == 1) 
day = " Lunes " 

else if(myday == 2) 
day = " Martes " 

else if(myday == 3) 
day = " Miércoles " 

else if(myday == 4) 
day = " Jueves " 

else if(myday == 5) 
day = " Viernes " 

else if(myday == 6) 
day = " Sábado " 

if(mymonth == 0) 
month = "Enero " 

else if(mymonth ==1) 
month = "Febrero " 

else if(mymonth ==2) 
month = "Marzo " 

else if(mymonth ==3) 
month = "Abril " 

else if(mymonth ==4) 
month = "Mayo " 

else if(mymonth ==5) 
month = "Junio " 

else if(mymonth ==6) 
month = "Julio " 

else if(mymonth ==7) 
month = "Agosto " 

else if(mymonth ==8) 
month = "Setiembre " 

else if(mymonth ==9) 
month = "Octubre " 

else if(mymonth ==10) 
month = "Noviembre " 

else if(mymonth ==11) 
month = "Diciembre " 
</script> 
<?php
  session_start();         
      $id= $_SESSION ["usera"];
       $link = new mysqli("localhost","root","","bdd");
         $fecha_actual=date("Y/m/d");  
$departamento=$_REQUEST['departamentos'];
$direccion=$_POST['direccion'];


$tot=0;
$total=0;
$tot1=0;
$factpdf=0;


  function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
                     }
 
                 $factura = generarCodigo(6);
                 $factpdf = $factura;

     $resss = mysqli_query($link, "UPDATE compras SET factura= '$factura' WHERE id_usuario= '$id' and factura = '' ");
    
    $re="select * from compras where id_usuario =  '$id' " ;
                   $ree=$link ->query($re);
		     while($t=$ree->fetch_assoc() ) {
                
                 $id_cat = $t['id_cat'];
                        $id_compra= $t['id_compra'];
                        $id_user = $_SESSION ['usera'];
                        $id_pro = $t['id_producto'];
                        $produc =  $t['producto'];
                        $precio =  $t['precio'];
                        $imagen =  $t['imagen'];
                        $id_cat = $t['id_cat'];
                        $cant = $t['cantidad'];
                        $fact = $t['factura'];
                         
    $res = mysqli_query($link,"insert into ventas values ('','$id_compra','$id_pro','$id_user','$produc','$cant','$precio','$imagen','$id_cat','$fact','','$fecha_actual' )"); 
                 $tot1= $precio * $cant;
                       $tot +=  $tot1;
                           $total= $tot;
                 
             }

require('../html/administracion/facturas/fpdf.php');
ob_clean();

class PDF extends FPDF
{
// Cabecera de página
function Header()
{

    
    // Logo
    $this->Image('../html/administracion/php/img/logohomarket.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(80,10,'Duplicado: Cliente',0,1,'C');
    // Salto de línea
    $this->Ln(30);    


}

// Pie de página
function Footer()
{
    

    $fecha_actual=date("Y/m/d");
    // Posición: a 1,5 cm del final
    $this->SetY(-50);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Fecha de venta: '.$fecha_actual,1,1,'c');
    $this->Cell(0,10,utf8_decode('Paseo Gral. Escalón 3700, San Salvador,+503 2265 6360'),1,1,'c');
    

}
}

$pdf = new PDF();
$pdf ->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(170, 171, 170);
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,10,'Codigo de Factura',1,0,'c');
$pdf->Cell(100,10,$factpdf,1,1,'c');
$pdf->Cell(40,10,'Departamento',1,0,'c');
$pdf->Cell(100,10,$departamento,1,1,'c');
$pdf->Cell(40,10,utf8_decode('Dirección'),1,0,'c');
$pdf->Cell(100,10,$direccion,1,1,'c');
$pdf->Ln(5);
     $link = new mysqli("localhost","root","","bdd");
    $ree="SELECT * from user where id='$id'" ;
                   $reee=$link ->query($ree);
 while($t=$reee->fetch_assoc() ) {
                
                 $nombreu = $t['nombre'];
                        $correo= $t['email'];
     
     $pdf->Cell(70,10,'Usuario:', 1,0 , 'c', 1);
     $pdf->Cell(70,10,$nombreu, 1, 1, 'c', 0);
     $pdf->Cell(70,10,'Correo:', 1,0 , 'c', 1);
     $pdf->Cell(70,10,$correo, 1, 1, 'c', 0);
}

$pdf->Ln(10);
$pdf->SetFont('Arial','B',14);

$pdf->Cell(90,10,'Producto', 1, 0, 'c', 1);
$pdf->Cell(30,10,'Precio/U', 1, 0, 'c', 1);
$pdf->Cell(40,10,'Unidades', 1, 1, 'c', 1);
$pdf->SetFont('Arial','',12);


       $link = new mysqli("localhost","root","","bdd");
    $re="select * from compras where id_usuario =  '$id' " ;
                   $ree=$link ->query($re);
 while($t=$ree->fetch_assoc() ) {
                
                 $id_cat = $t['id_cat'];
                        $id_compra= $t['id_compra'];
                        $id_user = $_SESSION ['usera'];
                        $id_pro = $t['id_producto'];
                        $produc =  $t['producto'];
                        $precio =  $t['precio'];
                        $imagen =  $t['imagen'];
                        $id_cat = $t['id_cat'];
                        $cant = $t['cantidad'];
                        $fact = $t['factura'];
$pdf->Cell(90,20,$produc, 1, 0, 'c', 0);
$pdf->Cell(40,20,'$'.$precio, 1, 0, 'c', 0);
$pdf->Cell(50,20,$cant, 1, 1, 'c', 0);
}
$pdf->Cell(180,10,' ', 1, 1, 'c', 0);
$pdf->Cell(45,30,'Entregado por:', 1, 0, 'c', 0);
$pdf->Cell(45,30,'Recibido por:', 1, 0, 'c', 0);
$pdf->Cell(45,10,'Total', 1,0 , 'c', 1);
$pdf->Cell(45,10,'$'.$total, 1, 0, 'c', 0);
$d=rand(1,4);
$pdf->Image('../html/administracion/php/barras/'.$d.'.png',160,30,33);



$pdf->Output('D');


 $del = mysqli_query($link,"delete from compras where id_usuario='$id'");


     

?>


