<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{{-- Post --}}
{!! JsValidator::formRequest('App\Http\Requests\PostRequest', '#save-post') !!}
{!! JsValidator::formRequest('App\Http\Requests\PostUdateRequest', '#save-Upost') !!}
{{-- Page --}}
{!! JsValidator::formRequest('App\Http\Requests\PageRequest', '#save-page') !!}
{!! JsValidator::formRequest('App\Http\Requests\PageUpdateRequest', '#save-Upage') !!}
{{-- Category --}}
{!! JsValidator::formRequest('App\Http\Requests\CategoryRequest', '#save-cate') !!}
{!! JsValidator::formRequest('App\Http\Requests\CategoryUpdateRequest', '#save-Ucate') !!}

<script>
    CKEDITOR.replace('my-editor',{
        filebrowserImageBrowseUrl: '/andrologi-filemanager?type=Images',
        filebrowserImageUploadUrl: '/andrologi-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/andrologi-filemanager?type=Files',
        filebrowserUploadUrl: '/andrologi-filemanager/upload?type=Files&_token={{csrf_token()}}'
    });
    CKEDITOR.config.allowedContent = true;
</script>

{{--  Toggle Sidebar  --}}
<script>
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });
</script>

<script>
    function confirmDelete(){
        if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
    }
</script>
