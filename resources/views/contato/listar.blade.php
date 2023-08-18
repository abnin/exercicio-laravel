@extends('contato.layout')
 
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Contatos</title>
    </head>
    <body>
        <div class="container-fluid">
        <div class="pull-right">
                <a class="btn btn-success" href="{{ route('contato.cadastro') }}">Adicionar contato</a>
            </div>
        <div class="mx-auto p-2">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Contato</th>
                    <th scope="col">E-mail</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        </div>
    </body>
</html>