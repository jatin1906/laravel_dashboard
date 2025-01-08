@extends('layouts.index')

@section('title','Add Cms')

@section('content')

<section class="section">
  <div class="row">
    <div class="col-lg-10">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Cms</h5>
          @if(session('success'))
          <div class="alert alert-success popup">
            {{ session('success') }}
          </div>
          @endif
          <!-- General Form Elements -->
          <form method="post" action="/add-cms-data">

            @csrf
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Parent Page :</label>
              <div class="col-sm-10">
                <select id='parent_page' name="parent_page" class="form-control">

                  <option value='0'>---Please Select</option>
                  @if(isset($selData) && count($selData) >0)
                  @foreach($selData as $val)
                  <option value="{{$val->id}}"> {{$val->page_title}}</option>
                  @endforeach
                  @endif

                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-2 col-form-label">Menu Name :</label>
              <div class="col-sm-10">
                <input type="text" name="page_title" value="{{old('page_title')}}" id="dynamicRoute" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">Route Name :</label>
              <div class="col-sm-10">
                <input type="text" name="page_url" value="{{old('page_url')}}" id="page_url" value="" class="form-control page_url" readonly>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Page Order :</label>
              <div class="col-sm-10">
                <input type="number" name="page_sort" value="{{old('page_sort')}}" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Menu Icon Class :</label>
              <div class="col-sm-10">
                <input type="text" name="menu_icon" value="{{old('menu_icon')}}" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>

          </form>

        </div>
      </div>

    </div>


  </div>
</section>

@endsection