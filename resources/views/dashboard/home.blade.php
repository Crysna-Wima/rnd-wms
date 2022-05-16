@extends('layout.base')
@section('tables')
<div id="content" class="jumbotron">
        <div class="container text-white text-vertical-center" style="background-color: #2b26269e;">
                <h1>Selamat Datang di Aplikasi Pergudangan Online</h1> <br> <br>
                <h2>Anda Login Sebagai <b>Crysna</b> <br> Staff Gudang GSG - Gudang Lamongan</h2>    
        </div>
</div>

<style>
        .jumbotron {
                background-image: url('assets/img/bg_home.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                margin-bottom: 0rem;
        }
        .text-vertical-center {
                display: flex;
                align-items: flex-start;
                font-weight: 300;
                flex-direction: column;
        }
</style>
@endsection