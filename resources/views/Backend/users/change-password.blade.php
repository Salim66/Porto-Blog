@extends('Backend.layout.app')

@section('main-content')
<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-header">
                <h5>Change your password</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" id="change_password" novalidate="">
                  <div class="form-row">

                    <div class="col-md-6 mb-3">
                      <label for="validationCustom02">Old Password</label>
                      <input
                        class="form-control old_password"
                        id="validationCustom02"
                        type="password"
                        name="old_password"
                        placeholder="Old Password"
                        required=""
                      />
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="validationCustom02">New Password</label>
                      <input
                        class="form-control new_password"
                        id="validationCustom02"
                        type="password"
                        name="new_password"
                        placeholder="New Password"
                        required=""
                      />
                    </div>
                  <button class="btn btn-primary" type="submit">
                    Chnage Password
                  </button>
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
