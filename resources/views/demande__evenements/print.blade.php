<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Emploit</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style type="text/css">

    html, body, div, span, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    abbr, address, cite, code,
    del, dfn, em, img, ins, kbd, q, samp,
    small, strong, sub, sup, var,
    b, i,
    dl, dt, dd, ol, ul, li,
    fieldset, form, label, legend,
    table, caption, tbody, tfoot, thead, tr, th, td {
        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
        font-size: 100%;
        vertical-align: baseline;
        background: transparent;
    }

    body {
        margin: 0;
        padding: 0;
        font: 12px/15px "Helvetica Neue", Arial, Helvetica, sans-serif;
        color: #555;
        background: #f5f5f5 url(bg.jpg);
    }

    a {
        color: #666;
    }

    #content {
        width: 65%;
        max-width: 690px;
        margin: 6% auto 0;
    }

    table {
        overflow: hidden
        border: 1px solid #d3d3d3;
        background: #fefefe;
        width: 70%;
        margin: 5% auto 0;
        -moz-border-radius: 5px; /* FF1+ */
        -webkit-border-radius: 5px; /* Saf3-4 */
        border-radius: 5px;
        -moz-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
        -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
    }

    th, td {
        padding: 18px 28px 18px;
        text-align: center;
    }

    th {
        padding-top: 22px;
        text-shadow: 1px 1px 1px #fff;
        background: #e8eaeb;
    }

    td {
        border-top: 1px solid #e0e0e0;
        border-right: 1px solid #e0e0e0;
    }

    tr.odd-row td {
        background: #f6f6f6;
    }

    td.first, th.first {
        text-align: left
    }

    td.last {
        border-right: none;
    }

    /*
    Background gradients are completely unnecessary but a neat effect.
    */

    td {
        background: -moz-linear-gradient(100% 25% 90deg, #fefefe, #f9f9f9);
        background: -webkit-gradient(linear, 0% 0%, 0% 25%, from(#f9f9f9), to(#fefefe));
    }

    tr.odd-row td {
        background: -moz-linear-gradient(100% 25% 90deg, #f6f6f6, #f1f1f1);
        background: -webkit-gradient(linear, 0% 0%, 0% 25%, from(#f1f1f1), to(#f6f6f6));
    }

    th {
        background: -moz-linear-gradient(100% 20% 90deg, #e8eaeb, #ededed);
        background: -webkit-gradient(linear, 0% 0%, 0% 20%, from(#ededed), to(#e8eaeb));
    }

    tr:first-child th.first {
        -moz-border-radius-topleft: 5px;
        -webkit-border-top-left-radius: 5px; /* Saf3-4 */
    }

    tr:first-child th.last {
        -moz-border-radius-topright: 5px;
        -webkit-border-top-right-radius: 5px; /* Saf3-4 */
    }

    tr:last-child td.first {
        -moz-border-radius-bottomleft: 5px;
        -webkit-border-bottom-left-radius: 5px; /* Saf3-4 */
    }

    tr:last-child td.last {
        -moz-border-radius-bottomright: 5px;
        -webkit-border-bottom-right-radius: 5px; /* Saf3-4 */
    }

</style>
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
<section class="invoice">
   <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> 
            <small class="pull-right">Date: {{now()}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
       
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
              <thead>
            <tr>
                            <th>Day</th>
                            <th>Club</th>
                            <th>Salle</th>
                            <th>Name</th>
                            <th>Lieu</th>
                            <th>Respensable</th>
                            <th>Date</th>
                            <th>Time</th>
                            
              
              
            </tr>
            </thead>
            <tbody>
            
                 @foreach($demandeEvenements as $demandeEvenement)
                        <tr>

                          <td>{{  date('l', strtotime($demandeEvenement->date))}}</td>
                            <td>{{ optional($demandeEvenement->club)->name }}</td>
                            <td>{{ optional($demandeEvenement->salle)->name }}</td>
                            <td>{{ $demandeEvenement->Name }}</td>
                            <td>{{ $demandeEvenement->Lieu }}</td>
                            <td>
                              @foreach($etudiant as $etudian)
                              @if(optional($demandeEvenement->club)->etudiant_id == $etudian->id)
                              {{ $etudian->name }}
                              @endif
                              @endforeach
                            </td>
                            <td>{{ $demandeEvenement->date }}</td>

                            <td>{{ $demandeEvenement->Start }}....{{ $demandeEvenement->End }}</td>
                            
                </tr>
          @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      



      <!-- this row will not appear when printing -->
    
</section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
