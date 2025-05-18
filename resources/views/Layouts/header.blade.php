<header class="navbar navbar-expand-lg bg-body-tertiary">

    <div class="menu container-fluid">

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
                    <a href="#" class="nav-link">Contrate um Cuidador</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Trabalhe Conosco</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sobre') }}" class="nav-link">Sobre</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contatos') }}" class="nav-link">Contatos</a>
                </li>

            </ul>
            <div class="buttons ms-md-">
                <a href="#"class="btn btn-primary form-control">Entrar</a>
                <a href="{{ route('cadastro') }}"class="btn btn-secondary form-control">Cadastrar</a>
            </div>
        </nav>


    </div>
</header>
