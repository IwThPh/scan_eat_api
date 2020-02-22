<?php

namespace App\Http\Controllers;

use App\Allergen;
use App\Http\Resources\Allergens as AllergenCollection;
use Illuminate\Http\Request;

class AllergenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (new AllergenCollection(Allergen::all()))
            ->response();
    }

    /**
     * Selects given allergens for a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function select(Request $request)
    {
        $user = auth()->user();
        $user->allergens()->sync([]);

        $allergenIds = $request->input();

        foreach ($allergenIds as $aid) {
            if (Allergen::find($aid) != null) {
                $user->allergens()->attach($aid);
            }
        }

        return response()->json(['message' => 'Selected Allergens!'], 200);
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
