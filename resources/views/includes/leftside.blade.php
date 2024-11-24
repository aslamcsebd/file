<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <nav class="m-2 ">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('file-list') }}"
                    class="nav-link {{ request()->is('file-list*') ? 'active' : '' }}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>File list</p>
                </a>
            </li>
        </ul>
    </nav>
</aside>
