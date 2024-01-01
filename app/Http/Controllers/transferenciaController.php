<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transacao;
use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Support\MessageBag;

class transferenciaController extends Controller
{
    public function transferir(Request $request)
    {
        $request->validate([
            'userId' => 'required',
            'numeroConta' => 'required',
            'valor' => 'required|numeric',
        ]);

        $metodoPagamento = 'Transferência';
        $numeroConta = $request->input('numeroConta');
        $valorDoPagamento = $request->input('valor');
        $valorPago = $valorDoPagamento;
        $clienteId = $request->input('userId');
        $cliente = Cliente::find($clienteId);

        if (!$numeroConta) {
            return redirect('transferencia')->with('errors', 'Número da conta não informado.');
        }

        $clienteFinal = Cliente::where('numero_Conta', $numeroConta)->first();

        if (!$clienteFinal) {
            return redirect('transferencia')->with('errors', 'Número de conta não encontrado/inválido.');
        }

        if ($valorDoPagamento <= 0) {
            return redirect('transferencia')->with('errors', 'Valor do pagamento inválido.');
        }

        if ($valorDoPagamento > $cliente->saldo) {
            if ($cliente->limite <= 0 || $cliente->limite < ($valorDoPagamento - $cliente->saldo)) {
                $errorMessage = 'Saldo e limite insuficiente para realizar o pagamento.';
                return redirect('transferencia')->with('errors', $errorMessage);
            }

            $limiteUtilizado = $valorDoPagamento - $cliente->saldo;
            $taxa = $limiteUtilizado * 0.01;
            $valorTaxado = $taxa + $limiteUtilizado;

            if ($valorTaxado > ($cliente->limite + $cliente->saldo)) {
                return redirect('transferencia')->with('errors', 'Saldo insuficiente para cobrir a taxa de 1% sobre o limite utilizado.');
            }

            $cliente->saldo = 0;
            $cliente->limite -= $valorTaxado;
            $cliente->save();
            $date = Carbon::now();

            $transacao = new Transacao();
            $transacao->cliente_id = $cliente->id;
            $transacao->descricao = $metodoPagamento . ' direto da conta bancária';
            $transacao->tipo = $metodoPagamento;
            $transacao->valor = $valorPago;
            $transacao->data = $date->format('Y-m-d H:i:s');
            $transacao->Destinatário = $clienteFinal->nome;

            $transacao->save();
            return redirect('transferencia')->with('warning', 'Limite usado. Pago R$ ' . $limiteUtilizado . ' do seu limite de R$ ' . $cliente->limite . ' disponível.');
        }

        if (!$cliente->numero_Conta) {
            return redirect('transferencia')->with('errors', 'Não foi possível encontrar uma conta bancária registrada.');
        }

        $cliente->saldo -= $valorDoPagamento;
        $cliente->save();
        $date = Carbon::now();

        if ($clienteFinal->limite < 1000) {
            $valorLimite = min(1000 - $clienteFinal->limite, $valorDoPagamento);
            $clienteFinal->limite += $valorLimite;
            $valorDoPagamento -= $valorLimite;
            $clienteFinal->saldo += $valorDoPagamento;
        } else {
            $clienteFinal->saldo += $valorDoPagamento;
        }

        $clienteFinal->save();

        $transacao = new Transacao();
        $transacao->cliente_id = $cliente->id;
        $transacao->descricao = $metodoPagamento . ' direto da conta bancária';
        $transacao->tipo = $metodoPagamento;
        $transacao->valor = $valorPago;
        $transacao->data = $date->format('Y-m-d H:i:s');
        $transacao->Destinatário = $clienteFinal->nome;

        $transacao->save();

        return redirect('transferencia')->with('success', 'Transação realizada com sucesso!');
    }
    public function pagar(Request $request)
    {
        $request->validate([
            'userId' => 'required',
            'metodo' => 'required',
            'valor' => 'required|numeric',
        ]);

        $clienteId = $request->input('userId');
        $descricao = $request->input('metodo');
        $tipo = 'Pagamento';
        $valor = $request->input('valor');
        $date = Carbon::now();

        $cliente = Cliente::find($clienteId);

        if ($valor <= 0) {
            return redirect('pagamentos')->with('errors', 'Valor do pagamento inválido.');
        }

        if ($valor > $cliente->saldo) {
            $errorMessage = 'Saldo insuficiente para realizar o pagamento.';
            return redirect('pagamentos')->with('errors', $errorMessage);
        }

        $cliente->saldo -= $valor;
        $cliente->save();
        $date = Carbon::now();

        $transacao = new Transacao();
        $transacao->cliente_id = $clienteId;
        $transacao->descricao = $descricao;
        $transacao->tipo = $tipo;
        $transacao->valor = $valor;
        $transacao->data = $date->format('Y-m-d H:i:s');
        $transacao->destinatário = 'pagamento';

        $transacao->save();

        return redirect('pagamentos')->with('success', 'Pagamento realizado com sucesso!');
    }
}
