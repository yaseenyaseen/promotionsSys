@extends('blogs.layout')

@section('content')

    <div class="row" dir="rtl">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>متطلبات الترقية-محضر الاستلال العلمي للترقية العلمية </h2>
                <br>
                <br>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                    @role('admin') {{--//add head department role--}}
                    <br>
                    <h5>رئيس لجنة الاستلال  </h5>
                @if(is_null($ScientificPlagiarisedMinute))
                        <br>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('createScientific_plagiarised_minutes',$user_id) }}"> {{--// done--}}
                                البدء بترويج محضر الاستلال العلمي
                            </a>
                        </div>
                    @else
                        <div class="pull-right">
                            <a class="btn btn-success" href={{route('NewApplicationBoard')}}> صفحة الاستمارات المطلوبة</a>
                        </div>
                        <div>

                        <tr>
                            <br>
                            <br>
                            <td>
                                    <a class="btn btn-info"
                                       href="{{ route('showScientific_plagiarised_minutes',$ScientificPlagiarisedMinute) }}">طباعةمحضر الاستلال العلمي</a>

                                    <a class="btn btn-primary" href="{{ route('editScientific_plagiarised_minutes',$ScientificPlagiarisedMinute) }}">
                                        اضافة أو تعديل محضر الاستلال العلمي </a>

                            </td>
                        </tr>
                        @endrole
                    @endif

    <br>
        <br>
        <br>

@endsection
