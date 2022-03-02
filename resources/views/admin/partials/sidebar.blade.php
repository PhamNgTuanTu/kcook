<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">
    @php
        $cau_hinh = App\Models\CauHinh::first();
    @endphp
    <nav id="sidebar">
        <div class="profile-info">
            <figure class="user-cover-image"></figure>
            <div class="user-info">
                <img src="{{ isset($cau_hinh->logo) ? $cau_hinh->logo : asset('admin/assets/img/90x90.jpg') }}"
                    alt="avatar">
                <h6>{{ Auth::guard('admin')->user()->ten_dang_nhap }}</h6>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="{{ $page == 'trang_chu' ? 'active' : '' }} menu">
                <a href="{{ route('admin.trang_chu') }}"
                    aria-expanded="{{ $page == 'trang_chu' ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span> Trang chủ</span>
                    </div>
                </a>
            </li>

            <li class="{{ $page == 'loai_san_pham' ? 'active' : '' }} menu">
                <a href="{{ route('admin.loai_san_pham') }}"
                    aria-expanded="{{ $page == 'loai_san_pham' ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-command">
                            <path
                                d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z">
                            </path>
                        </svg>
                        <span> Loại sản phẩm</span>
                    </div>
                </a>
            </li>
            <li class="{{ $page == 'san_pham' ? 'active' : '' }} menu">
                <a href="{{ route('admin.san_pham') }}"
                    aria-expanded="{{ $page == 'san_pham' ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-box">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span> Sản phẩm</span>
                    </div>
                </a>
            </li>
            <li class="{{ $page == 'bai_viet' ? 'active' : '' }} menu">
                <a href="{{ route('admin.ds_bai_viet') }}"
                    aria-expanded="{{ $page == 'bai_viet' ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-book-open">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                        </svg>
                        <span>Bài viết</span>
                    </div>
                </a>
            </li>
            <li class="{{ $page == 'hoa_don' ? 'active' : '' }} menu">
                <a href="{{ route('admin.hoa_don') }}" aria-expanded="{{ $page == 'hoa_don' ? 'true' : 'false' }}"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check-square">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        <span>Hóa đơn</span>
                    </div>
                </a>
            </li>
            <li class="{{ $page == 'cau-hinh' ? 'active' : '' }} menu">
                <a href="{{ route('admin.cau_hinh') }}"
                    aria-expanded="{{ $page == 'cau-hinh' ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-settings">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                            </path>
                        </svg>
                        <span>Cấu hình</span>
                    </div>
                </a>
            </li>
            {{-- <li class="menu">
                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-file">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg>
                        <span> Menu 3</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="submenu2" data-parent="#accordionExample">
                    <li>
                        <a href="javascript:void(0);"> Submenu 1 </a>
                    </li>
                    <li>
                        <a href="#sm2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            Submenu 2 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg> </a>
                        <ul class="collapse list-unstyled sub-submenu" id="sm2" data-parent="#submenu2">
                            <li>
                                <a href="javascript:void(0);"> Sub-Submenu 1 </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Sub-Submenu 2 </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Sub-Submenu 3 </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> --}}

            {{-- <li class="menu">
                <a href="#starter-kit" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-terminal">
                            <polyline points="4 17 10 11 4 5"></polyline>
                            <line x1="12" y1="19" x2="20" y2="19"></line>
                        </svg>
                        <span>Starter Kit</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled show" id="starter-kit"
                    data-parent="#accordionExample">
                    <li class="active">
                        <a href="starter_kit_blank_page.html"> Blank Page </a>
                    </li>
                    <li>
                        <a href="starter_kit_boxed.html"> Boxed </a>
                    </li>
                    <li>
                        <a href="starter_kit_collapsible_menu.html"> Collapsible </a>
                    </li>
                </ul>
            </li> --}}

        </ul>
    </nav>

</div>
<!--  END SIDEBAR  -->
