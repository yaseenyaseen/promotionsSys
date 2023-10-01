@extends('blogs.layout')
@section('content')
    <h3>مسؤلين انجاز محضر الاستلال العلمي للترقية العلمية </h3>
    <br>

    @role('admin') {{--add role of رئيس اللجنة العلمية--}}
    <div class="pull-right">
        <a class="btn btn-secondary" href="{{ route('Scientific_plagiarised_minuteslistindex')}}"> رئيس لجنة الاستلال </a>

    @endrole
@endsection
