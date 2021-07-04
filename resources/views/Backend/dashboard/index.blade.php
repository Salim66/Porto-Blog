@extends('Backend.layout.app')

@section('main-content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
        <div class="row">
            <div class="col-lg-6 main-header">
            <h2>Default<span>Dashboard </span></h2>
            <h6 class="mb-0">admin panel</h6>
            </div>
            <div class="col-lg-6 breadcrumb-right">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Default  </li>
            </ol>
            </div>
        </div>
        </div>
    </div>



@include('Backend.layout.right-sidebar')

  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 xl-100">
        <div class="row">
          <div class="col-xl-3 xl-50 col-md-6 box-col-6">
            <div class="card gradient-primary o-hidden">
              <div class="card-body tag-card">
                <div class="default-chart">
                  <div class="apex-widgets">
                    <div id="area-widget-chart"></div>
                  </div>
                  <div class="widgets-bottom">
                    <h5 class="f-w-700 mb-0">Total Sale<span class="pull-right">70 / 100   </span></h5>
                  </div>
                </div><span class="tag-hover-effect"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small"></span></span></span>
              </div>
            </div>
          </div>
          <div class="col-xl-3 xl-50 col-md-6 box-col-6">
            <div class="card gradient-secondary o-hidden">
              <div class="card-body tag-card">
                <div class="default-chart">
                  <div class="apex-widgets">
                    <div id="area-widget-chart-2"></div>
                  </div>
                  <div class="widgets-bottom">
                    <h5 class="f-w-700 mb-0">Total Visits<span class="pull-right">70 / 100   </span></h5>
                  </div>
                </div><span class="tag-hover-effect"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small"></span></span></span>
              </div>
            </div>
          </div>
          <div class="col-xl-3 xl-50 col-md-6 box-col-6">
            <div class="card gradient-warning o-hidden">
              <div class="card-body tag-card">
                <div class="default-chart">
                  <div class="apex-widgets">
                    <div id="area-widget-chart-3"></div>
                  </div>
                  <div class="widgets-bottom">
                    <h5 class="f-w-700 mb-0">Total Stock<span class="pull-right">70 / 100   </span></h5>
                  </div>
                </div><span class="tag-hover-effect"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">     </span></span></span>
              </div>
            </div>
          </div>
          <div class="col-xl-3 xl-50 col-md-6 box-col-6">
            <div class="card gradient-info o-hidden">
              <div class="card-body tag-card">
                <div class="default-chart">
                  <div class="apex-widgets">
                    <div id="area-widget-chart-4"></div>
                  </div>
                  <div class="widgets-bottom">
                    <h5 class="f-w-700 mb-0">Total Value<span class="pull-right">70 / 100   </span></h5>
                  </div>
                </div><span class="tag-hover-effect"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">     </span></span></span>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-xl-8 xl-100 box-col-12">
        <div class="card">
          <div class="card-header no-border">
            <h5>Recent Buyers</h5>
            <ul class="creative-dots">
              <li class="bg-primary big-dot"></li>
              <li class="bg-secondary semi-big-dot"></li>
              <li class="bg-warning medium-dot"></li>
              <li class="bg-info semi-medium-dot"></li>
              <li class="bg-secondary semi-small-dot"></li>
              <li class="bg-primary small-dot"></li>
            </ul>
            <div class="card-header-right">
              <ul class="list-unstyled card-option">
                <li><i class="icofont icofont-gear fa fa-spin font-primary"></i></li>
                <li><i class="view-html fa fa-code font-primary"></i></li>
                <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                <li><i class="icofont icofont-error close-card font-primary"></i></li>
              </ul>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="activity-table table-responsive recent-table">
              <table class="table table-bordernone">
                <tbody>
                  <tr>
                    <td>
                      <div class="recent-images"><img class="img-fluid" src="{{ asset('backend/assets/')}}/images/dashboard/recent-user-1.png" alt=""></div>
                    </td>
                    <td>
                      <h5 class="default-text mb-0 f-w-700 f-18">Nick Stone</h5>
                    </td>
                    <td><span class="badge badge-pill recent-badge f-12">New York</span></td>
                    <td class="f-w-700">458-4594-5451</td>
                    <td>
                      <h6 class="mb-0">15 Jan</h6>
                    </td>
                    <td><span class="badge badge-pill recent-badge"><i data-feather="more-horizontal"></i></span></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="recent-images-primary"><img class="img-fluid" src="{{ asset('backend/assets/')}}/images/dashboard/recent-user-2.png" alt=""></div>
                    </td>
                    <td>
                      <h5 class="font-primary mb-0 f-w-700 f-18">Milano Esco</h5>
                    </td>
                    <td><span class="badge badge-pill recent-badge f-12">Brazil</span></td>
                    <td class="f-w-700">812-4896-9812</td>
                    <td>
                      <h6 class="mb-0">06 Feb</h6>
                    </td>
                    <td><span class="badge badge-pill recent-badge"><i data-feather="more-horizontal"></i></span></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="recent-images-secondary"><img class="img-fluid" src="{{ asset('backend/assets/')}}/images/dashboard/recent-user-3.png" alt=""></div>
                    </td>
                    <td>
                      <h5 class="font-secondary mb-0 f-w-700 f-18">Charlie Pol</h5>
                    </td>
                    <td><span class="badge badge-pill recent-badge f-12">London</span></td>
                    <td class="f-w-700">215-0324-6541</td>
                    <td>
                      <h6 class="mb-0">22 Feb</h6>
                    </td>
                    <td><span class="badge badge-pill recent-badge"><i data-feather="more-horizontal"></i></span></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="recent-images-warning"><img class="img-fluid" src="{{ asset('backend/assets/')}}/images/dashboard/recent-user-4.png" alt=""></div>
                    </td>
                    <td>
                      <h5 class="font-warning mb-0 f-w-700 f-18">Jordi Esol</h5>
                    </td>
                    <td><span class="badge badge-pill recent-badge f-12">U.S.A</span></td>
                    <td class="f-w-700">748-0012-3487</td>
                    <td>
                      <h6 class="mb-0">18 Mar</h6>
                    </td>
                    <td><span class="badge badge-pill recent-badge"><i data-feather="more-horizontal"></i></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="code-box-copy">
              <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head21" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
              <pre><code class="language-html" id="example-head21"></code></pre>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 xl-100 box-col-12">
        <div class="card gradient-primary o-hidden">
          <div class="card-body">
            <div class="setting-dot">
              <div class="setting-bg-primary date-picker-setting position-set pull-right"><i class="fa fa-spin fa-cog"></i></div>
            </div>
            <div class="default-datepicker">
              <div class="datepicker-here" data-language="en"></div>
            </div><span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">   </span></span></span>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
