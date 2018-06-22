<!-- main_categor-->
<section id="main_categor">
	<div class="container">      
             <div class="row">
			<div class="col-xs-12 col-sx-12 col-sm-12 col-md-8 col-lg-8">
				<div class="main_banner">
                                    @if($video!="")
					<iframe style="width:90%;min-height:400px;" src="{{ $video }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    @else
                                        <img style="width:90%;min-height:400px;" src="{{ $image }}" />
                                    @endif
				</div>
			</div>
			<div class="col-xs-12 col-sx-6 col-sm-3  col-md-4 col-lg-4">
				<div class="main_banner">
					<h2>{{ $title }}</h2>
					<div>
					{{ $text }}
					</div>
					<div class="buttons"><a href="/instruction" class="btn btn-primary">
						Инструкция
					</a>
					<a href="/metodology"  class="btn btn-primary">
						Методология
					</a></div>
				</div>
			</div>
			
			
		</div>
          </div>
</section>