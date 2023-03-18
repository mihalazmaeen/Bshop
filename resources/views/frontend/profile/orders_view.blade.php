@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger">Hello...</span><strong>{{Auth::user()->name}} </strong> Edit Your Profile !!!
                        </h3>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
