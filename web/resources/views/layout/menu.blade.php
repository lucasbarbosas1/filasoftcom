<?php
/**
 * Created by PhpStorm.
 * User: wes_x
 * Date: 21/12/2017
 * Time: 22:44
 */
?>
@section("menu")
    <div class="nav-side-menu">
        <div class="brand"><img src="{{asset('assets/img/logo_softcom.png')}}" alt=""/></div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li>
                    <a href="{{ url("/") }}">
                        <i class="fa fa-dashboard fa-lg"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-sticky-note fa-lg"></i> Logs
                    </a>
                </li>
                <li>
                    <a href="{{ url("colaborador") }}">
                        <i class="fa fa-users fa-lg"></i> Colaboradores
                    </a>
                </li>
                @if($tipo == "Admin")
                <li>
                    <a href="{{ url("configuracao") }}">
                        <i class="fa fa-gear fa-lg"></i> Configuração
                    </a>
                </li>
                <li>
                    <a href="{{ url("users") }}">
                        <i class="fa fa-id-card-o fa-lg"></i> Usuarios
                    </a>
                </li>
                <li>
                    <a href="{{ url("atualizador") }}">
                        <i class="fa fa-exchange fa-lg"></i> Atualizador
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{url("/login/sair")}}">
                        <i class="fa fa-sign-out fa-lg"></i> Sair
                    </a>
                </li>
            </ul>
        </div>
        <div class="text-center copyright">Copyrigth&copy; 2018<br/>Carolayne/Lucas </br>Versão: </div>
        <!-- Desenvolvido por: Lucas Barbosa </br> Design por: Carolayne Chaves</br> --!>
    </div>
@endsection