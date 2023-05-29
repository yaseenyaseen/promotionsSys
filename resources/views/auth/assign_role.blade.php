@extends('blogs.layout')

@section('content')
    <div class="container" style="margin-top: 20px">
        <div class="row justify-content-center">
            <form method="get" action="{{ route('users_list') }}">
                @csrf
                <div class="col-sm-12 col-md-10 col-lg-8 py-2" style="font-size: large">
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="border-radius: 0 5px 5px 0; width: 105px">
                            البريد الالكتروني
                        </span>
                        <input id="email" type="email" class="form-control" aria-describedby="basic-addon2"
                               @if( old('email') !='' )
                                   value="{{ old('email') }}"
                               @elseif($users_roles != null && count($users_roles) > 0 )
                                   value="{{$users_roles[0]->email}}"
                               @endif
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                        <button id="findBtn" type="submit" value="Submit" class="btn btn-primary"
                                style="font-size: large; border-radius: 5px 0 0 5px;">
                            بحث
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row text-right">
            <div class="col-sm-12 col-md-10 col-lg-8 py-2" style="font-size: large">
                <div class="input-group mb-3">
                    <span class="input-group-text" style="border-radius: 0 5px 5px 0; width: 105px">الاسم</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon2">
                </div>
            </div>
        </div>
        @foreach($rolesList as $role )
            <div class="col-sm-6 col-md-4 col-lg-4 py-2" style="font-size: large">
                <div class="form-check form-switch">

                    <input class="form-check-input" type="checkbox" id="role_{{$role->id}}" value="{{$role->id}}"
                           onclick="UpdateActivation({{$role->id}});"
                           @if($users_roles != null && count($users_roles) > 0)
                               {{ $users_roles->contains('role_id', $role->id) ? 'checked' : '' }}
                           @elseif ($users_roles == null || count($users_roles) <= 0)
                               disabled
                        @endif
                    >
                    <label class="form-check-label" for="flexSwitchCheckChecked">{{$role->name}}</label>
                </div>
            </div>
        @endforeach
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
            <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
        </div>

    </div>

    <script>
        function UpdateActivation(role_id) {
            var chk = document.getElementById("role_" + role_id).checked
            var user_id = {{$users_roles != null &&  count($users_roles)>0? $users_roles[0]->id : -1}};
            if (user_id > 0) {
                var url = '{{route('change_use_role')}}';
                $.ajax(url, {
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        status: chk,
                        user_id: user_id,
                        role_id: role_id,
                    },
                    success: function (data, status, xhr) {
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        alert('Error: ' + errorMessage);
                    }
                });
            }
        }
    </script>

@endsection
