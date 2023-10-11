@extends('blogs.layout')

@section('content')
@if($msg != null)

    {{$msg}}
@endif
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>متطلبات الترقية- تحميل مرفقات </h2>
             <label>
                 مباشرة بالكلية
             <br>
                 منح اخر لقب
                 <br>
                 دورة تأهيلية
                 <br>
                 دورة حاسوب
                 <br>
                 <form action="{{ route('postPatent') }}" method="POST" enctype="multipart/form-data">
                     @csrf

{{--
                 <form action="{{route('postPatent'}}" method="post">
--}}

                 نتائج الاستلال الالكتروني
                 <div id="insert" class="w3-container tab w3-animate-bottom ">
                    {{-- <label for="research">{{__('naming.patent_doc')}}</label>--}}
                     <div class="form-group row">
                         <div class="col col-sm-12 col-md-6  col-lg-6">
                             <input type="file" name="research" class="form-control" id="research">
                         </div>
                     </div>
                 </div>
                     <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                         <button type="submit" class="btn btn-primary">حفظ</button>
                     </div>
                 </form>


                 <br>
                 كتاب حلقة دراسية
                 <br>
                 بحوث
                 <br>
                 اطاريح
                 <br>

             </label>
            </div>
        </div>
    </div>

                {{--
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>

                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="from-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control"/>
                    </div>
                    <div class="from-group mb-3">
                        <label for="">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">--Select Gender--</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="from-group mb-3">
                        <button type="submit" name="save_select" class="btn btn-primary">Save Selectbox</button>
                    </div>
                    </form>

                </div>
                The user name is: <br>
                {{Auth::user()->name}} <br> <br>
                <h4> ID الترقية:
                    <br> {{$reqsos->id}}<br><br>
                    user id:
                    <br> {{$reqsos->user_id}}<br><br></h4>
                </h4>


                <br>

                <h4> اسم الكلية:
                    @foreach ($reqcolls as $reqcoll)
                        {{ $reqcoll->name }}
                    @endforeach

                    --}}{{--<br> {{$reqcoll->name}}<br><br></h4>--}}{{--

                    <br>

                    <h4>أستمارة- الخطة البحثية</h4>


                    <br>

                    <br>

                    @foreach ($Forms as $form)
                        @if($form->Pro_req_id == $reqsos->id)
                            --}}{{--access the last created promotion request--}}{{--
                            <tr>
                                <td>
                                    <form action="{{ route('hamshs.destroy',$form->id) }}" method="POST">
                                        <a class="btn btn-primary"
                                           href="{{ route('hamshs.forms.edit',$form->id) }}">تعديل الاستمارة</a>
                                        <br> <br>

                                        <a class="btn btn-info"
                                           href="{{ route('hamshs.forms.show',$form->id) }}">طباعة</a>

                                        @csrf
                                        @method('DELETE')

                                        --}}{{--
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                        --}}{{--
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach


                    --}}{{--
                                    @role('admin')
                    --}}{{--
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('hamshs.create') }}"> أنشاء
                            هامش</a> --}}{{--This button is show for admin only to add a new role or Hamash--}}{{--
                    </div>
                --}}{{--
                                @endrole
                --}}{{--
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        --}}{{--  <br>
          This is the starting code modification to show last  hamesh row of an applicant
          <br>

  --}}{{--
        --}}{{--// This loop to make sure of the reqos content after changing in controller.--}}{{--

        @foreach ($Hams as $Ham)
            @if($Ham->proreq_id == $reqsos->id)

                <tr>
                    <br>
                   --}}{{-- <td>{{ $Ham->title }}</td>
                    <td>{{ $Ham->description }}</td>--}}{{--
                    <td>
                        <form action="{{ route('hamshs.destroy',$Ham->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('hamshs.show',$Ham->id) }}">طباعة الهامش</a>

                            <a class="btn btn-primary" href="{{ route('hamshs.edit',$Ham->id) }}"> تعديل الهامش</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endif
--}}
@endsection
