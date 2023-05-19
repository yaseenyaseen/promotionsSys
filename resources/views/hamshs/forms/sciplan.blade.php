@extends('blogs.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>متطلبات الترقية- تأييد الخطة البحثية </h2>
                <br>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @role('Applicant|admin')
                @if(is_null($SciPlan))

                    <br>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('createsciplanHamsh') }}">
                            البدء بترويج الخطة البحثية

                        </a>
                    </div>
                @else
                    {{-- following code should be upated to make the roles catogories based on head name of the page only.--}}




                    <div class="pull-right">
                        <a class="btn btn-success" href="{{route('NewApplicationBoard')}}"> صفحة الاستمارات
                            المطلوبة </a>
                    </div>
                    <div>

                        <h6>معلومات الخطة البحثية <br></h6>
                        <h6> الخطة البحثية المرقمه ID : <br></h6> {{$SciPlan->id}}

                        <h6> الخطة البحثية لمقدم الطلب  : <br></h6>  {{Auth::user()->name}}
                    </div>

                    <tr>
                        <br>
                        <td>
                            {{--<form action="{{ route('hamshs.forms.destroyHamshsciplan',$SciPlan) }}" method="POST">--}}
                            <a class="btn btn-info"
                               href="{{ route('hamshs.forms.showHamsh',$SciPlan) }}">طباعةالهامش</a>
                            <a class="btn btn-primary" href="{{ route('hamshs.forms.editHamshsciplan',$SciPlan) }}">
                                تعديل الهامش edit</a>
                            {{--@csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>--}}
                        </td>
                    </tr>
                @endif
                @endrole

                @if(!is_null($SciPlan))
                    @role('HeadDepartment_Coll|admin')
                <h5>رئيس قسم كلية</h5>
                    <div class="pull-right">
                        <a class="btn btn-success"
                           {{--                       href="{{ route('hamshs.forms.administrators.SciPlanListForAdmins') }}">--}}
                           href="{{ route('hamshs.forms.sciplanlistindex') }}">
                            {{--/* redirect()->route('sciplan',compact('reqsos', 'Forms','reqcolls'))
                            ->with('success','Blog created successfully.');*/
                            $promotion_reqsForHeadDepartment_Coll
                            --}}
                            صفحة رئيس القسم الرئيسية</a>
                    </div>
                    اسم رئيس القسم <br>
                    {{Auth::user()->name}} <br> <br>
                    <tr>
                        <br>
                        <td>
                            {{-- <form action="{{ route('hamshs.forms.destroyHamshsciplan',$SciPlan) }}" method="POST">--}}

                            <a class="btn btn-info" href="{{ route('hamshs.forms.showHamsh',$SciPlan) }}">طباعة
                                الهامش</a>

                            <a class="btn btn-primary" href="{{ route('hamshs.forms.editHamshsciplan',$SciPlan) }}">
                                تعديل الهامش edit</a>
                            {{--@csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>--}}
                        </td>
                    </tr>

                    {{--                @endforeach--}}
                    @endrole
                    @role('Coll_ResearchPlan_Officer|admin')
                    <h5>مسؤول خطة بحثية كلية </h5>
                    <br>
                    <div class="pull-right">
                        <a class="btn btn-success"
                           href="{{ route('hamshs.forms.administrators.index') }}">
                            {{--/* redirect()->route('sciplan',compact('reqsos', 'Forms','reqcolls'))
                            ->with('success','Blog created successfully.');*/
                            $promotion_reqsForHeadDepartment_Coll
                            --}}
                            صفحة مسؤول خطة بحثية كلية الرئيسية</a>
                    </div>
                     اسم مسؤول خطة بحثية كلية: <br>
                    {{Auth::user()->name}} <br> <br>

                    <tr>
                        <br>
                        <td>

                            <a class="btn btn-info" href="{{ route('hamshs.forms.showHamsh',$SciPlan) }}">طباعة
                                الهامش</a>

                            <a class="btn btn-primary" href="{{ route('hamshs.forms.editHamshsciplan',$SciPlan) }}">
                                تعديل الهامش edit</a>

                        </td>
                    </tr>
                    @endrole
                @endif



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
    <br>
    <br>
    <br>


@endsection
