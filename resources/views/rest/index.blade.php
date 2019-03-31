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
                @if($rest_times->isEmpty())
                   
                   <h1 class="text-right">
                           
                           اضغط<a href="{{url('/place/create')}}"> هنا </a> لاضافة استراحة
                      </h1>

                @else
                 
                <div class="table-responsive-xl">
                   <table class="table table-borderless table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">الاسم</th>
                          <th scope="col">مدة الايجار</th>
                          <th scope="col">السعر</th>
                          <th scope="col"> عرض</th>
                           <th scope="col"> تعديل</th>
                          <th scope="col"> حذف </th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($rest_times as $rest_time)
                          <tr>
                          <th scope="row">{{$rest_time->id}}</th>
                          <td scope="row">{{$rest_time->name}}</td>
                          <td scope="row">{{$rest_time->rent_time}}</td>
                          <td scope="row">{{$rest_time->price}}</td>

                           <td>
                            <a href="{{url('place/'.$rest_time->id)}}">
                              <button type="button" class="btn btn-info"> عرض</button></a>
                          </td>

                          <td>
                            <a href="{{url('place/'.$rest_time->id .'/edit')}}">
                              <button type="button" class="btn btn-info">تعديل</button></a>
                          </td>
                           <td>
                           <form method="POST" action="{{url('place/'.$rest_time->id)}}">

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
