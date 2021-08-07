@extends('Admin.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <button class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">Thêm mới</button>
            </header>
        </section>
        <section class="panel">
            <header class="panel-heading">Danh sách nghành hàng : <strong class="text-danger">5</strong></header>
            <div class="panel-body">
                <section class="">
                    <table class="table table-hover table-dark ">
                    <thead class="thead-dark">

                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
</thead>
<tbody>
    @foreach($category as $cate)
    <tr>
      <th scope="row">{{$cate->id}}</th>
      <td>{{$cate->name}}</td>
      <td>{{$cate->slug}}</td>
      <td>{{$cate->description}}</td>
      <td>{{$cate->status}}</td>
      <td>
          <a href="javascript:void(0)" class="btn btn-primary" onclick="editCategoryById({{$cate->id}})"> <span class="glyphicon glyphicon-edit"></span>Sửa</a>
          <a href="javascript:void(0)" class="deleteRecort btn btn-danger" data-id="{{$cate->id}}"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
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


<!-- Modal add Categpry -->
<div class="modal fade" id="exampleModal" tabindex="2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm Mới Danh Mục</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="addCategory">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="">Tên danh mục <span class="text-danger">(*)</span></label>
            <input id="name" class="form-control" type="text" name="name"  placeholder="Nhập tên danh mục">
            @if ($errors->has('name')) {
            <span class="text-danger">{{$errors}}</span>
            }
            @endif
          </div>

          <div class="form-group">
            <label for="">Slug Danh Mục <span class="text-danger">(*)</span></label>
            <input id="slug" class="form-control" type="text" name="slug" placeholder="Nhập tên danh mục">
          </div>
          <div class="form-group">
            <label for="">Mô Tả <span class="text-danger">(*)</span></label>
            <input id="description" class="form-control" type="text" name="description" placeholder="Nhập tên danh mục">
          </div>
          <div class="form-group">
            <label for="">Trạng Thái <span class="text-danger">(*)</span></label>
            <select class="form-control" name="status" id="status">
              <option value="0">Hoạt Động</option>
              <option value="1">Không Hoạt Động</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-primary">{{__("Thêm Mới")}}</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
      </div>
      </form>
    </div>

  </div>
</div>

<!-- Modal  Edit-->
<div class="modal fade" id="editCategoryModal"  role="dialog" >
  <div class="modal-dialog" role="document">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sửa  Danh Mục</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="editCategoryForm">
          {{ csrf_field() }}
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label for="">Tên danh mục <span class="text-danger">(*)</span></label>
            <input id="name2" class="form-control" type="text" name="name"  placeholder="Nhập tên danh mục">
            @if ($errors->has('name')) {
            <span class="text-danger">{{$errors}}</span>
            }
            @endif
          </div>

          <div class="form-group">
            <label for="">Slug Danh Mục <span class="text-danger">(*)</span></label>
            <input id="slug2" class="form-control" type="text" name="slug" placeholder="Nhập tên danh mục">
          </div>
          <div class="form-group">
            <label for="">Mô Tả <span class="text-danger">(*)</span></label>
            <input id="description2" class="form-control" type="text" name="description" placeholder="Nhập tên danh mục">
          </div>
          <div class="form-group">
            <label for="">Trạng Thái <span class="text-danger">(*)</span></label>
            <select class="form-control" name="status" id="status2">
              <option value="0">Hoạt Động</option>
              <option value="1">Không Hoạt Động</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-primary">{{__("Thêm Mới")}}</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
      </div>
      </form>
    </div>

  </div>
</div>



<script>
  

  $("#addCategory").submit(function(e) {
    e.preventDefault();
    let name = $("#name").val();
    let slug = $("#slug").val();
    let description = $("#description").val();
    let status = $("#status").val();
    let _token = $("input[name=_token]").val();
    $.ajax({
      url: "{{route('admin.category.addcategory')}}",
      type: "POST",
      data: {
        name: name,
        slug: slug,
        description: description,
        status: status,
        _token: _token
      },
      success: function(response) {
        if (response.success) {
          alert(response.message) //Message come from controller
        } else {
          alert("Error")
        }
      },
      error: function(error) {
        console.log(error)
      }
    });
  });


</script>


<!--ajax edit Category-->
   <script>
       function editCategoryById(id){
           $.get('admin/category/Ajax/editCategory/' + id,function(Category){
            $("#id").val(Category.id);
      $("#name2").val(Category.name);
      $("#slug2").val(Category.slug);
      $("#description2").val(Category.description);
      $("#status2").val(Category.status);
      $("#editCategoryModal").modal('toggle');
           });
       }
       $("#editCategoryForm").submit(function(e){
        e.preventDefault();
        let id=$("#id").val();
        let name=$("#name2").val();
        let slug=$("#slug2").val();
        let description=$("#description2").val();
        let status=$("#status2").val();
        let _token= $("input[name=_token]").val();


        $.ajax({
            url:"{{route('admin.category.Ajax.updateCategory')}}",
            type:"PUT",
            data:{
                id:id,
                name:name,
                slug:slug,
                description:description,
                status:status,
                _token:_token
            },
            success:function (response) {
                if (response.success) {
          alert(response.message) //Message come from controller
        } else {
          alert("Error")
        }
               
            },
            error: function(error) {
        console.log(error);
            }

        });
       
       });
   </script>

   <script>
       $(".deleteRecort").click(function() {
    var id = $(this).data("id");

    if (confirm("Bạn có muốn xóa danh mục này ? ")) {
      $.ajax({

        url: "admin/category/Ajax/delete/" + id,
        type: 'DELETE',
        data: {
          "id": id,
          _token: '{!! csrf_token() !!}',
        },
        success: function() {
          alert("Xóa sản phẩm thành công");
        }

      });
    }

  });
      
      
   </script>
@endsection