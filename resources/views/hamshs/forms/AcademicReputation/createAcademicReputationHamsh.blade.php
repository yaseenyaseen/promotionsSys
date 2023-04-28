@extends('blogs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>أضافة الهامش على استمارة السمعة الاكاديمية</h2>
                <h3>تكون الاضافة حسب الدور للمسؤول </h3>

            </div>
            <div class="pull-right">

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
    <form action="{{ route('storeAcademicReputationHamsh') }}" method="POST">
        @csrf
        <div class="row">

            @role('Applicant')
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>GoogleScholar_ID:</strong>
                    <input type="text" name="GoogleScholar_ID" class="form-control" placeholder="GoogleScholar_ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Publons_ID:</strong>
                    <input type="text" name="Publons_ID" class="form-control" placeholder="Publons_ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ResearchGate_ID:</strong>
                    <input type="text" name="ResearchGate_ID" class="form-control" placeholder="ResearchGate_ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ORCID_ID:</strong>
                    <input type="text" name="ORCID_ID" class="form-control" placeholder="ORCID_ID">
                </div>
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-12">
                <label for="No_ORCID">No_ORCID </label>
                <input type="number" name="No_ORCID" id="No_ORCID" min="0">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Researcher_ID:</strong>
                    <input type="text" name="Researcher_ID" class="form-control" placeholder="Researcher_ID">
                </div>
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-12">
                <label for="No_ORCID">No_Researcher </label>
                <input type="number" name="No_Researcher" id="No_Researcher" min="0">
            </div>

            <div class="form-row">
                <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                    <input type="checkbox" name="Applicant_page" class="form-check-input" value="1"
                        {{ old('Applicant_page') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Applicant_page">
                        هل صفحة التدريسي الالكترونية مفعلة؟
                    </label>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Applicant_hamsh:</strong>
                        <input type="text" name="Applicant_hamsh" class="form-control" placeholder="Applicant_hamsh">
                    </div>
                </div>

                @else
                    <div class="form-check col-sm-12 col-md-12 col-lg-12 ">
                        <strong> هامش مسؤول مركز الحاسبة :</strong><br>
                        <input type="text" name="computerCenter_hamsh"
                               value="{{ $hamsh->computerCenter_hamsh }}"
                               class="form-control"
                               placeholder="computerCenter_hamsh" readonly>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-12">

                        <input type="checkbox" onclick="return false;" name="Applicant_page" value="Applicant_page"
                            {{ $hamsh->IsAcademic_reputationsDone ? 'checked="checked"' : 'disabled' }}/>
                        <label class="form-check-label" for="Applicant_page">
                            هل أستمارة التسجيل في المواقع البحثية منجزة؟
                        </label>
                    </div>
                    @endrole

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
        </div>
        </div>
    </form>
@endsection
