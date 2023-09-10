@extends('blogs.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>متطلبات الترقية-بيانات الترقية العلمية </h2>
                <br>
                <br>
                {{-- @if(is_null($ProApplicationSummary))
                     --}}{{--    @role('Applicant') replace it with "Coll_Scientific_Committee" role--}}{{--

                     <div class="pull-right">
                         <a class="btn btn-success" href="{{ route('createProApplicationSummary') }}"> أنشاء استمارة ملخص
                             معاملة الترقية</a>
                     </div>
                     --}}{{--@endrole--}}{{--
                 @else--}}


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
                    <h6> استمارة بيانات الترقية العلمية لمقدم الطلب : <br></h6> {{Auth::user()->name}}
                    <h6>معلومات عن استمارة بيانات الترقية العلمية بالرقم <br></h6>
                    {{$ProApplicationSummary->id}}
                    <br>
                </div>
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
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                            <strong>الكلية :</strong>
                            @if(Auth::user()->college_id == 1)
                                الحاسوب
                            @elseif(Auth::user()->college_id == 2)
                                القانون
                            @endif
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <strong>القسم :</strong>
                                @if(Auth::user()->department_id == 1)
                                    علوم حاسبات
                                @elseif(Auth::user()->department_id == 2)
                                    law
                                @elseif(Auth::user()->department_id == 3)
                                    نظم معلومات
                                @endif
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                    <strong>المرتبة العلمية للترقية :</strong>
                                    @if(Auth::user()->currentPromotion == 1)
                                        مدرس مساعد
                                    @elseif(Auth::user()->currentPromotion == 2)
                                        مدرس
                                    @elseif(Auth::user()->currentPromotion == 3)
                                        استاذ مساعد
                                    @elseif(Auth::user()->currentPromotion == 4)
                                        استاذ
                                    @endif
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

                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                    <strong for="Date_hire">تأريخ أول تعيين في الجامعة </strong>
                                    {{date('Y-m-d',strtotime(Auth::user()->Date_hire))}}
                                </div>
                                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                    <strong for="College_SD_hire">تاريخ المباشرة في الكلية: </strong>
                                    {{date('Y-m-d',strtotime(Auth::user()->College_SD_hire))}}
                                </div>

                                <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                    <strong for="mobileNumber">رقم الهاتف النقال</strong>
                                    {{Auth::user()->mobileNumber}}
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">

                                            <strong> الشهادات الجامعية:
                                            </strong>
                                            <table class="table table-dark">
                                                <thead>
                                                <tr>
                                                    <th>الشهادة</th>
                                                    <th> الجامعة</th>
                                                    <th> البلد المانح</th>
                                                    <th> التأريخ</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($Degrees as $Degree)
                                                    <tr>
                                                        <td>{{ $Degree['degree'] }}</td>
                                                        <td>{{ $Degree['university'] }}</td>
                                                        <td>{{ $Degree['country'] }}</td>
                                                        <td>{{date('Y-m-d',trim(strtotime( $Degree['acomplishDate']))) }}</td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong> عناوين الرسائل العلمية لطالب الترقية:</strong>
                                                        <table class="table table-dark">
                                                            <thead>
                                                            <tr>
                                                                <th>عنوان الاطروحة:</th>
                                                                <th> اسم المؤلف:</th>
                                                                <th> اسم المشرف:</th>
                                                                <th> الشهادة (دبلوم/ماجستير/دكتوراة):</th>
                                                                <th> عدد البحوث المستلة من هذه الاطروحة:</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($theses as $thesis)
                                                                <tr>
                                                                    <td>{{ $thesis['title'] }}</td>
                                                                    <td>{{ $thesis['autherName'] }}</td>
                                                                    <td>{{ $thesis['supervisorName'] }}</td>
                                                                    <td>{{ $thesis['degree'] }}</td>
                                                                    <td>{{ $thesis['No_plagiarised_articles'] }}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <strong> الوظائف التي مارسها:</strong>
                                                                    <table class="table table-dark">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>عنوان الوظيفة</th>
                                                                            <th> جهة العمل</th>
                                                                            <th> تاريخ بداية العمل</th>
                                                                            <th> تاريخ نهاية العمل</th>

                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($PositionsHeldBy as $PositionHeldBy)
                                                                            <tr>
                                                                                <td>{{ $PositionHeldBy['workDescriptoin'] }}</td>
                                                                                <td>{{ $PositionHeldBy['workplace'] }}</td>
                                                                                <td>{{date('Y-m-d',trim(strtotime( $PositionHeldBy['sDate']))) }}</td>
                                                                                <td>{{date('Y-m-d',trim(strtotime( $PositionHeldBy['edate']))) }}</td>

                                                                            </tr>
                                                                        @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                    <strong>المراتب العلمية التي تمت ترقيته
                                                                        إليها:</strong>
                                                                    <label>لم تنجز بعد, تحتاج لوضع اليه ادخال الترقيات
                                                                        السابقة</label>
                                                                    <br>
                                                                    <strong>البحوث المقدمة للترقيات السابقة:</strong>
                                                                    <br>
                                                                    <table class="table table-dark">
                                                                        <thead>
                                                                        <tr>
                                                                            <th scope="col">عنوان البحث</th>
                                                                            <th scope="col">التاريخ</th>
                                                                            <th scope="col">تصنيف جهة النشر</th>
                                                                            <th scope="col">المرتبة العلمية</th>
                                                                        </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                        @foreach($papersOfallproms as $paper)
                                                                            <tr>
                                                                                <td>{{ $paper->paper_title }}</td>
                                                                                {{--
                                                                                                                                                                <td>{{ $paper['paper_title'] }}</td>
                                                                                --}}

                                                                                <td>{{date('Y-m-d',strtotime($paper->publish_date))}}</td>
                                                                                <td>
                                                                                    @if($paper->publishType == 1)
                                                                                        مجلات ذات معامل تأثير <br>
                                                                                    @elseif($paper->publishType == 2)
                                                                                        مجلات عالمية مطبوعة
                                                                                    @elseif($paper->publishType == 3)
                                                                                        مجلات عربية وعراقية <br>
                                                                                    @endif
                                                                                </td>
                                                                                <td>
                                                                                    نحتاج الى تعديل الكود
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>

                                                                    <br>
                                                                    <div
                                                                        style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
                                                                        <span style="font-size: 20px; background-color: white; padding: 0 10px;">
                                                                        معلومات الترقية العلمية الحالية
                                                                        </span>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div
                                                                            class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                            <br>
                                                                            <strong for="Date_placingOrder">تاريخ تقديم
                                                                                الطلب </strong>
                                                                            {{-- {{$PromotionReqUser->Date_placingOrder}}--}}
                                                                            {{date('Y-m-d',strtotime(Auth::user()->Date_placingOrder))}}
                                                                        </div>
                                                                        <div
                                                                            class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                            <strong for="DueDate">تأريخ استحقاق الترقية على المدة الاصغرية </strong>
                                                                            {{date('Y-m-d',strtotime(Auth::user()->DueDate_lowest))}}
                                                                        </div>
                                                                        <div
                                                                            class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                            <strong for="DueDate">تاريخ الاستحقاق على المدة الاكبرية  </strong>
                                                                            {{date('Y-m-d',strtotime(Auth::user()->DueDate_largest))}}
                                                                        </div>


                                                                        <div
                                                                            class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                            <strong for=" ">اعتبار الترقية من تاريخ تقديم الطلب أو من تاريخ الاستحقاق
                                                                                أو من تاريخ تقديم أخر بحث تعزيزي : (لم تنجز بعد) </strong>

                                                                        </div>


                                                                        <div
                                                                            class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                            <strong for="DueDate">تاريخ استحقاقه
                                                                                للترقية </strong>
                                                                            {{date('Y-m-d',strtotime(Auth::user()->DueDate))}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div
                                                                            class="form-group col-sm-12 col-md-6 col-lg-4 py-3">
                                                                            <input class="form-check-input"
                                                                                   type="checkbox"
                                                                                   onclick="return false;"
                                                                                   name="IsDeserve_dues"
                                                                                   value="IsDeserve_dues"
                                                                                {{ $PromotionReqUser->IsDeserve_dues ? 'checked="checked"' : ''}}>
                                                                            <strong class="form-check-label"
                                                                                    for="IsDeserve_dues">
                                                                                هل المتقدم يستحق قدم وظيفي
                                                                            </strong>
                                                                        </div>
                                                                        <div
                                                                            class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                                                            <strong for="dues_period">فترة
                                                                                القدم(شهر)</strong>
                                                                            {{$PromotionReqUser->dues_period}}
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-4 py-3">
                                                                        <input class="form-check-input"
                                                                               type="checkbox"
                                                                               onclick="return false;"
                                                                               name="IsApplicant_PG"
                                                                               value="IsApplicant_PG"
                                                                            {{ $PromotionReqUser->IsApplicant_PG ? 'checked="checked"' : ''}}>
                                                                        <strong class="form-check-label"
                                                                                for="IsApplicant_PG">
                                                                            هل المتقدم طالب دراسات عليا
                                                                        </strong>
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-4 py-3">
                                                                        <input class="form-check-input"
                                                                               type="checkbox"
                                                                               onclick="return false;"
                                                                               name="IsThesisUsed"
                                                                               value="IsThesisUsed"
                                                                            {{ $PromotionReqUser->IsThesisUsed ? 'checked="checked"' : ''}}>
                                                                        <strong class="form-check-label"
                                                                                for="IsThesisUsed">
                                                                            هل المتقدم مستفاد من اطروحة الدكتوراه التي قدمها
                                                                        </strong>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                   onclick="return false;"
                                                                                   name="Is_pass_Educational_Qualification"
                                                                                   id="Is_pass_Educational_Qualification"
                                                                                {{ Auth::user()->Is_pass_Educational_Qualification ? 'checked="checked"' : ''}}>
                                                                            <strong> هل اجتاز دورة التاهيل التربوي</strong>
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                                                            <label for="Order_No_Educational_Qualification">الأمر الإداري المرقم</label>
                                                                           {{Auth::user()->Order_No_Educational_Qualification}}
                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                                                            <label for="Date_Educational_Qualification">تاريخ انتهاء دورة التاهيل التربوي </label>
                                                                                   {{date('Y-m-d',strtotime(Auth::user()->Date_Educational_Qualification))}}
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                   onclick="return false;"
                                                                                   name="Is_pass_Computing"
                                                                                   id="Is_pass_Computing"
                                                                                {{ Auth::user()->Is_pass_Computing ? 'checked="checked"' : ''}}>
                                                                           <strong>هل اجتاز دورة الحاسوب </strong>

                                                                        </div>
                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                                                            <label for="Order_No_Educational_Qualification">الأمر الإداري المرقم</label>
                                                                            {{Auth::user()->Order_No_Computing}}
                                                                        </div>

                                                                        <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                                                            <label for="Date_Computing">تاريخ اجتياز دورة الحاسوب </label>
                                                                           {{date('Y-m-d',strtotime(Auth::user()->Date_Computing))}}
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-4 py-3">

                                                                        <input class="form-check-input" type="checkbox"
                                                                               onclick="return false;"
                                                                               name="Is_papers_In_SciPlan"
                                                                               id="Is_papers_In_SciPlan"
                                                                               value="Is_papers_In_SciPlan"
                                                                               style=""
                                                                                {{ $PromotionReqUser->Is_papers_In_SciPlan ? 'checked="checked"' : ''}}>
                                                                        <strong class="form-check-label"
                                                                                for="Is_papers_In_SciPlan">
                                                                            هل البحوث ضمن الخطة البحثية
                                                                        </strong>
                                                                    </div>






                                                                    <tr>
                                                                        <br>
                                                                        <a class="btn btn-primary"
                                                                           href="{{ route('editProApplicationSummary',$ProApplicationSummary) }}">
                                                                            الاطلاع و تعديل استمارة ملخص معاملة الترقية
                                                                            و الهوامش المتعقلة</a>
                                                                        <a class="btn btn-info"
                                                                           href="{{ route('showProApplicationSummary',$ProApplicationSummary) }}">طباعة</a>
                                                                        <br>


                                                                        <div
                                                                            class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                            <strong for="currentPromotionDoI"> تاريخ
                                                                                الحصول عليها</strong>
                                                                            {{date('Y-m-d',strtotime(Auth::user()->currentPromotionDoI))}}

                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                        <strong for="general_specialization">الاختصاص
                                                                            العام</strong>
                                                                        {{Auth::user()->general_specialization}}
                                                                    </div>

                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                                                        <strong for="exact_specialization"> الاختصاص
                                                                            الدقيق</strong>
                                                                        {{Auth::user()->exact_specialization}}
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-4 py-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               onclick="return false;"
                                                                               name="Is_papers_CP_published"
                                                                               id="Is_papers_CP_published"
                                                                               value="Is_papers_CP_published"
                                                                               style=""
                                                                            {{ $PromotionReqUser->Is_papers_CP_published ? 'checked="checked"' : ''}}>
                                                                        <label class="form-check-label"
                                                                               for="Is_papers_CP_published"
                                                                               style="font-weight: bold">
                                                                            هل بحوث الترقية السابقة منشورة
                                                                        </label>

                                                                    </div>
                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-4 py-3">

                                                                        <input class="form-check-input" type="checkbox"
                                                                               onclick="return false;"
                                                                               name="Is_papers_In_SciPlan"
                                                                               id="Is_papers_In_SciPlan"
                                                                               value="Is_papers_In_SciPlan"
                                                                               style=""
                                                                            {{ $PromotionReqUser->Is_papers_In_SciPlan ? 'checked="checked"' : ''}}>
                                                                        <strong class="form-check-label"
                                                                                for="Is_papers_In_SciPlan">
                                                                            هل البحوث ضمن الخطة البحثية
                                                                        </strong>
                                                                    </div>
                                                                    <div
                                                                        class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                                                        <strong for="performance_assessment">درجة تقويم
                                                                            الأداء</strong>
                                                                        {{$PromotionReqUser->performance_assessment}}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-4 py-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               onclick="return false;"
                                                                               name="Is_pass_Educational_Qualification"
                                                                               value="Is_pass_Educational_Qualification"
                                                                            {{ Auth::user()->Is_pass_Educational_Qualification ? 'checked="checked"' : ''}}>
                                                                        <strong class="form-check-label"
                                                                                for="Is_pass_Educational_Qualification">
                                                                            هل اجتاز دورة التاهيل التربوي
                                                                        </strong>
                                                                        {{Auth::user()->Is_pass_Educational_Qualification}}
                                                                    </div>

                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-6 py-3">
                                                                        <strong for="Date_Educational_Qualification">تاريخ
                                                                            انتهاء دورة التاهيل
                                                                            التربوي </strong>
                                                                        {{date('Y-m-d',strtotime(Auth::user()->Date_Educational_Qualification))}}
                                                                    </div>
                                                                </div>

                                                                <div class="row">

                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-4 py-3">

                                                                        <input class="form-check-input" type="checkbox"
                                                                               onclick="return false;"
                                                                               name="Is_pass_Educational_Qualification"
                                                                               value="Is_pass_Computing"
                                                                            {{ Auth::user()->Is_pass_Computing ? 'checked="checked"' : ''}}>

                                                                        <strong class="form-check-label"
                                                                                for="Is_pass_Computing">
                                                                            هل اجتاز دورة الحاسوب
                                                                        </strong>
                                                                    </div>
                                                                    <div
                                                                        class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                                                        <strong for="Date_Computing">تاريخ اجتياز دورة
                                                                            الحاسوب </strong>
                                                                        {{date('Y-m-d',strtotime(Auth::user()->Date_Computing))}}
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-4 py-3">
                                                                        <input class="form-check-input" type="checkbox"
                                                                               onclick="return false;"
                                                                               name="IsApplicant_PG"
                                                                               value="IsApplicant_PG"
                                                                            {{ $PromotionReqUser->IsApplicant_PG ? 'checked="checked"' : ''}}>
                                                                        <strong class="form-check-label"
                                                                                for="IsApplicant_PG">
                                                                            هل المتقدم طالب دراسات عليا
                                                                        </strong>
                                                                    </div>
                                                                    <div
                                                                        class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                                                        <strong for="Date_PG_start">تاريخ استحقاقه
                                                                            للترقية </strong>
                                                                        {{date('Y-m-d',strtotime(Auth::user()->Date_PG_start))}}
                                                                    </div>
                                                                </div>

                                                                <table class="table table-dark">
                                                                    <thead>
                                                                    <tr>
                                                                        <th scope="col">عنوان البحث</th>
                                                                        <th scope="col">التاريخ</th>
                                                                        <th scope="col">هل البحث منفرد؟</th>
                                                                        <th scope="col">هل البحث منشور؟</th>
                                                                        <th scope="col">تصنيف جهة النشر</th>
                                                                        <th scope="col">مستل ام غير مستل من رسالة او
                                                                            اطروحة
                                                                        </th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    @foreach($papers as $paper)
                                                                        <tr>
                                                                            <td>{{ $paper['paper_title'] }}</td>

                                                                            <td>{{date('Y-m-d',strtotime($paper->publish_date))}}</td>


                                                                            <td>
                                                                                @if($paper->singleAuther)
                                                                                    <input class="form-check-input"
                                                                                           type="checkbox"
                                                                                           onclick="return false;"
                                                                                           name="singleAuther"
                                                                                           value="singleAuther"
                                                                                        {{ $paper->singleAuther ? 'checked="checked"' : ''}}>
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                @if($paper->Ispubished)
                                                                                    <input class="form-check-input"
                                                                                           type="checkbox"
                                                                                           onclick="return false;"
                                                                                           name="Ispubished"
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
                                                                                    <input class="form-check-input"
                                                                                           type="checkbox"
                                                                                           onclick="return false;"
                                                                                           name="takenFromStdut_thesis"
                                                                                           value="takenFromStdut_thesis"
                                                                                        {{ $paper->takenFromStdut_thesis ? 'checked="checked"' : ''}}>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>

                                                                <div>
                                                                    <div
                                                                        class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                                                        <label for="table1points"> مجموع نقاط جدول
                                                                            1</label>
                                                                        {{$ProApplicationSummary->table1points}}<br>
                                                                    </div>
                                                                    <div
                                                                        class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                                                        <label for="table2points"> مجموع نقاط جدول
                                                                            2</label>
                                                                        {{$ProApplicationSummary->table2points}}<br>
                                                                    </div>
                                                                    {{-- أضافة متغيرات حقول الخبراء--}}


                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <strong>توصيات لجنة علمية:</strong><br>
                                                                        {{ $ProApplicationSummary->SciCommittee_Recmd }}
                                                                    </div>
                                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                                        <strong>رقم الجلسة للجنة ترقيات توصيات
                                                                            الكلية:</strong><br>
                                                                        {{ $ProApplicationSummary->SessionNo }}
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-12">
                                                                        <strong>تاريخ جلسة لجنة ترقيات توصيات
                                                                            الكلية:</strong><br>
                                                                        {{date('Y-m-d',strtotime($ProApplicationSummary->SessionNo_Date))}}
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-12">
                                                                        <strong>هامش لجنة علمية كلية :</strong><br>
                                                                        {{ $ProApplicationSummary->collegePromCommi_hamsh }}
                                                                    </div>

                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-12">
                                                                        <strong>توصيات مجلس الكلية :</strong><br>

                                                                        {{ $ProApplicationSummary->collegecouncil_Recmd }}
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-12">
                                                                        <strong>رقم جلسة توصيات مجلس الكلية</strong><br>
                                                                        {{ $ProApplicationSummary->collegecouncil_SessNo }}
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-12">
                                                                        <strong>تاريخ جلسة توصيات مجلس
                                                                            الكلية</strong><br>
                                                                        {{date('Y-m-d',strtotime( $ProApplicationSummary->collegecouncil_SessDate))}}
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-12">
                                                                        <strong>رقم كتاب الاحالة من رئيس الجامعة الى
                                                                            ترقيات المركزية</strong> <br>
                                                                        {{ $ProApplicationSummary->Admin_OrderNo_UniHead_comm }}
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-12">
                                                                        <strong>تاريخ كتاب الاحالة من رئيس الجامعة الى
                                                                            ترقيات المركزية</strong><br>
                                                                        {{date('Y-m-d',strtotime( $ProApplicationSummary->Admin_OrderDate_UniHead_comm))}}
                                                                    </div>
                                                                    <div
                                                                        class="form-group col-sm-12 col-md-6 col-lg-12">
                                                                        <strong>هامش لجنة ترقيات المركزية </strong><br>
                                                                        {{ $ProApplicationSummary->presidencyPromCommi_hamsh }}
                                                                    </div>


                                                                    <div
                                                                        class="form-check col-sm-12 col-md-6 col-lg-4 py-3">

                                                                    </div>
                                                                    <div
                                                                        class="form-check col-sm-12 col-md-6 col-lg-4 py-3">

                                                                    </div>


                                                                </div>






    {{--@endif--}}

@endsection
