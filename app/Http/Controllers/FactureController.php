<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Facture;
use App\Models\Produit;
use App\Models\Service;
use Barryvdh\DomPDF\PDF;
use App\Mail\FactureMail;
use Illuminate\Http\Request;
use IlluminateSupportCarbon;
use App\Models\Client_Entrep;
use Illuminate\Support\Carbon;
use PhpOffice\PhpWord\PhpWord;
use App\Models\Client_Personne;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpParser\Node\Stmt\TryCatch;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //    $this->middleware('auth'); 
    // }

    public function index(User $user)
    {
        $factures = $user->factures()->where('isArchive',0)->get();
       return view('factures.index',compact('factures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //dd(phpversion());
        $user=User::findOrFail($id);
        $nom_Entreprise=$user->name;
        $Email=$user->email;
        $codePostal=$user->code_postal;
        $tel=$user->tel;
        $N_cptBancaire=$user->compte_bancaire;
        $site_web=$user->site_web;
        $fax=$user->fax;
        $address=$user->address;

        //clients
        $clients_Personne=$user->clients_Pers()->get();
        //dd($clients_Personne);
        $clients_Entrep=$user->clients_Entrep()->get();
        //dd($clients_Entrep);
        //prod
        $prods = $user->produits()->get();
        //serv
        $servs = $user->services()->get();
        //fact
        $nbr_facts = $user->factures()->where('isArchive',0)->count();
       
        Carbon::setLocale('fr');
        $date_fact = Carbon::now()->Format('Y-m-d');
        $date_fin = Carbon::now()->addMonth()->Format('Y-m-d');
        $lateId=Facture::latest()->first()->id ?? 0;
        $lateId+=1;
        $numero="F0000".$lateId;
        return view('factures.create',compact('user','nom_Entreprise','Email','codePostal','tel','N_cptBancaire','site_web','fax','address','clients_Personne','clients_Entrep','date_fin','date_fact','numero','prods','servs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user,Request $request)
    {
        
    $data=$request->validate([
    'entrep_personne'=> ['bail','required'],
    'numero_fact'=> ['bail','required'],
    'date_facturation'=> ['bail','date_format:Y-m-d','required'],
    'date_echeance'=> ['bail','date_format:Y-m-d','required'] ,
    'N_bon_commande'=> ['bail','alpha_num','required'] ,
    'description'=> ['bail','required'] ,
    'statut' => ['bail','required'] ,
    'condition'=> ['bail','required'] ,
    'total'=> ['bail','numeric','required'] ,
        ]);
         
        $tab = explode (",", $request->nb);
        $nbr = count($tab);
        for($i=0;$i<$nbr;$i++)
        {
            $quantite[$i] = $request['quantite'.$tab[$i]];
           
            //dd("ok");
            $prods[$i]=$request['prod_serv'.$tab[$i]];
        }
        //dd($quantite);
        $solde = $request->total;
        $type_client = $request->entrep_personne[0];
        $id_client = substr($request->entrep_personne, 1,strlen($request->entrep_personne)-1); 
        
        $fact =new Facture([
            'user_id'=>$user->id,
            'numero_fact' =>$request->numero_fact, 
            'description'=>$request->description,
            'date_facturation'=>$request->date_facturation,
            'date_echeance'=>$request->date_echeance,
            'total'=>$request->total,
            'solde'=>$solde,
            'statut'=>$request->statut,
            'N_bon_commande'=>$request->N_bon_commande,
            'conditions_modalites'=>$request->condition,
        ]);
        
        if($type_client=='P'){
         $personne = Client_Personne::find($id_client);
         //dd($personne);
         $personne->factures()->save($fact);
        }
        else{ 
         $entrep = Client_Entrep::find($id_client);
         $entrep->factures()->save($fact);
        }
        for($i=0;$i<$nbr;$i++){
            $type_prod[$i] = substr($prods[$i], 0,1);
           
            $id_prod[$i] = substr($prods[$i], 1,strlen($prods[$i])-1); 
            if($type_prod[$i]=='P'){
                //dd($id_prod[$i]);
                $prod = Produit::find($id_prod[$i]);
                $prod->factures()->attach($fact, ['quantite_vendue'=>$quantite[$i]]);
                $prod->update(['quantite'=>$prod->quantite - $quantite[$i] ]);
               }
               else{ 
                $serv = Service::find($id_prod[$i]);
                
                $serv->factures()->attach($fact, ['quantite_vendue'=>$quantite[$i]]);
                $serv->update(['quantite'=>$serv->quantite - $quantite[$i] ]);
               }
        }
         return redirect('/factures/1');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('factures.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture)
    { 
       // var_dump(class_exists('TCPDF'));
        //
        //$serv = Service::find(1);
       // dd($serv->factures()->where('facture_id',$facture->id)->first()->pivot->quantite_vendue);
      $user = $facture->user()->first();
       $client = $facture->facturable()->first();
       $produits = $facture->produits()->get();
    // dd($produits[0]->id);
       $services = $facture->services()->get();
       $clients_Personne=$user->clients_Pers()->get();
       $clients_Entrep=$user->clients_Entrep()->get();
       $prods = $user->produits()->get();
       $servs = $user->services()->get();
       if($facture->facturable_type=="App\Models\Client_Personne"){
        $cli = "P".$client->id;
       }else{
        $cli = "E".$client->id;
       }
       //dd($produits->count());
       $nb=0;
        return view('factures.edit',compact('facture','nb','user','cli','client','produits','services','prods','servs','clients_Personne','clients_Entrep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,Facture $facture)
    {
        $request->validate([
            'entrep_personne'=> ['bail','required'],
            'numero_fact'=> ['bail','required'],
            'date_facturation'=> ['bail','date_format:Y-m-d','required'],
            'date_echeance'=> ['bail','date_format:Y-m-d','required'] ,
            'N_bon_commande'=> ['bail','alpha_num','required'] ,
            'description'=> ['bail','required'] ,
            'statut' => ['bail','required'] ,
            'condition'=> ['bail','required'] ,
            'total'=> ['bail','numeric','required'] ,
                ]);
                 
                $tab = explode (",", $request->nb);
                //dd($tab);
                $nbr = count($tab);
                for($i=0;$i<$nbr;$i++)
                {
                    $quantite[$i] = $request['quantite'.$tab[$i]];
                   
                    //dd("ok");
                    $prods[$i]=$request['prod_serv'.$tab[$i]];
                }
                //dd($quantite);
                //dd($prods);
                $solde = $request->total;
                $type_client = $request->entrep_personne[0];
                $id_client = substr($request->entrep_personne, 1,strlen($request->entrep_personne)-1); 
                $user= User::find(1);  // aprés doit etre Auth()->user();
            
                $type_cl="";
                if($type_client=='P'){
                    $type_cl="App\Models\Client_Personne";
                 //dd($personne);
                }
                else{ 
                    $type_cl="App\Models\Client_Entrep";
                }
                $facture->update([
                    'user_id'=>$user->id,
                    'facturable_id' => $id_client,
                    'numero_fact' =>$request->numero_fact, 
                    'description'=>$request->description,
                    'date_facturation'=>$request->date_facturation,
                    'date_echeance'=>$request->date_echeance,
                    'total'=>$request->total,
                    'solde'=>$solde,
                    'statut'=>$request->statut,
                    'N_bon_commande'=>$request->N_bon_commande,
                    'conditions_modalites'=>$request->condition,
                    'facturable_type' => $type_cl,
                ]);

                // prod & serv
                $produits = $facture->produits()->get();
                $services = $facture->services()->get();
                //dd($services);
                for($i=0;$i<$produits->count();$i++){
                    $q = $produits[$i]->factures()->where('facture_id',$facture->id)->first()->pivot->quantite_vendue;
                    $produits[$i]->update(['quantite'=>$produits[$i]->quantite + $q ]);
                    $facture->produits()->detach($produits[$i]);
                   
                }
                for($i=0;$i<$services->count();$i++){
                    $q = $services[$i]->factures()->where('facture_id',$facture->id)->first()->pivot->quantite_vendue;
                    $services[$i]->update(['quantite'=>$services[$i]->quantite + $q ]);
                    $facture->services()->detach($services[$i]);
                }
               // dd($prods);
                for($i=0;$i<$nbr;$i++){
                    $type_prod[$i] = substr($prods[$i], 0,1);
                   
                    $id_prod[$i] = substr($prods[$i], 1,strlen($prods[$i])-1); 
                    //dd($type_prod);
                    if($type_prod[$i]=='P'){
                       // dd($type_prod[$i]);
                        $prod = Produit::find($id_prod[$i]);
                        $prod->factures()->attach($facture, ['quantite_vendue'=>$quantite[$i]]);
                        $prod->update(['quantite'=>$prod->quantite - $quantite[$i] ]);
                       }
                       else{ 
                       // dd($type_prod[$i]);
                       // dd($id_prod[$i]);
                        $serv = Service::find($id_prod[$i]);  
                        $serv->factures()->attach($facture, ['quantite_vendue'=>$quantite[$i]]);
                        $serv->update(['quantite'=>$serv->quantite - $quantite[$i]]);
                       }
                }
                 return redirect('/factures/1');
      
      return redirect();
    }
    public function generateFacture($id)
    {
        $facture= Facture::find($id);
       // dd(Storage::disk('public')->exists('factures/facture_'.$facture->id.'.pdf'));
        if(!Storage::disk('public')->exists('factures/facture_'.$facture->id.'.pdf')){
            $user = $facture->user()->first();
        $client = $facture->facturable()->first();
        $produits = $facture->produits()->get();
        $services = $facture->services()->get();

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('factures.model',compact('facture','user','client','produits','services'));
        $path = public_path('factures/facture_'.$facture->id.'.pdf');
        $pdf->save($path);
        $facture->update(['path'=>$path]);

        if($facture->facturable_type==="App\Models\Client_Personne"){
           $name= $client->nom .' '.$client->prenom;
        }
        else{ 
            $name= $client->name;
        }
        $data = [
           'subject' => 'facture envoyée',
           'name'    => $name,
           'path'    => $path,
        ];
        try{
            Mail::to($client->email)->send(new FactureMail($data));
            return redirect()->back();
        }catch(Exception $e){
            return response()->json(
                [
                     "Sorry !!! something"
                ]);
        }
        return redirect('/factures/1');
        }
        else{
            $client = $facture->facturable()->first();
            $path = public_path('factures/facture_'.$facture->id.'.pdf');
            if($facture->facturable_type==="App\Models\Client_Personne"){
                $name= $client->nom .' '.$client->prenom;
             }
             else{ 
                 $name= $client->name;
             }
             $data = [
                'subject' => 'facture envoyée',
                'name'    => $name,
                'path'    => $path,
             ];
             try{
                 Mail::to($client->email)->send(new FactureMail($data));
                 return redirect()->back();
             }catch(Exception $e){
                 return response()->json(
                     [
                          "Sorry !!! something"
                     ]);
             }
             return redirect('/factures/1');
        }
        
       
       
        //return $pdf->download('facture.pdf');
        //return view('factures.model', compact('facture','user','client','produits','services'));
    //     $phpWord = new PhpWord();
    //     $template = new TemplateProcessor(Storage::path('facture.doc'));
    //     $template->setValue('num_fact', $facture->numero_fact);
    //     $template->setValue('total', $facture->total);
    //    $template->setValue('date_fact', $facture->date_facturation);
    //    $template->setValue('date_ech', $facture->date_echeance);
    //    $template->saveAs(storage_path('app/invoices/invoice_12345.doc'));
       
    }
    /** 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facture = Facture::findOrFail($id);
        // $produits = $facture->produits()->get();
        // $services = $facture->services()->get();
        // //dd($services);
        // for($i=0;$i<$produits->count();$i++){
        //     $q = $produits[$i]->factures()->where('facture_id',$facture->id)->first()->pivot->quantite_vendue;
        //     $produits[$i]->update(['quantite'=>$produits[$i]->quantite + $q ]);
        //     $facture->produits()->detach($produits[$i]);
           
        // }
        // for($i=0;$i<$services->count();$i++){
        //     $q = $services[$i]->factures()->where('facture_id',$facture->id)->first()->pivot->quantite_vendue;
        //     $services[$i]->update(['quantite'=>$services[$i]->quantite + $q ]);
        //     $facture->services()->detach($services[$i]);
        // }
        $facture->update(['isArchive'=>1]); 
        return redirect('/factures/1');
    }
}
