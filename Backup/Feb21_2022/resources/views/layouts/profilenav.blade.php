<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <H4><b>Ministry</b></H4> 
            
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            
            <li class="nav-item d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
            
            @php

              $ulevel = $LoggedUserInfo['userLevel'];
              $levelType = '';
              if ($ulevel==1 || $ulevel==9 ){
                $levelType = 'Admin';
              } else if ($ulevel==0){
                $levelType = 'Publisher';   
              }
                
            @endphp
            
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{ $LoggedUserInfo['first_name'] }}</span>
                    <span class="user-status">{{  $levelType  }}</span></div><span class="avatar">
                        <img class="round" src="{{ asset('images/avatars/user.jpg') }}" alt="avatar" height="40" width="40">
                        <span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item" href="#"><i class="me-50" data-feather="user"></i> Profile</a>
                
                <!--a class="dropdown-item" href="app-todo.html"><i class="me-50" data-feather="check-square"></i> Task</a-->
                
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                                    
                    <a class="dropdown-item" href="{{ route('auth.logout') }}"><i class="me-50" data-feather="power"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>