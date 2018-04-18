@extends('admin.partials.admin-header')
<div class="content-wrapper">
        <div class="container-fluid">
                <div class="row">
                        <div class="col-12">
                            @if(Session::has('flash_message'))

                                <div class="alert alert-success"id="hide_flash">{{Session::get('flash_message')}}</div>

                            @endif
        <h1>Blank</h1>
        <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>

                            <table id="users-table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
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
        <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="name">Picture</label>
                                <input type="file" class="form-control" id="picture" name="picture" placeholder="picture">
                            </div>
                            <div class="form-group">
                                <label for="about">About</label>
                                <textarea name="about" id="about" name="about" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="role" name="role" class="form-control">
                                    <option>Admin</option>
                                    <option>User</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@section('additionajs')
        <script>
            $(function() {
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '/getusers',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'updated_at', name: 'updated_at' },
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });
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

               function populateForm (id){
                   $.ajax({url: "/populateform/user/"+id, success: function(result){
                       $("#lara_form").empty().append(result);
                       $('#editmodel').modal('show').fullscreen();
                   }});
                }



        </script>

        <script type="text/javascript">
            $('#hide_flash').fadeIn('fast').delay(3000).fadeOut('slow');
        </script>
    @endsection