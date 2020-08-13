<?php
function numberTowords($num) {
        $ones = array(
                0 =>"ZERO",
                1 => "ONE",
                2 => "TWO",
                3 => "THREE",
                4 => "FOUR",
                5 => "FIVE",
                6 => "SIX",
                7 => "SEVEN",
                8 => "EIGHT",
                9 => "NINE",
                10 => "TEN",
                11 => "ELEVEN",
                12 => "TWELVE",
                13 => "THIRTEEN",
                14 => "FOURTEEN",
                15 => "FIFTEEN",
                16 => "SIXTEEN",
                17 => "SEVENTEEN",
                18 => "EIGHTEEN",
                19 => "NINETEEN",
                "014" => "FOURTEEN"
            );
            $tens = array( 
                0 => "ZERO",
                1 => "TEN",
                2 => "TWENTY",
                3 => "THIRTY", 
                4 => "FORTY", 
                5 => "FIFTY", 
                6 => "SIXTY", 
                7 => "SEVENTY", 
                8 => "EIGHTY", 
                9 => "NINETY" 
            ); 
            $hundreds = array( 
                "HUNDRED", 
                "THOUSAND", 
                "MILLION", 
                "BILLION", 
                "TRILLION", 
                "QUARDRILLION" 
            ); /*limit t quadrillion */
        $num = number_format($num,2,".",","); 
        $num_arr = explode(".",$num); 
        $wholenum = $num_arr[0]; 
        $decnum = $num_arr[1]; 
        $whole_arr = array_reverse(explode(",",$wholenum)); 
        krsort($whole_arr,1); 
        $rettxt = ""; 
        foreach($whole_arr as $key => $i){
            
        while(substr($i,0,1)=="0")
                $i=substr($i,1,5);
        if($i < 20){ 
        /* echo "getting:".$i; */
            $rettxt .= $ones[$i]; 
            }elseif($i < 100){ 
            if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
            if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
            }else{ 
            if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
            if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
            if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
            } 
            if($key > 0){ 
                $rettxt .= " ".$hundreds[$key]." "; 
            }
        } 
        if($decnum > 0){
            $rettxt .= " and ";
        if($decnum < 20){
            $rettxt .= $ones[$decnum];
        }elseif($decnum < 100){
            $rettxt .= $tens[substr($decnum,0,1)];
            $rettxt .= " ".$ones[substr($decnum,1,1)];
            }
        }
        return $rettxt;
}

tcpdf();

$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
// $title = "Order Invoice";
// $obj_pdf->SetTitle($title);
// $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->SetDefaultMonospacedFont('helvetica');
// $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// $obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$obj_pdf->AddPage();
$obj_pdf->setJPEGQuality(75);
ob_start();
if($user_detail['quality'] == 1){
    $quality = 'Yes';}else{
        $quality = 'No';
    }
    if($user_detail['backup'] == 1){
        $backup = 'Yes';}else{
        $backup = 'No';
        }
    if($user_detail['account'] == 1){
    $account = 'Yes';}else{
                $account = 'No';
            }

    if($user_detail['power'] == 1){
        $power = 'Yes';}else{
        $power = 'No';
            }
    if($user_detail['erase_content'] == 1){
      $erase_content = 'Yes';}else{
      $erase_content = 'No';
                }
    if($user_detail['sim_card'] == 1){
       $sim_card = 'Yes';}else{
        $sim_card = 'No';
                    }
$html = '<table style="width:100%;">
  <tr style="margin-top:0px;">
    <th style="text-align:center;">
                <span style="text-align:center;margin:0;font-weight:bold;font-size: 15px;">Hardware Report<br></span>
                <span style="text-align:center;margin:0;font-weight: bold;font-size: 10px;"></span><br>
    </th>
    </tr>
    <tr>
        <th style="border-top: 2px solid black;border-bottom: 2px solid black;font-size: 10px;text-align:center;font-weight:bold;">
            <center>HArdware Report</center>
        </th>
    </tr>

</table>
<table style="width:100%;border-top: 2px solid black;">
  <tr >
    <th width="50%"><h1 style="margin: 0;text-align: left;margin-left: 30px;"></h1></th>
    <th width="50%"><h1 style="margin: 0;text-align: left;"></h1></th>
</tr>
<tr style="font-size: 10px;">
    <td style="width: 50%;"><p style="margin: 0;margin-left: 30px;">
        Name:' . $user_detail['first_name'] . $user_detail['last_name'] . '<br>
        Email Id:' . $user_detail['email'] .'<br>
        Phone Number:' .$user_detail['phone'] . '<br></p></td>
    
</tr>
</table>
<style type="text/css">
    .tbl_brdr, .tbl_brdr th, .tbl_brdr td {
        border-right: 1px solid black;
        border-top: 1px solid black;
        border-collapse: collapse;
        font-size: 10px;
        padding: 10px;
    }
</style>
<div style="margin-left: 30px;">
<table style="width:100%;border: 2px solid black;" class="tbl_brdr">
<tr>
    <th>S.No.</th>
    <th>Testing</th>
    <th>Result</th>
</tr>
<tr>
    <td>1)</td>
    <td style="text-align: center;">Quality & Ownership</td>
    <td style="text-align: center;">'. $quality .'</td>
</tr>
<tr>
    <td>2)</td>
    <td style="text-align: center;">Backup</td>
    <td style="text-align: center;">'. $backup .'</td>
</tr>
<tr>
    <td>3)</td>
    <td style="text-align: center;">Account Deactivated</td>
    <td style="text-align: center;">'. $account .'</td>
</tr>
<tr>
    <td>4)</td>
    <td style="text-align: center;">Power Off</td>
    <td style="text-align: center;">'. $power .'</td>
</tr>
<tr>
    <td>5)</td>
    <td style="text-align: center;">Erase all content</td>
    <td style="text-align: center;">'. $erase_content .'</td>
</tr>
<tr>
    <td>6)</td>
    <td style="text-align: center;">SIM card Remove</td>
    <td style="text-align: center;">'. $sim_card .'</td>
</tr>



<tr >
    <td colspan="6" style="text-align: left; border-bottom: 2px solid black;">@Teksmart.com</td>
</tr>



</table>
</div>
';
ob_end_clean();
$obj_pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$obj_pdf->Output('test.pdf', 'I');