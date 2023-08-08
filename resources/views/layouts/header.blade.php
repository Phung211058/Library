@extends('layouts.app')
@section('title', 'Genres')
@section('layouts.head')
    <div id="menu">
        <img src="{{ asset('images/joker1.png') }}" alt="">
        <p class="mt-2">Hello Phung</p>
    <ul>
        <li>Information</li>
        <li>List</li>
        <li>Teachers</li>
        <li>Students</li>
    </ul>
    <div id="btn">
        <button id="add" name="add" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createForm">Add new</button>
    </div>
    </div>
    <div id="option" class="row">
    <form class="col-8" id="form">
        <input type="text" name="search" class="form-control my-2" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
        <button type="submit" class="btn btn-danger my-2 ms-1"><ion-icon name="search-outline"></ion-icon></button>
    </form>
    <div class="col-2">Old book</div>
    <div class="col-2"> New book</div>
    </div>
    <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="">Add book here</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{" method="POST" style="display: inline">
                    @csrf
                    <input type="text" id="name" name="name" class="form-control mt-3" placeholder="Title" aria-describedby="basic-addon1">
                {{-- </form> --}}
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
                <form action="" method="POST" style="display: inline">
                    @csrf
                    <input type="text" id="title" name="title" class="form-control mt-3">
                    <input type="text" id="description" name="description" class="form-control mt-3">
                    <input type="text" id="year" name="year" class="form-control mt-3">
                {{-- </form> --}}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
            </form>
            </div>
        </div>
        </div>
    </div>
{{-- @endsection --}}