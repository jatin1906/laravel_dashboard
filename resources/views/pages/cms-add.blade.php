@extends('layouts.index')

@section('title','Add Cms')

@section('content')

<section class="section">
  <div class="row">
    <div class="col-lg-10">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Cms</h5>

          <!-- General Form Elements -->
          <form method="post" action="">
            @csrf
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Parent Page :</label>
              <div class="col-sm-10">
                <select id='parent_page' name="parent_page" class="form-control">
                  <option value='0'>---Please Select</option>
                  <option value="">1</option>
                  <option value="">1445</option>
                  <option value="">14</option>
                  <option value="">1</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-2 col-form-label">Menu Name :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">Route Name :</label>
              <div class="col-sm-10">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Page Order :</label>
              <div class="col-sm-10">
                <input type="number" class="form-control">
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