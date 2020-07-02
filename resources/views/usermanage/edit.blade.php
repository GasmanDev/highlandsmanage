@extends('layouts.app', ['pageSlug' => 'manages'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tài khoản mới</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('update_user', $user->id) }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <input id="email" type="text" class="form-control" placeholder="Vui lòng điền email của tài khoản vào đây (VD: dt1@daomusic.vn)" name="email" value="{{ $user->email }}" required autofocus>
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
                                <input id="name" type="text" class="form-control" placeholder="Vui lòng điền tên của tài khoản vào đây (VD: Đối tác 1)" name="name" value="{{ $user->name }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">Mật khẩu</label>
                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control" placeholder="Vui lòng điền mật khẩu của tài khoản vào đây"name="password" autofocus>
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
                                    @foreach ($user->roles as $role2) 
                                    @if ($role->id == $role2->id)
                                        <option selected style = 'background-color:#212529;' value="{{$role->id}}">{{$role->name}}</option>
                                    @else 
                                        <option style = 'background-color:#212529;' value="{{$role->id}}">{{$role->name}}</option>
                                    @endif
                                    @endforeach
                                @endforeach
                                
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Cập nhật tài khoản
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

