<?php

namespace App\Http\Controllers\Kurban;

use App\Http\Controllers\Controller;
use App\Kucukbas;
use Illuminate\Http\Request;

class KucukbasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['kucukbas'] = Kucukbas::all()->sortBy('sira_no');
        return view('kucukbas.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kesilmis()
    {
        //
        $data['kucukbas'] =
            Kucukbas::all()->where('kesilme_durum', 1)->sortBy('kesilme_no');
        return view('kucukbas.kesilmis', compact('data'));
    }
    public function kesilmemis()
    {
        //
        $data['kucukbas'] =
            Kucukbas::all()->where('kesilme_durum', 0)->sortBy('sira_no');
        return view('kucukbas.kesilmemis', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
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