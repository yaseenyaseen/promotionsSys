@extends('blogs.layout')

@section('content')

    <div class="container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3 style="text-align: center; padding-top: 15px">أنشاء معاملة ترقية جديدة</h3>
            </div>
        </div>
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

        <br>
        <br>
        <br>
        <form action="{{ route('hamshs.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-6 col-md-3 col-lg-2 py-3">
                    <label>أسم مقدم الترقية:
                    </label>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 py-3">
                    <input type="text" value="{{Auth::user()->name}}" disabled style="width: 100%">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3 col-lg-2 py-3">
                    <label>أختر أسم الترقية القادمة:</label>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 py-3">
                    <select name="sci_title" class="form-select" style="width: 100%">
                        <option value="">---</option>
                        <option value="1">مدرس مساعد</option>
                        <option value="2">مدرس</option>
                        <option value="3">استاذ مساعد</option>
                        <option value="4">استاذ</option>
                    </select>
                </div>
            </div>
            <div class="text-center py-3">
                <button type="submit" class="btn btn-primary">إنتقال الى الخطوة التالية</button>
            </div>
        </form>
    </div>

@endsection
