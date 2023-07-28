@extends('admin.Layout.master')
@section('title', $title)
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
           <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">{{$title}}</h4>
                  <p class="card-description">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(Session::has('error'))
                     <div class="alert alert-danger col-md-12 text-center">
                  <strong>Oops!</strong> {{ Session::get('error') }}
                </div>
                 @endif
                  </p>
                @if($id)
                  <form class="forms-sample row col-md-12" method="POST"  action="{{url('Accounts/add-edit-org/'.$id)}}" enctype="multipart/form-data">
                @else
                  <form class="forms-sample row col-md-12" method="POST" id="regForm"  action="{{url('Accounts/add-edit-org')}}" enctype="multipart/form-data">
                @endif
                    @csrf


                      <div class="col-md-6">
                        <div class="form-group"> <label for="name">Company Name *</label> <input id="name" type="text" name="name" @if($id) value="{{$data->name}}" @else value="{{old('name')}}" @endif class="form-control" placeholder="Please enter name *" >


                        <label for="name"  id="name-error" class="error">
                            @error('name')
                             {{ $message }}
                            @enderror
                        </label>
                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name">कंपनी नाम </label> <input id="form_name" type="text" name="name_h" @if($id) value="{{$data->name_h}}" @else value="{{old('name_h')}}" @endif class="form-control" placeholder="Please enter name in hindi *"  > </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="address"> Address *</label> <input id="address" type="text" name="address" @if($id) value="{{$data->address}}" @else value="{{old('address')}}" @endif class="form-control" placeholder="Please enter address *"  >


                        <label for="address"  id="address-error" class="error">
                            @error('address')
                             {{ $message }}
                            @enderror
                        </label>


                    </div>
                    </div>

                     <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> पता </label> <input id="form_name" type="text" name="address_h" @if($id) value="{{$data->address_h}}" @else value="{{old('address_h')}}" @endif class="form-control" placeholder="Please enter address in hindi *"  > </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group"> <label for="time">Office time *</label> <input id="time" type="text" name="time" @if($id) value="{{$data->time}}" @else value="{{old('time')}}" @endif class="form-control" placeholder="Please enter office timing"  >


                            <label for="time"  id="time-error" class="error">
                                @error('time')
                                 {{ $message }}
                                @enderror
                            </label>

                        </div>
                    </div>




                     <div class="col-md-6">
                        <div class="form-group"> <label for="contact"> Contact No *</label> <input id="contact" type="text" name="contact" @if($id) value="{{$data->contact}}" @else value="{{old('contact')}}" @endif maxlength="50" class="form-control" placeholder="Please enter contact no *" >

                            <label for="contact"  id="contact-error" class="error">
                                @error('contact')
                                 {{ $message }}
                                @enderror
                            </label>



                        </div>
                    </div>



                     <div class="col-md-6">
                        <div class="form-group"> <label for="email"> Email *</label> <input id="email" type="email" name="email" @if($id) value="{{$data->email}}" @else value="{{old('email')}}"  @endif class="form-control" placeholder="Please enter email *"  >

                            <label for="email"  id="email-error" class="error">
                                @error('email')
                                 {{ $message }}
                                @enderror
                            </label>


                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name">Default Banner* [Size:Width:1920px, Height:500px]</label><span style="color:green;font-size:12px;"> @if($id) [{{$data->default_banner_image}}] @endif</span>

                            <input id="default_banner_image" type="file" name="default_banner_image" @if($id) value="{{$data->default_banner_image}}" @endif class="form-control" >


                            <label for="default_banner_image"  id="default_banner_image-error" class="error">
                            @error('default_banner_image')
                            {{ $message }}
                            @enderror
                            </label>

                        </div>
                    </div>








                    <div class="col-md-6">
                        <div class="form-group">
                             <label for="Default_Banner_tittle">Default Banner Title *</label>

                             <input id="Default_Banner_tittle" type="text" name="Default_Banner_tittle" @if($id) value="{{$data->Default_Banner_tittle}}" @else value="{{old('Default_Banner_tittle')}}"  @endif class="form-control" placeholder="Please enter Default Banner title *" >

                            <label for="Default_Banner_tittle"  id="Default_Banner_tittle-error" class="error">
                                @error('Default_Banner_tittle')
                                 {{ $message }}
                                @enderror
                            </label>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="Default_Banner_alt">Default Banner Alt </label> <input id="Default_Banner_alt" type="text" name="Default_Banner_alt" @if($id) value="{{$data->Default_Banner_alt}}" @else value="{{old('Default_Banner_alt')}}"  @endif class="form-control" placeholder="Please enter Default Banner Alt *" >


                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="fevicon"> Favicon * </label> <span style="color:green;font-size:12px;">@if($id) [{{$data->fevicon}}] @endif</span>
                            <input id="fevicon" type="file" name="fevicon" @if($id) value="{{$data->fevicon}}" @endif class="form-control" accept=".jpeg,.jpg,.gif,.png">

                            <label for="fevicon"  id="fevicon-error" class="error">
                                @error('fevicon')
                                 {{ $message }}
                                @enderror
                            </label>

                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group"> <label for="logo">Website Logo * [Size:Max_Height:130px]</label><span style="color:green;font-size:12px;"> @if($id) [{{$data->logo}}] @endif</span>
                            <input id="logo" type="file" name="logo" @if($id) value="{{$data->logo}}" @endif class="form-control" accept=".jpeg,.jpg,.gif,.png">


                            @if($id)
                            <label for="logo"  id="logo-error" class="error">
                                @error('logo')
                                 {{ $message }}
                                @enderror
                            </label>
                           @endif
                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group"> <label for="Logo_Title1">Logo Title[first] *</label> <input id="Logo_Title1" type="text" name="Logo_Title1" @if($id) value="{{$data->Logo_Title1}}" @else value="{{old('Logo_Title1')}}"  @endif class="form-control" placeholder="Please enter logo title *"  >

                            <label for="Logo_Title1"  id="Logo_Title1-error" class="error">
                                @error('Logo_Title1')
                                 {{ $message }}
                                @enderror
                            </label>

                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name">Logo Alt [first]</label> <input id="form_name" type="text" name="Logo_Alt1" @if($id) value="{{$data->Logo_Alt1}}" @else value="{{old('Logo_Alt1')}}"  @endif class="form-control" placeholder="Please enter Logo Alt *" > </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group">
                            <label>URL for Logo *</label>
                            <input type="text" class="form-control" id="url_logo" name="url_logo" @if($id) value="{{$data->url_logo}}" @else value="{{old('url_logo')}}" @endif placeholder="enter url ie. https://example.com">


                            <label for="url_logo"  id="url_logo-error" class="error">
                                @error('url_logo')
                                 {{ $message }}
                                @enderror
                            </label>


                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Website Top Logo 2*[Supporting Logo] [Size:Max_Height:130px]</label><span style="color:green;font-size:12px;"> @if($id) [{{$data->logo2}}] @endif</span>
                            <input id="form_name" type="file" name="logo2" id="logo2" @if($id) value="{{$data->logo2}}" @endif class="form-control" accept=".jpeg,.jpg,.gif,.png">

                            <label for="logo2"  id="logo2-error" class="error">
                                @error('logo2')
                                 {{ $message }}
                                @enderror
                            </label>

                        </div>

                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="Logo_Title2">Logo Title[second] *</label> <input id="Logo_Title2" type="text" name="Logo_Title2" @if($id) value="{{$data->Logo_Title2}}" @else value="{{old('Logo_Title2')}}"  @endif class="form-control" placeholder="Please enter logo title *"  >

                            <label for="Logo_Title2"  id="Logo_Title2-error" class="error">
                                @error('Logo_Title2')
                                 {{ $message }}
                                @enderror
                            </label>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name">Logo Alt [Second] </label> <input id="form_name" type="text" name="Logo_Alt2" @if($id) value="{{$data->Logo_Alt2}}" @else value="{{old('Logo_Alt2')}}"  @endif class="form-control" placeholder="Please enter Logo Alt *"  > </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group">
                            <label>URL for Logo2 *</label>
                            <input type="text" class="form-control" id="url_logo2" name="url_logo2" @if($id) value="{{$data->url_logo2}}" @else value="{{old('url_logo2')}}" @endif placeholder="enter url ie. https://example.com">


                            <label for="url_logo2"  id="url_logo2-error" class="error">
                                @error('url_logo2')
                                 {{ $message }}
                                @enderror
                            </label>


                        </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="logo3">Small Logo 3* [Supporting Logo] [Size:Max_Height:130px]</label><span style="color:green;font-size:12px;"> @if($id) [{{$data->logo3}}] @endif</span>
                            <input  type="file" name="logo3" id="logo3" @if($id) value="{{$data->logo3}}" @endif class="form-control" accept=".jpeg,.jpg,.gif,.png">

                            <label for="logo3"  id="logo3-error" class="error">
                                @error('logo3')
                                 {{ $message }}
                                @enderror
                            </label>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name">Logo Title[third] *</label> <input id="Logo_Title3" type="text" name="Logo_Title3" @if($id) value="{{$data->Logo_Title3}}" @else value="{{old('Logo_Title3')}}"  @endif class="form-control" placeholder="Please enter logo title *" >


                            <label for="Logo_Title3"  id="Logo_Title3-error" class="error">
                                @error('Logo_Title3')
                                 {{ $message }}
                                @enderror
                            </label>


                        </div>
                    </div>





                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name">Logo Alt[third] </label> <input id="form_name" type="text" name="Logo_Alt3" @if($id) value="{{$data->Logo_Alt3}}" @else value="{{old('Logo_Alt3')}}"  @endif class="form-control" placeholder="Please enter Logo Alt *"  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group">
                            <label>URL for Logo3</label>
                            <input type="text" class="form-control" name="url_logo3" id="url_logo3" @if($id) value="{{$data->url_logo3}}" @else value="{{old('url_logo3')}}" @endif placeholder="enter url ie. https://example.com">


                            <label for="url_logo3"  id="url_logo3-error" class="error">
                                @error('url_logo3')
                                 {{ $message }}
                                @enderror
                            </label>


                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group"> <label for="logo4">Small Logo 4*[Supporting Logo] [Size:Max_Height:130px]</label><span style="color:green;font-size:12px;"> @if($id) [{{$data->logo4}}] @endif</span>
                            <input id="logo4" type="file" name="logo4" id="logo4" @if($id) value="{{$data->logo4}}" @endif class="form-control" accept=".jpeg,.jpg,.gif,.png">

                            <label for="logo4"  id="logo4-error" class="error">
                                @error('logo4')
                                 {{ $message }}
                                @enderror
                            </label>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="Logo_Title4">Logo Title[Fourth] *</label> <input id="Logo_Title4" type="text" name="Logo_Title4" @if($id) value="{{$data->Logo_Title4}}" @else value="{{old('Logo_Title4')}}"  @endif class="form-control" placeholder="Please enter logo title *"  >


                            <label for="Logo_Title4"  id="Logo_Title4-error" class="error">
                                @error('Logo_Title4')
                                 {{ $message }}
                                @enderror
                            </label>


                        </div>
                    </div>





                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name">Logo Alt[Fourth] *</label> <input id="form_name" type="text" name="Logo_Alt4" @if($id) value="{{$data->Logo_Alt4}}" @else value="{{old('Logo_Alt4')}}"  @endif class="form-control" placeholder="Please enter Logo Alt *"  > </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group">
                            <label>URL for Logo4</label>
                            <input type="text" class="form-control" name="url_logo4"  id="url_logo4" @if($id) value="{{$data->url_logo4}}" @else value="{{old('url_logo4')}}" @endif placeholder="enter url ie. https://example.com">


                            <label for="url_logo4"  id="url_logo4-error" class="error">
                                @error('url_logo4')
                                 {{ $message }}
                                @enderror
                            </label>




                        </div>
                    </div>




                      <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Location Map [Only src value]</label> <input id="form_name" type="text" name="location" @if($id) value="{{$data->location}}" @else value="{{old('location')}}" @endif class="form-control" placeholder="Please enter location map  "  >


                            {{-- <label for="url_logo"  id="url_logo-error" class="error">
                                @error('url_logo')
                                 {{ $message }}
                                @enderror
                            </label> --}}



                        </div>
                    </div>




                     <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [Facebook]</label> <input id="form_name" type="text" name="facebook" @if($id) value="{{$data->facebook}}" @else value="{{old('facebook')}}" @endif class="form-control" placeholder="Please enter facebook link ie. https://example.com "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[Facebook] *</label> <input id="form_name" type="text" name="Facebook_title" @if($id) value="{{$data->Facebook_title}}" @else value="{{old('Facebook_title')}}"  @endif class="form-control" placeholder="Please enter Facebook title *"  > </div>
                    </div>





                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Alt[Facebook] *</label> <input id="form_name" type="text" name="Facebook_Alt" @if($id) value="{{$data->Facebook_Alt}}" @else value="{{old('Facebook_Alt')}}"  @endif class="form-control" placeholder="Please enter Facebook Alt *" > </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group">
                            <label>URL for Facebook</label>
                            <input type="text" class="form-control" name="url_Facebook" @if($id) value="{{$data->url_Facebook}}" @else value="{{old('url_Facebook')}}" @endif placeholder="enter url ie. https://example.com">
                        </div>
                    </div>





                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [Twitter]</label> <input id="form_name" type="text" name="twitter" @if($id) value="{{$data->twitter}}" @else value="{{old('twitter')}}" @endif class="form-control" placeholder="Please enter twitter link ie. https://example.com "  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[Twitter] *</label> <input id="form_name" type="text" name="Twitter_title" @if($id) value="{{$data->Twitter_title}}" @else value="{{old('Twitter_title')}}"  @endif class="form-control" placeholder="Please enter Twitter title *" > </div>
                    </div>





                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Alt[Twitter] *</label> <input id="form_name" type="text" name="Twitter_Alt" @if($id) value="{{$data->Twitter_Alt}}" @else value="{{old('Twitter_Alt')}}"  @endif class="form-control" placeholder="Please enter Twitter Alt *" > </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>URL for Twitter</label>
                            <input type="text" class="form-control" name="url_Twitter" @if($id) value="{{$data->url_Twitter}}" @else value="{{old('url_Twitter')}}" @endif placeholder="enter url ie. https://example.com">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link[LinkedIn]</label> <input id="form_name" type="text" name="linkedin" @if($id) value="{{$data->linkedin}}" @else value="{{old('linkedin')}}" @endif class="form-control" placeholder="Please enter linkedin link ie. https://example.com "  > </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[LinkedIn] *</label> <input id="form_name" type="text" name="LinkedIn_title" @if($id) value="{{$data->LinkedIn_title}}" @else value="{{old('LinkedIn_title')}}"  @endif class="form-control" placeholder="Please enter LinkedIn title *"  > </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Alt[LinkedIn] *</label> <input id="form_name" type="text" name="LinkedIn_Alt" @if($id) value="{{$data->LinkedIn_Alt}}" @else value="{{old('LinkedIn_Alt')}}"  @endif class="form-control" placeholder="Please enter LinkedIn Alt *"  > </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>URL for LinkedIn</label>
                            <input type="text" class="form-control" name="url_LinkedIn" @if($id) value="{{$data->url_LinkedIn}}" @else value="{{old('url_LinkedIn')}}" @endif placeholder="enter url ie. https://example.com">
                        </div>
                    </div>





                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [YouTube]</label> <input id="form_name" type="text" name="youtube" @if($id) value="{{$data->youtube}}" @else value="{{old('youtube')}}" @endif class="form-control" placeholder="Please enter youtube link ie. https://example.com "  > </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[YouTube] *</label> <input id="form_name" type="text" name="YouTube_title" @if($id) value="{{$data->YouTube_title}}" @else value="{{old('YouTube_title')}}"  @endif class="form-control" placeholder="Please enter YouTube title *" > </div>
                    </div>





                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Alt[YouTube] *</label> <input id="form_name" type="text" name="YouTube_Alt" @if($id) value="{{$data->YouTube_Alt}}" @else value="{{old('YouTube_Alt')}}"  @endif class="form-control" placeholder="Please enter YouTube Alt *"  > </div>
                    </div>





                    <div class="col-md-6">
                        <div class="form-group">
                            <label>URL for YouTube</label>
                            <input type="text" class="form-control" name="url_YouTube" @if($id) value="{{$data->url_YouTube}}" @else value="{{old('url_YouTube')}}" @endif placeholder="enter url ie. https://example.com">
                        </div>
                    </div>






                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Social Media Link [Instagram]</label> <input id="form_name" type="text" name="instagram" @if($id) value="{{$data->instagram}}" @else value="{{old('instagram')}}" @endif class="form-control" placeholder="Please enter instagram link ie. https://example.com "  > </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Title[Instagram] *</label> <input id="form_name" type="text" name="Instagram_title" @if($id) value="{{$data->Instagram_title}}" @else value="{{old('Instagram_title')}}"  @endif class="form-control" placeholder="Please enter Instagram title *"  > </div>
                    </div>





                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Alt[Instagram] *</label> <input id="form_name" type="text" name="Instagram_Alt" @if($id) value="{{$data->Instagram_Alt}}" @else value="{{old('Instagram_Alt')}}"  @endif class="form-control" placeholder="Please enter Instagram Alt *"  > </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group">
                            <label>URL for Instagram</label>
                            <input type="text" class="form-control" name="url_Instagram" @if($id) value="{{$data->url_Instagram}}" @else value="{{old('url_Instagram')}}" @endif placeholder="enter url ie. https://example.com">
                        </div>
                    </div>



                    <div class="col-md-12">
                        <div class="form-group"> <label for="about"> Home page welcome Text*</label>
                            <textarea id="about" name="about">@if($id){{$data->about}} @else {{old('about')}} @endif</textarea>

                            <label for="about"  id="about-error" class="error">
                                @error('about')
                                 {{ $message }}
                                @enderror
                            </label>

                         </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group"> <label for="about_h"> Home page welcome Text [Hindi]* </label>
                            <textarea id="about_h" name="about_h">@if($id) {{$data->about_h}} @else {{old('about_h')}} @endif</textarea>

                            <label for="about_h"  id="about_h-error" class="error">
                                @error('about_h')
                                 {{ $message }}
                                @enderror
                            </label>

                         </div>
                    </div>





                    <div class="col-md-6">
                        <div class="form-group"> <label for="about_image">About Image</label><span style="color:green;font-size:12px;"> @if($id) [{{$data->about_image}}] @endif</span>
                            <input id="about_image" type="file" name="about_image" @if($id) value="{{$data->about_image}}" @endif class="form-control" accept=".jpeg,.jpg,.gif,.png">

                            <label for="about_image"  id="about_image-error" class="error">
                                @error('about_image')
                                 {{ $message }}
                                @enderror
                            </label>

                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group"> <label for="about_title"> Title[About us] *</label> <input id="about_title" type="text" name="about_title" @if($id) value="{{$data->about_title}}" @else value="{{old('about_title')}}"  @endif class="form-control" placeholder="Please enter About title *"  >
                            <label for="about_title"  id="about_title-error" class="error">
                                @error('about_title')
                                 {{ $message }}
                                @enderror
                            </label>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group"> <label for="form_name"> Alt[About us] </label> <input id="form_name" type="text" name="about_Alt" @if($id) value="{{$data->about_Alt}}" @else value="{{old('about_Alt')}}"  @endif class="form-control" placeholder="Please enter about  Alt *"  >
                        </div>
                    </div>

                    <div class="col-md-12">
                                <div class="form-group"> <label for="form_name">

                                        <input type="radio" value="yes" name="external"
                                            @if ($id) {{ $data->external == 'yes' ? 'checked' : '' }} @endif
                                            style="margin-left:50px;" id="checkbox"> &nbsp; About External URL </label>

                                    <input type="radio" value="no" name="external"
                                        @if ($id) {{ $data->external == 'no' ? 'checked' : '' }} @endif
                                        style="margin-left:50px;" id="checkboxs"> &nbsp;About Internal URL </label>


                                    <input type="text" name="url"
                                        @if ($id) value="{{ $data->url }}"  @else value="{{ old('url') }}" @endif
                                        class="form-control" id="url_ext"
                                        placeholder="Please enter full url; example https://www.example.com "
                                       >


                                </div>
                            <div class="col-md-12">

                                <div class="form-group"> <label for="meta_keywords"> Meta Keywords *  </label>

                                <input type="text" id="meta_keywords" name="meta_keywords" @if($id) value="{{$data->meta_keywords}}" @else value="{{old('meta_keywords')}}" @endif class="form-control"  maxlength="100" >




                                <label for="meta_keywords"  id="meta_keywords-error" class="error">
                                    @error('meta_keywords')
                                     {{ $message }}
                                    @enderror
                                </label>





                                </div>
                            </div>

                            <div class="col-md-12">

                                <div class="form-group"> <label for="meta_description"> Meta Description *  </label>

                                <input type="text" name="meta_description" @if($id) value="{{$data->meta_description}}" @else value="{{old('meta_description')}}" @endif class="form-control" maxlength="150" >


                                <label for="meta_description"  id="meta_description-error" class="error">
                                    @error('meta_description')
                                     {{ $message }}
                                    @enderror
                                </label>


                                </div>

                            </div>






                    <div class="col-md-12">

                        <div class="form-group"> <label for="HeadGoogleTag"> head open tag*(any Script will show just bleow head open tag)  </label>


                          <textarea class="form-control" id="HeadGoogleTag" rows="6" name="HeadGoogleTag" ><?php echo html_entity_decode($data->head_google_tags); ?></textarea>



                          <label for="HeadGoogleTag"  id="HeadGoogleTag-error" class="error">
                            @error('HeadGoogleTag')
                             {{ $message }}
                            @enderror
                        </label>





                        </div>
                      </div>

                          <div class="col-md-12">

                          <div class="form-group"> <label for="BodyGoogleTag"> body close Tag*(any Script will show just bleow body close tag)  </label>



                          <textarea class="form-control" id="BodyGoogleTag" rows="6" name="BodyGoogleTag" ><?php echo html_entity_decode($data->body_google_tags); ?></textarea>



                        <label for="BodyGoogleTag"  id="BodyGoogleTag-error" class="error">
                            @error('BodyGoogleTag')
                             {{ $message }}
                            @enderror
                        </label>





                          </div>

                          </div>


                    <div class="clearfix"></div>
                   <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                   </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <script type="text/javascript">
            CKEDITOR.replace('about');
            CKEDITOR.replace('about_h');
        </script>
       @endsection
