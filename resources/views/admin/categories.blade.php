@extends('admin.partials.admin-header')
@include('admin.partials.navigation')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               <div class="text-center">
                   <h1>Categories</h1>
                   <p>Add new category</p>
                   <button class="btn btn-success btn-lg" onclick="addcategory()">Add Category</button>
               </div>
                <table id="categories-table" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
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
    @section('additionahtml')

        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Your Website 2018</small>
                </div>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        {{--Modal form--}}
        <div class="modal fade modal-fullscreen" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Categories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="lara_form">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('additionajs')
        <script src="/js/jquery.tinymce.min.js"></script>
        <script src="/js/tinymce.min.js"></script>
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
                $('#categories-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/getcategories',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'updated_at', name: 'updated_at' },
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });
        </script>
        <script>
            function populateForm (id){
                $.ajax({url: "/populateform/category/"+id, success: function(result){
                    $("#lara_form").empty().append(result);
                    tinymce.remove('textarea');
                    $('#editmodel').modal('show').fullscreen();
                    tinymce.init(editor_config);
                }});
            }
        </script>
        <script>
            function addcategory(){
                $.ajax({url: "/createcategory", success: function(result){
                    $("#lara_form").empty().append(result);
                    $('#editmodel').modal('show').fullscreen();
                }});
            }
        </script>
@endsection