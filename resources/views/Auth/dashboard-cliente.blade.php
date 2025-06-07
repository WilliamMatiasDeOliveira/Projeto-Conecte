@extends('Layouts.main_layout')
@section('title', 'Dashboard Cliente')

@section('content')

    <section class="dashboard-cliente-container">

        <div class="dashboard-cliente">
            <div class="dashboard-cuidador img-user">
                <img src="{{ asset('assets/imgs/clientes/' . Auth::user()->foto) }}" alt="foto do usuario">
                <h1 class='dashboard-cuidador title-nome'>{{ Auth::user()->nome }}</h1>
            </div>

            <div class="dashboard-cliente info-user">
                <p>E-MAIL : {{ Auth::user()->email }}</p>
                <p>TELEFONE : {{ Auth::user()->telefone }}</p>
                <p>CPF : {{ Auth::user()->cpf }}</p>
                <p>CIDADE : {{ Auth::user()->cidade }}</p>
                <p>BAIRRO : {{ Auth::user()->bairro }}</p>
                <p>RUA : {{ Auth::user()->rua }}</p>
                <a href="{{route('update', encrypt(Auth::user()->id))}}" class="btn btn-success w-50 mt-4 mb-4">Atualizar Dados</a>
            </div>

            @php
                $cuidadores = session('cuidadores');
            @endphp


            <h1 class="text-center">Contrate um de nossos cuidadores</h1>
            <section class="lista-cuidadores-container">
                @foreach ($cuidadores as $cuidador)
                    <div class="lista-cuidadores">
                        <img src="{{ asset('assets/imgs/cuidadores/' . $cuidador->foto) }}"alt="imagem do cuidador">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $cuidador->nome }}</h5>
                            <p class="card-text">E-MAIL: {{ $cuidador->email }}
                                <br>TELEFONE: {{ $cuidador->telefone }}
                                <br>CIDADE: {{ $cuidador->cidade }}
                            </p>

                            {{-- campo botoes para desktop --}}
                            <div class="botoes">
                                <a href="https://api.whatsapp.com/send?phone={{ $cuidador->telefone }}"
                                    class="btn btn-primary form-control"target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path
                                            d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                    </svg>
                                    Conversar via WhatsApp
                                </a>

                                <a href="{{ asset('assets/imgs/curriculos/' . $cuidador->curriculo) }}" target="_blank"
                                    class="btn btn-secondary mt-2 form-control">
                                    Ver Currículo
                                </a>

                            </div>

                            {{-- campo botoes para celular --}}
                            <div class="botoes-celular">
                                <a href="https://api.whatsapp.com/send?phone={{ $cuidador->telefone }}"
                                    class="btn btn-primary form-control">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path
                                            d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                    </svg>
                                    Conversar via WhatsApp
                                </a>

                                <a href="{{ asset('assets/imgs/curriculos/' . $cuidador->curriculo) }}" download
                                    class="btn btn-secondary mt-2 form-control">
                                    Ver Currículo
                                </a>

                            </div>

                        </div>
                    </div>
                @endforeach
            </section>


        </div>


    </section>

@endsection
