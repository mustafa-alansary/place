@extends('layouts.app') 
@section('content')
<div class="container">
    @foreach($place as $rest_time)

   
    <div class="row justify-content-center p-2">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">

                    <div class="col-sm-6">
                      
                      @auth
                     @if($rest_time->user_id == auth()->user()->id)
                      <a href="{{ url('place/'.$rest_time->id.'/edit')}}"> <button type="button" class="btn btn-primary">تعديل</button></a>
                     @endif
                     @endauth
                      
                    </div>
                    <div class="col-sm-6 text-right">
                         <h3 class="h3">{{$rest_time->name}}</h3>
                    </div>

                      </div>
                </div>


                <div class="card-body text-right">

                    <div class="row text-center justify-content-center p-2">
                        <div class="col-sm-6 p-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                         <b>  السعر   : </b>  {{$rest_time->price}}  ريال 

                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 p-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                         <b>  الموقع  : </b>  {{$rest_time->location}}

                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                         <b>  نوع الايجار : </b>  {{$rest_time->rent_time}}

                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                         <b>  المساحة : </b>  {{$rest_time->size}} م

                                    </h5>
                                </div>
                            </div>
                        </div>

                        @if($rest_time->sitting->in_no  && $rest_time->sitting->in_no_of_seats > 0)
                        <div class="col-sm-6 p-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                         <b>  عدد الجلسات الداخلية : </b>  {{$rest_time->sitting->in_no}} | <b>تتسع لعدد</b> : {{$rest_time->sitting->in_no_of_seats}}

                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($rest_time->sitting->out_no  && $rest_time->sitting->out_no_of_seats > 0)
                        <div class="col-sm-6 p-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                     <b> عدد الجلسات الخارجية  : </b>  {{$rest_time->sitting->out_no}} | <b>تتسع لعدد</b> : {{$rest_time->sitting->out_no_of_seats}}

                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($rest_time->description->lounges > 0)
                        <div class="col-sm-6 p-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                         <b> عدد الصالات  : </b>  {{$rest_time->description->lounges}}

                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($rest_time->description->rooms > 0)
                        <div class="col-sm-6 p-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                         <b>   عدد الغرف : </b>  {{$rest_time->description->rooms}}

                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($rest_time->description->bedrooms > 0)
                        <div class="col-sm-6 p-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                         <b> عدد غرف النوم  : </b> {{$rest_time->description->bedrooms}} 

                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($rest_time->description->wc > 0)
                        <div class="col-sm-6 p-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                         <b> عدد دوارت المياه : </b> {{$rest_time->description->wc}}  

                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="col-sm-6 p-1">
                            <div class="card">
                                <div class="card-body" style="background: #00BCD4;">
                                    <h5 class="card-title">
                                         <b> رقم التواصل : </b> 0{{$rest_time->user->phone}}  

                                    </h5>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row justify-content-center">

                        <div class="col-sm-12">

                            <span class="badge badge-success" id="hid{{ $rest_time->description->pool ? 'show' : '' }}"><h5>مسبح</h5></span>
                            <span class="badge badge-success" id="hid{{ $rest_time->description->football_s ? 'show' : '' }}"><h5>ملعب كرة قدم</h5></span>
                            <span class="badge badge-success" id="hid{{ $rest_time->description->volleyball_s ? 'show' : '' }}"><h5>ملعب كرة طائرة</h5></span>
                            <span class="badge badge-success" id="hid{{ $rest_time->description->basketball_S ? 'show' : '' }}"><h5>ملعب كرة سلة</h5></span>

                            <span class="badge badge-success" id="hid{{ $rest_time->description->house ? 'show' : '' }}"><h5>بيت شعر</h5></span>
                            <span class="badge badge-success" id="hid{{ $rest_time->description->Kitchen ? 'show' : '' }}"><h5>مطبخ</h5></span>
                            <span class="badge badge-success" id="hid{{ $rest_time->description->s_section ? 'show' : '' }}"><h5>قسم عزاب</h5></span>
                            <span class="badge badge-success" id="hid{{ $rest_time->description->f_section ? 'show' : '' }}"><h5>قسم عوائل</h5></span>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    @endforeach

 
</div>
@endsection