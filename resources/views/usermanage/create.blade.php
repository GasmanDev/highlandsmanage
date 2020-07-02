@extends('layouts.app', ['pageSlug' => 'manages'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tài khoản mới</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('usermanage.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <input id="email" type="text" class="form-control" placeholder="Vui lòng điền email của tài khoản vào đây (VD: nhanvien1@highlands.vn)" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Tên</label>
                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" placeholder="Vui lòng điền tên của tài khoản vào đây (VD: Nhân viên 1)" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                            <label for="sex" class="col-md-3 control-label">Giới tính</label>
                            <div class="col-md-9">
                                <select class="form-control" name="sex">
                                    <option style = 'background-color:#212529;' value="Nam">Nam</option>
                                    <option style = 'background-color:#212529;' value="Nữ">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('idcard') ? ' has-error' : '' }}">
                            <label for="idcard" class="col-md-3 control-label">CMND</label>
                            <div class="col-md-9">
                                <input id="idcard" type="text" class="form-control" placeholder="Vui lòng điền số CMND" idcard="idcard" value="{{ old('idcard') }}" required autofocus>
                                @if ($errors->has('idcard'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('idcard') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-3 control-label">Địa chỉ</label>
                            <div class="col-md-9">
                                <input id="address" type="text" class="form-control" placeholder="Vui lòng điền địa chỉ" address="address" value="{{ old('address') }}" required autofocus>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">Mật khẩu</label>
                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control" placeholder="Vui lòng điền mật khẩu của tài khoản vào đây"name="password" value="{{ old('password') }}" required autofocus>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role_id" class="col-md-3 control-label">Phân quyền tài khoản</label>
                            <div class="col-md-9">
                                <select class="form-control" name="role_id">
                                @foreach($roles as $role)
                                    <option style = 'background-color:#212529;' value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Tạo tài khoản mới
                                </button>
                                <a href="{{ route('usermanage.index') }}" class="btn btn-primary">
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

