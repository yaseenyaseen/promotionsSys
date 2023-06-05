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
                <br>
                <h5>مقدم الطلب </h5>

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

                        <h6> الخطة البحثية لمقدم الطلب : <br></h6> {{Auth::user()->name}}
                    </div>

                    <tr>
                        <br>
                        <td>
                            {{--<form action="{{ route('hamshs.forms.destroyHamshsciplan',$SciPlan) }}" method="POST">--}}
                            <a class="btn btn-info"
                               href="{{ route('hamshs.forms.showHamsh',$SciPlan) }}">طباعةالهامش</a>
                            <a class="btn btn-primary" href="{{ route('hamshs.forms.editHamshsciplan',$SciPlan) }}">
                                تعديل الهامش </a>
                            {{--@csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>--}}
                        </td>
                    </tr>
                @endif
                @endrole

                @if(!is_null($SciPlan))
                    @role('رئيس قسم الكلية|admin|معاون العميد للشؤون العلمية (كلية)|Coll_ResearchPlan_Officer|Presidency_Research_Plan_Officer|President_University_Assistant|presidency_Academic_Promotions_Affairs')
                    <br>
                    <br>
                    <strong>أهلا بالسيد:</strong><br>
                    <label class="form-check-label" for="flexSwitchCheckChecked">{{Auth::user()->roles->pluck('name')->first()}}</label>

                    <div class="pull-right">
                        <a class="btn btn-success"
                           href="{{ route('hamshs.forms.administrators.index') }}">
                            صفحة استمارات الخطط البحثية الرئيسية</a>
                    </div>
                    الأسم<br>
                    {{Auth::user()->name}} <br> <br>
                    <tr>
                        <br>
                        <td>
                            {{-- <form action="{{ route('hamshs.forms.destroyHamshsciplan',$SciPlan) }}" method="POST">--}}

                            <a class="btn btn-info" href="{{ route('hamshs.forms.showHamsh',$SciPlan) }}">طباعة
                                الهامش</a>

                            <a class="btn btn-primary" href="{{ route('hamshs.forms.editHamshsciplan',$SciPlan) }}">
                                اضافة أو تعديل الهامش</a>
                            {{--@csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>--}}
                        </td>
                    </tr>

                    {{--                @endforeach--}}
                    @endrole <br>
                    <br>
                @endif
                <br>
                <br> <table class="table table-dark">
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

@endsection
