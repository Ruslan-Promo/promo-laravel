<?php
namespace App\Services;

use App\Contracts\PromoPdfServiceInterface;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
//require_once base_path('vendor/tecnickcom/tcpdf/tcpdf.php');

use TCPDF;

class PromoPdfService implements PromoPdfServiceInterface
{
    public function generate(Order $order)
    {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor(env('APP_SITENAME'));
        $title = __('Страховой полис №').$order->id;
        $pdf->SetTitle($title);
        $pdf->SetSubject($title);
        $pdf->SetKeywords('Policy, Osago, soglasie');

        // set default header data
        $pdf->SetHeaderData(false);
        $pdf->setFooterData(false);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // ---------------------------------------------------------

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 14, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        // set text shadow effect
        $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

        // Set some content to print
        $html = '<h1>Полис №'.$order->id.'</h1>
        <p>Страховитель <b>'.$order->customer->surname.' '.$order->customer->name.' '.$order->customer->patronymic.'</b></p>';

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------
        $filename = storage_path().'/policy_'.$order->id.'.pdf';
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output($filename, 'F');

        return $filename;
    }
}
