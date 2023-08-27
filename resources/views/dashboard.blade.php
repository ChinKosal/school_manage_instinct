@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="widget-stat card bg-primary overflow-hidden">
                <div class="card-header">
                    <h2 class="card-title text-white">Total Students</h2>
                </div>
                <div class="card-body">
                  <h1 class="text-white mb-0"> {{ $studentAll }} </h1>
                </div>
            </div>
        </div>

        {{-- <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="widget-stat card bg-success overflow-hidden">
                <div class="card-header">
                    <h2 class="card-title text-white">Class Active</h2>
                </div>
                <div class="card-body">
                  <h1 class="text-white mb-0"> {{ $classesActive }} </h1>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="widget-stat card bg-warning overflow-hidden">
                <div class="card-header">
                    <h2 class="card-title text-white">Class in Active</h2>
                </div>
                <div class="card-body">
                  <h1 class="text-white mb-0"> {{ $classesInActive }} </h1>
                </div>
            </div>
        </div> --}}
    </div>

</div>
@endsection