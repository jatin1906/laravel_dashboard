@extends('layouts.index')

@section('title','Table')

@section('content')


<div class="pagetitle">
  <h1>Data Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('index.index')}}">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="btn-add"><a type="button" href="{{route('cms.cmsadd')}}" class="btn btn-success">Add Data</a></div>
          <!-- Table with stripped rows -->
          <table class="table datatable table-bordered text-center table-striped">
            <thead>
              <tr>
                <th>Parent Page</th>
                <th>Page Url</th>
                <th>Page Title</th>
                <th>Page Order</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td>Mark Brock</td>
                <td>3310</td>
                <td>Veenendaal</td>
                <td>2006/08/09</td>
                <td>41%</td>
                <td>41%</td>
              
              </tr>

            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

@endsection