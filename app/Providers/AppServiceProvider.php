<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Carbon\Carbon;
use View;
use Analytics;
use Spatie\Analytics\Period;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        Paginator::useBootstrap();
        if(Schema::hasTable('loai_san_pham')) {
            $listDanhMucCha = LoaiSanPham::where('parent_id', null)->get();
            if (!empty($listDanhMucCha)) {
                View::share('listDanhMucCha', $listDanhMucCha);
            }
        };

        //Start: ____Thống kê truy cập___sd:Google Analytics
        $startDate   = Carbon::now('Asia/Ho_Chi_Minh');
        $yesterday   = Carbon::yesterday('Asia/Ho_Chi_Minh');
        $thangTruoc  = Carbon::tomorrow('Asia/Ho_Chi_Minh')->subDays(31);
        $ids = 'ga:'.config('analytics')['view_id'];
        $gaRealTime = Analytics::getAnalyticsService()->data_realtime->get($ids,
        'rt:activeUsers');
        $homNay = Analytics::performQuery(
           Period::create($startDate, $startDate),
              'ga:pageviews'
        );
        $homQua = Analytics::performQuery(
           Period::create($yesterday, $yesterday),
              'ga:pageviews'
        );
        $trongThang = Analytics::performQuery(
           Period::create($thangTruoc, $startDate),
              'ga:pageviews'
        );
        $viewsHomQua = $homQua['totalsForAllResults']['ga:pageviews'];
        $viewsHomNay = $homNay['totalsForAllResults']['ga:pageviews'];
        $viewsThang  = $trongThang['totalsForAllResults']['ga:pageviews'];
        $activeUsers = (int)$gaRealTime['totalsForAllResults']['rt:activeUsers'];

        View::share(['viewsHomQua' => $viewsHomQua, 'viewsHomNay' => $viewsHomNay, 'viewsThang' => $viewsThang, 'activeUsers' => $activeUsers ]);
        //End __Thống kê truy cập
        Schema::defaultStringLength(191);

        if(Schema::hasTable('san_pham')) {
            $listSanPhamBanChay = SanPham::orderBy('created_at', 'desc')->take(5)->get();
            if (!empty($listSanPhamBanChay)) {
                View::share('listSanPhamBanChay', $listSanPhamBanChay);
            }
        };
       
    }
}
