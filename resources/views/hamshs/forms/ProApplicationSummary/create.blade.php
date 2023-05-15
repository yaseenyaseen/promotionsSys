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

             <div class="form-group col-sm-12 col-md-6 col-lg-12">
                        <label for="table1points">مجموع نقاط جدول 1</label>
                        <input type="number" name="table1points" id="table1points"
                               min="0">
                    </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-12">
                <label for="table2points">مجموع نقاط جدول 2</label>
                <input type="number" name="table2points" id="table2points"
                       min="0">
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>توصيات لجنة علمية:</strong>
                    <input type="text" name="SciCommittee_Recmd" class="form-control" placeholder="SciCommittee_Recmd">
                </div>
            </div>
            <div class="form-group col-sm-12 col-md-6 col-lg-12">
                <label for="SessionNo">رقم الجلسة للجنة ترقيات توصيات الكلية</label>
                <input type="number" name="SessionNo" id="SessionNo"
                       min="0">
// todo: delete time info from the date varibale
                <div class="form-group col-sm-12 col-md-6 col-lg-4">
                    <label for="SessionNo_Date">تاريخ جلسة لجنة ترقيات توصيات الكلية</label><br>
                    <input type="date" id="SessionNo_Date" name="SessionNo_Date">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>هامش لجنة علمية كلية:</strong>
                        <input type="text" name="collegePromCommi_hamsh" class="form-control" placeholder="collegePromCommi_hamsh">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>توصيات مجلس الكلية :</strong>
                        <input type="text" name="collegecouncil_Recmd" class="form-control" placeholder="collegecouncil_Recmd">
                    </div>
                </div>

                <div class="form-group col-sm-12 col-md-12 col-lg-12">
                    <label for="collegecouncil_SessNo">رقم جلسة توصيات مجلس الكلية</label>
                    <input type="number" name="collegecouncil_SessNo" id="collegecouncil_SessNo"
                           min="0">

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="collegecouncil_SessDate">تاريخ جلسة توصيات مجلس الكلية</label><br>
                        <input type="date" id="collegecouncil_SessDate" name="collegecouncil_SessDate">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <label for="Admin_OrderNo_UniHead_comm">رقم كتاب الاحالة من رئيس الجامعة الى ترقيات المركزية </label>
                        <input type="number" name="Admin_OrderNo_UniHead_comm" id="Admin_OrderNo_UniHead_comm"
                               min="0">

                        <div class="form-group col-sm-12 col-md-12 col-lg-12">
                            <label for="Admin_OrderDate_UniHead_comm">تاريخ كتاب الاحالة من رئيس الجامعة الى ترقيات المركزية </label><br>
                            <input type="date" id="Admin_OrderDate_UniHead_comm" name="Admin_OrderDate_UniHead_comm">
                        </div>
                        {{--    @role('Applicant') replace it with "presidency_Academic_Promotions_Affairs" role--}}
                        {{--add the following (anything related to presidency_Academic_Promotions_Affairs role )to edit page only, not in create page.--}}
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>هامش لجنة ترقيات المركزية  :</strong>
                                <input type="text" name="presidencyPromCommi_hamsh" class="form-control" placeholder="presidencyPromCommi_hamsh">
                            </div>
                        </div>


                        {{--@endrole--}}
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
</form>

@endsection
