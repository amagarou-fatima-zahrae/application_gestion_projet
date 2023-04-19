<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user,Request $req)
    {
        $data=$req->validate([
            'nom' => ['bail','required','max:255'],
            'code_comptable'  => ['bail','required','unique:produits','max:255'] ,
            'prix'  => ['bail','numeric','required'] ,
            'TVA'  => ['bail','numeric','required'] ,
            'quantite'  => ['bail','integer','required'] ,
            'description'  => ['bail','required'] ,
        ]);
        $user->produits()->create($data);
        //dd("ok");
         return redirect('/facture/1/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
