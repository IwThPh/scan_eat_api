<?php

namespace App\Http\Controllers;

use App\Http\Resources\Preference as PreferenceResource;
use App\Preference;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    /**
     * Returns preference for the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {$user = auth()->user();

        if ($user->preference === null) {
            $pref = factory(Preference::class)->make();
            $user->preference()->save($pref);
        }

        return (new PreferenceResource($user->preference()->first()))
            ->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * User found from parsed Bearer Token
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        $pref = $user->preference()->first();

        $validator = validator(request()->only(
            'energy_max', 'carbohydrate_max',
            'protein_max', 'fat_max', 'fibre_max', 'salt_max',
            'sugar_max', 'saturated_max', 'sodium_max', 'carbohydrate_1',
            'carbohydrate_2', 'protein_1', 'protein_2',
            'fat_1', 'fat_2', 'fibre_1', 'fibre_2', 'salt_1', 'salt_2',
            'sugar_1', 'sugar_2', 'saturated_1',
            'saturated_2', 'sodium_1', 'sodium_2', ),
            [
                'energy_max' => 'required|numeric',
                'carbohydrate_max' => 'required|numeric',
                'protein_max' => 'required|numeric',
                'fat_max' => 'required|numeric',
                'fibre_max' => 'required|numeric',
                'salt_max' => 'required|numeric',
                'sugar_max' => 'required|numeric',
                'saturated_max' => 'required|numeric',
                'sodium_max' => 'required|numeric',
                'carbohydrate_1' => 'required|numeric|between:0,1',
                'carbohydrate_2' => 'required|numeric|between:0,1|gt:carbohydrate_1',
                'protein_1' => 'required|numeric|between:0,1',
                'protein_2' => 'required|numeric|between:0,1|gt:protein_1',
                'fat_1' => 'required|numeric|between:0,1',
                'fat_2' => 'required|numeric|between:0,1|gt:fat_1',
                'fibre_1' => 'required|numeric|between:0,1',
                'fibre_2' => 'required|numeric|between:0,1|gt:fibre_1',
                'salt_1' => 'required|numeric|between:0,1',
                'salt_2' => 'required|numeric|between:0,1|gt:salt_1',
                'sugar_1' => 'required|numeric|between:0,1',
                'sugar_2' => 'required|numeric|between:0,1|gt:sugar_1',
                'saturated_1' => 'required|numeric|between:0,1',
                'saturated_2' => 'required|numeric|between:0,1|gt:saturated_1',
                'sodium_1' => 'required|numeric|between:0,1',
                'sodium_2' => 'required|numeric|between:0,1|gt:sodium_1',
            ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data = $request->only(
            'energy_max', 'carbohydrate_max',
            'protein_max', 'fat_max', 'fibre_max', 'salt_max',
            'sugar_max', 'saturated_max', 'sodium_max', 'carbohydrate_1',
            'carbohydrate_2', 'protein_1', 'protein_2',
            'fat_1', 'fat_2', 'fibre_1', 'fibre_2', 'salt_1', 'salt_2',
            'sugar_1', 'sugar_2', 'saturated_1',
            'saturated_2', 'sodium_1', 'sodium_2', );

        $pref->update($data);

        return (new PreferenceResource($user->preference()->first()))
            ->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * User found from parsed Bearer Token
     *
     * @param  \App\preference  $preference
     * @return \Illuminate\Http\Response
     */
    public function destroy(preference $preference)
    {
        $user = auth()->user();

        $user->preference()->delete();
        $pref = factory(Preference::class)->make();
        $user->preference()->save($pref);

        return (new PreferenceResource($user->preference()->first()))
            ->response();
    }
}
