<script type="text/javascript">
    {{-- confirm delete Post--}}
    $('.delete').on('click', function(e){
        e.preventDefault();
        var self   = $(this);
        var title  = $(this).attr("data-postTitle");
        var formid = $(this).attr("data-postId");
        swal({
            title: "Konfirmasi",
            text:  "Hapus Data : "+title+" ?",
            type:  "warning",
            showCancelButton: true,
            confirmButtonClass: "btn btn-outline-danger waves-effect",
            cancelButtonClass: "btn btn-elegant waves-effect",
            confirmButtonText:  "Ya, Hapus !",
            cancelButtonText:  "Batal",
            closeConfirm: true
        },function(){
            $("#"+formid).submit();
        });
    });

    {{-- Restore Post--}}
    $('.restore').on('click', function(e){
        e.preventDefault();
        var self   = $(this);
        var title  = $(this).attr("data-postTitle");
        var formid = $(this).attr("data-postId");
        var getLink = $(this).attr('href');
        swal({
            title: "Konfirmasi",
            text:  "Restore Data : "+title+" ?",
            type:  "warning",
            showCancelButton: true,
            confirmButtonClass: "btn btn-outline-danger waves-effect",
            cancelButtonClass: "btn btn-elegant waves-effect",
            confirmButtonText:  "Ya, Restore !",
            cancelButtonText:  "Batal",
            closeConfirm: true
        },function(){
            window.location.href = getLink
        });
        return false;
    });

    {{-- confirm forceDelete Post--}}
    $('.force').on('click', function(e){
        e.preventDefault();
        var self   = $(this);
        var title  = $(this).attr("data-forceTitle");
        var formid = $(this).attr("data-forceId");
        var getLink = $(this).attr('href');
        swal({
            title: "Konfirmasi",
            text:  "Hapus Permanen Data : "+title+" ?",
            type:  "warning",
            showCancelButton: true,
            confirmButtonClass: "btn btn-outline-danger waves-effect",
            cancelButtonClass: "btn btn-elegant waves-effect",
            confirmButtonText:  "Ya, Hapus !",
            cancelButtonText:  "Batal",
            closeConfirm: true
        },function(){
            window.location.href = getLink
        });
        return false;
    });
</script>
