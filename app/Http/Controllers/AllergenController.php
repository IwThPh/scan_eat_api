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
     * User found from parsed Bearer Token
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
}
