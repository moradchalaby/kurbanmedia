    <!-- Main content -->
    @extends('layout')


    @section('content')

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->





        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"> <span class="iconify" data-icon="mdi:sheep"
                                    data-inline="false"></span></span>

                            <div class="info-box-content">
                                <span class="info-box-text">CPU Traffic</span>
                                <span class="info-box-number">
                                    10
                                    <small>%</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"> <span class="iconify" data-icon="mdi:cow"
                                    data-inline="false"></span></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Likes</span>
                                <span class="info-box-number">41,410</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><span class="iconify"
                                    data-icon="akar-icons:phone" data-inline="false"></span></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Sales</span>
                                <span class="info-box-number">760</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"> <span class="iconify"
                                    data-icon="ri:video-chat-fill" data-inline="false"></span></span>

                            <div class="info-box-content">
                                <span class="info-box-text">New Members</span>
                                <span class="info-box-number">2,000</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <!-- /.card -->


                                <div class="card">
                                    <div class="card-header">

                                        <h3 class="card-title">DataTable with default features</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body ">
                                        <table id="example1" class="w-100 table  table-bordered table-striped">

                                            <thead>
                                                <tr>
                                                    <th><span id='search'>MKBZ NO</span> <br>MKBZ NO</th>
                                                    <th>HİSSE NO</th>
                                                    <th><span id='search'>SIRA NO</span><br>SIRA NO</th>
                                                    <th><span id='search'>KESİM NO</span><br>KESİM NO</th>
                                                    <th><span id='search'>ADI SOYADI</span><br>ADI SOYADI</th>
                                                    <th><span id='search'>CEP TELEFONU</span><br>CEP TELEFONU
                                                    </th>
                                                    <th><span id='search'>REFERANS</span><br>REFERANS</th>
                                                    <th><span id='search'>GELECEKVEKALET</span><br>GELECEKVEKALET</th>
                                                    <th><span id='search'>VİDEO</span><br>VİDEO</th>
                                                    <th><span id='search'>ARAMA</span><br>ARAMA</th>
                                                    <th>İŞLEMLER</th>

                                                </tr>

                                            </thead>
                                            <style>
                                                .transparent-input {
                                                    background-color: rgba(0, 0, 0, 0) !important;
                                                    border: none !important;
                                                }

                                            </style>

                                            <tbody id="deneme">
                                                @foreach ($data['buyukbas'] as $bbas)
                                                    <form action="{{ route('buyukbas.ajax') }}"
                                                        id="formId-{{ $bbas['id'] }}" method="post">
                                                        @csrf
                                                        <tr>
                                                            <td>{{ $bbas['id'] }}
                                                                <button type="submit">go</button>
                                                            </td>
                                                            <td>{{ $bbas['hisse_no'] }}</td>
                                                            <td>{{ $bbas['sira_no'] }}</td>
                                                            <td><input type="number" onchange="ajax({{ $bbas['id'] }});"
                                                                    class=" w-100
                                                                                                                                                            transparent-input "
                                                                    name=" kesim_no" value="{{ $bbas['kesim_no'] }}">

                                                            </td>
                                                            <td>{{ $bbas['adi_soyadi'] }}</td>

                                                            <td><input type="tel" class="w-100 transparent-input "
                                                                    name="tel_no" value=" {{ $bbas['tel_no'] }}">
                                                                <a class="btn btn-success"><i
                                                                        class="fab fa-whatsapp"></i></a>
                                                                <a hreff="tel:+90{{ $bbas['tel_no'] }}"
                                                                    class="btn btn-info"><i class="fas fa-phone"></i></a>
                                                            </td>
                                                            <td>{{ $bbas['referans'] }}</td>
                                                            <td>@php  echo $bbas['vekalet_durum']==0?'Gelecek':'Vekalet'  @endphp</td>
                                                            <td>
                                                                <select name="video_durum"
                                                                    onchange="alert(this.value)"" class="
                                                                    transparent-input">
                                                                    <option value="0">GÖNDERİLMEDİ</option>
                                                                    <option value="10">KENDİSİNE GÖNDERİLDİ</option>
                                                                    <option value="11">REFERANSA GÖNDERİLDİ</option>
                                                                    <option value="2">WHATSAPP YOK</option>

                                                                </select>
                                                                {{ $bbas['video_durum'] }}
                                                            </td>
                                                            <td>{{ $bbas['arama_durum'] }}
                                                                <select name="arama_durum" class="transparent-input">
                                                                    <option value="0">ARANMADI</option>
                                                                    <option value="10">ARANDI</option>
                                                                    <option value="11">ULAŞILAMADI</option>
                                                                    <option value="12">NUMARA YANLIŞ</option>
                                                                    <option value="13">REFERANS ARANDI</option>


                                                                </select>
                                                            </td>
                                                            <td> <a class="btn btn-primary"><i class="far fa-edit"></i></a>
                                                            </td>
                                                        </tr>
                                                    </form>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->

            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->

        <script>
            function ajax(id) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data = $(`#formId-${id}`).serialize();
                $.ajax({
                    type: "POST",
                    data: data,
                    url: "{{ route('buyukbas.ajax') }}",
                    success: function(msg) {
                        // console.log(msg);
                        if (msg) {
                            toastr.success(String(data) + 'id\'li İşlem başarılı');
                        } else {
                            toastr.error("İşlem başarısız");
                        }
                    }
                });
                console.log(data);
                $(`#formId-${id}`).disableSelection();
            }

        </script>
    @endsection
    @section('css')@endsection
    @section('js')@endsection
