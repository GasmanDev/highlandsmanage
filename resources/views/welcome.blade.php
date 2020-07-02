@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <h1 class="text-white">{{ __('Chào mừng!') }}</h1>
                        <p class="text-lead text-light">
                            {{ __('Chào mừng bạn đến với trang quản lý cửa hàng cafe Highlands Biệt Thự') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
