@extends('layouts.app')
@section('title', 'Category')
@section('main', 'Category')
@section('content')
    {{-- Add form ----------------------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="">Add category here</h1>
            <button type="button" id="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <input type="text" id="cate_name" name="category" class="form-control mt-3" placeholder="Name" aria-describedby="basic-addon1">
                    <p class="mt-2 ms-2 " id="error"></p>
                </div>
            <div class="modal-footer">
                <button type="button" id="btn_close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="add_cate" class="btn btn-primary">Add</button>
            </div>
        </div>
        </div>
    </div>
    {{-- -------------------------------------------------------------------------------------------------------------- --}}

    {{-- Update --------------------------------------------------------------------------------------------------}}
    <div class="modal fade" id="updateForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Update Genre here</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <input type="text" name="update_id" id="update_id" class="form-control mt-3" disabled>
                        <input type="text" name="update_cate" id="update_cate" class="form-control mt-3">
                        <p class="mt-2 ms-2 " id="errorup"></p>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="update_btn" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
    {{-- --------------------------------------------------------------------------------------------------------- --}}
    <table class="table table-hover">
        <thead class="table-secondary">
            <th class="col-2">Id</th>
            <th class="col-7">Name</th>
            <th class="col-3">Action</th>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            fetch_cate();
            // function to show data __________________________________________________________________________
            function fetch_cate(){
                $.ajax({
                    type: "GET",
                    url: '/fetch_cate',
                    dataType: "json",
                    success: function(response){
                        $('tbody').html('');
                        $.each(response.cate, function(key, valu){
                            $('tbody').append('<tr>\
                                <td>'+valu.id+'</td>\
                                <td>'+valu.name+'</td>\
                                <td>\
                                    <button type="submit" value="'+valu.id+'" class="btn btn-warning" id="edit_btn" data-bs-toggle="modal" data-bs-target="#updateForm">Edit</button>\
                                    <button type="submit" value="'+valu.id+'" class="btn btn-danger" id="delete_btn" onclick="return confirm("Do you want to delete")">Delete</button>\
                                </td>\
                            </tr>');
                        });
                    }
                });
            };
            // ________________________________________________________________________________________________

            // function to add ________________________________________________________________________________
            $(document).on('click', '#add_cate', function(e){
                e.preventDefault();
                // console.log('Hello World');
                var data = {'cate_name': $('#cate_name').val()}

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '/category',
                    data: data,
                    dataType: 'json',
                    success: function(response){
                        if(response.status == 400){
                            $('#error').addClass('text-danger');
                            $.each(response.errors, function(key, val){
                                $('#error').text(val);
                            })
                        }
                        else {
                            $('#error').removeClass('text-danger');
                            $('#error').addClass('text-success');
                            $('#error').text(response.message);
                            $('#cate_name').val('')
                            fetch_cate();
                        }
                    }
                })
            });
            // _________________________________________________________________________________________________

            // function to clean
            $(document).on('click', '#close', function(e){
                e.preventDefault();
                // console.log('Hello World');
                $('#cate_name').val('');
                $('#error').text('');
            });

            $(document).on('click', '#btn-close', function(e){
                e.preventDefault();
                // console.log('Hello World');
                $('#cate_ame').val('');
                $('#error').text('');
            });

            // function to show data to edit ____________________________________________________________________
            $(document).on('click', '#edit_btn', function(e){
                e.preventDefault();
                var ids = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: "/edit-cate/"+ids,
                    success: function(response){
                        $('#update_id').val(ids);
                        $('#update_cate').val(response.cate.name);
                    }
                });
            });
            // __________________________________________________________________________________________________

            // function to update _______________________________________________________________________________
            $(document).on('click', '#update_btn', function(e){
                e.preventDefault();
                var cateid = $('#update_id').val();
                var data = {
                    'update_cate' : $('#update_cate').val(),
                };
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    type: 'PUT',
                    url: "/update-cate/"+cateid,
                    data: data,
                    dataType: 'json',
                    success: function(response){
                        if(response.status == 400){
                            $('#errorup').addClass('text-danger');
                            $.each(response.errors, function(key, val){
                                $('#errorup').text(val);
                            })
                        }
                        else{
                            $('#errorup').removeClass('text-danger');
                            $('#errorup').addClass('text-success');
                            $('#errorup').text(response.message);
                            fetch_cate();
                        }
                    }
                })
            })
            // __________________________________________________________________________________________________

            // function to delete _______________________________________________________________________________
            $(document).on('click', '#delete_btn', function(e){
                e.preventDefault();
                var id = $(this).val();
                alert('Do you want to delete?');
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    type: 'DELETE',
                    url: '/delete-cate/'+id,
                    dataType: 'json',
                    success: function(response){
                        console.log(response);
                        fetch_cate();
                    }
                });
            })
            // __________________________________________________________________________________________________
        });
    </script>
@endsection