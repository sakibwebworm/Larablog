@extends('admin.partials.admin-header')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Blank</h1>
                <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>

                <table id="users-table" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>user_id</th>
                        <th>title</th>
                        <th>body</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>





            </div>
        </div>
    </div>
    @extends('admin.partials.admin-footer')

    @section('additionajs')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.11/jquery.tinymce.min.js"></script>
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>
            var editor_config = {
                path_absolute : "/",
                selector: "textarea.body",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern codesample",
                    "fullpage toc tinymcespellchecker imagetools help"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent removeformat formatselect| link image media | emoticons charmap | code codesample | forecolor backcolor",
                external_plugins: { "nanospell": "http://YOUR_DOMAIN.COM/js/tinymce/plugins/nanospell/plugin.js" },
                nanospell_server:"php",
                browser_spellcheck: true,
                relative_urls: false,
                remove_script_host: false,
                file_browser_callback : function(field_name, url, type, win) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                    if (type == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                  /*  tinymce.activeEditor.windowManager.open({
                        file: '',// use an absolute path!
                        title: 'File manager',
                        width: 900,
                        height: 450,
                        resizable: 'yes'
                    }, {
                        setUrl: function (url) {
                            win.document.getElementById(field_name).value = url;
                        }
                    });*/
                }
            };

            tinymce.init(editor_config);
        </script>
        <script>
            (($ => {
                $(() => {
                $.prototype.fullscreen = function()
            {
                var $e = $(this);
                if(!$e.hasClass('modal-fullscreen')) return;
                bind($e);
            }

            function cssn($e, props) {
                let sum = 0;
                props.forEach(p => {
                    sum += parseInt($e.css(p).match(/\d+/)[0]);
            });
                return sum;
            }
            function g($e)
            {
                return {
                    width: cssn($e, ['margin-left', 'margin-right', 'padding-left', 'padding-right', 'border-left-width', 'border-right-width']),
                    height: cssn($e, ['margin-top', 'margin-bottom', 'padding-top', 'padding-bottom', 'border-top-width', 'border-bottom-width']),
                };
            }
            function calc($e)
            {
                const wh = $(window).height();
                const ww = $(window).width();
                const $d = $e.find('.modal-dialog');
                $d.css('width', 'initial');
                $d.css('height', 'initial');
                $d.css('max-width', 'initial');
                $d.css('margin', '5px');
                const d = g($d);
                const $h = $e.find('.modal-header');
                const $f = $e.find('.modal-footer');
                const $b = $e.find('.modal-body');
                $b.css('overflow-y', 'scroll');
                const bh = wh - $h.outerHeight() - $f.outerHeight() - ($b.outerHeight()-$b.height()) - d.height;
                $b.height(bh);
            }
            function bind($e)
            {
                $e.on('show.bs.modal', e => {
                    const $e = $(e.currentTarget).css('visibility', 'hidden');
            });
                $e.on('shown.bs.modal', e => {
                    calc($(e.currentTarget));
                const $e = $(e.currentTarget).css('visibility', 'visible');
            });
            }
            $(window).resize(() => {
                calc($('.modal.modal-fullscreen.in'));
            });
            bind($('.modal-fullscreen'));
            });
            }))(jQuery);
        </script>
        <script>
            $(function() {
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/getposts',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'user_id', name: 'user_id' },
                        { data: 'title', name: 'title' },
                        { data: 'body', name: 'body' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'updated_at', name: 'updated_at' },
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });
        </script>
        <script>
            function populateForm (id){
                $.ajax({url: "/populateform/post/"+id, success: function(result){
                    $("#lara_form").empty().append(result);
                    $('#editmodel').modal('show').fullscreen();
                }});
            }
        </script>
@endsection