<script>
    tinymce.init({
        selector: 'textarea',
        id: 'detail',
        plugins: 'autolink link image preview hr pagebreak media lists',
        toolbar_mode: 'floating',
        toolbar: [
            {
                name: 'history', items: [ 'undo', 'redo' , 'preview']
            },
            {
                name: 'styles', items: [ 'pagebreak']
            },
            {
                name: 'formatting', items: [ 'bold', 'italic']
            },
            {
                name: 'alignment', items: [ 'alignleft', 'aligncenter', 'alignright', 'alignjustify', 'lists' ]
            },
            {
                name: 'indentation', items: [ 'link', 'image' , 'media', 'blockquote', 'bullist', 'numlist']
            }
        ],
        default_link_target: '_blank',
        menubar: false,
        mobile: {
            menubar: false,
            plugins: [ 'autosave', 'lists', 'autolink' ],
            toolbar: [ 'undo', 'bold', 'italic', 'styleselect' ]
        },
        resize: false,
        theme: 'silver',
        height : 350,
        automatic_uploads: true,
        relative_urls : false,
        remove_script_host : false,
        convert_urls : true,
        images_upload_url: '{{ route('forums.upload') }}',
        images_reuse_filename: true,
        language: 'ru',
    });
</script>
