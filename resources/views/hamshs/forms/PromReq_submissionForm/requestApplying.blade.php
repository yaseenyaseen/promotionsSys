@extends('blogs.layout')

@section('content')

    <div class="row" dir="rtl">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>متطلبات الترقية-استمارة تقديم الطلب للترقية العلمية </h2>
                <br>
                @if(is_null($request_applying))
                    <br>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('createRequestApplyingHamsh') }}"> أنشاء
                            هامش</a>
                    </div>
                @else
                    {{-- following code should be upated to make the roles catogories based on head name of the page only.--}}
                    @role('Applicant')

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="pull-right">
                        <a class="btn btn-success" href={{route('NewApplicationBoard')}}> صفحة الاستمارات المطلوبة</a>
                    </div>
                    <div>
                        The user name is: <br>
                        {{Auth::user()->name}} <br> <br>
                        <h6>معلومات عن استمارة تقديم الطلب للترقية العلمية <br></h6>
                        <h6> استمارة تقديم الطلب للترقية العلمية ID : <br></h6> {{$request_applying->id}}
                        <h6> استمارة تقديم الطلب للترقية العلمية لمقدم الطلب ID : <br></h6> {{$request_applying->Applicant_Id}}
                    </div>

                    <tr>
                        <br>
                        <td>
                            <form action="{{ route('hamshs.forms.destroyHamshsciplan',$request_applying) }}" method="POST">
                                <a class="btn btn-info"
                                   href="{{ route('hamshs.forms.showHamshrequest_applying',$request_applying) }}">طباعةالهامش</a>
                                <a class="btn btn-primary" href="{{ route('hamshs.PromReq_submissionForm.forms.editHamsh',$request_applying) }}">
                                    تعديل الهامش edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endrole
                @endif

                @role('HeadDepartment_Coll')
                <div class="pull-right">
                    <a class="btn btn-success"
                       href="{{ route('hamshs.forms.administrators.indexrequestApplying') }}">
                        {{--/* redirect()->route('sciplan',compact('reqsos', 'Forms','reqcolls'))
                        ->with('success','Blog created successfully.');*/
                        $promotion_reqsForHeadDepartment_Coll--}}

                        صفحة مسؤلين انجاز استمارة </a>
                </div>
                The user name is: <br>
                {{Auth::user()->name}} <br> <br>
                <h6>معلومات استمارة تقديم الطلب للترقية العلمية <br></h6>
                <h6> استمارة تقديم الطلب للترقية العلمية ID : <br></h6> {{$request_applying->id}}
                <h6> استمارة تقديم الطلب للترقية العلمية لمقدم الطلب ID : <br></h6> {{$request_applying->Applicant_Id}}

                <tr>
                    <br>
                    <td>
{{--
                        <form action="{{ route('hamshs.forms.destroyHamshsciplan',$SciPlan) }}" method="POST">
--}}

                            <a class="btn btn-info" href="{{ route('hamshs.forms.showHamshrequest_applying',$request_applying) }}">طباعة
                                الهامش</a>

                            <a class="btn btn-primary" href="{{ route('hamshs.PromReq_submissionForm.forms.editHamsh',$request_applying) }}">
                                تعديل الهامش edit</a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

                @endrole
             {{--   @role('Coll_ResearchPlan_Officer')
                <h3>مسؤول خطة بحثية كلية </h3>
                <br>
                <div class="pull-right">
                    <a class="btn btn-success"
                       href="{{ route('hamshs.forms.administrators.index') }}">
                        --}}{{----}}{{--/* redirect()->route('sciplan',compact('reqsos', 'Forms','reqcolls'))
                        ->with('success','Blog created successfully.');*/
                        $promotion_reqsForHeadDepartment_Coll
                        --}}{{----}}{{--
                        صفحة مسؤول خطة بحثية كلية الرئيسية</a>
                </div>
                The user name is: <br>
                {{Auth::user()->name}} <br> <br>
                <h6>معلومات الخطة البحثية <br></h6>
                <h6> الخطة البحثية ID : <br></h6> {{$SciPlan->id}}
                <h6> الخطة البحثية لمقدم الطلب ID : <br></h6> {{$SciPlan->Applicant_Id}}
                <tr>
                    <br>
                    <td>
                        <form action="{{ route('hamshs.forms.destroyHamshsciplan',$SciPlan) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('hamshs.forms.showHamsh',$SciPlan) }}">طباعة
                                الهامش</a>

                            <a class="btn btn-primary" href="{{ route('hamshs.forms.editHamshsciplan',$SciPlan) }}">
                                تعديل الهامش edit</a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endrole--}}

                <table>
                    <thead>
                    <tr>
                        <th>عنوان البحث</th>
                        <th>التاريخ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($papers as $paper)
                        <tr>
                            <td>{{ $paper['paper_title'] }}</td>
                            <td>{{ $paper['publish_date'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

@endsection
