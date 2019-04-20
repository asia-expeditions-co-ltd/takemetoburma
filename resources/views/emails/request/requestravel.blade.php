
  <!DOCTYPE html>
  <html>
  <head>
    <title>test</title>
 
    <style type="text/css">  
    body { font-family: "Open Sans",sans-serif;}
        .ReadMsgBody {width: 100%; background-color: #f1f1f1;}
        .ExternalClass {width: 100%; background-color: #f1f1f1;
        }
        td a {color: #ffcccc;text-decoration: none;font-weight: normal;font-style: normal;
        }
        table {border-collapse: collapse;}

        @media only screen and (max-width: 599px) {
            body {width: auto !important;
            }
            table table { width: 100% !important;
            }
            td.paddingOuter {
                width: 100% !important;
                padding-right: 20px !important;
                padding-left: 20px !important;
            }
            td.fullWidth {
                width: 100% !important;
                display: block !important;
                float: left;
                margin-bottom: 30px !important;
            }
            td.fullWidthNM {
                width: 100% !important;
                display: block !important;
                float: left;
                margin-bottom: 0px !important;
            }
            td.center {text-align: center !important;
            }
            td.right {text-align: right !important;
            }
            td.spacer {display: none !important;
            }
            img.scaleImg {
                width: 100% !important;
                height: auto;
            }
        }
    </style>

  </head>

  <body>   
<div class="wrapper">

    <div class="content-wrapper">       

        <section class="content">

             <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#eee7e7" style="padding: 0; margin: 0;">
        <tr>
            <td align="center" width="700" valign="top" style="background-color:#eee;">
       
           <!--Header-->
                <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="padding: 0; background-color: #ffff ">
                    <tr>

                        <td class="paddingOuter" valign="top" align="center" style="  padding: 0px 0px;">

                            <table class="tableWrap" width="700" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:rgba(173, 173, 173, 0.7);;">

                                <tr>
                                    <td style="padding: 0px;">
                                        <table class="tableInner" width="640" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <!-- Positioning of logo -->
                                                <td class="fullWidth" width="305" align="center" valign="top" style="padding: 0;">
                                                    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td class="center" align="center" valign="top" style=" margin: 0; padding-bottom: 0; font-size:14px; font-weight: normal; color:#949494; font-family: Garamond, Baskerville, 'Baskerville Old Face', 'Hoefler Text', 'Times New Roman', serif; line-height: 100%; ">
                                                                <span>
                                                            <a href="#" style="text-decoration: none; font-style: normal; font-weight: normal; color:#ffffff;">
                                                          @if(config('app.web')==1)
                                                            <img src="http://asiagolftravel.com/img/takemetoburma.png" alt="logo" width="286" height="50" border="0" style="display: inline-block;    height: 130px;" />
                                                            @elseif(config('app.web')==2)
                                                            <img src="http://asiagolftravel.com/img/cyclingburmar.png" alt="logo" width="286" height="50" border="0" style="display: inline-block;    height: 130px;" />
                                                             @elseif(config('app.web')==3)
                                                            <img src="http://asiagolftravel.com/img/golftravelmyanma.png" alt="logo" width="286" height="50" border="0" style="display: inline-block;    height: 130px;" />
                                                           @endif
                                                            </a>
                                                            </span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <!--Logo end-->

                                                <!--Spacer-->
                                                <td class="spacer" width="30" height="0" align="left" valign="top" style="font-size: 0; line-height: 0;">
                                                    &nbsp;
                                                </td>
                                                <!--Spacer end-->

                                        
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
        
                <!--Header end-->
         
                    <!-- Footer-->
                <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#3b3b3b" style="padding: 0; ">
                    <tr>
                        <td class="paddingOuter" valign="top" align="center" style="padding: 0px;background-color: #ffff">
                            <table class="tableWrap" width="640" border="0" align="center" cellpadding="0" cellspacing="0" style="">
                                <tr>
                                    <td style=" padding: 40px 0px;">
                                        <table class="tableInner" width="640" border="0" align="center" cellpadding="0" cellspacing="0" style="">
                                            <tr>
                                                 <td class="fullWidth" width="640" align="center" valign="top" style="padding: 0;margin: 0; padding-top: 0; font-size:13px; font-weight: normal; font-family: Garamond, Baskerville, 'Baskerville Old Face', 'Hoefler Text', 'Times New Roman', serif; line-height: 23px;  mso-line-height-rule: exactly; color: #1f25e2; ">
                                                    <span>
                <h1>Thank You for Request</h1>
                <h1>Your Information</h1>
                <span style="text-align: left;">
                <h1>Request on: {{$data['date']}}</h1>
                <h1>Email: {{$data['email']}}</h1>
                <h1>Phone: {{$data['phone']}}</h1>
                <h1>Pax: {{$data['pax']}}</h1>
                <h1>Message: {{$data['text']}}</h1>
                </span>
       
                                                </span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!-- Footer end-->

             


                   
                
                      <!-- Footer-->
                <table width="700" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#3b3b3b" style="padding: 0; ">
                    <tr>
                        <td class="paddingOuter" valign="top" align="center" style="padding: 0px;background-color: rgba(173, 173, 173, 0.7);">
                            <table class="tableWrap" width="640" border="0" align="center" cellpadding="0" cellspacing="0" style="">
                                <tr>
                                    <td style=" padding: 40px 0px; border-bottom: 1px solid #585757;">
                                        <table class="tableInner" width="640" border="0" align="center" cellpadding="0" cellspacing="0" style="">
                                            <tr>
                                                 <td class="fullWidth" width="640" align="center" valign="top" style="padding: 0;margin: 0; padding-top: 0; font-size:13px; font-weight: normal; color:#000; font-family: Garamond, Baskerville, 'Baskerville Old Face', 'Hoefler Text', 'Times New Roman', serif; line-height: 23px;  mso-line-height-rule: exactly; ">
                                                    <span>
                                                       &copy; Copyright 2019 <strong></strong>          
                                                </span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!-- Footer end-->

            </td></tr></table>

</section>
</div>
</div>

 </body>
 </html>
 <script type="text/javascript">

 </script>