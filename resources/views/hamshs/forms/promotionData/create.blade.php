@extends('blogs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>أضافة بيانات على استمارة ملخص معاملة الترقية</h2>
                <h3>ملاحظة: تكون الاضافة حسب الدور للمسؤول </h3>

            </div>
            <div class="pull-right">

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



    <form action="{{ route('storeProApplicationSummary') }}" method="POST">
        @csrf
        <div class="row">
            {{--    @role('Applicant') replace it with "Coll_Scientific_Committee" role--}}


            <div class="form-group col-sm-12 col-md-6 col-lg-12 py-2">
                <strong for="table1points">مجموع نقاط جدول 1</strong>
                <input type="number" name="table1points" id="table1points"
                       min="0">
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-12 py-2">
                <strong for="table2points">مجموع نقاط جدول 2</strong>
                <input type="number" name="table2points" id="table2points"
                       min="0">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                <div class="form-group">
                    <strong>توصيات لجنة علمية:</strong>
                    <input type="text" name="SciCommittee_Recmd" class="form-control" placeholder="SciCommittee_Recmd">
                </div>
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-12 py-2">
                <strong for="SessionNo">رقم الجلسة للجنة ترقيات توصيات الكلية</strong>
                <input type="number" name="SessionNo" id="SessionNo"
                       min="0">
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-4 py-2">
                <strong for="SessionNo_Date">تاريخ جلسة لجنة ترقيات توصيات الكلية</strong><br>
                <input type="date" id="SessionNo_Date" name="SessionNo_Date">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                <div class="form-group">
                    <strong>هامش لجنة علمية كلية:</strong>
                    <input type="text" name="collegePromCommi_hamsh" class="form-control"
                           placeholder="collegePromCommi_hamsh">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                <div class="form-group">
                    <strong>توصيات مجلس الكلية :</strong>
                    <input type="text" name="collegecouncil_Recmd" class="form-control"
                           placeholder="collegecouncil_Recmd">
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-12 col-lg-12 py-2">
                <strong for="collegecouncil_SessNo">رقم جلسة توصيات مجلس الكلية</strong>
                <input type="number" name="collegecouncil_SessNo" id="collegecouncil_SessNo"
                       min="0">
            </div>
            <div class="form-group col-sm-12 col-md-12 col-lg-12 py-2">
                <strong for="collegecouncil_SessDate">تاريخ جلسة توصيات مجلس الكلية</strong><br>
                <input type="date" id="collegecouncil_SessDate" name="collegecouncil_SessDate">
            </div>

            <div class="form-group col-sm-12 col-md-12 col-lg-12 py-2">
                <strong for="Admin_OrderNo_UniHead_comm">رقم كتاب الاحالة من رئيس الجامعة الى ترقيات المركزية </strong>
                <input type="number" name="Admin_OrderNo_UniHead_comm" id="Admin_OrderNo_UniHead_comm"
                       min="0">
            </div>

            <div class="form-group col-sm-12 col-md-12 col-lg-12 py-2">
                <strong for="Admin_OrderDate_UniHead_comm">تاريخ كتاب الاحالة من رئيس الجامعة الى ترقيات
                    المركزية </strong><br>
                <input type="date" id="Admin_OrderDate_UniHead_comm" name="Admin_OrderDate_UniHead_comm">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 py-2">
                <div class="form-group">
                    <strong>هامش لجنة ترقيات المركزية :</strong>
                    <input type="text" name="presidencyPromCommi_hamsh" class="form-control"
                           placeholder="presidencyPromCommi_hamsh">
                </div>
            </div>
            {{--@endrole--}}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form>
<br>
    <br>
    <br>

@endsection
