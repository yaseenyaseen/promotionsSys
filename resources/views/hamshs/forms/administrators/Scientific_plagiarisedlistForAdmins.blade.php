@extends('blogs.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>متطلبات الترقية- محضر  الاستلال العلمي للترقية العلمية </h2>
<h3>معاملات محضر الاستلال العلمي للترقية العلمية المطلوب انجازها</h3>
              @role('admin'){{--add head depaertment role, add member role --}}
                <h3>رئيس لجنة الاستلال</h3>
                <br>
                @foreach ($promotion_reqsForHeadDepartment_Coll as $req)
                    <br>
                    <a class="btn btn-info"
                       href="{{ route('Scientific_plagiarised_minutesindex',$req->user_id) }}">
                        ID
                        <br>
                        مقدم الطلب =
                        <br>
                        {{$req->user_id}}
                    </a>
                    <br>
                @endforeach
                @endrole

@endsection
