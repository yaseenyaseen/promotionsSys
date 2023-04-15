@extends('blogs.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>متطلبات الترقية- استمارة السمعة الاكاديمية للترقية العلمية </h2>
                <h3>معاملات استمارة السمعة الاكاديمية للترقية العلمية المطلوب انجازها من قبل</h3>
                @role('Computer_Center_Officer')
                <h3> مسؤول مركز الحاسبة الالكترونية </h3>
                <br>

                @foreach ($promotion_reqsForUniHasacademic_reput as $req)
                    <br>
                    <a class="btn btn-info"
                       href="{{ route('AcademicReputationindex',$req->user_id) }}">
                        ID
                        <br>
                        مقدم الطلب =
                        <br>
                        {{$req->user_id}}
                    </a>
                @endforeach
                @endrole

@endsection
