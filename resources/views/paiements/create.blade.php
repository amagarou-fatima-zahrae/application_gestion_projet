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
    .formulaire{
      margin: 50px 0;
    }
    .formulaire .form-wrapper{
   flex:auto;
}
  /* .show{
    visibility: visible;
      opacity: 1;
  } */

  .formulaire .form-wrapper .card {
      
      width:600px ;
      padding: 20px;
      background-color: rgb(0 0 0  /45%);
      visibility: visible;
      opacity: 1;
      transition: visibility 0.5s , opacity 0.5s;
  }
   .form-wrapper{ 
    height: 715px;
  }
  .formulaire .card-header{
      margin: 30px 20px 0;
      font-size: 1.1rem;
      color: #94f7e6;
      box-shadow: 2px 3px 8px #d3f7ff71;
      border-radius: 50px;
      
  }
  .formulaire .card-header .form-header{
    flex:50%;
    align-items: center;
    padding: 10px 0;
    border: 1px solid transparent;
    border-radius: 50px;
    user-select: none;
    cursor: pointer;
  }
  .formulaire .card-header .form-header.active{
    box-shadow: inset 1px 1px 2px rgb(19 210 177 / 55%), inset -1px 1px 2px rgb(19 210 177 / 55%) , inset -1px 1px 2px rgb(19 210 177 / 55%) , inset 1px 1px 2px rgb(19 210 177 / 55%);
    border-color: #94f7e6;
    transition: border-color 0.5s, box-shadow 0.5s
  }
  .formulaire .card-body{
     /*flex-wrap:nowrap; */
      padding: 40px 0;
  }
  form{
      flex: 0 0 100%;
  }
   .form-control {
    width: 100%;
    border: none;
    border-bottom: 1px solid rgb(134 255 249 /65%);
    background: none;
    outline: none;
    padding: 10px 5px;
    margin-bottom: 20px;
    color: #fff;
  }
  
  .formulaire .form-control::placeholder {
    color: rgb(134 255 249 /65%);
  }
  .formulaire .formButton{
    border: 1px solid transparent;
    padding: 1rem 3rem;
    background-color: #94f7e6;
    border-radius: 50px;
    margin-top: 1rem;
    font-size: 1rem;
    transition: transform 0.5s, box-shadow 0.5s
  }
  .formulaire .formButton:hover{
    box-shadow: 3px 5px 15px #94f7e6;
     transform: translateY(-5px);
  }
  .select {
    background-color: transparent;
  }
</style>
{{--  --}}
<div class="paiement-container ">
  <div class="container py-3">
   {{-- <div class="nav-buttons  py-3">
    <ul class="nav d-flex justify-content-around my-2">
       <li class="nav-item">
          <a href="" class="btn btn-primary btn-floating"><span class="fa fa-plus"></span><br>ajouter un paiement</a>
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
   </div> --}}

   <div class="tab py-5">
    <div class="container bg-light  pb-3">
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
                  <tr >
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
                    <td> <input class="form-check-input" type="checkbox"  id="{{ $facture->id }}"></td>
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

        <div class="formulaire d-none"  >
          <div class="row justify-content-between align-items-center">
              <div class="col-md-12 col-lg-4 ">

              </div>
              <div class="col-md-12 col-lg-8 form-wrapper d-flex justify-content-center align-items-center">
                <div class="card">
                      <div class="card-header d-flex justify-content-around align-items-center text-center">
                          <div id="Produit" class="form-header active">Paiement</div>
                      </div>
                      <div class="card-body d-flex text-center" id="formContainer">
                      <form action="1/paiement/create" id="formPay" method="POST" enctype="multipart/form-data">
                          @csrf
                            <input type="text" placeholder="montant choisi " name="compte_bancaire"  class="form-control @error('nom') is-invalid @enderror">
                             @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
    
                            <input type="text" placeholder="MM/DD/YYYY"   name="date_pay"  class="form-control @error('date_pay') is-invalid @enderror">
    
                            @error('date_pay')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                               
                            <input type="text" placeholder="montant à payer" name="montant"   class="form-control @error('montant') is-invalid @enderror">
                            @error('montant')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
    
                            <input type="text" placeholder="compte bancaire" name="comte_bancaire"  class="form-control @error('quantite') is-invalid @enderror">
                            @error('quantite')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <select name="mode_pay" id="select" class="form-select form-control" style="color:rgb(134 255 249 /65%);">
                              <option value="imposi" disabled selected>[choisir mode paiement] </option>
                              
                                <option value="Paypal">Paypal</option>
                                <option value="Stripe">Stripe</option>
                                <option value="Banque">Banque</option>
                                <option value="Indéfini">Indéfini</option>
                             </select>
                             @error('mode_pay')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span> 
                             @enderror
                             <div class="form-floating">
                            <textarea  name="description" placeholder="description" id="floatingTextarea" name="description"  class="form-control @error('description') is-invalid @enderror"></textarea>
                            {{-- <label for="floatingTextarea">Description</label> --}}
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>   
                            <button class="formButton" type="submit">Appliquer</button>
                        </form>
                      </div>
                  </div>
                  </div>
             </div>
            </div>
   </div>
  </div>

</div>


<script>
//    var table = document.getElementById('example');
//    //console.log(table);
//     var rows = table.getElementsByTagName("tr");
//    console.log(typeof rows);
//     lignes = [];
//     for (i = 1; i < rows.length; i++) {
//       lignes.push(rows[i]);
//     }
//    lignes.forEach(ligne => {
//        ligne.addEventListener('click',function(){
//        window.location.href = `/paiement/${ligne.getAttribute('id')}/edit`;
// });
//     });

/////////////////§§§§§§§§/////////////////
const checkboxes = document.querySelectorAll('input[type="checkbox"]');
const form = document.querySelector('.d-none');



//console.log(form);
//console.log(checkboxes);
for (let i = 0; i < checkboxes.length; i++) {
  checkboxes[i].addEventListener('click', function() {
    if (this.checked) {
        for (let j = 0; j < checkboxes.length; j++) {
          if (j !== i) {
            checkboxes[j].disabled = true;
          }
      }
        ///ajax
        id = this.id;
        //console.log(id);
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/get-data?id=' + id);
        xhr.onreadystatechange = function() {
             if (xhr.readyState === XMLHttpRequest.DONE) {
               if (xhr.status === 200) {
              //  console.log(xhr.responseText);
                  var data = JSON.parse(xhr.responseText);
                // process the data
              } else {
                console.log('Error: ' + xhr.status + ' ' + xhr.statusText);
               }
           }
       };
        xhr.send();
//////////////////////////////////
    form.classList.remove('d-none');
      
     // console.log('Selected checkbox: ', checkboxes[i]);
    } else {
        form.classList.add('d-none');
      for (let j = 0; j < checkboxes.length; j++) {
        checkboxes[j].disabled = false;
      }
    }
  });
}

/////
document.forms[0][name="date_pay"].addEventListener('focus',function(){
    //console.log(this);
   this.type='date';
})
document.forms[0][name="date_pay"].addEventListener('blur',function(){
    //console.log(this);
   this.type='text';
})
////
document.forms[0][name="mode_pay"].addEventListener('focus',function(){
    //console.log(this);
   this.style.color ="black";
   this.style.backgroundColor="white";
   console.log(this);
})
document.forms[0][name="mode_pay"].addEventListener('blur',function(){
    //console.log(this);
   this.style.color ="white";
   this.style.backgroundColor="transparent";
   console.log(this);
})
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
