@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cập nhật phẩm mới</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('update_product', $product->id) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-3 control-label">Tiêu đề</label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" placeholder="Vui lòng điền tiêu đề của sản phẩm vào đây" name="title" value="{{ $product->title }}" required autofocus>
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('youtube_link') ? ' has-error' : '' }}">
                            <label for="youtube_link" class="col-md-3 control-label">Youtube link</label>
                            <div class="col-md-9">
                                <input id="youtube_link" type="text" class="form-control" placeholder="Vui lòng điền link youtube của sản phẩm vào đây (VD: https://www.youtube.com/xxx)" name="youtube_link" value="{{ $product->youtube_link }}" required autofocus>
                                @if ($errors->has('youtube_link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('youtube_link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('views') ? ' has-error' : '' }}">
                            <label for="views" class="col-md-3 control-label">Lượt xem</label>
                            <div class="col-md-9">
                                <input id="views" type="text" class="form-control" placeholder="Vui lòng điền lượt xem vào đây (VD: 2000)"name="views" value="{{ $product->views }}" required autofocus>
                                @if ($errors->has('views'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('views') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('dates') ? ' has-error' : '' }}">
                            <label for="dates" class="col-md-3 control-label">Tháng</label>
                            <div class="col-md-9">
                                <input id="dates" type="text" class="form-control" placeholder="Vui lòng điền ngày tháng vào đây (VD: 16/07/2020)" name="dates" value="{{ $product->dates }}" required autofocus>
                                @if ($errors->has('dates'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dates') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('revenues') ? ' has-error' : '' }}">
                            <label for="revenues" class="col-md-3 control-label">Doanh thu</label>
                            <div class="col-md-9">
                                <input id="revenues" type="text" class="form-control" placeholder="Vui lòng điền doanh thu vào đây (VD: 1000)" name="revenues" value="{{ $product->revenues }}" required autofocus>
                                @if ($errors->has('revenues'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('revenues') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('rates') ? ' has-error' : '' }}">
                            <label for="rates" class="col-md-3 control-label">Tỉ lệ</label>
                            <div class="col-md-9">
                                <input id="rates" type="text" class="form-control" placeholder="Vui lòng điền tỉ lệ vào đây (VD: 7/3)" name="rates" value="{{ $product->rates }}" required autofocus>
                                @if ($errors->has('rates'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rates') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('revenueshare') ? ' has-error' : '' }}">
                            <label for="revenueshare" class="col-md-3 control-label">Tỉ lệ</label>
                            <div class="col-md-9">
                                <input id="revenueshare" type="text" class="form-control" placeholder="Vui lòng điền doanh thu đã chia theo tỉ lệ vào đây (VD: $700/$300)" name="revenueshare" value="{{ $product->revenueshare }}" required autofocus>
                                @if ($errors->has('revenueshare'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('revenueshare') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="for_user_id" class="col-md-3 control-label">Hiển thị với đối tác</label>
                            <div class="col-md-9">
                                <select class="form-control" name="for_user_id">
                                @foreach($users as $user)
                                    @if ($user->id == $product->for_user_id)
                                    <option selected style = 'background-color:#212529;' value="{{$user->id}}">{{$user->name}}</option>
                                    @else 
                                    <option style = 'background-color:#212529;' value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">Hiện
                                        @if ($product->published == 1)
                                        <input name="published" class="form-check-input" checked type="checkbox" value="1">
                                        @else 
                                        <input name="published" class="form-check-input"  type="checkbox" value="1">
                                        @endif
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">Hiện với tất cả
                                        @if ($product->published_to_all == 1)
                                        <input name="published_to_all" checked class="form-check-input" type="checkbox" value="1">
                                        @else 
                                        <input name="published_to_all" class="form-check-input" type="checkbox" value="1">
                                        @endif
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Cập nhật
                                </button>
                                <a href="{{ route('home') }}" class="btn btn-primary">
                                    Hủy bỏ
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

