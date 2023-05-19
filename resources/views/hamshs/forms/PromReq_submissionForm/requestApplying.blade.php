@extends('blogs.layout')

@section('content')

    <div class="row" dir="rtl">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>متطلبات الترقية-استمارة تقديم الطلب للترقية العلمية </h2>
                <br>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @role('Applicant|admin')
                @if(is_null($request_applying))
                    <br>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('createRequestApplyingHamsh') }}">

                            البدء بترويج استمارة تقديم الطلب

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
                        <td>
                            {{--<form action="{{ route('hamshs.forms.destroyHamshsciplan',$request_applying) }}" method="POST">--}}
                                <a class="btn btn-info"
                                   href="{{ route('hamshs.forms.showHamshrequest_applying',$request_applying) }}">طباعةالهامش</a>
                                <a class="btn btn-primary" href="{{ route('hamshs.PromReq_submissionForm.forms.editHamsh',$request_applying) }}">
                                    تعديل الهامش </a>
                                {{--@csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>--}}
                        </td>
                    </tr>
                    @endrole
                @endif
                @if(!is_null($request_applying))
                    @role('HeadDepartment_Coll|admin')
                    <h5>رئيس قسم كلية</h5>

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
                            {{--
                                                    <form action="{{ route('hamshs.forms.destroyHamshsciplan',$SciPlan) }}" method="POST">
                            --}}

                            <a class="btn btn-info" href="{{ route('hamshs.forms.showHamshrequest_applying',$request_applying) }}">طباعة
                                الهامش</a>

                            <a class="btn btn-primary" href="{{ route('hamshs.PromReq_submissionForm.forms.editHamsh',$request_applying) }}">
                                تعديل الهامش </a>
                            {{--  @csrf
                              @method('DELETE')

                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>--}}
                        </td>
                    </tr>

                    @endrole
                    @role('Dean|admin')
                    <h5>العميد</h5>
                    @endrole
                @endif


<br>
                <br>

                <label>
                    نظراً لاستحقاقي الترقية العلمية الى مرتبة ( ) يرجى التفضل بالموافقة على ترويج معاملة ترقيتي وذلك
                    لاكمالي المدة القانونية اللازمة او قبل سنة من تاريخ استحقاق الترقية وفقا للفقرة (اولا – 1) من
                    القرار 315 لسنة 1988 ، علما ان بحوثي المقدمة للترقية العلمية هي :

                </label>


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
                            <td>{{date('Y-m-d',strtotime( $paper['publish_date'])) }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
<br>
    <br>
    <br>

@endsection
