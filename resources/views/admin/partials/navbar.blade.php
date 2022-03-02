 <!--  BEGIN NAVBAR  -->
 <div class="header-container fixed-top">
     <header class="header navbar navbar-expand-sm">
         @php
             $cau_hinh = App\Models\CauHinh::first();
         @endphp
         <ul class="navbar-nav theme-brand flex-row  text-center">
             <li class="nav-item theme-text">
                 <a href="index.html" class="nav-link">KCook.CMS</a>
             </li>
             <li class="nav-item toggle-sidebar">
                 <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-list">
                         <line x1="8" y1="6" x2="21" y2="6"></line>
                         <line x1="8" y1="12" x2="21" y2="12"></line>
                         <line x1="8" y1="18" x2="21" y2="18"></line>
                         <line x1="3" y1="6" x2="3" y2="6"></line>
                         <line x1="3" y1="12" x2="3" y2="12"></line>
                         <line x1="3" y1="18" x2="3" y2="18"></line>
                     </svg></a>
             </li>
         </ul>

         <ul class="navbar-item flex-row navbar-dropdown ml-auto">

             <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                 <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-user">
                         <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                         <circle cx="12" cy="7" r="4"></circle>
                     </svg>
                 </a>
                 <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                     <div class="user-profile-section">
                         <div class="media mx-auto">
                             <img src="{{ isset($cau_hinh->logo) ? $cau_hinh->logo : asset('admin/assets/img/90x90.jpg') }}"
                                 class="img-fluid mr-2" alt="avatar">
                             <div class="media-body">
                                 <h5>{{ Auth::guard('admin')->user()->ten_dang_nhap }}</h5>
                             </div>
                         </div>
                     </div>
                     <div class="dropdown-item">
                         <a href="{{ route('admin.getLogout') }}">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-log-out">
                                 <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                 <polyline points="16 17 21 12 16 7"></polyline>
                                 <line x1="21" y1="12" x2="9" y2="12"></line>
                             </svg> <span>Log Out</span>
                         </a>
                     </div>
                 </div>
             </li>
         </ul>
     </header>
 </div>
 <!--  END NAVBAR  -->
