@extends('blogs.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>طباعة قائمة الهوامش لتأييد الخطة البحثية حسب تسلسل المرجعيات </h2>
                <br>
                <br>
            </div>
            {{-- <div class="pull-right">
                 <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
             </div>--}}
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>مقدم الطلب :</strong>
                {{ $hamsh->Applicant_hamsh }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>هامش رئيس القسم :</strong>
                {{ $hamsh->Sci_Dep_hamsh }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>هامش مسؤول خطة بحثية كلية :</strong>
                {{ $hamsh->official_hamsh }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>شؤون علمية كلية:</strong>
                {{ $hamsh->Sci_plan_Coll_Sci_Affairs }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>معاون عميد كلية :</strong>
                {{ $hamsh->Sci_plan_Coll_Dean_Assis }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>مسؤول خطة بحثية رئاسة :</strong>
                {{ $hamsh->Sci_plan_presidency_office }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>مساعد رئيس الجامعة الشؤون العلمية :</strong>
                {{ $hamsh->Sci_plan_Sci_Affairs_President_University_Assistant }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>المركزية :</strong>
                {{ $hamsh->Sci_plan_presidency_Academic_Promotions_Affairs }}
            </div>
        </div>

@endsection
