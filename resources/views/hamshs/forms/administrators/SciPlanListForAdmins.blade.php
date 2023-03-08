@extends('blogs.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>متطلبات الترقية- الخطة البحثية </h2>
<h3>معاملات الخطة البحثية المطلوب انجازها</h3>
                @role('HeadDepartment_Coll')
                <h3>رئيس قسم </h3>
                <br>
                {{$promotion_reqsForHeadDepartment_Coll}}
                @foreach ($promotion_reqsForHeadDepartment_Coll as $req)
                    <br>
                    <a class="btn btn-info"
                       href="{{ route('hamshs.forms.sciplanindex',$req->user_id) }}">
                        ID
                        <br>
                        مقدم الطلب =
                        <br>
                        {{$req->user_id}}
                    </a>
                @endforeach
                @endrole
                @role('Coll_ResearchPlan_Officer')
                <h3>مسؤول خطة بحثية كلية </h3>
                <br>
                @foreach ($promotion_reqsForCollage as $req)
                    <br>
                    <a class="btn btn-info"
                       href="{{ route('hamshs.forms.sciplanindex',$req->user_id) }}">
                        ID
                        <br>
                        مقدم الطلب =
                        <br>
                        {{$req->user_id}}
                    </a>
                @endforeach
                @endrole

@endsection
