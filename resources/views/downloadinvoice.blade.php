<!doctype html>

    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Bustz Invoice</title>
    </head>
    <body>


    <style>
.invoice-box {
    max-width: 800px;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, .15);
    font-size: 14px;
    line-height: 24px;
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color: #555;
}







.invoice-box table tr.heading td {
    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
}

.invoice-box table tr.details td {
    padding-bottom: 20px;
}

.invoice-box table tr.item td{
    border-bottom: 1px solid #eee;
}

.invoice-box table tr.item.last td {
    border-bottom: none;
}

.invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    font-weight: bold;
}

@media only screen and (max-width: 600px) {
    .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
    }

    .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
    }
}

/** RTL **/
.rtl {
    direction: rtl;
    font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
}

.rtl table {
    text-align: right;
}

.rtl table tr td:nth-child(2) {
    text-align: left;
}

    </style>
    <br>
    <div class="invoice-box">

            <div class="row">



                            <div class="col-lg-3 col-md-3 col-sm-6 invoice-logo">
                                <img src="{{asset('images/log.png')}}" style="width:100%; max-width:300px;">
                            </div>

                            <div class="col-lg-9 col-md-9 col-sm-6 invoice-title">
                                <div style="float:right; padding-top:19px;">
                                <a style="width:120px;height:30px;font-size:14px;" class="btn btn-primary" href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a><br>
                                Invoice #: 123<br>
                                Created: January 1, 2015<br>
                                Due: February 1, 2015
                                </div>
                            </div>


            </div>

                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-6" style="padding-bottom:40px">
                                BusTz<br>
                                5 Shaaban Robert Street 11101<br>
                                P.O Box 3918<br>
                                Dar-es-salaam,<br> Tanzania
                            </div>

                            <div class="col-lg-7 col-md-7 col-sm-6">
                              <div style="float:right">
                                Acme Corp.<br>
                                John Doe<br>
                                john@example.com
                              </div>
                            </div>
                        </div>


                        <table class="table">
            <tr class="heading" style="font-size:12px;">
                    <td>
                        First Name
                         </td>
                         <td>
                                last Name
                                 </td>
                <td>
                    Company Name
                </td>
                <td>
                    Bus plate no
                </td>
                <td>
                    Seat no
                </td>
                <td>
                    Bus type
                </td>
                <td>
                   Departure date
                </td>
                <td>
                    Departure Time
                 </td>
                 <td>
                        Price
                     </td>

            </tr>

            <tr class="item">
                <td>
                    Website design
                </td>

                <td>
                    $300.00
                </td>
            </tr>


            <tr class="total">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                   Total:$385.00
                </td>
            </tr>
                        </table>
    </div>
     </body>
    </html>
