<?php

namespace App\Http\Controllers;

use App\Models\Sticky;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StickyController extends Controller
{
    public function __invoke()
    {
        $sticky = Sticky::paginate(10);
        return view('sticky.index')
                ->with('sticky', $sticky); 
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

        $sticky = Sticky::paginate(5);
        return view('sticky.index')
                ->with('stickies', $sticky); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sticky.form');
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
            'date' => 'required',
            'sticky' => 'required'
        ],[
            'date.required' => 'O campo data é de preenchimento obrigatório!',
            'sticky.required' => 'O campo lembrete é de preenchimento obrigatório!'
        ]);

        $sticky = new Sticky;

        $sticky -> date = $request -> date;
        $sticky -> sticky = $request -> sticky;

        $sticky -> save();

        Session::flash('mensagem', 'Lembrete salvo com sucesso!');
        return redirect()->route('stickies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sticky  $sticky
     * @return \Illuminate\Http\Response
     */
    public function show(Sticky $sticky)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sticky  $sticky
     * @return \Illuminate\Http\Response
     */
    public function edit(Sticky $sticky)
    {
        return view('sticky.form')
        ->with('sticky', $sticky);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sticky  $sticky
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sticky $sticky)
    {
        $this->validate($request,
        [
            'date' => 'required',
            'sticky' => 'required'
        ],[
            'date.required' => 'O campo data é de preenchimento obrigatório!',
            'sticky.required' => 'O campo lembrete é de preenchimento obrigatório!'
        ]);

        $sticky -> date = $request-> date;
        $sticky -> sticky = $request -> sticky;
        $sticky -> update();

        Session::flash('mensagem', 'Lembrete editado com sucesso!');
        return redirect()->route('stickies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sticky  $sticky
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sticky $sticky)
    {
        $sticky -> delete();
        Session::flash('mensagem', 'Lembrete excluído com sucesso!');
        return redirect()->route('stickies.index');
    }
}
