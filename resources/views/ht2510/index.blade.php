@extends(env('THEME').'.layouts.site')

@section('menu')
    {!! $menu !!}
@endsection

@section('mainBlock')
    {!! $mainBlock !!}
@endsection

@section('lastItemsMetodology')
     {!! $lastItemsMetodology !!}
@endsection

@section('lastItemsInstruction')
    {!! $lastItemsInstruction !!}
@endsection