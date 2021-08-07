@extends('admin.master')

@section('content')
<header class="panel-heading">
                    Tổng  : <strong class="text-danger"> {{$product->total()}} </strong> sản phẩm
                </header>
</br>
<table class="table table-bordered table-striped table-condensed">
    
    <thead class="thead-dark">
        <tr>
        <th scope="col">ID</th>
      <th scope="col">Tên</th>
      <th scope="col">Giá Gốc</th>
      <th scope="col">Giá Sale </th>
      <th scope="col">Danh Mục</th>
      <th scope="col">Hoạt Động</th>
      <th scope="col">Thời gian</th>
      <th scope="col">Tác vụ</th>
        </tr>
    </thead>
    <tbody>
    @foreach($product as $pro)
    <tr>
      <th scope="row">{{$pro->id}}</th>
      <td>{{$pro->name}}</td>
      <td>{{$pro->price}}</td>
      <td>{{$pro->price_sale}}</td>
      <td>{{$pro->menu->name}}</td>
      <td>{!! \App\Helpers\Helper::active($pro->active)  !!}</td>
      <td>{{$pro->updated_at}}</td>
      <td>
        <a href="{{route('admin.product.edit',[$pro->id])}}" class="btn btn-primary btn-xs">Sửa</a>
        <a href="javascript:void(0)" onclick="removeRow({{$pro->id}},'admin/products/destroy')" class="btn btn-danger btn-xs">Xóa</a>
      </td>

    </tr>
   @endforeach
     
        
    </tbody>
</table>
{{ $product->appends(Request::all())->links() }}



@endsection