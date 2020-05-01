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
     * User found from parsed Bearer Token
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
}
