@extends('layouts.master')

@section('content')
<div class="container-fluid">
      <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                  <a href="{{ route('attendand.index') }}" class="btn btn-warning col-1"><i class="fa-solid fa-left-long"></i>  Cancel</a>
            </div>
      </div>

      <div class="row mt-4 ">
            <div class="col-lg-12">
                  <div class="card">
                        <div class="card-header">
                              <h4 class="card-title">Class Details</h4>
                        </div>

                        <div class="card-body">
                              <form method="post" action="{{ route('attendand.save') }}">
                                    @csrf
                                    <div class="row">
                                          <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                      <label class="form-label">Name :</label>
                                                      <select class="form-control" name="student_id">
                                                            <option selected disabled>Please Select Name</option>
                                                            @foreach ($students as $student)  
                                                                  <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                              <div class="form-group">
                                                <label class="form-label">Attendand</label>
                                                <select class="form-control" name="actions">
                                                      <option value="1">Yes</option>
                                                      <option value="0">No</option>
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