<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

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
            position: absolute;
            width: 80%;
            border-collapse: collapse;
        }

        th,
        td {
            background-color: #45a049;
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: green;
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
            <span class="header-username">Usuário Logado: <?php echo e($user->username); ?></span> <a href="<?php echo e(route('login')); ?>" class="header-button">Logoff</a>

        </div>
    </header>
    <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspBANCO ELETRONICO</h1><br><br><br><br>
    <div class='content'>

        <div class='sidebar'>
            <br><br><br><br><br><br><br><br>
            <a href="<?php echo e(route('extrato')); ?>" id="extratoButton">Extrato</a><br><br><br>
            <a href="<?php echo e(route('transferencia')); ?>" id="transferenciaButton">Transferências</a><br><br><br>
            <a href="<?php echo e(route('pagamentos')); ?>" id="pagamentoButton">Pagamentos</a>
        </div>
        <table style="position: absolute; right:12px;">
            <thead>
                <tr>

                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Método</th>
                    <th>Destinatário</th>
                    <th>Data</th>

                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>R$ <?php echo e($transacao->Valor); ?></td>
                    <td><?php echo e($transacao->Descricao); ?></td>
                    <td><?php echo e($transacao->Tipo); ?></td>
                    <td><?php echo e($transacao->Destinatário); ?></td>
                    <td><?php echo e($transacao->Data); ?></td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
<?php /**PATH /home/aluno/Documentos/DS1 Vitor/Banco-DS1-PROJETO/resources/views/extrato.blade.php ENDPATH**/ ?>