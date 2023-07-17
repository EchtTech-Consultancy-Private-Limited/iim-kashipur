


@php

$mmenu=@content_menus($type[0]->menu_id);

@endphp


@foreach(GetSubMenusFront($type[0]->menu_id) as $key1=>$S)

    <ul>
        @if(count(GetchildMenusFront($type[0]->menu_id,$S->id))>0)

            <li class="hasnested"><a  @if($S->id==$type[0]->id) class="active" @endif > @if(GetLang()=='en') {{ $S->name ?? ''}}  @else {{ $S->name_h ?? ''}}  @endif<svg class="minus" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M19 13H5a1 1 0 0 1 0-2h14a1 1 0 0 1 0 2z" data-name="minus"/></g></svg><svg viewBox="0 0 24 24" class="plus"><path d="M19,11H13V5a1,1,0,0,0-2,0v6H5a1,1,0,0,0,0,2h6v6a1,1,0,0,0,2,0V13h6a1,1,0,0,0,0-2Z"/></svg></a>

                <ul>

                    @foreach(GetchildMenusFront($type[0]->menu_id,$S->id) as $key2=>$C)
                        @if($C->external=='yes')
                            <li><a href="{{url($C->url)}}" onclick="return confirm('Are you sure  external window open?')" target="_blank" > @if(GetLang()=='en') {{ $C->name ?? ''}}  @else {{ $C->name_h ?? ''}}  @endif</a></li>

                        @elseif($C->external=='no')

                        <li><a href="{{url($C->url)}}"> @if(GetLang()=='en') {{ $C->name ?? ''}}  @else {{ $C->name_h ?? ''}}  @endif</a></li>

                        @else
                            <li><a href={{url($C->url."/".$mmenu[0]->slug."/".$S->slug."/".$C->slug)}}> @if(GetLang()=='en') {{ $C->name ?? ''}}  @else {{ $C->name_h ?? ''}}  @endif</a></li>
                        @endif


                @endforeach

                </ul>

           </li>


        @else

            @if($S->external=='yes')

                <li><a href="{{ url($S->url) }}" onclick="return confirm('Are you sure  external window open?')" target="_blank">  @if(GetLang()=='en') {{ $S->name  ?? ''}}  @else {{ $S->name_h  ?? ''}}  @endif </a></li>

            @if($S->external=='no')

            <li><a href="{{ url($S->url) }}" >  @if(GetLang()=='en') {{ $S->name  ?? ''}}  @else {{ $S->name_h  ?? ''}}  @endif </a></li>

            @else

               <li><a href="{{ url($S->url."/".$mmenu[0]->slug."/".$S->slug) }}" @if($S->id==$type[0]->id) class="active" @endif>  @if(GetLang()=='en') {{ $S->name  ?? ''}}  @else {{ $S->name_h  ?? ''}}  @endif  </a></li>

            @endif


        @endif


    </ul>

@endforeach


