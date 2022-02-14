<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
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

        $user = User::paginate(5);
        return view('user.index')
                ->with('user', $user); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'cpf' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'login' => 'required | max:35',
            'password' => 'required | min:6'
        ],
        [
            'name.required' => 'O campo nome é de preenchimento obrigatório!',
            'name.max' => 'O campo nome não pode ultrapassar 50 caracteres!',
            'cpf.required' => 'O campo cpf é de preenchimento obrigatório!',
            'phone.required' => 'O campo phone é de preenchimento obrigatório!',
            'email.required' => 'O campo email é de preenchimento obrigatório!',
            'login.required' => 'O campo login é de preenchimento obrigatório!',
            'login.max' => 'O campo login não pode ultrapassar 20 caracteres!',
            'password.required' => 'O campo senha é de preenchimento obrigatório!',
            'password.min' => 'O campo senha precisa ser maior ou igual a 6 caracteres!'
        ]);
        $details = new User;
        $details -> name = $request->name;
        $details -> cpf = $request->cpf;
        $details -> phone = $request->phone;
        $details -> email = $request->email;
        $details -> login = $request->login;
        $details -> password = bcrypt($request->password);
        $details -> save();
        Session::flash('mensagem','Usuário adicionado com sucesso!');
       return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('user.form')
        ->with('user', $user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'cpf' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'login' => 'required | max:35'
        ],
        [
            'name.required' => 'O campo nome é de preenchimento obrigatório!',
            'name.max' => 'O campo nome não pode ultrapassar 50 caracteres!',
            'cpf.required' => 'O campo cpf é de preenchimento obrigatório!',
            'phone.required' => 'O campo phone é de preenchimento obrigatório!',
            'email.required' => 'O campo email é de preenchimento obrigatório!',
            'login.required' => 'O campo login é de preenchimento obrigatório!',
            'login.max' => 'O campo login não pode ultrapassar 20 caracteres!',
        ]);
        $user -> name = $request->name;
        $user -> cpf = $request->cpf;
        $user -> phone = $request->phone;
        $user -> email = $request->email;
        $user -> login = $request->login;
        $user -> password = bcrypt($request->password);
        $user -> update();
        Session::flash('mensagem','Usuário editado com sucesso!');
       return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();
        Session::flash('mensagem','Registro excluido com sucesso!');
        return redirect()->route('users.index');
    }

    public function auth(Request $request)
    {
        $this->validate($request, [
            'login' => 'required',
            'password' => 'required'
        ],
        [
            'login.required' => 'O campo login deve ser preenchido',
            'password.required' => 'O campo senha deve ser preenchido'

        ]);

        if(Auth::attempt(['login' => $request->login, 'password' => $request->password]))
        {
            //return $request->email.$request->password;
            //dd('logou');
            return redirect()->intended('dashboard');
        }
        else
        {
            return back()->withErrors([
                
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
    
}
//Auth::user()->name TRAZER DADOS DO USUARIO LOGADO