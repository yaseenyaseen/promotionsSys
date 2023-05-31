@extends('blogs.layout')

@section('content')
    <style>
        .form-check-label {
            margin-right: 20px
        }
    </style>

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h3 style="text-align: center; padding-top: 15px">إضافة بيانات لمقدم الترقية</h3>
        </div>
    </div>
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

    <form action="{{ route('updateuserPromotiondata') }}" method="POST">
        @csrf

        <input type="hidden" name="PromotionReqId" value="{{ $PromotionReqUser->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="row">
            <div class="form-group col-sm-12 col-md-6 col-lg-4">
                <label for="currentPromotion">المرتبة العلمية الحالية </label>
                <select class="form-control" name="currentPromotion" id="currentPromotion">
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
                <label for="currentPromotionDoI"> تاريخ الحصول عليها</label><br>
                <input class="form-control" type="date" id="currentPromotionDoI" name="currentPromotionDoI"
                       value="{{date('Y-m-d',strtotime(Auth::user()->currentPromotionDoI))}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                <label for="general_specialization">الاختصاص العام</label>
                <input type="textarea" class="form-control" name="general_specialization" id="general_specialization"
                       value="{{ Auth::user()->general_specialization}}"></inputtextarea>
            </div>
            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                <label for="exact_specialization"> الاختصاص الدقيق</label>
                <input type="textarea" class="form-control" name="exact_specialization" id="exact_specialization"
                       value="{{ Auth::user()->exact_specialization}}"></inputtextarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12 col-md-6 col-lg-4">
                <label for="Date_placingOrder">تاريخ تقديم الطلب </label><br>
                <input class="form-control" type="date" name="Date_placingOrder" id="Date_placingOrder"
                       value="{{date('Y-m-d',strtotime($PromotionReqUser->Date_placingOrder))}}">
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-4">
                <label for="DueDate">تاريخ استحقاقه للترقية </label><br>
                <input class="form-control" type="date" name="DueDate" id="DueDate"
                       value="{{date('Y-m-d',strtotime($PromotionReqUser->DueDate))}}">
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-4">
                <label for="performance_assessment">درجة تقويم الأداء</label>
                <input class="form-control" type="number" name="performance_assessment" id="performance_assessment"
                       value="{{$PromotionReqUser->performance_assessment}}" min="0">
            </div>
        </div>
        <div class="row">
            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                <input class="form-check-input" type="checkbox" name="Is_papers_CP_published"
                       value="Is_papers_CP_published"
                    {{ $PromotionReqUser->Is_papers_CP_published ? 'checked="checked"' : ''}}>
                <label class="form-check-label" for="Is_papers_CP_published">
                    هل بحوث الترقية السابقة منشورة
                </label>
            </div>
            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                <input class="form-check-input" type="checkbox" name="Is_papers_In_SciPlan" id="Is_papers_In_SciPlan"
                    {{ $PromotionReqUser->Is_papers_In_SciPlan ? 'checked="checked"' : ''}}>
                <label class="form-check-label" for="Is_papers_In_SciPlan">
                    هل البحوث ضمن الخطة البحثية
                </label>
            </div>
        </div>

        <div class="row">
            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-5">
                <input class="form-check-input" type="checkbox" name="Is_pass_Educational_Qualification"
                       id="Is_pass_Educational_Qualification"
                    {{ Auth::user()->Is_pass_Educational_Qualification ? 'checked="checked"' : ''}}>
                <label class="form-check-label" for="Is_pass_Educational_Qualification">
                    هل اجتاز دورة التاهيل التربوي
                </label>
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-4 py-3">
                <label for="Date_Educational_Qualification">تاريخ انتهاء دورة التاهيل التربوي </label><br>
                <input class="form-control" type="date" name="Date_Educational_Qualification"
                       id="Date_Educational_Qualification"
                       value="{{date('Y-m-d',strtotime(Auth::user()->Date_Educational_Qualification))}}">
            </div>
        </div>
        <div class="row">
            <div class=" col-sm-12 col-md-6 col-lg-4 py-5">
                <input class="form-check-input" type="checkbox" name="Is_pass_Computing" id="Is_pass_Computing"
                    {{ Auth::user()->Is_pass_Computing ? 'checked="checked"' : ''}}>
                <label class="form-check-label" for="Is_pass_Computing">
                    هل اجتاز دورة الحاسوب
                </label>
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-4">
                <label for="Date_Computing">تاريخ اجتياز دورة الحاسوب </label>
                <input class="form-control" type="date" name="Date_Computing" id="Date_Computing"
                       value="{{date('Y-m-d',strtotime(Auth::user()->Date_Computing))}}">
            </div>
        </div>
        <div class="row">
            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                <input class="form-check-input" type="checkbox" name="IsApplicant_PG" id="IsApplicant_PG"
                    {{ $PromotionReqUser->IsApplicant_PG ? 'checked="checked"' : ''}}>
                <label class="form-check-label" for="IsApplicant_PG">
                    هل المتقدم طالب دراسات عليا
                </label>
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-4">
                <label for="Date_PG_start">تاريخ استحقاقه للترقية </label><br>
                <input class="form-control" type="date" name="Date_PG_start" id="Date_PG_start"
                       value="{{date('Y-m-d',strtotime($PromotionReqUser->Date_PG_start))}}">
            </div>
        </div>
        <div class="row">
            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-5">
                <label class="form-check-label" for="IsDeserve_dues">
                    هل المتقدم يستحق قدم وظيفي
                </label>
                <input class="form-check-input" type="checkbox" name="IsDeserve_dues"  value="IsDeserve_dues"
                    {{ $PromotionReqUser->IsDeserve_dues ? 'checked="checked"' : ''}}>

            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-4 py-3">
                <label for="dues_period"> فترة القدم</label>
                <input class="form-control" type="number" name="dues_period" id="dues_period"
                       value="{{$PromotionReqUser->dues_period}}" min="0">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary"> تعديل و حفظ</button>
        </div>
    </form>
    <br>
    <br>
    <br>

@endsection
