@extends('layouts.master')
@section('content')
    <div id="items" class="container">
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
                        
                        <th>lname</th>
                        <th>fname</th>
                        <th>lname</th>
                        <th>addressline</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="itemModal" role="dialog" style="display:none">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create new customer</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="iform" method="{{ route('customers.store') }}" action="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="desc" class="control-label">Description</label>
                            <input type="text" class="form-control" id="desc" name="description">
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 
                </div>

            </div>
        </div>
    </div>
@endsection
