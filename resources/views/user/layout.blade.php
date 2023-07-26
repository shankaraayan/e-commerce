@extends('Layout.Layout')
<!--------------- Dashboard Start ------------------------->
@section('content')
<section class="my-5">
    <div class="container bg-light py-5 shadow">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-12 col-12">
                       @include("user.sidebar")
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-12 col-xs-12 px-1">
                <div class="dashboard_right_details bg-white p-5">
                    <div class="tab-content" id="CG_Dashboard_UI">
                        <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
                            aria-labelledby="v-pills-dashboard-tab">
                            @yield('dasboard_content')
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
@endsection

<!--------------- Dashboard End ------------------------->