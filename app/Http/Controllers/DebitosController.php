<?php

namespace App\Http\Controllers;

use App\Models\Debitos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DebitosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guest())
        {
            return redirect()->route('login');
        }

        $debito = Debitos::where('status', '!=', 1) -> orderBy('vencimento', 'ASC') -> paginate(10);
        return view('debito.index')
                ->with('debito', $debito);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('debito.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'favorecido' => 'required',
            'vencimento' => 'required',
            'valor'      => 'required',
            'descricao'  => 'required'
        ],
        [
            'favorecido.required' => 'O campo favorecido é de preenchimento obrigatório!',
            'vencimento.required' => 'O campo vencimento é de preenchimento obrigatório!',
            'valor.required' => 'O campo valor é de preenchimento obrigatório!',
            'descricao.required' => 'O campo descrição é de preenchimento obrigatório!',

        ]
    );
            $debito = new Debitos;

            $debito->status = '0';
            $debito->favorecido = $request->favorecido;
            $debito->vencimento = $request->vencimento;
            $debito->valor = $request->valor;
            $debito->descricao = $request->descricao;

            $debito -> save();

            Session::flash('mensagem','Débito adicionado com sucesso!');
            return redirect()->route('debitos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debitos  $debito
     * @return \Illuminate\Http\Response
     */
    public function show(Debitos $debito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debitos  $debito
     * @return \Illuminate\Http\Response
     */
    public function edit(Debitos $debito)
    {
        return view('debito.form')
               ->with('debito', $debito);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Debitos  $debito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Debitos $debito)
    {
        $this->validate($request,
        [
            'favorecido' => 'required',
            'vencimento' => 'required',
            'valor'      => 'required',
            'descricao'  => 'required'
        ],
        [
            'favorecido.required' => 'O campo favorecido é de preenchimento obrigatório!',
            'vencimento.required' => 'O campo vencimento é de preenchimento obrigatório!',
            'valor.required' => 'O campo valor é de preenchimento obrigatório!',
            'descricao.required' => 'O campo descrição é de preenchimento obrigatório!',

        ]
    );
    //VALIDAR SE É PAGAMENTO OU EDIÇÃO
                    if($request->dpgto != NULL)
                    {
                        $debito->dpgto = $request->dpgto;
                        $status = '1';
                    }
                    else
                    {
                        $status = '0';
                    }
            $debito->status = $status;
            $debito->favorecido = $request->favorecido;
            $debito->vencimento = $request->vencimento;
            $debito->valor = $request->valor;
            $debito->descricao = $request->descricao;
            $debito->update();
            Session::flash('mensagem','Débito editado com sucesso!');
            return redirect()->route('debitos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debitos  $debito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debitos $debito)
    {
        $debito->delete();
        session::flash('mensagem', 'Débito excluido com sucesso!');
        return redirect()->route('debitos.index');
    }
}
