@extends('layouts.master')

@section('content')
<div class="container-fluid">

      <div class="row">
            <div class="col-lg-12">
                  <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                              <div class="card">
                                    <div class="card-header">
                                          <h4 class="card-title">All Classes </h4>
                                          <div class="d-flex">
                                                <a href="{{ route('class.create') }}" class="btn btn-primary mr-4 ">+ Add new</a>
                                                <form method="get" >
                                                      <label>Search :</label>
                                                      <input type="text" class="p-1 " name="keyword">
                                                      <button><span class="bg-primary p-2 rounded "><i class="fa-solid fa-magnifying-glass"></i></span></button>
                                                </form>
                                                
                                          </div>
                                    </div>
                                    <div class="card-body">
                                          <div class="table-responsive">
                                                @if(session()->has('error'))
                                                <div class="alert alert-danger" role="alert">
                                                      {{session()->get('error')}}
                                                </div>
                                                @elseif(session()->has('success'))
                                                <div class="alert alert-success text-black " role="alert">
                                                      {{session()->get('success')}}
                                                </div>
                                                @endif
                                                <table class="table table-sm mb-0 table-striped">
                                                      <thead>
                                                            <tr>
                                                                  <th>ID</th>
                                                                  <th class="px-5 py-3">Class Name</th>
                                                                  <th class="py-3">Status</th>
                                                                  <th class="py-3">Created Date</th>
                                                                  <th class="py-3">Options</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody id="customers">

                                                      @foreach($classes as $key => $class)
                                                            <tr class="btn-reveal-trigger">
                                                                  <td class="py-2"> {{ $key+1 }} </td>
                                                                  <td class="px-5">{{ $class->name }} </td>
                                                                  <td>@if($class->status == 1)
                                                                        <span class="badge badge-rounded badge-primary">In active</span>
                                                                        @else
                                                                        <span class="badge badge-rounded badge-danger">Acive</span>
                                                                        @endif</td>
                                                                        
                                                                  <td class="py-2"> {{ $class->created_at }} </td>
                                                                  <td>
                                                                        <a href="{{ route('class.edit', $class->id )}}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                                        <a href="{{route('class.delete', $class->id)}}" onclick="return confirm('Are you OK?')" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                                  </td>
                                                            </tr>
                                                      @endforeach
                                                      </tbody>
                                                </table>
                                                <div class="d-flex justify-content-center mt-3 ">
                                                      {{ $classes->links() }}
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

</div>
@endsection