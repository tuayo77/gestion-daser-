@extends('layouts.home')
@section('content')

<style type="text/css">
  th,td {
      text-align: center;
  }
</style>

<section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
    <li class="active">Rapport d'achat</li>
  </ol>
</section>

<!-- Main content -->
    <section class="content">

    @if(Session::has('message'))
    <div class="row">'
    <div class="col-xs-12">
      <div class="alert @if(Session::get('messageType') == 1) alert-success @else alert-danger @endif">
        {{ Session::get('message') }}
      </div>
    </div>
    </div>
    @endif

    <form class="form-horizontal generate_report_inline" role="form" method="GET" action="{{ url('/report/view_report') }}">
      <div class="row">
      <div class="col-md-offset-3 col-md-2">
        <div class="form-group">
          <label>Type de rapport</label>
            <select class="form-control inline_report_type" name="report_type">
              <option selected="" disabled="" value="">- Sélectionner -</option>
              <option value="1" @if($data['report_type'] == 1) selected="" @endif>Achat</option>
              <option value="2" @if($data['report_type'] == 2) selected="" @endif>Vente</option>
              <option value="3"  @if($data['report_type'] == 3) selected="" @endif>Stock d'achat</option>
            </select>
        </div>      
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label>DE</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right inline_datepicker_from from" name="from" value="{{ \Carbon\Carbon::parse($data['from'])->format('m/d/Y') }}" autocomplete="off">
          </div>
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label>A</label><br>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right inline_datepicker_to to" name="to" value="{{ \Carbon\Carbon::parse($data['to'])->format('m/d/Y') }}" autocomplete="off">
          </div>
        </div>
      </div>
      </div>
    </form>

    <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-shopping-bag"></i> Rapport d'achat
          <small class="pull-right">Date: {{ \Carbon\Carbon::now()->format('jS M Y - h:i:s A') }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>ID Transaction </th>
            <th>Date</th>
            <th> ID achat</th>
            <th>Fournisseur</th>
            <th>Montant total</th>
            <th>Payé</th>
            <th>reste</th>
            <th>Dû</th>
          </tr>
          </thead>
          <tbody>
            @foreach($transaction as $key => $value)
              <tr>
                <td>{{ $value->id }}</td>
                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('jS M Y') }}</td>
                <td>{{ $value->purchase_id }}</td>
                <td>{{ $value->supplier->supplier_name }}</td>
                <td> <i class=""></i> {{ $value->subtotal }}</td>
                <td> <i class=""></i> {{ $value->payment }}</td>
                <td> <i class=""></i> {{ $value->balance }}</td>
                <td> <i class=""></i> {{ $value->due }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
     
      <!-- /.col -->
      <div class="col-xs-6">
        <p class="lead"> Raport du :  {{ $data['from']->format('jS M Y') }} au {{ $data['to']->format('jS M Y') }}</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Achat total:</th>
              <td> <i class=""></i> {{ $total['purchase'] }}</td>
            </tr>
            <tr>
              <th>Montant payé:</th>
              <td> <i class=""></i> {{ $total['payment'] }}</td>
            </tr>
            <tr>
              <th>Montant du solde:</th>
              <td> <i class=""></i> {{ $total['balance'] }}</td>
            </tr>
            <tr>
              <th>Montant dû:</th>
              <td> <i class=""></i> {{ $total['due'] }}</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

     <div class="row">
       <div class="col-xs-12">
         <a href="{{ '/report/pdf_report'.str_replace(Request::url(), '', Request::fullUrl()) }}" class="btn btn-primary pull-right" target="_blank"> <i class="fa fa-file-pdf-o"></i> Générer le PDF</a>
       </div>
     </div> 
  </section>

    </section>
    <!-- /.content -->
@endsection
