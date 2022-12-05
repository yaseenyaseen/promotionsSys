@extends('blogs.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>متطلبات الترقية- الخطة البحثية من صفحة الاستمارات وليس الهامش القديم </h2>
                <br>
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

                    <br> {{$reqcoll->name}}<br><br></h4>

                    <br>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('sciplancreateform') }}"> أنشاء
                        أستمارة</a> {{--This button is show for admin only to add a new role or form--}}
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


                    {{--
                                    @role('admin')
                    --}}
                <br>

                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('createsciplanHamsh') }}"> أنشاء
                            هامش</a> {{--This button is show for admin only to add a new role or Hamash--}}
                    </div>
                {{--
                                @endrole
                --}}
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @foreach ($Hams as $Ham)
            @if($Ham->proreq_id == $reqsos->id)
                <tr>
                    <br>
                    <td>
                        <form action="{{ route('hamshs.forms.destroyHamshsciplan',$Ham) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('hamshs.forms.showHamsh',$Ham->id) }}">طباعة الهامش</a>
                                <a class="btn btn-primary" href="{{ route('hamshs.forms.editHamshsciplan',$Ham->id) }}"> تعديل الهامش edit</a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
    @endif
    @endforeach
@endsection
