@extends('blogs.layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check your input code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>أضافة الهامش على محضر اللجنة العلمية للترقية العلمية</h2>
            {{--
                        <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
        --}}
            <br>
            <br>

            <label>
{{$user_id
}}            </label>

            <form action="{{ route('storeScientific_Committee_minutes') }}" method="POST">
                @csrf

                <input id="user_id" name="user_id" type="hidden" value="{{$user_id}}">

                @role('admin')

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>هامش السيد مقدم الطلب:</strong>
                        <input type="text" name="headCommitee_hamsh" class="form-control"
                               placeholder="هامش السيد مقدم الطلب">
                    </div>
                </div>
                @endrole
{{--
                    @role('HeadDepartment_Coll|admin')
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> هامش السيد رئيس القسم :</strong><br>
                                <input type="text" name="Sci_Dep_hamsh"
                                       class="form-control"
                                       placeholder="هامش السيد رئيس القسم">
                            </div>
                        </div>
                        @endrole

                        @role('Dean|admin')

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>هامش السيد العميد:</strong>
                                <input type="text" name="Dean_hamsh" class="form-control" placeholder="هامش السيد العميد">
                            </div>
                        </div>
                        @endrole

--}}

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>


    <br>
    <br>
    <br>

@endsection
