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
                    $msg = $row->id . ' makbuz numaralı sadaka kurbanınız ' . $row->adi_soyadi . ' niyetiyle ' . $row->kesilme_no . '. sırada kesilmiştir. Cenâb-ı Hak hayrınızı kabul eylesin. Yaklaşan Kurban bayramınız mübarek olsun. BİRGÖNÜL DERNEĞİ';
                    $btn = $row->tel_no;
                    $btn =
                        '<button onclick="new_popup(' . $row->tel_no . ',\'' . urlencode($msg) . '\')" class="edit btn btn-success btn-sm"><i class="fab fa-whatsapp"></i></button>' . '  ' . $btn . '  ' . '<a href="tel:+' . $btn . '" class="edit btn btn-primary btn-sm"><i class="fas fa-phone"></i></a>';


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

            ->where('video_islem', 'SEÇİNİZ')
            ->orwhere('video_islem', 'GÖNDERİLMEDİ')
            ->orwhere('video_islem', 'WHATSAPP YOK');
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
                ->addColumn('tel_no', function ($row) {
                    $msg = $row->id . ' makbuz numaralı sadaka kurbanınız ' . $row->adi_soyadi . ' niyetiyle ' . $row->kesilme_no . '. sırada kesilmiştir. Cenâb-ı Hak hayrınızı kabul eylesin. Yaklaşan Kurban bayramınız mübarek olsun. BİRGÖNÜL DERNEĞİ';
                    $btn = $row->tel_no;
                    $btn =
                        '<button onclick="new_popup(' . $row->tel_no . ',\'' . urlencode($msg) . '\')" class="edit btn btn-success btn-sm"><i class="fab fa-whatsapp"></i></button>' . '  ' . $btn . '  ' . '<a href="tel:+' . $btn . '" class="edit btn btn-primary btn-sm"><i class="fas fa-phone"></i></a>';


                    return $btn;
                })
                ->rawColumns(['tel_no'])
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
            ->where('video_islem', 'KENDİSİNE GÖNDERİLDİ')
            ->orwhere('video_islem', 'REFERANSA GÖNDERİLDİ')
            ->orwhere('video_islem', 'WHATSAPP YOK')
            ->where('arama_islem', 'ULAŞILAMADI')
            ->orwhere('arama_islem', 'SEÇİNİZ')
            ->orwhere('arama_islem', 'NUMARA YANLIŞ')
            ->orwhere('arama_islem', 'ARANMADI');

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

                ->addColumn('tel_no', function ($row) {
                    $msg = $row->id . ' makbuz numaralı sadaka kurbanınız ' . $row->adi_soyadi . ' niyetiyle ' . $row->kesilme_no . '. sırada kesilmiştir. Cenâb-ı Hak hayrınızı kabul eylesin. Yaklaşan Kurban bayramınız mübarek olsun. BİRGÖNÜL DERNEĞİ';
                    $btn = $row->tel_no;
                    $btn =
                        '<button onclick="new_popup(' . $row->tel_no . ',\'' . urlencode($msg) . '\')" class="edit btn btn-success btn-sm"><i class="fab fa-whatsapp"></i></button>' . '  ' . $btn . '  ' . '<a href="tel:+' . $btn . '" class="edit btn btn-primary btn-sm"><i class="fas fa-phone"></i></a>';


                    return $btn;
                })
                ->rawColumns(['tel_no'])

                ->addColumn('referans', function ($row) {
                    $msg = $row->id . ' makbuz numaralı sadaka kurbanınız ' . $row->adi_soyadi . ' niyetiyle ' . $row->kesilme_no . '. sırada kesilmiştir. Cenâb-ı Hak hayrınızı kabul eylesin. Yaklaşan Kurban bayramınız mübarek olsun. BİRGÖNÜL DERNEĞİ';
                    $btn = $row->tel_no;
                    $btn =
                        '<button onclick="new_popup(' . $row->tel_no . ',\'' . urlencode($msg) . '\')" class="edit btn btn-primary btn-sm">wp</button>' . '  ' . $row->adi_soyadi . '  ' . '<a href="tel:+' . $row->tel_no . '" class="edit btn btn-primary btn-sm">Edit</a>';


                    return $btn;
                })
                ->rawColumns(['referans'])
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
        $model = Buyukbas::where('kesilme_durum', '0');

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
                    $msg = $model->id . ' makbuz numaralı sadaka kurbanınız ' . $model->adi_soyadi . ' niyetiyle ' . $model->kesilme_no . '. sırada kesilmiştir. Cenâb-ı Hak hayrınızı kabul eylesin. Yaklaşan Kurban bayramınız mübarek olsun. BİRGÖNÜL DERNEĞİ';
                    $btn = $result->adi_soyadi;
                    $btn =
                        '<button onclick="new_popup(' . $result->tel_no . ',\'' . urlencode($msg) . '\')" class="edit btn btn-primary btn-sm"><i class="nav-icon fas fa-whatsapp text-gray"></i></button>' . '  ' . $btn . '  ' . '<a href="tel:+' . $btn . '" class="edit btn btn-primary btn-sm"><i class="nav-icon fas fa-phone text-gray"></i></a>';


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
        return view('buyukbas.kesilmemis');
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
    //? UPDATE ISLEMLERI
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function kesilmedrm(Request $request)
    {
        //


        $company   =   Buyukbas::updateOrCreate(
            [
                'id' => $_POST['id']
            ],
            [

                'kesilme_no' => $_POST['kesilme_no'],

                'kesilme_durum' => 1,

                //'islem_log' => $_POST['islem_log'],

            ]
        );

        return Response()->json($company);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function videodrm(Request $request)
    {
        //


        $company   =   Buyukbas::updateOrCreate(
            [
                'id' => $_POST['id']
            ],
            [


                'video_islem' => $_POST['video_islem'],

                //'islem_log' => $_POST['islem_log'],

            ]
        );

        return Response()->json($company);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function aramadrm(Request $request)
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


                'arama_islem' => $_POST['arama_islem'],

                //'islem_log' => $_POST['islem_log'],

            ]
        );

        return Response()->json($company);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function vekaletdrm(Request $request)
    {
        //
        $drm = 0;
        if ($_POST['kesilme_no'] == 0) {
            $drm = '0';
        } else {
            $drm = '1';
        }
        $vekalet_durum = Helpers::vekaletdurum($_POST['vekalet_durum']);
        $company   =   Buyukbas::updateOrCreate(
            [
                'id' => $_POST['id']
            ],
            [
                'kesilme_no' => $_POST['kesilme_no'],

                'kesilme_durum' => $drm,

                'vekalet_durum' => $vekalet_durum,

                //'islem_log' => $_POST['islem_log'],

            ]
        );

        return Response()->json($company);
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