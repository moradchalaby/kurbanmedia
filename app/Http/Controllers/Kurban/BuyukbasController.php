<?php

namespace App\Http\Controllers\Kurban;

use App\Buyukbas;
use App\Referans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BuyukbasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['buyukbas'] = Buyukbas::all()->sortBy('sira_no');
        return view('buyukbas.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kesilmis()
    {
        //
        $data['buyukbas'] =
            Buyukbas::all()->where('kesilme_durum', 1)->sortBy('kesilme_no');
        return view('buyukbas.kesilmis', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *@return \Illuminate\Http\Response
     *
     */
    public function rapor()
    {
        $data['referans'] =
            Referans::all()->sortBy('adi_soyadi');
        return view('buyukbas.rapor', compact('data'));
    }
    public function detail($id)
    {
        $data['referans'] =
            Referans::where('id', $id)->first();
        $data['buyukbas'] = Buyukbas::all()->sortBy('sira_no')->where('referans', $id);
        return view('buyukbas.detail', compact('data'));
    }
    public function kesilmemis()
    {
        //
        $data['buyukbas'] =
            Buyukbas::all()->where('kesilme_durum', 0)->sortBy('sira_no');
        return view('buyukbas.kesilmemis', compact('data'));
    }
    public function ajax(Request $request)
    {
        dd($request);
        return view(
            'buyukbas.ajax'
        );
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