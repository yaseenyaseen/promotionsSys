@extends('blogs.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>طباعة قائمة الهوامش-و معلومات استمارة السمعة الاكاديمية </h2>
            </div>
            {{--   <div class="pull-right">
                   <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
               </div>--}}
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label> استمارة التسجيل في المواقع البحثية
                </label>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong> GoogleScholar_ID :</strong><br>
                    {{ $hamsh->GoogleScholar_ID }}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>Publons_ID:</strong><br>
                    {{ $hamsh->Publons_ID }}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>ResearchGate_ID:</strong><br>
                    {{ $hamsh->ResearchGate_ID }}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>ORCID_ID:</strong><br>
                    {{ $hamsh->ORCID_ID }}
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-12">
                    <label for="No_ORCID">No_ORCID </label><br>
                    {{ $hamsh->No_ORCID }}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>Researcher_ID:</strong><br>
                    {{ $hamsh->No_ORCID }}
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-12">
                    <label for="No_ORCID">No_Researcher </label><br>
                    {{ $hamsh->No_Researcher }}
                </div>
                <div class="form-check col-sm-12 col-md-12 col-lg-12 ">
                    <input type="checkbox" onclick="return false;" name="Applicant_page" value="Applicant_page"
                        {{ $hamsh->Applicant_page ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Applicant_page">
                        هل صفحة التدريسي الالكترونية مفعلة؟
                    </label>
                </div>
                <div class="form-check col-sm-12 col-md-12 col-lg-12 ">
                    <strong>هامش مقدم الطلب :</strong><br>
                    {{ $hamsh->Applicant_hamsh }}
                </div>
                <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                    <input type="checkbox" onclick="return false;" name="Applicant_page" value="Applicant_page"
                        {{ $hamsh->IsAcademic_reputationsDone ? 'checked="checked"' : '' }} />
                    <br> <label class="form-check-label" for="Applicant_page">
                        هل أستمارة التسجيل في المواقع البحثية منجزة؟
                    </label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong> هامش مسؤول مركز الحاسبة :</strong><br>
                    {{ $hamsh->computerCenter_hamsh }}
                </div>

@endsection
