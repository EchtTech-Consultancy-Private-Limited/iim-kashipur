@extends('admin.Layout.master')
@section('title', 'Manage Menus ')
@section('content')
<style type="text/css">
  .td-list p:last-child {
    border-right: none!important;
  }
</style>
      <div class="main-panel">
        <div class="content-wrapper">
                @if(Session::has('success'))
              <div class="alert alert-success col-md-12 text-center">
                  <strong>Success!</strong> {{ Session::get('success') }}
                </div>
                 @endif
                @if(Session::has('error'))
              <div class="alert alert-danger col-md-12 text-center">
                  <strong>Oops!</strong> {{ Session::get('error') }}
                </div>
                 @endif   
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="top-menu-button">
                  <p class="card-title">Manage Menus </p>
                  <div>
                      <button type="button" class="btn btn-primary" ><a href="{{url('/Accounts/add-edit-menu')}}">Add New Menu </a></button>
                     <button type="button" class="btn btn-primary" ><a href="{{url('/Accounts/add-edit-sub-menu')}}">Add New Sub Menu </a></button>
                     <button type="button" class="btn btn-primary" ><a href="{{url('/Accounts/add-edit-child-menu')}}">Add New child Menu </a></button>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>S.No#</th>
                       
                           
                              <th>Main Menu</th>
                            
                              <th>
                              <table width="100%">
                                  <tr>
                                  <th width="50%">
                                    Sub Menu
                                  </th>
                                  <th width="50%">
                                    Child Menu
                                  </th>
                              </table>
                              </th>

                              
                            
                          
                            </tr>
                          </thead>
                          <tbody>
                            @foreach(GetMenu() as $K=>$D)
                            <tr>
                              <td valign="top" style=" padding-top:10px;">{{$K+1}}</td>
                           
                            
                              <td style="width:30%; padding-top:10px;" valign="top">
                                          {{$D->name}} 
                                          @if(@checkRoute('Menu_StatusChange'))<a href="{{url('Accounts/menu-status-change/menu/'.dEncrypt($D->id).'/'.$D->status)}}"> @endif <span style="background: @if($D->status==0 )red @else green @endif; position: relative; top: -9px; font-size: 11px; color: #fff; padding: 2px;  border-radius: 10px; margin-right:10px;">  @if($D->status==1) Active @else Inactive @endif </span> @if(@checkRoute('Menu_StatusChange'))</a>@endif 
                                          <a href="{{url('Accounts/add-edit-menu/'.dEncrypt($D->id))}}"><i class="ti-pencil btn-icon-append" style="color:black;"></i></a>
                             </td>
                              @foreach($D->GetSubMenus as $sm)
                              <td style="display: flex; flex-wrap: wrap; padding-top:0px;" class="td-list">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                  <tr>
                                  <td width="50%" valign="top" >
                                      {{$sm->name}}
                                      @if(@checkRoute('Menu_StatusChange'))<a href="{{url('Accounts/menu-status-change/sub-menu/'.dEncrypt($sm->id).'/'.$sm->status)}}"> @endif <span style="background: @if($sm->status==0 )red @else green @endif; position: relative; top: -9px; font-size: 11px; color: #fff; padding: 2px;  border-radius: 10px; margin-right:10px;"> @if($sm->status==1) Active @else Inactive @endif </span> @if(@checkRoute('Menu_StatusChange'))</a>@endif 
                                        <a href="{{url('Accounts/add-edit-sub-menu/'.dEncrypt($sm->id))}}"><i class="ti-pencil btn-icon-append" style="color:black;"></i></a>  
                                </td>
                                <td width="50%" valign="top">

                                    @foreach(@GetchildMenus($D->id,$sm->id) as $cm)
                                        <p style="margin-right:10px;border-right: 2px solid;padding-right: 5px;">
                                        {{$cm->name}}
                                        @if(@checkRoute('Menu_StatusChange'))<a href="{{url('Accounts/menu-status-change/child-menu/'.dEncrypt($cm->id).'/'.$cm->status)}}"> @endif <span  style="background: @if($cm->status==0 )red @else green @endif; position: relative; top: -9px; font-size: 11px; color: #fff; padding: 2px;  border-radius: 10px; margin-right:10px;"> @if($cm->status==1) Active @else Inactive @endif </span> @if(@checkRoute('Menu_StatusChange'))</a>@endif 
                                        <a href="{{url('Accounts/add-edit-child-menu/'.dEncrypt($cm->id))}}"><i class="ti-pencil btn-icon-append" style="color:black;"></i></a>  
                                        </p> 
                                      @endforeach

                                </td>
                              </tr>
                            </table>
                                  
                                 
                              </td>
                               @endforeach
                              
                              
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>

                
              </div>
            </div>
        </div>
    
       @endsection

