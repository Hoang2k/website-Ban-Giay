@extends('admin.master')

@section('head')
<script src="ckeditor/ckeditor.js"></script>
@endsection
@section('content')
  <div class="row">
      <div class="col-md-12">
     
      <section class="panel">
          <div class="panel-body">
          @include('admin.alert')
          <form action="{{route('admin.menus.store')}}" method="post" name="" >
        {{ csrf_field() }}
            <div class="form-group">
                <label for="" >Tên sản phẩm  <span class="text-danger">(*)</span></label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên sản phâmr">
            </div>

            
            <div class="form-group">
                <label for="" >Danh Mục  <span class="text-danger">(*)</span></label>
                <select   id="parent_id" name="parent_id" class="form-control">
                   <option value="0">Danh Mục Cha</option>
                   @foreach($menu as $menu)
                     <option value="{{$menu->id}}">{{$menu->name}}</option>

                   @endforeach
                 </select>
            </div>
           
           
          
            <div class="form-group">
                <label for="" >Mô tả sản phẩm </label>
               <textarea  id="description"name="description"  rows="6" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="" >Mô tả sản phẩm </label>
               <textarea  id="content"name="content"  rows="6" class="form-control"></textarea>
            </div>
            <div class="form-group">
            <label for="">Kích Hoạt  <span class="text-danger">(*)</span></label>
                 <div class="custom-control custom-radio">
                     <input type="radio" class="custom-control-input" id="active" name="active" checked="" value="1">
                     <label for="">Có</label>
                 </div>
                 <div class="custom-control custom-radio">
                     <input type="radio" class="custom-control-input" id="active" name="active" value="0">
                     <label for="">Không</label>
                 </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-primary">Thêm Mới</button>
      </div>
    </div>
    </form>
          </div>
      </section>
  </div>
  </div>
@endsection
@section('footer')
<script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'content' );
            </script>
@endsection