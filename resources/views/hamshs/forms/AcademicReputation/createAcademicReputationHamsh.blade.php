@extends('blogs.layout')

@section('content')
    <div style="text-align: center; margin-top: 15px">
        <h3>استمارة السمعة الاكاديمية</h3>
        <h6>تكون الاضافة حسب الدور للمسؤول </h6>
    </div>
<br>
    <br>

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
    <form action="{{ route('storeAcademicReputationHamsh') }}" method="POST">
        @csrf
        <div class="row">
            @role('Applicant|admin')
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                <div class="form-group">
                    <label for="ResearchGate_ID">GoogleScholar_ID:</label>
                    <input id="ResearchGate_ID" type="text" name="GoogleScholar_ID" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                <div class="form-group">
                    <label for="ResearchGate_ID">Publons_ID:</label>
                    <input id="ResearchGate_ID" type="text" name="Publons_ID" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                <div class="form-group">
                    <label for="ResearchGate_ID">ResearchGate_ID:</label>
                    <input id="ResearchGate_ID" type="text" name="ResearchGate_ID" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                <div class="form-group">
                    <label for="ORCID_ID">ORCID_ID:</label>
                    <input id="ORCID_ID" type="text" name="ORCID_ID" class="form-control">
                </div>
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-6 py-2">
                <label for="No_ORCID">No_ORCID </label>
                <input class="form-control" type="number" name="No_ORCID" id="No_ORCID" min="0">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                <div class="form-group">
                    <label id="Researcher_ID">Researcher_ID:</label>
                    <input id="Researcher_ID" type="text" name="Researcher_ID" class="form-control">
                </div>
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-6 py-2">
                <label for="No_Researcher">No_Researcher </label>
                <input class="form-control" type="number" name="No_Researcher" id="No_Researcher" min="0">
            </div>
            <div class="form-row">
                <div class="form-check col-sm-12 col-md-6 col-lg-4 py-2">
                    <input id="Applicant_page" type="checkbox" name="Applicant_page" class="form-check-input" value="1"
                        {{ old('Applicant_page') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Applicant_page" style="margin-right: 15px">هل صفحة التدريسي الالكترونية مفعلة؟</label>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                    <div class="form-group">
                        <label for="Applicant_hamsh">هامش مقدم الطلب</label>
                        <input id="Applicant_hamsh" type="text" name="Applicant_hamsh" class="form-control">
                    </div>
                </div>
       {{--         <div class="form-check col-sm-12 col-md-12 col-lg-12  py-2">
                    <label for="computerCenter_hamsh"> هامش مسؤول مركز الحاسبة </label><br>
                    <input id="computerCenter_hamsh" type="text" name="computerCenter_hamsh"
--}}{{--                           value="{{ $hamsh->computerCenter_hamsh }}"--}}{{--
                           class="form-control" readonly>
                </div>

                <div class="form-check col-sm-12 col-md-6 col-lg-4 py-2">
                    <input type="checkbox" onclick="return false;" name="Applicant_page" class="form-check-input">
--}}{{--                        {{ $hamsh->IsAcademic_reputationsDone ? 'checked="checked"' : 'disabled' }}/>--}}{{--
                    <label class="form-check-label" for="Applicant_page">
                        هل أستمارة التسجيل في المواقع البحثية منجزة؟
                    </label>
                </div>--}}
                <br>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </div>
            @endrole
        </div>
    </form>

    <br>
    <br>
    <br>
    <br>
    <br>

@endsection
