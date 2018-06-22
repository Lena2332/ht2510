@foreach($items as $item)
         <li {{ ( URL::current() == $item->url() ) ? 'class=current-menu-item' : '' }} @if($item->hasChildren()) style="position:relative;" @endif >
            <a href="{{ $item->url() }}">{{ $item->title }}</a>
              @if($item->hasChildren())
                    <ul class="dropdown-menu dop_menu">
                        @include(env('THEME').'.customMenuItems',['items'=>$item->children()])
                    </ul>
              @endif
         </li>
@endforeach