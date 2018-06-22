<div class="catalog_menu">
					
							
		<ul>
                     @if($LeftMenu)
                             @include(env('THEME').'.customLeftMenuItems',['items'=>$LeftMenu->roots()])
                     @endif
								
		</ul>
					
</div>


	

    
    