@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            @can('product.create')
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Chỉnh sửa hồ sơ') }}</h5>
                </div>
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('alerts.success')

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ __('Tên') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ __('Địa chỉ mail') }}</label>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email address') }}" value="{{ old('email', auth()->user()->email) }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Lưu') }}</button>
                    </div>
                </form>
            </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Thay đổi mật khẩu') }}</h5>
                </div>
                <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        @include('alerts.success', ['key' => 'password_status'])

                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                            <label>{{ __('Mật khẩu hiện tại') }}</label>
                            <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Nhập mật khẩu hiện tại') }}" value="" required>
                            @include('alerts.feedback', ['field' => 'old_password'])
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label>{{ __('Mật khẩu mới') }}</label>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Nhập mật khẩu mới') }}" value="" required>
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="form-group">
                            <label>{{ __('Nhập lại mật khẩu mới') }}</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Nhập lại mật khẩu mới') }}" value="" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Thay đổi') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                <img class="avatar" src="{{ asset('black') }}/img/side_logo.png" alt="">
                                {{-- <h5 class="title">{{ auth()->user()->name }}</h5> --}}
                            </a>
                            <p class="description">
                                {{ __('HIGHLANDS COFFEE') }}
                            </p>
                        </div>
                    </p>
                    <div class="card-description">
                        {{-- {{ __('HỒ NGUYỄN THANH THIỆN Chào các bạn') }} --}}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="button-container">
                        <button class="btn btn-icon btn-round btn-facebook">
                            <a style="color: white" href="https://www.facebook.com/daoentertainmnetvn/" target="blank">
                                <i class="fab fa-facebook"></i>
                            </a>
                            
                        </button>
                        <button class="btn btn-icon btn-round btn-twitter">
                            <a style="color: white" href="https://www.youtube.com/channel/UCRxT8mwR3BGHdy_vxblvHpQ" target="blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </button>
                        {{-- <button class="btn btn-icon btn-round btn-google">
                            <i class="fab fa-google-plus"></i>
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
