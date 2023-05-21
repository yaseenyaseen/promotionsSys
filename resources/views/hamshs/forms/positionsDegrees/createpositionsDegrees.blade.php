@extends('blogs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>أضافة بيانات على استمارة معلومات الوظائف التي مارسها و الشهادة لمقدم الترقية</h2>
            </div>
            <br>
            <br>
            <div class="pull-right">
                {{--
                                <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
                --}}
            </div>
        </div>
    </div>

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
    @if(!$flag)
        <form action="{{ route('storepositionsDegrees') }}" method="POST">
            @csrf
            <div class="row">

                @role('Applicant|admin')


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>عنوان الوظيفة:</strong>
                        <input type="text" name="workDescriptoin" class="form-control" placeholder="عنوان الوظيفة">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>جهة العمل:</strong>
                        <input type="text" name="workplace" class="form-control" placeholder="جهة العمل">
                    </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-4">
                    <label for="sDate">تاريخ بداية العمل</label><br>
                    <input type="date" id="sDate" name="sDate">
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-4">
                    <label for="edate">تاريخ نهاية العمل</label><br>
                    <input type="date" id="edate" name="edate">
                </div>
            </div>

            @endrole

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
            </div>
            </div>
            </div>
        </form>
    @else

        <form action="{{ route('storepositionsDegrees2') }}" method="POST">
            @csrf
            <div class="row">

                @role('Applicant|admin')
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>الشهادة:</strong>
                        <input type="text" name="degree" class="form-control" placeholder="الشهادة">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>الجامعة :</strong>
                        <input type="text" name="university" class="form-control" placeholder="الجامعة ">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>البلد المانح:</strong>
                        <input type="text" name="country" class="form-control" placeholder="البلد المانح">
                    </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-4">
                    <label for="acomplishDate">التأريخ</label><br>
                    <input type="date" id="acomplishDate" name="acomplishDate">
                </div>

                @endrole

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>
            </div>
            </div>
        </form>

    @endif
@endsection
