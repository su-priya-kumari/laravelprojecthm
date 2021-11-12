<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->
        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta name="description" content="@yield('meta_description', config('app.name'))">
        <meta name="author" content="@yield('meta_author', config('app.name'))">
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('admin_assets/vendor/morrisjs/morris.min.css') }}" />
                
        @if (Request::segment(2) === 'analytical' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/chartist/css/chartist.min.css') }}">
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/toastr/toastr.min.css') }}">
        @endif
                
        @if (Request::segment(2) === 'iot' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/morrisjs/morris.css') }}">
        @endif

        @if (Request::segment(2) === 'project' or Request::segment(2) === 'nestable' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/nestable/jquery-nestable.css') }}"/>
        @endif

        @if (Request::segment(2) === 'project' or Request::segment(2) === 'ecommerce' or Request::segment(2) === 'typography' or Request::segment(2) === 'progress-bars' or Request::segment(2) === 'data' or Request::segment(1) === 'file-manager' && Request::segment(2) === 'dashboard' or Request::segment(2) === 'teams-board' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
        @endif

        @if (Request::segment(2) === 'bitcoin' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/chartist/css/chartist.min.css') }}">
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css') }}">
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
        @endif

		@if (Request::segment(2) === 'inbox' )
			<link rel="stylesheet" href="{{ asset('admin_assets/css/inbox.css') }}"/>
        @endif
		
		@if (Request::segment(2) === 'chat' )
			<link rel="stylesheet" href="{{ asset('admin_assets/css/chatapp.css') }}"/>
        @endif
		
		@if (Request::segment(2) === 'calendar' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/fullcalendar/fullcalendar.min.css') }}"/>
        @endif

        @if (Request::segment(2) === 'contact-list' or Request::segment(2) === 'contact-card' or Request::segment(2) === 'inbox' or Request::segment(2) === 'taskboard' or Request::segment(2) === 'dialogs' )
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/sweetalert/sweetalert.css') }}"/>
        @endif

        @if (Request::segment(2) === 'taskboard' )
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/nestable/jquery-nestable.css') }}"/>
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"/>
        @endif

        @if (Request::segment(1) === 'file-manager' && Request::segment(2) === 'dashboard' )
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/morrisjs/morris.css') }}"/>
        @endif

        @if (Request::segment(1) === 'blog' && Request::segment(2) === 'dashboard' )
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/>
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/morrisjs/morris.css') }}"/>
        @endif

        @if (Request::segment(2) === 'new-post' )
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/summernote/dist/summernote.css') }}"/>
        @endif

        @if (Request::segment(2) === 'notifications' )
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/toastr/toastr.min.css') }}"/>
        @endif

        @if (Request::segment(2) === 'range-sliders' )
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/rangeslider/css/ion.rangeSlider.css') }}"/>
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/rangeslider/css/ion.rangeSlider.skinFlat.css') }}"/>
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/material-rangeslider/style.css') }}"/>
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/roundslider/roundslider.min.css') }}"/>
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/roundslider/style.css') }}"/>
        @endif

        @if (Request::segment(2) === 'treeview' )
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/toastr/toastr.min.css') }}"/>
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-treeview/bootstrap-treeview.min.css') }}"/>
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/jstree/themes/default/style.min.css') }}"/>
        @endif

        @if (Request::segment(2) === 'chart' )
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/>
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/morrisjs/morris.min.css') }}"/>
			<link rel="stylesheet" href="{{ asset('admin_assets/vendor/chartist/css/chartist.min.css') }}"/>
        @endif

        @if (Request::segment(2) === 'profile1' or Request::segment(2) === 'profile2' or Request::segment(2) === 'image-gallery1' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"/>
        @endif
        
        @if (Request::segment(2) === 'image-gallery2' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/light-gallery/css/lightgallery.css') }}"/>
        @endif
        
        @if (Request::segment(2) === 'horizontal-timeline' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/horizontal-timeline/css/horizontal-timeline.css') }}"/>
        @endif
        
        @if (Request::segment(2) === 'validation' or Request::segment(2) === 'advance-elements' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}"/>
        @endif
        
        @if (Request::segment(2) === 'advance-elements' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" />
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" />
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/multi-select/css/multi-select.css')}}" />
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" />
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/nouislider/nouislider.min.css')}}" />
        @endif
        
        @if (Request::segment(2) === 'dragdrop' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/dropify/css/dropify.min.css') }}"/>
        @endif
        
        @if (Request::segment(2) === 'cropping' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/cropper/cropper.min.css') }}"/>
        @endif
        
        @if (Request::segment(2) === 'summernote' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/summernote/dist/summernote.css') }}"/>
        @endif
        
        @if (Request::segment(2) === 'markdown' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-markdown/bootstrap-markdown.min.css') }}"/>
        @endif
        
        @if (Request::segment(2) === 'jquery-datatable' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}"/>
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}"/>
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}"/>
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/sweetalert/sweetalert.css') }}"/>
        @endif
        
        @if (Request::segment(2) === 'dragger' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/table-dragger/table-dragger.min.css') }}"/>
        @endif
        
        @if (Request::segment(2) === 'morris' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/morrisjs/morris.css') }}"/>
        @endif
        
        @if (Request::segment(2) === 'chartjs' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/chartist/css/chartist.min.css') }}"/>
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}"/>
        @endif
        
        @if (Request::segment(2) === 'c3' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/charts-c3/plugin.css') }}"/>
        @endif
        
        @if (Request::segment(2) === 'jvector' )
            <link rel="stylesheet" href="{{ asset('admin_assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css') }}"/>
        @endif

        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ asset('admin_assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/css/color_skins.css') }}">

        @if (Request::segment(2) === 'list' or Request::segment(2) === 'detail' or Request::segment(2) === 'blog' or Request::segment(2) === 'profile2' )
			<link rel="stylesheet" href="{{ asset('admin_assets/css/blog.css') }}"/>
        @endif

        @if (Request::segment(2) === 'ecommerce' )
			<link rel="stylesheet" href="{{ asset('admin_assets/css/ecommerce.css') }}"/>
        @endif

        @stack('after-styles')

        @if (trim($__env->yieldContent('page-styles')))
            @yield('page-styles')
        @endif

    </head>
    
    <?php 
        $setting = !empty($_GET['theme']) ? $_GET['theme'] : '';
        $theme = "theme-cyan";
        $menu = "";
        if ($setting == 'p') {
            $theme = "theme-purple";
        } else if ($setting == 'b') {
            $theme = "theme-blue";
        } else if ($setting == 'g') {
            $theme = "theme-green";
        } else if ($setting == 'o') {
            $theme = "theme-orange";
        } else if ($setting == 'bl') {
            $theme = "theme-blush";
        } else {
             $theme = "theme-cyan";
        }

    ?>

    <body class="">

        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="{{url('/')}}/admin_assets/img/logo-icon.svg" width="48" height="48" alt="Lucid"></div>
                <p>Please wait...</p>        
            </div>
        </div>

        <div id="wrapper">

            @include('layout.navbar')
            @include('layout.sidebar')

            <div id="main-content">
                <div class="container-fluid">
                    <div class="block-header">
                        <div class="row">
                            <div class="col-lg-5 col-md-8 col-sm-12">                        
                                <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> @yield('title')</h2>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard.analytical')}}"><i class="icon-home"></i></a></li>
                                    @if (trim($__env->yieldContent('parentPageTitle')))
                                       <li class="breadcrumb-item">@yield('parentPageTitle')</li>
                                    @endif
                                    @if (trim($__env->yieldContent('title')))
                                        <li class="breadcrumb-item active">@yield('title')</li>
                                    @endif
                                </ul>
                            </div>            
                            <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                                <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                                    <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#00c5dc"
                                        data-fill-Color="transparent">3,5,1,6,5,4,8,3</div>
                                    <span>Visitors</span>
                                </div>
                                <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                                    <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#f4516c"
                                        data-fill-Color="transparent">4,6,3,2,5,6,5,4</div>
                                    <span>Visits</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @yield('content')

                </div>
            </div>

        </div>

        <!-- Scripts -->
        @stack('before-scripts')

        <script src="{{ asset('admin_assets/bundles/libscripts.bundle.js') }}"></script>    
        <script src="{{ asset('admin_assets/bundles/vendorscripts.bundle.js') }}"></script>
        
        <script src="{{ asset('admin_assets/bundles/morrisscripts.bundle.js') }}"></script><!-- Morris Plugin Js -->
        <script src="{{ asset('admin_assets/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
        <script src="{{ asset('admin_assets/bundles/knob.bundle.js') }}"></script>
        
        @if (Request::segment(2) === 'analytical' )
            <script src="{{ asset('admin_assets/bundles/chartist.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/toastr/toastr.js') }}"></script>
            <script src="{{ asset('admin_assets/js/index.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'iot' )
            <script src="{{ asset('admin_assets/bundles/morrisscripts.bundle.js')}}"></script>
            <script src="{{ asset('admin_assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js')}}"></script>
            <script src="{{ asset('admin_assets/vendor/raphael/raphael-min.js')}}"></script>
            <script src="{{ asset('admin_assets/js/iot.js')}}"></script>
        @endif

        @if (Request::segment(2) === 'bitcoin' )
            <script src="{{ asset('admin_assets/bundles/jvectormap.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/bundles/chartist.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/bundles/datatablescripts.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/tables/jquery-datatable.js') }}"></script>
            <script src="{{ asset('admin_assets/js/index7.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'demographic' )
            <script src="{{ asset('admin_assets/js/widgets/infobox/infobox-1.js') }}"></script>
            <script src="{{ asset('admin_assets/js/index2.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'hospital' )
            <script src="{{ asset('admin_assets/js/index3.js') }}"></script>
        @endif
        
        @if (Request::segment(2) === 'university' )
            <script src="{{ asset('admin_assets/js/index4.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'real-estate' )
            <script src="{{ asset('admin_assets/js/index5.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'ecommerce' )
            <script src="{{ asset('admin_assets/js/index8.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'project' )
            <script src="{{ asset('admin_assets/vendor/nestable/jquery.nestable.js') }}"></script> <!-- Jquery Nestable -->
            <script src="{{ asset('admin_assets/js/pages/ui/sortable-nestable.js') }}"></script>
            <script src="{{ asset('admin_assets/js/index6.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'inbox' or Request::segment(2) === 'contact-list' or Request::segment(2) === 'taskboard' or Request::segment(2) === 'dialogs' )
            <script src="{{ asset('admin_assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
			<script src="{{ asset('admin_assets/js/pages/ui/dialogs.js') }}"></script>
        @endif
        
        @if (Request::segment(2) === 'calendar' )
            <script src="{{ asset('admin_assets/bundles/fullcalendarscripts.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/fullcalendar/fullcalendar.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/calendar.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'contact-card' )
            <script src="{{ asset('admin_assets/bundles/easypiechart.bundle.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'taskboard' )
			<script src="{{ asset('admin_assets/vendor/nestable/jquery.nestable.js') }}"></script>
			<script src="{{ asset('admin_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
			<script src="{{ asset('admin_assets/js/pages/ui/sortable-nestable.js') }}"></script>
        @endif

        @if (Request::segment(1) === 'file-manager' && Request::segment(2) === 'dashboard' )
			<script src="{{ asset('admin_assets/js/pages/file/filemanager.js') }}"></script>
        @endif

        @if (Request::segment(1) === 'blog' && Request::segment(2) === 'dashboard' )
			<script src="{{ asset('admin_assets/js/pages/blog.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'new-post' )
			<script src="{{ asset('admin_assets/vendor/summernote/dist/summernote.js') }}"></script>
        @endif
        
        @if (Request::segment(2) === 'notifications' )
			<script src="{{ asset('admin_assets/vendor/toastr/toastr.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'nestable' )
            <script src="{{ asset('admin_assets/vendor/nestable/jquery.nestable.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/ui/sortable-nestable.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'range-sliders' )
            <script src="{{ asset('admin_assets/vendor/rangeslider/js/ion.rangeSlider.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/roundslider/roundslider.min.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/range-sliders.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/material-rangeslider/mrange.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/roundslider/custom.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'treeview' )
            <script src="{{ asset('admin_assets/vendor/bootstrap-treeview/bootstrap-treeview.min.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/jstree/jstree.min.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/toastr/toastr.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/treeview/jstree.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/treeview/bootstrap-treeview.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'statistics' )
            <script src="{{ asset('admin_assets/js/widgets/infobox/infobox-1.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'chart' )
            <script src="{{ asset('admin_assets/bundles/chartist.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/bundles/jvectormap.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/bundles/flotscripts.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/flot-charts/jquery.flot.selection.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/charts/chart-widgets.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'profile1' or Request::segment(2) === 'profile2' or Request::segment(2) === 'image-gallery1' )
            <script src="{{ asset('admin_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        @endif
        
        @if (Request::segment(2) === 'image-gallery1' )
            <script src="{{ asset('admin_assets/vendor/LightboxGallery/mauGallery.min.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/LightboxGallery/scripts.js') }}"></script>
        @endif
        
        @if (Request::segment(2) === 'image-gallery2' )
            <script src="{{ asset('admin_assets/vendor/light-gallery/js/lightgallery-all.min.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/medias/image-gallery.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'horizontal-timeline' )
            <script src="{{ asset('admin_assets/vendor/horizontal-timeline/js/horizontal-timeline.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'validation' )
            <script src="{{ asset('admin_assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'advance-elements' )
            <script src="{{ asset('admin_assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/nouislider/nouislider.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/forms/advanced-form-elements.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'wizard' )
            <script src="{{ asset('admin_assets/vendor/jquery-validation/jquery.validate.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/jquery-steps/jquery.steps.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/forms/form-wizard.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'dragdrop' )
            <script src="{{ asset('admin_assets/vendor/dropify/js/dropify.min.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/forms/dropify.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'cropping' )
            <script src="{{ asset('admin_assets/vendor/cropper/cropper.min.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/cropper/cropper-init.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'summernote' )
            <script src="{{ asset('admin_assets/vendor/summernote/dist/summernote.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'editors' )
            <script src="{{ asset('admin_assets/vendor/ckeditor/ckeditor.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/forms/editors.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'markdown' )
            <script src="{{ asset('admin_assets/vendor/markdown/markdown.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/to-markdown/to-markdown.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/bootstrap-markdown/bootstrap-markdown.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'jquery-datatable' )
            <script src="{{ asset('admin_assets/bundles/datatablescripts.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/tables/jquery-datatable.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'editable' )
            <script src="{{ asset('admin_assets/vendor/editable-table/mindmup-editabletable.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/tables/editable-table.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'dragger' )
            <script src="{{ asset('admin_assets/vendor/table-dragger/table-dragger.min.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'morris' )
            <script src="{{ asset('admin_assets/js/pages/charts/morris.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'flot' )
            <script src="{{ asset('admin_assets/bundles/flotscripts.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/flot-charts/jquery.flot.time.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/flot-charts/jquery.flot.selection.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/charts/flot.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'chartjs' )
            <script src="{{ asset('admin_assets/bundles/chartist.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/chartist/polar_area_chart.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/charts/chartjs.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'jquery-knob' )
            <script src="{{ asset('admin_assets/vendor/jquery-knob/jquery.knob.min.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/charts/jquery-knob.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'sparkline' )
            <script src="{{ asset('admin_assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/charts/sparkline.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'peity' )
            <script src="{{ asset('admin_assets/vendor/jquery-sparkline/js/jquery.sparkline.min.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/charts/peity_chart.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'c3' )
            <script src="{{ asset('admin_assets/bundles/c3.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/chart/c3.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'gauges' )
            <script src="{{ asset('admin_assets/vendor/gauge/gauge.min.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/chart/gauge.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'echart' )
            <script src="{{ asset('admin_assets/bundles/echarts.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/charts/echart.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'google' )
            <script src="https://maps.google.com/maps/api/js?v=3&sensor=false"></script>
            <script src="{{ asset('admin_assets/vendor/gmaps/gmaps.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/maps/google.js') }}"></script>
        @endif

        @if (Request::segment(2) === 'jvector' )
            <script src="{{ asset('admin_assets/bundles/jvectormap.bundle.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/jvectormap/jquery-jvectormap-in-mill.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/jvectormap/jquery-jvectormap-uk-mill-en.js') }}"></script>
            <script src="{{ asset('admin_assets/vendor/jvectormap/jquery-jvectormap-au-mill.js') }}"></script>
            <script src="{{ asset('admin_assets/js/pages/maps/jvectormap.js') }}"></script>
        @endif

        <script src="{{ asset('admin_assets/bundles/mainscripts.bundle.js') }}"></script>

        @stack('after-scripts')

        @if (trim($__env->yieldContent('page-script')))
            <script>
                @yield('page-script')
            </script>
		@endif
    </body>
</html>
