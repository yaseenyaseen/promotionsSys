@extends('blogs.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>طباعة معلومات الاطاريح المتعلة بهذه الترقية </h2>
            </div>
            {{--   <div class="pull-right">
                   <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
               </div>--}}
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label> استمارة معلومات الشهادات التي انجزها مقدم الترقية
                </label>


                <table class="center">
                    <thead>
                    <tr>
                        <th>عنوان الاطروحة:</th>
                        <th>  اسم المؤلف:</th>
                        <th> اسم المشرف:</th>
                        <th>  الشهادة (دبلوم/ماجستير/دكتوراة):</th>
                        <th> عدد البحوث المستلة من هذه الاطروحة:</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($theses as $thesis)
                        <tr>
                            <td>{{ $thesis['title'] }}</td>
                            <td>{{ $thesis['autherName'] }}</td>
                            <td>{{ $thesis['supervisorName'] }}</td>
                            <td>{{ $thesis['degree'] }}</td>
                            <td>{{ $thesis['No_plagiarised_articles'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
@endsection
