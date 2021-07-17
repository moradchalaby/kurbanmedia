<?php

namespace App\Http\Controllers\Kurban;

use App\Buyukbas;
use App\Helpers;
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
    {   //
        //
        $model = Buyukbas::select('*');
        if (request()->ajax()) {

            return datatables()->of($model)


                ->addColumn('vekalet_durum', function ($model) {

                    $result = Helpers::vekaletdurumr($model->vekalet_durum);
                    return $result;
                })
                ->addColumn('referans', function ($model) {

                    //$model->refferans;
                    $result = DB::table('referans')->where('id', $model->referans)->first();
                    return $result->adi_soyadi;
                })
                ->addColumn('kesilme_durum', function ($model) {

                    $result = Helpers::kesilmedurumr($model->kesilme_durum);
                    return $result;
                })
                ->addColumn('tel_no', function ($row) {
                    $msg = $row->id . ' makbuz numaralı kurbanınız ' . $row->adi_soyadi . ' adına ' . $row->kesilme_no . '. sırada kesilmiştir. Cenab-ı Hak hayrınız kabul eylesin. Bayramınız mübarek olsun. BİRGÖNÜL DERNEĞİ';
                    $btn = $row->tel_no;
                    $btn =
                        '<button onclick="new_popup(' . $row->tel_no . ',\'' . urlencode($msg) . '\')" class="edit btn btn-primary btn-sm">wp</button>' . '  ' . $btn . '  ' . '<a href="tel:+' . $btn . '" class="edit btn btn-primary btn-sm">Edit</a>';


                    return $btn;
                })
                ->rawColumns(['tel_no'])
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
    public function tamamlanan()
    {
        //
        $model = Buyukbas::where('arama_islem', 'ARANDI')->where('video_islem', 'GÖNDERİLDİ');
        if (request()->ajax()) {



            return datatables()->of($model)

                /*  ->editColumn('arama_islem', function ($model) {

                    $result = Helpers::aramaislemr($model->arama_islem);

                    return $result;
                })*/
                ->addColumn('vekalet_durum', function ($model) {

                    $result = Helpers::vekaletdurumr($model->vekalet_durum);
                    return $result;
                })
                ->addColumn('referans', function ($model) {

                    //$model->refferans;
                    $result = DB::table('referans')->where('id', $model->referans)->first();
                    return $result->adi_soyadi;
                })
                /*
                ->editColumn('video_islem', function ($model) {

                    $result = Helpers::videoislemr($model->video_islem);

                    return $result;
                }) */
                ->addIndexColumn()





                ->make(true);
        }
        return view('buyukbas.tamamlanan');
    }
    public function video()
    {
        //
        $model = Buyukbas::where('vekalet_durum', '1')
            ->where('kesilme_durum', '1')
            ->where('arama_islem', 'ULAŞILAMADI')
            ->where('arama_islem', 'SEÇİNİZ')
            ->where('arama_islem', 'NUMARA YANLIŞ')
            ->where('arama_islem', 'ARANMADI')
            ->where('video_islem', 'SEÇİNİZ')
            ->where('video_islem', 'GÖNDERİLMEDİ')
            ->where('video_islem', 'WHATSAPP YOK');
        if (request()->ajax()) {



            return datatables()->of($model)

                /*  ->editColumn('arama_islem', function ($model) {

                    $result = Helpers::aramaislemr($model->arama_islem);

                    return $result;
                })*/
                ->addColumn('vekalet_durum', function ($model) {

                    $result = Helpers::vekaletdurumr($model->vekalet_durum);
                    return $result;
                })
                ->addColumn('referans', function ($model) {

                    //$model->refferans;
                    $result = DB::table('referans')->where('id', $model->referans)->first();
                    return $result->adi_soyadi;
                })
                /*
                ->editColumn('video_islem', function ($model) {

                    $result = Helpers::videoislemr($model->video_islem);

                    return $result;
                }) */
                ->addIndexColumn()





                ->make(true);
        }
        return view('buyukbas.video');
    }
    public function arama()
    {
        //
        $model = Buyukbas::where('vekalet_durum', '1')
            ->where('kesilme_durum', '1')
            ->where('arama_islem', 'ULAŞILAMADI')
            ->where('arama_islem', 'SEÇİNİZ')
            ->where('arama_islem', 'NUMARA YANLIŞ')
            ->where('arama_islem', 'ARANMADI');

        if (request()->ajax()) {



            return datatables()->of($model)

                /*  ->editColumn('arama_islem', function ($model) {

                    $result = Helpers::aramaislemr($model->arama_islem);

                    return $result;
                })*/
                ->addColumn('vekalet_durum', function ($model) {

                    $result = Helpers::vekaletdurumr($model->vekalet_durum);
                    return $result;
                })
                ->addColumn('referans', function ($model) {

                    //$model->refferans;
                    $result = DB::table('referans')->where('id', $model->referans)->first();
                    return $result->adi_soyadi;
                })

                /*
                ->editColumn('video_islem', function ($model) {

                    $result = Helpers::videoislemr($model->video_islem);

                    return $result;
                }) */
                ->addIndexColumn()





                ->make(true);
        }
        return view('buyukbas.arama');
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

        $video_islem = Helpers::videoislem($_POST['video_islem']);
        $arama_islem = Helpers::aramaislem($_POST['arama_islem']);
        $vekalet_durum = Helpers::vekaletdurum($_POST['vekalet_durum']);
        $company   =   Buyukbas::updateOrCreate(
            [
                'id' => $_POST['id']
            ],
            [

                'kesilme_no' => $_POST['kesilme_no'],
                'kesilme_durum' => $_POST['kesilme_durum'],
                'vekalet_durum' => $vekalet_durum,
                'arama_islem' => $_POST['arama_islem'],
                'video_islem' => $_POST['video_islem'],
                //'islem_log' => $_POST['islem_log'],

            ]
        );

        return Response()->json($company);
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