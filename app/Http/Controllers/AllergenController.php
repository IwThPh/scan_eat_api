<?php

namespace App\Http\Controllers;

use App\Allergen;
use Illuminate\Http\Request;
use App\Http\Resources\Allergens as AllergenCollection;

class AllergenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (new AllergenCollection(Allergen::get()))
                ->response();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\allergen  $allergen
     * @return \Illuminate\Http\Response
     */
    public function show(allergen $allergen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\allergen  $allergen
     * @return \Illuminate\Http\Response
     */
    public function edit(allergen $allergen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\allergen  $allergen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, allergen $allergen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\allergen  $allergen
     * @return \Illuminate\Http\Response
     */
    public function destroy(allergen $allergen)
    {
        //
    }
}
