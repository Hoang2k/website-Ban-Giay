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
          <form action="" method="POST" name=""  enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="" >Tên sản phẩm  <span class="text-danger">(*)</span></label>
                <input type="text" id="name" value="{{$product->name}}" name="name" class="form-control" placeholder="Nhập tên sản phẩm">
            </div>

            <div class="form-group">
                <label for="" >Hình Ảnh  <span class="text-danger">(*)</span></label>
                <input type="file" id="upload"  name="file" class="form-control" placeholder="Chọn 1 file">
               <img style="max-width:130px;" src="" id="show_img" alt="">
            </div>
            <div class="form-group">
                <label for="" >Giá  <span class="text-danger">(*)</span></label>
                <input type="number"  value="{{$product->price}}" id="price" name="price" class="form-control" placeholder="Nhập giá sản phẩm">
            </div>
            <div class="form-group">
                <label for="" >Giá khuyến mại  <span class="text-danger">(*)</span></label>
                <input type="number" id="price_sale"  value="{{$product->price_sale}}" name="price_sale" class="form-control" placeholder="Nhập giá khuyến mại">
            </div>
            <div class="form-group">
                <label for="" >Danh Mục  <span class="text-danger">(*)</span></label>
                <select   id="parent_id" name="menu_id" class="form-control">
                @foreach($menus as $menu)  
                <option value="{{$menu->id}}" {{$product->menu_id==$menu->id}} ?'selected : ''>{{$menu->name}}</option>
                   @endforeach
                 </select>
            </div>
           
           
            <div class="form-group">
                <label for="" >Mô tả sản phẩm </label>
               <textarea  id="content"name="description" rows="6" class="form-control">{{$product->description}}</textarea>
            </div>
            <div class="form-group">
            <label for="">Kích Hoạt  <span class="text-danger">(*)</span></label>
                 <div class="custom-control custom-radio">
                     <input type="radio" class="custom-control-input" id="active" name="active"  value="1"
                     {{$product->active==1? 'checked=""':''}}
                     >
                     <label for="">Có</label>
                 </div>
                 <div class="custom-control custom-radio">
                     <input type="radio" class="custom-control-input" id="active" name="active" value="0"
                     
                     {{$product->active==0? 'checked=""':''}}
                     >
                     <label for="">Không</label>
                 </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
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

    <!--Load image-->
    <script>
        upload.onchange = evt => {
  const [file] = upload.files
  if (file) {
    show_img.src = URL.createObjectURL(file)
  }
}
    </script>
@endsection