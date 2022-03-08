<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand"><span class="brand-logo">
                         
                        <h2 class="brand-text">Buenmar</h2>
                    </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
				<i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
				<i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
   
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item {{ (request()->is('auth/dashboard*')) ? 'active' : '' }}">

				<a class="d-flex align-items-center" href="{{ url('auth/dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></a>
                    
                </li>
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i data-feather="more-horizontal"></i>
                </li>


                <li class="nav-item {{ (request()->is('auth/onlinecom/0/1')) ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('auth.onlinecom',['ptypeid'=>0,'filterid'=>2]) }}"><i class="material-icons">forum</i>
                <span class="menu-title text-truncate" data-i18n="Email">Online Community</span></a>
                </li>
                <li class="nav-item {{ (request()->is('auth/onlinecom/1')) ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('auth.onlinecom',['ptypeid'=>1,'filterid'=>2]) }}"><i class="material-icons">border_color</i>
                <span class="menu-title text-truncate" data-i18n="Chat">Letter Writing</span></a>
                </li>
                <li class="nav-item {{ (request()->is('auth/onlinecom/2')) ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('auth.onlinecom',['ptypeid'=>2,'filterid'=>2]) }}"><i class="material-icons">phone_in_talk</i>
                <span class="menu-title text-truncate" data-i18n="Todo">Phone Witnessing</span></a>
                </li>
                <li class="nav-item {{ (request()->is('auth/onlinecom/3')) ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('auth.onlinecom',['ptypeid'=>3,'filterid'=>2]) }}"><i class="material-icons">record_voice_over</i>
                <span class="menu-title text-truncate" data-i18n="Calendar">RV Contacts</span></a>
                </li>
                <li class="nav-item {{ (request()->is('auth/onlinecom/4*')) ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('auth.onlinecom',['ptypeid'=>4,'filterid'=>2]) }}"><i class="material-icons">group</i>
                <span class="menu-title text-truncate" data-i18n="Kanban">Bible Study</span></a>
                </li>



                <li class=" nav-item"><a class="d-flex align-items-center" href="#">
                  <i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Field Service</span></a>
                    <ul class="menu-content">
                        <li class="{{ (request()->is('auth/index_day*')) ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('auth.dataentrydaily') }}">
                        <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Daily Report</span></a></li>

                        <li class="{{ (request()->is('auth/index_month*')) ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('auth.dataentrymonthly') }}">
                        <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Monthly Report</span></a></li>

                        <!--li><a class="d-flex align-items-center" href="#">
                        <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Field Report</span></a></li-->
                        @php

                        $ulevel = session()->get('Ulevel');
                        if($ulevel==99){
                        @endphp   
                        <li><a class="d-flex align-items-center" href="{{ route('auth.officer_report') }}">
                        <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">Field Officer Report</span></a></li>
                        @php
                        }
                        @endphp
                    </ul>
                </li>
                
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Forms &amp; Reports</span><i data-feather="more-horizontal"></i>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="save"></i>
                <span class="menu-title text-truncate" data-i18n="File Manager">Letter Template</span></a>
                </li>

                
                </ul>
        </div>
    </div>
