@extends('template.masterPage')
@section('extra-js')
 <script>
 
  
    // select2
$(document).ready(function() { 
    $("#client").select2();
});


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
<div class="facture-form  py-3">
  <div class="container">
    {{-- header --}}
    <div class="head-fact row bg-secondary mb-3">
        <div class="col-6">
            <h2>facture #n</h2>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center gap-3">
            <a href="#"> <i class="fa fa-dollar fa-lg"></i></a>
            <a href="#"><i class="fa fa-paperclip fa-lg"></i></a>
            <a href="#"><i class="fa fa-history fa-lg"></i></a>
            <a href="#"><i class="fa-solid fa-file fa-lg"></i></a>
        </div>
    </div>
  </div>
  
    {{-- buttons --}}
    <form method="POST" action="/1/facture/create"  class="mx-5" enctype="multipart/form-data">
      @csrf
    <nav class="navbar navbar-expand-lg ">
        <div class="container d-flex justify-content-center bg-light px-0">
            <button type="submit" class="btn btn-success me-3">Enregistrer</button>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li>
                <a id="ContentPlaceHolder_DeconsteButton" class="btn btn-danger navbar-btn icon deconste" href="javascript:void(0)">Supprimer</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Envoyer</a>
              </li>
              <select class="form-select" name="statut" style="background-color: transparent;border:none;">
                <option value="status" disabled selected>Status</option>
                <option value="Brouillon">Brouillon</option>
                <option value="émise">émise</option>
                <option value="Payée">Payée</option>
              </select>
              {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Status
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Brouillon</a></li>
                  <li><a class="dropdown-item" href="#">émise</a></li>
                  <li><a class="dropdown-item" href="#">Payée</a></li>
                </ul>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link" href="#">Importer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Exporter</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

  {{-- // facture champs --}}
  
  <div class="facture-content my-3 py-3  ">
    <div class="container bg-light">
       
        <div class="header row justify-content-between align-items-center py-3">
          <div class="col-lg-3 col-md-12 d-flex justify-content-center">
            <img src="{{$user}}" alt="" class="rounded-circle w-50">
          </div>
          <div class="col-lg-3 col-md-12 text-center">
            FACTURE
          </div>
        </div>
        
        {{-- info à remplir --}}
      
        <div class="fact-info my-3">
            <div class="info row gap-2 justify-content-between">
                <div class="info-gauche col-lg-7 py-3">
                   
                    {{-- // partie UP --}}
                    <div class="partie1 row  justify-content-between ">
                        <p>De:</p>
                        <div class="col-lg-6 col-md-12 ">
                            <div class="input-group w-100 mb-3">
                                <span class="input-group-text " id="inputGroup-sizing-default">Nom de Société</span>
                                <input type="text"  name="nom_Entrep" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" 
                                value="{{$nom_Entreprise}}" readonly class="form-control @error('nom_Entrep') is-invalid @enderror" >
                            </div>    
                         </div>
                         <div class="col-lg-6 col-md-12">
                            <div class="input-group w-100 mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                                <input type="email"  name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                value="{{$Email}}" readonly class="form-control @error('email') is-invalid @enderror" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                            </div>    
                         </div>
                         <div class="col-lg-6 col-md-12">
                            <div class="input-group  w-100 mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Code Postal</span>
                                <input type="text"  name="codePostal" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                value="{{$codePostal}}" readonly class="form-control @error('codePostal') is-invalid @enderror">
                            </div>    
                         </div>
                         <div class="col-lg-6 col-md-12">
                            <div class="input-group  w-100 mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Tel</span>
                                <input type="text"  name="tel_entrep" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                value="{{$tel}}" readonly class="form-control @error('tel_entrep') is-invalid @enderror" >
                            </div>    
                         </div>
                         <div class="col-lg-6 col-md-12">
                            <div class="input-group w-100 mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">N° compte bancaire</span>
                                <input type="text"  name="N_cptBancaire" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                value="{{$N_cptBancaire}}" readonly class="form-control @error('N_cptBancaire') is-invalid @enderror" >
                            </div>    
                         </div>
                         <div class="col-lg-6 col-md-12">
                            <div class="input-group w-100 mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Site Web</span>
                                <input type="text"  name="site_web" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                value="{{$site_web}}" readonly class="form-control @error('site_web') is-invalid @enderror" >
                            </div>    
                         </div>
                         <div class="col-lg-6 col-md-12">
                            <div class="input-group w-100 mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Fax</span>
                                <input type="text"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                value="{{$fax}}" readonly class="form-control @error('Messagecontenty') is-invalid @enderror" >
                            </div>    
                         </div>
                         <div class="col-lg-6 col-md-12">
                            <div class="input-group w-100 mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Adresse</span>
                                <input type="text"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                value="{{$address}}" readonly class="form-control @error('Messagecontenty') is-invalid @enderror"  >
                            </div>    
                         </div>
                    </div>

                     <hr>
                     

                    {{-- // partie down --}}
                    <div class="partie2 row py-3 justify-content-between">
                       <div class="col-12 d-flex text-center align-items-center py-2 row">
                          <div class="col-lg-12 parag"><p>Facturé à:</p></div>
                          <div class="col-lg-12  choixClient row justify-content-between align-items-center text-center ">
                             <div class="col-lg-6 col-md-12">
                               <select name="entrep_personne" id="select" class="form-select">
                                <option disabled selected>[choisir client] </option>
                                 @foreach ($clients_Personne as $client_pers)
                                 {{-- <li class="nav-item ms-4"> --}}
                                  <option value="P{{$client_pers->id}}">{{$client_pers->prenom}} {{$client_pers->nom}} </option>
                                 {{-- </li> --}}
                                 @endforeach
                                 @foreach ( $clients_Entrep  as $client_Entrep)
                                 {{-- <li class="nav-item ms-4"> --}}
                                  <option value="E{{$client_Entrep->id}}" >{{$client_Entrep->name}}</option>
                                 {{-- </li>   --}}
                                 @endforeach
                               </select>
                             </div>
                             <div class="col-lg-6 col-md-12">
                               <button  class="btn btn-outline-success" href="#" >ajouter Client</button>
                             </div>
                           </div>
                       </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="input-group w-100 mb-3">
                                <span class="input-group-text " id="inputGroup-sizing-default">Nom de Client</span>
                                <input type="text"  name="nom_Client" aria-label="Sizing example input"  aria-describedby="inputGroup-sizing-default"
                                readonly class="form-control @error('nom_Client') is-invalid @enderror"  value="{{old('nom_Client')}}" >
                               
                            </div>    
                         </div>
                         <div class="col-lg-6 col-md-12">
                            <div class="input-group  w-100 mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Adresse</span>
                                <input type="text"  name="address_Client" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                 readonly class="form-control @error('address_Client') is-invalid @enderror"  value="{{old('address_Client')}}">
                            </div>    
                         </div>
                         <div class="col-lg-6 col-md-12">
                            <div class="input-group w-100 mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Code Postal</span>
                                <input type="text"  name="codePostal_Client" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                 readonly class="form-control @error('codePostal_Client') is-invalid @enderror"  value="{{old('codePostal_Client')}}">
                            </div>    
                         </div>
                         <div class="col-lg-6 col-md-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Tel</span>
                                <input type="text"  name="tel_Client" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                 readonly class="form-control @error('tel_Client') is-invalid @enderror"  value="{{old('tel_Client')}}">
                            </div>    
                         </div>
                         <div class="col-lg-6 col-md-12">
                            <div class="input-group w-100 mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                                {{-- value="{{ old('email')}}" --}}
                                <input type="email"  name="email_Client" aria-label="Sizing example input"  aria-describedby="inputGroup-sizing-default"
                                 readonly class="form-control @error('email_Client') is-invalid @enderror"  value="{{old('email_Client')}}">
                            </div>    
                         </div>
                         <div class="col-lg-6 col-md-12">
                            <div class="input-group w-100 mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Fax</span>
                                <input type="text"  name="fax_Client" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                                 readonly class="form-control @error('address_Client') is-invalid @enderror"  value="{{old('address_Client')}}">
                            </div>    
                         </div>
                    </div>
                </div>

                <div class="info-droite col-lg-4 row py-3">
                    <div class="col-lg-12">
                        <div class="input-group w-100 mb-3">
                            <span class="input-group-text" >N° Client</span>
                            <input type="text"  name="num_client" id="numero_cli" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                             readonly class="form-control">
                        </div>    
                     </div>
                     <div class="col-lg-12">
                        <div class="input-group w-100 mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">N° Facture</span>
                            <input type="text" name="numero_fact" value="{{$numero}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            class="form-control @error('numero_fact') is-invalid @enderror">
                            @error('numero_fact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>    
                     </div>
                     <div class="col-lg-12">
                        <div class="input-group w-100 mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Date facture</span>
                            <input type="date" name="date_facturation" value="{{$date_fact}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            class="form-control @error('date_facturation') is-invalid @enderror">
                            @error('date_facturation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>    
                     </div>
                     {{-- <div class="col-lg-12">
                        <div class="input-group w-100 mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Date Livraison</span>
                            <input type="date"  value="{{$now}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>    
                     </div> --}}
                     <div class="col-lg-12">
                        <div class="input-group w-100 mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Date Echéance</span>
                            <input type="date" name="date_echeance" value="{{$date_fin}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            class="form-control @error('date_echeance') is-invalid @enderror">
                            @error('date_echeance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>    
                     </div>
                     <div class="col-lg-12">
                        <div class="input-group w-100 mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">N° Bon de commande</span>
                            <input type="text" name="N_bon_commande"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                            class="form-control @error('N_bon_commande') is-invalid @enderror">
                            @error('N_bon_commande')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>    
                     </div>
                     <div class="col-lg-12">
                        <div class="form-floating w-100">
                            <textarea  placeholder="Leave a comment here" id="floatingTextarea" name="description" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror"></textarea>
                            <label for="floatingTextarea">Description</label>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                          </div>   
                     </div>
                </div>
            </div>
        </div>

    </div>
  </div>
  <hr>
                              
 

{{-- ---- --}}

  {{-- table--}}
  <div class="table-fact">
    <div class="container">
        <table id="idTable" class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Services/Produits</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix(HT)</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">TVA %</th>
                    <th scope="col">TTC</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center gap-3">
          <div>
            <button type="button" id="ajoutL" onclick="insererLigne_Fin()" class="btn btn-outline-success py-2">ajouter une ligne</button>
          </div>
            <!-- Button trigger modal -->
          <div>
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
              [ajouter Produit/Service]
            </button>
          </div>
        </div>
       
       
        
        {{-- // final-champs --}}
        <div class="final-info row d-flex justify-content-between align-items-center py-3">
            <div class="col-lg-6 col-12-sm remarques">
                <div class="form-floating">
                    <textarea  placeholder="conditions d'escompte, paiement,retard" id="floatingTextarea2" style="height: 100px" name="condition" value="{{old('condition')}}" class="form-control @error('condition') is-invalid @enderror"></textarea>
                    <label for="floatingTextarea2">Conditions et remarques
                    </label>
                </div>
            </div>
            <div class=" col-lg-4 col-12-sm total-prix text-center">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Total Prix à Payer</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="text"  name="total" value="0000" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                          readonly class="form-control"></td>
                      </tr>
                    </tbody>
                </table>
            </div>
            <input type="text"  name="nb" id="nb" class="d-none">
        </div>
    </div>
  </div>
</form>

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
                    <div id="Produit" class="form-header active">Produit</div>
                    <div id="Service" class="form-header">Service</div>
                </div>
                <div class="card-body d-flex text-center" id="formContainer">
                  {{-- //form1 --}}
                    <form action="/1/produit" id="formProduit" method="POST" enctype="multipart/form-data">
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
</div>
{{-- JSON --}}
<p id="pers" class="d-none">{{$clients_Personne}} </p>
 <p id="entrep" class="d-none">{{$clients_Entrep}} </p>
 <p id="prods" class="d-none">{{$prods}} </p>
 <p id="servs" class="d-none">{{$servs}} </p>

               {{-- script JS--}}

<script>
  // const card=document.querySelector('.form-wrapper .card');
//  const buttonAjout = get('ajoutClient');
 const ButtService=get('Service');
 const ButtProduit = get('Produit');
 const formProduit = get('formProduit');
 const formServ = get('formServ');
 const formContainer = get('formContainer');
// console.log(formContainer);
//console.log(formServ);
//  buttonAjout.addEventListener('click',showForm);

 ButtProduit.addEventListener('click',()=>{
 
 ButtService.classList.remove('active');
 ButtProduit.classList.add('active');
  if(formProduit.classList.contains('toggleForm')){
       formContainer.style.transform = 'translate(0%)';
       formContainer.style.transition = 'transform 0,3s';
       formProduit.classList.remove('toggleForm');
       formServ.classList.add('toggleForm');
  }
});
ButtService.addEventListener('click',()=>{
 
  ButtProduit.classList.remove('active');
  ButtService.classList.add('active');
   if(formServ.classList.contains('toggleForm')){
        formContainer.style.transform = 'translate(-100%)';
        formContainer.style.transition = 'transform 0,3s';
        formServ.classList.remove('toggleForm');
        formProduit.classList.add('toggleForm');
   }
});
   
// ajout ligne
function insererLigne_Fin(){
  nb++;
  tab.push(nb);
  var inputNb=get('nb');
  
  inputNb.value=tab;
  //console.log("insert :"+inputNb.value);
  //console.log('lo'+inputNb.value);
    var cell, ligne;
 
    // on récupère l'identifiant (id) de la table qui sera modifiée
    var tableau = document.getElementById("idTable");
    // nombre de lignes dans la table (avant ajout de la ligne)
    var nbLignes = tableau.rows.length;
 
    ligne = tableau.insertRow(-1); // création d'une ligne pour ajout en fin de table
                                   // le paramètre est dans ce cas (-1)
    ligne.id="ligne_"+nb;
    // création et insertion des cellules dans la nouvelle ligne créée
    cell = ligne.insertCell(0);
    cell.innerHTML =` 
    <select name="prod_serv${nb}" id="prod_serv${nb}" class="form-select selectpicker" data-live-search="true">
      <optgroup label="Produits">
        <option id="test${nb}">[choisir Item] </option>
           @foreach ($prods as $prod) 
          <option value="P{{ $prod->id }}">{{ $prod->nom }}</option>
          @endforeach
      </optgroup> 
      <optgroup label="Services">
            @foreach($servs as $serv)
            <option value="S{{ $serv->id }}">{{ $serv->nom }}</option>
            @endforeach
      </optgroup>       
    </select>`

    cell = ligne.insertCell(1);
    cell.innerHTML ='<textarea class="form-control" style="height:30px" name="description_prod'+nb+'"  id="floatingTextarea" readonly></textarea>';
 
    cell = ligne.insertCell(2);
    cell.innerHTML = '<input class="form-control" name="prix'+nb+'"   type="text" value="0.00" readonly />';
 
    cell = ligne.insertCell(3);
    cell.innerHTML ='<input class="form-control" name="quantite'+nb+'" type="number" value="0.00" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" />';
    cell = ligne.insertCell(4);
    cell.innerHTML ='<input class="form-control" type="text" name="tva'+nb+'" value="0.00"  readonly/>';
    cell = ligne.insertCell(5);
    cell.innerHTML ='<input  class="form-control" type="text" name="ttc'+nb+'" value="0.00"  readonly />';
    cell = ligne.insertCell(6);
    cell.innerHTML ='<i class="fas fa-trash fa-lg" style="color:#ca0b00;" id="dash'+nb+'" ></i>';
}
//////////////  Supprimer ligne /////////////////////////////////"
function supprimerLigne(id_ligne)
{
  
 table = get('idTable');
 ligne = get(id_ligne);
 var id_r = id_ligne.substring(6,id_ligne.length);
 console.log("haka"+id_r);
 var index = tab.indexOf(parseInt(id_r));
 console.log("index "+index);
 tab.splice(index, 1);
 var inputNb=get('nb');
 inputNb.value=tab;
 console.log("delete :"+inputNb.value);
 table.deleteRow(ligne.rowIndex); 
 document.forms[0][name="total"].value=total().toFixed(2);
}
/////////
var nb = -1;
var tab=[];
var btn = get('ajoutL');
btn.addEventListener('click',function(){
  //SUPPRIMER LIGNE
  var dash = get('dash'+nb);
 // console.log(dash);
  dash.addEventListener('click',function(){
  //  console.log(dash);
   ligne_id =dash.parentElement.parentElement.id;
   supprimerLigne(ligne_id);
  })
  ////////
  var drop = get('prod_serv'+nb);
  //console.log(nb);
  var prods=get('prods').innerText;
  var produits=JSON.parse(prods);
  var servs=get('servs').innerText;
  var services =JSON.parse(servs);
  //console.log(drop);
  //console.log(services);
  //console.log("COCO"+nb);
drop.addEventListener('change',function(){
  //console.log("CO"+nb);
  let selected=this.value;
  //console.log("c"+nb);
 get('test'+nb).style.display = 'none';
 
  //console.log();
  //console.log("lala");
  id_prod=parseInt(selected.substring(1,selected.lenght));  
     
 // console.log(quantite);
  if(selected[0]=='P'){
        for(let P of produits){
        if(P.id==id_prod){
          document.forms[0][name="description_prod"+nb].value=P.description;
          document.forms[0][name="prix"+nb].value=P.prix;
          document.forms[0][name="quantite"+nb].value=1;
          document.forms[0][name="quantite"+nb].min=1;
          document.forms[0][name="quantite"+nb].max=P.quantite;
          document.forms[0][name="tva"+nb].value=P.TVA;
          document.forms[0][name="ttc"+nb].value=P.prix*(1+P.TVA).toFixed(2);
          document.forms[0][name="total"].value=total().toFixed(2);
          break;
        }
       
      }
    }
      else if(selected[0]=='S') {
        for(let S of services){
          if(S.id==id_prod){
          document.forms[0][name="description_prod"+nb].value=S.description;
          document.forms[0][name="prix"+nb].value=S.prix;
          document.forms[0][name="quantite"+nb].value=1;
          document.forms[0][name="quantite"+nb].min=1;
          document.forms[0][name="quantite"+nb].max=S.quantite;
          document.forms[0][name="tva"+nb].value=S.TVA;
          document.forms[0][name="ttc"+nb].value=S.prix*(1+S.TVA).toFixed(2);
          document.forms[0][name="total"].value=total().toFixed(2);
          break;
        } 
      }
      }
      else{

      }

      ///quantite:
      console.log(nb+"kifax");
      var quantites = document.querySelectorAll('input[type=number]');
      quantites.forEach(quantite => {
       quantite.addEventListener('change', function(){
        var i =quantite.name[quantite.name.length-1];
        document.forms[0][name="ttc"+i].value=((quantite.value)*(document.forms[0][name="prix"+i].value)*(1+parseFloat(document.forms[0][name="tva"+i].value))).toFixed(2);
        document.forms[0][name="total"].value=total().toFixed(2);
       
      })
})
     /* for(var i=0;i<=nb;i++)
      console.log(i+'aww');
      {
       document.forms[0][name="quantite"+i].addEventListener('change',function()
      {
        
      })
      }*/
      
})

})

///////////
function total()
{
  var total = 0;
 // table = get('idTable');
 // var trs = table.rows;
   var n = tab.length; 
  //console.log("total :"+tab);
 tab.forEach(function(e){
 total+=parseFloat(document.forms[0][name="ttc"+e].value);
 });
 return total;
}
////////////////////////////////////////////////

    personne=get('pers').innerText;
    let clients_Personne =JSON.parse(personne);
    entreprise=get('entrep').innerText;
    let clients_Entrep =JSON.parse(entreprise);
    var elt = document.querySelector('#select');
    //console.log(elt);
    nom_client=document.forms[0][name="nom_Client"];
    address_Client=document.forms[0][name="address_Client"];
    codePostal_Client=document.forms[0][name="codePostal_Client"];
    tel_Client=document.forms[0][name="tel_Client"];
    email_Client=document.forms[0][name="email_Client"];
    fax_Client=document.forms[0][name="fax_Client"];
    numero=get("numero_cli");
    //console.log(numero);
		elt.addEventListener('change', function () {
      let selected=this.value;
      console.log(selected);
      id_client=parseInt(selected.substring(1,selected.lenght));  
      if(selected[0]=='P'){
        for(let P of clients_Personne){
        if(P.id==id_client){
          nom_client.value=P.nom+ " "+P.prenom;
          address_Client.value=P.address;
          codePostal_Client.value=P.code_postal;
          tel_Client.value=P.tel;
          email_Client.value=P.email;
          fax_Client.value=P.fax;
          numero.value=P.N_Client;
          break;
        }
       
      }
    }
      else if(selected[0]=='E') {
        for(let E of clients_Entrep){
          if(E.id==id_client){
          nom_client.value=E.name;
          address_Client.value=E.address;
          codePostal_Client.value=E.code_postal;
          tel_Client.value=E.tel;
          email_Client.value=E.email;
          fax_Client.value=E.fax;
          numero.value=E.N_Client;
          break;
        }
        
      }
      }
      else{

      }
		});
 
function get(e){
  return document.getElementById(e);
 }

//I don't know

</script>
@endsection

