@extends('blogs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>تعديل معلومات-استمارة معلومات الوظائف التي مارسها و الشهادة مقدم الترقية</h2>
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
    @if(!$isDegree)
        <form action="{{ route('editsinglePositionsDegrees') }}" method="POST">
            @csrf
            <label for="select_option">أختار وظيفة سابقة للتعديل:</label>
            <select name="selected_option" id="select_option">
                <option value="---">---</option>
                @foreach($PositionsHeldBy as $PositionHeldBy)
                    <option value="{{$PositionHeldBy->id}}">{{ $PositionHeldBy->workplace }}</option>
                @endforeach
            </select>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">أختيار للتعديل</button>
            </div>
        </form>

        @if($selectedposition!=null)
            <form action="{{ route('updatePositionsDegrees') }}" method="POST">
                <h3>تعديل على وظيفة سابق</h3>
                @csrf
                <input type="hidden" name="option_id" value="{{ $selectedposition->id }}">
                <input type="hidden" name="isDegree" value="{{ $isDegree }}">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="workDescriptoin">عنوان الوظيفة:</label><br>
                        <input type="textarea" class="form-control" name="workDescriptoin"
                               value="{{ $selectedposition->workDescriptoin}}"></inputtextarea>

                    </div>
                </div>

                <div class=" form-group col-sm-12 col-md-12 col-lg-12">
                    <label for="workplace">جهة العمل:</label><br>
                    <input type="textarea" class="form-control" name="workplace"
                           value="{{ $selectedposition->workplace}}"></inputtextarea>

                </div>
                <div class=" form-group col-sm-12 col-md-6 col-lg-4">
                    <label for="sDate">تاريخ بداية العمل</label><br>
                    <input type="date" id="sDate" name="sDate"
                           value="{{date('Y-m-d',trim(strtotime($selectedposition->sDate)))}}">
                </div>
                <div class=" form-group col-sm-12 col-md-6 col-lg-4">
                    <label for="edate">تاريخ نهاية العمل</label><br>
                    <input type="date" id="edate" name="edate"
                           value="{{date('Y-m-d',trim(strtotime($selectedposition->edate)))}}">

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"> تعديل و حفظ</button>
                </div>
            </form>

        @endif
    @endif



    @if($isDegree)
        <form action="{{ route('editsinglePositionsDegrees2') }}" method="POST">
            @csrf
            <label for="select_option">أختار شهادة سابقة للتعديل:</label>
            <select name="selected_option2" id="select_option2">
                <option value="---">---</option>
                {{$Degrees}}
                @foreach($Degrees as $oneDegree)
                    <option value="{{$oneDegree->id}}">{{ $oneDegree->degree }}</option>
                @endforeach
            </select>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">أختيار للتعديل</button>
            </div>
        </form>
        @if($selecteddegree!=null)
            <form action="{{ route('updatePositionsDegrees') }}" method="POST">
                <h3>تعديل على شهادة سابقة</h3>
                @csrf
                <input type="hidden" name="option_id2" value="{{ $selecteddegree->id }}">
                <input type="hidden" name="isDegree" value="{{ $isDegree }}">



                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="degree">الشهادة</label><br>
                        <input type="textarea" class="form-control" name="degree"
                               value="{{ $selecteddegree->degree}}"></inputtextarea>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="university">الجامعة</label><br>
                        <input type="textarea" class="form-control" name="university"
                               value="{{ $selecteddegree->university}}"></inputtextarea>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="country">البلد المانح</label><br>
                        <input type="textarea" class="form-control" name="country"
                               value="{{ $selecteddegree->country}}"></inputtextarea>

                    </div>
                </div>


                <div class=" form-group col-sm-12 col-md-6 col-lg-4">
                    <label for="acomplishDate">التأريخ</label><br>
                    <input type="date" id="acomplishDate" name="acomplishDate"
                           value="{{date('Y-m-d',trim(strtotime($selecteddegree->acomplishDate)))}}">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"> تعديل و حفظ</button>
                </div>
            </form>

        @endif

    @endif

    {{--
        <form action="{{ route('updateHamshAcademicReputation',$hamsh->id) }}" method="POST">
            @method('PUT')
            @csrf
            @role('Applicant')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">

                        <strong> GoogleScholar_ID :</strong><br>
                        <input type="text" name="GoogleScholar_ID" value="{{ $hamsh->GoogleScholar_ID }}"
                               class="form-control"
                               placeholder="GoogleScholar_ID">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Publons_ID:</strong>
                        <input type="text" name="Publons_ID" value="{{ $hamsh->Publons_ID }}" class="form-control"
                               placeholder="Publons_ID">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>ResearchGate_ID:</strong>
                        <input type="text" name="ResearchGate_ID" value="{{ $hamsh->ResearchGate_ID }}" class="form-control"
                               placeholder="ResearchGate_ID">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>ORCID_ID:</strong>
                        <input type="text" name="ORCID_ID" value="{{ $hamsh->ORCID_ID }}" class="form-control"
                               placeholder="ORCID_ID">
                    </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-12">
                    <label for="No_ORCID">No_ORCID </label>
                    <input type="number" name="No_ORCID" value="{{ $hamsh->No_ORCID }}" id="No_ORCID" min="0">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Researcher_ID:</strong>
                        <input type="text" name="Researcher_ID" value="{{ $hamsh->No_ORCID }}" class="form-control"
                               placeholder="Researcher_ID">
                    </div>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-12">
                    <label for="No_ORCID">No_Researcher </label>
                    <input type="number" name="No_Researcher" value="{{ $hamsh->No_Researcher }}" id="No_Researcher"
                           min="0">
                </div>


                <div class="form-row">
                    <div class="form-check col-sm-12 col-md-12 col-lg-12 ">
                        <input type="checkbox" name="Applicant_page" value="Applicant_page"
                            {{ $hamsh->Applicant_page ? 'checked="checked"' : '' }}/>
                        <label class="form-check-label" for="Applicant_page">
                            هل صفحة التدريسي الالكترونية مفعلة؟
                        </label>
                    </div>
                    <div class="form-row">
                        <div class="form-check col-sm-12 col-md-12 col-lg-12 ">
                            <strong>مقدم الطلب :</strong><br>
                            <input type="text" name="Applicant_hamsh" value="{{ $hamsh->Applicant_hamsh }}"
                                   class="form-control"
                                   placeholder="Applicant_hamsh">
                        </div>
                    </div>
                    @else
                        <div class="form-check col-sm-12 col-md-12 col-lg-12 ">
                            <strong> GoogleScholar_ID :</strong><br>
                            <input type="text" name="GoogleScholar_ID" value="{{ $hamsh->GoogleScholar_ID }}"
                                   class="form-control"
                                   placeholder="GoogleScholar_ID" readonly>
                        </div>
                        <div class="form-check col-sm-12 col-md-12 col-lg-12 ">
                            <strong>Publons_ID:</strong>
                            <input type="text" name="Publons_ID" value="{{ $hamsh->Publons_ID }}" class="form-control"
                                   placeholder="Publons_ID" readonly>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>ResearchGate_ID:</strong>
                            <input type="text" name="ResearchGate_ID" value="{{ $hamsh->ResearchGate_ID }}"
                                   class="form-control"
                                   placeholder="ResearchGate_ID" readonly>
                        </div>
                        <div class="form-check col-sm-12 col-md-12 col-lg-12 ">
                            <strong>ORCID_ID:</strong>
                            <input type="text" name="ORCID_ID" value="{{ $hamsh->ORCID_ID }}" class="form-control"
                                   placeholder="ORCID_ID" readonly>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-12">
                            <label for="No_ORCID">No_ORCID </label>
                            <input type="number" name="No_ORCID" value="{{ $hamsh->No_ORCID }}" id="No_ORCID" min="0"
                                   readonly>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <strong>Researcher_ID:</strong>
                            <input type="text" name="Researcher_ID" value="{{ $hamsh->No_ORCID }}" class="form-control"
                                   placeholder="Researcher_ID" readonly>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-12">
                            <label for="No_ORCID">No_Researcher </label>
                            <input type="number" name="No_Researcher" value="{{ $hamsh->No_Researcher }}" id="No_Researcher"
                                   min="0" readonly>
                        </div>
                        <div class="form-check col-sm-12 col-md-12 col-lg-12 ">
                            <input type="checkbox" onclick="return false;" name="Applicant_page" value="Applicant_page"
                                {{ $hamsh->Applicant_page ? 'checked="checked"' : '' }}/>
                            <label class="form-check-label" for="Applicant_page">
                                هل صفحة التدريسي الالكترونية مفعلة؟
                            </label>
                        </div>
                        <div class="form-check col-sm-12 col-md-12 col-lg-12 ">
                            <strong>مقدم الطلب :</strong>
                            <input type="text" name="Sci_plan_Applicant" value="{{ $hamsh->Applicant_hamsh }}"
                                   class="form-control" placeholder="Title" readonly>
                        </div>
                        @endrole
                        @role('Computer_Center_Officer')
                        <div class="form-check col-sm-12 col-md-12 col-lg-12 ">
                            <strong> هامش مسؤول مركز الحاسبة :</strong><br>
                            <input type="text" name="computerCenter_hamsh"
                                   value="{{ $hamsh->computerCenter_hamsh }}"
                                   class="form-control"
                                   placeholder="computerCenter_hamsh">
                        </div>
                        <div class="form-check col-sm-12 col-md-12 col-lg-12 ">
                            <input type="checkbox" name="IsAcademic_reputationsDone"
                                   value="IsAcademic_reputationsDone"
                                {{ $hamsh->IsAcademic_reputationsDone ? 'checked="checked"' : '' }} />
                            <label class="form-check-label" for="Applicant_page">
                                هل أستمارة التسجيل في المواقع البحثية منجزة؟
                            </label>
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
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>

        </form>

        --}}
@endsection


