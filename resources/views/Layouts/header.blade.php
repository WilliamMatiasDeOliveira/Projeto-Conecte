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

                @guest
                    <div class="buttons ms-md-2">
                        <a href="{{ route('login') }}"class="btn btn-primary form-control">Entrar</a>
                        <a href="{{ route('cadastro') }}"class="btn btn-secondary form-control">Cadastrar</a>
                    </div>
                @endguest

                @auth

                    <div class="auth-user d-flex justify-content-center align-items-center gap-4">

                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>

                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <input type="submit"value="Logout" class="btn btn-danger">
                        </form>

                        @if (Auth::user()->tipo == 'cuidador')
                            <a href="{{ route('dashboard.cuidador') }}" class='btn btn-secondary'>Meu Perfil</a>
                        @endif
                        @if (Auth::user()->tipo == 'cliente')
                            <a href="{{ route('dashboard.cliente') }}" class='btn btn-secondary'>Meu Perfil</a>
                        @endif
                    </div>



                @endauth
            </nav>
        </div>

    </div>
</header>
