@extends('layouts.home')

@section('content')

<section class="content-header">
  <h1>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
    <li class="active">Ajouter un achat</li>
  </ol>
</section>

<!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">
          <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Ajouter un achat</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <form class="form-horizontal create_purchase" role="form" method="POST" action="{{ url('/purchase/store') }}">
      
                    {{ csrf_field() }}

                    <div class="box-body">

                      <div class="box box-default">
                        <div class="box-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label>Nom du fournisseur</label>
                                <input type="text" class="form-control search_supplier_name" placeholder="Type here ..." name="supplier_name" autocomplete="off">
                                <span class="help-block search_supplier_name_empty" style="display: none;">Aucun résultat trouvé ...</span>
                                <input type="hidden" class="search_supplier_id" name="supplier_id">
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label>Address</label><br>
                                <input type="text" class="form-control search_supplier_address" name="supplier_address" autocomplete="off">
                              </div>
                            </div>

                            <div class="col-sm-2">
                              <div class="form-group">
                                <label>Contact 1</label><br>
                                <input type="text" class="form-control search_supplier_contact1" name="supplier_contact1" autocomplete="off">
                              </div>
                            </div>

                            <div class="col-sm-2">
                              <div class="form-group">
                                <label>Solde d'ouverture</label><br>
                                <input type="text" name="opening_balance" class="form-control opening_balance" readonly="">
                              </div>
                            </div>

                            <div class="col-sm-2">
                              <div class="form-group">
                                <label>Credit d'Ouverture</label><br>
                                <input type="text" name="opening_due" class="form-control opening_due" readonly="">
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="box box-default">

                          <div class="box-body">

                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Catégorie de stock</th>
                                  <th>Quantité physique</th>
                                  <th>Nombre d'unités</th>
                                  <th>Coût d'achat / Unité</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                              <tbody class="purchase_container">
                                <tr>
                                  <td>
                                    <input type="text" class="form-control search_purchase_category_name" placeholder="Type here ..." name="category_name[]" autocomplete="off">
                                  <span class="help-block search_purchase_category_name_empty" style="display: none;">Aucun résultat trouvé ...</span>
                                  <input type="hidden" class="search_category_id" name="category_id[]">
                                  </td>
                                  <td width="250px">
                                    <select class="form-control purchase_stock_id" name="stock_id[]">
                                      <option selected="" disabled="" value="">sélectionner</option>
                                    </select>
                                    <span></span>
                                  </td>
                                  
                                  <td width="150px">

                                    <input type="hidden" class="search_stock_quantity" name="opening_stock[]">
                                    <input type="hidden" class="closing_stock" name="closing_stock[]">

                                    <input type="text" class="form-control change_purchase_quantity" name="purchase_quantity[]" min="0" autocomplete="off">
                                  </td>
                                  
                                  <td width="200px">
                                    <input type="text" class="form-control search_purchase_cost" name="purchase_cost[]">
                                  </td>

                                  <td width="150px">
                                    <input type="text" class="form-control stock_total" name="sub_total[]"  readonly="">
                                  </td>

                                  <td><button type="button" class="btn btn-danger remove_tr">&times;</button></td>
                                </tr>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td colspan="3">
                                    <button type="button" class="btn btn-primary add_purchase_product"><i class="fa fa-plus"></i> Ajouter plus</button>
                                  </td>
                                  <td></td>
                                </tr>
                              </tfoot>
                            </table>
                            {{-- <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label>Stock Category</label><br>

                                  <input type="text" class="form-control search_purchase_category_name" placeholder="Type here ..." name="category_name" autocomplete="off">
                                  <span class="help-block search_purchase_category_name_empty" style="display: none;">No Results Found ...</span>
                                  <input type="hidden" class="search_category_id" name="category_id">
                                  
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                  
                                  <label>Physical Quantity </label><br>
                                  <select class="form-control stock_id" name="stock_id">
                                    <option selected="" disabled="" value="">select</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  
                                  <label>Opening Stock </label><br>
                                  <input type="text" class="form-control search_stock_quantity" name="opening_stock" readonly="">
                                  <input type="hidden" name="closing_stock" class="closing_stock">

                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <label>No.of.Units</label><br>
                                  <input type="text" class="form-control change_purchase_quantity" name="purchase_quantity" min="0" autocomplete="off">
                                </div>  
                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label>Purchase Cost</label><br>
                                  <input type="text" class="form-control search_purchase_cost" name="purchase_cost">
                                </div>
                              </div>
                            </div> --}}

                            <div class="row">
                              
                              <div class="col-md-offset-8 col-md-4">
                                <div class="form-group">
                                  <label>Achat Total</label><br>
                                  <input type="text" class="form-control purchase_total" readonly="" name="purchase_total">
                                </div>
                              </div>

                            </div>

                            <div class="row">
                              <div class="col-md-offset-4 col-md-4">
                                <div class="form-group">
                                  <label>Remise ( % )</label><br>
                                  <input type="number" class="form-control purchase_discount_percent" name="discount_percent" step="0.01" min="0" max="100" value="0">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Remise ( Amount )</label><br>
                                  <input type="text" class="form-control purchase_discount_amount" name="discount_amount" step="0.01" min="0" value="0">
                                </div>
                              </div>
                            </div>

                            <div class="row">

                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Description de la taxe</label><br>
                                  <input type="text" class="form-control" name="tax_description">
                                </div>
                              </div>

                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Tax ( % )</label><br>
                                  <input type="number" class="form-control purchase_tax_percent" name="tax_percent"  step="0.01" min="0" max="100" value="0">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Tax ( Montant )</label><br>
                                  <input type="text" class="form-control purchase_tax_amount" name="tax_amount"   step="0.01" min="0" value="0">
                                </div>
                              </div>
                            </div>

                          </div>
                      </div>

                      <div class="box box-default">
                        <div class="box-body">
                          <div class="row">

                            <div class="col-sm-2">
                              <div class="form-group">
                                <label>Description</label><br>
                                <textarea class="form-control" style="height: 35px;" name="description" autocomplete="off"></textarea>
                              </div>
                            </div>
                            
                            <div class="col-sm-2">
                              <div class="form-group">
                                <label>somme finale</label><br>
                                <input type="text" class="form-control grand_total" name="grand_total" readonly="">
                              </div>
                            </div>

                            <div class="col-sm-2">
                              <div class="form-group">
                                <label>Paiement</label><br>
                                <input type="text" class="form-control purchase_payment" name="payment" autocomplete="off">
                              </div>
                            </div>

                            <div class="col-sm-2">
                              <div class="form-group">
                                <label>Solde de clôture</label><br>
                                <input type="text" class="form-control closing_balance" name="closing_balance" readonly="">
                              </div>
                            </div>

                            <div class="col-sm-2">
                              <div class="form-group">
                                <label>Credit Fermeture</label><br>
                                <input type="text" class="form-control closing_due" name="closing_due" readonly="">
                              </div>
                            </div>

                            <div class="col-sm-2">
                              <div class="form-group">
                                <label>Mode de paiement</label>
                                <select class="form-control" name="mode">
                                  <option value="1">Cash</option>
                                  <option value="2">Cheque</option>
                                  <option value="3">Card</option>
                                  <option value="3">Orange money</option>
                                  <option value="3">mtn money</option>
                                </select>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="reset" class="btn btn-danger pull-left">Annuler </button>
                      <button type="submit" class="btn btn-primary pull-right form_submit"><i class="fa fa-plus"></i> Ajouter</button>
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
