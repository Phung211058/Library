@extends('layouts.app')
@section('title', 'Reader')
@section('main', 'Reader')

@section('content')
<style>
  img{
    width: 100px;
  }
</style>
    <div class="modal fade" id="createForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <h1 class="modal-title fs-5" id="">Add genre here</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/addReader/" method="POST" style="display: inline" enctype="multipart/form-data">
              @csrf
              <input type="file" class="form-control" name="Reader_image" id="inputGroupFile02" value="choose image">
              <input type="text" id="" name="Reader_name" class="form-control mt-3" placeholder="Name" aria-describedby="basic-addon1">
              <select class="form-select mt-3" name="gender" id="">
                      <option>Male</option>
                      <option>Female</option>
                      <option>Other</option>
              </select>
              <input type="text" id="" name="Reader_age" class="form-control mt-3" placeholder="Age" aria-describedby="basic-addon1">
              <input type="text" id="" name="Reader_email" class="form-control mt-3" placeholder="Email" aria-describedby="basic-addon1">
              <input type="text" id="" name="Reader_phone" class="form-control mt-3" placeholder="Phone" aria-describedby="basic-addon1">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
          </form>
          </div>
      </div>
      </div>
  </div>

    <table class="table table-hover text-center">
      <thead class="table-secondary">
        <th class="col-1">Image</th>
        <th class="col-2">Name</th>
        <th class="col-1">Gender</th>
        <th class="col-1">Age</th>
        <th class="col-2">Email</th>
        <th class="col-2">Phone</th>
        <th class="col-1">Realibility</th>
        <th class="col-2">Action</th>
    </thead>
    <tbody>
      <tr>
        <td><img src="{{ asset('images/joker1.png') }}" alt=""></td>
        <td>Nguyễn Minh Phụng</td>
        <td>Nam</td>
        <td>20</td>
        <td>PhungNMGBH211058@fpt.edu.vn</td>
        <td>0329257839</td>
        <td>3</td>
        <td>
          <button class="btn btn-success d-inline">View</button>
          <button class="btn btn-danger d-inline">Delete</button>
        </td>
      </tr>
    </tbody>
    </table>
@endsection