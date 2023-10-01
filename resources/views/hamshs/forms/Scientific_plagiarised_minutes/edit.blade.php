@extends('blogs.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>تعديل هامش-محضر الاستلال العلمي للترقية العلمية</h2>
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


                <form action="{{ route('updateScientific_plagiarised_minutes',$hamsh->id) }}" method="POST">
                    @method('PUT')
                    @role('admin')

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        @csrf
                        <div class="form-group">
                            <label>
كليشة1                                <br>
كليشة2

                            </label>
                            <h5>رئيس لجنة الاستلال  </h5>
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


