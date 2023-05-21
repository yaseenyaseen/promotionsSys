@extends('blogs.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>طباعة متطلبات الترقية-استمارة معلومات الوظائف التي مارسها و الشهادة مقدم الترقية </h2>
            </div>
            {{--   <div class="pull-right">
                   <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
               </div>--}}
        </div>
    </div>
@if(!$isDegree)
    <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label> استمارة معلومات الوظائف التي مارسها  مقدم الترقية
                </label>


                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th>عنوان الوظيفة</th>
                        <th>  جهة العمل</th>
                        <th>  تاريخ بداية العمل</th>
                        <th>  تاريخ نهاية العمل</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($PositionsHeldBy as $PositionHeldBy)
                        <tr>
                            <td>{{ $PositionHeldBy['workDescriptoin'] }}</td>
                            <td>{{ $PositionHeldBy['workplace'] }}</td>
                            <td>{{date('Y-m-d',trim(strtotime( $PositionHeldBy['sDate']))) }}</td>
                            <td>{{date('Y-m-d',trim(strtotime( $PositionHeldBy['edate']))) }}</td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
@else
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label> استمارة معلومات الشهادات التي انجزها مقدم الترقية
                                </label>


                                <table class="table table-dark">
                                    <thead>
                                    <tr>
                                        <th>الشهادة</th>
                                        <th>  الجامعة</th>
                                        <th> البلد المانح</th>
                                        <th>  التأريخ</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Degress as $Degree)
                                        <tr>
                                            <td>{{ $Degree['degree'] }}</td>
                                            <td>{{ $Degree['university'] }}</td>
                                            <td>{{ $Degree['country'] }}</td>
                                            <td>{{date('Y-m-d',trim(strtotime( $Degree['acomplishDate']))) }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
@endif
@endsection
