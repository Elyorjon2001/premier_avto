    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1">Premier Avto City</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="{{route ('home') }}" class="nav-item nav-link active">Asosiy sahifa</a>
                        <a href="{{route ('about') }}" class="nav-item nav-link active">Biz haqimizda</a>
                        <a href="{{route ('service') }}" class="nav-item nav-link">Xizmatlar</a>
                        <a href="{{route ('posts.index') }}" class="nav-item nav-link">Avtomabillar</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">sahifalar</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{route ('contact') }}" class="dropdown-item">call center</a>
                                <a href="{{route ('booking') }}" class="dropdown-item">Avtomabillar haqida</a>
                            </div>
                        </div>
                        @if(session('authenticated_admin'))
                        <a href="{{ route('posts.create') }}" class="nav-item nav-link">Admin</a>
                        

                        <a href="{{ route('logout') }}" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                        class="nav-item nav-link">Chiqish</a>
                     
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
    
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->