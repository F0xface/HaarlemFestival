<?php
require_once('fpdf.php');
session_start();
if (isset($_SESSION['cart'])) {
    if (isset($_SESSION['betaald'])){
        if ($_SESSION['betaald'] == 1){
            $pdf = new FPDF();
            foreach ($_SESSION['cart'] as $cart) {
                $event = $cart['event'];
                //$email = $_SESSION['email'];
                $amount = $cart['amount'];
                $date = $cart['date'];
                $time = $cart['time'];
                $price = $cart['price'];

                ini_set('zlib.output_compression', 1);
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);

                $pdf->AddPage();
                $pdf->SetFont("Arial", 'B', 28);
                $pdf->Image('../../img/haarlem-logo.png', 6, 6, 40, 27, 'png');
                $pdf->SetXY(75, 20);
                $pdf->Cell(null, null, "Haarlem Festival");

                $pdf->Rect(10, 40, 190, 60);

                $pdf->SetFont("Arial", 'B', 18);
                $pdf->SetXY(15, 50);
                $pdf->Cell(null, null, $event);

                $pdf->SetFont("Arial", 'B', 12);
                $pdf->SetXY(15, 60);
                $pdf->Cell(null, null, "Email:");
                $pdf->SetFont("Arial", null, 12);
                $pdf->SetXY(28, 60);
                $pdf->Cell(null, null, "example@example.com");

                $pdf->SetFont("Arial", 'B', 12);
                $pdf->SetXY(15, 65);
                $pdf->Cell(null, null, "Amount:");
                $pdf->SetFont("Arial", null, 12);
                $pdf->SetXY(33, 65);
                $pdf->Cell(null, null, $amount);

                $pdf->SetFont("Arial", 'B', 12);
                $pdf->SetXY(15, 75);
                $pdf->Cell(null, null, "Date:");
                $pdf->SetFont("Arial", null, 12);
                $pdf->SetXY(27, 75);
                $pdf->Cell(null, null, $date);

                $pdf->SetFont("Arial", 'B', 12);
                $pdf->SetXY(15, 80);
                $pdf->Cell(null, null, "Time:");
                $pdf->SetFont("Arial", null, 12);
                $pdf->SetXY(27, 80);
                $pdf->Cell(null, null, $time);

                $pdf->SetFont("Arial", 'B', 12);
                $pdf->SetXY(15, 90);
                $pdf->Cell(null, null, "Price:");
                $pdf->SetFont("Arial", null, 12);
                $pdf->SetXY(28, 90);
                $pdf->Cell(null, null, $price);

                $pdf->Image('../../img/Shopping_Cart/qr.png', 160, 45, 30, 30, 'png');

                $pdf->Image('../../img/Sponsors/Jopen.png', 15, 110, 30, 30, 'png');
                $pdf->Image('../../img/Sponsors/Jopen.png', 45, 110, 30, 30, 'png');
                $pdf->Image('../../img/Sponsors/Jopen.png', 75, 110, 30, 30, 'png');
                $pdf->Image('../../img/Sponsors/Jopen.png', 105, 110, 30, 30, 'png');
                $pdf->Image('../../img/Sponsors/Jopen.png', 135, 110, 30, 30, 'png');
                $pdf->Image('../../img/Sponsors/Jopen.png', 165, 110, 30, 30, 'png');

            }
            //$pdf->Output();
            return $pdf->Output('S','hfticket.pdf');
            //session_destroy();
        }
        else{
            header("Location: ../index.php");
        }
    }
    else{
        header("Location: ../index.php");
    }
}
else{
    header("Location: ../index.php");
}
?>