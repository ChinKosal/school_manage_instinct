<?php 
      $route_name = request()->route()->getName();
      $route_name = explode('.', $route_name);
      $route_prefix = $route_name[0];
?>

<div class="dlabnav">
      <div class="dlabnav-scroll">
            <ul class="metismenu" id="menu">
                  <li class="nav-label first">Main Menu</li>
                  <li>
                        <a class="@if($route_prefix == 'home') text-primary bg-light  @endif" href="{{ route('home') }}" aria-expanded="false">
                              <i class="la la-home"></i>
                              <span class="nav-text">Dashboard</span>
                        </a>
                  </li>
                  <li>
                        <a class="@if($route_prefix == 'class') text-primary bg-light  @endif" href="{{ route('class.index') }}">
                              <i class="la la-user"></i>
                              <span class="nav-text">Classes</span>
                        </a>
                  </li>
                  <li>
                        <a class="@if($route_prefix == 'student') text-primary bg-light  @endif" href="{{ route('student.index') }}">
                              <i class="la la-user"></i>
                              <span class="nav-text">Students</span>
                        </a>
                  </li>
                  <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                              <i class="la la-users"></i>
                              <span class="nav-text">Attendands</span>
                        </a>
                        <ul aria-expanded="false">
                              <li><a href="{{ route('attendand.index') }}">Students Attendand</a></li>
                              <li><a href="{{ route('attendand.create') }}">Add Attendand</a></li>
                        </ul>
                  </li>
            </ul>
      </div>
</div>