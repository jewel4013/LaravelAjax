<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.add_product', function(e){
                e.preventDefault();
                let name = $('#name').val();
                let price = $('#price').val();

                $.ajax({
                    url: "{{ route('porductStore') }}",
                    method: 'post',
                    data: {name:name, price:price},
                    success:function(res){
                        if(res.status == 'success'){
                            $('#productModal').modal('hide');
                            $('#addProductModel')[0].reset();
                            $('.errMsgContent').empty();
                            $('.table').load(location.href+' .table');
                            Command: toastr["success"]("Add Product successful")
                            toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                        }
                     },
                    error:function(err){
                        let error = err.responseJSON;
                        $.each(error.errors, function(index, value){
                            $('.errMsgContent').append('<span class="text-danger">'+value+'</span>'+'<br>');
                        });
                    }
                });
            })

            $(document).on('click', '.update_product_form', function(){
                let id = $(this).data('id');
                let name = $(this).data('name');
                let price = $(this).data('price');

                $('#up_id').val(id);
                $('#up_name').val(name);
                $('#up_price').val(price);
            });

            $(document).on('click', '.update_product', function(e){
                e.preventDefault();
                let up_id = $('#up_id').val();
                let up_name = $('#up_name').val();
                let up_price = $('#up_price').val();

                $.ajax({
                    url: "{{ route('porductUpdate') }}",
                    method: 'post',
                    data: {up_id:up_id, up_name:up_name, up_price:up_price},
                    success:function(res){
                        if(res.status == 'success'){
                            $('#updateProductModal').modal('hide');
                            $('#updateProductModel')[0].reset();
                            $('.errMsgContent').empty();
                            $('.table').load(location.href+' .table');
                            Command: toastr["success"]("Product update success")
                            toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                        }
                     },
                    error:function(err){
                        let error = err.responseJSON;
                        $.each(error.errors, function(index, value){
                            $('.errMsgContent').append('<span class="text-danger">'+value+'</span>'+'<br>');
                        });
                    }
                });
            });

            $(document).on('click', '.delete_product', function(e){
                e.preventDefault();
                let id = $(this).data('id');
                if(confirm("Are you realy want to delete this data.")){
                    $.ajax({
                        url: "{{ route('porductDelete') }}",
                        method: 'post',
                        data: {id:id},
                        success: function(res){
                            if(res.status == 'success'){
                                $('.table').load(location.href+' .table');
                                Command: toastr["success"]("Product Delete success.")
                                toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                                }
                            }
                        },
                    });
                }
            });




            $(document).on('click', '.model_close_btn', function(e){
                e.preventDefault();
                $('#updateProductModel, #addProductModel')[0].reset();
                $('.errMsgContent').empty();
            });




            // paginate
            $(document).on('click', '.pagination a', function(e){
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                product(page)

            });

            function product(page){
                $.ajax({
                    url: "/pagination/paginate-data?page="+page,
                    success:function(res){
                        $('.table-data').html(res);
                    }
                });
            }


        });
    </script>























    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
