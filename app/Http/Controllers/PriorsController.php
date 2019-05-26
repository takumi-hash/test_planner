<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriorsController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calc(Request $request)
    {
        $effect_size = $request->effect_size;
        $p_value = $request->p_value;
        $power = $request->power;

        return view('prior.result', [
            'effect_size' => $effect_size,
            'p_value' => $p_value,
            'power' => $power,
        ]);
    }
}
