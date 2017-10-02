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
<h2 style="text-align: center">Rapport d'achat</h2>

<hr>

 <center><h4> compte rendu du :  {{ $data['from']->format('jS M Y') }} au {{ $data['to']->format('jS M Y') }}</h4></center>

 <table width="100%" class="table">
    <thead>
    <tr class="blue">
      <th>ID</th>
      <th>date d'achat</th>
      <th> ID Achat</th>
      <th>Fournisseur</th>
      <th>Somme finale</th>
      <th>Payé</th>
      <th>solde dû</th>
      <th>dète</th>
    </tr>
    </thead>
    <tbody>
      @if(count($transaction))
      @foreach($transaction as $key => $value)
        <tr>
          <td>{{ $value->id }}</td>
          <td>{{ \Carbon\Carbon::parse($value->created_at)->format('jS M Y') }}</td>
          <td>{{ $value->purchase_id }}</td>
          <td>{{ $value->supplier->supplier_name }}</td>
          <td>{{ $value->subtotal }}</td>
          <td>{{ $value->payment }}</td>
          <td>{{ $value->balance }}</td>
          <td>{{ $value->due }}</td>
        </tr>
      @endforeach
      @else
        <tr>
          <td colspan="8" style="text-align: center;">Aucun enregistrement trouvé ...</td>
        </tr>
      @endif
    </tbody>
  </table>

  <br><hr><br>

  

  <table width="50%" class="total" style="float:right">
    <tr style="background-color: #f2f2f2;">
      <th style="width:50%;">Achat total:</th>
      <td>  {{ $total['purchase'] }} fcfa</td>
    </tr>
    <tr>
      <th>Montant payé:</th>
      <td> {{ $total['payment'] }} fcfa</td>
    </tr>
    <tr style="background-color: #f2f2f2;">
      <th>sur plus:</th>
      <td> {{ $total['balance'] }} fcfa</td>
    </tr>
    <tr>
      <th>Dète:</th>
      <td> {{ $total['due'] }} fcfa</td>
    </tr>
  </table>
  
  <p>Généré par : DASER TELECAM</p>
</body>
</html>