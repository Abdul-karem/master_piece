@extends('Lessor.layouts.master')

@section('content')
    <!--**********************************
                    Content body start
                ***********************************-->
                
    <div class="container-fluid mt-3" style="height: 900px">
        <div class="row">
            <div class="col-4">
                <div class="">
                    <div class="card-body"
                        style="background-image: linear-gradient(to right, #ffe468,#ffe468);
                        border-radius: 20px;height: 160px;">
                        <h3 class="card-title " style="color: #8cc641"  >Service</h3>
                        <div class="d-inline-block">
                            <h2  style="color: #8cc641"    >{{ $totalOffices }}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-home" style="color: #8cc641"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="">
                    <div class="card-body"
                        style="background-image: linear-gradient(to right, #ffe468,#ffe468);
                        border-radius: 20px;height: 160px;"  >
                        <h3 class="card-title " style="color: #8cc641"  >Total sales</h3>
                        <div class="d-inline-block">
                            {{-- <h2 class="text-white">${{ number_format($averagePrice, 2) }}</h2> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"
                            style="color: #8cc641"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="">
                    <div class="card-body"
                        style="background-image: linear-gradient(to right,  #ffe468,#ffe468); border-radius: 20px;height: 160px;">
                        <h3 class="card-title" style="color: #8cc641"  >Average rating</h3>
                        <div class="d-inline-block">
                            {{-- <h2 class="text-white">{{ number_format($averagePrice, 2) }}</h2> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-heart"
                            style="color: #8cc641"></i></span>
                    </div>
                </div>
            </div>
        </div>


        <!-- #/ container -->
    </div>
    <!--**********************************
                 Content body end
                ***********************************-->


@endsection
