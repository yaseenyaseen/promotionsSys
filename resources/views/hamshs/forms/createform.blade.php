@extends('blogs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
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
    {{--<form action="{{ action('HamshController@store') }}" method="POST">--}}

    <form action="{{ route('hamshs.forms.storef') }}" method="POST">
        @csrf
        @role('Applicant')

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="paper_title">عنوان البحث</label>
                <textarea class="form-control" style="height:80px" name="paper_title"
                          placeholder="paper_title"></textarea>
            </div>
            <div class="form-group col-md-4">
                <label for="publish_date">تاريخ النشر</label>
                <input type="datetime-local" id="publish_date" name="publish_date">
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="singleAuther" class="form-check-input" value="1"
                        {{ old('singleAuther') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="singleAuther">
                        هل البحث منفرد؟
                    </label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="Ispubished" class="form-check-input"
                           value="1" {{ old('Ispubished') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Ispubished">
                        هل البحث منشور ؟
                    </label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="takenFromStdut_thesis" class="form-check-input"
                           value="1" {{ old('takenFromStdut_thesis') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="takenFromStdut_thesis">
                        هل البحث مستل من اطروحة؟
                    </label>
                </div>
            </div>

            <div class="form-group col-md-9">
                <label for="publishType">تصنيف جهة النشر </label>
                <select class="form-control" name="publishType">
                    <option value="1">مجلات ذات معامل تأثير</option>
                    <option value="2">مجلات عالمية مطبوعة</option>
                    <option value="3">مجلات عربية وعراقية</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="exact_specialization" class="form-check-input" value="1"
                        {{ old('exact_specialization') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="exact_specialization">
                        هل البحث ب الاختصاص الدقيق ؟
                    </label>
                </div>
            </div>
            <div class="form-group col-md-3">
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

            <div class="form-group col-md-12">
                <label for="plagiarised_Details">تفاصيل الاستلال</label>
                <textarea class="form-control" style="height:80px" name="plagiarised_Details"
                          placeholder="plagiarised_Details"></textarea>
            </div>

            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="Is_paper_fromApplTheses" class="form-check-input" value="1"
                        {{ old('Is_paper_fromApplTheses') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Is_paper_fromApplTheses">
                        هل البحث مستل من رسالة أو اطروحة طالب الترقية ؟
                    </label>
                </div>
            </div>

            <div class="form-group col-md-12">
                <label for="plagiarised_resource">مصدر الاستلال</label>
                <textarea class="form-control" style="height:80px" name="plagiarised_resource"
                          placeholder="plagiarised_resource"></textarea>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="Is_paperRelated_CoAuther" class="form-check-input" value="1"
                        {{ old('Is_paperRelated_CoAuther') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Is_paperRelated_CoAuther">
                        هل للبحث علاقة مع بحوث اخرى للباحثين المشتركين ؟
                    </label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="Is_paper_AppSuperlTheses" class="form-check-input" value="1"
                        {{ old('Is_paper_AppSuperlTheses') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Is_paper_AppSuperlTheses">
                        هل البحث مستل من رسالة أو اطروحة اشرف عليها طالب الترقية؟
                    </label>
                </div>
            </div>


            <label for="integer-input">النسبة المئوية البحث مستل من رسالة أو اطروحة اشرف عليها طالب الترقية:</label>
            <input type="number" name="Ratio_paper_AppSuperlTheses" id="Ratio_paper_AppSuperlTheses" min="0">
            <div class="form-group col-md-12">
                <label for="plagiarised_resource_Sup">مصدر الاستلال من البحث مستل من رسالة أو اطروحة اشرف عليها طالب
                    الترقية</label>
                <textarea class="form-control" style="height:80px" name="plagiarised_resource_Sup"
                          placeholder="plagiarised_resource_Sup"></textarea>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="Is_paperRelated_CoAuther_Sup" class="form-check-input" value="1"
                        {{ old('Is_paperRelated_CoAuther_Sup') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Is_paperRelated_CoAuther_Sup">
                        هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من رسالة أو اطروحة اشرف عليها طالب
                        الترقية؟
                    </label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="Is_paper_CoSuperTheses" class="form-check-input" value="1"
                        {{ old('Is_paper_CoSuperTheses') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Is_paper_CoSuperTheses">
                        هل البحث مستل من رسالة أو اطروحة اشرف عليها احد الباحثين المشاركين؟
                    </label>
                </div>
            </div>
            <label for="integer-input">النسبة المئوية البحث مستل من رسالة أو اطروحة اشرف عليها احد الباحثين
                المشاركين:</label>
            <input type="number" name="Ratio_paper_CoSuperTheses" id="Ratio_paper_CoSuperTheses" min="0">

            <div class="form-group col-md-12">
                <label for="plagiarised_resource_CoSuper">مصدر الاستلال من البحث مستل من رسالة أو اطروحة اشرف عليها احد
                    الباحثين المشاركين</label>
                <textarea class="form-control" style="height:80px" name="plagiarised_resource_CoSuper"
                          placeholder="plagiarised_resource_CoSuper"></textarea>
            </div>

            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="Is_paperRelated_CoSuper" class="form-check-input" value="1"
                        {{ old('Is_paperRelated_CoSuper') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Is_paperRelated_CoSuper">
                        هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من رسالة أو اطروحة اشرف عليها احد
                        الباحثين المشاركين؟
                    </label>
                </div>
            </div>


            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="Is_paper_CoTheses" class="form-check-input" value="1"
                        {{ old('Is_paper_CoTheses') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Is_paper_CoTheses">
                        هل البحث مستل من رسالة أو اطروحة انجزها احد الباحثين المشاركين؟
                    </label>
                </div>
            </div>
            <label for="Ratio_paper_CoTheses">
                النسبة المئوية البحث مستل من رسالة أو اطروحة انجزها احد الباحثين المشاركين:
            </label>
            <input type="number" name="Ratio_paper_CoTheses" id="Ratio_paper_CoTheses" min="0">

            <div class="form-group col-md-12">
                <label for="plagiarised_resource_CoTheses">
                    مصدر الاستلال من البحث مستل من رسالة أو اطروحة انجزها احد الباحثين المشاركين
                </label>
                <textarea class="form-control" style="height:80px" name="plagiarised_resource_CoTheses"
                          placeholder="plagiarised_resource_CoTheses"></textarea>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="Is_paperRelated_CoTheses" class="form-check-input" value="1"
                        {{ old('Is_paperRelated_CoTheses') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Is_paperRelated_CoTheses">
                        هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من رسالة أو اطروحة انجزها احد الباحثين
                        المشاركين؟
                    </label>
                </div>
            </div>


            <div class="form-group col-md-5">
                <div class="form-check">
                    <input type="checkbox" name="Is_paper_OldProm" class="form-check-input" value="1"
                        {{ old('Is_paper_OldProm') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Is_paper_OldProm">
                        هل البحث مستل من بحث تم استخدامه في ترقية سابقة ؟
                    </label>
                </div>
            </div>

            <label for="Ratio_paper_OldProm">
                النسبة المئوية للبحث مستل من بحث تم استخدامه في ترقية سابقة :
            </label>
            <input type="number" name="Ratio_paper_OldProm" id="Ratio_paper_OldProm" min="0">
            <div class="form-group col-md-12">
                <label for="plagiarised_resource_OldProm">
                    مصدر الاستلال للبحث مستل من بحث تم استخدامه في ترقية سابقة :
                </label>
                <textarea class="form-control" style="height:80px" name="plagiarised_resource_OldProm"
                          placeholder="plagiarised_resource_OldProm"></textarea>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="Is_paperRelated_CoAuther_OldProm" class="form-check-input" value="1"
                        {{ old('Is_paperRelated_CoAuther_OldProm') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Is_paperRelated_CoAuther_OldProm">
                        هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من بحث تم استخدامه في ترقية سابقة ؟
                    </label>
                </div>
            </div>
            <div class="form-group col-md-5">
                <div class="form-check">
                    <input type="checkbox" name="Is_paper_From_Others" class="form-check-input" value="1"
                        {{ old('Is_paper_From_Others') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Is_paper_From_Others">
                        هل البحث مستل من بحوث آخرى او من شبكة الانترنت؟
                    </label>
                </div>
            </div>
            <label for="Ratio_paper_From_Others">
                النسبة المئوية للبحث مستل من بحوث آخرى او من شبكة الانترنت:
            </label>
            <input type="number" name="Ratio_paper_From_Others" id="Ratio_paper_From_Others" min="0">
            <div class="form-group col-md-12">
                <label for="plagiarised_resFrom_Others">
                    مصدر الاستلال للبحث مستل من بحوث آخرى او من شبكة الانترنت :
                </label>
                <textarea class="form-control" style="height:80px" name="plagiarised_resFrom_Others"
                          placeholder="plagiarised_resFrom_Others"></textarea>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="Is_paperRelated_CoAuther_From_Others" class="form-check-input"
                           value="1"
                        {{ old('Is_paperRelated_CoAuther_From_Others') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="Is_paperRelated_CoAuther_From_Others">
                        هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من بحوث آخرى او من شبكة الانترنت ؟
                    </label>
                </div>

            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="sabbaticalLeave" class="form-check-input" value="1"
                        {{ old('sabbaticalLeave') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="sabbaticalLeave">
                        هل البحث ضمن التفرغ العلمي ؟
                    </label>
                </div>

            </div>
            <div class="form-group col-md-12">
                <label for="journalName">
                    اسم المجلة:
                </label>
                <textarea class="form-control" style="height:80px" name="journalName"
                          placeholder="journalName"></textarea>
            </div>
            <label for="journalIssueNa">
                عدد المجلة:
            </label>
            <input type="number" name="journalIssueNa" id="journalIssueNa" min="0">
            <label for="journalvolume">
                مجلد المجلة:
            </label>
            <input type="number" name="journalvolume" id="journalvolume" min="0">

            <label for="totalPoints">
                مجموع النقاط:
            </label>
            <input type="number" name="totalPoints" id="totalPoints" min="0">

            <div class="form-group col-md-9">
                <label for="TableTypeAorB">جدول الاول او الثاني: </label>
                <select class="form-control" name="TableTypeAorB">
                    <option value="1">البحث ضمن الجدول الاول</option>
                    <option value="2">البحث ضمن الجدول الثاني</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <label for="ExpertEssessment1">
                    تقييم خبير1:
                </label>
                <textarea class="form-control" style="height:80px" name="ExpertEssessment1"
                          placeholder="ExpertEssessment1"></textarea>
            </div>
            <div class="form-group col-md-12">
                <label for="ExpertEssessment2">
                    تقييم خبير2:
                </label>
                <textarea class="form-control" style="height:80px" name="ExpertEssessment2"
                          placeholder="ExpertEssessment2"></textarea>
            </div>
            <div class="form-group col-md-12">
                <label for="ExpertEssessment3">
                    تقييم خبير3:
                </label>
                <textarea class="form-control" style="height:80px" name="ExpertEssessment3"
                          placeholder="ExpertEssessment3">

                </textarea>
            </div>
            <div class="form-group col-md-12">
                <label for="TotalExpertEsses">
                    مجمل التقويم للخبراء للبحث الواحد:
                </label>
                <textarea class="form-control" style="height:80px" name="TotalExpertEsses"
                          placeholder="TotalExpertEsses"></textarea>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input type="checkbox" name="supportedPaper" class="form-check-input" value="1"
                        {{ old('supportedPaper') ? 'checked="checked"' : '' }}/>
                    <label class="form-check-label" for="supportedPaper">
                        هل يعتبر بحث التعزيزي ؟
                    </label>
                </div>
                <div class="form-group col-md-12">
                    <label for="suppPaper_dateof_application">تأريخ تقديم البحث التعزيزي </label>
                    <input type="datetime-local" id="suppPaper_dateof_application" name="suppPaper_dateof_application">
                </div>
                <div class="form-group col-md-12">
                    <div class="form-check">
                        <input type="checkbox" name="Is_suppPaper_In_SciPlan" class="form-check-input" value="1"
                            {{ old('Is_suppPaper_In_SciPlan') ? 'checked="checked"' : '' }}/>
                        <label class="form-check-label" for="Is_suppPaper_In_SciPlan">
                            هل البحوث المقدمة للترقية ضمن الخطة البحثية للقسم ؟
                        </label>
                    </div>
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
                                        <input type="text" name="Sci_plan_Sci_Affairs_President_University_Assistant"
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
                                            <input type="text" name="Sci_plan_presidency_Academic_Promotions_Affairs"
                                                   class="form-control"
                                                   placeholder="Sci_plan_presidency_Academic_Promotions_Affairs">
                                        </div>
                                    </div>
                                    @endrole

                                    {{--  <div class="col-xs-12 col-sm-12 col-md-12">
                                          <div class="form-group">
                                              <strong>Description:</strong>
                                              <textarea class="form-control" style="height:280px" name="description" placeholder="Description"></textarea>
                                          </div>
        --}}


                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
    </form>
@endsection
