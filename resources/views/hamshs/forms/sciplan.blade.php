@extends('blogs.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>متطلبات الترقية- تأييد الخطة البحثية </h2>
                <br>
                @if(is_null($SciPlan))
                    <br>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('createsciplanHamsh') }}"> أنشاء
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
                        <a class="btn btn-success" href="#"> صفحة الرئيسية</a>
                    </div>
                    <div>
                        The user name is: <br>
                        {{Auth::user()->name}} <br> <br>
                        <h6>معلومات الخطة البحثية <br></h6>
                        <h6> الخطة البحثية ID : <br></h6> {{$SciPlan->id}}
                        <h6> الخطة البحثية لمقدم الطلب ID : <br></h6> {{$SciPlan->Applicant_Id}}
                    </div>

                    <tr>
                        <br>
                        <td>
                            <form action="{{ route('hamshs.forms.destroyHamshsciplan',$SciPlan) }}" method="POST">
                                <a class="btn btn-info"
                                   href="{{ route('hamshs.forms.showHamsh',$SciPlan) }}">طباعةالهامش</a>
                                <a class="btn btn-primary" href="{{ route('hamshs.forms.editHamshsciplan',$SciPlan) }}">
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
{{--                       href="{{ route('hamshs.forms.administrators.SciPlanListForAdmins') }}">--}}
                            href="{{ route('hamshs.forms.sciplanlistindex') }}">
                        {{--/* redirect()->route('sciplan',compact('reqsos', 'Forms','reqcolls'))
                        ->with('success','Blog created successfully.');*/
                        $promotion_reqsForHeadDepartment_Coll
                        --}}
                        صفحة رئيس القسم الرئيسية</a>
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

                {{--                @endforeach--}}
                @endrole
                @role('Coll_ResearchPlan_Officer')
                <h3>مسؤول خطة بحثية كلية </h3>
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
                @endrole

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



    {{--    @foreach ($promotion_reqsForHeadDepartment_Coll as $req)
        أسم مقدم الترقية:
        {{$req->id}}


    @endforeach--}}
    {{--  <h4> ID الترقية:
          <br> {{$reqsos->id}}<br><br>--}}
    {{--  user id:
      <br> {{$reqsos->user_id}}<br><br></h4>
  </h4>
  <br>
--}}
    {{--
                    <h4> اسم الكلية:
    --}}
    {{-- @foreach ($reqcolls as $reqcoll)
         {{ $reqcoll->name }}
     @endforeach

     <br> {{$reqcoll->name}}<br><br></h4>--}}
    {{--<h4>
        Below button should be edited to another columns of another tables based on information type.
        basically, it should show information only which are prevously entered.
    </h4>
--}}

    {{--   <br>
       <div class="pull-right">
           <a class="btn btn-success" href="{{ route('sciplancreateform') }}"> أنشاء
               أستمارة</a> This button is show for admin only to add a new role or form
       </div>
       @foreach ($Forms as $form)
           @if($form->proreq_id == $reqsos->id)
               <tr>
                   <td>
                       <form action="{{ route('hamshs.forms.deleteFsci',$form->id) }}" method="POST">
                           <a class="btn btn-primary"
                              href="{{ route('hamshs.forms.editHsci',$form->id) }}">تعديل الاستمارة</a>
                           <br> <br>
                           <a class="btn btn-info"
                              href="{{ route('hamshs.forms.show',$form->id) }}">الاستمارة طباعة</a>
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger">Delete</button>
                       </form>
                   </td>
               </tr>
           @endif
       @endforeach
--}}

@endsection
