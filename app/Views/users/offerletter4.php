<html xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns:m='http://schemas.microsoft.com/office/2004/12/omml' xmlns='http://www.w3.org/TR/REC-html40'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=Windows-1252'>
    <title></title>
    <!--[if gte mso 9]>
    <xml>
    <w:WordDocument>
    <w:View>Print<w:Zoom>100<w:DoNotOptimizeForBrowser/>
    </w:WordDocument>
    </xml>
    <![endif]-->
    <style>
    @page
    {
        font-family: Arial;
        size:215.9mm 279.4mm;  /* A4 */
        margin:14.2mm 17.5mm 14.2mm 16mm; /* Margins: 2.5 cm on each side */
    }
    h2 { font-family: Arial; font-size: 18px; text-align:center; }
    p.para {font-family: Arial; font-size: 13.5px; text-align: justify;}
    ul li{
        padding: 0 0 5px 0;
    }
    </style>
</head>
<body>
    <div style='width:100%;'>
        <table style='width:100%;'>
            <tr>
                <td><img src='<?=$letterhead;?>' width='100%' /></td>
            </tr>
        </table>
    </div>
    
    <div style='width:100%;'>
        <table style='width:100%;'>
            <tr>
                <td><strong style='text-align: left;'>Ref. No.: <?=$offerCode;?></strong></td>
                <td align='right'><strong style='text-align: right;'>Date: <?=date('d/m/Y');?></strong></td>
            </tr>
        </table>
    </div>
    <br>
    <table>
        <tr>
            <td><strong>Name</strong></td>
            <td><strong>:</td>
            <td><strong> <?=$applicantName;?></strong></td>
        </tr>
        <tr>
            <td><strong>Passport No.</strong></td>
            <td><strong>:</td>
            <td><strong> <?=$passport;?></strong></td>
        </tr>
        <tr>
            <td><strong>Nationality</strong></td>
            <td><strong>:</td>
            <td><strong> <?=ucfirst($nationality);?></strong></td>
        </tr>
    </table>
    <br>
    <br>
    <center><strong><u>OFFER LETTER</u></strong></center>
    <br>
    <br>
    <strong>Dear <?=$genderTitle;?> <?=$applicantName;?>;</strong><br>
    <p style="text-align: justify; margin-top:0px; margin-bottom:0px;">We are pleased to make you a formal offer of employment with <strong><?=$companyName;?></strong> , on the following terms and conditions:</p>


    <ul style='list-style: decimal;margin-top:0px;'>
        <li><p style="text-align: left; margin-bottom:0px; "><strong><u>Position &amp; Duties:</u></strong></p>
            <p style="text-align: justify; margin-top:0px; ">You shall carry out duties in the position of <strong>&#34;<?=$roleName;?>&#34; </strong>or in such other capacity as the Company may direct for <strong>&#34;<?=$companyName;?>&#34;</strong> and / or any of their associated companies.</p></li>
        <li style="margin-bottom:0;"><strong style="margin-bottom:0px;" ><u>Working Days / Hours:</u></strong>
        <p style="text-align: justify; margin-top:0px;">Six Days a week, the minimum working hours shall be 09 hours a day, excluding breaks.</p></li>
        <li style="margin-bottom:0;"><strong style="margin-bottom:0px;"><u>Place of Work:</u></strong>
        <p style="text-align: justify; margin-top:0px;">Although your place of operations is Dubai, you shall be required to work where directed by the employer anywhere in U.A.E.</p></li>
        <li style="margin-bottom:0;"><strong style="margin-bottom:0px;"><u>Probation Period:</u></strong>
            <p style="text-align: justify; margin-top:0px;">You shall serve the First <?=$probation;?> service as probation period from the date of joining the Company. Failure to successfully complete the probation period shall result in premature termination, without notice or pay in lieu thereof.</p></li>
        <li style="margin-bottom:0;"><strong style="margin-bottom:0px;"><u>Grading Structure </u></strong>
            <p style="text-align: justify; margin-top:0px;">You will be placed in <strong>&#39;<?=$gradeName;?>&#39;</strong> of the Company's administrative System.</p></li>
        <li style="margin-bottom:0;"><strong style="margin-bottom:0px;"><u>Type of Contract:</u></strong>
        <p style="text-align: justify; margin-top:0px;">You will be on a Limited Contract.</p></li>
        <li style="margin-bottom:0;"><strong style="margin-bottom:0px;"><u>Termination of Contract:</u></strong>
            <p style="text-align: justify; margin-top:0px;">The service can be terminated by either party giving the other party appropriate notice or compensation in accordance with the U.A.E Labour Laws.</p>
        <br><br> <br> 
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td align='right'><strong style='float: right;'>Contd... Page 2</strong></td>
                </tr>
            </table>
        </div>
        <br>
        <br>
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td>
                        <center style="text-center:center; font-size:12px; font-family: sans-serif;"><?=$footer;?></center>
                    </td>
                </tr>
            </table>
        </div>
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td><img src='<?=$letterhead;?>' width='100%' /></td>
                </tr>
            </table>
        </div>
        <center><strong>Page 2</strong></center>
        <br>
        
        <strong><?=$genderTitle;?> <?=$applicantName;?></strong>
        <br><br>

        <p style="text-align: justify;">
        However, the Company has the right to instantly terminate the contract with immediate effect, without notice and recompense, for reasons of: Gross misconduct, dishonesty, moral turpitude, insubordination, violation of the Company policy or law of the land, for statement or actions detrimental to the best interest of the company, absenteeism and for reason as specified under article 120 of U.A.E Labour Laws.</p>
        <p style="text-align: justify;">
        If you terminate the service agreement before completion of 12 months services, you shall agree to reimburse the Company with the following on a pro-rata basis for the contract period not completed.</p>
        <ol style='list-style:lower-alpha;margin-top:2px;margin-bottom:10px'>
            <li>Cost of recruitment.</li>
            <li>Cost of Visa.</li>
            <li>Cost of work permit and residence visa.</li>
            <li>Cost of training if any.</li>
        </ol>
        </li>
        <li style="margin-bottom:0;"><strong><u>Remunerations:</u></strong>
            <ul style='list-style:lower-alpha;'>
                <li style="margin-bottom:0;"><strong><u>Basic Salary</u>:</strong><br>
                <p style="text-align: justify;margin-top:0px;">You will be paid a Basic Salary of <strong>Dhs.<?=number_format($basicSalary,2,".",",");?>/-</strong> (Dirhams <?=getIndianCurrency($basicSalary);?> Only) per month.</p>
                </li>
                <li style="margin-bottom:0;"><strong><u>Complementary / Task Allowance</u>:</strong><br>
                <p style="text-align: justify;margin-top:0px;">You will be paid a Complementary / Task allowance of <strong>Dhs.<?=$taskAllow;?>/- </strong>(Dirhams <?=getIndianCurrency($taskAllow);?> Only) per month.</p></li>
                <li style="margin-bottom:0;"><strong><u>Accommodation </u>:</strong><br>
                    <?php
                    //if($companyAccomodation==true)
                    if($gridRadios == 'option3')
                    {
                        ?>
                        <p style="text-align: justify;margin-top:0px;">You will be provided with Bachelor shared Accommodation in accordance with the company's policy and procedures..</p>
                        <?php
                    }
                    else
                    {
                        ?><p style="text-align: justify;margin-top:0px;">You will be provided with Accommodation Allowance of <strong>Dhs.<?=number_format($homeRentAllow,2,".",",");?>/</strong>-(Dirhams <?=getIndianCurrency($homeRentAllow);?> Only) per month.</p>
                        <?php
                    }
                    ?>
                </li>
                <li style="margin-bottom:0;"><strong><u>Transport Allowance</u>:</strong><br>
                    <?php
                    //if($companyTransport==true)
                    if($gridRadios == 'option3')
                    {
                        ?>
                        <p style="text-align: justify;margin-top:0px;">You will be provided with company Transport to & from work, in accordance with the company's policy and procedures.</p>
                        <?php
                    }
                    else
                    {
                        ?><p style="text-align: justify;margin-top:0px;">You will be provided with Transport Allowance of <strong>Dhs.<?=number_format($transportAllow,2,".",",");?></strong>/-(Dirhams <?=getIndianCurrency($transportAllow);?> Only) per month.</p>
                        <?php
                    }
                    ?>
                    
                </li>
            </ul>

            <strong><u>TOTAL SALARY:</u></strong>
            <ul style='list-style:none;'>
                <li style="text-align: justify;"><strong>Dhs.<?=$totalSalary;?>/- (Dirhams <?=getIndianCurrency($totalSalary);?> Only) per month, including all above allowances.</strong></li>
            </ul>
        </li>
        <br><br>
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td align='right'><strong style='float: right;'>Contd... Page 3</strong></td>
                </tr>
            </table>
        </div>
        <br>
        <br>
        <br><br>
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td>
                        <center style="text-center:center; font-size:12px; font-family: sans-serif;"><?=$footer;?></center>
                    </td>
                </tr>
            </table>
        </div><br>
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td><img src="<?=$letterhead;?>" width="100%" /></td>
                </tr>
            </table>
        </div>
        <center><strong>Page 3</strong></center>
       
        
        <strong><?=$genderTitle;?> <?=$applicantName;?></strong>
        <br><br>
        <li style="margin-bottom:0;"><strong><u>Leave Pay</u></strong><br>
        <p style="text-align: justify;margin-top:0px;">You shall be entitled to 30 days paid leave per annum. However, the timing of the leave to be taken is to be agreed by the Company in advance.</p></li>
        <li style="margin-bottom:0;"><strong><u>Leave Airfare:</u></strong><br>
        <p style="text-align: justify;margin-top:0px;">You will be paid Economy Class airfare to your Country of Origin (<strong>Dubai / <?=ucfirst($country);?> / Dubai</strong>) per completed <strong><?=$leaveTenure;?></strong> services in respect of self only, in accordance with the Company's policy &amp; procedures as governed by the Administrative System.</p></li>
        <?php
        if($gridRadios == 'option1')
        {
            ?>

        <li style="margin-bottom:0;"><strong><u>Health Insurance Coverage:</u></strong><br>
        <p style="text-align: justify;margin-top:0px;">You will be included in company's current Health Insurance policy and will be provided with Medical Insurance Coverage, in respect of self only, in accordance with the Company's policy and procedures as governed by the Administrative System.<br>However, this facility does not include cosmetic surgery, plastic surgery, dental treatment, eye refractions, nor to the provision of surgical aids, spectacles &amp; dentures</p></li>
            <?php
        }
        ?>

        <li style="margin-bottom:0;"><strong><u>Sick Leave Payment:</u></strong><br>
        <p style="text-align: justify;margin-top:0px;">The employee shall be entitled to sick leave payment on production of medical certificate issued by the Hospitals / Clinics recognized by the Company, in accordance with the UAE Labour Laws.</p></li>

        <li style="margin-bottom:0;"><strong><u>End of Service Benefit / Gratuity:</u></strong><br>
        <p style="text-align: justify;margin-top:0px;">On cessation of employment, Gratuity (End of Service Benefits) shall be paid in accordance with UAE Labour Laws. The Gratuity shall be accrued based on the Basic Salary as shown in <strong>Clause 8(a) </strong>of this offer letter. No other payment whatsoever shall be taken into consideration for the purpose of Gratuity calculation.</p></li>

        <li style="margin-bottom:0;"><strong><u>Employment Restriction:</u></strong><br>
        <p style="text-align: justify;margin-top:0px;">After joining us, you will undertake not to compete with the business of the Company in the U.A.E., either by employment, freelancing, investor, self employment etc., for a period of two years from the date of your termination, resignation, or completion of your service contract without the prior written approval of the Company.</p></li>

        <li style="margin-bottom:0;"><strong><u>Confidentiality:</u></strong><br>
        <p style="text-align: justify;margin-top:0px;">You shall keep all business affairs of the Company strictly confidential and shall not disclose to anyone, either inside or outside the Company, neither during the continuance of employment of the Company nor after leaving the employ of the Company, any information or details relating to the Company's customers, clients, principals and agents, financial affairs of the Company, the sponsor and / or his associates.</p></li>

        
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td align='right'><strong style='float: right;'>Contd... Page 4</strong></td>
                </tr>
            </table>
        </div>
        <br>
        <br>
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td>
                        <center style="text-center:center; font-size:12px; font-family: sans-serif;"><?=$footer;?></center>
                    </td>
                </tr>
            </table>
        </div>
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td><img src="<?=$letterhead;?>" width="100%" /></td>
                </tr>
            </table>
        </div>
        <center><strong>Page 4</strong></center>
        <strong><?=$genderTitle;?> <?=$applicantName;?></strong>
        <br><br>


        <li style="margin-bottom:0;"><strong><u>Visa &amp; Permits:</u></strong><br>
        <p style="text-align: justify;margin-top:0px;">The offer of employment and continuation of service is subject to the Company being able to obtain VISA and other permits as may necessary from the Government of U.A.E. for you and your passing the medical examination from hospitals / clinics recognized by the authorities confirming that you are free from all communicable diseases and that you are in every way fit to work in the position shown under clause (1) above.</p></li>

        <li style="margin-bottom:0;"><strong><u>U.A.E. Labour Laws:</u></strong><br>
        <p style="text-align: justify;margin-top:0px;">All other terms and conditions of employment shall be in accordance with U.A.E. labour laws.</p></li>
        <li style="margin-bottom:0;"><strong><u>Company Admin System:</u></strong><br>
            <p style="text-align: justify;margin-top:0px;">The terms and conditions of your employment will also be governed by the Company's Admin System.</p>
        </li>

        <li style="margin-bottom:0;"><strong><u>Withdrawal &amp; Cancellation of Offer:</u></strong><br>
        <p style="text-align: justify;margin-top:0px;">Should you fail to join on the date as required by this Company, this offer may be cancelled and withdrawn at the discretion of the Company.</p></li>

        <li style="margin-bottom:0;"><strong><u>Effective Date of this agreement:</u></strong><br>
        From the date of your joining the Company.</li>

        <p style="text-align: justify;margin-top:0px;">We take this opportunity to welcome you to <strong><?=$companyName;?></strong> and look forward to a happy and long working relationship.</p>

        <p style="text-align: justify;margin-top:0px;">Please sign (on all pages) and return one copy of this offer letter to signify your understanding and acceptance of this offer.</p>
        <p>For <strong><?=$companyName;?></strong><br></p>
        <br>
        <div style='width:100%;'>
            <table><tr><td><img src="<?=$ajsignature;?>"></td></tr></table>
            <table style='width:100%;'>
                
                <tr>
                    <td align='left'><strong style='float: left;'>Ahmed Jamil<br></strong></td>
                    <td align='right'><strong style='float: right;'></strong></td>
                </tr>
            </table>
        </div>
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td align='left'><strong style='float: left;'><br>Deputy Group HR Manager</strong></td>
                    <td align='right'><strong style='float: right;'>Received, understood &amp; accepted</strong><br></td>
                </tr>
            </table>
        </div>
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td align='left'><strong style='float: left;'><br><br></strong></td>
                    <td align='right'><strong style='float: right;'><br><br></strong></td>
                </tr>
            </table>
        </div>
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td align='left'><strong style='float: left;'></strong></td>
                    <td align='right'><strong style='float: right;'>_____________________________</strong></td>
                </tr>
            </table>
        </div>
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td align='left'><strong style='float: left;'></strong></td>
                    <td align='right'><strong style='float: right;'><br>Signature of the Candidate</strong></td>
                </tr>
            </table>
        </div>
        
        
        <br>
        <br><br>
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td>
                        <center style="text-center:center; font-size:12px; font-family: sans-serif;"><?=$footer;;?></center>
                    </td>
                </tr>
            </table>
        </div>
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td><img src="<?=$letterhead;?>" width="100%" /></td>
                </tr>
            </table>
        </div>
        <br><br><br><br><br>
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        <div>
            <p style='text-align: right;'>Appendix 'A'</p>
            <p style='text-align: right;'><strong >To offer dated <?=date('d/m/Y');?></strong></p>
        </div>
        &nbsp;
        <center><strong><u>UNDERTAKING</u></strong></center>
        <br><br>
        <br><br>
        <p style="text-align: justify;">I, <strong><?=$genderTitle;?> <?=$applicantName;?>, </strong>holder of <strong><?=ucfirst($nationality);?> Passport No. <?=$passport;?></strong> applied for and appointed by the organization in the position of <strong>&#34;<?=$roleName;?>&#34; </strong>for <strong> </strong><strong><?=$companyName;?>,</strong> undertake that in the event of refraining from reporting, Resigning or placing myself in a position whereby the company may resort to termination before completion of 12 months services, I shall bear the VISA Costs that has been incurred by the company.</p>
        <p>I also undertake that in the event of my failure to perform the duties/ responsibilities as per the job description given by the company, received and understood by myself and any breach in the job functioning or failing to perform responsibilities up to the satisfaction of the management the company may terminate my services within the stipulated time of the validity of my employment visa and I authorize the company to deduct the above VISA costs from my salaries and benefits or from my end of service benefits.</p>
        <br><br>
        <table width="100%">
            <tr>
                <td width="30%"></td>
                <td  width="20%">Name</td>
                <td  width="30%"><?=$applicantName;?></td>
                <td width="20%"></td>
            </tr>
            <tr>
                <td width="30%"></td>
                <td  width="20%">Signature</td>
                <td  width="30%">______________________</td>
                <td width="20%"></td>
            </tr>
            <tr>
                <td width="20%"></td>
                <td  width="30%">Date</td>
                <td  width="30%">______________________</td>
                <td width="20%"></td>
            </tr>
        </table>
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style='width:100%;'>
            <table style='width:100%;'>
                <tr>
                    <td>
                        <center style="text-center:center; font-size:12px; font-family: sans-serif;"><?=$footer;;?></center>
                    </td>
                </tr>
            </table>
        </div>
    </ul>
</body>
</html>

<?php 

function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees : '') . $paise;
}
?>