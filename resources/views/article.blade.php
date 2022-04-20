@extends('layouts/template')

@section('titre')
    Mes articles
@endsection

@section('contenu')
    <p>article - {{ $value }}</p>
    {{dd($prenoms)}}
@endsection
