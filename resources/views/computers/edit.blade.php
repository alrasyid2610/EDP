@extends('layouts.main')
@section('content')
  <div class="page-title">
    <div class="title_left col-md-12">
      <h3>Komputer <small> | <a href="{{ route('computers.create') }}" class="text-primary">Input Komputer</a> |
          <a href="{{ route('computers.index') }}" class="text-primary">View Data</a> </small></h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5  form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
  </div>

  @php
      $title = "Form Edit";
      $route = 'computers.update';
  @endphp

  <x-table-computer :title="$title" :route="$route" :dataComputer="$data" :dataSection="$dataSection"></x-table-computer>
@endsection
