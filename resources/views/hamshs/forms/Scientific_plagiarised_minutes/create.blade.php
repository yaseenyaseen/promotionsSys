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
            <h2>أضافة الهامش على محضر اللجنة العلمية للترقية العلمية</h2>
            {{--
                        <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
        --}}
            <br>
            <br>

            <label>
                <label>
                    اطلعت اللجنة العلمية المشكلة بموجب الامر الاداري ذي العدد      في           لقسم / فرع (                      ) كلية (                        ) على مجمل الأوراق المقدمة في معاملة ترقية التدريسي (                            ) والتي يروم فيها الحصول على مرتبة (               ) ، واطلعت على محضر لجنة الاستلال وبينت فيه مقبولية النتاج العلمي المقدم إلى الترقية ، وتأكدت من مطابقة البحوث والنشاطات للشروط المذكورة في تعليمات الترقيات العلمية لوزارة التعليم العالي والبحث العلمي بالرقم (167) لعام 2017، وعلى الشكل الآتي:
                    <br>

                    1-	ان البحوث المقدمة ضمن التخصص الدقيق و المسار البحثي للموما اليه .<br>
                    2-	فيما يخص المجلات التي نشرت فيها البحوث المقدمة للترقية تقع ضمن التخصص العلمي فإن (   ) بحثا تقع في التخصص العام و(   ) بحثا تقع في التخصص الدقيق. يُذكر عدد واسماء البحوث في الفراغات.<br>
                    3-	ان المجلات التي نشرت فيها البحوث تقع ضمن التخصص العلمي .<br>
                    4-	المصادقة على النشاطات العلمية أي عدد النقاط التي حصل عليها صاحب الترقية في الجدول رقم (2) الخاص بالنشاطات وخدمة المجتمع .<br>
                    5-	المصادقة على الاستلال العلمي والالكتروني للنتاج العلمي المقدم لمعاملة الترقية .<br>
                    وبناء على هذا فإنها توصي بترويج معاملة الترقية العلمية له.<br>

                </label>
            </label>

            <form action="{{ route('storeScientific_Committee_minutes') }}" method="POST">
                @csrf
                <input id="user_id" name="user_id" type="hidden" value="{{$user_id}}">
                @role('admin')
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>هامش السيد رئيس اللجنة العلمية:</strong>
                        <input type="text" name="headCommitee_hamsh" class="form-control"
                               placeholder="هامش السيد مقدم الطلب">
                    </div>
                </div>
                @endrole
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
