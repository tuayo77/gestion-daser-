<!DOCTYPE html>
<html>
<head>
  <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: center;
        padding: 8px;
    }

    .table > tbody tr:nth-child(odd) {
       background-color: #f2f2f2;
    }

    .table > thead{background-color: #2980B9;color: #fff}

    </style>
</head>
<body>

<h4 style=" text-align:right;">Date: {{ \Carbon\Carbon::now()->format('jS M Y') }}</h4>
<h2 style="text-align: center">Rapport d'inventaire</h2>

<hr>

 <center><h4>compte rendu du :  {{ $data['from']->format('jS M Y') }} au {{ $data['to']->format('jS M Y') }}</h4></center>

 <table width="100%" class="table">
    <thead>
    <tr>
      <th>ID</th>
      <th width="100px">Date</th>
      <th>Categorie Stock </th>
      <th>Type Stock </th>
      <th>Quantité</th>
      <th>Stock d'ouverture</th>
      <th>Stock de clôture</th>
      <th>Coût / Unité</th>
      <th>Total</th>
    </tr>
    </thead>
    <tbody>
      @if(count($transaction))
      @foreach($transaction as $key => $value)
              <tr>
                <td>{{ $value->purchase_id }}</td>
                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('jS M Y') }}</td>
               {{--  <td>{{ $value->category->category_name }}</td>
                <td>{{ $value->stock->stock_name }}</td> --}}
                <td>{{ $value->purchase_quantity }}</td>
                <td>{{ $value->opening_stock }}</td>
                <td>{{ $value->closing_stock }}</td>
                <td>{{ $value->purchase_cost }}</td>
                <td>{{ $value->purchase_total }}</td>
              </tr>
            @endforeach
      @else
        <tr>
          <td colspan="8" style="text-align: center;">Aucun enregistrement trouvé...</td>
        </tr>
      @endif
    </tbody>
  </table>

  <br><hr><br>

  

  <table width="50%" style="float: right;">
    <tr style="background-color: #f2f2f2;">
      <th style="width:50%">Achat total:</th>
      <td> {{ $total['purchase'] }}</td>
    </tr>
    <tr>
      <th>Montant payé:</th>
      <td>  {{ $total['payment'] }}</td>
    </tr>
    <tr style="background-color: #f2f2f2;">
      <th>Sur plus:</th>
      <td> {{ $total['balance'] }}</td>
    </tr>
    <tr>
      <th>Dète:</th>
      <td> {{ $total['due'] }}</td>
    </tr>
  </table>
  
<p>Généré par : DASER TELECAM</p>
</body>
</html>