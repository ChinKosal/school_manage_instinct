@extends('layouts.master')

@section('content')
<div class="container-fluid">

      <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                  <div class="welcome-text">
                        <h4>Add Student</h4>
                  </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Classes</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Add Class</a></li>
                  </ol>
            </div>
      </div>

      <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                  <a href="{{ route('student.index') }}" class="btn btn-warning col-1"><i class="fa-solid fa-left-long"></i>  Cancel</a>
            </div>
      </div>

      <div class="row mt-4 ">
            <div class="col-lg-12">
                  <div class="card">
                        <div class="card-header">
                              <h4 class="card-title">Class Details</h4>
                        </div>

                        <div class="card-body">
                              <form method="post" action="{{ route('student.save') }}">
                                    @csrf
                                    <div class="row">
                                          <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                      <label class="form-label">Name :</label>
                                                      <input type="text" class="form-control" name="name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Gender :</label>
                                                    <input type="text" class="form-control" name="gender" required>
                                              </div>

                                              <div class="form-group">
                                                <label class="form-label">Class Name</label>
                                                <select class="form-control" name="class_id">
                                                    @foreach ($classes as $class)  
                                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                              <div class="form-group">
                                                <label class="form-label">Status</label>
                                                <select class="form-control" name="status">
                                                <option value="1">In Active</option>
                                                 <option value="0">Active</option>
                              </select>
                                          </div>
                                          </div>     
                                          <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="submit" class="btn btn-primary col-1 ">Submit</button>
                                          </div>
                                    </div>
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</div>
</div>

</div>
@endsection