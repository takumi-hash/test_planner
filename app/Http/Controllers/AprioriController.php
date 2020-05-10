<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AprioriController extends Controller
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
    public function store(Request $request)
    {
        $control_ctr = $request->control_ctr;
        $experimental_ctr = $request->experimental_ctr;
        $p_value = $request->p_value;
        $power = $request->power;

        $param = array('control_ctr' => $control_ctr, 'experimental_ctr' => $experimental_ctr, 'p_value' => $p_value, 'power' => $power);
        $encParam = json_encode($param);

        //prod $cmd = "~/bin/R --vanilla --slave --args '$encParam' < prior.R";
        $cmd = "/usr/local/bin/R --vanilla --slave --args '$encParam' < prior.R";
        exec($cmd, $response);
        $res = $response[0];

        return ['res' => json_decode($res),];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request /* , $id */)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
