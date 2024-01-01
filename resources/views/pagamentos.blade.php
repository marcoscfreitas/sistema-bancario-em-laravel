<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Banco Central</title>
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .header-title {
            font-size: 24px;
            font-weight: bold;
        }

        .header-username {
            margin-right: 10px;
        }

        .header-button {
            padding: 10px 20px;
            background-color: #59B2E0;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
        }

        .header-button:hover {
            background-color: #53A3CD;
        }

        body {
            background-color: #029f5b;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        a {
            font-size: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-bottom: 10px;
        }

        button {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        input[type="text"] {
            padding: 6px;
            border: 1px solid #ddd;
        }

        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-bottom: 10px;
        }

        .flex-container {
            display: flex;
            justify-content: space-evenly;
        }

        .content {
            margin-left: 600px;
            /* Largura da sidebar */
        }

        #extratoButton,
        #transferenciaButton,
        #pagamentoButton {
            display: inline-block;
            padding: 30px 20px;
            font-size: 25px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        #extratoButton:hover {
            background-color: #45a049;
        }

        #transferenciaButton:hover {
            background-color: #45a049;
        }

        #pagamentoButton:hover {
            background-color: #45a049;
        }

        .sidebar {
            width: 200px;
            background-color: green;
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #333333;
            font-weight: bold;
        }

        .sidebar a:hover {
            color: #ff0000;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header-title">Banco Eletrônico</div>
        <div>
            <span class="header-username">Usuário Logado: {{ $user->username }}</span> <a href="{{ route('login') }}" class="header-button">Logoff</a>

        </div>
    </header>
    <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspBANCO ELETRONICO</h1><br><br><br><br>
    <div class='content'>

        <div class='sidebar'>
            <br><br><br><br><br><br><br><br>
            <a href="{{ route('extrato') }}" id="extratoButton">Extrato</a><br><br><br>
            <a href="{{ route('transferencia') }}" id="transferenciaButton">Transferências</a><br><br><br>
            <a href="{{ route('pagamentos') }}" id="pagamentoButton">Pagamentos</a>
        </div>
        <div>
            <h1 style='position:absolute;left:350px'>Informação para pagamento</h1>
            <form action="{{ route('pagar') }}" method="POST" style="position:absolute;left:350px;top:350px;">
                @csrf
                <input type="hidden" name="userId" value="{{$user->id}}">
                <label for="forma_pagamento">Forma de pagamento:</label><br>
                <select name="metodo">
                    <option value="Pix">Pix</option>
                    <option value="Boleto">Boleto</option>
                    <option value="Débito">Débito</option>
                </select>
                <input type="text" id="metodo_numero" name="metodo_numero"><br><br>
                <br><br>
                <label for="valor">Valor:</label><br>
                <input type="text" id="valor" name="valor"><br><br>
                <button type="submit">Realizar Pagamento</button>
            </form>
            @if (session('success'))
            <div class="">{{ session('success') }}</div>
            @endif

            @if (session('error'))
            <div class="error-message">{{ session('error') }}</div>
            @endif

            <div style='position:absolute; top:300px;right:20px; background-color:green; padding:2%'>
                <span class="header-account" style="font-size: 30px">Número da Conta: {{ $user->numero_Conta }}</span><br><br>
                <span class="header-balance" style='font-size:20px'>Saldo: R$ {{ $user->saldo }}</span><br><br><br>
                <span class="header-limit" style='font-size:20px'>Limite: R$ {{ $user->limite }}</span>
            </div>
        </div>
</body>
