@extends('blogs.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div >
                <h2>متطلبات الترقية-استمارة معلومات الوظائف التي مارسها و الشهادة مقدم الترقية  </h2>
                <br>
                @if(is_null($PositionsHeldBy))
                    <br>
                    @role('Applicant')

                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('createpositionsDegrees') }}"> أنشاء
                            هامش</a>
                    </div>
                    @endrole

                @else

                    {{--
                        following code should be upated to make the roles catogories based on head name of the page only.
                    --}}

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @role('Applicant')

                    <div class="pull-right">
                        <a class="btn btn-success" href="{{route('NewApplicationBoard')}}"> صفحة الاستمارات المطلوبة </a>
                    </div>
                    @endrole




                    <div>
                        The user name is: <br>
                        {{Auth::user()->name}} <br> <br>
                        <h6>معلومات عن استمارة استمارة السمعة الاكاديمية للترقية العلمية بالرقم <br></h6>
                       {{-- <h6> استمارة تقديم الطلب للترقية العلمية ID : <br></h6> {{$AcademicReputation->id}}
                        <h6> استمارة السمعة الاكاديمية الطلب للترقية العلمية لمقدم الطلب ID : <br>
                        </h6> {{$AcademicReputation->Applicant_Id}}--}}
                    </div>

                    <tr>
                        <br>
                        <td>
                            {{--
                                                        <form action="{{ route('hamshs.forms.destroyHamshsciplan',$request_applying) }}" method="POST">
                            --}}
                           {{--
                            <a class="btn btn-info"
                               href="{{ route('hamshs.forms.showHamshAcademicReputation',$AcademicReputation) }}">طباعةأستمارة
                                التسجيل بالمواقع البحثية</a>
                            <a class="btn btn-primary"
                               href="{{ route('hamshs.AcademicReputation.forms.editHamsh',$AcademicReputation) }}">
                                الاطلاع استمارة التسجيل بالمواقع البحثية و الهوامش المتعقلة</a>
                           --}}
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            {{--
                                                        </form>
                            --}}
                        </td>
                    </tr>
                @endif

                @role('Applicant')

                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('createpositionsDegrees') }}">أضافة وظيفة</a>
                </div>
                {{--<div class="pull-right">
                    <a class="btn btn-success" href="{{ route('editpositionsDegrees') }}">تعديل وظيفة</a>
                </div>--}}
                {{--<form  method="POST">
                    <a class="btn btn-info"
                       href="{{ route('hamshs.forms.showHamshrequest_applying',$request_applying) }}">طباعةالهامش</a>

                    <a class="btn btn-primary"
                       href="{{ route('editpositionsDegrees',$PositionsHeldBy) }}">
                        الاطلاع استمارة التسجيل بالمواقع البحثية و الهوامش المتعقلة</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
--}}


                <a class="btn btn-primary" href="{{ route('editpositionsDegrees') }}">
                    تعديل قائمة الوظائف  </a>

                <a class="btn btn-info"
                   href="{{ route('showPositionsDegrees') }}">طباعةالهامش</a>


                @endrole

                <table class="center">
                    <thead>
                    <tr>
                        <th>عنوان الوظيفة:</th>
                        <th>  جهة العمل:</th>
                        <th>  تاريخ بداية العمل:</th>
                        <th>  تاريخ نهاية العمل:</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($PositionsHeldBy as $PositionHeldBy)
                        <tr>
                            <td>{{ $PositionHeldBy['workDescriptoin'] }}</td>
                            <td>{{ $PositionHeldBy['workplace'] }}</td>
                            <td>{{date('Y-m-d',trim(strtotime( $PositionHeldBy['sDate']))) }}</td>
                            <td>{{date('Y-m-d',trim(strtotime( $PositionHeldBy['edate']))) }}</td>

                        </tr>
                    @endforeach

                                    </tbody>
                </table>
@endsection
