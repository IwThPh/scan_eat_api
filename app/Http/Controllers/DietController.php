<?php

namespace App\Http\Controllers;

use App\Diet;
use Illuminate\Http\Request;
use App\Http\Resources\Diets as DietCollection;

class DietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (new DietCollection(Diet::get()))
                ->response();
    }

    /**
     * Selects given diets for a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function select(Request $request)
    {
        $user = auth()->user();
        $user->diets()->sync([]);

        $dietIds = $request->input();

        foreach ($dietIds as $did) {
            if (Diet::find($did) != null) {
                $user->diets()->attach($did);
            }
        }

        return response()->json(['message' => 'Diets selected!'], 200);
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
     * @param  \App\diet  $diet
     * @return \Illuminate\Http\Response
     */
    public function show(diet $diet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\diet  $diet
     * @return \Illuminate\Http\Response
     */
    public function edit(diet $diet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\diet  $diet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, diet $diet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\diet  $diet
     * @return \Illuminate\Http\Response
     */
    public function destroy(diet $diet)
    {
        //
    }
}
