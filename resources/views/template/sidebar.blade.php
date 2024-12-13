<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Start Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link " href="{{route('index.index')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        @if(Auth::user()->userType !='admin')
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Cms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('cms.showCms')}}">
                        <i class="bi bi-circle"></i><span>Pages</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        <!-- Dynamic menubar -->
        @if(isset($menus) && count($menus)>0)
        @foreach($menus as $key => $val)
        <li class="nav-item">

            <?php $id = ++$key; ?>
            <a class="nav-link collapsed" data-bs-target="#components-nav<?php echo $id ?>" data-bs-toggle="collapse" href="#">
                <i class="bi {{$val->menu_icon}}"></i><span>{{$val->page_title}}</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>

            @if(isset($val->submenus) && count($val->submenus) >0)
            @foreach($val->submenus as $k => $sub)
            <ul id="components-nav<?php echo $id ?>" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="">
                        <i class="bi bi-circle"></i><span>{{$sub->page_title}}</span>
                    </a>
                </li>
            </ul>
            @endforeach
            @endif

        </li>
        @endforeach

        @endif

    </ul>

</aside>