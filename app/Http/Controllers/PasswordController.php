<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PasswordController extends Controller
{
    public function __invoke()
    {
        //
    }
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

        $token = session('token');

        if (empty($token))
        {
            return view('password.token');
        }
        else
        {
            $password = Password::paginate(5);
            return view('password.index')
                    ->with('password', $password);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('password.form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->token))
        {
            $this->validate($request,
            [
                'token' => 'required'
            ],
            [
                'token.required' => 'O token é obrigatório para acessar esta área!'
            ]);
            $token = Controller::token();
                if($request->token == $token)
                {
                    Session::flash('token');
                    return redirect()->route('passwords.index');
                }
                else
                {
                    Session::flash('mensagem', 'Chave token inválida!');
                    return redirect()->route('passwords.index');
                }


        }

        $password = new Password;

        $this->validate($request, 
        [
            'service' => 'required',
            'account' => 'required',
            'login' => 'required',
            'password' => 'required'
        ],
        [
            'service.required' => 'O campo serviço é de preenchimento obrigatório!',
            'account.required' => 'O campo conta é de preenchimento obrigatório!',
            'login.required' => 'O campo login é de preenchimento obrigatório!',
            'password.required' => 'O campo senha é de preenchimento obrigatório!',
        ]);

        $password -> service = $request -> service;
        $password -> account = $request -> account;
        $password -> login = $request -> login;
        $password -> password = $request -> password;

        $password -> save();

        Session::flash('mensagem', 'Serviço cadastrado com sucesso!');
        return redirect()->route('passwords.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function show(Password $password)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function edit(Password $password)
    {
        return view('password.form')
        ->with('password', $password);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Password $password)
    {
        $this->validate($request, 
        [
            'service' => 'required',
            'account' => 'required',
            'login' => 'required',
            'password' => 'required'
        ],
        [
            'service.required' => 'O campo serviço é de preenchimento obrigatório!',
            'account.required' => 'O campo conta é de preenchimento obrigatório!',
            'login.required' => 'O campo login é de preenchimento obrigatório!',
            'password.required' => 'O campo senha é de preenchimento obrigatório!',
        ]);

        $password -> service = $request -> service;
        $password -> account = $request -> account;
        $password -> login = $request -> login;
        $password -> password = $request -> password;

        $password -> update();

        Session::flash('mensagem', 'Senha editado com sucesso!');
        return redirect()->route('passwords.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function destroy(Password $password)
    {
        $password->delete();
        Session::flash('mensagem', 'Senha excluída com sucesso');
        return redirect()->route('passwords.index');

    }
}
