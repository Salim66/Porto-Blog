@extends('Backend.layout.app')

@section('main-content')
<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-8 m-auto">
            <div class="card">
            <div class="card-header">
                <h5>Tag Add</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" id="tag_add" novalidate="">
                  <div class="form-row">

                    <div class="col-md-12 mb-3">
                      <label for="validationCustom01">Tag Name</label>
                      <input
                        class="form-control t_name"
                        id="validationCustom01"
                        type="text"
                        name="name"
                        placeholder="Tag name"
                        required=""
                      />
                    </div>
                    <button class="btn btn-primary" type="submit">
                        Add tag
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
