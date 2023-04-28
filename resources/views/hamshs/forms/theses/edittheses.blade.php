@extends('blogs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>تعديل معلومات عن الاطاريح المتعلة بهذه الترقية</h2>
            </div>
            {{-- <div class="pull-right">
                 <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
             </div>--}}
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('editthesis') }}" method="POST">
        @csrf
        <label for="select_option">أختار شهادة سابقة للتعديل:</label>
        <select name="select_thoption" id="select_thoption">
            <option value="---">---</option>
            @foreach($theses as $thesis)
                <option value="{{$thesis->id}}">{{ $thesis->title }}</option>
            @endforeach
        </select>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">أختيار للتعديل</button>
        </div>
    </form>
    @if($selectthsis!=null) // this is required bcs calling above list need to show before staring below code.

    <form action="{{ route('updatethesis') }}" method="POST">
        <h3>تعديل على شهادة سابقة</h3>
        @csrf
        <input type="hidden" name="selectedThesisId" value="{{ $selectthsis->id }}">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>عنوان الاطروحة:</strong>
                <input type="textarea" class="form-control" name="title"
                       value="{{ $selectthsis->title}}"></inputtextarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>اسم المؤلف :</strong>
                <input type="textarea" class="form-control" name="autherName"
                       value="{{ $selectthsis->autherName}}"></inputtextarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>اسم المشرف:</strong>
                <input type="textarea" class="form-control" name="supervisorName"
                       value="{{ $selectthsis->supervisorName}}"></inputtextarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>الشهادة (دبلوم/ماجستير/دكتوراة):</strong>
                <input type="textarea" class="form-control" name="degree"
                       value="{{ $selectthsis->degree}}"></inputtextarea>
            </div>
        </div>

        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label for="No_plagiarised_articles">
                عدد البحوث المستلة من هذه الاطروحة: </label>
            <input type="number" name="No_plagiarised_articles" id="No_plagiarised_articles"
                   value="{{ $selectthsis->No_plagiarised_articles}}"
                   min="0">
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary"> تعديل و حفظ</button>
        </div>
    </form>
    @endif
@endsection


