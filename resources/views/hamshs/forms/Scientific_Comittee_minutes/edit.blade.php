@extends('blogs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>تعديل هامش-محضر اللجنة العلمية للترقية العلمية</h2>
                <br>
                <br>
                <br>
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

                {{-- <div class="pull-right">
                     <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
                 </div>--}}


                <form action="{{ route('updateScientific_Committee_minutes',$hamsh->id) }}" method="POST">
                    @method('PUT')
                    @role('admin')

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        @csrf
                        <div class="form-group">
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
                            <strong>رئيس اللجنة العلمية :</strong><br>
                            <input type="text" name="headCommitee_hamsh" value="{{ $hamsh->headCommitee_hamsh }}"
                                   class="form-control"
                                   placeholder="headCommitee_hamsh">
                        </div>
                    </div>

                                @endrole
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>

                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
@endsection


