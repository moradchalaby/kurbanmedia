<?php

namespace App\Http\Controllers\Kurban;

use App\Buyukbas;
use App\Referans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datatables;

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
        $model = Buyukbas::select('*');
        if (request()->ajax()) {
            return datatables()->of($model)
                ->addColumn('action', 'company-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('buyukbas.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kesilmis()
    {
        //
        $model = Buyukbas::select('*');
        if (request()->ajax()) {
            return datatables()->of($model)
                ->addColumn('action', 'buyukbas.kesilmis-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('buyukbas.kesilmis');
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
    public function edit()
    {
        //

        $company  = Buyukbas::where('id', $_POST['id'])->first();

        return Response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
        $update =  DB::table('buyukbas')
            ->where('id', $_POST['id'])
            ->update([
                'kesilme_no' => $_POST['kesimno'],
                'tel_no' => $_POST['tel'],
                'video_islem' => $_POST['video'],
                'arama_islem' => $_POST['arama']

            ]);
        if ($update) {
            echo true;
        }
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