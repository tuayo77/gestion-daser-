@extends('layouts.home')

@section('content')

<section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
    <li class="active">Ajouter un stock</li>
  </ol>
</section>

<!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Ajouter un stock / Produit</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <form class="form-horizontal create_stock" role="form" method="POST" action="{{ url('/stock/store') }}">
      
                    {{ csrf_field() }}

                    <div class="box-body">

                      <div class="row">
                        
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Catégorie du stock</label>
                            <input type="text" class="form-control search_category_name" placeholder="Type here ..." name="category_name" autocomplete="off">
                            <span class="help-block search_category_name_empty" style="display: none;">Aucun résultat trouvé ...</span>
                            <input type="hidden" class="search_category_id" name="category_id">
                          </div>
                        </div>

                      </div> 

                      <div class="row unit_of_measure_container"></div>

                      <div class="row">
                        
                        <input type="hidden" class="measuring_units" name="measuring_units">

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>prix d'achat / Unité</label><br>
                            <input type="text" class="form-control" name="purchase_cost" placeholder="0.00">
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Prix de vente / Unité</label>
                            <input type="text" class="form-control" name="selling_cost" placeholder="0.00">
                          </div>
                        </div>

                      </div>

                      <div class="row">
                        
                        

                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Nom du fournisseur</label><br>
                            <select class="form-control change_supplier_name" name="supplier_id">
                            <option selected="" disabled="" value=""> Selectionné </option>
                              <option value="0">-Plusieurs fournisseurs -</option>
                              @foreach($supplier_details as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                              @endforeach
                            </select>
                            <input type="hidden" name="supplier_name" class="supplier_name">
                          </div>
                        </div>

                        

                      </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="reset" class="btn btn-danger pull-left">Annuler</button>
                      <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Ajouter</button>
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
