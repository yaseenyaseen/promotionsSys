@extends('blogs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>أضافة و تعديل قائمة الهوامش لتأييد الخطة البحثية حسب تسلسل المرجعيات</h2>
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

    <form action="{{ route('hamshs.forms.updateHamshsciplan',$hamsh->id) }}" method="POST">
        @method('PUT')
        @role( 'Applicant|admin')
            <div class="col-xs-12 col-sm-12 col-md-12">
                @csrf
                <div class="form-group">
                    <strong>مقدم الطلب :</strong>
                    <input type="text" name="Applicant_hamsh" value="{{ $hamsh->Applicant_hamsh }}" class="form-control"
                           placeholder="Applicant_hamsh">
                </div>
            </div>
            @else

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>مقدم الطلب :</strong>
                            <input type="text" name="Applicant_hamsh" value="{{ $hamsh->Applicant_hamsh }}"
                                   class="form-control" placeholder="Title" readonly>
                        </div>
                    </div>

                    @endrole

                    @role('HeadDepartment_Coll|admin')
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            @csrf
                            <div class="form-group">
                                <strong>هامش رئيس القسم :</strong>
                                <input type="text" name="Sci_Dep_hamsh" value="{{ $hamsh->Sci_Dep_hamsh }}"
                                       class="form-control" placeholder="Sci_Dep_hamsh">
                            </div>
                        </div>
                        @else
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>هامش رئيس القسم :</strong>
                                        <input type="text" name="Sci_Dep_hamsh" value="{{ $hamsh->Sci_Dep_hamsh }}"
                                               class="form-control" placeholder="Sci_Dep_hamsh" readonly>
                                    </div>
                                </div>
                                @endrole

                                @role('Coll_ResearchPlan_Officer|admin')
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        @csrf
                                        <div class="form-group">
                                            <strong>هامش مسؤول خطة بحثية كلية :</strong>
                                            <input type="text" name="official_hamsh"
                                                   value="{{ $hamsh->official_hamsh }}"
                                                   class="form-control" placeholder="official_hamsh">
                                        </div>
                                    </div>
                                    @else
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>هامش مسؤول خطة بحثية كلية:</strong>
                                                    <input type="text" name="official_hamsh"
                                                           value="{{ $hamsh->official_hamsh }}" class="form-control"
                                                           placeholder="official_hamsh" readonly>
                                                </div>
                                            </div>
                                            @endrole

                                            @role('Coll_Sci_Affairs|admin')

                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <strong>شؤون علمية كلية:</strong>
                                                        <input type="text" name="Sci_plan_Coll_Sci_Affairs"
                                                               value="{{ $hamsh->Sci_plan_Coll_Sci_Affairs }}"
                                                               class="form-control"
                                                               placeholder="Sci_plan_Coll_Sci_Affairs">
                                                    </div>
                                                </div>
                                                @endrole

                                                @role('Coll_Dean_ Assistant')
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <strong>معاون عميد كلية :</strong>
                                                            <input type="text" name="Sci_plan_Coll_Dean_Assis"
                                                                   value="{{ $hamsh->Sci_plan_Coll_Dean_Assis }}"
                                                                   class="form-control"
                                                                   placeholder="Sci_plan_Coll_Dean_Assis">
                                                        </div>
                                                    </div>
                                                    @endrole
                                                    @role('Presidency_Research_Plan_Officer|admin')
                                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                            <div class="form-group">
                                                                <strong>مسؤول خطة بحثية رئاسة :</strong>
                                                                <input type="text" name="Sci_plan_presidency_office"
                                                                       value="{{ $hamsh->Sci_plan_presidency_office }}"
                                                                       class="form-control"
                                                                       placeholder="Sci_plan_presidency_office">
                                                            </div>
                                                        </div>
                                                        @endrole
                                                        @role('President_University_Assistant|admin')
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <strong> مساعد رئيس الجامعة الشؤون العلمية
                                                                        :</strong>
                                                                    <input type="text"
                                                                           name="Sci_plan_Sci_Affairs_President_University_Assistant"
                                                                           value="{{ $hamsh->Sci_plan_Sci_Affairs_President_University_Assistant }}"
                                                                           class="form-control"
                                                                           placeholder="Sci_plan_Sci_Affairs_President_University_Assistant">
                                                                </div>
                                                            </div>
                                                            @endrole
                                                            @role('presidency_Academic_Promotions_Affairs|admin')
                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <strong>المركزية :</strong>
                                                                        <input type="text"
                                                                               name="Sci_plan_presidency_Academic_Promotions_Affairs"
                                                                               value="{{ $hamsh->Sci_plan_presidency_Academic_Promotions_Affairs}}"
                                                                               class="form-control"
                                                                               placeholder="Sci_plan_presidency_Academic_Promotions_Affairs">
                                                                    </div>
                                                                </div>
                                                                @endrole
                                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                                    <button type="submit" class="btn btn-primary">حفظ
                                                                    </button>
                                                                </div>

    </form>
    <br>
    <br>
<br>

@endsection


