@extends('blogs.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>طباعة قائمة الهوامش-محضر الاستلال العلمي للترقية العلمية </h2>
                <br>
                <br>
                <br>

                {{--   <div class="pull-right">
                       <a class="btn btn-primary" href="{{ route('hamshs.forms.sciplanindex') }}"> Back</a>
                   </div>--}}


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>
كليشة1
                            <br>

                       كليشة 2

                        </label>

                        <h5>رئيس لجنة الاستلال  </h5>

                        {{ $hamsh->headCommitee_hamsh }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

@endsection
