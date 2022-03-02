<aside id="countperday_widget-2" class="widget widget_countperday_widget">
	<div class="widget-title widget-title-sidebar ">
		<span>Thống kê truy cập</span>
	</div>
	<div class="is-divider small"></div>
	<ul class="cpd">
		<li class="cpd-l">
			<span id="cpd_number_getuserall" class="cpd-r">{{number_format($viewsThang)}}</span>Tổng truy cập trong tháng:
        </li>
        <li class="cpd-l">
			<span id="cpd_number_getusertoday" class="cpd-r">{{number_format($viewsHomQua)}}</span>Hôm qua:
        </li>
		<li class="cpd-l">
			<span id="cpd_number_getusertoday" class="cpd-r">{{number_format($viewsHomNay)}}</span>Hôm nay:
        </li>
		<!--<li class="cpd-l">
			<span id="cpd_number_getuseryesterday" class="cpd-r">1</span>Hôm qua:
        </li>-->
		<li class="cpd-l">
			<span id="cpd_number_getuseronline" class="cpd-r">@if($activeUsers > 0) {{number_format($activeUsers)}} @else 1 @endif</span>Đang online: 
        </li>
	</ul>
</aside>