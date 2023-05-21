@extends('blogs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>أضافة معلومات عن الاطاريح المتعلة بهذه الترقية</h2>
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
        <form action="{{ route('storethesis') }}" method="POST">
            @csrf
            <div class="row">

                @role('Applicant|admin')
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>عنوان الاطروحة:</strong>
                        <input type="text" name="title" class="form-control" placeholder="عنوان الاطروحة">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>اسم المؤلف :</strong>
                        <input type="text" name="autherName" class="form-control" placeholder="اسم المؤلف ">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>اسم المشرف:</strong>
                        <input type="text" name="supervisorName" class="form-control" placeholder="اسم المشرف">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>الشهادة (دبلوم/ماجستير/دكتوراة):</strong>
                        <input type="text" name="degree" class="form-control" placeholder="(دبلوم/ماجستير/دكتوراة)">
                    </div>
                </div>

                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    <label for="Ratio_paper_OldProm">
                        عدد البحوث المستلة من هذه الاطروحة:                    </label>
                    <input type="number" name="No_plagiarised_articles" id="No_plagiarised_articles" min="0">
                </div>
                @endrole

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>
            </div>
            </div>
        </form>

@endsection
