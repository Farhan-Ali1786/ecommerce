<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text" onclick="pos5_success_noti()">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ url('admin/dashboard') }}">
                <div class=" ">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            {{-- <ul>
                <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Default</a>
                </li>
                <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Alternate</a>
                </li>
            </ul> --}}
        </li>
        <li class="manu-lable">Home</li>
        <li>
            <a href="{{ route('home.banner') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Home Banner</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.manage_size') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Manage Size</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.manage_color') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Manage Color</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Attributes</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.attributes_name')}}"><i class="bx bx-right-arrow-alt"></i>Attributes Name</a></li>
                <li> <a href="{{route('admin.attributes_value')}}"><i class="bx bx-right-arrow-alt"></i>Attributes Value</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.category_name')}}"><i class="bx bx-right-arrow-alt"></i>Category</a></li>
                <li> <a href="{{route('admin.category_attribute')}}"><i class="bx bx-right-arrow-alt"></i>Category Attributes</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Products</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.product')}}"><i class="bx bx-right-arrow-alt"></i>Products</a></li>
                {{-- <li> <a href=""><i class="bx bx-right-arrow-alt"></i>Category Attributes</a></li> --}}
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Brands</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.brands')}}"><i class="bx bx-right-arrow-alt"></i>Brands</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Tax</div>
            </a>
            <ul>
                <li> <a href="{{route('admin.tax')}}"><i class="bx bx-right-arrow-alt"></i>Tax</a></li>
            </ul>
        </li>
        <li class="menu-label">Pages</li>

        <li>
            <a href="{{ route('user.profile') }}">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">User Profile</div>
            </a>
        </li>


    </ul>
    <!--end navigation-->
</div>
