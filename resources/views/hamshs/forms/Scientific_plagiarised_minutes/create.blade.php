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
            <h2>أضافة الهامش على محضر الاستلال العلمي للترقية العلمية</h2>

            <br>
            <br>

            <label>
                <label>
كليشة استلال
                    <br>

كليشة 2

                </label>
            </label>

            <form action="{{ route('storeScientific_plagiarised_minutes') }}" method="POST">
                @csrf
                <input id="user_id" name="user_id" type="hidden" value="{{$user_id}}">
                @role('admin')
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>هامش السيد رئيس لجنة الاستلال :</strong>
                        <input type="text" name="headCommitee_hamsh" class="form-control"
                               placeholder="هامش السيد رئيس لجنة الاستلال">
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
