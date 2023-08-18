<?php

namespace App\Http\Controllers;

class ContatoController extends Controller
{

    /**
     * The user repository implementation.
     *
     * @var ContatoRespository
     */
    protected $contatos;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Listar contato
     */
    public function listar()
    {
        return view('home');
    }

    /**
     * Excluir contato
     */
    public function excluir()
    {
        return view('home');
    }

    /**
     * Cadastrar contato
     */
    public function cadastrar()
    {
        return view('home');
    }

    /**
     * Alterar contato
     */
    public function alterar()
    {
        return view('home');
    }


}
