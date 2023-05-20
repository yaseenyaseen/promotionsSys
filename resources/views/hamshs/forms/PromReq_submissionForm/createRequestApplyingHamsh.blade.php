@extends('blogs.layout')

@section('content')
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

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>أضافة الهامش على استمارة تقديم الطلب</h2>
            {{--
                        <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
        --}}
            <br>
            <br>

            <label>
                نظراً لاستحقاقي الترقية العلمية الى مرتبة ( ) يرجى التفضل بالموافقة على ترويج معاملة ترقيتي وذلك
                لاكمالي المدة القانونية اللازمة او قبل سنة من تاريخ استحقاق الترقية وفقا للفقرة (اولا – 1) من
                القرار 315 لسنة 1988 ، علما انه تم أدارج بحوثي المقدمة للترقية العلمية :

            </label>

            <form action="{{ route('storeReqApplyingHamsh') }}" method="POST">
                @csrf

                @role('Applicant|admin')

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>هامش السيد مقدم الطلب:</strong>
                        <input type="text" name="Applicant_hamsh" class="form-control"
                               placeholder="هامش السيد مقدم الطلب">
                    </div>
                </div>
                @endrole
                {{--
                    @role('HeadDepartment_Coll|admin')
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong> هامش السيد رئيس القسم :</strong><br>
                                <input type="text" name="Sci_Dep_hamsh"
                                       class="form-control"
                                       placeholder="هامش السيد رئيس القسم">
                            </div>
                        </div>
                        @endrole

                        @role('Dean|admin')

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>هامش السيد العميد:</strong>
                                <input type="text" name="Dean_hamsh" class="form-control" placeholder="هامش السيد العميد">
                            </div>
                        </div>
                        @endrole

--}}
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>

            </form>

        </div>


    </div>

    <br>
    <br>
    <br>

@endsection
