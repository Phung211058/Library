@extends('layouts.app')
@section('title', 'Genres')

@section('content')
    <div id="menu">
        <img id="titleimg" src="{{ asset('images/joker1.png') }}" alt="">
        <p class="mt-2">Hello Phung</p>
    <ul>
        <a href="/addReader/"><li>Reader list</li></a>
        <a href="/genre/"><li>Genre list</li></a>
        <a href="/books/"><li>Books list</li></a>
        <a href="/category/"><li>Categories list</li></a>
    </ul>
    <div id="btn">
        <button id="add" name="add" class="btn btn-success" data-bs-toggle="modal" 
                        data-bs-target="#createForm">Add new</button>
    </div>
    </div>
    <div id="option" class="row">
    <form class="col-8" id="form">
        <input type="text" name="search" class="form-control my-2" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
        <button type="submit" class="btn btn-danger my-2 ms-1"><ion-icon name="search-outline"></ion-icon></button>
    </form>
    </div>
    {{-- Add form--------------------------------------------------------------------------------------------------------------------}}
    <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="">Add genre here</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <form action="/genres" id="add_form" method="POST" style="display: inline">
                    @csrf --}}
                    <input type="text" id="Genres_Name" name="Genres_Name" class="form-control mt-3" placeholder="Name" aria-describedby="basic-addon1">
                    <p class="mt-2 ms-2" id="error"></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="submit_add" class="btn btn-primary">Add</button>
                {{-- </form> --}}
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
    <table class="table">
        <thead class="table-dark">
            <th class="col-2">Id</th>
            <th class="col-7">Name</th>
            <th class="col-3">Action</th>
        </thead>
        <tbody>
            {{-- @foreach($genres as $gen)
            <tr>
                <td>{{ $gen->id }}</td>
                <td>{{ $gen->Genres_Name }}</td>
                <td>
                    <button type="submit" class="btn btn-warning" id="edit_btn" value="{{ $gen->id }}" data-bs-toggle="modal" data-bs-target="#updateForm">Edit</button>
                    <form action="/genre/{{ $gen->id }}" method="POST" style="display: inline">
                        @csrf @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach --}}
        </tbody>
    </table>
@endsection

{{-- @yield('CRUD') --}}

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
                        // console.log(response.genres);
                        $('tbody').html('');
                        $.each(response.genres, function(key, val){
                            $('tbody').append('<tr>\
                                <td>'+val.id+'</td>\
                                <td>'+val.Genres_Name+'</td>\
                                <td>\
                                    <button type="submit" value="'+val.id+'" class="btn btn-warning" id="edit_btn" data-bs-toggle="modal" data-bs-target="#updateForm">Edit</button>\
                                        <button type="submit" value="'+val.id+'" class="btn btn-danger" onclick="return confirm("Do you want to delete")">Delete</button>\
                                </td>\
                            </tr>');
                        });
                    }
                });
            }
            // -----------------------------------------------------------------------------------------------------
            
            // function to add a new ------------------------------------------------------------------------------
            $(document).on('click', '#submit_add', function(e){
                e.preventDefault();
                // console.log('Hello World');
                var data = {
                    'Genres_Name': $('#Genres_Name').val()
                }
                // console.log(data);

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
                        console.log(response);  
                        if(response.status == 400){
                            // $('#error').html('');
                            $('#error').addClass('text-danger');
                            $.each(response.errors, function(key, val){
                                $('#error').text(val);
                            })
                        }
                        else {
                            $('#error').removeClass('text-danger');
                            $('#error').addClass('text-success');
                            $('#error').text(response.message);
                            // $('#add_form').find('input').text('');
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
                        if(response.status == 405){
                            $('#errorup').addClass('text-danger');
                            $.each(response.errors, function(key, val){
                                $('#error').text(val);
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


        });
    </script>
@endsection
    