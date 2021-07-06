@extends('Backend.layout.app')

@section('main-content')
<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-header">
                <h5>Category Add</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" id="category_Add" novalidate="">
                  <div class="form-row">

                    <div class="col-md-6 mb-3">
                      <label for="validationCustom01">Category Name</label>
                      <input
                        class="form-control c_name"
                        id="validationCustom01"
                        type="text"
                        name="name"
                        placeholder="Category name"
                        required=""
                      />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">Parent Category</label>
                        <select name="parent_id" class="form-control parent_id" id="validationCustom01">
                            <option value="0">Select Category</option>
                            @foreach($all_data as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">
                        Add category
                    </button>
                  </div>
                </form>
              </div>
            </div>
        </div>
        <!-- DOM / jQuery  Ends-->
        </div>
    </div>
</div>
  <!-- Container-fluid Ends-->
  <br>
  <br>

@endsection
