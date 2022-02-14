<?php

namespace App\Http\Controllers;

use App\Models\Birthday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BirthdayController extends Controller
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

        $birthday = Birthday::paginate(10);
        return view('birthday.index')
                ->with('birthday', $birthday); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('birthday.form');

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
            'name' => 'Required',
            'day' => 'Required | min:1 | max:2',
            'month' => 'Required | min:1 | max:2'
        ],
        [
            'name.required' => 'O campo nome é de preenchimento obrigatório!',
            'day.required' => 'O campo dia é de preenchimento obrigatório!',
            'month.required' => 'O campo mês é de preenchimento obrigatório!',
            'day.min' => 'O campo dia precisa conter pelo menos 1 dígito!',
            'month.min' => 'O campo mês precisa conter pelo menos 1 dígito!',
            'day.max' => 'O campo dia precisa conter no máximo 2 dígitos!',
            'month.max' => 'O campo mês precisa conter no máximo 2 dígitos!',

        ]);
            $birthday = new Birthday;
    
            $birthday->name = $request->name;
            $birthday->day = $request->day;
            $birthday->month = $request->month;
            $birthday-> save();
            Session::flash('mensagem','Aniversário adicionado com sucesso!');
            return redirect()->route('birthdays.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Birthday  $birthday
     * @return \Illuminate\Http\Response
     */
    public function show(Birthday $birthday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Birthday  $birthday
     * @return \Illuminate\Http\Response
     */
    public function edit(Birthday $birthday)
    {
       return view('birthday.form')
                ->with('birthday', $birthday);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Birthday  $birthday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Birthday $birthday)
    {
        $this->validate($request, [
            'name' => 'Required',
            'day' => 'Required | min:1 | max:2',
            'month' => 'Required | min:1 | max:2'
        ],
        [
            'name.required' => 'O campo nome é de preenchimento obrigatório!',
            'day.required' => 'O campo dia é de preenchimento obrigatório!',
            'month.required' => 'O campo mês é de preenchimento obrigatório!',
            'day.min' => 'O campo dia precisa conter pelo menos 1 dígito!',
            'month.min' => 'O campo mês precisa conter pelo menos 1 dígito!',
            'day.max' => 'O campo dia precisa conter no máximo 2 dígitos!',
            'month.max' => 'O campo mês precisa conter no máximo 2 dígitos!',

        ]);
            $birthday->name = $request->name;
            $birthday->day = $request->day;
            $birthday->month = $request->month;
            $birthday-> update();
            Session::flash('mensagem','Aniversário editado com sucesso!');
            return redirect()->route('birthdays.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Birthday  $birthday
     * @return \Illuminate\Http\Response
     */
    public function destroy(Birthday $birthday)
    {
        $birthday->delete();
        Session::flash('mensagem','Aniversário excluído com sucesso!');
        return redirect()->route('birthdays.index');

    }
}
