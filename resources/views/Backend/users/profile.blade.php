@extends('Backend.layout.app')

@section('main-content')
<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <!-- user profile first-style start-->
            <div class="col-sm-12" style="margin-top: 100px;" id="user_profile_load_by_ajax">


    {{--            <div class="card hovercard text-center">--}}
    {{--              <div class="cardheader"></div>--}}
    {{--              <div class="user-image">--}}
    {{--                <div class="avatar"><img style="width: 120px; height: 120px; border-radius: 50%; border: 2px solid #9900ff;" class="shadow" src="{{ URL::to('') }}/uploads/users/{{ $data->photo }}" alt="User Image" onerror="this.src='{{ asset("/uploads/users/avatar3.png") }}'"></div>--}}
    {{--                <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>--}}
    {{--              </div>--}}
    {{--              <div class="info">--}}
    {{--                <div class="row">--}}
    {{--                  <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">--}}
    {{--                    <div class="row">--}}
    {{--                      <div class="col-md-6">--}}
    {{--                        <div class="ttl-info text-left ml-5">--}}
    {{--                          <h6><i class="fa fa-envelope"></i>   Email</h6><span>{{ $data->email }}</span>--}}
    {{--                        </div>--}}
    {{--                      </div>--}}
    {{--                      <div class="col-md-6">--}}
    {{--                        <div class="ttl-info text-left ml-4">--}}
    {{--                          <h6><i class="fa fa-calendar"></i>   Created</h6><span>{{ date('d M, Y', strtotime($data->created_at)) }}</span>--}}
    {{--                        </div>--}}
    {{--                      </div>--}}
    {{--                    </div>--}}
    {{--                  </div>--}}
    {{--                  <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">--}}
    {{--                    <div class="user-designation">--}}
    {{--                      <div class="title"><a target="_blank" href="#">{{ $data->name }}</a></div>--}}
    {{--                      <div class="desc mt-2">{{ $data->user_type }}</div>--}}
    {{--                    </div>--}}
    {{--                  </div>--}}
    {{--                  <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">--}}
    {{--                    <div class="row">--}}
    {{--                      <div class="col-md-6">--}}
    {{--                        <div class="ttl-info text-left">--}}
    {{--                          <h6><i class="fa fa-phone"></i>   Contact Us</h6><span>Bangladesh +88{{ $data->cell }}</span>--}}
    {{--                        </div>--}}
    {{--                      </div>--}}
    {{--                      <div class="col-md-6">--}}
    {{--                        <div class="ttl-info text-left">--}}
    {{--                          <h6><i class="fa fa-location-arrow"></i>   Location</h6><span>{{ $data->address }}</span>--}}
    {{--                        </div>--}}
    {{--                      </div>--}}
    {{--                    </div>--}}
    {{--                  </div>--}}
    {{--                </div>--}}
    {{--                <div>--}}
    {{--                    <a title="Edit Profile" edit_id="{{ $data->id }}" class="btn btn-info-gradien btn-pill edit_profile"><i class="fas fa-user-edit text-white"></i></a>--}}
    {{--                </div>--}}
    {{--                <hr>--}}
    {{--                <div class="social-media">--}}
    {{--                  <ul class="list-inline">--}}
    {{--                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
    {{--                    <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
    {{--                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
    {{--                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>--}}
    {{--                    <li class="list-inline-item"><a href="#"><i class="fa fa-rss"></i></a></li>--}}
    {{--                  </ul>--}}
    {{--                </div>--}}
    {{--                <div class="follow">--}}
    {{--                  <div class="row">--}}
    {{--                    <div class="col-6 text-md-right border-right">--}}
    {{--                      <div class="follow-num counter">25869</div><span>Follower</span>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-6 text-md-left">--}}
    {{--                      <div class="follow-num counter">659887</div><span>Following</span>--}}
    {{--                    </div>--}}
    {{--                  </div>--}}
    {{--                </div>--}}
    {{--              </div>--}}
    {{--            </div>--}}
            </div>
            <!-- user profile first-style end-->
        </div>
    </div>
</div>
  <!-- Container-fluid Ends-->
  <br>
  <br>
 <!-- Container-fluid Ends-->
 <div id="edit_user_prifile" class="modal fade">
    <div class="modal-dialog modal-dialog-centered modal-lg zoomIn animated">
        <div class="modal-content">
            <div class="modal-title py-3">
                <h5 class="d-inline float-left ml-3">Edit Profile</h5>
                <button class="close d-inline float-right mr-3" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" class="needs-validation" id="uase_profile_edit" novalidate="" enctype="multipart/form-data">
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom01">User Type</label>
                        <select name="user_type" class="form-control user_type" id="validationCustom01">
                            <option selected>Select Type</option>
                            <option value="Admin">Admin</option>
                            <option value="Modaretor">Modaretor</option>
                            <option value="User">User</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="validationCustom01">Full name</label>
                      <input type="hidden" name="id" class="id">
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
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom02">Cell</label>
                        <input
                          class="form-control f_cell"
                          id="validationCustom02"
                          type="text"
                          name="cell"
                          placeholder="Cell"
                          required=""
                        />
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="validationCustom02">Address</label>
                        <input
                          class="form-control f_address"
                          id="validationCustom02"
                          type="text"
                          name="address"
                          placeholder="Address"
                          required=""
                        />
                      </div>
                      <div class="col-md-12 mb-3" class=" " >
                        <label for="image_file"><i class="fa fa-file-photo-o text-success" style="font-size: 50px; margin-right: 200px;"></i></label>
                        <input type="file" name="photo" style="display: none" id="image_file" class="f_photo_val">
                        <img id="user_photo" src=""  alt="" style="width: 200px; height: auto; border: 1px solid #9900ff" class="shadow f_photo_show" onerror="this.src='uploads/users/avatar3.png'">
                      </div>


                      <button class="btn btn-primary" type="submit">
                          Update profile
                      </button>
                      <button class="close ml-auto" type="button" data-dismiss="modal">
                          &times;
                      </button>
                </form>
            </div>
            <div></div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection
