@extends('blogs.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>متطلبات الترقية-استمارة ملخص معاملة الترقية </h2>
                <br>
                <br>
                @if(is_null($ProApplicationSummary))
                    @role('Applicant')

                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('createProApplicationSummary') }}"> أنشاء
                            هامش</a>
                    </div>
                    @endrole
                @else


                    following code should be upated to make the roles catogories based on head name of the page only.


                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    @role('Applicant')

                    <div class="pull-right">
                        <a class="btn btn-success" href="{{route('NewApplicationBoard')}}"> صفحة الاستمارات
                            المطلوبة </a>
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
                    {{--
                     <td>

                            <a class="btn btn-info"
                               href="{{ route('hamshs.forms.showHamshAcademicReputation',$AcademicReputation) }}">طباعةأستمارة
                                التسجيل بالمواقع البحثية</a>
                            <a class="btn btn-primary"
                               href="{{ route('hamshs.AcademicReputation.forms.editHamsh',$AcademicReputation) }}">
                                الاطلاع و تعديل استمارة التسجيل بالمواقع البحثية و الهوامش المتعقلة</a>

                        </td>
                    </tr>

                    <table class="center">
                        <thead>
                        <tr>
                            <th>(الرابط الشخصي)</th>
                            <th> عنوان الموقع البحثي</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>{{ $AcademicReputation['GoogleScholar_ID'] }}</td>

                            <td>GoogleScholar</td>
                        </tr>
                        <tr>
                            <td>{{ $AcademicReputation['Publons_ID'] }}</td>

                            <td>Publons</td>
                        </tr>
                        <tr>
                            <td>{{ $AcademicReputation['ResearchGate_ID'] }}</td>
                            <td>ResearchGate</td>
                        </tr>
                        <tr>
                            <td>{{ $AcademicReputation['ORCID_ID'] }}</td>
                            <td>ORCID</td>
                        </tr>
                        <tr>
                            <td>{{ $AcademicReputation['No_ORCID'] }}</td>
                            <td>No_ORCID</td>
                        </tr>
                        <tr>
                            <td>{{ $AcademicReputation['Researcher_ID'] }}</td>
                            <td>Researcher_ID</td>
                        </tr>

                        <tr>
                            <td>{{ $AcademicReputation['No_Researcher'] }}</td>
                            <td>No_Researcher</td>
                        </tr>
                        </tbody>
                    </table>
                    --}}
    @endif

@endsection
