<div class="sidebar" data-image="">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/" class="simple-text">
                {{ __("Publianagrama") }}
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>

            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a class="nav-link active bg-danger" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nc-icon nc-simple-remove"></i>
                        <p>{{ __("Salir") }}</p>
                    </a>
                </form>

            </li>

        </ul>
    </div>
</div>
