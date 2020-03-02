<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Products as ProductCollection;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = auth()->user();
        return response()->json(new UserResource($user),200);
    }

    /**
     * Retrieve a user's scan history.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        $user = auth()->user();
        return (new ProductCollection($user->scanned))
            ->response();
    }

    /**
     * Retrieve a user's saved scan products.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function saved()
    {
        $user = auth()->user();
        return (new ProductCollection($user->favourites))
            ->response();
    }
}
