
@extends('blogs.layout')

@section('content')
    <style>
        .form-check-label {
            margin-right: 20px
        }
    </style>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div>
                    <h2>أضافة بيانات لمقدم الترقية </h2>
                </div>
                {{-- <div class="pull-right">
                     <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
                 </div>--}}
            </div>
        </div>
    =

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
      {{--
        <form action="{{ route('editPaper') }}" method="POST">
            @csrf
            <label for="select_option">أختار بحث سابق للتعديل (اذا توفر):</label>
            <select name="selected_option" id="select_option">
                <option value="---">---</option>
                @foreach($papers as $paper)
                    <option value="{{$paper->id}}">{{ $paper->paper_title }}</option>
                @endforeach
            </select>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">أختيار للتعديل</button>
            </div>
        </form>
--}}

    <form action="{{ route('updateuserPromotiondata') }}" method="POST">
        {{--<h3>تعديل على بحث سابق</h3>--}}
        @csrf
        {{--@method('PUT')--}}

        <input type="hidden" name="PromotionReqId" value="{{ $PromotionReqUser->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


        <div class="form-group col-sm-12 col-md-6 col-lg-4">
            <label for="currentPromotion">المرتبة العلمية الحالية  </label>
            <select class="form-control" name="currentPromotion">
                <option value="1" {{ Auth::user()->currentPromotion ==1? 'selected':"" }}>غير حاصل على لقب
                </option>
                <option value="2" {{ Auth::user()->currentPromotion==2? 'selected':"" }}>مدرس مساعد
                </option>
                <option value="3" {{ Auth::user()->currentPromotion==3? 'selected':"" }}> مدرس
                </option>
                <option value="3" {{ Auth::user()->currentPromotion==4? 'selected':"" }}> استاذ مساعد
                </option>

            </select>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-4">
            <label for="currentPromotionDoI">  تاريخ الحصول عليها</label><br>
            <input type="date" id="currentPromotionDoI" name="currentPromotionDoI"
                   value="{{date('Y-m-d',strtotime(Auth::user()->currentPromotionDoI))}}"
            >
        </div>

        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label for="general_specialization">الاختصاص العام</label>
            <input type="textarea" class="form-control" name="general_specialization"
                   value="{{ Auth::user()->general_specialization}}"></inputtextarea>
        </div>
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label for="exact_specialization"> الاختصاص الدقيق</label>
            <input type="textarea" class="form-control" name="exact_specialization"
                   value="{{ Auth::user()->exact_specialization}}"></inputtextarea>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label for="Date_placingOrder">تاريخ تقديم الطلب </label><br>
            <input type="date" name="Date_placingOrder" id="Date_placingOrder"
                   value="{{date('Y-m-d',trim(strtotime($PromotionReqUser->Date_placingOrder)))}}">
        </div>
        {{--why I have to delete the trim in the following code while keep it in the above line, otherwise
         following error is appeared: date(): Argument #2 ($timestamp)
          must be of type ?int, string given --}}

        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label for="DueDate">تاريخ استحقاقه للترقية </label><br>
            <input type="date" name="DueDate" id="DueDate"
                   value="{{date('Y-m-d',strtotime($PromotionReqUser->DueDate))}}">
        </div>

            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                <input type="checkbox" name="Is_papers_CP_published" value="Is_papers_CP_published"
                    {{ $PromotionReqUser->Is_papers_CP_published ? 'checked="checked"' : ''}}>
                <label class="form-check-label" for="Is_papers_CP_published">
                    هل بحوث الترقية السابقة منشورة
                </label>
            </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-12">
            <label for="performance_assessment"> تقويم الأداء</label>
            <input type="number" name="performance_assessment" id="performance_assessment"
                   value="{{$PromotionReqUser->performance_assessment}}" min="0">
        </div>
        <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
            <input type="checkbox" name="Is_papers_In_SciPlan" value="Is_papers_In_SciPlan"
                {{ $PromotionReqUser->Is_papers_In_SciPlan ? 'checked="checked"' : ''}}>
            <label class="form-check-label" for="Is_papers_In_SciPlan">
                هل البحوث ضمن الخطة البحثية
            </label>
        </div>
        <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
            <input type="checkbox" name="Is_pass_Educational_Qualification" value="Is_pass_Educational_Qualification"
                {{ Auth::user()->Is_pass_Educational_Qualification ? 'checked="checked"' : ''}}>
            <label class="form-check-label" for="Is_pass_Educational_Qualification">
                هل اجتاز دورة التاهيل التربوي
            </label>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label for="Date_Educational_Qualification">تاريخ انتهاء دورة التاهيل التربوي </label><br>
            <input type="date" name="Date_Educational_Qualification" id="Date_Educational_Qualification"
                   value="{{date('Y-m-d',strtotime(Auth::user()->Date_Educational_Qualification))}}">
        </div>
        <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
            <input type="checkbox" name="Is_pass_Computing" value="Is_pass_Computing"
                {{ Auth::user()->Is_pass_Computing ? 'checked="checked"' : ''}}>
            <label class="form-check-label" for="Is_pass_Computing">
                هل اجتاز دورة الحاسوب
            </label>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label for="Date_Computing">تاريخ اجتياز دورة الحاسوب </label><br>
            <input type="date" name="Date_Computing" id="Date_Computing"
                   value="{{date('Y-m-d',strtotime(Auth::user()->Date_Computing))}}">
        </div>
        <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
            <input type="checkbox" name="IsApplicant_PG" value="IsApplicant_PG"
                {{ $PromotionReqUser->IsApplicant_PG ? 'checked="checked"' : ''}}>
            <label class="form-check-label" for="IsApplicant_PG">
                هل المتقدم طالب دراسات عليا
            </label>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label for="Date_PG_start">تاريخ استحقاقه للترقية </label><br>
            <input type="date" name="Date_PG_start" id="Date_PG_start"
                   value="{{date('Y-m-d',strtotime($PromotionReqUser->Date_PG_start))}}">
        </div>
        <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
            <input type="checkbox" name="IsDeserve_dues" value="IsDeserve_dues"
                {{ $PromotionReqUser->IsDeserve_dues ? 'checked="checked"' : ''}}>
            <label class="form-check-label" for="IsDeserve_dues">
                هل المتقدم يستحق قدم وظيفي
            </label>
        </div>
        <div class="form-group col-sm-12 col-md-6 col-lg-12">
            <label for="dues_period"> فترة القدم</label>
            <input type="number" name="dues_period" id="dues_period"
                   value="{{$PromotionReqUser->dues_period}}" min="0">
        </div>

        @php
            //
        @endphp
{{--
@if({{Auth::user()->name}}!=null)
    hi
@endif
--}}

        {{--
        <div class="form-group col-sm-12 col-md-12 col-lg-12">
            <label for="currentPromotionDoI">تاريخ جلسة توصيات مجلس الكلية</label><br>
            <input type="date" id="currentPromotionDoI" name="currentPromotionDoI"
                   value="{{date('Y-m-d',trim(strtotime(Auth::user()->currentPromotionDoI)))}}">
        </div>
        --}}
        {{--
        <div class="form-group col-sm-12 col-md-6 col-lg-6">
            <label for="currentPromotionDoI">تاريخ اصدار الترقية الحالية </label><br>
            <input type="date" name="currentPromotionDoI" id="currentPromotionDoI"
                   value="{{date('Y-m-d',trim(strtotime(Auth::user()->currentPromotionDoI)))}}">
        </div>
--}}


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary"> تعديل و حفظ</button>
                </div>
    </form>


    {{--
        @if($selectedPaper!=null)
            <form action="{{ route('updatePaper') }}" method="POST">
                <h3>تعديل على بحث سابق</h3>
                @csrf
                --}}{{--@method('PUT')--}}{{--

                <input type="hidden" name="option_id" value="{{ $selectedPaper->id }}">

                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="paper_title">عنوان البحث</label>
                        <input type="textarea" class="form-control" name="paper_title"
                               value="{{ $selectedPaper->paper_title}}"></inputtextarea>




                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary"> تعديل و حفظ</button>
                            </div>
            </form>

        @else
            --}}{{--
                        add new paper.
            --}}{{--
            <form action="{{ route('hamshs.forms.storef')}}" method="POST">
                <h3>أدخال بحث جديد</h3>
                @csrf
                @role('Applicant')
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="paper_title">عنوان البحث</label>
                        <textarea class="form-control" style="height:80px" name="paper_title"
                                  placeholder="paper_title"></textarea>
                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">أضافة البحث</button>
                                    </div>
            </form>

        @endif
    </div>--}}
@endsection
