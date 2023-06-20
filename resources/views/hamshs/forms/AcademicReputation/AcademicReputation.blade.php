@extends('blogs.layout')

@section('content')


    <h3 style="text-align: center; margin-top: 15px">متطلبات الترقية</h3>
    <h3 style="text-align: center; margin-top: 15px">استمارة التسجيل بالمواقع البحثية و الهوامش
        المتعقلة</h3>
    <br>
    <br>

    @if(is_null($AcademicReputation))
        @role('Applicant|admin')
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('createAcademicReputationHamsh') }}">
                البدء بترويج استمارة المواقع البحثية </a>
        </div>
        @endrole
    @else

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @role('Applicant|admin')
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('NewApplicationBoard')}}"> صفحة الاستمارات
                المطلوبة </a>
        </div>
        @endrole
        <div>
            <h6> استمارة السمعة الاكاديمية لمقدم الطلب : <br></h6> {{Auth::user()->name}}

         {{--   The user name is: <br>
            {{Auth::user()->name}} <br> <br>--}}
            <h6>معلومات عن استمارة السمعة الاكاديمية للترقية العلمية بالرقم <br></h6>
            {{$AcademicReputation->id}}
            <br>

            {{-- <h6> استمارة تقديم الطلب للترقية العلمية ID : <br></h6> {{$AcademicReputation->id}}
             <h6> استمارة السمعة الاكاديمية الطلب للترقية العلمية لمقدم الطلب ID : <br>
             </h6> {{$AcademicReputation->Applicant_Id}}--}}
        </div>
        <tr>
            <td>
                <a class="btn btn-info"
                   href="{{ route('hamshs.forms.showHamshAcademicReputation',$AcademicReputation) }}">طباعةأستمارة
                    التسجيل بالمواقع البحثية</a>
                <a class="btn btn-primary"
                   href="{{ route('hamshs.AcademicReputation.forms.editHamsh',$AcademicReputation) }}">
                    الاطلاع و تعديل استمارة التسجيل بالمواقع البحثية و الهوامش المتعقلة</a>
            </td>
        </tr>
       {{-- <br> <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">عنوان البحث</th>
                <th scope="col">التاريخ</th>

            </tr>
            </thead>
            <tbody>
            @foreach($papers as $paper)
                <tr>
                    <td>{{ $paper['paper_title'] }}</td>
                    <td>{{date('Y-m-d',strtotime( $paper['publish_date'])) }}</td>

                </tr>
            @endforeach
            </tbody>

        </table>
--}}
        <br><br> <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">(الرابط الشخصي)</th>
                <th scope="col">عنوان الموقع البحثي</th>

             {{--   <th>(الرابط الشخصي)</th>
                <th> عنوان الموقع البحثي</th>--}}
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
    @endif
<br>
    <br>
    <br>

@endsection
