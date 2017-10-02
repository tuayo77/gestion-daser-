@extends('layouts.home')

@section('content')

<section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
    <li class="active">Modifier l'achat</li>
  </ol>
</section>

<!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Modifier l'achat</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <form class="form-horizontal create_purchase" role="form" method="POST" action="{{ url('/purchase/update/'.$purchase_details->purchase_id) }}">
      
                    {{ csrf_field() }}

                    <div class="box-body">

                      <div class="row">

                        {{-- <div class="col-sm-6">
                          <div class="form-group">
                            <label>Purchase ID</label><br>
                            <input type="text" class="form-control" name="purchase_id" placeholder="">
                          </div>
                        </div> --}} 

                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Nom de l'achat</label>
                            <input type="text" class="form-control" name="purchase_name" placeholder="" value="{{ $purchase_details->purchase_name }}">
                          </div>
                        </div>

                        

                      </div>

                      <div class="row">
                        
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Catégorie d'achat</label>
                            <select class="form-control" name="category_id">
                            <option selected="" disabled="" value="">- Sélectionner - </option>
                              @foreach($category_details as $key => $value)
                                @if($purchase_details->category_id == $key)
                                  <option value="{{ $key }}" selected="">{{ $value }}</option>
                                @else
                                  <option value="{{ $key }}">{{ $value }}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Coût d'achat</label><br>
                            <input type="text" class="form-control" name="purchase_cost" placeholder="0.00"  value="{{ $purchase_details->purchase_cost }}">
                          </div>
                        </div>

                      </div>

                      <div class="row">
                        
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Coût de vente</label>
                            <input type="text" class="form-control" name="selling_cost" placeholder="0.00"  value="{{ $purchase_details->selling_cost }}">
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Nom du fournisseur</label><br>
                            <select class="form-control" name="supplier_id">
                            <option selected="" disabled="" value="">- Sélectionner - </option>
                              @foreach($supplier_details as $key1 => $value1)
                                @if($purchase_details->supplier_id == $key1)
                                  <option value="{{ $key1 }}" selected="">{{ $value1 }}</option>
                                @else
                                  <option value="{{ $key1 }}">{{ $value1 }}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                        </div>

                        

                      </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="reset" class="btn btn-danger pull-left">Annuler</button>
                      <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Mettre à jour </button>
                    </div>
            </form>
          </div>
          <!-- /.box-body -->
          </div>
        </div>  
      </div>  
    </section>
    <!-- /.content -->
@endsection
