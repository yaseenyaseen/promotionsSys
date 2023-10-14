@extends('blogs.layout')

@section('content')
@if($msg != null)

@endif
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>متطلبات الترقية- تحميل مرفقات </h2>
             <label>
                 <br>
                يرجى دمج و تحميل المرفقات التالية بشكل ملف بي دي اف واحد:
                 <br>
                 مباشرة بالكلية
             <br>
                 منح اخر لقب
                 <br>
                 دورة تأهيلية
                 <br>
                 دورة حاسوب
                 <br>
                 نتائج الاستلال الالكتروني
                 <br>
                 كتاب حلقة دراسية
                 <br>
                 بحوث
                 <br>
                 اطاريح
                 <br>
                 <form action="{{ route('postPatent') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div id="insert" class="w3-container tab w3-animate-bottom ">
                         {{-- <label for="research">{{__('naming.patent_doc')}}</label>--}}
                         <div class="form-group row">
                             <div class="col col-sm-12 col-md-12  col-lg-12">
                                 <input type="file" name="research" class="form-control" id="research">
                             </div>
                         </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                         <button type="submit" class="btn btn-primary">حفظ</button>
                     </div>
                 </form>
                 <br>
             </label>
            </div>
        </div>
    </div>
@endsection
