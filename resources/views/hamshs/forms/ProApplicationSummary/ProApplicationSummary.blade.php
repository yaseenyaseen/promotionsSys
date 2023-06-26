@extends('blogs.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>متطلبات الترقية-استمارة ملخص معاملة الترقية </h2>
                <br>
                <br>
                @if(is_null($ProApplicationSummary))
                    {{--    @role('Applicant') replace it with "Coll_Scientific_Committee" role--}}

                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('createProApplicationSummary') }}"> أنشاء استمارة ملخص
                            معاملة الترقية</a>
                    </div>
                    {{--@endrole--}}
                @else


                    {{--   following code should be upated to make the roles catogories based on head name of the page only.--}}


                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    {{--@role('Applicant')--}}

                    <div class="pull-right">
                        <a class="btn btn-success" href="{{route('NewApplicationBoard')}}"> صفحة الاستمارات
                            المطلوبة </a>
                    </div>
                    {{--@endrole--}}

                    <div>
                        <h6> استمارة ملخص معاملة الترقية لمقدم الطلب : <br></h6> {{Auth::user()->name}}
                        <h6>معلومات عن استمارة ملخص معاملة الترقية للترقية العلمية بالرقم <br></h6>
                        {{$ProApplicationSummary->id}}
                        <br>
                    </div>
                    <tr>
                        <br>
                        <a class="btn btn-primary"
                           href="{{ route('editProApplicationSummary',$ProApplicationSummary) }}">
                            الاطلاع و تعديل استمارة ملخص معاملة الترقية و الهوامش المتعقلة</a>
                        <a class="btn btn-info"
                           href="{{ route('showProApplicationSummary',$ProApplicationSummary) }}">طباعةأستمار</a>
                        <br>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <strong>المرتبة العلمية الحالية :</strong>
                                @if(Auth::user()->currentPromotion == 1)
                                    غير حاصل على لقب
                                @elseif(Auth::user()->currentPromotion == 2)
                                    مدرس مساعد
                                @elseif(Auth::user()->currentPromotion == 3)
                                    مدرس
                                @elseif(Auth::user()->currentPromotion == 4)
                                    استاذ مساعد
                                @endif
                            </div>

                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <strong for="currentPromotionDoI"> تاريخ الحصول عليها</strong>
                                {{date('Y-m-d',strtotime(Auth::user()->currentPromotionDoI))}}

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <strong for="general_specialization">الاختصاص العام</strong>
                                {{Auth::user()->general_specialization}}
                            </div>

                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <strong for="exact_specialization"> الاختصاص الدقيق</strong>
                                {{Auth::user()->exact_specialization}}
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">


                                <strong for="Date_placingOrder">تاريخ تقديم الطلب </strong>
                                {{-- {{$PromotionReqUser->Date_placingOrder}}--}}
                                {{date('Y-m-d',strtotime(Auth::user()->Date_placingOrder))}}
                            </div>

                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <strong for="DueDate">تاريخ استحقاقه للترقية </strong>
                                {{date('Y-m-d',strtotime(Auth::user()->DueDate))}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-4 py-3">
                                <div>
                                    <input class="form-check-input" type="checkbox" onclick="return false;"
                                           name="Is_papers_CP_published"
                                           id="Is_papers_CP_published"
                                           value="Is_papers_CP_published"
                                           style=""
                                        {{ $PromotionReqUser->Is_papers_CP_published ? 'checked="checked"' : ''}}>
                                    <label class="form-check-label" for="Is_papers_CP_published"
                                           style="font-weight: bold">
                                        هل بحوث الترقية السابقة منشورة
                                    </label>
                                </div>
                            </div>
                            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                <input class="form-check-input" type="checkbox" onclick="return false;"
                                       name="Is_papers_In_SciPlan" id="Is_papers_In_SciPlan"
                                    {{ $PromotionReqUser->Is_papers_In_SciPlan ? 'checked="checked"' : ''}}>
                                <strong class="form-check-label" for="Is_papers_In_SciPlan">
                                    هل البحوث ضمن الخطة البحثية
                                </strong>
                            </div>
                            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                <strong for="performance_assessment">درجة تقويم الأداء</strong>
                                {{$PromotionReqUser->performance_assessment}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                <input class="form-check-input" type="checkbox" onclick="return false;"
                                       name="Is_pass_Educational_Qualification"
                                       value="Is_pass_Educational_Qualification"
                                    {{ Auth::user()->Is_pass_Educational_Qualification ? 'checked="checked"' : ''}}>
                                <strong class="form-check-label" for="Is_pass_Educational_Qualification">
                                    هل اجتاز دورة التاهيل التربوي
                                </strong>
                                {{Auth::user()->Is_pass_Educational_Qualification}}
                            </div>

                            <div class="form-check col-sm-12 col-md-6 col-lg-6 py-3">
                                <strong for="Date_Educational_Qualification">تاريخ انتهاء دورة التاهيل
                                    التربوي </strong>
                                {{date('Y-m-d',strtotime(Auth::user()->Date_Educational_Qualification))}}
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">

                                <input class="form-check-input" type="checkbox" onclick="return false;"
                                       name="Is_pass_Educational_Qualification"
                                       value="Is_pass_Computing"
                                    {{ Auth::user()->Is_pass_Computing ? 'checked="checked"' : ''}}>

                                <strong class="form-check-label" for="Is_pass_Computing">
                                    هل اجتاز دورة الحاسوب
                                </strong>
                            </div>
                            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                <strong for="Date_Computing">تاريخ اجتياز دورة الحاسوب </strong>
                                {{date('Y-m-d',strtotime(Auth::user()->Date_Computing))}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                <input class="form-check-input" type="checkbox" onclick="return false;"
                                       name="IsApplicant_PG" value="IsApplicant_PG"
                                    {{ $PromotionReqUser->IsApplicant_PG ? 'checked="checked"' : ''}}>
                                <strong class="form-check-label" for="IsApplicant_PG">
                                    هل المتقدم طالب دراسات عليا
                                </strong>
                            </div>
                            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                <strong for="Date_PG_start">تاريخ استحقاقه للترقية </strong>
                                {{date('Y-m-d',strtotime(Auth::user()->Date_PG_start))}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                <input class="form-check-input" type="checkbox" onclick="return false;"
                                       name="IsDeserve_dues" value="IsDeserve_dues"
                                    {{ $PromotionReqUser->IsDeserve_dues ? 'checked="checked"' : ''}}>
                                <strong class="form-check-label" for="IsDeserve_dues">
                                    هل المتقدم يستحق قدم وظيفي
                                </strong>
                            </div>


                            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                <strong for="dues_period"> فترة القدم</strong>
                                {{$PromotionReqUser->dues_period}}
                            </div>
                        </div>


                        <table>
                            <thead>
                            <tr>
                                <th>عنوان البحث</th>
                                <th>التاريخ</th>
                                <th>هل البحث منفرد؟</th>
                                <th>هل البحث منشور؟</th>
                                <th>تصنيف جهة النشر</th>
                                <th>مستل ام غير مستل من رسالة او اطروحة</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($papers as $paper)
                                <tr>
                                    <td>{{ $paper['paper_title'] }}</td>
                                    <td>{{ $paper['publish_date'] }}</td>
                                    <td>
                                        @if($paper->singleAuther)
                                            <input type="checkbox" onclick="return false;" name="singleAuther"
                                                   value="singleAuther"
                                                {{ $paper->singleAuther ? 'checked="checked"' : ''}}>
                                        @endif
                                    </td>
                                    <td>
                                        @if($paper->Ispubished)
                                            <input type="checkbox" onclick="return false;" name="Ispubished"
                                                   value="Ispubished"
                                                {{ $paper->Ispubished ? 'checked="checked"' : ''}}>
                                        @endif
                                    </td>
                                    <td>

                                        @if($paper->publishType == 1)
                                            مجلات ذات معامل تأثير <br>
                                        @elseif($paper->publishType == 2)
                                            مجلات عالمية مطبوعة
                                        @elseif($paper->publishType == 3)
                                            مجلات عربية وعراقية <br>

                                        @endif
                                    </td>
                                    <td> @if($paper->takenFromStdut_thesis)
                                            <input type="checkbox" onclick="return false;" name="takenFromStdut_thesis"
                                                   value="takenFromStdut_thesis"
                                                {{ $paper->takenFromStdut_thesis ? 'checked="checked"' : ''}}>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div>
                            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                <label for="table1points"> مجموع نقاط جدول 1</label>
                                {{$ProApplicationSummary->table1points}}<br>
                            </div>
                            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                <label for="table2points"> مجموع نقاط جدول 2</label>
                                {{$ProApplicationSummary->table2points}}<br>
                            </div>
                            {{-- أضافة متغيرات حقول الخبراء--}}


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>توصيات لجنة علمية:</strong><br>
                                {{ $ProApplicationSummary->SciCommittee_Recmd }}
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <strong>رقم الجلسة للجنة ترقيات توصيات الكلية:</strong><br>
                                {{ $ProApplicationSummary->SessionNo }}
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-12">
                                <strong>تاريخ جلسة لجنة ترقيات توصيات الكلية:</strong><br>
                                {{date('Y-m-d',strtotime($ProApplicationSummary->SessionNo_Date))}}
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-12">
                                <strong>هامش لجنة علمية كلية :</strong><br>
                                {{ $ProApplicationSummary->collegePromCommi_hamsh }}
                            </div>

                            <div class="form-group col-sm-12 col-md-6 col-lg-12">
                                <strong>توصيات مجلس الكلية :</strong><br>

                                {{ $ProApplicationSummary->collegecouncil_Recmd }}
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-12">
                                <strong>رقم جلسة توصيات مجلس الكلية</strong><br>
                                {{ $ProApplicationSummary->collegecouncil_SessNo }}
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-12">
                                <strong>تاريخ جلسة توصيات مجلس الكلية</strong><br>
                                {{date('Y-m-d',strtotime( $ProApplicationSummary->collegecouncil_SessDate))}}
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-12">
                                <strong>رقم كتاب الاحالة من رئيس الجامعة الى ترقيات المركزية</strong> <br>
                                {{ $ProApplicationSummary->Admin_OrderNo_UniHead_comm }}
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-12">
                                <strong>تاريخ كتاب الاحالة من رئيس الجامعة الى ترقيات المركزية</strong><br>
                                {{date('Y-m-d',strtotime( $ProApplicationSummary->Admin_OrderDate_UniHead_comm))}}
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-12">
                                <strong>هامش لجنة ترقيات المركزية </strong><br>
                                {{ $ProApplicationSummary->presidencyPromCommi_hamsh }}
                            </div>


                            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">

                            </div>
                            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">

                            </div>


                        </div>






    @endif

@endsection
