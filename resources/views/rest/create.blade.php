@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-right">
                              اضافة استراحة

                          </h4>
                </div>

                <div class="card-body">

{{--                   @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                       <ul>
                        @foreach($errors->all() as $error) 

                          <li>{{ $error }}</li> 

                        @endforeach
                       </ul>
                    </div>
                    @endif --}}

                    <form action="{{url('/place')}}" method="POST">
                    
                        @csrf

                     @if($times->isEmpty())

                       
           

                      <h1 class="text-right">
                           
                           اضغط<a href="{{url('/time/create')}}"> هنا </a> لاضافة فترة الايجار
                      </h1>

             
                    
                     @else
                    
                        <div id="smartwizard">
                            <ul class="nav nav-tabs step-anchor">
                                <li class="nav-item active"><a class="nav-link" href="#step-1">بيانات<br /><small>الاستراحة</small></a></li>
                                <li class="nav-item"><a class="nav-link" href="#step-2">مواصفات<br /><small>الاستراحة</small></a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#step-3">مواصفات<br /><small>الجلسات</small></a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#step-4">الانتهاء<br /><small>حفظ البيانات</small></a>
                                </li>
                            </ul>

                            <div class="">

                                <div id="step-1" class="text-right">

                                    <div class="form-group">
                                        <label for="title">الاسم</label>
                                        <input type="text" value="{{old('name')}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name">
                                    </div>

                                 

                                    <div class="form-group">
                                        <label for="description">العنوان</label>
                                        <input type="text" value="{{old('location')}}" class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" name="location" />
                                    </div>

                                    <div class="form-group">
                                        <label for="description">سعر الايجار</label>
                                        <input type="text" value="{{old('price')}}" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" />
                                    </div>
                                   
                                   
                                    <div class="form-group">
                                        <label for="description">فترة الايجار</label>
                                        <br/>
                                        <select required="" class="form-control " name="rent_time">
                                            <option value="" disabled="disabled">اختر الفترة</option>

                                            
                                            @foreach($times as $time)
                                            @if($time->user_id == auth()->user()->id)
                                            <option value="{{ $time->name }}">{{ $time->name }}</option>
                                            @endif
                                             @endforeach
                                             

                                          

                                        </select>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="description">المساحة</label>
                                        <input type="text" value="{{old('size')}}" class="form-control {{ $errors->has('size') ? 'is-invalid' : '' }}" name="size">
                                    </div>

                                    <div class="form-group">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="s_section" type="checkbox" value="{{old('s_section')}}" onclick="return getVal();"{{ (! empty(old('s_section')) ? 'checked' : '') }}>
                                            <label class="form-check-label" for="inlineCheckbox1">عزاب</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="f_section" type="checkbox"  value="{{old('f_section')}}" onclick="return getVal();"{{ (! empty(old('f_section')) ? 'checked' : '') }}>
                                            <label class="form-check-label" for="inlineCheckbox1">عوائل</label>
                                        </div>

                                    </div>

                                </div>
                                <div id="step-2" class="text-right">

                                    <div class="form-group">
                                        <label for="description">عدد الصالات</label>
                                        <input type="text" value="{{old('lounges')}}" class="form-control {{ $errors->has('lounges') ? 'is-invalid' : '' }}" name="lounges">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">عدد الغرف</label>
                                        <input type="text" value="{{old('rooms')}}" class="form-control {{ $errors->has('rooms') ? 'is-invalid' : '' }}" name="rooms">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">عدد غرف النوم</label>
                                        <input type="text" value="{{old('bedrooms')}}" class="form-control {{ $errors->has('bedrooms') ? 'is-invalid' : '' }}" name="bedrooms">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">عدد دوارت المياه</label>
                                        <input type="text" value="{{old('wc')}}" class="form-control {{ $errors->has('wc') ? 'is-invalid' : '' }}" name="wc">
                                    </div>

                                    <div class="form-group">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="pool" type="checkbox" value="{{old('pool')}}" onclick="return getVal();" {{ (! empty(old('pool')) ? 'checked' : '') }}>
                                            <label class="form-check-label" for="inlineCheckbox1">مسبح</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="football_s" type="checkbox" value="{{old('football_s')}}" onclick="return getVal();" {{ (! empty(old('football_s')) ? 'checked' : '') }}>
                                            <label class="form-check-label" for="inlineCheckbox1">ملعب كرة قدم</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="volleyball_s" type="checkbox" value="{{old('volleyball_s')}}" onclick="return getVal();" {{ (! empty(old('volleyball_s')) ? 'checked' : '') }}>
                                            <label class="form-check-label" for="inlineCheckbox1">ملعب كرة طائرة</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="basketball_S" type="checkbox" value="{{old('basketball_S')}}" onclick="return getVal();" {{ (! empty(old('basketball_S')) ? 'checked' : '') }}>
                                            <label class="form-check-label" for="inlineCheckbox1">ملعب كرة سلة</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="house" type="checkbox" value="{{old('house')}}" onclick="return getVal();" {{ (! empty(old('house')) ? 'checked' : '') }}>
                                            <label class="form-check-label" for="inlineCheckbox1">بيت شعر</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" name="Kitchen" type="checkbox" value="{{old('Kitchen')}}" onclick="return getVal();" {{ (! empty(old('Kitchen')) ? 'checked' : '') }}>
                                            <label class="form-check-label" for="inlineCheckbox1">مطبخ</label>
                                        </div>

                                    </div>

                                </div>

                                <div id="step-3" class="text-right">

                                    <div class="form-group">
                                        <label for="description">عدد الجلسات الداخلية</label>
                                        <input type="text" value="{{old('in_no')}}" class="form-control {{ $errors->has('in_no') ? 'is-invalid' : '' }}" name="in_no">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">تتسع لعدد.؟</label>
                                        <input type="text" value="{{old('in_no_of_seats')}}" class="form-control {{ $errors->has('in_no_of_seats') ? 'is-invalid' : '' }}" name="in_no_of_seats">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">عدد الجلسات الخارجية</label>
                                        <input type="text" value="{{old('out_no')}}" class="form-control {{ $errors->has('out_no') ? 'is-invalid' : '' }}" name="out_no">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">تتسع لعدد.؟</label>
                                        <input type="text" value="{{old('out_no_of_seats')}}" class="form-control {{ $errors->has('out_no_of_seats') ? 'is-invalid' : '' }}" name="out_no_of_seats">
                                    </div>

                                </div>
                                <div id="step-4" class="text-center">

                                    <h2>

                                        حفظ البيانات
                                    </h2>

                                    <div class="btn-toolbar sw-toolbar sw-toolbar-bottom justify-content-end">
                                        <div class="btn-group mr-2 sw-btn-group" role="group">
                                            <button class="btn btn-info" type="submit">حـــفظ</button>

                                        </div>
                                    </div>

                                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id">

                                </div>

                            </div>
                     @endif
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection