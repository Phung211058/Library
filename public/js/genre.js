// @section('script')
    // <script>
        $(document).ready(function(){
            fetch_genres();
            function fetch_genres()
            {
                $.ajax({
                    type: "GET",
                    url: '/fetch_genres',
                    dataType: "json",
                    success: function(response){
                        // console.log(response.genres);
                        // $('tbody').html('');
                        // $.each(response.genres, function(key, val){
                        //     $('tbody').append('<tr>\
                        //         <td>'+val.id+'</td>\
                        //         <td>'+val.Genres_Name+'</td>\
                        //         <td>\
                        //             <button type="submit" class="btn btn-warning" id="edit_btn" data-bs-toggle="modal" data-bs-target="#updateForm">Edit</button>\
                        //                 <button type="submit" class="btn btn-danger" onclick="return confirm("Do you want to delete")">Delete</button>\
                        //         </td>\
                        //     </tr>');
                        // });
                    }
                });
            }


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
                        // console.log(response);  
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
                    }
                })

            });

            $(document).on('click', '#close', function(e){
                e.preventDefault();
                // console.log('Hello World');
                $('#Genres_Name').val('');
                $('#error').text('');
            });



            $(document).on('click', '#edit_btn', function(e){
                e.preventDefault();
                var idd = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "/edit-genre/"+idd,
                    success: function (response){
                        console.log(response);
                        $('#update_name').val(response.genre.Genres_Name);
                    }
                });
            });
        });
    // </script>
// @endsection