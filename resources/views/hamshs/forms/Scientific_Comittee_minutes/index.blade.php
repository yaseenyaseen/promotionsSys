@extends('blogs.layout')

@section('content')

    <div class="row" dir="rtl">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>متطلبات الترقية-محضر اللجنة العلمية للترقية العلمية </h2>
                <br>
                <br>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                    @role('admin') {{--//add head department role--}}
                    <br>
                    <h5>رئيس اللجنة العلمية </h5>
{{--{{$user_id}}--}}

                @if(is_null($ScientificCommittee))
                        <br>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('createScientific_Committee',$user_id) }}"> {{--// done--}}

                                البدء بترويج محضر اللجنة العلمية

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
                                       href="{{ route('showScientific_Committee',$ScientificCommittee) }}">طباعةالهامش</a>

                                    <a class="btn btn-primary" href="{{ route('editScientific_Committee_minutes',$ScientificCommittee) }}">
                                        اضافة أو تعديل الهامش </a>

                            </td>
                        </tr>
                        @endrole
                    @endif

    <br>
        <br>
        <br>

@endsection
