@extends('blogs.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>طباعة قائمة الهوامش-استمارة تقديم الطلب للترقية العلمية </h2>
            </div>
         {{--   <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
            </div>--}}
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>
                    نظراً لاستحقاقي الترقية العلمية الى مرتبة ( ) يرجى التفضل بالموافقة على ترويج معاملة ترقيتي وذلك
                    لاكمالي المدة القانونية اللازمة او قبل سنة من تاريخ استحقاق الترقية وفقا للفقرة (اولا – 1) من
                    القرار 315 لسنة 1988 ، علما ان بحوثي المقدمة للترقية العلمية هي :

                </label>
                <strong>مقدم الطلب :</strong>

                {{ $hamsh->Applicant_hamsh }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>هامش السيد رئيس القسم :</strong>
                {{ $hamsh->Sci_Dep_hamsh }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>هامش السيد عميد الكلية  :</strong>
                {{ $hamsh->Dean_hamsh }}
            </div>
        </div>

@endsection
