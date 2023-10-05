@extends('blogs.layout')

@section('content')

    <div class="row" dir="rtl">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>متطلبات الترقية-محضر الاستلال العلمي للترقية العلمية </h2>
                <br>
                <br>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                    @role('admin') {{--//add head department role--}}
                    <br>
                    <h5>رئيس لجنة الاستلال  </h5>
                @if(is_null($ScientificPlagiarisedMinute))
                        <br>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('createScientific_plagiarised_minutes',$user_id) }}"> {{--// done--}}
                                البدء بترويج محضر الاستلال العلمي
                            </a>
                        </div>
                    @else
                        <div class="pull-right">
                            <a class="btn btn-success" href={{route('NewApplicationBoard')}}> صفحة الاستمارات المطلوبة</a>
                        </div>
                        <div>

                        <tr>
                            <br>
                            <br>
                            <td>
                                    <a class="btn btn-info"
                                       href="{{ route('showScientific_plagiarised_minutes',$ScientificPlagiarisedMinute) }}">طباعةمحضر الاستلال العلمي</a>

                                    <a class="btn btn-primary" href="{{ route('editScientific_plagiarised_minutes',$ScientificPlagiarisedMinute) }}">
                                        اضافة أو تعديل محضر الاستلال العلمي </a>

                            </td>
                        </tr>

<br>
                            <label>
                                بناءً على الأمر الإداري المرقم (               ) في (    /     /   20 )، اجتمعت لجنة الاستلال العلمي للنظر في البحوث المقدمة من قبل  التدريسي (                             ) ضمن معاملته للترقية العلمية إلى مرتبة (                 ) واطلعت على البحوث الآتية :


                            </label>
                            <br>

                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">عنوان البحث</th>
                                    <th scope="col">هل البحث منفرد؟</th>
                                    <th scope="col">هل البحث منشور؟</th>
                                    <th scope="col">تفاصيل الاستلال</th>
                                    {{--<th scope="col">اسماء الباحثين المشاركين في البحث</th>--}}

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($papers as $paper)
                                    <tr>
                                        <td>{{ $paper['paper_title'] }}</td>
                                        <td>
                                            @if($paper->singleAuther)
                                                <input class="form-check-input" type="checkbox" onclick="return false;" name="singleAuther"
                                                       value="singleAuther"
                                                    {{ $paper->singleAuther ? 'checked="checked"' : ''}}>
                                            @endif
                                        </td>
                                        <td>
                                            @if($paper->Ispubished)
                                                <input class="form-check-input" type="checkbox" onclick="return false;" name="Ispubished"
                                                       value="Ispubished"
                                                    {{ $paper->Ispubished ? 'checked="checked"' : ''}}>
                                            @endif
                                        </td>
                                        <td>{{ $paper['plagiarised_Details'] }}</td>
                                 {{--   <td>
                                       it is challenges to send coauthers list from controller, of indivisual id of each paper.
                                        <td>{{$selectedco_authers[0]->id}} <input type="hidden" name="selectedco_auther_id" value="{{$selectedco_authers[0]->id}}"></td>
                                        <td><input type="text" name="selectedco_auther_name" value="{{$selectedco_authers[0]->autherName}}"></td>
                                        <td><input type="number" name="selectedco_auther_order" value="{{$selectedco_authers[0]->order}}"></td>



                                    </td>--}}
                                    </tr>

                                @endforeach
                          <br>
                                <lable>
                                    اسئلة تخص الاستلال
                                </lable>
                                <br>

                                @foreach($papers as $paper)
                                    <br>
                                    {{ $paper['paper_title'] }}
                                    <br>
                                    <div class="form-check col-sm-12 col-md-6 col-lg-4  py-2">
                                        <input type="checkbox" name="Is_paper_fromApplTheses" class="form-check-input"
                                               value="Is_paper_fromApplTheses"
                                            {{ $paper->Is_paper_fromApplTheses ? 'checked="checked"' : '' }}/>
                                        <label class="form-check-label" for="Is_paper_fromApplTheses">
                                            هل البحث مستل من رسالة أو اطروحة طالب الترقية ؟
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                        <label for="plagiarised_resource">مصدر الاستلال</label>
                                        <input type="textarea" class="form-control" name="plagiarised_resource"
                                               value="{{ $paper->plagiarised_resource }}"></textarea>
                                    </div>
                                    <div class="form-check col-sm-12 col-md-12 col-lg-12">
                                        <input type="checkbox" name="Is_paperRelated_CoAuther" class="form-check-input"
                                               value="Is_paperRelated_CoAuther"
                                            {{ $paper->Is_paperRelated_CoAuther ? 'checked="checked"' : '' }}/>
                                        <label class="form-check-label" for="Is_paperRelated_CoAuther">
                                            هل للبحث علاقة مع بحوث اخرى للباحثين المشتركين ؟
                                        </label>
                                    </div>
                                    <div class="form-check col-sm-12 col-md-12 col-lg-12">
                                        <input type="checkbox" name="Is_paper_AppSuperlTheses" class="form-check-input"
                                               value="Is_paper_AppSuperlTheses"
                                            {{ $paper->Is_paper_AppSuperlTheses ? 'checked="checked"' : '' }}/>
                                        <label class="form-check-label" for="Is_paper_AppSuperlTheses">
                                            هل البحث مستل من رسالة أو اطروحة اشرف عليها طالب الترقية؟
                                        </label>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-12">
                                        <label for="Ratio_paper_AppSuperlTheses">النسبة المئوية البحث مستل من رسالة أو اطروحة
                                            اشرف
                                            عليها
                                            طالب
                                            الترقية:</label>
                                        <input type="number" name="Ratio_paper_AppSuperlTheses" id="Ratio_paper_AppSuperlTheses"
                                               value="{{ $paper->Ratio_paper_AppSuperlTheses}}"
                                               min="0">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                        <label for="plagiarised_resource_Sup">مصدر الاستلال من البحث مستل من رسالة أو اطروحة
                                            اشرف
                                            عليها
                                            طالب
                                            الترقية</label>
                                        <input type="textarea" class="form-control" name="plagiarised_resource_Sup"
                                               value="{{ $paper->plagiarised_resource_Sup }}"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" name="Is_paperRelated_CoAuther_Sup" class="form-check-input"
                                                   value="Is_paperRelated_CoAuther_Sup"
                                                {{ $paper->Is_paperRelated_CoAuther_Sup ? 'checked="checked"' : '' }}/>
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
                                            <input type="checkbox" name="Is_paper_CoSuperTheses" class="form-check-input"
                                                   value="Is_paper_CoSuperTheses"
                                                {{ $paper->Is_paper_CoSuperTheses ? 'checked="checked"' : '' }}/>
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
                                               value="{{$paper->Ratio_paper_CoSuperTheses}}" min="0">
                                    </div>
                                    {{--           add collection of fields--}}

                                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                        <label for="plagiarised_resource_CoSuper">مصدر الاستلال من البحث مستل من رسالة أو اطروحة
                                            اشرف
                                            عليها احد
                                            الباحثين المشاركين</label>

                                        <input type="textarea" class="form-control" name="plagiarised_resource_CoSuper"
                                               value="{{ $paper->plagiarised_resource_CoSuper }}"></textarea>

                                    </div>

                                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" name="Is_paperRelated_CoSuper" class="form-check-input"
                                                   value="Is_paperRelated_CoSuper"
                                                {{ $paper->Is_paperRelated_CoSuper ? 'checked="checked"' : '' }}/>
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
                                            <input type="checkbox" name="Is_paper_CoTheses" class="form-check-input"
                                                   value="Is_paper_CoTheses"
                                                {{ $paper->Is_paper_CoTheses ? 'checked="checked"' : '' }}/>
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
                                               value="{{$paper->Ratio_paper_CoTheses}}" min="0">
                                    </div>

                                    <div class=" col-sm-12 col-md-12 col-lg-12">
                                        <label for="plform-groupagiarised_resource_CoTheses">
                                            مصدر الاستلال من البحث مستل من رسالة أو اطروحة انجزها احد الباحثين المشاركين
                                        </label>
                                        <input type="textarea" class="form-control" name="plagiarised_resource_CoTheses"
                                               value="{{ $paper->plagiarised_resource_CoTheses }}"></textarea>
                                    </div>
                                    {{--
                                    begining of the last group of editable fields:
                                    --}}
                                    <div class="form-check col-sm-12 col-md-12 col-lg-12">
                                        <input type="checkbox" name="Is_paperRelated_CoTheses" class="form-check-input"
                                               value="Is_paperRelated_CoTheses"
                                            {{ $paper->Is_paperRelated_CoTheses ? 'checked="checked"' : '' }}/>
                                        <label class="form-check-label" for="Is_paperRelated_CoTheses">
                                            هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من رسالة أو اطروحة انجزها
                                            احد
                                            الباحثين
                                            المشاركين؟
                                        </label>
                                    </div>

                                    <div class="form-check col-sm-12 col-md-12 col-lg-12">
                                        <input type="checkbox" name="Is_paper_OldProm" class="form-check-input"
                                               value="Is_paper_OldProm"
                                            {{ $paper->Is_paper_OldProm ? 'checked="checked"' : '' }}/>
                                        <label class="form-check-label" for="Is_paper_OldProm">
                                            هل البحث مستل من بحث تم استخدامه في ترقية سابقة ؟
                                        </label>
                                    </div>

                                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                        <label for="Ratio_paper_OldProm">
                                            النسبة المئوية للبحث مستل من بحث تم استخدامه في ترقية سابقة :
                                        </label>
                                        <input type="number" name="Ratio_paper_OldProm" id="Ratio_paper_OldProm"
                                               value="{{$paper->Ratio_paper_OldProm}}" min="0">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                        <label for="plagiarised_resource_OldProm">
                                            مصدر الاستلال للبحث مستل من بحث تم استخدامه في ترقية سابقة :
                                        </label>
                                        <input type="textarea" class="form-control" name="plagiarised_resource_OldProm"
                                               value="{{$paper->plagiarised_resource_OldProm}}"></inputtextarea>
                                    </div>

                                    <div class="form-check col-sm-12 col-md-12 col-lg-12">
                                        <input type="checkbox" name="Is_paperRelated_CoAuther_OldProm" class="form-check-input"
                                               value="Is_paperRelated_CoAuther_OldProm"
                                            {{ $paper->Is_paperRelated_CoAuther_OldProm ? 'checked="checked"' : '' }}/>
                                        <label class="form-check-label" for="Is_paperRelated_CoAuther_OldProm">
                                            هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من بحث تم استخدامه في
                                            ترقية
                                            سابقة
                                            ؟
                                        </label>
                                    </div>

                                    <div class="form-check col-sm-12 col-md-12 col-lg-12">
                                        <input type="checkbox" name="Is_paper_From_Others" class="form-check-input"
                                               value="Is_paper_From_Others"
                                            {{ $paper->Is_paper_From_Others ? 'checked="checked"' : '' }}/>
                                        <label class="form-check-label" for="Is_paper_From_Others">
                                            هل البحث مستل من بحوث آخرى او من شبكة الانترنت؟
                                        </label>
                                    </div>

                                    <div class="form-group col-sm-12 col-md-6 col-lg-12">
                                        <label for="Ratio_paper_From_Others">
                                            النسبة المئوية للبحث مستل من بحوث آخرى او من شبكة الانترنت:</label>
                                        <input type="number" name="Ratio_paper_From_Others" id="Ratio_paper_From_Others"
                                               value="{{$paper->Ratio_paper_From_Others}}" min="0">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                                        <label for="plagiarised_resFrom_Others">
                                            مصدر الاستلال للبحث مستل من بحوث آخرى او من شبكة الانترنت :
                                        </label>
                                        <input type="textarea" class="form-control" name="plagiarised_resFrom_Others"
                                               value="{{$paper->plagiarised_resFrom_Others}}"></inputtextarea>
                                    </div>
                                    <div class="form-check col-sm-12 col-md-12 col-lg-12">
                                        <input type="checkbox" name="Is_paperRelated_CoAuther_From_Others" class="form-check-input"
                                               value="Is_paperRelated_CoAuther_From_Others"
                                            {{ $paper->Is_paperRelated_CoAuther_From_Others ? 'checked="checked"' : '' }}/>
                                        <label class="form-check-label" for="Is_paperRelated_CoAuther_From_Others">
                                            هل للبحث علاقة مع بحوث آخرى للباحثين المشاركين للبحث مستل من بحوث آخرى او من شبكة
                                            الانترنت ؟
                                        </label>
                                    </div>
                                @endforeach


                             <br>   <lable>
                                    واطلعت اللجنة على رسالة الماجستير الموسومة :

                                    و اطروحة الدكتوراه والموسومة :

                                    كما اطلعت اللجنة على الرسائل والأطاريح للباحثين المشتركين وهي:

                                </lable>  <br>
    <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label> استمارة معلومات الشهادات التي انجزها مقدم الترقية
                                            </label>


                                            <table class="table table-dark">
                                                <thead>
                                                <tr>
                                                    <th>عنوان الاطروحة:</th>
                                                    <th>  اسم المؤلف:</th>
                                                    <th> اسم المشرف:</th>
                                                    <th>  الشهادة (دبلوم/ماجستير/دكتوراة):</th>
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
<br>
                                            <label>

                                                واطلعت على تقرير الاستلال الالكتروني للبحوث المقدمة للترقية.

                                            </label>
                                            <br>
                        @endrole
                    @endif

    <br>
        <br>
        <br>

@endsection
