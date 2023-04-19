<!doctype html>

    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" /> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" ></script>
        <title>facture</title>
    </head>
    <body>


    <style>
    /*css*/
    </style>
    <br>
    <div class="facture-form  py-3">
        <div class="container">
          {{-- header --}}
          <div class="head-fact row bg-secondary mb-3">
              <div class="col-6">
                  <h2>facture {{ $facture->numero_fact }}</h2>
              </div>
          </div>
        </div>
      
        {{-- // facture champs --}}
        <div class="facture-content my-3 py-3  ">
          <div class="container bg-light">
             
              <div class="header row justify-content-between align-items-center py-3">
                {{-- <div class="col-lg-3 col-md-12 d-flex justify-content-center">
                  <img src="{{$user}}" alt="" class="rounded-circle w-50">
                </div> --}}
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
                              <p class="input-group-text">De:</p>
                              <div class="col-lg-6 col-md-12 ">
                                  <div class="input-group w-100 mb-3">
                                      <span class="input-group-text " id="inputGroup-sizing-default">Nom de Société</span>
                                      <p class="input-group-text">{{$user->name}}</p>
                                  </div>    
                               </div>
                               <div class="col-lg-6 col-md-12">
                                  <div class="input-group w-100 mb-3">
                                      <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                                     <p class="input-group-text">{{$user->email}}</p>
                
                                  </div>    
                               </div>
                               <div class="col-lg-6 col-md-12">
                                  <div class="input-group  w-100 mb-3">
                                      <span class="input-group-text" id="inputGroup-sizing-default">Code Postal</span>
                                     
                                      <p class="input-group-text">{{$user->code_postal}}</p>
                                         
                                  </div>    
                               </div>
                               <div class="col-lg-6 col-md-12">
                                  <div class="input-group  w-100 mb-3">
                                      <span class="input-group-text" id="inputGroup-sizing-default">Tel</span>
                                      <p class="input-group-text">{{$user->tel}}</p>
                              
                                  </div>    
                               </div>
                               <div class="col-lg-6 col-md-12">
                                  <div class="input-group w-100 mb-3">
                                      <span class="input-group-text" id="inputGroup-sizing-default">N° compte bancaire</span>
                                      <p class="input-group-text" >{{$user->compte_bancaire}}</p>
                                      
                                  </div>    
                               </div>
                               <div class="col-lg-6 col-md-12">
                                  <div class="input-group w-100 mb-3">
                                      <span class="input-group-text" id="inputGroup-sizing-default">Site Web</span>
                                       <p class="input-group-text">{{$user->site_web}}</p>
                                  </div>    
                               </div>
                               <div class="col-lg-6 col-md-12">
                                  <div class="input-group w-100 mb-3">
                                      <span class="input-group-text" id="inputGroup-sizing-default">Fax</span>
                                      <p class="input-group-text">{{$user->fax}}</p>
                                  </div>    
                               </div>
                               <div class="col-lg-6 col-md-12">
                                  <div class="input-group w-100 mb-3">
                                      <span class="input-group-text" id="inputGroup-sizing-default">Adresse</span>
                                      <p class="input-group-text">{{$user->address}}</p>
                                  </div>    
                               </div>
                          </div>
      
                           <hr>
                           
      
                          {{-- // partie down --}}
                          <div class="partie2 row py-3 justify-content-between">
                             <div class="col-12 d-flex text-center align-items-center py-2 row">
                                <div class="col-lg-12 parag"><p class="input-group-text">Facturé à:</p></div>
                             </div>
                             @if ($facture->facturable_type==='App\Models\Client_Personne')
                             <div class="col-lg-6 col-md-12">
                              <div class="input-group w-100 mb-3">
                                  <span class="input-group-text " id="inputGroup-sizing-default">Nom de Client</span>
                                  <p class="input-group-text">{{ $client->prenom }} {{$client->nom}}</p>
                              </div>    
                           </div>
                           @else 
                           
                           <div class="col-lg-6 col-md-12">
                              <div class="input-group w-100 mb-3">
                                  <span class="input-group-text " id="inputGroup-sizing-default">Nom de Client</span>
                                  <p class="input-group-text">
                                    {{$client->name}}
                                  </p>
                                 
                              </div>    
                           </div>
                          @endif
                              
                               <div class="col-lg-6 col-md-12">
                                  <div class="input-group  w-100 mb-3">
                                      <span class="input-group-text" id="inputGroup-sizing-default">Adresse</span>
                                     <p class="input-group-text">{{$client->address}}</p>
                                  </div>    
                               </div>
                               <div class="col-lg-6 col-md-12">
                                  <div class="input-group w-100 mb-3">
                                      <span class="input-group-text" id="inputGroup-sizing-default">Code Postal</span>
                                      <p class="input-group-text">{{$client->code_postal}}</p>
                                  </div>    
                               </div>
                               <div class="col-lg-6 col-md-12">
                                  <div class="input-group mb-3">
                                      <span class="input-group-text" id="inputGroup-sizing-default">Tel</span>
                                     <p class="input-group-text">{{$client->tel}}</p>
                                  </div>    
                               </div>
                               <div class="col-lg-6 col-md-12">
                                  <div class="input-group w-100 mb-3">
                                      <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                                     <p class="input-group-text">{{$client->email}}</p>
                                  </div>    
                               </div>
                               <div class="col-lg-6 col-md-12">
                                  <div class="input-group w-100 mb-3">
                                      <span class="input-group-text" id="inputGroup-sizing-default">Fax</span>
                                     <p class="input-group-text">{{$client->fax}}</p>
                                  </div>    
                               </div>
                          </div>
                      </div>
      
                      <div class="info-droite col-lg-4 row py-3">
                          <div class="col-lg-12">
                              <div class="input-group w-100 mb-3">
                                  <span class="input-group-text" >N° Client</span>
                                  <p class="input-group-text">{{$client->N_Client}}</p>
                              </div>    
                           </div>
                           <div class="col-lg-12">
                              <div class="input-group w-100 mb-3">
                                  <span class="input-group-text" id="inputGroup-sizing-default">N° Facture</span>
                                  <p class="input-group-text">{{$facture->numero_fact}}</p>
                              </div>    
                           </div>
                           <div class="col-lg-12">
                              <div class="input-group w-100 mb-3">
                                  <span class="input-group-text" id="inputGroup-sizing-default">Date facture</span>
                                  <p class="input-group-text">{{$facture->date_facturation}}</p>
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
                                  <p class="input-group-text">{{$facture->date_echeance}}</p>
                              </div>    
                           </div>
                           <div class="col-lg-12">
                              <div class="input-group w-100 mb-3">
                                  <span class="input-group-text" id="inputGroup-sizing-default">N° Bon de commande</span>
                                  <p class="input-group-text">{{ $facture->N_bon_commande }}</p>
                              </div>    
                           </div>
                           <div class="col-lg-12">
                            <div class="input-group w-100 mb-3">
                              <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                             <p class="input-group-text">{{ $facture->description }}</p>
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
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($produits as $prod) 
                          <tr >
                            <td >{{ $prod->nom }}</td></td>
                            <td >{{ $prod->description }}</td>
                            <td >{{ $prod->prix }}</td>
                            <td >{{ $prod->factures()->where('facture_id',$facture->id)->first()->pivot->quantite_vendue }}</td>
                            <td >{{ $prod->TVA }}</td>
                            <td >{{ ($prod->factures()->where('facture_id',$facture->id)->first()->pivot->quantite_vendue)*$prod->prix*(1+$prod->TVA)}}</td>
                          </tr>
                          @endforeach
                          @foreach ($services as $service) 
                          <tr >
                              <td >{{ $service->nom }}</td></td>
                              <td >{{ $service->description }}</td>
                              <td >{{ $service->prix }}</td>
                              <td >{{ $service->factures()->where('facture_id',$facture->id)->first()->pivot->quantite_vendue }}</td>
                              <td >{{ $service->TVA }}</td>
                              <td >{{ ($service->factures()->where('facture_id',$facture->id)->first()->pivot->quantite_vendue)*$prod->prix*(1+$prod->TVA)}}</td>
                            </tr>
                          @endforeach
                      </tbody>
              </table>
              {{-- // final-champs --}}
              <div class="final-info row d-flex justify-content-between align-items-center py-3">
                  <div class="col-lg-6 col-12-sm remarques">
                    <div class="input-group w-100 mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                     <p class="input-group-text">{{ $facture->conditions_modalites }}</p>
                    </div>  
                      
                  </div>
                  <div class=" col-lg-4 col-12-sm total-prix text-center">
                    <div class="input-group w-100 mb-3">
                      <span class="input-group-text" id="inputGroup-sizing-default">Total Prix à Payer</span>
                     <p class="input-group-text">{{ $facture->total }}</p>
                    </div> 
                  </div>
              </div>
          </div>
        </div>
      
      </div>
     </body>
    </html>




