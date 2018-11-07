<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title> payment confirmation | {!! config('app.name') !!}</title>
    <style type="text/css" media="screen">

        /* Force Hotmail to display emails at full width */
        .ExternalClass {
            display: block !important;
            width: 100%;
        }

        /* Force Hotmail to display normal line spacing */
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        body,
        p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        body,
        p,
        td {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            color: #333333;
            line-height: 1.5em;
        }

        h1 {
            font-size: 24px;
            font-weight: normal;
            line-height: 24px;
        }

        body,
        p {
            margin-bottom: 0;
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
        }

        img {
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a img {
            border: none;
        }

        .background {
            background-color: #e8e8e8;
        }

        table.background {
            margin: 0;
            padding: 0;
            width: 100% !important;
        }

        .block-img {
            display: block;
            line-height: 0;
        }

        a {
            color: white;
            text-decoration: none;
        }

        a,
        a:link {
            color: #2A5DB0;
            text-decoration: underline;
        }

        table td {
            border-collapse: collapse;
        }

        td {
            vertical-align: top;
            text-align: left;
        }

        .wrap {
            width: 600px;
        }

        .wrap-cell {
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .header-cell,
        .body-cell,
        .footer-cell {
            padding-left: 20px;
            padding-right: 20px;
        }

        .header-cell {
            background-color: #181B3D;
            font-size: 24px;
            color: #ffffff;
        }

        .body-cell {
            background-color: #ffffff;
            padding-top: 30px;
            padding-bottom: 34px;
        }

        .footer-cell {
            background-color: #181B3D;
            text-align: center;
            font-size: 13px;
            padding-top: 30px;
            padding-bottom: 30px;
            color : white;
        }

        .card {
            width: 400px;
            margin: 0 auto;
        }

        .data-heading {
            text-align: right;
            padding: 10px;
            background-color: #ffffff;
            font-weight: bold;
        }

        .data-value {
            text-align: left;
            padding: 10px;
            background-color: #ffffff;
        }

        .force-full-width {
            width: 100% !important;
        }

    </style>
    <style type="text/css" media="only screen and (max-width: 600px)">
        @media only screen and (max-width: 600px) {
            body[class*="background"],
            table[class*="background"],
            td[class*="background"] {
                background: #eeeeee !important;
            }

            table[class="card"] {
                width: auto !important;
            }

            td[class="data-heading"],
            td[class="data-value"] {
                display: block !important;
            }

            td[class="data-heading"] {
                text-align: left !important;
                padding: 10px 10px 0;
            }

            table[class="wrap"] {
                width: 100% !important;
            }

            td[class="wrap-cell"] {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }
        }
    </style>
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="" class="background">
<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" class="background">
    <tr>
        <td align="center" valign="top" width="100%" class="background">
            <center>
                <table cellpadding="0" cellspacing="0" width="600" class="wrap">
                    <tr>
                        <td valign="top" class="wrap-cell" style="padding-top:30px; padding-bottom:30px;">
                            <table cellpadding="0" cellspacing="0" class="force-full-width">
                                <tr>
                                    <td height="60" valign="top" class="header-cell">
                                        <center>
                                            <img width="196" height="60"
                                                 src="https://excelessay.co.uk/images/logo1.png" alt="logo">

                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" class="body-cell">

                                        <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
                                            <tr>
                                                <td valign="top" style="padding-bottom:15px; background-color:#ffffff;">
                                                    <h1>Hello !</h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="padding-bottom:20px; background-color:#ffffff;">
                                                    you have successfully made a payment of <b>{!! $amount !!}{!! config('app.currency_sombol') !!}</b> on {!! config('app.name') !!},
                                                    we thank you and invite you to consult your profile.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table cellspacing="0" cellpadding="0" width="100%"
                                                           bgcolor="#ffffff">
                                                        <tr>
                                                            <td style="width:200px;background:#008000;">
                                                                <div>

                                                                    <center>
                                                                        <a href="{!! route('home') !!}"
                                                                           style="
                                                                                  background-color: #fb8b00;
                                                                                  color: #ffffff;
                                                                                  display: inline-block;
                                                                                  font-family: sans-serif;
                                                                                  font-size: 18px;
                                                                                  line-height: 40px;
                                                                                  text-align: center;
                                                                                  text-decoration: none;
                                                                                  width: 200px;
                                                                                  -webkit-text-size-adjust: none;
                                                                                  "> Profile </a>

                                                                    </center>

                                                                    </div>
                                                                </td>
                                                                <td width="360" style="background-color:#ffffff; font-size:0; line-height:0;">&nbsp;</td>
                                                            </tr>
                                                        </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" style="padding-bottom:20px; background-color:#ffffff;">
                                                    for any question or concern please contact us via your personalized chat.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table cellspacing="0" cellpadding="0" width="100%"
                                                           bgcolor="#ffffff">
                                                        <tr>
                                                            <td style="width:200px;background:#008000;">
                                                                <div>

                                                                    <center>
                                                                        <a href="{!! route('my-messages') !!}"
                                                                           style="
                                                                                  background-color: #fb8b00;
                                                                                  color: #ffffff;
                                                                                  display: inline-block;
                                                                                  font-family: sans-serif;
                                                                                  font-size: 18px;
                                                                                  line-height: 40px;
                                                                                  text-align: center;
                                                                                  text-decoration: none;
                                                                                  width: 200px;
                                                                                  -webkit-text-size-adjust: none;
                                                                                  "> Go to chat </a>

                                                                    </center>

                                                                </div>
                                                            </td>
                                                            <td width="360" style="background-color:#ffffff; font-size:0; line-height:0;">&nbsp;</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:20px;background-color:#ffffff;">
                                                    See you soon!<br>
                                                    <a href="{!! url('/') !!}">{!! config('app.name') !!}</a> team
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" class="footer-cell">
                                        {!! config('app.name') !!}<br>
                                        &copy; {!! date('Y') !!} <a href="{!! url('/') !!}">{!! config('app.website') !!}</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </center>
        </td>
    </tr>
</table>

</body>
</html>
