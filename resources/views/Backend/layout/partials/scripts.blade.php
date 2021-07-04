<!-- latest jquery-->
<script src="{{ asset('backend/assets/')}}/js/jquery-3.5.1.min.js"></script>
<!-- Bootstrap js-->
<script src="{{ asset('backend/assets/')}}/js/bootstrap/popper.min.js"></script>
<script src="{{ asset('backend/assets/')}}/js/bootstrap/bootstrap.js"></script>
<!-- feather icon js-->
<script src="{{ asset('backend/assets/')}}/js/icons/feather-icon/feather.min.js"></script>
<script src="{{ asset('backend/assets/')}}/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('backend/assets/')}}/js/sidebar-menu.js"></script>
<script src="{{ asset('backend/assets/')}}/js/config.js"></script>
<!-- Plugins JS start-->
<script src="{{ asset('backend/assets/')}}/js/typeahead/handlebars.js"></script>
<script src="{{ asset('backend/assets/')}}/js/typeahead/typeahead.bundle.js"></script>
<script src="{{ asset('backend/assets/')}}/js/typeahead/typeahead.custom.js"></script>
<script src="{{ asset('backend/assets/')}}/js/typeahead-search/handlebars.js"></script>
<script src="{{ asset('backend/assets/')}}/js/typeahead-search/typeahead-custom.js"></script>
<script src="{{ asset('backend/assets/')}}/js/chart/chartist/chartist.js"></script>
<script src="{{ asset('backend/assets/')}}/js/chart/chartist/chartist-plugin-tooltip.js"></script>
<script src="{{ asset('backend/assets/')}}/js/chart/apex-chart/apex-chart.js"></script>
<script src="{{ asset('backend/assets/')}}/js/chart/apex-chart/stock-prices.js"></script>
<script src="{{ asset('backend/assets/')}}/js/prism/prism.min.js"></script>
<script src="{{ asset('backend/assets/')}}/js/clipboard/clipboard.min.js"></script>
<script src="{{ asset('backend/assets/')}}/js/counter/jquery.waypoints.min.js"></script>
<script src="{{ asset('backend/assets/')}}/js/counter/jquery.counterup.min.js"></script>
<script src="{{ asset('backend/assets/')}}/js/counter/counter-custom.js"></script>
<script src="{{ asset('backend/assets/')}}/js/custom-card/custom-card.js"></script>
<script src="{{ asset('backend/assets/')}}/js/notify/bootstrap-notify.min.js"></script>
<script src="{{ asset('backend/assets/')}}/js/dashboard/default.js"></script>
<script src="{{ asset('backend/assets/')}}/js/notify/index.js"></script>
<script src="{{ asset('backend/assets/')}}/js/datepicker/date-picker/datepicker.js"></script>
<script src="{{ asset('backend/assets/')}}/js/datepicker/date-picker/datepicker.en.js"></script>
<script src="{{ asset('backend/assets/')}}/js/datepicker/date-picker/datepicker.custom.js"></script>
<script src="{{ asset('backend/assets/')}}/js/chat-menu.js"></script>
<!-- Plugins JS Ends-->
<!-- Plugins JS start-->
<script src="{{ asset('backend/assets/')}}/js/notify/bootstrap-notify.min.js"></script>
<script src="{{ asset('backend/assets/')}}/js/notify/notify-script.js"></script>
<script src="{{ asset('backend/assets/')}}/js/chat-menu.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('backend/assets/')}}/js/script.js"></script>
<script src="{{ asset('backend/assets/')}}/js/theme-customizer/customizer.js"></script>
<!-- login js-->
<!-- Plugin used-->

<!--Notification-->
    @if(Session::has('success'))
    <script>
        $.notify({
            message:'{{ Session::get("success") }}'
        },
        {
            type:'primary',
            allow_dismiss:false,
            newest_on_top:false ,
            mouse_over:false,
            showProgressbar:false,
            spacing:10,
            timer:2000,
            placement:{
                from:'top',
                align:'right'
            },
            offset:{
                x:30,
                y:30
            },
            delay:1000 ,
            z_index:10000,
            animate:{
                enter:'animated bounce',
                exit:'animated bounce'
            }
        });
    </script>
    @endif

    @if(Session::has('error'))
    <script>
        $.notify({
            message:'{{ Session::get("error") }}'
        },
        {
            type:'primary',
            allow_dismiss:false,
            newest_on_top:false ,
            mouse_over:false,
            showProgressbar:true,
            spacing:10,
            timer:2000,
            placement:{
                from:'top',
                align:'right'
            },
            offset:{
                x:30,
                y:30
            },
            delay:1000 ,
            z_index:10000,
            animate:{
                enter:'animated bounce',
                exit:'animated bounce'
            }
        });
    </script>
    @endif
<!--!Notification-->
