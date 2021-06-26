@extends('layouts.header-frontent')
@section('content')


<div class="archives post post1 padding-top-30">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 m-auto">
                <div class="bridcrumb"> <a href="#">Home</a> / news /{{$news->category->category_name}}</div>
            </div>
        </div>
        <div class="space-30"></div>
        <div class="row">
            <div class="col-12 col-md-10 col-lg-8 m-auto">
               @if($news->newsImages)
               <img src="{{asset('uploads/news_banners/'.$news->newsImages->ImageName.'')}}" alt="">
               @else
               <img src="{{asset('uploads/news/'.$news->ThumbImage.'')}}" alt="">
               @endif 
              
                <div class="space-20"></div>
                <div class="single_post_heading">
                    <h1>{{$news->NewsHeading}}</h1>
                </div>
                <div class="space-20"></div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <div class="author">
                            <div class="author_img">
                                <div class="author_img_wrap">
                                    <img src="{{asset('img/news/single_post1.jpg')}}" alt="">
                                </div>
                            </div> <a href="#">{{$news->source->source_name}}</a>
                            <ul>
                                <li><a href="#">{{$news->local}}</a>
                                </li>
                                <li>Updated {{$news->updated}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="author_social inline text-right">
                            <ul>
                                
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&title={{$news->NewsHeading}}" target="_blank" ><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li><a href="https://www.linkedin.com/shareArticle?url={{url()->current()}}&title={{$news->NewsHeading}}"

                                     target="_blank" ><i class="fab fa-linkedin"></i></a>
                                </li>
                                
                                <li><a href="https://twitter.com/intent/tweet?url={{url()->current()}}&title={{$news->NewsHeading}}"><i class="fab fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="space-30"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="page_comments">
                            <ul class="inline">
                                <li class="page_category">{{$news->sub_category ? $news->sub_category->sub_category_name : '' }}</li>
                                <li><i class="fas fa-comment"></i>563</li>
                            
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="space-20"></div>
                <div>
                    {!!$news->NewsDiscription!!}
                </div>
                <br><br>
                @if($news->newsVideo)
                <div>
                 
                   <video width="100%" height="auto" controls>
                    <source src="{{asset('/uploads/news_video/'.$news->newsVideo->VideoName.'')}}" type="video/mp4">
                  </video> 
                  
              
                </div>
                @endif
                <div class="space-20"></div>
                <div class="tags">
                    <ul class="inline">
                        <li class="tag_list"><i class="fas fa-tag"></i> tags</li>
                        @if(count($news->tags)>0)
                        @foreach ($news->tags as $tag)
                        <li><a href="/pelikken/news/topics/related/tag?tag_name={{$tag->slug}}">{{$tag->tag_name}}</a>
                        </li> 
                        @endforeach
                        
                        @else
                        No Tags Found
                        @endif
                    </ul>
                </div>
                <div class="space-20"></div>
            </div>
        </div>
    </div>
    {{-- latest News --}}
@if(count($news->get_previous_news())>0)
    <div class="fourth_bg padding6030">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading">
                        <h2 class="widget-title">Previous News</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-left">
                @foreach ($news->get_previous_news() as $item)
                    
               
                <div class="col-md-6 col-lg-4">
                    <div class="single_post post_type3 mb30">
                        <div class="post_img">
                            <a href="#">
                                <img src="{{asset('uploads/news/'.$item->ThumbImage.'')}}" alt="">
                            </a>
                        </div>
                        <div class="single_post_text">
                            <div class="meta3"> <a href="/news/{{$item->category->category_name}}">{{$item->category->category_name}}</a>
                                <a href="#">{{$news->local}}</a>
                            </div>
                            <h4><a href="/pelikken/news/{{$item->slug}}">{{$item->NewsHeading}}</a></h4>
                            <div class="space-10"></div>
                            <p class="post-p">{{$item->SubHeading}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
@endif

    {{-- Latest News End --}}

</div>

<div class="space-60"></div>
		<!--:::::  COMMENT FORM AREA START :::::::-->
		<div class="comment_form">
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-10 m-auto">
						<form id="commend-form">
                            @csrf
							<div class="row">
								<div class="col-md-6">
									<input type="text" placeholder="Full name" name="full_name">
								</div>
								<div class="col-md-6">
									<input type="email" placeholder="Email address" name="email">
									<input type="hidden" name="id" value="{{$news->id}}">
								</div>
								<div class="col-12">
									<textarea name="messege" id="messege" cols="30" rows="5" placeholder="Tell us about your opinion…" ></textarea>
								</div>
								<div class="col-12">
									<input type="button" value="POST OPINION" class="btn-send" id="du">
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="space-60"></div>
				<div class="comment_list">
					<div class="row">
						<div class="col-12 col-lg-10 m-auto">
							<h3>Our Comments</h3>
							<div class="single_comment">
								<div class="comment_img">
									<img src="{{asset('img/news/single_post1.jpg')}}" alt="">
								</div>
								<div class="row">
									<div class="col-sm-6">	<a href="#">QuomodoSoft</a>
									</div>
									
								</div>
								<div class="space-5"></div>
								<p>We’ve invested every aspect of how we serve our users over the past Pellentesque rutrum ante in nulla suscipit, vel posuere leo tristique.</p>
							</div>
							<div class="space-15"></div>
							<div class="border_black"></div>
							<div class="space-15"></div>
							
							
							
							
                            <div class="space-15"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
<!--:::::  COMMENT FORM AREA end :::::::-->
        
@endsection

@section('scripts')
<script src="{{ asset('js/simply-toast.min.js') }}"></script>
    <script>
   $('#du').on('click',function(){
   $.ajax({
       type: "post",
       url: "/comment",
       data: $('#commend-form').serialize(),
    
       success: function (response) {
           if(response.status == 'success'){
            $.simplyToast(response.message, 'success')
            $('#commend-form').trigger('reset')
           }else{
            $.simplyToast('All fields required', 'danger')
           }  
       }
   });
   })
    </script>
@endsection