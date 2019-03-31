@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-right">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">لوحة التحكم</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                @if($times->isEmpty())
                   
                   <h1 class="text-right">
                           
                           اضغط<a href="{{url('/time/create')}}"> هنا </a> لاضافة فترة الايجار
                      </h1>

                @else
                <div class="table-responsive-xl">
                   <table class="table table-borderless table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">الاسم</th>
                          <th scope="col"> تعديل</th>
                          <th scope="col"> حــذف </th>
                         
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($times as $time)
                          <tr>
                          <th scope="row">{{$time->id}}</th>
                          <td scope="row">{{$time->name}}</td>
                     

                          <td>
                            <a href="{{url('/time/'.$time->id.'/edit')}}">
                              <button type="button" class="btn btn-info">تعديل</button></a>
                          </td>
                           <td>
                           <form method="POST" action="{{url('/time/'.$time->id) }}">

                            @method('DELETE')

                            @csrf
                           
                               <button type="submit" class="btn btn-danger">حذف</button>
                       
                           </form>
                             </td>
                          </tr>
                         @endforeach
                      </tbody>
                    </table>
                </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
