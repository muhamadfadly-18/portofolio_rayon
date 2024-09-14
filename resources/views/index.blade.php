@extends('layouts.template')

@section('content')
@if (Auth::user()->role == 'admin')
    

<div class="row">
  <div class="col-md-4 mb-4">
    <div class="card">
      <div class="card-body shadow-lg">
        <h5 class="card-title">Peserta Didik</h5>
        <h5>{{ $student }}</h5>
        <a href="#" class="btn btn-primary mt-2">
          <i class="bi bi-person"></i> View Details
        </a>
      </div>
    </div>
  </div>

  
  <div class="col-md-4 mb-4">
    <div class="card">
      <div class="card-body shadow-lg">
        <h5 class="card-title">Administrator</h5>
        <h5>{{ $admin }}</h5>
        <a href="#" class="btn btn-primary">
          <i class="bi bi-person"></i> View Details
        </a>
      </div>
    </div>
  </div>

  
  <div class="col-md-4 mb-4">
    <div class="card">
      <div class="card-body shadow-lg">
        <h5 class="card-title">Pembimbing Siswa</h5>
        <h5>{{ $ps }}</h5>
        <a href="#" class="btn btn-primary">
          <i class="bi bi-person"></i> View Details
        </a>
      </div>
    </div>
  </div>

  
  <div class="col-md-4 mb-4">
    <div class="card">
      <div class="card-body shadow-lg">
        <h5 class="card-title">Rombel</h5>
        <h5>{{ $rombels }}</h5>
        <a href="#" class="btn btn-primary">
          <i class="bi bi-person"></i> View Details
        </a>
      </div>
    </div>
  </div>


  <div class="col-md-4 mb-4">
    <div class="card">
      <div class="card-body shadow-lg">
        <h5 class="card-title">Rayon</h5>
        <h5>{{ $rayons }}</h5>
        <a href="#" class="btn btn-primary">
          <i class="bi bi-person"></i> View Details
        </a>
      </div>
    </div>
  </div>
</div>
@endif
  

@endsection
     