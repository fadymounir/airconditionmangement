<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('adminpanel.home.index')}}" class="brand-link">
        <img src="{{ env('projectLogo','/dashbaord/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{env('projectName','DashBaord')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


                <li class="nav-item">
                    <a href="{{route('adminpanel.users.index')}}"
                       class="nav-link {{ Request::is('*users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>المستخدمين</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('adminpanel.purchases.index')}}"
                       class="nav-link {{ Request::is('*purchases*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>المشتريات</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('adminpanel.PurchasesUsers.index')}}"
                       class="nav-link {{ Request::is('*PurchasesUsers*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>مشتريات الفنيين</p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{route('adminpanel.orders.index')}}"
                       class="nav-link {{ Request::is('*Orders*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>الطلبات</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('adminpanel.products.index')}}"
                       class="nav-link {{ Request::is('*products*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-luggage-cart"></i>
                        <p>المنتجات</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('adminpanel.cities.index')}}"
                       class="nav-link {{ Request::is('*cities*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>الاحياة والمناطق</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('adminpanel.maintenanceService.index')}}"
                       class="nav-link {{ Request::is('*maintenanceService*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-toolbox"></i>
                        <p>خدمات الصيانة</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('adminpanel.ordersWarrenty.index')}}"
                       class="nav-link {{ Request::is('*ordersWarrenty*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p> اعادة الفتح الطلبات</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('adminpanel.problemsDescribingOrders.index')}}"
                       class="nav-link {{ Request::is('*problemsDescribing*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>وصف مشكلات الطلبات</p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{route('adminpanel.rates.index')}}"
                       class="nav-link {{ Request::is('*rates*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-star"></i>
                        <p>تقيمات الطلبات</p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{route('adminpanel.timeLine.index')}}"
                       class="nav-link {{ Request::is('*timeLine*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-business-time"></i>
                        <p>جدول المواعيد</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('adminpanel.logs.index')}}"
                       class="nav-link {{ Request::is('*logs*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>السجلات</p>
                    </a>
                </li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
