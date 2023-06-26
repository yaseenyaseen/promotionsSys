@extends('blogs.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>طباعة قائمة الهوامش-و معلومات استمارة ملخص معاملة الترقية </h2>
            </div>
            {{--   <div class="pull-right">
                   <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
               </div>--}}
        </div>
    </div>

    <div class="form-group col-sm-12 col-md-6 col-lg-12 py-2">
        <strong>مجموع نقاط جدول 1 :</strong><br>
        {{ $Form->table1points }}
    </div>
    <div class="form-group col-sm-12 col-md-6 col-lg-12 py-2">
        <strong>مجموع نقاط جدول 2:</strong><br>
        {{ $Form->table2points }}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 py-2">
        <strong>توصيات لجنة علمية:</strong><br>
        {{ $Form->SciCommittee_Recmd }}
    </div>
    <div class="form-group col-sm-12 col-md-6 col-lg-12 py-2">
        <strong>رقم الجلسة للجنة ترقيات توصيات الكلية:</strong><br>
        {{ $Form->SessionNo }}
    </div>
    <div class="form-group col-sm-12 col-md-6 col-lg-4 py-2">
        <strong>تاريخ جلسة لجنة ترقيات توصيات الكلية:</strong><br>
        {{date('Y-m-d',strtotime( $Form->SessionNo_Date)) }}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 py-2">
        <strong>هامش لجنة علمية كلية :</strong><br>
        {{ $Form->collegePromCommi_hamsh }}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 py-2">
        <strong>توصيات مجلس الكلية :</strong><br>

        {{ $Form->collegecouncil_Recmd }}
    </div>
    <div class="form-group col-sm-12 col-md-12 col-lg-12 py-2">
        <strong>رقم جلسة توصيات مجلس الكلية</strong><br>
        {{ $Form->collegecouncil_SessNo }}
    </div>
    <div class="form-group col-sm-12 col-md-12 col-lg-12 py-2">
        <strong>تاريخ جلسة توصيات مجلس الكلية</strong><br>
        {{date('Y-m-d',strtotime( $Form->collegecouncil_SessDate)) }}
    </div>
    <div class="form-group col-sm-12 col-md-12 col-lg-12 py-2">
        <strong>رقم كتاب الاحالة من رئيس الجامعة الى ترقيات المركزية</strong> <br>
        {{ $Form->Admin_OrderNo_UniHead_comm }}
    </div>
    <div class="form-group col-sm-12 col-md-12 col-lg-12 py-2">
        <strong>تاريخ كتاب الاحالة من رئيس الجامعة الى ترقيات المركزية</strong><br>
        {{date('Y-m-d',strtotime( $Form->Admin_OrderDate_UniHead_comm)) }}
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 py-2">
        <strong>هامش لجنة ترقيات المركزية </strong><br>
        {{ $Form->presidencyPromCommi_hamsh }}
    </div>

@endsection
