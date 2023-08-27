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
                                                <a href="{{ route('student.create') }}" class="btn btn-primary mr-4 ">+ Add new</a>
                                                <form method="get">
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
                                                                  <th class="px-5 py-3">Name</th>
                                                                  <th class="py-3">Class Name</th>
                                                                  <th class="py-3">Gender</th>
                                                                  <th class="py-3">Status</th>
                                                                  <th class="py-3">Options</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody id="customers">

                                                      @foreach($students as $key => $student)
                                                            <tr class="btn-reveal-trigger">
                                                                  <td class="py-2"> {{ $key+1 }} </td>
                                                                  <td class="px-5">{{ $student->name }} </td>
                                                                  <td class="px-5">{{ $student->class_name }} </td>
                                                                  <td class="px-5">{{ $student->gender }} </td>
                                                                  <td>@if($student->status == 1)
                                                                        <span class="badge badge-rounded badge-primary">In Acive</span>
                                                                        @else
                                                                        <span class="badge badge-rounded badge-danger">Active</span>
                                                                        @endif</td>
                                                                  <td>
                                                                        <a href="{{ route('student.edit', $student->id )}}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                                        <a href="{{route('student.delete', $student->id)}}" onclick="return confirm('Are you OK?')" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                                  </td>
                                                            </tr>
                                                      @endforeach
                                                      </tbody>
                                                </table>
                                                <div class="d-flex justify-content-center mt-3 ">
                                                      {{ $students->links() }}
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
