@foreach($items as $item)
         <li @if($item->isActive) class="active" @endif>
            <a href="{{ $item->url() }}"  {{ ( URL::current() == $item->url() ) ? 'class=current-item' : '' }}>{{ $item->title }}  @if($item->hasChildren())<span class="caret"></span> @endif</a>
              @if($item->hasChildren())     
                    <ul>
                        @include(env('THEME').'.customLeftMenuItems',['items'=>$item->children()])
                    </ul>
              @endif
         </li>
@endforeach