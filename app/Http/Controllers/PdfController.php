<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class PdfController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function index($id)
    {
       /*  $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->AddPage("L", ['100', '100']);
        $this->fpdf->Text(10, 10, "Hello World!");

        $this->fpdf->Output();
 */
        

        $pdf = new FPDF($orientation = 'P', $unit = 'mm', array(45, 350));
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 8);    //Letra Arial, negrita (Bold), tam. 20
        $textypos = 5;
        $pdf->setY(2);
        $pdf->setX(2);
        $pdf->Cell(5, $textypos, "GEN");
        $pdf->SetFont('Arial', '', 5);    //Letra Arial, negrita (Bold), tam. 20
        $textypos += 6;
        $pdf->setX(2);
        $pdf->Cell(5, $textypos, '-----------------------------------------------------------------');
        $textypos += 6;
        $pdf->setX(2);
        $pdf->Cell(5, $textypos, 'UN   ARTICULO            PRECIO               TOTAL');

        $total = 0;
        $off = $textypos + 6;
       

        $ventaArts = Venta::join('venta__articulos', 'ventas.id', '=', 'venta__articulos.id_venta')
        ->join('articulos', 'venta__articulos.id_articulo', '=', 'articulos.id')
        ->where("ventas.id", "=", $id)
        ->select('venta__articulos.*', 'articulos.nombre')->get();

        $pdf->SetFont('Arial', '', 4);
        foreach($ventaArts as $item){
            $pdf->setX(2);
            $pdf->Cell(5, $off, $item->cantidad);
            $pdf->setX(6);
            $pdf->Cell(35, $off, strtoupper(substr($item->nombre, 0,12)) );
            $pdf->setX(20);
            //$pdf->Cell(11, $off,  "$" . number_format($item->precio , 2));
            $pdf->Cell(11, $off,  "$" . number_format($item->precio, 2, ".", ","), 0, 0, "R");
            $pdf->setX(32);
            $pdf->Cell(11, $off,  "$" . number_format($item->precio * $item->cantidad, 2, ".", ","), 0, 0, "R");

            $total += $item->precio * $item->cantidad;
            $off += 6;
        }

        
        $textypos = $off + 6;
        $pdf->SetFont('Arial', '', 5);
        $pdf->setX(2);
        $pdf->Cell(5, $textypos, "TOTAL: ");
        $pdf->setX(38);
        $pdf->Cell(5, $textypos, "$ " . number_format($total, 2, ".", ","), 0, 0, "R");

        $pdf->setX(2);
        $pdf->Cell(5, $textypos + 6, 'GRACIAS POR TU COMPRA ');

        $pdf->output();

        exit;
    }
}
