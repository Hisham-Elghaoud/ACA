@extends('layouts.app')
@section('content')

	
<div class="px-4 lg:px-12 max-w-container mx-auto lg:flex gap-10 relative -top-8">
	<div class="text-white lg:w-3/5 ">
		<div class="slideshow-container">
			@foreach ($fav_news as $fav_new)
			<div class="mySlides fade">
			  {{-- <div class="numbertext">1 / 3</div> --}}
			  <img style="height: 650px; width: 950px;" src="{{asset('storage/public/uploads/website')}}/{{$fav_new['path']}}" style="width:100%">
			  <div class="text">
				<p class="flex items-center gap-2 text-sm">
					<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M18.5 20.5H2.5C1.97005 20.4984 1.46227 20.2872 1.08753 19.9125C0.712805 19.5377 0.501583 19.0299 0.5 18.5V4.5C0.501583 3.97005 0.712805 3.46227 1.08753 3.08753C1.46227 2.7128 1.97005 2.50158 2.5 2.5H18.5C19.0299 2.50158 19.5377 2.7128 19.9125 3.08753C20.2872 3.46227 20.4984 3.97005 20.5 4.5V18.5C20.4984 19.0299 20.2872 19.5377 19.9125 19.9125C19.5377 20.2872 19.0299 20.4984 18.5 20.5Z"
							stroke="white" stroke-miterlimit="10" stroke-linecap="round" />
						<path
							d="M18.5 20.5H2.5C1.97005 20.4984 1.46227 20.2872 1.08753 19.9125C0.712805 19.5377 0.501583 19.0299 0.5 18.5V8.5H20.5V18.5C20.4984 19.0299 20.2872 19.5377 19.9125 19.9125C19.5377 20.2872 19.0299 20.4984 18.5 20.5Z"
							stroke="white" stroke-miterlimit="10" stroke-linecap="round" />
						<path d="M14.5 0.5V4.5" stroke="white" stroke-miterlimit="10" stroke-linecap="round"
							stroke-linejoin="round" />
						<path d="M6.5 0.5V4.5" stroke="white" stroke-miterlimit="10" stroke-linecap="round"
							stroke-linejoin="round" />
						<path d="M3.5 12.5H5.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M7.5 12.5H9.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M11.5 12.5H13.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M15.5 12.5H17.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M3.5 16.5H5.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M7.5 16.5H9.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M11.5 16.5H13.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M15.5 16.5H17.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
					</svg>
	
					<span class="text-sm z-20">نشر في  {{$fav_new['created_at']->format('Y-m-d')}}</span>
					</p>
					<h2 class="text-2xl max-w-xs z-20">
						{{$fav_new['title']}}
					</h2>
					<p class="font-medium max-w-lg leading-9 z-20">
						{{$fav_new['content']}}
					</p>
			  </div>
			</div>
			@endforeach
			
			<a class="prev" onclick="plusSlides(-1)">❮</a>
			<a class="next" onclick="plusSlides(1)">❯</a>
			
			</div>
			<br>
			
			<div style="text-align:center">
			  <span class="dot" onclick="currentSlide(1)"></span> 
			  <span class="dot" onclick="currentSlide(2)"></span> 
			  <span class="dot" onclick="currentSlide(3)"></span> 
			</div>
		
		{{-- <div
			class="relative bg-gradient-to-l  from-neutral-700 to-neutral-600 flex flex-col justify-center gap-8 py-8 px-10 min-h-[36rem] shadow-md">
			<img src="{{asset('storage/public/uploads/website')}}/hero.png"
				class="w-full h-full absolute top-0 right-0 object-cover object-center mix-blend-overlay z-10"
				alt="">
			<p class="flex items-center gap-2 text-sm">
				<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M18.5 20.5H2.5C1.97005 20.4984 1.46227 20.2872 1.08753 19.9125C0.712805 19.5377 0.501583 19.0299 0.5 18.5V4.5C0.501583 3.97005 0.712805 3.46227 1.08753 3.08753C1.46227 2.7128 1.97005 2.50158 2.5 2.5H18.5C19.0299 2.50158 19.5377 2.7128 19.9125 3.08753C20.2872 3.46227 20.4984 3.97005 20.5 4.5V18.5C20.4984 19.0299 20.2872 19.5377 19.9125 19.9125C19.5377 20.2872 19.0299 20.4984 18.5 20.5Z"
						stroke="white" stroke-miterlimit="10" stroke-linecap="round" />
					<path
						d="M18.5 20.5H2.5C1.97005 20.4984 1.46227 20.2872 1.08753 19.9125C0.712805 19.5377 0.501583 19.0299 0.5 18.5V8.5H20.5V18.5C20.4984 19.0299 20.2872 19.5377 19.9125 19.9125C19.5377 20.2872 19.0299 20.4984 18.5 20.5Z"
						stroke="white" stroke-miterlimit="10" stroke-linecap="round" />
					<path d="M14.5 0.5V4.5" stroke="white" stroke-miterlimit="10" stroke-linecap="round"
						stroke-linejoin="round" />
					<path d="M6.5 0.5V4.5" stroke="white" stroke-miterlimit="10" stroke-linecap="round"
						stroke-linejoin="round" />
					<path d="M3.5 12.5H5.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
					<path d="M7.5 12.5H9.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
					<path d="M11.5 12.5H13.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
					<path d="M15.5 12.5H17.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
					<path d="M3.5 16.5H5.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
					<path d="M7.5 16.5H9.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
					<path d="M11.5 16.5H13.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
					<path d="M15.5 16.5H17.5" stroke="white" stroke-miterlimit="10" stroke-linejoin="round" />
				</svg>

				<span class="text-sm z-20">نشر في 12 ابريل، 2022</span>
			</p>
			<h2 class="text-2xl max-w-xs z-20">
				رئيس الهيئة يفتتح مستشفى طب الأسنان التعليمي بمصراته
			</h2>
			<p class="font-medium max-w-lg leading-9 z-20">
				افتتح السيد #سليمان الشنطي رئيس هيئة الرقابة الادارية صباح اليوم احتفالية افتتاح مستشفى طب
				وجراحة
				الفم والأسنان التعليمي بمصراته والذي جرى برعاية السيد عبدالحميد الدبيبة رئيس حكومة الوحدة
				الوطنية.
			</p>
			<a href="" class="flex gap-2 mt-12 z-20">
				<span class="font-medium text-sm">أقرأ المزيد</span>
				<div class="w-2">
					<svg width="100%" height="100%" viewBox="0 0 6 10" fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path d="M5 9L1 5L5 1" stroke="white" stroke-width="1.5" stroke-linecap="round"
							stroke-linejoin="round" />
					</svg>
				</div>
			</a>
		</div>
		<div class="flex items-center gap-6 mt-12">
			<svg width="22" height="11" viewBox="0 0 22 11" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M17 0L16.21 0.72L20.1 5H0V6H20.1L16.21 10.28L16.72 11L22 5.5L17 0Z" fill="black" />
			</svg>

			<svg width="22" height="11" viewBox="0 0 22 11" fill="rgb(107 114 128)"
				xmlns="http://www.w3.org/2000/svg">
				<path d="M5 0L5.79 0.72L1.9 5H22V6H1.9L5.79 10.28L5.28 11L0 5.5L5 0Z" fill="black" />
			</svg>

			<hr class="w-full h-[2px] bg-gray-500">
		</div> --}}
	</div>
	<div class="lg:w-2/5 p-10 bg-gradient-to-b from-gray-200 to-white shadow-hero mt-8 lg:mt-0">
		<div class="p-8 border-4 border-gray-300 h-full ">
			<div
				class="relative bg-gradient-to-b from-gray-200 to-white h-full flex flex-col justify-center items-center gap-8 text-center">
				<img src="{{asset('storage/public/uploads/website/map.png')}}"
					class="w-full h-full absolute top-0 right-0 object-cover object-center mix-blend-overlay z-10"
					alt="">
				<svg width="50" height="40" viewBox="0 0 50 40" fill="black" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M6.63444 20.6C8.31961 18.2652 10.9868 17.2245 14.0391 17.2245C19.6786 17.2245 23.7523 21.2611 23.7523 28.0683C23.7523 34.4676 19.9438 39.8967 11.9427 39.8967C4.59133 39.8967 0 34.3272 0 25.2843C0 13.189 6.86033 3.69533 19.2675 0.558495C19.9975 0.375782 20.807 0.853758 21.0589 1.61335L21.3108 2.37294C21.5627 3.13253 21.178 3.87795 20.4485 4.10315C12.261 6.53642 7.29786 11.8248 6.06492 20.3901C5.95829 21.1775 6.17066 21.2476 6.6354 20.6006L6.63444 20.6ZM32.8822 20.6C34.5673 18.2652 37.2345 17.2245 40.2868 17.2245C45.9263 17.2245 50 21.2611 50 28.0683C50 34.4676 46.1915 39.8967 38.1904 39.8967C30.8391 39.8967 26.2477 34.3272 26.2477 25.2843C26.2477 13.189 33.1081 3.69533 45.5289 0.558495C46.2589 0.375782 47.0684 0.853758 47.3203 1.61335L47.5722 2.37294C47.8241 3.13253 47.4394 3.87795 46.7098 4.10315C38.5224 6.53642 33.5592 11.8248 32.3263 20.3901C32.2068 21.1775 32.432 21.2476 32.8834 20.6006L32.8822 20.6Z"
						fill="black" />
				</svg>
				<p class="text-xl">تهدف الهيئة إلى تحقيق رقابة إدارية فعالة على الجهاز التنفيذي في الدولة</p>
				<a href="" class="flex gap-2 mt-12">
					<span class="font-medium text-sm"> المزيد عن الهيئة</span>
					<div class="w-2">
						<svg width="100%" height="100%" viewBox="0 0 6 10" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path d="M5 9L1 5L5 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
								stroke-linejoin="round" />
						</svg>
					</div>
				</a>
			</div>
			<div class="flex justify-center gap-4 mt-8 lg:mt-0">
				<div class="w-2 h-2 rounded-[50%] bg-black"></div>
				<div class="w-2 h-2 rounded-[50%] bg-black"></div>
				<div class="w-2 h-2 rounded-[50%] bg-black"></div>
			</div>
		</div>
	</div>
</div>
<main>
	<div class="flex justify-between px-4 lg:px-12 max-w-container mx-auto mt-20">
		{{-- <h3 class="text-2xl">أخر الأخبار</h3> --}}
		<h3 class="header-title">أخر الأخبار</h3>
		<a href="" class="text-left flex items-center gap-2">
			<span class="font-medium">الارشيف </span>
			<div class="w-2">
				<svg width="100%" height="100%" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M5 9L1 5L5 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
						stroke-linejoin="round" />
				</svg>
			</div>
		</a>
	</div>


	
	<div class="pb-20 px-4 lg:px-12 max-w-container mx-auto grid  md:grid-cols-[60%_40%] gap-y-4 md:gap-0 mt-8">
		<div class="md:flex gap-8 md:pl-8">
			<div class="flex flex-col justify-between gap-8">
				<img class="rounded-md h-60 object-cover" src="{{asset('storage/public/uploads/website')}}/{{$right_news[0]['path']}}" alt="">
				<p class="flex gap-2">
					<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M18.5 20.5H2.5C1.97005 20.4984 1.46227 20.2872 1.08753 19.9125C0.712805 19.5377 0.501583 19.0299 0.5 18.5V4.5C0.501583 3.97005 0.712805 3.46227 1.08753 3.08753C1.46227 2.7128 1.97005 2.50158 2.5 2.5H18.5C19.0299 2.50158 19.5377 2.7128 19.9125 3.08753C20.2872 3.46227 20.4984 3.97005 20.5 4.5V18.5C20.4984 19.0299 20.2872 19.5377 19.9125 19.9125C19.5377 20.2872 19.0299 20.4984 18.5 20.5Z"
							stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round" />
						<path
							d="M18.5 20.5H2.5C1.97005 20.4984 1.46227 20.2872 1.08753 19.9125C0.712805 19.5377 0.501583 19.0299 0.5 18.5V8.5H20.5V18.5C20.4984 19.0299 20.2872 19.5377 19.9125 19.9125C19.5377 20.2872 19.0299 20.4984 18.5 20.5Z"
							stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round" />
						<path d="M14.5 0.5V4.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round"
							stroke-linejoin="round" />
						<path d="M6.5 0.5V4.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round"
							stroke-linejoin="round" />
						<path d="M3.5 12.5H5.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M7.5 12.5H9.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M11.5 12.5H13.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M15.5 12.5H17.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M3.5 16.5H5.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M7.5 16.5H9.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M11.5 16.5H13.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M15.5 16.5H17.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
					</svg>

					<span class="font-medium text-sm">نشر في {{$right_news[0]['created_at']->format('Y-m-d')}}  </span>
				</p>
				<p class="heading-title">
					{{$right_news[0]['title']}}
				</p>
				<p class="font-medium leading-8 content-title">
					{{$right_news[0]['content']}}
				</p>
				<a href="{{route('news_details', [$right_news[0]['id']])}}" class="flex gap-2">
					<span class="font-medium text-sm">أقرأ المزيد</span>
					<div class="w-2">
						<svg width="100%" height="100%" viewBox="0 0 6 10" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path d="M5 9L1 5L5 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
								stroke-linejoin="round" />
						</svg>
					</div>

				</a>
			</div>
			<div class="flex flex-col justify-between gap-8 mt-8 md:mt-0 lg:mt-0">
				<img class="rounded-md h-60 object-cover" src="{{asset('storage/public/uploads/website')}}/{{$right_news[1]['path']}}" alt="">
				<p class="flex gap-2">
					<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M18.5 20.5H2.5C1.97005 20.4984 1.46227 20.2872 1.08753 19.9125C0.712805 19.5377 0.501583 19.0299 0.5 18.5V4.5C0.501583 3.97005 0.712805 3.46227 1.08753 3.08753C1.46227 2.7128 1.97005 2.50158 2.5 2.5H18.5C19.0299 2.50158 19.5377 2.7128 19.9125 3.08753C20.2872 3.46227 20.4984 3.97005 20.5 4.5V18.5C20.4984 19.0299 20.2872 19.5377 19.9125 19.9125C19.5377 20.2872 19.0299 20.4984 18.5 20.5Z"
							stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round" />
						<path
							d="M18.5 20.5H2.5C1.97005 20.4984 1.46227 20.2872 1.08753 19.9125C0.712805 19.5377 0.501583 19.0299 0.5 18.5V8.5H20.5V18.5C20.4984 19.0299 20.2872 19.5377 19.9125 19.9125C19.5377 20.2872 19.0299 20.4984 18.5 20.5Z"
							stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round" />
						<path d="M14.5 0.5V4.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round"
							stroke-linejoin="round" />
						<path d="M6.5 0.5V4.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round"
							stroke-linejoin="round" />
						<path d="M3.5 12.5H5.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M7.5 12.5H9.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M11.5 12.5H13.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M15.5 12.5H17.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M3.5 16.5H5.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M7.5 16.5H9.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M11.5 16.5H13.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
						<path d="M15.5 16.5H17.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linejoin="round" />
					</svg>

					<span class="font-medium text-sm">نشر في {{$right_news[1]['created_at']->format('Y-m-d')}}</span>
				</p>
				<p class="heading-title">
					{{$right_news[1]['title']}}
				</p>
				<p class="font-medium leading-8 content-title">
					{{$right_news[1]['content']}}
				</p>
				<a href="{{route('news_details', [$right_news[1]['id']])}}" class="flex gap-2">
					<span class="font-medium text-sm">أقرأ المزيد</span>
					<div class="w-2">
						<svg width="100%" height="100%" viewBox="0 0 6 10" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path d="M5 9L1 5L5 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
								stroke-linejoin="round" />
						</svg>
					</div>

				</a>
			</div>
		</div>

		<div
			class="flex flex-col justify-between gap-8 border-t-2 md:border-t-0 md:border-r-2 border-gray-100 pt-8 md:pt-0 md:pr-8">
			@foreach ($left_news as $left_new)
			<div class="grid grid-cols-2 md:grid-cols-1 lg:grid-cols-2 gap-6">
				<div class="flex flex-col justify-between gap-4  text-sm md:text-base">
					<p class="flex gap-2">
						<svg width="21" height="21" viewBox="0 0 21 21" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M18.5 20.5H2.5C1.97005 20.4984 1.46227 20.2872 1.08753 19.9125C0.712805 19.5377 0.501583 19.0299 0.5 18.5V4.5C0.501583 3.97005 0.712805 3.46227 1.08753 3.08753C1.46227 2.7128 1.97005 2.50158 2.5 2.5H18.5C19.0299 2.50158 19.5377 2.7128 19.9125 3.08753C20.2872 3.46227 20.4984 3.97005 20.5 4.5V18.5C20.4984 19.0299 20.2872 19.5377 19.9125 19.9125C19.5377 20.2872 19.0299 20.4984 18.5 20.5Z"
								stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round" />
							<path
								d="M18.5 20.5H2.5C1.97005 20.4984 1.46227 20.2872 1.08753 19.9125C0.712805 19.5377 0.501583 19.0299 0.5 18.5V8.5H20.5V18.5C20.4984 19.0299 20.2872 19.5377 19.9125 19.9125C19.5377 20.2872 19.0299 20.4984 18.5 20.5Z"
								stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round" />
							<path d="M14.5 0.5V4.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round"
								stroke-linejoin="round" />
							<path d="M6.5 0.5V4.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round"
								stroke-linejoin="round" />
							<path d="M3.5 12.5H5.5" stroke="#1F2933" stroke-miterlimit="10"
								stroke-linejoin="round" />
							<path d="M7.5 12.5H9.5" stroke="#1F2933" stroke-miterlimit="10"
								stroke-linejoin="round" />
							<path d="M11.5 12.5H13.5" stroke="#1F2933" stroke-miterlimit="10"
								stroke-linejoin="round" />
							<path d="M15.5 12.5H17.5" stroke="#1F2933" stroke-miterlimit="10"
								stroke-linejoin="round" />
							<path d="M3.5 16.5H5.5" stroke="#1F2933" stroke-miterlimit="10"
								stroke-linejoin="round" />
							<path d="M7.5 16.5H9.5" stroke="#1F2933" stroke-miterlimit="10"
								stroke-linejoin="round" />
							<path d="M11.5 16.5H13.5" stroke="#1F2933" stroke-miterlimit="10"
								stroke-linejoin="round" />
							<path d="M15.5 16.5H17.5" stroke="#1F2933" stroke-miterlimit="10"
								stroke-linejoin="round" />
						</svg>
						<span class="font-medium text-sm">نشر في  {{$left_new['created_at']->format('Y-m-d')}}  </span>
					</p>
					<p class="heading-title">
						{{$left_new['title']}}
					</p>
					<a href="{{route('news_details', [$left_new['id']])}}" class="sm:flex gap-2 hidden ">
						<span class="font-medium text-sm">أقرأ المزيد</span>
						<div class="w-2">
							<svg width="100%" height="100%" viewBox="0 0 6 10" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path d="M5 9L1 5L5 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
									stroke-linejoin="round" />
							</svg>
						</div>
					</a>
				</div>
				<div class=" h-36 md:h-48 w-full">
					<img class="rounded-md w-full h-full object-cover" src="{{asset('storage/public/uploads/website')}}/{{$left_new['path']}}" alt="">

				</div>
			</div>
			@endforeach
		</div>
	</div>

	<div style="background-image: url('{{asset('storage/public/uploads/website/Vector.png')}}');" class="bg-[url('{{asset('storage/public/uploads/website')}}/Vector.png')] bg-cover bg-right py-16 md:py-24 bg-gray-50">
		<div class="px-4 lg:px-12 max-w-container mx-auto lg:flex items-center justify-between gap-4">
			<div class="grid gap-y-16">
				{{-- <h2 class="text-2xl">التقرير السنوي</h2> --}}
				<h2 class="header-title">التقرير السنوي</h2>
				<p class="font-medium md:max-w-md content-title">لوريم إيبسوم هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس
					المحتوى)
					ويُستخدم في صناعات المطابع
					ودور النشر.</p>
				<button
					class="w-fit flex justify-center items-center  gap-3 border border-black py-2 px-4 rounded-md ">
					<a href="{{route('show_yearly_report')}}"><span class="font-medium"> التفاصيل</span></a>
					<div class="w-2">
						<svg width="100%" height="100%" viewBox="0 0 6 10" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path d="M5 9L1 5L5 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
								stroke-linejoin="round" />
						</svg>
					</div>
				</button>
			</div>
			<div class="shadow-xl lg:w-3/5 mt-12 lg:mt-0">
				<p class="bg-black text-white p-10">تقرير الهيئة الرقابية للسنة 2021</p>
				<div style="background-image: url('{{asset('storage/public/uploads/website/Chart.png')}}');"
					class="bg-[url('{{asset('storage/public/uploads/website/Chart.png')}}')] bg-cover bg-center p-10 bg-white h-96 md:h-[30rem] lg:h-[35rem]">
				</div>

			</div>
		</div>
	</div>

	<div
		class="px-4 lg:px-12 py-24 max-w-container mx-auto grid sm:grid-cols-2 lg:grid-cols-3 gap-12 sm:gap-6 text-center">
		<div class="grid justify-items-center">
			<svg width="140" height="140" viewBox="0 0 174 173" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path opacity="0.3"
					d="M86.466 173C134.22 173 172.932 134.273 172.932 86.5C172.932 38.7274 134.22 0 86.466 0C38.7122 0 0 38.7274 0 86.5C0 134.273 38.7122 173 86.466 173Z"
					fill="#D6DAE3" />
				<path opacity="0.8"
					d="M114.354 48.7256H47.7917C47.2243 48.7257 46.6626 48.8376 46.1385 49.0548C45.6144 49.272 45.1383 49.5904 44.7372 49.9916C44.3362 50.3928 44.0181 50.8691 43.8011 51.3933C43.5841 51.9175 43.4725 52.4793 43.4727 53.0466V142.901H118.673V53.0466C118.673 52.4793 118.561 51.9175 118.344 51.3933C118.127 50.8691 117.809 50.3928 117.408 49.9916C117.007 49.5904 116.531 49.272 116.007 49.0548C115.483 48.8376 114.921 48.7257 114.354 48.7256Z"
					fill="#D6DAE3" />
				<path
					d="M141.75 142.499V53.0466C141.75 52.4793 141.638 51.9175 141.421 51.3933C141.204 50.8691 140.886 50.3928 140.485 49.9916C140.084 49.5904 139.608 49.272 139.084 49.0548C138.56 48.8376 137.998 48.7257 137.431 48.7256H113.009"
					stroke="#303436" stroke-width="3.011" stroke-linecap="round" stroke-linejoin="round" />
				<path
					d="M102.314 38.6885H35.7516C35.1843 38.6886 34.6226 38.8005 34.0985 39.0177C33.5744 39.2349 33.0983 39.5532 32.6972 39.9545C32.2961 40.3557 31.9781 40.832 31.7611 41.3562C31.5441 41.8804 31.4325 42.4422 31.4326 43.0095V142.9H106.633V43.0095C106.633 42.4422 106.521 41.8804 106.304 41.3562C106.087 40.832 105.769 40.3557 105.368 39.9545C104.967 39.5532 104.491 39.2349 103.967 39.0177C103.443 38.8005 102.881 38.6886 102.314 38.6885Z"
					fill="white" />
				<path d="M165.32 142.9H172.495" stroke="#303436" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M155.956 142.9H159.301" stroke="#303436" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M14.1504 142.9H147.93" stroke="#303436" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M2.11035 142.9H6.79335" stroke="#303436" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M112.744 114.254H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M120.771 121.421H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M116.758 107.087H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M112.744 64.3604H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M120.771 71.5273H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M47.0508 64.3604H91.0158" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M69.125 71.5273H91.016" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M55.0781 57.1934H91.0161" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path
					d="M82.7111 84.6284H22.8471C19.8913 84.6284 17.4951 87.0246 17.4951 89.9804V118.756C17.4951 121.712 19.8913 124.108 22.8471 124.108H82.7111C85.6669 124.108 88.0631 121.712 88.0631 118.756V89.9804C88.0631 87.0246 85.6669 84.6284 82.7111 84.6284Z"
					fill="#B69557" />
				<path
					d="M40.3555 99.4606H43.9415C44.4458 99.4575 44.9489 99.5105 45.4415 99.6186C45.8785 99.7115 46.2925 99.8907 46.6595 100.146C47.0111 100.398 47.2935 100.734 47.4805 101.125C47.6805 101.598 47.7828 102.106 47.7815 102.62C47.7801 103.134 47.675 103.642 47.4725 104.114C47.2771 104.521 46.9891 104.878 46.6315 105.155C46.2673 105.431 45.8534 105.634 45.4125 105.755C44.9321 105.889 44.4353 105.956 43.9365 105.955H42.5825V109.282H40.3555V99.4606ZM43.8015 104.189C45.0055 104.189 45.6071 103.667 45.6065 102.623C45.6276 102.418 45.5966 102.211 45.5164 102.022C45.4361 101.832 45.3092 101.666 45.1475 101.539C44.7401 101.302 44.2715 101.192 43.8015 101.223H42.5825V104.189H43.8015Z"
					fill="white" />
				<path
					d="M49.46 99.4605H52.229C52.9195 99.4517 53.6073 99.5478 54.269 99.7455C54.8468 99.9203 55.3786 100.221 55.826 100.627C56.2724 101.045 56.6128 101.564 56.819 102.141C57.0648 102.841 57.182 103.581 57.165 104.324C57.1814 105.072 57.0643 105.817 56.819 106.524C56.6147 107.106 56.2806 107.634 55.842 108.068C55.4114 108.48 54.8946 108.791 54.329 108.979C53.6953 109.186 53.0317 109.288 52.365 109.279H49.459L49.46 99.4605ZM52.109 107.485C52.4917 107.489 52.8728 107.433 53.238 107.319C53.5704 107.214 53.8727 107.031 54.119 106.785C54.3822 106.509 54.578 106.176 54.691 105.813C54.8372 105.33 54.9047 104.827 54.891 104.323C54.9043 103.826 54.8367 103.33 54.691 102.855C54.579 102.497 54.3828 102.172 54.119 101.906C53.8702 101.67 53.5678 101.498 53.238 101.406C52.8707 101.302 52.4906 101.251 52.109 101.255H51.688V107.488L52.109 107.485Z"
					fill="white" />
				<path
					d="M59.0029 99.4604H65.2029V101.327H61.2299V103.6H64.6159V105.467H61.2299V109.276H59.0029V99.4604Z"
					fill="white" />
			</svg>
			<h3 class="mt-8 text-xl header-title">القرارات</h3>
			<a href="" class="mt-12 text-sm flex gap-2 items-center">
				<a href="{{route('show_desisions')}}"><span>التفاصيل </span></a>
				<div class="w-1">
					<svg width="100%" height="100%" viewBox="0 0 6 10" fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path d="M5 9L1 5L5 1" stroke="#1F2933" stroke-width="1.5" stroke-linecap="round"
							stroke-linejoin="round" />
					</svg>
				</div>
			</a>
		</div>
		<div class="grid justify-items-center border-t pt-12 sm:border-t-0 sm:pt-0 sm:border-r ">
			<svg width="140" height="140" viewBox="0 0 174 173" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path opacity="0.3"
					d="M86.466 173C134.22 173 172.932 134.273 172.932 86.5C172.932 38.7274 134.22 0 86.466 0C38.7122 0 0 38.7274 0 86.5C0 134.273 38.7122 173 86.466 173Z"
					fill="#D6DAE3" />
				<path opacity="0.8"
					d="M114.354 48.7256H47.7917C47.2243 48.7257 46.6626 48.8376 46.1385 49.0548C45.6144 49.272 45.1383 49.5904 44.7372 49.9916C44.3362 50.3928 44.0181 50.8691 43.8011 51.3933C43.5841 51.9175 43.4725 52.4793 43.4727 53.0466V142.901H118.673V53.0466C118.673 52.4793 118.561 51.9175 118.344 51.3933C118.127 50.8691 117.809 50.3928 117.408 49.9916C117.007 49.5904 116.531 49.272 116.007 49.0548C115.483 48.8376 114.921 48.7257 114.354 48.7256Z"
					fill="#D6DAE3" />
				<path
					d="M141.75 142.499V53.0466C141.75 52.4793 141.638 51.9175 141.421 51.3933C141.204 50.8691 140.886 50.3928 140.485 49.9916C140.084 49.5904 139.608 49.272 139.084 49.0548C138.56 48.8376 137.998 48.7257 137.431 48.7256H113.009"
					stroke="#303436" stroke-width="3.011" stroke-linecap="round" stroke-linejoin="round" />
				<path
					d="M102.314 38.6885H35.7516C35.1843 38.6886 34.6226 38.8005 34.0985 39.0177C33.5744 39.2349 33.0983 39.5532 32.6972 39.9545C32.2961 40.3557 31.9781 40.832 31.7611 41.3562C31.5441 41.8804 31.4325 42.4422 31.4326 43.0095V142.9H106.633V43.0095C106.633 42.4422 106.521 41.8804 106.304 41.3562C106.087 40.832 105.769 40.3557 105.368 39.9545C104.967 39.5532 104.491 39.2349 103.967 39.0177C103.443 38.8005 102.881 38.6886 102.314 38.6885Z"
					fill="white" />
				<path d="M165.32 142.9H172.495" stroke="#303436" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M155.956 142.9H159.301" stroke="#303436" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M14.1504 142.9H147.93" stroke="#303436" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M2.11035 142.9H6.79335" stroke="#303436" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M112.744 114.254H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M120.771 121.421H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M116.758 107.087H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M112.744 64.3604H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M120.771 71.5273H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M47.0508 64.3604H91.0158" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M69.125 71.5273H91.016" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M55.0781 57.1934H91.0161" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path
					d="M82.7111 84.6284H22.8471C19.8913 84.6284 17.4951 87.0246 17.4951 89.9804V118.756C17.4951 121.712 19.8913 124.108 22.8471 124.108H82.7111C85.6669 124.108 88.0631 121.712 88.0631 118.756V89.9804C88.0631 87.0246 85.6669 84.6284 82.7111 84.6284Z"
					fill="#B69557" />
				<path
					d="M40.3555 99.4606H43.9415C44.4458 99.4575 44.9489 99.5105 45.4415 99.6186C45.8785 99.7115 46.2925 99.8907 46.6595 100.146C47.0111 100.398 47.2935 100.734 47.4805 101.125C47.6805 101.598 47.7828 102.106 47.7815 102.62C47.7801 103.134 47.675 103.642 47.4725 104.114C47.2771 104.521 46.9891 104.878 46.6315 105.155C46.2673 105.431 45.8534 105.634 45.4125 105.755C44.9321 105.889 44.4353 105.956 43.9365 105.955H42.5825V109.282H40.3555V99.4606ZM43.8015 104.189C45.0055 104.189 45.6071 103.667 45.6065 102.623C45.6276 102.418 45.5966 102.211 45.5164 102.022C45.4361 101.832 45.3092 101.666 45.1475 101.539C44.7401 101.302 44.2715 101.192 43.8015 101.223H42.5825V104.189H43.8015Z"
					fill="white" />
				<path
					d="M49.46 99.4605H52.229C52.9195 99.4517 53.6073 99.5478 54.269 99.7455C54.8468 99.9203 55.3786 100.221 55.826 100.627C56.2724 101.045 56.6128 101.564 56.819 102.141C57.0648 102.841 57.182 103.581 57.165 104.324C57.1814 105.072 57.0643 105.817 56.819 106.524C56.6147 107.106 56.2806 107.634 55.842 108.068C55.4114 108.48 54.8946 108.791 54.329 108.979C53.6953 109.186 53.0317 109.288 52.365 109.279H49.459L49.46 99.4605ZM52.109 107.485C52.4917 107.489 52.8728 107.433 53.238 107.319C53.5704 107.214 53.8727 107.031 54.119 106.785C54.3822 106.509 54.578 106.176 54.691 105.813C54.8372 105.33 54.9047 104.827 54.891 104.323C54.9043 103.826 54.8367 103.33 54.691 102.855C54.579 102.497 54.3828 102.172 54.119 101.906C53.8702 101.67 53.5678 101.498 53.238 101.406C52.8707 101.302 52.4906 101.251 52.109 101.255H51.688V107.488L52.109 107.485Z"
					fill="white" />
				<path
					d="M59.0029 99.4604H65.2029V101.327H61.2299V103.6H64.6159V105.467H61.2299V109.276H59.0029V99.4604Z"
					fill="white" />
			</svg>
			<h3 class="mt-8 text-xl header-title">التشريعات المنظمة لهيئة</h3>
			<a href="" class="mt-12 text-sm flex gap-2 items-center">
				<a href="{{route('show_legislations')}}"><span>التفاصيل </span></a>
				<div class="w-1">
					<svg width="100%" height="100%" viewBox="0 0 6 10" fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path d="M5 9L1 5L5 1" stroke="#1F2933" stroke-width="1.5" stroke-linecap="round"
							stroke-linejoin="round" />
					</svg>
				</div>
			</a>
		</div>
		<div class="grid justify-items-center border-t pt-12 sm:border-t-0 sm:pt-0 lg:border-r ">
			<svg width="140" height="140" viewBox="0 0 174 173" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path opacity="0.3"
					d="M86.466 173C134.22 173 172.932 134.273 172.932 86.5C172.932 38.7274 134.22 0 86.466 0C38.7122 0 0 38.7274 0 86.5C0 134.273 38.7122 173 86.466 173Z"
					fill="#D6DAE3" />
				<path opacity="0.8"
					d="M114.354 48.7256H47.7917C47.2243 48.7257 46.6626 48.8376 46.1385 49.0548C45.6144 49.272 45.1383 49.5904 44.7372 49.9916C44.3362 50.3928 44.0181 50.8691 43.8011 51.3933C43.5841 51.9175 43.4725 52.4793 43.4727 53.0466V142.901H118.673V53.0466C118.673 52.4793 118.561 51.9175 118.344 51.3933C118.127 50.8691 117.809 50.3928 117.408 49.9916C117.007 49.5904 116.531 49.272 116.007 49.0548C115.483 48.8376 114.921 48.7257 114.354 48.7256Z"
					fill="#D6DAE3" />
				<path
					d="M141.75 142.499V53.0466C141.75 52.4793 141.638 51.9175 141.421 51.3933C141.204 50.8691 140.886 50.3928 140.485 49.9916C140.084 49.5904 139.608 49.272 139.084 49.0548C138.56 48.8376 137.998 48.7257 137.431 48.7256H113.009"
					stroke="#303436" stroke-width="3.011" stroke-linecap="round" stroke-linejoin="round" />
				<path
					d="M102.314 38.6885H35.7516C35.1843 38.6886 34.6226 38.8005 34.0985 39.0177C33.5744 39.2349 33.0983 39.5532 32.6972 39.9545C32.2961 40.3557 31.9781 40.832 31.7611 41.3562C31.5441 41.8804 31.4325 42.4422 31.4326 43.0095V142.9H106.633V43.0095C106.633 42.4422 106.521 41.8804 106.304 41.3562C106.087 40.832 105.769 40.3557 105.368 39.9545C104.967 39.5532 104.491 39.2349 103.967 39.0177C103.443 38.8005 102.881 38.6886 102.314 38.6885Z"
					fill="white" />
				<path d="M165.32 142.9H172.495" stroke="#303436" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M155.956 142.9H159.301" stroke="#303436" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M14.1504 142.9H147.93" stroke="#303436" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M2.11035 142.9H6.79335" stroke="#303436" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M112.744 114.254H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M120.771 121.421H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M116.758 107.087H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M112.744 64.3604H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M120.771 71.5273H132.629" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M47.0508 64.3604H91.0158" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M69.125 71.5273H91.016" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path d="M55.0781 57.1934H91.0161" stroke="#C9CCD3" stroke-width="3.01" stroke-linecap="round"
					stroke-linejoin="round" />
				<path
					d="M82.7111 84.6284H22.8471C19.8913 84.6284 17.4951 87.0246 17.4951 89.9804V118.756C17.4951 121.712 19.8913 124.108 22.8471 124.108H82.7111C85.6669 124.108 88.0631 121.712 88.0631 118.756V89.9804C88.0631 87.0246 85.6669 84.6284 82.7111 84.6284Z"
					fill="#B69557" />
				<path
					d="M40.3555 99.4606H43.9415C44.4458 99.4575 44.9489 99.5105 45.4415 99.6186C45.8785 99.7115 46.2925 99.8907 46.6595 100.146C47.0111 100.398 47.2935 100.734 47.4805 101.125C47.6805 101.598 47.7828 102.106 47.7815 102.62C47.7801 103.134 47.675 103.642 47.4725 104.114C47.2771 104.521 46.9891 104.878 46.6315 105.155C46.2673 105.431 45.8534 105.634 45.4125 105.755C44.9321 105.889 44.4353 105.956 43.9365 105.955H42.5825V109.282H40.3555V99.4606ZM43.8015 104.189C45.0055 104.189 45.6071 103.667 45.6065 102.623C45.6276 102.418 45.5966 102.211 45.5164 102.022C45.4361 101.832 45.3092 101.666 45.1475 101.539C44.7401 101.302 44.2715 101.192 43.8015 101.223H42.5825V104.189H43.8015Z"
					fill="white" />
				<path
					d="M49.46 99.4605H52.229C52.9195 99.4517 53.6073 99.5478 54.269 99.7455C54.8468 99.9203 55.3786 100.221 55.826 100.627C56.2724 101.045 56.6128 101.564 56.819 102.141C57.0648 102.841 57.182 103.581 57.165 104.324C57.1814 105.072 57.0643 105.817 56.819 106.524C56.6147 107.106 56.2806 107.634 55.842 108.068C55.4114 108.48 54.8946 108.791 54.329 108.979C53.6953 109.186 53.0317 109.288 52.365 109.279H49.459L49.46 99.4605ZM52.109 107.485C52.4917 107.489 52.8728 107.433 53.238 107.319C53.5704 107.214 53.8727 107.031 54.119 106.785C54.3822 106.509 54.578 106.176 54.691 105.813C54.8372 105.33 54.9047 104.827 54.891 104.323C54.9043 103.826 54.8367 103.33 54.691 102.855C54.579 102.497 54.3828 102.172 54.119 101.906C53.8702 101.67 53.5678 101.498 53.238 101.406C52.8707 101.302 52.4906 101.251 52.109 101.255H51.688V107.488L52.109 107.485Z"
					fill="white" />
				<path
					d="M59.0029 99.4604H65.2029V101.327H61.2299V103.6H64.6159V105.467H61.2299V109.276H59.0029V99.4604Z"
					fill="white" />
			</svg>
			<h3 class="mt-8 text-xl header-title">بحوث ودراسات</h3>
			<a href="" class="mt-12 text-sm flex gap-2 items-center">
				<a href="{{route('show_study')}}"><span>التفاصيل </span></a>
				<div class="w-1">
					<svg width="100%" height="100%" viewBox="0 0 6 10" fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path d="M5 9L1 5L5 1" stroke="#1F2933" stroke-width="1.5" stroke-linecap="round"
							stroke-linejoin="round" />
					</svg>
				</div>
			</a>
		</div>
	</div>
	

        <div class="bg-secondary-100 text-white py-20 ">
            <div class="px-4 lg:px-12 max-w-container mx-auto ">
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="grid gap-y-10 self-baseline">
                        <h3>تقارير مرئية</h3>
                        <p class="flex items-center gap-1">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="white"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.5 20.5H2.5C1.97005 20.4984 1.46227 20.2872 1.08753 19.9125C0.712805 19.5377 0.501583 19.0299 0.5 18.5V4.5C0.501583 3.97005 0.712805 3.46227 1.08753 3.08753C1.46227 2.7128 1.97005 2.50158 2.5 2.5H18.5C19.0299 2.50158 19.5377 2.7128 19.9125 3.08753C20.2872 3.46227 20.4984 3.97005 20.5 4.5V18.5C20.4984 19.0299 20.2872 19.5377 19.9125 19.9125C19.5377 20.2872 19.0299 20.4984 18.5 20.5Z"
                                    stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round" />
                                <path
                                    d="M18.5 20.5H2.5C1.97005 20.4984 1.46227 20.2872 1.08753 19.9125C0.712805 19.5377 0.501583 19.0299 0.5 18.5V8.5H20.5V18.5C20.4984 19.0299 20.2872 19.5377 19.9125 19.9125C19.5377 20.2872 19.0299 20.4984 18.5 20.5Z"
                                    stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round" />
                                <path d="M14.5 0.5V4.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M6.5 0.5V4.5" stroke="#1F2933" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M3.5 12.5H5.5" stroke="#1F2933" stroke-miterlimit="10"
                                    stroke-linejoin="round" />
                                <path d="M7.5 12.5H9.5" stroke="#1F2933" stroke-miterlimit="10"
                                    stroke-linejoin="round" />
                                <path d="M11.5 12.5H13.5" stroke="#1F2933" stroke-miterlimit="10"
                                    stroke-linejoin="round" />
                                <path d="M15.5 12.5H17.5" stroke="#1F2933" stroke-miterlimit="10"
                                    stroke-linejoin="round" />
                                <path d="M3.5 16.5H5.5" stroke="#1F2933" stroke-miterlimit="10"
                                    stroke-linejoin="round" />
                                <path d="M7.5 16.5H9.5" stroke="#1F2933" stroke-miterlimit="10"
                                    stroke-linejoin="round" />
                                <path d="M11.5 16.5H13.5" stroke="#1F2933" stroke-miterlimit="10"
                                    stroke-linejoin="round" />
                                <path d="M15.5 16.5H17.5" stroke="#1F2933" stroke-miterlimit="10"
                                    stroke-linejoin="round" />
                            </svg>
                            <span class="font-medium text-xs text-gray-400">نشر في {{$last_vedio_new['created_at']->format('Y-m-d')}}</span>
                        </p>
                        <p class="text-xl leading-9 md:max-w-[17rem]">
                            {{$last_vedio_new['title']}}
                        </p>
                        <button
                            class="w-fit flex justify-center items-center  gap-3 border border-white py-2 px-4 rounded-md">
                            <svg width="14" height="17" viewBox="0 0 14 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 1.50151C0 0.729715 0.837214 0.248844 1.50387 0.637727L13.5039 7.63773C14.1654 8.02361 14.1654 8.97941 13.5039 9.36528L1.50387 16.3653C0.837214 16.7542 0 16.2733 0 15.5015V1.50151Z"
                                    fill="white" />
                            </svg>
                            <span> شاهد الفيديو</span>
                        </button>
                    </div>
                    <div
                        class="relative bg-gradient-to-b  from-neutral-500 to-neutral-600   md:col-span-2 flex items-end p-6 h-[488px]">
                        <iframe class="w-full h-full absolute top-0 right-0 object-cover object-left mix-blend-overlay" width="560" height="315" 
						src="https://www.youtube.com/embed/{{$last_vedio_new['link']}}" 
						frameborder="0" allowfullscreen></iframe>

						{{-- <img src="assets/images/Rectangle64.png"
                            class="w-full h-full absolute top-0 right-0 object-cover object-left mix-blend-overlay"
                            alt=""> --}}
                        {{-- <button
                            class="flex justify-center items-center  gap-3 border border-white py-2 px-4 rounded-md text-sm w-fit z-20">
                            <span class="border-l-2 pl-4">
                                1.46
                            </span>
                            <svg width="14" height="17" viewBox="0 0 14 17" fill="white"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0 1.50004C0 0.72825 0.837214 0.247379 1.50387 0.636262L13.5039 7.63626C14.1654 8.02214 14.1654 8.97794 13.5039 9.36382L1.50387 16.3638C0.837214 16.7527 0 16.2718 0 15.5V1.50004Z"
                                    fill="white" />
                            </svg>
                        </button> --}}
                    </div>
                </div>

                <hr class="w-full  bg-gray-600 my-12">

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
					@foreach ($other_vedio_news as $other_vedio_new)
                    <div
                        class="relative bg-gradient-to-b  from-neutral-500 to-neutral-700 flex gap-4 p-6 items-end h-[308px]">
                        {{-- <img src="assets/images/Rectangle66.png"
                            class="w-full h-full absolute top-0 right-0 object-cover mix-blend-overlay" alt="">
                        <svg class="z-20 cursor-pointer" width="64" height="51" viewBox="0 0 64 51" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M25 18.5015C25 17.7297 25.8372 17.2488 26.5039 17.6377L38.5039 24.6377C39.1654 25.0236 39.1654 25.9794 38.5039 26.3653L26.5039 33.3653C25.8372 33.7542 25 33.2733 25 32.5015V18.5015Z"
                                fill="white" />
                            <rect x="0.5" y="1" width="63" height="49.003" rx="6.5" stroke="white" />
                        </svg> --}}
						<iframe class="w-full h-full absolute top-0 right-0 object-cover object-left mix-blend-overlay" width="560" height="315" 
						src="https://www.youtube.com/embed/{{$other_vedio_new['link']}}" 
						frameborder="0" allowfullscreen></iframe>


                        <p class="z-20">{{$other_vedio_new['title']}}</p>
                    </div>
					@endforeach
                </div>



            </div>
        </div>

        <div class="bg-gray-100 py-20">
            <div class="px-4 lg:px-12 max-w-container mx-auto">
                <h3 class="text-3xl">مواقع قد تهمك</h3>
                <div class="grid grid-cols-[repeat(auto-fit,minmax(195px,1fr))] gap-4 mt-8">
					@foreach ($extra_sites as $extra_site)
					<a href="{{$extra_site['link']}}" target="_blank" class="bg-white p-6 grayscale hover:grayscale-0 transition-all duration-300"><img class="w-full h-full " src="{{asset('storage/public/uploads/website')}}/{{$extra_site['path']}}" alt=""></a>
					@endforeach
                    {{-- <a href="" class="bg-white p-6 "><img class="w-full h-full  " src="assets/images/image 4.png" alt=""></a>
                    <a href="" class="bg-white p-6 grayscale hover:grayscale-0 transition-all duration-300"><img class="w-full h-full " src="assets/images/image 5.png" alt=""></a>
                    <a href="" class="bg-white p-6 grayscale hover:grayscale-0 transition-all duration-300"><img class="w-full h-full " src="assets/images/image 6.png" alt=""></a>
                    <a href="" class="md:col-start-2 xl:col-start-5 bg-white p-6 grayscale hover:grayscale-0 transition-all duration-300 "><img class="w-full h-full "
                            src="assets/images/image 7.png" alt=""></a>
                    <a href="" class="md:col-start-3 xl:col-start-6 bg-white p-6 grayscale hover:grayscale-0 transition-all duration-300 "><img class="w-full h-full "
                            src="assets/images/image 8.png" alt=""></a> --}}
                </div>

                <div class="flex items-center gap-6 mt-12">
                    <svg width="22" height="11" viewBox="0 0 22 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 0L16.21 0.72L20.1 5H0V6H20.1L16.21 10.28L16.72 11L22 5.5L17 0Z" fill="black" />
                    </svg>

                    <svg width="22" height="11" viewBox="0 0 22 11" fill="rgb(107 114 128)"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 0L5.79 0.72L1.9 5H22V6H1.9L5.79 10.28L5.28 11L0 5.5L5 0Z" fill="black" />
                    </svg>

                    <hr class="w-full h-[2px] bg-gray-500">
                </div>

            </div>
        </div>

        <div class="px-4 lg:px-12  max-w-container mx-auto mb-32 mt-48">
            <div
                class="bg-primary-100 bg-[url('assets/images/question.png')] bg-no-repeat bg-center   text-white grid lg:grid-cols-2 justify-items-center lg:justify-start items-center min-h-[30rem] py-4">
                <iframe class=" w-11/12 xl:mr-16 relative -top-12 6 lg:-top-20 shadow-2xl"
                    src="{{$settings['google_map_link']}}"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <section class="flex flex-col gap-8 pl-6">
                    <p class="lg:border-r-4 border-white pr-8 text-3xl">فروع الهيئة الرقابة الإدارية</p>
                    <p class="font-medium mr-8">تهدف الهيئة إلى تحقيق رقابة إدارية فعالة على الجهاز التنفيذي في الدولة
                    </p>
                    <button
                        class="flex items-center bg-white rounded-md py-2 px-4 text-black gap-2 font-medium w-fit mr-8">
                        <a href="{{route('show_branches')}}"><span class="font-medium">فروع الهيئة</span></a>
                        <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 9L1 5L5 1" stroke="black" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </section>

            </div>
        </div>
</main>
@endsection