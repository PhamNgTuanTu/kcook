@extends('admin.master')
@section('title')
<title>Kcook - Trang chủ</title>
@endsection
@section('css')
  <link href="{{ asset('admin/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="layout-px-spacing">

    <!-- CONTENT AREA -->
    <div class="row layout-top-spacing">
        <input type="hidden" id="visitors" value="{{json_encode($visitors)}}">
        <input type="hidden" id="pageViews" value="{{json_encode($pageViews)}}">
        <input type="hidden" id="totalView" value="{{json_encode($totalView)}}">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget widget-chart-one">
                <div class="widget-heading">
                    <h5 class="">Thống kê truy cập trong 3 ngày</h5>
                    <div class="task-action">
                        <div class="dropdown">
                              <!--<a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                                <a class="dropdown-item" href="javascript:void(0);">Weekly</a>
                                <a class="dropdown-item" href="javascript:void(0);">Monthly</a>
                                <a class="dropdown-item" href="javascript:void(0);">Yearly</a>
                            </div>-->
                        </div>
                    </div>
                </div>

                <div class="widget-content">
                    <div id="revenueMonthly"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- CONTENT AREA -->

</div
@endsection
@section('page-js')
<script src="{{ asset('admin/assets/plugins/apex/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/dashboard/chart-thong-ke-truy-cap.js') }}"></script>
@endsection