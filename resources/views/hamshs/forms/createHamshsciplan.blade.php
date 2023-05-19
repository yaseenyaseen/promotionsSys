@extends('blogs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>أضافة الهامش على استمارة الخطة البحثية</h2>
                <h3>ملاحظة بعض الحقول غير مفعله لان الاضافة حسب الدور للمسؤول </h3>

            </div>
            <div class="pull-right">
                {{--
                                <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
                --}}
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
    <form action="{{ route('hamshs.forms.storefH') }}" method="POST">
        @csrf
        @role('Applicant|admin')

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>هامش مقدم الطلب :</strong>
                <input type="text" name="Applicant_hamsh" class="form-control" placeholder="Applicant_hamsh">
            </div>
        </div>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="{{ date('Y-m-d') }}">

        @endrole
        @role('HeadDepartment_Coll|admin')

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>هامش رئيس القسم العلمي:</strong>
                <input type="text" name="Sci_Dep_hamsh" class="form-control" placeholder="Sci_Dep_hamsh">
            </div>
        </div>
        @endrole
        @role('Coll_Sci_Affairs|admin')

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>هامش شؤون علمية كلية:</strong>
                    <input type="text" name="Sci_plan_Coll_Sci_Affairs" class="form-control"
                           placeholder="Sci_plan_Coll_Sci_Affairs">
                </div>
            </div>
            @endrole

            @role('Coll_Dean_ Assistant|admin')
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>هامش معاون عميد كلية :</strong>
                        <input type="text" name="Sci_plan_Coll_Dean_Assis" class="form-control"
                               placeholder="Sci_plan_Coll_Dean_Assis">
                    </div>
                </div>
                @endrole
                @role('Presidency_Research_Plan_Officer|admin')
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>هامش مسؤول خطة بحثية رئاسة :</strong>
                            <input type="text" name="Sci_plan_presidency_office" class="form-control"
                                   placeholder="Sci_plan_presidency_office">
                        </div>
                    </div>
                    @endrole
                    @role('President_University_Assistant|admin')
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> هامش مساعد رئيس الجامعة الشؤون العلمية :</strong>
                                <input type="text" name="Sci_plan_Sci_Affairs_President_University_Assistant"
                                       class="form-control"
                                       placeholder="Sci_plan_Sci_Affairs_President_University_Assistant">
                            </div>
                        @endrole
                        @role('presidency_Academic_Promotions_Affairs|admin')
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>هامش لجنة الترقيات المركزية :</strong>
                                    <input type="text" name="Sci_plan_presidency_Academic_Promotions_Affairs"
                                           class="form-control"
                                           placeholder="Sci_plan_presidency_Academic_Promotions_Affairs">
                                </div>
                            </div>
                            @endrole


                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>

    </form>
@endsection
