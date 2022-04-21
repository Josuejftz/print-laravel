<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\CupsPrintConnector;

use Mike42\Escpos\EscposImage;//uso  de imagenes

use Mike42\Escpos\Printer;

class StartController extends Controller
{
    public function index(){

        print_r("Generando impresion por red en ubuntu");

        
        $nombreImpresora = "generic";
        //en windows trabajamos  con : WindowsPrintConnector
        //en linux  trabajamos con: CupsPrintConnector

        try {
            $connector = new CupsPrintConnector($nombreImpresora);
            $impresora = new Printer($connector);
            $impresora->setJustification(Printer::JUSTIFY_CENTER);
            $impresora->setTextSize(1, 1);

            $impresora->setEmphasis(2);
            $impresora->text("tipo de transaccion:");
            $impresora->text("MOVILIDAD\n");
    
            $impresora->setJustification(Printer::JUSTIFY_CENTER);
            $impresora->text("\n==============================================\n");
            
            // $img = EscposImage::load("img/logo.png");
            $tux = EscposImage::load("img/logo.png");
            $impresora->bitImage($tux);
            $impresora -> feed();
    
            
            $impresora -> setJustification(Printer::JUSTIFY_CENTER);
            $impresora -> text("Right\n");
            $impresora -> bitImageColumnFormat($tux);
            
            $impresora -> feed();
            // $impresora -> graphics($img);


            //pruebas de otras cosas
         /* Barcodes - see barcode.php for more detail */
            $impresora->setBarcodeHeight(80);
            $impresora->setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);
            $impresora->barcode("9876");
            $impresora->feed();


            /// subrayar
            for ($i = 0; $i < 3; $i++) {
                $impresora->setUnderline($i);
                $impresora->text("The quick brown fox jumps over the lazy dog\n");
            }
            $impresora->setUnderline(0);

            //emfasis o  negrita 
            for ($i = 0; $i < 2; $i++) {
                $impresora->setEmphasis($i == 1);
                $impresora->text("The quick brown fox jumps over the lazy dog\n");
            }
            $impresora->setEmphasis(false);

            //pruebas de otras cosas
            
            $impresora->text("ticket\n");
            $impresora->text("desde\n");
            $impresora->text("Laravel\n");
            $impresora->setTextSize(1, 1);
            $impresora->text("https://parzibyte.me");
            $impresora->feed(1);
            $impresora->cut();
            $impresora->close();
           
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
        }
        return "";
    }

    public function form_mobility(Request $request){
        $nombreImpresora = "generic";
        //en windows trabajamos  con : WindowsPrintConnector
        //en linux  trabajamos con: CupsPrintConnector

        try {
            $connector = new CupsPrintConnector($nombreImpresora);
            $impresora = new Printer($connector);
            
            //fecha  de hoy
            setlocale(LC_TIME, 'Spanish_Peru'); 
            $hoy = date("F j, Y, g:i a");;
            $impresora->setJustification(Printer::JUSTIFY_RIGHT);
            $impresora->text($hoy. "\n");

            $img = EscposImage::load("img/logo.png");
            $impresora -> setJustification(Printer::JUSTIFY_CENTER);
            $impresora -> bitImageColumnFormat($img);

            $impresora->setTextSize(1, 1);

            $impresora -> setJustification(Printer::JUSTIFY_CENTER);
            $impresora->setEmphasis(2);
            $impresora->text("tipo de transaccion:");
            $impresora->text("MOVILIDAD\n");
            
            $impresora->setJustification(Printer::JUSTIFY_CENTER);
            $impresora->text("\n==============================================\n");

            $impresora -> setJustification(Printer::JUSTIFY_LEFT);
            $impresora->setEmphasis(true);
            $impresora -> text("Nombre:\n");
            $impresora->setEmphasis(false);
            //$impresora -> setJustification(Printer::JUSTIFY_RIGHT);
            $impresora -> text($request->name. "\n") ;

            $impresora -> setJustification(Printer::JUSTIFY_LEFT);
            $impresora->setEmphasis(true);
            $impresora -> text("Monto:\n");
            $impresora->setEmphasis(false);
            //$impresora -> setJustification(Printer::JUSTIFY_RIGHT);
            $impresora -> text('s/'.$request->amount . "\n");

            $impresora -> setJustification(Printer::JUSTIFY_LEFT);
            $impresora->setEmphasis(true);
            $impresora -> text("Concepto:\n");
            $impresora->setEmphasis(false);
            //$impresora -> setJustification(Printer::JUSTIFY_RIGHT);
            $impresora -> text($request->concept . "\n");

            $impresora->feed(2);
            $impresora->text("\n______________                 ______________\n");
            $impresora->text("\n  AUTORIZA                      RECIBIDO\n");

            $impresora->feed(1);
            $impresora->cut();
            $impresora->close();
           
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
        }
        return $request;
    }
    
}
