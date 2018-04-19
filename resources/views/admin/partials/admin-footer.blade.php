@yield('additionahtml')
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