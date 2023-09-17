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
    {{--
                    @role('admin') add head department role
                    <br>
                    <h5>رئيس اللجنة العلمية </h5>


                @if(is_null($ScientificCommittee))
                        <br>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('createScientific_Committee') }}">

                                البدء بترويج محضر اللجنة العلمية

                            </a>
                        </div>
                    @else



                        <div class="pull-right">
                            <a class="btn btn-success" href={{route('NewApplicationBoard')}}> صفحة الاستمارات المطلوبة</a>
                        </div>
                        <div>
                            <h6> استمارة تقديم الطلب لمقدم الطلب بالاسم : <br></h6>  {{Auth::user()->name}}


                            <h6> استمارة تقديم الطلب للترقية العلمية والمرقمه ID : <br></h6> {{$request_applying->id}}
                        </div>

                        <tr>
                            <br>
                            <br>
                            <td>
                                    <a class="btn btn-info"
                                       href="{{ route('hamshs.forms.showHamshrequest_applying',$request_applying) }}">طباعةالهامش</a>
                                    <a class="btn btn-primary" href="{{ route('hamshs.PromReq_submissionForm.forms.editHamsh',$request_applying) }}">
                                        اضافة أو تعديل الهامش </a>

                            </td>
                        </tr>
                        @endrole
                    @endif
                    @if(!is_null($request_applying))
                        <br>
                    <br>
                        @role('HeadDepartment_Coll|admin')
                        <h5>رئيس قسم كلية</h5>
    <br>
                        <div class="pull-right">
                            <a class="btn btn-success"
                               href="{{ route('hamshs.forms.administrators.indexrequestApplying') }}">

                                صفحة مسؤلين انجاز استمارة </a>
                        </div>
                        اسم رئيس القسم <br>
                        {{Auth::user()->name}} <br> <br>
                        <h6> استمارة تقديم الطلب للترقية العلمية والمرقمه ID : <br></h6> {{$request_applying->id}}


                        <tr>
                            <br>
                            <td>
                                <a class="btn btn-info" href="{{ route('hamshs.forms.showHamshrequest_applying',$request_applying) }}">طباعة
                                    الهامش</a>

                                <a class="btn btn-primary" href="{{ route('hamshs.PromReq_submissionForm.forms.editHamsh',$request_applying) }}">
                                    اضافة أو تعديل الهامش </a>
                            </td>
                        </tr>

                        @endrole
                        @role('Dean|admin')
                    <br>
                    <br>
                        <h5>العميد</h5>
                    <br>
                        @endrole
                    @endif
    <br>
                    <br>
                    <label>
                        نظراً لاستحقاقي الترقية العلمية الى مرتبة ( ) يرجى التفضل بالموافقة على ترويج معاملة ترقيتي وذلك
                        لاكمالي المدة القانونية اللازمة او قبل سنة من تاريخ استحقاق الترقية وفقا للفقرة (اولا – 1) من
                        القرار 315 لسنة 1988 ، علما ان بحوثي المقدمة للترقية العلمية هي :

                    </label>
                    <table class="table table-dark">
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
    <br>
        <br>
        <br>
    --}}

@endsection
