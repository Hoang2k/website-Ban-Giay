$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function removeRow(id, url) {
    if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function (result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa lỗi vui lòng thử lại');
                }
            }
        })
    }
}

/*Upload file */
$('#upload').change(function(){
    const form =new FormData();
    form.append('file',$(this)[0].files[0]);

    $.ajax({
   url:'admin/upload/services',
   data: form,
   type: 'POST',
   dataType:'JSON',
   contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
   processData: false, // NEEDED, DON'T OMIT THIS
   // ... Other options like success and etc
   success:function(result){
     if(result.error ==false){
         $('#show_img').html('<a href="'+'asset'+result.url+'" target="_blank" ><img src="asset'+result.url+'"></a>');
         $('#file').val(result.url);
     }
     else {
         alert("upload file thất bại");
     }
   }
    });
});

