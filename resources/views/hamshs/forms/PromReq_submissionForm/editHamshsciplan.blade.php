@extends('blogs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>تعديل هامش-استمارة تقديم الطلب للترقية العلمية</h2>
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

    <form action="{{ route('hamshs.forms.updateHamshsrequest_applying',$hamsh->id) }}" method="POST">
        @method('PUT')
        @role('Applicant')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                @csrf
                <div class="form-group">
                    <label>
                        نظراً لاستحقاقي الترقية العلمية الى مرتبة ( ) يرجى التفضل بالموافقة على ترويج معاملة ترقيتي وذلك
                        لاكمالي المدة القانونية اللازمة او قبل سنة من تاريخ استحقاق الترقية وفقا للفقرة (اولا – 1) من
                        القرار 315 لسنة 1988 ، علما ان بحوثي المقدمة للترقية العلمية هي :
                    </label>
                    <strong>مقدم الطلب :</strong><br>
                    <input type="text" name="Applicant_hamsh" value="{{ $hamsh->Applicant_hamsh }}" class="form-control"
                           placeholder="Applicant_hamsh">
                </div>
            </div>
            @else
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>مقدم الطلب :</strong>
                            <input type="text" name="Sci_plan_Applicant" value="{{ $hamsh->Applicant_hamsh }}"
                                   class="form-control" placeholder="Title" readonly>
                        </div>
                    </div>
                    @endrole
                    @role('HeadDepartment_Coll')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            @csrf
                            <div class="form-group">
                                <strong> هامش السيد رئيس القسم :</strong><br>
                                <input type="text" name="Sci_Dep_hamsh" value="{{ $hamsh->Sci_Dep_hamsh }}"
                                       class="form-control"
                                       placeholder="Sci_Dep_hamsh">
                            </div>
                        </div>
                        @else
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>هامش السيد رئيس القسم :</strong>
                                        <input type="text" name="Sci_Dep_hamsh" value="{{ $hamsh->Sci_Dep_hamsh }}"
                                               class="form-control" placeholder="Sci_Dep_hamsh" readonly>
                                    </div>
                                </div>

                                @endrole

                                @role('Dean')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        @csrf
                                        <div class="form-group">
                                            <strong>هامش السيد عميد الكلية :</strong>
                                            <input type="text" name="Dean_hamsh" value="{{ $hamsh->Dean_hamsh }}"
                                                   class="form-control" placeholder="Dean_hamsh">
                                        </div>
                                    </div>
                                    @else
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>هامش السيد عميد الكلية :</strong>
                                                    <input type="text" name="Dean_hamsh"
                                                           value="{{ $hamsh->Dean_hamsh }}"
                                                           class="form-control" placeholder="Dean_hamsh" readonly>
                                                </div>
                                            </div>
                                            @endrole
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                <button type="submit" class="btn btn-primary">حفظ</button>
                                            </div>
                                        </div>

    </form>
@endsection


