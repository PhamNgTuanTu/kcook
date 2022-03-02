<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuanTriVien;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;

class QuanTriVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.dang-nhap');
        $page = 'trang_chu';
        $startDate = Carbon::now('Asia/Ho_Chi_Minh')->subDays(2);
        $endDate   = Carbon::now('Asia/Ho_Chi_Minh');
        $ga =  Analytics::fetchTotalVisitorsAndPageViews(Period::create($startDate, $endDate));
        $visitors = $ga->pluck('visitors')->toArray();
        $pageViews = $ga->pluck('pageViews')->toArray();
        $totalView = array_sum($pageViews);
        return view('admin.trang-chu.index', compact('page', 'visitors', 'pageViews', 'totalView'));
    }

    public function getLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.trang_chu');
        } else {
            return view('admin.dang-nhap');
        }
    }

    public function postLogin(request $request)
    {
        if (Auth::guard('admin')->attempt([
            'ten_dang_nhap' => $request->ten_dang_nhap,
            'password' => $request->mat_khau
        ])) {
            return redirect('quan-tri/')->with('name', Auth::guard('admin')->user()->ten_dang_nhap);
        } else {
            return redirect()->back()->with('status_admin', 'Tên đăng nhập hoặc mật khẩu không đúng');
        }
    }

    public function getLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('getLogin');
    }

    // public function login(Request $request)
    // {
    //     if (Auth::guard('admin')->attempt(['ten_dang_nhap' => $request->ten_dang_nhap, 'password' => $request->mat_khau])) {
    //         return redirect()->route('admin.trang_chu');
    //     } else {
    //         // return redirect()->route('admin.login')->with("login", "Tên đăng nhập hoặc mật khẩu không đúng");
    //         return redirect()->back()->with("login", "Tên đăng nhập hoặc mật khẩu không đúng");
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
