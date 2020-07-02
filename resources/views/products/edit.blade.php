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
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Tiêu đề</label>
                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" placeholder="Vui lòng điền tên của sản phẩm vào đây" name="name" value="{{ $product->name }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-3 control-label">Giá tiền</label>
                            <div class="col-md-9">
                                <input id="price" type="text" class="form-control" placeholder="Vui lòng điền giá tiền sản phẩm" name="price" value="{{ $product->price }}" required autofocus>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
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

