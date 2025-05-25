<header class="navbar navbar-expand-lg bg-body-tertiary">

    <div class="menu-bg container-fluid">

        <div class="menu container">


            <div class="logo">
                <a href="#">
                    <img src="{{ asset('assets/imgs/logo.png') }}" alt="logo">
                    <span>Conecte</span>
                </a>
            </div>

            <!-- botão do menu hamburguer -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- menu no modo desktop -->
            <nav class="menu-nav col-md-10 collapse navbar-collapse" id="navbarNav" style="flex-grow:0;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('form.cliente') }}" class="nav-link">Contrate um Cuidador</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('form.cuidador') }}"class="nav-link">Trabalhe Conosco</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sobre') }}" class="nav-link">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contatos') }}" class="nav-link">Contatos</a>
                    </li>
                </ul>

                @auth
                    <div class="buttons ms-md-3 align-items-center">
                        <div class="d-flex align-items-center gap-3">

                            {{-- Verifica se o usuário tem foto --}}
                            @if (!empty(Auth::user()->foto))

                                <img src="{{ asset('assets/imgs/cuidadores/' . Auth::user()->foto) }}" alt="Foto do usuário"
                                    style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                            @else
                                {{-- Ícone de usuário genérico --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37
                              C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                </svg>
                            @endif

                            <span>{{ Auth::user()->nome }}</span>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth

                @guest
                    <div class="buttons ms-md-3">
                        <a href="{{ route('login') }}" class="btn btn-primary form-control">Entrar</a>
                        <a href="{{ route('cadastro') }}" class="btn btn-secondary form-control">Cadastrar</a>
                    </div>
                @endguest


            </nav>
        </div>

    </div>
</header>
