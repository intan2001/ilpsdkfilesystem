<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-header">MAIN NAVIGATION</li>

    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('recordEntry') }}" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <span>Record Entry</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('recordView') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <span>Record View</span>
        </a>
    </li>

    @if( Auth::user()->role == 1)
    <li class="nav-item">
        <a href="{{ route('serahan') }}" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <span>Serahan</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('addUser') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <span>User</span>
        </a>
    </li>
    @endif

    <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="nav-icon far fa-flag"></i>
            <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </li>
</nav>



