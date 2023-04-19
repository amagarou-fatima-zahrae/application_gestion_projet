@extends('template.masterPage')
@section('extra-js')
 <script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'pdfHtml5'
        ]
    } );
} );
 </script>
@endsection 
@section('content')

<div class="facture-container bg-light py-3">

   <div class="nav-buttons  py-3">
    <ul class="nav d-flex justify-content-around my-2">
       <li class="nav-item">
        {{-- <button type="button" class="btn btn-outline-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
           </svg>
           Ajouter une facture
          </button> --}}
          <a href="/facture/1/create" class="btn btn-primary btn-floating"><span class="fa fa-plus"></span><br>ajouter une facture</a>
       </li>
        <li class="nav-item">
            <button class="btn btn-primary btn-floating"><span class="fa-solid fa-cloud-arrow-up"></span><br>Importer une facture</button>
        </li>
        <li class="nav-item">
            <button class="btn btn-primary btn-floating"><span class="fa-solid fa-file-arrow-down"></span><br>Exporter une facture</button>
        </li>
   
        <li class="nav-item">
            <a class="btn btn-primary btn-floating" href="/paiements/1"><span class="fa-solid fa-building-columns"></span><br>Paiements</a>
        </li>
    </ul>
   </div>

   <div class="status-fact py-3">
    <div class="container flex justify-content-around">
      <div class="row">
        <div class="col-lg-3 col-sm-6 pb-2 ">
            <div class="card ">
                <div class="card-body">
                  <h5 class="card-title">payée</h5>
                  <div class="container">
                    <form class="range">
                     <div class="form-group range__slider">
                       <input type="range" step="500">
                     </div><!--/form-group-->
                     <div class="form-group range__value">
                      <label>Loan Amount</label>
                      <span></span>            
                      </div><!--/form-group-->
                        </form>
                    </div>
                  {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Button</a> --}}
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 pb-2">
              <div class="card ">
                <div class="card-body">
                  <h5 class="card-title">impayée</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Button</a>
                </div>
              </div>
            </div>
              <div class="col-lg-3 col-sm-6 pb-2">
              <div class="card ">
                <div class="card-body">
                  <h5 class="card-title">payée partiellemnt</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Button</a>
                </div>
              </div>
            </div>
              <div class="col-lg-3 col-sm-6 pb-2">
              <div class="card ">
                <div class="card-body">
                  <h5 class="card-title">annulée</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Button</a>
                </div>
              </div>
        </div>
      </div>
    </div>
   </div>


   <div class="tab py-5">
    <div class="container">
      <div class="d-flex justify-content-end align-items-center py-3 gap-3">
        <div class="dropup-center dropup">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Action
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Action two</a></li>
            <li><a class="dropdown-item" href="#">Action three</a></li>
          </ul>
        </div>
        <a href="#" class="btn btn-primary">Archives</a>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">Factures</div>
        <div class="panel-body">
          <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Nom du client</th>
                    <th>Description</th>
                    <th>Date de la facture</th>
                    <th>Date d'échéance</th>
                    <th>Statut</th>
                    <th>Total</th>
                    <th>Solde</th>
                    <th> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></th>
                </tr>
            </thead>
            <tbody>
              @foreach ($factures as $facture)
              <tr id="{{ $facture->id }}">
                <td>{{ $facture->numero_fact}}</td>
                
                  @if (($facture->facturable_type)==="App\Models\Client_Personne")
                  <td>  
                    {{ $facture->facturable->nom}} {{ $facture->facturable->prenom}} 
                  </td>
                  @else
                  <td>  
                    {{ $facture->facturable->name}}
                  </td>
                  @endif
               
                <td>{{ $facture->description}}</td>
                <td>{{ $facture->date_facturation}}</td>
                <td>{{ $facture->date_echeance}}</td>
                <td>{{ $facture->statut}}</td>
                <td>{{ $facture->total}}</td>
                <td>{{ $facture->solde}}</td>
                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
            </tr>
              @endforeach
            </tbody>
            {{-- <tfoot>
                <tr>
                  <th>Numéro</th>
                  <th>Nom du client</th>
                  <th>Description</th>
                  <th>Date de la facture</th>
                  <th>Date d'échéance</th>
                  <th>Statut</th>
                  <th>Total</th>
                  <th>Solde</th>
                  <th> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
      
                </tr>
            </tfoot> --}}
        </table>
        </div>
      </div>
      
    </div>
   </div>
   

</div>
<script>
   var table = document.getElementById('example');
   //console.log(table);
    var rows = table.getElementsByTagName("tr");
   console.log(typeof rows);
    lignes = [];
    for (i = 1; i < rows.length; i++) {
      lignes.push(rows[i]);
    }
   lignes.forEach(ligne => {
       ligne.addEventListener('click',function(){
       window.location.href = `/facture/${ligne.getAttribute('id')}/edit`;
});
    });
</script>
@endsection

{{-- <div class="row flex-row">
    <div class="col-xs-12 ">
        <div class="btn-container ">
            <nav class="buttons-nav ">
                <a href="#" class="btn btn-default opener" data-toggle="dropdown"><i class="fa fa-bars"></i>Actions</a>
                <ul class="list-unstyled ">
                    <li class="btn-group">
                        <a onclick="window.location.href='/app/factures/edit/'; return false;" id="ContentPlaceHolder_AddNewInvoice" class="btn btn-default add icon" href="javascript:__doPostBack('ctl00$ContentPlaceHolder$AddNewInvoice','')">Ajouter une facture</a>
                        <a href="javascript:void(0)" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="padding-bottom: 7px;"><span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="javascript:void(0)" onclick="document.location.href='/app/factures/progressive/';" class="btn btn-default  add icon">Ajouter une facture progressive</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a id="ContentPlaceHolder_HyperLink2" class="btn btn-default icon warning" href="recurring/facturer/">Factures récurrentes en attente</a>
                    </li>
                    <li><a href="/app/config/import/?type=invoice" class="btn btn-default icon import">Importer des factures</a></li>
                    <li><a id="ContentPlaceHolder_exportbtn" class="btn btn-default icon export-excel" href="javascript:__doPostBack('ctl00$ContentPlaceHolder$exportbtn','')">Exporter des factures</a></li>
                    <li>
                        <a id="ContentPlaceHolder_HyperLink1" class="btn btn-navigation  icon recurring" href="recurring/">Factures récurrentes</a>

                    </li>
                    <li>
                        <a id="ContentPlaceHolder_HyperLink3" class="btn btn-navigation icon payment" href="../paiements/">Paiements</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div> --}}
