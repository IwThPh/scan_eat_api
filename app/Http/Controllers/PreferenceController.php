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
    { $user = auth()->user();

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        $pref = $user->preference()->first();

        $validated = $request->validate([
            'energy_max' => 'numeric',
            'carbohydrate_max' => 'numeric',
            'protein_max' => 'numeric',
            'fat_max' => 'numeric',
            'fiber_max' => 'numeric',
            'salt_max' => 'numeric',
            'sugar_max' => 'numeric',
            'saturated_max' => 'numeric',
            'sodium_max' => 'numeric',
        ]);

        $pref->update($validated);

        return (new PreferenceResource($user->preference()->first()))
            ->response();
    }

    /**
     * Remove the specified resource from storage.
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
