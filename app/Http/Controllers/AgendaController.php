<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $agendas = Agenda::latest()->paginate(5);
        
        return view('agendas.index',compact('agendas'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        return view('agendas.create');
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
       $agendadate =  $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'nascimento' => 'required',
            'cpf' => 'required',
            'telefone' => 'required',
        ]);
        
       $agenda = Agenda::create($agendadate);
         
        return redirect('agendas')->with('success','Agenda created successfully.');

     }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda) : View
    {
        return view('agendas.show',compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agenda $agenda) : View
    {
        return view('agendas.edit',compact('agenda'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agenda $agenda) : RedirectResponse
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'nascimento' => 'required',
            'cpf' => 'required',
            'telefone' => 'required',
        ]);
        
        $agenda->update($request->all());
        
        return redirect()->route('agendas.index')
                        ->with('success','Agenda updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda) : RedirectResponse
    {
        $agenda->delete();
         
        return redirect()->route('agendas.index')
                        ->with('success','Agenda deleted successfully');
                        
    }
}
