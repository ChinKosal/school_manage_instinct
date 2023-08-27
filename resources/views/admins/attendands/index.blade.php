@extends('layouts.master')

@section('content')
<div class="container-fluid">
      <div class="row">
            <div class="col-lg-12">
                  <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                              <div class="card">
                                    <div class="card-body">
                                           <div class="card-header">
                                          <h4 class="card-title"> </h4>
                                          <div class="d-flex">
                                                <form  method="get" name="keyword">
                                                      <label for="">Start Date:</label>
                                                      <input type="date" class="p-1 " name="start_date">
                                                      <label for="">End Date:</label>
                                                      <input type="date" class="p-1 " name="end_date">

                                                      <button type="submit"><span class="bg-primary p-2 rounded "><i class="fa-solid fa-magnifying-glass"></i></span></button>
                                                </form>
                                          </div>
                                    </div>
                                          <div class="table-responsive">
                                                <table class="table table-sm mb-0 table-striped">
                                                      <thead>
                                                            <tr>
                                                                  <th class="py-3">ID</th>
                                                                  <th class="px-5 py-3">Name</th>
                                                                  <th class="py-3">Attendant</th>
                                                                  <th class="py-3">Date</th>
                                                                  <th class="py-3">Actions</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody id="customers">
                                                            @foreach($attendands as $key => $att)
                                                                  <tr class="btn-reveal-trigger">
                                                                        <td class="py-2">{{ $key+1 }}</td>
                                                                        <td class="px-5">{{ $att->attendand_name }}</td>
                                                                        <td>@if($att->actions == 1)
                                                                              <span class="badge badge-rounded badge-primary">Yes</span>
                                                                              @else
                                                                              <span class="badge badge-rounded badge-danger">No</span>
                                                                              @endif
                                                                        </td>
                                                                        <td class="py-2">{{ $att->created_at }}</td>
                                                                        <td>
                                                                              <a href="{{ route('attendand.edit', $att->id )}}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                                              <a href="{{route('attendand.delete', $att->id)}}" onclick="return confirm('Are you OK?')" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                                        </td>
                                                                  </tr>
                                                            @endforeach
                                                            
                                                      </tbody>
                                                </table>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
</div>

</div>
@endsection
