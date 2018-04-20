@yield('additionahtml')
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >Logout</button>
            </div>
        </div>
    </div>
</div>
 <form id="logout-form" action="http://lara-blog.sakib/logout" method="POST" style="display: none;"><input type="hidden" name="_token" value="l5jxoRBsFoYuRl3M54VyjlvsXYCxWtb8QDejpRlM"></form>
<!-- Bootstrap core JavaScript-->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
@yield('additionajs')
<script>
    /*    function populateForm(id){
            $.ajax({
                type: "GET",
                url: '/populateform/user/',
                success: function( msg ) {
                    msg.forEach(function(element) {
                        $("#populate").append(`<div class="form-group">
                            <label for="${element}" class="col-form-label">${element}</label>
                            <input type="text" class="form-control" id="${element}" name="${element}">
                        </div>`);
                    });
                    $('#edituser').modal();
                    populateFormdata(id,msg);
                }
            });
        }
        function populateFormdata(id,msg){
            $.ajax({
                type: "GET",
                url: '/populateform/user/'+id,
                success: function( kaka ) {
                    msg.forEach(function(element) {
                        $("#"+element).val= kaka.element;
                    });
                }
            });
        }
        function deleteForm(id,route){
        }*/
</script>
<script src="/js/sb-admin.min.js"></script>
<script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
</body>

</html>