@extends('layouts.app', ['page' => __('Quản lý tài khoản'), 'pageSlug' => 'manange'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Quản lý tài khoản</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('usermanage.create') }}#" class="btn btn-sm btn-primary">Thêm tài khoản</a>
                    </div>
                </div>
            </div>
            <div class="card-body">  
                <div class="table-responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr><th scope="col">Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Quyền</th>
                            <th scope="col"></th>
                        </tr></thead>
                        <tbody>
                          @foreach ($users as $user)
                          <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            @foreach ($user->roles as $role) 
                            <td>{{$role->name}}</td>
                            @endforeach
                            <td class="text-right">
                              <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ route('edit_user', $user->id) }}">Chỉnh sửa</a>
                                      </div>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">
                  {{ $users->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
