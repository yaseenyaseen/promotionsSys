
@extends('blogs.layout')

@section('content')
    <style>
        .form-check-label {
            margin-right: 20px
        }
    </style>
    <div dir="rtl">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div>
                    <h2>أضافة بيانات جدول البحوث </h2>
                </div>
                {{-- <div class="pull-right">
                     <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
                 </div>--}}
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
        @if($selectedPaper!=null)
            <form action="{{ route('updatePaper') }}" method="POST">
                <h3>تعديل على بحث سابق</h3>
                @csrf
                {{--@method('PUT')--}}

                <input type="hidden" name="option_id" value="{{ $selectedPaper->id }}">

                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="paper_title">عنوان البحث</label>
                        <input type="textarea" class="form-control" name="paper_title"
                               value="{{ $selectedPaper->paper_title}}"></inputtextarea>


                        <div class="form-group col-sm-12 col-md-6 col-lg-6">
                            <label for="publish_date">تاريخ النشر </label><br>
                            <input type="date" name="publish_date" id="publish_date"
                                   value="{{date('Y-m-d',trim(strtotime($selectedPaper->publish_date)))}}">
                        </div>

                        <div class="form-row">
                            <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                                <input type="checkbox" name="singleAuther" value="singleAuther"
                                    {{ $selectedPaper->singleAuther ? 'checked="checked"' : ''}}>
                                <label class="form-check-label" for="singleAuther">
                                    هل البحث منفرد؟
                                </label>
                            </div>
                        </div>


                        <div class="form-check col-sm-12 col-md-6 col-lg-4">
                            <input type="checkbox" name="Ispubished"
                                   value="Ispubished" {{ $selectedPaper->Ispubished ? 'checked="checked"' : '' }}/>
                            <label class="form-check-label" for="Ispubished">
                                هل البحث منشور ؟
                            </label>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 py-3">
                            <div class="form-check ">
                                <input type="checkbox" name="takenFromStdut_thesis"
                                       value="takenFromStdut_thesis" {{ $selectedPaper->takenFromStdut_thesis ? 'checked="checked"' : '' }}/>
                                <label class="form-check-label" for="takenFromStdut_thesis">
                                    هل البحث مستل من اطروحة؟
                                </label>
                            </div>
                        </div>
                        {{-- todo:ask Hussien to update the select option list to use loop
                         <select class="js-states browser-default select2" name="shopping_id" required id="shopping_id">
                               <option value="option_select" disabled selected>Shoppings</option>
                               @foreach($shoppings as $shopping)
                                   <option value="{{ $shopping->id }}" {{$company->shopping_id == $shopping->id  ? 'selected' : ''}}>{{ $shopping->fantasyname}}</option>
                               @endforeach
                           </select>--}}

                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                <label for="publishType">تصنيف جهة النشر </label>
                                <select class="form-control" name="publishType">
                                    <option value="1" {{ $selectedPaper->publishType==1? 'selected':"" }}>مجلات ذات
                                        معامل
                                        تأثير
                                    </option>
                                    <option value="2" {{ $selectedPaper->publishType==2? 'selected':"" }}>مجلات عالمية
                                        مطبوعة
                                    </option>
                                    <option value="3" {{ $selectedPaper->publishType==3? 'selected':"" }}>مجلات عربية
                                        وعراقية
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                <div class="form-check">
                                    <input type="checkbox" name="exact_specialization" value="exact_specialization"
                                        {{ $selectedPaper->exact_specialization ? 'checked="checked"' : '' }}/>
                                    <label class="form-check-label" for="exact_specialization">
                                        هل البحث ب الاختصاص الدقيق ؟
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                <div class="form-check">
                                    <input type="checkbox" name="general_specialization" value="general_specialization"
                                        {{ $selectedPaper->general_specialization ? 'checked="checked"' : '' }}/>
                                    <label class="form-check-label" for="general_specialization">
                                        هل البحث ب الاختصاص العام ؟
                                    </label>
                                </div>
                            </div>
                            {{--   todo: following columns should be filledout from controller.
                   $table->integer('headCommitee_ID')->nullable();
                      $table->timestamp('headCommitee_createdat')->nullable();--}}

                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="plagiarised_Details">تفاصيل الاستلال</label>
                                <input type="textarea" class="form-control" name="plagiarised_Details"
                                       value="{{ $selectedPaper->plagiarised_Details }}"></inputtextarea>
                            </div>

                            <div class="form-group col-sm-12 col-md-6 col-lg-6">
                                <div class="form-check">
                                    <input type="checkbox" name="Is_paper_fromApplTheses"
                                           value="Is_paper_fromApplTheses"
                                        {{ $selectedPaper->Is_paper_fromApplTheses ? 'checked="checked"' : '' }}/>
                                    <label class="form-check-label" for="Is_paper_fromApplTheses">
                                        هل البحث مستل من رسالة أو اطروحة طالب الترقية ؟
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="plagiarised_resource">مصدر الاستلال</label>
                                <input type="textarea" class="form-control" name="plagiarised_resource"
                                       value="{{ $selectedPaper->plagiarised_resource }}"></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <div class="form-check">
                                    <input type="checkbox" name="Is_paperRelated_CoAuther"
                                           value="Is_paperRelated_CoAuther"
                                        {{ $selectedPaper->Is_paperRelated_CoAuther ? 'checked="checked"' : '' }}/>
                                    <label class="form-check-label" for="Is_paperRelated_CoAuther">
                                        هل للبحث علاقة مع بحوث اخرى للباحثين المشتركين ؟
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <div class="form-check">
                                    <input type="checkbox" name="Is_paper_AppSuperlTheses"
                                           value="Is_paper_AppSuperlTheses"
                                        {{ $selectedPaper->Is_paper_AppSuperlTheses ? 'checked="checked"' : '' }}/>
                                    <label class="form-check-label" for="Is_paper_AppSuperlTheses">
                                        هل البحث مستل من رسالة أو اطروحة اشرف عليها طالب الترقية؟
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-12">
                                <label for="Ratio_paper_AppSuperlTheses">النسبة المئوية البحث مستل من رسالة أو اطروحة
                                    اشرف
                                    عليها
                                    طالب
                                    الترقية:</label>
                                <input type="number" name="Ratio_paper_AppSuperlTheses" id="Ratio_paper_AppSuperlTheses"
                                       value="{{ $selectedPaper->Ratio_paper_AppSuperlTheses}}"
                                       min="0">
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="plagiarised_resource_Sup">مصدر الاستلال من البحث مستل من رسالة أو اطروحة
                                    اشرف
                                    عليها
                                    طالب
                                    الترقية</label>
                                <input type="textarea" class="form-control" name="plagiarised_resource_Sup"
                                       value="{{ $selectedPaper->plagiarised_resource_Sup }}"></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <div class="form-check">
                                    <input type="checkbox" name="Is_paperRelated_CoAuther_Sup"
                                           value="Is_paperRelated_CoAuther_Sup"
                                        {{ $selectedPaper->Is_paperRelated_CoAuther_Sup ? 'checked="checked"' : '' }}/>
                                    <label class="form-check-label" for="Is_paperRelated_CoAuther_Sup">
                                        هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من رسالة أو اطروحة
                                        اشرف
                                        عليها
                                        طالب
                                        الترقية؟
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <div class="form-check">
                                    <input type="checkbox" name="Is_paper_CoSuperTheses" value="Is_paper_CoSuperTheses"
                                        {{ $selectedPaper->Is_paper_CoSuperTheses ? 'checked="checked"' : '' }}/>
                                    <label class="form-check-label" for="Is_paper_CoSuperTheses">
                                        هل البحث مستل من رسالة أو اطروحة اشرف عليها احد الباحثين المشاركين؟
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="Ratio_paper_CoSuperTheses">النسبة المئوية البحث مستل من رسالة أو اطروحة اشرف
                                    عليها
                                    احد
                                    الباحثين
                                    المشاركين:</label>
                                <input type="number" name="Ratio_paper_CoSuperTheses" id="Ratio_paper_CoSuperTheses"
                                       value="{{$selectedPaper->Ratio_paper_CoSuperTheses}}" min="0">
                            </div>
                            {{--           add collection of fields--}}

                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="plagiarised_resource_CoSuper">مصدر الاستلال من البحث مستل من رسالة أو اطروحة
                                    اشرف
                                    عليها احد
                                    الباحثين المشاركين</label>

                                <input type="textarea" class="form-control" name="plagiarised_resource_CoSuper"
                                       value="{{ $selectedPaper->plagiarised_resource_CoSuper }}"></textarea>

                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <div class="form-check">
                                    <input type="checkbox" name="Is_paperRelated_CoSuper"
                                           value="Is_paperRelated_CoSuper"
                                        {{ $selectedPaper->Is_paperRelated_CoSuper ? 'checked="checked"' : '' }}/>
                                    <label class="form-check-label" for="Is_paperRelated_CoSuper">
                                        هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من رسالة أو اطروحة
                                        اشرف
                                        عليها
                                        احد
                                        الباحثين المشاركين؟
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <div class="form-check">
                                    <input type="checkbox" name="Is_paper_CoTheses" value="Is_paper_CoTheses"
                                        {{ $selectedPaper->Is_paper_CoTheses ? 'checked="checked"' : '' }}/>
                                    <label class="form-check-label" for="Is_paper_CoTheses">
                                        هل البحث مستل من رسالة أو اطروحة انجزها احد الباحثين المشاركين؟
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-6">
                                <label for="Ratio_paper_CoTheses">
                                    النسبة المئوية البحث مستل من رسالة أو اطروحة انجزها احد الباحثين المشاركين:
                                </label>
                                <input type="number" name="Ratio_paper_CoTheses" id="Ratio_paper_CoTheses"
                                       value="{{$selectedPaper->Ratio_paper_CoTheses}}" min="0">
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="plagiarised_resource_CoTheses">
                                    مصدر الاستلال من البحث مستل من رسالة أو اطروحة انجزها احد الباحثين المشاركين
                                </label>
                                <input type="textarea" class="form-control" name="plagiarised_resource_CoTheses"
                                       value="{{ $selectedPaper->plagiarised_resource_CoTheses }}"></textarea>
                            </div>
                            {{--
                            begining of the last group of editable fields:
                            --}}
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <input type="checkbox" name="Is_paperRelated_CoTheses" value="Is_paperRelated_CoTheses"
                                    {{ $selectedPaper->Is_paperRelated_CoTheses ? 'checked="checked"' : '' }}/>
                                <label class="form-check-label" for="Is_paperRelated_CoTheses">
                                    هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من رسالة أو اطروحة انجزها
                                    احد
                                    الباحثين
                                    المشاركين؟
                                </label>
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <input type="checkbox" name="Is_paper_OldProm" value="Is_paper_OldProm"
                                    {{ $selectedPaper->Is_paper_OldProm ? 'checked="checked"' : '' }}/>
                                <label class="form-check-label" for="Is_paper_OldProm">
                                    هل البحث مستل من بحث تم استخدامه في ترقية سابقة ؟
                                </label>
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="Ratio_paper_OldProm">
                                    النسبة المئوية للبحث مستل من بحث تم استخدامه في ترقية سابقة :
                                </label>
                                <input type="number" name="Ratio_paper_OldProm" id="Ratio_paper_OldProm"
                                       value="{{$selectedPaper->Ratio_paper_OldProm}}" min="0">
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="plagiarised_resource_OldProm">
                                    مصدر الاستلال للبحث مستل من بحث تم استخدامه في ترقية سابقة :
                                </label>
                                <input type="textarea" class="form-control" name="plagiarised_resource_OldProm"
                                       value="{{$selectedPaper->plagiarised_resource_OldProm}}"></inputtextarea>
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <input type="checkbox" name="Is_paperRelated_CoAuther_OldProm"
                                       value="Is_paperRelated_CoAuther_OldProm"
                                    {{ $selectedPaper->Is_paperRelated_CoAuther_OldProm ? 'checked="checked"' : '' }}/>
                                <label class="form-check-label" for="Is_paperRelated_CoAuther_OldProm">
                                    هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من بحث تم استخدامه في
                                    ترقية
                                    سابقة
                                    ؟
                                </label>
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <input type="checkbox" name="Is_paper_From_Others" value="Is_paper_From_Others"
                                    {{ $selectedPaper->Is_paper_From_Others ? 'checked="checked"' : '' }}/>
                                <label class="form-check-label" for="Is_paper_From_Others">
                                    هل البحث مستل من بحوث آخرى او من شبكة الانترنت؟
                                </label>
                            </div>

                            <div class="form-group col-sm-12 col-md-6 col-lg-12">
                                <label for="Ratio_paper_From_Others">
                                    النسبة المئوية للبحث مستل من بحوث آخرى او من شبكة الانترنت:
                                </label>
                                <input type="number" name="Ratio_paper_From_Others" id="Ratio_paper_From_Others"
                                       value="{{$selectedPaper->Ratio_paper_From_Others}}" min="0">
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="plagiarised_resFrom_Others">
                                    مصدر الاستلال للبحث مستل من بحوث آخرى او من شبكة الانترنت :
                                </label>
                                <input type="textarea" class="form-control" name="plagiarised_resFrom_Others"
                                       value="{{$selectedPaper->plagiarised_resFrom_Others}}"></inputtextarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <input type="checkbox" name="Is_paperRelated_CoAuther_From_Others"
                                       value="Is_paperRelated_CoAuther_From_Others"
                                    {{ $selectedPaper->Is_paperRelated_CoAuther_From_Others ? 'checked="checked"' : '' }}/>
                                <label class="form-check-label" for="Is_paperRelated_CoAuther_From_Others">
                                    هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من بحوث آخرى او من شبكة
                                    الانترنت ؟
                                </label>
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <div class="form-check">
                                    <input type="checkbox" name="sabbaticalLeave" value="sabbaticalLeave"
                                        {{ $selectedPaper->sabbaticalLeave ? 'checked="checked"' : '' }}/>
                                    <label class="form-check-label" for="sabbaticalLeave">
                                        هل البحث ضمن التفرغ العلمي ؟
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="journalName">
                                    اسم المجلة:
                                </label>
                                <input type="text" class="form-control" name="journalName"
                                       value="{{$selectedPaper->journalName}}"></inputtextarea>
                            </div>

                            <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                <label for="journalIssueNa">
                                    عدد المجلة:
                                </label>
                                <input type="number" name="journalIssueNa" id="journalIssueNa"
                                       value="{{$selectedPaper->journalIssueNa}}" min="0">
                            </div>

                            <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                <label for="journalvolume">
                                    مجلد المجلة:
                                </label>
                                <input type="number" name="journalvolume" id="journalvolume"
                                       value="{{$selectedPaper->journalvolume}}" min="0">
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                <label for="totalPoints">
                                    مجموع النقاط:
                                </label>
                                <input type="number" name="totalPoints" id="totalPoints"
                                       value="{{$selectedPaper->totalPoints}}" min="0">
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-4">
                                <label for="TableTypeAorB">جدول الاول او الثاني: </label>
                                <select class="form-control" name="TableTypeAorB">

                                    <option value="1" {{ $selectedPaper->TableTypeAorB==1? 'selected':"" }}>
                                        البحث ضمن الجدول الاول
                                    </option>
                                    <option value="2" {{ $selectedPaper->TableTypeAorB==1? 'selected':"" }}>
                                        البحث ضمن الجدول الثاني
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="ExpertEssessment1">
                                    تقييم خبير1:
                                </label>
                                <input type="textarea" class="form-control" name="ExpertEssessment1"
                                       value="{{$selectedPaper->ExpertEssessment1}}"></inputtextarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="ExpertEssessment2">
                                    تقييم خبير2:
                                </label>
                                <input type="textarea" class="form-control" name="ExpertEssessment2"
                                       VALUE="{{$selectedPaper->ExpertEssessment2}}"></inputtextarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="ExpertEssessment3">
                                    تقييم خبير3:
                                </label>
                                <input type="textarea" class="form-control" name="ExpertEssessment3"
                                       value="{{$selectedPaper->ExpertEssessment3}}">
                                </inputtextarea>
                            </div>

                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="TotalExpertEsses">
                                    مجمل التقويم للخبراء للبحث الواحد:
                                </label>
                                <input type="textarea" class="form-control" name="TotalExpertEsses"
                                       value="{{$selectedPaper->TotalExpertEsses}}"></inputtextarea>
                            </div>

                            <div class="form-check col-sm-12 col-md-12 col-lg-12">
                                <input type="checkbox" name="supportedPaper" value="supportedPaper"
                                    {{ $selectedPaper->supportedPaper ? 'checked="checked"' : '' }}/>
                                <label class="form-check-label" for="supportedPaper">
                                    هل يعتبر بحث التعزيزي ؟
                                </label>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="suppPaper_dateof_application">تأريخ السابق تقديم البحث التعزيزي</label>
                                <input type="date" name="publish_date" id="publish_date"
                                       value="{{date('Y-m-d',trim(strtotime($selectedPaper->publish_date)))}}">

                            </div>
                       {{--
                             <input type="date" id="suppPaper_dateof_application" name="suppPaper_dateof_application"
                                       value="{{ Carbon\Carbon::parse($selectedPaper->suppPaper_dateof_application)->format('Y-m-d') }}">--}}{{--
                            <input type="date" name="suppPaper_dateof_application" id="suppPaper_dateof_application"
                                   VALUE="{{date('Y-m-d',(strtotime($selectedPaper->suppPaper_dateof_application))}}">
                                                      value="{{Carbon\Carbon::parse($selectedPaper->suppPaper_dateof_application)->format('Y-m-d')}}"

--}}
                         {{--   <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                <label for="suppPaper_dateof_application">تأريخ الجديد تقديم البحث التعزيزي</label>
                                <input type="date" id="suppPaper_dateof_application" name="suppPaper_dateof_application"
                            </div>
--}}
                            <div class="form-check col-sm-12 col-md-12 col-lg-12">
                                <input type="checkbox" name="Is_suppPaper_In_SciPlan" value="Is_suppPaper_In_SciPlan"
                                    {{ $selectedPaper->Is_suppPaper_In_SciPlan ? 'checked="checked"' : '' }}/>
                                <label class="form-check-label" for="Is_suppPaper_In_SciPlan">
                                    هل البحوث المقدمة للترقية ضمن الخطة البحثية للقسم ؟
                                </label>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary"> تعديل و حفظ</button>
                            </div>
            </form>

        @else
            {{--
                        add new paper.
            --}}
            <form action="{{ route('hamshs.forms.storef')}}" method="POST">
                <h3>أدخال بحث جديد</h3>
                @csrf
                @role('Applicant')

                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="paper_title">عنوان البحث</label>
                        <textarea class="form-control" style="height:80px" name="paper_title"
                                  placeholder="paper_title"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label for="publish_date">تاريخ النشر</label><br>
                        <input type="date" id="publish_date" name="publish_date">
                    </div>
                </div>
                {{--        how to add new row,  py-3 to add vertical space between columns in the same row --}}
                <div class="form-row">
                    <div class="form-check col-sm-12 col-md-6 col-lg-4 py-3">
                        <input type="checkbox" name="singleAuther" class="form-check-input" value="1"
                            {{ old('singleAuther') ? 'checked="checked"' : '' }}/>
                        <label class="form-check-label" for="singleAuther">
                            هل البحث منفرد؟
                        </label>
                    </div>
                    <div class="form-check col-sm-12 col-md-6 col-lg-4">
                        <input type="checkbox" name="Ispubished" class="form-check-input"
                               value="1" {{ old('Ispubished') ? 'checked="checked"' : '' }}/>
                        <label class="form-check-label" for="Ispubished">
                            هل البحث منشور ؟
                        </label>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4 py-3">
                        <div class="form-check ">
                            <input type="checkbox" name="takenFromStdut_thesis" class="form-check-input"
                                   value="1" {{ old('takenFromStdut_thesis') ? 'checked="checked"' : '' }}/>
                            <label class="form-check-label" for="takenFromStdut_thesis">
                                هل البحث مستل من اطروحة؟
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label for="publishType">تصنيف جهة النشر </label>
                        <select class="form-control" name="publishType">
                            <option value="1">مجلات ذات معامل تأثير</option>
                            <option value="2">مجلات عالمية مطبوعة</option>
                            <option value="3">مجلات عربية وعراقية</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <div class="form-check">
                            <input type="checkbox" name="exact_specialization" class="form-check-input" value="1"
                                {{ old('exact_specialization') ? 'checked="checked"' : '' }}/>
                            <label class="form-check-label" for="exact_specialization">
                                هل البحث ب الاختصاص الدقيق ؟
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <div class="form-check">
                            <input type="checkbox" name="general_specialization" class="form-check-input" value="1"
                                {{ old('exact_specialization') ? 'checked="checked"' : '' }}/>
                            <label class="form-check-label" for="general_specialization">
                                هل البحث ب الاختصاص العام ؟
                            </label>
                        </div>
                    </div>
                    {{--   following columns should be filledout from controller.
                 $table->integer('headCommitee_ID')->nullable();
                    $table->timestamp('headCommitee_createdat')->nullable();--}}

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="plagiarised_Details">تفاصيل الاستلال</label>
                        <textarea class="form-control" style="height:80px" name="plagiarised_Details"
                                  placeholder="plagiarised_Details"></textarea>
                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <div class="form-check">
                            <input type="checkbox" name="Is_paper_fromApplTheses" class="form-check-input" value="1"
                                {{ old('Is_paper_fromApplTheses') ? 'checked="checked"' : '' }}/>
                            <label class="form-check-label" for="Is_paper_fromApplTheses">
                                هل البحث مستل من رسالة أو اطروحة طالب الترقية ؟
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="plagiarised_resource">مصدر الاستلال</label>
                        <textarea class="form-control" style="height:80px" name="plagiarised_resource"
                                  placeholder="plagiarised_resource"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <div class="form-check">
                            <input type="checkbox" name="Is_paperRelated_CoAuther" class="form-check-input"
                                   value="1"
                                {{ old('Is_paperRelated_CoAuther') ? 'checked="checked"' : '' }}/>
                            <label class="form-check-label" for="Is_paperRelated_CoAuther">
                                هل للبحث علاقة مع بحوث اخرى للباحثين المشتركين ؟
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <div class="form-check">
                            <input type="checkbox" name="Is_paper_AppSuperlTheses" class="form-check-input"
                                   value="1"
                                {{ old('Is_paper_AppSuperlTheses') ? 'checked="checked"' : '' }}/>
                            <label class="form-check-label" for="Is_paper_AppSuperlTheses">
                                هل البحث مستل من رسالة أو اطروحة اشرف عليها طالب الترقية؟
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-12">
                        <label for="Ratio_paper_AppSuperlTheses">النسبة المئوية البحث مستل من رسالة أو اطروحة اشرف
                            عليها
                            طالب
                            الترقية:</label>
                        <input type="number" name="Ratio_paper_AppSuperlTheses" id="Ratio_paper_AppSuperlTheses"
                               min="0">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="plagiarised_resource_Sup">مصدر الاستلال من البحث مستل من رسالة أو اطروحة اشرف
                            عليها طالب
                            الترقية</label>
                        <textarea class="form-control" style="height:80px" name="plagiarised_resource_Sup"
                                  placeholder="plagiarised_resource_Sup"></textarea>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <div class="form-check">
                            <input type="checkbox" name="Is_paperRelated_CoAuther_Sup" class="form-check-input"
                                   value="1"
                                {{ old('Is_paperRelated_CoAuther_Sup') ? 'checked="checked"' : '' }}/>
                            <label class="form-check-label" for="Is_paperRelated_CoAuther_Sup">
                                هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من رسالة أو اطروحة اشرف
                                عليها طالب
                                الترقية؟
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <div class="form-check">
                            <input type="checkbox" name="Is_paper_CoSuperTheses" class="form-check-input" value="1"
                                {{ old('Is_paper_CoSuperTheses') ? 'checked="checked"' : '' }}/>
                            <label class="form-check-label" for="Is_paper_CoSuperTheses">
                                هل البحث مستل من رسالة أو اطروحة اشرف عليها احد الباحثين المشاركين؟
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="Ratio_paper_CoSuperTheses">النسبة المئوية البحث مستل من رسالة أو اطروحة اشرف
                            عليها احد
                            الباحثين
                            المشاركين:</label>
                        <input type="number" name="Ratio_paper_CoSuperTheses" id="Ratio_paper_CoSuperTheses"
                               min="0">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="plagiarised_resource_CoSuper">مصدر الاستلال من البحث مستل من رسالة أو اطروحة
                            اشرف عليها
                            احد
                            الباحثين المشاركين</label>
                        <textarea class="form-control" style="height:80px" name="plagiarised_resource_CoSuper"
                                  placeholder="plagiarised_resource_CoSuper"></textarea>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <div class="form-check">
                            <input type="checkbox" name="Is_paperRelated_CoSuper" class="form-check-input" value="1"
                                {{ old('Is_paperRelated_CoSuper') ? 'checked="checked"' : '' }}/>
                            <label class="form-check-label" for="Is_paperRelated_CoSuper">
                                هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من رسالة أو اطروحة اشرف
                                عليها احد
                                الباحثين المشاركين؟
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <div class="form-check">
                            <input type="checkbox" name="Is_paper_CoTheses" class="form-check-input" value="1"
                                {{ old('Is_paper_CoTheses') ? 'checked="checked"' : '' }}/>
                            <label class="form-check-label" for="Is_paper_CoTheses">
                                هل البحث مستل من رسالة أو اطروحة انجزها احد الباحثين المشاركين؟
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-6">
                        <label for="Ratio_paper_CoTheses">
                            النسبة المئوية البحث مستل من رسالة أو اطروحة انجزها احد الباحثين المشاركين:
                        </label>
                        <input type="number" name="Ratio_paper_CoTheses" id="Ratio_paper_CoTheses" min="0">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="plagiarised_resource_CoTheses">
                            مصدر الاستلال من البحث مستل من رسالة أو اطروحة انجزها احد الباحثين المشاركين
                        </label>
                        <textarea class="form-control" style="height:80px" name="plagiarised_resource_CoTheses"
                                  placeholder="plagiarised_resource_CoTheses"></textarea>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <input type="checkbox" name="Is_paperRelated_CoTheses" class="form-check-input" value="1"
                            {{ old('Is_paperRelated_CoTheses') ? 'checked="checked"' : '' }}/>
                        <label class="form-check-label" for="Is_paperRelated_CoTheses">
                            هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من رسالة أو اطروحة انجزها احد
                            الباحثين
                            المشاركين؟
                        </label>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <input type="checkbox" name="Is_paper_OldProm" class="form-check-input" value="1"
                            {{ old('Is_paper_OldProm') ? 'checked="checked"' : '' }}/>
                        <label class="form-check-label" for="Is_paper_OldProm">
                            هل البحث مستل من بحث تم استخدامه في ترقية سابقة ؟
                        </label>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="Ratio_paper_OldProm">
                            النسبة المئوية للبحث مستل من بحث تم استخدامه في ترقية سابقة :
                        </label>
                        <input type="number" name="Ratio_paper_OldProm" id="Ratio_paper_OldProm" min="0">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="plagiarised_resource_OldProm">
                            مصدر الاستلال للبحث مستل من بحث تم استخدامه في ترقية سابقة :
                        </label>
                        <textarea class="form-control" style="height:80px" name="plagiarised_resource_OldProm"
                                  placeholder="plagiarised_resource_OldProm"></textarea>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <input type="checkbox" name="Is_paperRelated_CoAuther_OldProm" class="form-check-input"
                               value="1"
                            {{ old('Is_paperRelated_CoAuther_OldProm') ? 'checked="checked"' : '' }}/>
                        <label class="form-check-label" for="Is_paperRelated_CoAuther_OldProm">
                            هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من بحث تم استخدامه في ترقية
                            سابقة ؟
                        </label>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <input type="checkbox" name="Is_paper_From_Others" class="form-check-input" value="1"
                            {{ old('Is_paper_From_Others') ? 'checked="checked"' : '' }}/>
                        <label class="form-check-label" for="Is_paper_From_Others">
                            هل البحث مستل من بحوث آخرى او من شبكة الانترنت؟
                        </label>
                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-12">
                        <label for="Ratio_paper_From_Others">
                            النسبة المئوية للبحث مستل من بحوث آخرى او من شبكة الانترنت:
                        </label>
                        <input type="number" name="Ratio_paper_From_Others" id="Ratio_paper_From_Others" min="0">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="plagiarised_resFrom_Others">
                            مصدر الاستلال للبحث مستل من بحوث آخرى او من شبكة الانترنت :
                        </label>
                        <textarea class="form-control" style="height:80px" name="plagiarised_resFrom_Others"
                                  placeholder="plagiarised_resFrom_Others"></textarea>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <input type="checkbox" name="Is_paperRelated_CoAuther_From_Others" class="form-check-input"
                               value="1"
                            {{ old('Is_paperRelated_CoAuther_From_Others') ? 'checked="checked"' : '' }}/>
                        <label class="form-check-label" for="Is_paperRelated_CoAuther_From_Others">
                            هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من بحوث آخرى او من شبكة
                            الانترنت ؟
                        </label>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <div class="form-check">
                            <input type="checkbox" name="sabbaticalLeave" class="form-check-input" value="1"
                                {{ old('sabbaticalLeave') ? 'checked="checked"' : '' }}/>
                            <label class="form-check-label" for="sabbaticalLeave">
                                هل البحث ضمن التفرغ العلمي ؟
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label for="journalName">
                            اسم المجلة:
                        </label>
                        <textarea class="form-control" style="height:80px" name="journalName"
                                  placeholder="journalName"></textarea>
                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label for="journalIssueNa">
                            عدد المجلة:
                        </label>
                        <input type="number" name="journalIssueNa" id="journalIssueNa" min="0">
                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label for="journalvolume">
                            مجلد المجلة:
                        </label>
                        <input type="number" name="journalvolume" id="journalvolume" min="0">
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="totalPoints">
                            مجموع النقاط:
                        </label>
                        <input type="number" name="totalPoints" id="totalPoints" min="0">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label for="TableTypeAorB">جدول الاول او الثاني: </label>
                        <select class="form-control" name="TableTypeAorB">
                            <option value="1">البحث ضمن الجدول الاول</option>
                            <option value="2">البحث ضمن الجدول الثاني</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="ExpertEssessment1">
                            تقييم خبير1:
                        </label>
                        <textarea class="form-control" style="height:80px" name="ExpertEssessment1"
                                  placeholder="ExpertEssessment1"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="ExpertEssessment2">
                            تقييم خبير2:
                        </label>
                        <textarea class="form-control" style="height:80px" name="ExpertEssessment2"
                                  placeholder="ExpertEssessment2"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="ExpertEssessment3">
                            تقييم خبير3:
                        </label>
                        <textarea class="form-control" style="height:80px" name="ExpertEssessment3"
                                  placeholder="ExpertEssessment3">
                </textarea>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="TotalExpertEsses">
                            مجمل التقويم للخبراء للبحث الواحد:
                        </label>
                        <textarea class="form-control" style="height:80px" name="TotalExpertEsses"
                                  placeholder="TotalExpertEsses"></textarea>
                    </div>

                    <div class="form-check col-sm-12 col-md-12 col-lg-12">
                        <input type="checkbox" name="supportedPaper" class="form-check-input" value="1"
                            {{ old('supportedPaper') ? 'checked="checked"' : '' }}/>
                        <label class="form-check-label" for="supportedPaper">
                            هل يعتبر بحث التعزيزي ؟
                        </label>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="suppPaper_dateof_application">تأريخ تقديم البحث التعزيزي</label><br>
                        <input type="date" id="suppPaper_dateof_application" name="suppPaper_dateof_application">
                    </div>

                    <div class="form-check col-sm-12 col-md-6 col-lg-4">
                        <input type="checkbox" name="Is_suppPaper_In_SciPlan" class="form-check-input" value="1"
                            {{ old('Is_suppPaper_In_SciPlan') ? 'checked="checked"' : '' }}/>
                        <label class="form-check-label" for="Is_suppPaper_In_SciPlan">
                            هل البحوث المقدمة للترقية ضمن الخطة البحثية للقسم ؟
                        </label>
                    </div>

                    @endrole

                    @role('Coll_Sci_Affairs')

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>شؤون علمية كلية:</strong>
                                <input type="text" name="Sci_plan_Coll_Sci_Affairs" class="form-control"
                                       placeholder="Sci_plan_Coll_Sci_Affairs">
                            </div>
                        </div>
                        @endrole

                        @role('Coll_Dean_ Assistant')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>معاون عميد كلية :</strong>
                                    <input type="text" name="Sci_plan_Coll_Dean_Assis" class="form-control"
                                           placeholder="Sci_plan_Coll_Dean_Assis">
                                </div>
                            </div>
                            @endrole
                            @role('Presidency_Research_Plan_Officer')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>مسؤول خطة بحثية رئاسة :</strong>
                                        <input type="text" name="Sci_plan_presidency_office" class="form-control"
                                               placeholder="Sci_plan_presidency_office">
                                    </div>
                                </div>
                                @endrole
                                @role('President_University_Assistant')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong> مساعد رئيس الجامعة الشؤون العلمية :</strong>
                                            <input type="text"
                                                   name="Sci_plan_Sci_Affairs_President_University_Assistant"
                                                   class="form-control"
                                                   placeholder="Sci_plan_Sci_Affairs_President_University_Assistant">
                                        </div>
                                    </div>
                                    @endrole
                                    @role('presidency_Academic_Promotions_Affairs')
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>المركزية :</strong>
                                                <input type="text"
                                                       name="Sci_plan_presidency_Academic_Promotions_Affairs"
                                                       class="form-control"
                                                       placeholder="Sci_plan_presidency_Academic_Promotions_Affairs">
                                            </div>
                                        </div>
                                        @endrole
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">أضافة البحث</button>
                                    </div>
                                </div>
                            </div>
                        </div>
            </form>

        @endif
    </div>
@endsection
