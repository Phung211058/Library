@extends('layouts.app')
@section('title', 'Genres')
@section('content')
    <div id="menu">
        <img src="{{ asset('images/joker1.png') }}" alt="">
        <p class="mt-2">Hello Phung</p>
    {{-- <ul>
        <li>Information</li>
        <li>List</li>
        <li>Teachers</li>
        <li>Students</li>
    </ul> --}}
    <div id="btn">
        <button id="add" name="add" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createForm">Add new</button>
    </div>
    </div>
    <div id="option" class="row">
    <form class="col-8" id="form">
        <input type="text" name="search" class="form-control my-2" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
        <button type="submit" class="btn btn-danger my-2 ms-1"><ion-icon name="search-outline"></ion-icon></button>
    </form>
    {{-- <div class="col-2">Old book</div>
    <div class="col-2"> New book</div> --}}
    </div>
    <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="">Add genre here</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/genre" method="POST" style="display: inline">
                    @csrf
                    <input type="text" id="name" name="Genres_Name" class="form-control mt-3" placeholder="Name" aria-describedby="basic-addon1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="updateForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Update Genre here</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/genre" method="POST" style="display: inline">
                        @csrf
                        <input type="text" name="name" class="form-control mt-3">
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table">
        <thead class="table-dark">
            <th class="col-2">Id</th>
            <th class="col-7">Name</th>
            <th class="col-3">Action</th>
        </thead>
        <tbody>
            @foreach($genres as $gen)
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
            @endforeach
        </tbody>
    </table>
    
    