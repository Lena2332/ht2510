<section>
	<div class="container">
        <div class="col-xs-12 col-sm-12 col-lg-12 col-lgg-12 item_section">
	    <h2>{{ $title }}</h2>
	    <div class="row four_row">
                        @foreach($items as $item)
                               
					<div class="col-xs-12 col-sx-6 col-sm-4 col-lg-3">
						<div class="item">
							<a href="{{ ($item['open']) ? $item['slug'] : '/'}}">
								<span class="pos-img1">
									<img src="{{ asset(env('THEME')) }}/images/{{ $item['image'] }}" alt="#">
									
								</span>
								<span class="des1">
									<div class="quick_view_link" data-toggle="modal" data-target="#">{{ ($item['open']) ? 'Доступно всем' : 'Зарегистрированным пользователям' }}</div>
									<div class="_title">{{ $item['title'] }}</div>
									<div class="_text">{{ $item['annot'] }}</div>
									<div class="_price">
										<span class="_real">{{ $item['date_add'] }} @if(!$item['open'])
                                                                                                                               &nbsp;&nbsp;&nbsp; <i class="fa fa-lock" aria-hidden="true"></i>
                                                                                                                               @endif
                                                                                </span>
									</div>
								</span>
							</a>
						</div>
					</div>
                           @endforeach             
                                        
					
					
	</div>
    </div>
</div>
</section>