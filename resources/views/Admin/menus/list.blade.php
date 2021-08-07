@extends('admin.master')

@section('content')
<header class="panel-heading">
                    Tổng  : <strong class="text-danger"> {{$menus->total()}} </strong> danh mục
                </header>
</br>
<table class="table table-bordered table-striped table-condensed">
    
    <thead class="thead-dark">
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Hoạt động</th>
            <th class="text-center">Thời gian</th>
            <th class="text-center">Tác vụ</th>
        </tr>
    </thead>
    <tbody>
        {!! \App\Helpers\Helper::menu($menus) !!}
     
        
    </tbody>
</table>
{{ $menus->appends(Request::all())->links() }}
@endsection