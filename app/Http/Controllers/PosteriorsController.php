<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosteriorsController extends Controller
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
        $control_imp = $request->control_imp;
        $experimental_imp = $request->experimental_imp;
        $control_cv = $request->control_cv;
        $experimental_cv = $request->experimental_cv;

        $param = array('control_imp' => $control_imp, 'experimental_imp' => $experimental_imp, 'control_cv' => $control_cv, 'experimental_cv' => $experimental_cv);
        $encParam = json_encode($param);

        $cmd = "R --vanilla --slave --args '$encParam' < posterior.R";
        exec($cmd, $response);
        $res = $response[0];

        return view('posterior.result', [
            'control_imp' => $control_imp,
            'experimental_imp' => $experimental_imp,
            'control_cv' => $control_cv,
            'experimental_cv' => $experimental_cv,
            'res' => json_decode($res),
        ]);
    }
}
