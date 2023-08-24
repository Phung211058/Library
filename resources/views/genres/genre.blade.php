@extends('layouts.app')
@section('title', 'Genres')
@section('main', 'Genres')

@section('content')
    {{-- Add form--------------------------------------------------------------------------------------------------------------------}}
    <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="">Add genre here</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <input type="text" id="Genres_Name" name="Genres_Name" class="form-control mt-3" placeholder="Name" aria-describedby="basic-addon1">
                    <p class="mt-2 ms-2" id="error"></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="submit_add" class="btn btn-primary">Add</button>
            </div>
        </div>
        </div>
    </div>
    {{-- -------------------------------------------------------------------------------- --}}

    {{-- Update form----------------------------------------------------------------------------}}
    <div class="modal fade" id="updateForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Update Genre here</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <form action="/genre" method="POST" id="update_form" style="display: inline">
                        @csrf @method('PUT') --}}
                        <input type="text" name="update_id" id="update_id" disabled class="form-control mt-3">
                        <input type="text" name="update_name" id="update_name" class="form-control mt-3">
                        <p class="mt-2 ms-2" id="errorup"></p>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="btn_update" class="btn btn-primary">Update</button>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- ------------------------------------------------------------------------------------------------------------------ --}}
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
            // Function to show all the information ---------------------------------------------------------------
            fetch_genres();
            function fetch_genres(){
                $.ajax({
                    type: "GET",
                    url: '/fetch_genres',
                    dataType: "json",
                    success: function(response){
                        $('tbody').html('');
                        $.each(response.genres, function(key, val){
                            $('tbody').append('<tr>\
                                <td>'+val.id+'</td>\
                                <td>'+val.Genres_Name+'</td>\
                                <td>\
                                    <button type="submit" value="'+val.id+'" class="btn btn-warning" id="edit_btn" data-bs-toggle="modal" data-bs-target="#updateForm">Edit</button>\
                                    <button type="submit" value="'+val.id+'" class="btn btn-danger" id="delete_btn" onclick="return confirm("Do you want to delete")">Delete</button>\
                                </td>\
                            </tr>');
                        });
                    }
                });
            };
            // -----------------------------------------------------------------------------------------------------
            
            // function to add a new ------------------------------------------------------------------------------
            $(document).on('click', '#submit_add', function(e){
                e.preventDefault();
                var data = {
                    'Genres_Name': $('#Genres_Name').val()
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    type: 'POST',
                    url: '/genre',
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
                            $('#Genres_Name').val('')
                            fetch_genres();
                        }
                    },
                });
            });
            // ------------------------------------------------------------------------------------------------------

            // function to clean ------------------------------------------------------------------------------------
            $(document).on('click', '#close', function(e){
                e.preventDefault();
                // console.log('Hello World');
                $('#Genres_Name').val('');
                $('#error').text('');
            });

            $(document).on('click', '.btn-close', function(e){
                e.preventDefault();
                // console.log('Hello World');
                $('#Genres_Name').val('');
                $('#error').text('');
            });
            //-------------------------------------------------------------------------------------------------------

            // function to show information to edit -----------------------------------------------------------------
            $(document).on('click', '#edit_btn', function(e){
                e.preventDefault();
                var idd = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "/edit-genre/"+idd,
                    success: function (response){
                        // console.log(response);
                        $('#update_id').val(idd);
                        $('#update_name').val(response.genre.Genres_Name);
                    }
                });
            });
            //-----------------------------------------------------------------------------------------------------------------

            // function to update ---------------------------------------------------------------------------------------------
            $(document).on('click', '#btn_update', function(e){
                e.preventDefault();
                var genid = $('#update_id').val();
                var data = {
                    'update_name' : $('#update_name').val(),
                };
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'PUT',
                    url: "/update-genre/"+genid,
                    data: data,
                    dataType: 'json',
                    success: function(response) {
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
                            fetch_genres();
                        }}
                    });
                    });
            //---------------------------------------------------------------------------------------------------------------------

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
                    url: '/delete-genre/'+id,
                    dataType: 'json',
                    success: function(response){
                        console.log(response);
                        fetch_genres();
                    }
                });
            })

        });
    </script>
@endsection
    