@extends('layouts.master')
@section('content')
    <div id="items" class="container">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#customerModal">add<span
            class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
        {{-- @include('layouts.flash-messages') --}}
        {{-- <a class="btn btn-primary" href="{{ route('items.create') }}" role="button">add</a> --}}
        {{-- <form method="POST" enctype="multipart/form-data" action="{{ route('item-import') }}">
            {{ csrf_field() }}
            <input type="file" id="uploadName" name="item_upload" required>
            <button type="submit" class="btn btn-info btn-primary ">Import Excel File</button>

        </form> --}}
        <div class="card-body" style="height: 210px;">
            <input type="text" id='itemSearch' placeholder="--search--">
        </div>
        <div class="table-responsive">
            <table id="ctable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>customer ID</th>
                        <th>image</th>
                        <th>lname</th>
                        <th>fname</th>
                        
                        <th>addressline</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="cbody"></tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="customerModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create new customer</h4>
              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="cform" method="#" action="#" enctype="multipart/form-data">
      
                  <div class="form-group">
                      <label for="customerId" class="control-label">customer id</label>
                      <input type="text" class="form-control" id="customerId" name="customer_id" readonly>
                    </div>
                
                <div class="form-group">
                  <label for="lname" class="control-label">last name</label>
                  <input type="text" class="form-control " id="lname" name="lname">
                </div>
                <div class="form-group">
                  <label for="fname" class="control-label">first name</label>
                  <input type="text" class="form-control " id="fname" name="fname">
                </div>
                <div class="form-group">
                  <label for="address" class="control-label">address</label>
                  <input type="text" class="form-control " id="address" name="addressline">
                </div>
                
                <div class="form-group">
                  <label for="zipcode" class="control-label">zipcode</label>
                  <input type="text" class="form-control " id="zipcode" name="zipcode">
                </div>
                <div class="form-group">
                  <label for="phone" class="control-label">phone</label>
                  <input type="text" class="form-control " id="phone" name="phone">
                </div>
                <div class="form-group">
                  <label for="email" class="control-label">email</label>
                  <input type="text" class="form-control " id="email" name="email">
                </div>
                <div class="form-group">
                  <label for="pass" class="control-label">password</label>
                  <input type="password" class="form-control " id="pass" name="password">
                </div>
                <div class="form-group">
                  <label for="image" class="control-label">Image</label>
                  <input type="file" class="form-control" id="image_upload" name="uploads" />
                </div>
              </form>
            </div>
            <div class="modal-footer" id="footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button id="customerSubmit" type="submit" class="btn btn-primary">Save</button>
              <button id="customerUpdate" type="submit" class="btn btn-primary">update</button>
            </div>
      
          </div>
        </div>
      </div>
@endsection
