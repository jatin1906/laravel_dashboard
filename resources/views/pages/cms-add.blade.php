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

            <x-input
              name="page_title"
              label="Menu Name"
              placeholder='Menu Name'
              value="{{old('page_title')}}"
              id="dynamicRoute" />

            <x-input
              name="page_url"
              label="Route Name"
              placeholder='Route Name'
              value="{{old('page_url')}}" readonly="readonly" />

            <x-input
              name="page_sort"
              type='number'
              label="Page Order"
              placeholder='Page Order'
              value="{{old('page_sort')}}" />

            <x-input
              name="menu_icon"
              label="Menu Icon Class"
              placeholder='Menu Icon Class'
              value="{{old('menu_icon')}}" />

            <x-button
              class="btn-primary"
              buttonName='Submit'
              type='submit' />

          </form>

        </div>
      </div>

    </div>


  </div>
</section>

@endsection