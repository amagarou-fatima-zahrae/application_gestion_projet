@extends('template.masterPage')
@section('extra-js')
 <script>
$(document).ready(function() {
    $('#myTable').DataTable( {
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
<style>
  .facture{
    margin: 50px 0;
  }
  .facture .form-wrapper{
   flex:auto;
}
/* .show{
  visibility: visible;
    opacity: 1;
} */
.modal-dialog,.modal-content,.modal-header,.modal-body{
  width: 500px;
  background-color:transparent;
}
.facture .form-wrapper .card {
    
    width:500px ;
    padding: 20px;
    background-color: rgb(0 0 0  /45%);
    visibility: visible;
    opacity: 1;
    transition: visibility 0.5s , opacity 0.5s;
}
.modal-content,.modal-body,.form-wrapper{ 
  height: 715px;
}
.facture .card-header{
    margin: 30px 20px 0;
    font-size: 1.1rem;
    color: #94f7e6;
    box-shadow: 2px 3px 8px #d3f7ff71;
    border-radius: 50px;
    
}
.facture .card-header .form-header{
  flex:50%;
  align-items: center;
  padding: 10px 0;
  border: 1px solid transparent;
  border-radius: 50px;
  user-select: none;
  cursor: pointer;
}
.facture .card-header .form-header.active{
  box-shadow: inset 1px 1px 2px rgb(19 210 177 / 55%), inset -1px 1px 2px rgb(19 210 177 / 55%) , inset -1px 1px 2px rgb(19 210 177 / 55%) , inset 1px 1px 2px rgb(19 210 177 / 55%);
  border-color: #94f7e6;
  transition: border-color 0.5s, box-shadow 0.5s
}
.facture .card-body{
   /*flex-wrap:nowrap; */
    padding: 40px 0;
}
form{
    flex: 0 0 100%;
}
.toggleForm {
  visibility: hidden;
  opacity: 0;
  transition: opacity 0.5s , visibility 0.5s;
}
.facture .form-control {
  width: 100%;
  border: none;
  border-bottom: 1px solid rgb(134 255 249 /65%);
  background: none;
  outline: none;
  padding: 10px 5px;
  margin-bottom: 20px;
  color: #fff;
}

.facture .form-control::placeholder {
  color: rgb(134 255 249 /65%);
}
.facture .formButton{
  border: 1px solid transparent;
  padding: 1rem 3rem;
  background-color: #94f7e6;
  border-radius: 50px;
  margin-top: 1rem;
  font-size: 1rem;
  transition: transform 0.5s, box-shadow 0.5s
}
.facture .formButton:hover{
  box-shadow: 3px 5px 15px #94f7e6;
   transform: translateY(-5px);
}
</style>
<div class="paiement-container ">
  <div class="container bg-light  py-3">
   <div class="nav-buttons  py-3">
    <ul class="nav d-flex justify-content-around my-2">
       <li class="nav-item">
        {{-- <button type="button" class="btn btn-outline-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
           </svg>
           Ajouter une paiement 
          </button> --}}
          <a href="/paiement/1/create" class="btn btn-primary btn-floating"><span class="fa fa-plus"></span><br>ajouter un paiement</a>
       </li>
        <li class="nav-item">
            <button class="btn btn-primary btn-floating"><span class="fa-solid fa-cloud-arrow-up"></span><br>Importer un paiement</button>
        </li>
        <li class="nav-item">
            <button class="btn btn-primary btn-floating"><span class="fa-solid fa-file-arrow-down"></span><br>Exporter un paiement</button>
        </li>
   
        <li class="nav-item">
            <button class="btn btn-primary btn-floating"><span class="fa-solid fa-building-columns"></span><br>Annuler un paiement</button>
        </li>
    </ul>
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
        <div>
          <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            [éditer]
          </button>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">Paiments</div>
        <div class="panel-body">
          <table id="myTable" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Facture</th>
                    <th>Date de facturation</th>
                    <th>Nom du Client</th>
                    <th>Type du paiement</th> 
                    <th>Description</th>
                    <th>Compte bancaire</th>
                    <th>Date du paiement</th>
                    <th>Montant</th>
                    <th> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></th>
                </tr>
            </thead>
            <tbody>
              @foreach ($paiements as $paiement)
              <tr id="{{ $paiement->id }}">
                <td>{{ $paiement->facture->numero_fact}}</td>
                <td>{{ $paiement->facture->date_facturation}}</td>
                @if (($paiement->facture->facturable_type)==="App\Models\Client_Personne")
                <td>  
                  {{ $paiement->facture->facturable->nom}} {{ $paiement->facture->facturable->prenom}}
                </td>
                @else
                <td>  
                  {{ $paiement->facturee->facturable->name}}
                </td>
                @endif
                <td>{{ $paiement->mode_paiement}} </td>
                <td>{{ $paiement->description}}</td>
                
                <td>{{ $paiement->compte_bancaire}}</td>
                <td>{{ $paiement->created_at}}</td>
                <td>{{ $paiement->montant}}</td>
                <td> <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
            </tr>
              @endforeach
            </tbody>
            {{-- <tfoot>
                <tr>
                  <th>Numéro</th>
                  <th>Nom du client</th>
                  <th>Description</th>
                  <th>Date de la paiement</th>
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

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header p-0">
          {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> --
        class="form-control @error('assurance') is-invalid @enderror" name="assurance" value="{{old('assurance')}}" --}}
          <button type="button" class="btn-close p-2"data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body py-0">
          <section class=" facture d-flex justify-content-center align-items-center mt-0">
           <div class="sec-container m-0">
            <div class="form-wrapper d-flex justify-content-center align-items-center">
              <div class="card">
                  <div class="card-header d-flex justify-content-around align-items-center text-center">
                      <div id="Produit" class="form-header active">Paiements</div>
                      {{-- <div id="Service" class="form-header">Service</div> --}}
                  </div>
                  <div class="card-body d-flex text-center" id="formContainer">
                    {{-- //form1 --}}
                      <form action="/1/produit" id="formProduit" method="POST" enctype="multipart/form-data">
                        @csrf
                          <input type="text" placeholder="nom" name="compte_bancaire"  class="form-control @error('nom') is-invalid @enderror">
                           @error('nom')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
  
                          <input type="text" placeholder="code comptable" name="code_comptable"  class="form-control @error('code_comptable') is-invalid @enderror">
  
                          @error('code_comptable')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                             @enderror
                             
                          <input type="text" placeholder="prix" name="prix"   class="form-control @error('prix') is-invalid @enderror">
                          @error('prix')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
  
                          <input type="text" placeholder="quantité" name="quantite"  class="form-control @error('quantite') is-invalid @enderror">
                          @error('quantite')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          <input type="text" placeholder="TVA %" name="TVA"  class="form-control @error('TVA') is-invalid @enderror">
                          @error('TVA')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                           <div class="form-floating">
                          <textarea  name="description" placeholder="description" id="floatingTextarea" name="description" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror"></textarea>
                          {{-- <label for="floatingTextarea">Description</label> --}}
                          @error('description')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>   
                          <button class="formButton" type="submit">ajouter produit</button>
                          {{-- <button  class="formButton">annuler produit</button>  --}}
                      </form>
  
                      {{-- //form2 --}}
                      <form action="/1/service" id="formServ" class="toggleForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" placeholder="nom" name="nom"  class="form-control @error('nom') is-invalid @enderror">
                           @error('nom')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
  
                          <input type="text" placeholder="code comptable" name="code_comptable"  class="form-control @error('code_comptable') is-invalid @enderror">
  
                          @error('code_comptable')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                             @enderror
                             
                          <input type="text" placeholder="prix" name="prix"   class="form-control @error('prix') is-invalid @enderror">
                          @error('prix')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
  
                          <input type="text" placeholder="quantité" name="quantite"  class="form-control @error('quantite') is-invalid @enderror">
                          @error('quantite')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                          <input type="text" placeholder="TVA %" name="TVA"  class="form-control @error('TVA') is-invalid @enderror">
                          @error('TVA')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                       <div class="form-floating">
                          <textarea  name="description" placeholder="description" id="floatingTextarea" name="description" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror"></textarea>
                          {{-- <label for="floatingTextarea">Description</label> --}}
                          @error('description')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>  
                          <button type="submit" class="formButton">ajouter service</button>
                           {{-- <button class="formButton">annuler service</button>  --}}
                      </form>
                  </div>
              </div>
          </div>
        </div>
      </section> 
    </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
   {{--  --}}
  
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
       window.location.href = `/paiement/${ligne.getAttribute('id')}/edit`;
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
                        <a onclick="window.location.href='/app/paiements/edit/'; return false;" id="ContentPlaceHolder_AddNewInvoice" class="btn btn-default add icon" href="javascript:__doPostBack('ctl00$ContentPlaceHolder$AddNewInvoice','')">Ajouter une paiement</a>
                        <a href="javascript:void(0)" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="padding-bottom: 7px;"><span class="caret"></span></a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="javascript:void(0)" onclick="document.location.href='/app/paiements/progressive/';" class="btn btn-default  add icon">Ajouter une paiement progressive</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a id="ContentPlaceHolder_HyperLink2" class="btn btn-default icon warning" href="recurring/paiementr/">paiements récurrentes en attente</a>
                    </li>
                    <li><a href="/app/config/import/?type=invoice" class="btn btn-default icon import">Importer des paiements</a></li>
                    <li><a id="ContentPlaceHolder_exportbtn" class="btn btn-default icon export-excel" href="javascript:__doPostBack('ctl00$ContentPlaceHolder$exportbtn','')">Exporter des paiements</a></li>
                    <li>
                        <a id="ContentPlaceHolder_HyperLink1" class="btn btn-navigation  icon recurring" href="recurring/">paiements récurrentes</a>

                    </li>
                    <li>
                        <a id="ContentPlaceHolder_HyperLink3" class="btn btn-navigation icon payment" href="../paiements/">Paiements</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div> --}}
