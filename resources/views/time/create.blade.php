@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-right">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">اضافة مدة الايجار</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

        <form method="POST" action="{{url('/time')}}">
            @csrf
          <div class="form-group">
            <label for="exampleInputtext">اضافة فترة</label>
            <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="textInputEmail1" name="name" value="{{ old('name')}}" placeholder="مثال : يومي - شهر - سنوي">
          </div>

           <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
          <button type="submit" class="btn btn-primary">حفــــظ</button>
        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
