@extends('layouts.app', ['page' => __('Quản lý sản phẩm'), 'pageSlug' => 'dashboard'])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Quản lý sản phẩm</h4>
                    </div>
                    @can('product.create')
                    <div class="col-4 text-right">
                        <a href="{{ route('create_product') }}" class="btn btn-sm btn-primary">Thêm sản phẩm</a>
                        <a href="{{ route('export_product') }}" class="btn btn-sm btn-primary">Xuất Excel</a>
                    </div>
                    @endcan
                </div>
            </div>
            <div class="card-body">  
                <div class="table-responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr><th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá tiền</th>
                            @can('product.create')
                            <th scope="col">Trạng thái</th>
                            <th scope="col"></th>
                            @endcan
                        </tr></thead>
                        <tbody>
                        @if (Auth::user()->can('product.create'))
                            @foreach($products as $product)
                            <tr>
                                <td><a style="color: #eceff1;font-weight: bold;" href="#" target="_blank">{{$product->name}}</a></td>
                                <td>{{$product->price}}</td>
                                @can('product.create')
                                @if ($product->published == true)
                                <td>Hiện</td>
                                @else 
                                <td>Ẩn</td>
                                @endif
                                <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('edit_product', $product->id) }}">Chỉnh sửa</a>
                                            @csrf
                                            @method('DELETE')
                                            <a style="color: #f14e46;" class="dropdown-item" href="{{route('destroy_product',$product->id)}}">Xóa</a>
                                        </div>
                                </div>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        @else 
                            @foreach($products as $product)
                            @if ($product->published == true)
                            <tr>
                                <td><a style="color: #eceff1;font-weight: bold;" href="#" target="_blank">{{$product->name}}</a></td>
                                <td>{{$product->price}}</td>
                            </tr>
                            @endif
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">
                    {{ $products->links() }}
                </nav>
            </div>
            
        </div>
        
    </div>
</div>
@endsection

