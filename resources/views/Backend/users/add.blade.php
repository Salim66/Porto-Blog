@extends('Backend.layout.app')

@section('main-content')
<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-header">
                <h5>Users Add</h5>
            </div>
            <div class="card-body">
                <form class="needs-validation" id="uase_Add" novalidate="">
                  <div class="form-row">

                    <div class="col-md-6 mb-3">
                      <label for="validationCustom01">Full name</label>
                      <input
                        class="form-control f_name"
                        id="validationCustom01"
                        type="text"
                        name="name"
                        placeholder="First name"
                        required=""
                      />
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="validationCustom02">Email</label>
                      <input
                        class="form-control f_email"
                        id="validationCustom02"
                        type="email"
                        name="email"
                        placeholder="Last name"
                        required=""
                      />
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">User Type</label>
                        <select name="user_type" class="form-control user_type" id="validationCustom01">
                            <option selected>Select Type</option>
                            <option value="Admin">Admin</option>
                            <option value="Modaretor">Modaretor</option>
                            <option value="User">User</option>
                        </select>
                       </div>
                    <div class="col-md-4 mb-3">
                      <label for="validationCustom02">Password</label>
                      <input
                        class="form-control f_password"
                        id="validationCustom02"
                        type="text"
                        name="password"
                        placeholder="Last name"
                        required=""
                      />
                    </div>
                    <div class="col-md-4 mb-3">
                      <label for="validationCustom02">Confirm Password</label>
                      <input
                        class="form-control f_con_password"
                        id="validationCustom02"
                        type="text"
                        name="password_confirmation"
                        placeholder="Last name"
                        required=""
                      />
                    </div>
                  <button class="btn btn-primary" type="submit">
                    Add user
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
