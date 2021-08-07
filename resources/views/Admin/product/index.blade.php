@extends('Admin.master')
@section('content')
<div class="row">


<div class="col-md-12">
    <section class="panel">
        <header class="panel-heading">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">Thêm sản phẩm</button>
        </header>
    </section>
    <section class="panel">
    <header class="panel-heading">
            <h4>Danh sách sản phẩm : <strong>5</strong></h4>
        </header>
        <div class="panel-body">
            <section>
            <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên</th>
      <th scope="col">Slug</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Giá</th>
      <th scope="col">Giá Khuyến Mãi</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Danh Mục</th>
      <th scope="col">Mô tẩ</th>
      <th scope="col">Trạng Thái</th>
     
      <th scope="col">Tác vụ</th>
    
      
    </tr>
  </thead>
  <tbody>
    @foreach($product as $pro)
    <tr>
      <th scope="row">{{$pro->id}}</th>
      <td>{{$pro->name}}</td>
      <td>{{$pro->slug}}</td>
      <td><img src="{{asset('backend/images')}}/{{$pro->images}}" style="max-width:120px;padding-top:0;" alt=""></td>
      <td>{{$pro->price}}</td>
      <td>{{$pro->price_sale}}</td>
      <td>{{$pro->quantity}}</td>
      <td>{{$pro->category_id}}</td>
      <td>{{$pro->description}}</td>
      
      <td>{{$pro->status}}</td>
      <td>
        <a href="#" class="btn btn-primary">Sửa</a>
        <a href="#" class="btn btn-danger">Xóa</a>
      </td>

    </tr>
   @endforeach
  </tbody>
</table>
            </section>
        </div>
    </section>
</div>
</div>


<!--Modal Add Product-->

<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.product.addProduct')}}" method="post" name="addProductModal" enctype='multipart/form-data'>
        {{ csrf_field() }}
            <div class="form-group">
                <label for="" >Tên sản phẩm  <span class="text-danger">(*)</span></label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên sản phâmr">
            </div>
            <div class="form-group">
                <label for="" >Slug  <span class="text-danger">(*)</span></label>
                <input type="text" id="slug" name="slug" class="form-control" placeholder="Nhập Slug">
            </div>
            <div class="form-group">
                <label for="" >Hình Ảnh  <span class="text-danger">(*)</span></label>
                <input type="file" id="image" name="image" class="form-control" placeholder="Chọn hình ảnh">
                <img src="" id="show_image" alt="" style=" max-width:130px;margin-top:20px;">
            </div>
            <div class="form-group">
                <label for="" >Giá  <span class="text-danger">(*)</span></label>
                <input type="text" id="price" name="price" class="form-control" placeholder="Nhập giá sản phẩm">
            </div>
            <div class="form-group">
                <label for="" >Giá Khuyến Mãi  <span class="text-danger">(*)</span></label>
                <input type="text" id="price_sale" name="price_sale" class="form-control" placeholder="Nhập giá khuyến mãi">
            </div>
            <div class="form-group">
                <label for="" >Số lượng <span class="text-danger">(*)</span></label>
                <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Nhập số lượng">
            </div>
            <div class="form-group">
                <label for="">Danh Mục  <span class="text-danger">(*)</span></label>
                 <select   id="category_id" name="category_id" class="form-control">
                   @foreach($category as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                     @endforeach
                 </select>
            </div>
            <div class="form-group">
                <label for="" >Mô tả sản phẩm </label>
               <textarea  id="description"name="description"  rows="6" class="form-control"></textarea>
            </div>
            <div class="form-group">
            <label for="">Trạng Thái  <span class="text-danger">(*)</span></label>
                 <select name="" id="status" name="status" class="form-control">
                     <option value="0">Hoạt Động</option>
                     <option value="1"> Không Hoạt Động</option>
                 </select>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="submit" class="btn btn-primary">Thêm Mới</button>
      </div>
    </div>
    </form>
  </div>
</div>


<!--------------INSERT PRODUCT USING AJAX----------->
<!-- <script>
  $("#addProductModal").submit(function(e){
    e.preventDefault();
    let name=$("#name").val();
    let slug=$("#slug").val();
    let image=$("#image").prop('files')[0];
    let price=$("#price").val();
    let price_sale=$("#price_sale").val();
    let description=$("#description").val();
    let category_id=$("#category_id").val();
    let status=$("#status").val();
    
  })
</script> -->


<!--------------js  load image to IMG----------->
<script>
  image.onchange = evt => {
  const [file] = image.files
  if (file) {
    show_image.src = URL.createObjectURL(file)
  }
}
</script>
@endsection