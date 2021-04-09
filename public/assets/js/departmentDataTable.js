(function($) {
    "use strict";

    $(document).ready(function() {

        let datatableSubmit = $('#data_table').DataTable({
            order: [ [0, 'asc'] ],
            "processing": true,
            "serverSide": true,
            "fixedHeader": {
                "headerOffset": $('.main-header').outerHeight()
            },
            "ajax": {
                url: window.appUrl+"/get-departments-data",

            },
            "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                $("td:first", nRow).html(iDisplayIndex +1);
                return nRow;
            },
            "columns":[
                { "data": "id" },
                { "data": "title" },
                { "data": "description" },
                { "data": "total_cases" },
                { "data": "total_tickets" },
                { "data": "total_kb" },
                {  data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        //modal assign department
        // Get single ticket department in EditModel
        $('.modelClose').on('click', function(){
            $('#EditDepartmentModal').hide();
        });
        var id;
        $('body').on('click', '#getEditDepartmentData', function(e) {
            e.preventDefault();
            $('.page-loader').removeClass('d-none');
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: window.appUrl+"/department/"+id+"/edit",
                method: 'GET',
                success: function(result) {
                    $('.page-loader').addClass('d-none');
                    $('#EditDepartmentModalBody').html(result.html);
                    $('#EditDepartmentModal').show();
                }
            });
        });

        // Update department Ajax request.
        $('#SubmitEditDepartmentForm').click(function(e) {
            e.preventDefault();
            $('.page-loader').removeClass('d-none');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: window.appUrl+"/department-update/"+id,
                method: 'post',
                data: {
                    title: $('#title').val(),
                    description: $('#description').val(),
                },
                success: function(result) {
                    $('.page-loader').addClass('d-none');
                    if(result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#data_table').DataTable().ajax.reload();
                        setInterval(function(){
                            $('.alert-success').hide();
                            $('#EditDepartmentModal').hide();
                        }, 2000);
                    }
                }
            });
        });

        // Delete product Ajax request.
        var deleteID;
        $('body').on('click', '#getDeleteId', function(){
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteDepartmentForm').click(function(e) {
            e.preventDefault();
            $('.page-loader').removeClass('d-none');
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: window.appUrl+"/department-delete/"+id,
                method: 'DELETE',
                success: function(result) {
                    $('.page-loader').addClass('d-none');
                    if(result.error) {
                        $('.alert-danger').html('');
                        $('.alert-danger').show();
                        $('.alert-danger').append('<strong><li>'+result.error+'</li></strong>');
                    }else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#data_table').DataTable().ajax.reload();
                        $('#DeleteProductModal').hide();
                        $('.modal-backdrop').remove();
                        toastr.success('Deleted Successfully');
                        location.reload()
                    }
                }
            });
        });

    });

})(jQuery);