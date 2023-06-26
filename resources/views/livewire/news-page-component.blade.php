<div>
    <div class="bg-[url({{asset('storage/public/uploads/website/Group.png')}})] bg-gray-50 h-56 flex items-center border-t border-gray-200 ">
        <div class="w-full px-4 lg:px-12 max-w-container mx-auto">
            <h2 class="text-4xl">الأخبار</h2>
            <p class="flex gap-2 mt-8">
                <a href="{{route('home')}}"><span>الرئيسية</span></a>
                <span>-</span>
                <span class="font-medium">الأخبار</span>
            </p>
        </div>
    </div>
    <div class=" xl:flex gap-12 px-4 lg:px-12 max-w-container mx-auto mt-36">
        <div class="  justify-between gap-8 xl:w-1/4">
            <div class="shadow-[0_0_6px_2px_#e9e9e9]  rounded-xl p-10 self-baseline">
                <div class="relative">
                    <svg class="absolute right-4 top-1/2 -translate-y-1/2" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                            stroke="#1F1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M21.0004 21.0004L16.6504 16.6504" stroke="#1F1F1F" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <input class="h-full w-full outline-none bg-gray-100 py-4 px-8 pr-14 xs:px-14 rounded-xl placeholder:text-sm"
                        type="text" placeholder="البحث في الأخبار" wire:model.prevent="search_filter">
                </div>

            </div>
            <div class="grid sm:grid-cols-2 gap-8 xl:block mt-12 " wire:ignore>
                <div
                    class="shadow-[0_0_15px_2px_#e9e9e9] rounded-xl p-4 md:p-10 flex flex-col gap-4  text-center lg:text-right">
                    <p class="text-lg md:text-xl border-r-4  border-primary-100 lg:pr-6  md:py-1">التصنيفات</p>
                    <select multiple class="form-control" wire:model="search_category_filter">
                        <option value="">الكل</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}"><p class="font-medium lg:pr-10">{{$category->name}}</p></option>
                        @endforeach
                      </select>
                </div>
                <div
                    class="shadow-[0_0_15px_2px_#e9e9e9] rounded-xl p-4 md:p-10 flex flex-col gap-4 xl:mt-12 text-center lg:text-right">
                    <p class="text-lg md:text-xl border-r-4  border-primary-100 lg:pr-6  md:py-1">الارشيف</p>
                    <select multiple class="form-control" wire:model="search_year_filter">
                        <option value="">الكل</option>
                        @foreach ($years as $year)
                        <option value="{{$year->year}}"><p class="font-medium lg:pr-10">{{$year->year}}</p></option>
                        @endforeach
                      </select>
                </div>

            </div>

        </div>
        <div class="grid md:grid-cols-2 gap-8 xl:w-3/4 mt-16 xl:mt-0">
            @foreach ($news as $new)
            <div class="  shadow-xl rounded-xl">
                <img class="w-full rounded-t-xl h-60 object-cover" src="{{asset('storage/public/uploads/website')}}/{{$new['path']}}" alt="">
                <div class="flex flex-col justify-between gap-8 p-12 ">
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

                        <span class="font-medium text-sm">نشر في {{$new['created_at']->format('Y-m-d')}}</span>
                    </p>
                    <p class="heading-title">
                        {{$new['title']}}
                    </p>
                    <p class="font-medium leading-8 content-title">
                        {{$new['content']}}
                    </p>
                    <a href="{{route('news_details', [$new['id']])}}" class="flex gap-2">
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
            @endforeach
            <div dir="ltr">
            {{$news->links()}}
        </div>
            {{-- <div class="mt-16 flex justify-center items-center gap-6 md:col-span-2">
                <button class="bg-gray-300 py-2 px-3 rounded">
                    <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 16.4961L8.5 8.99609L1 1.49609" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </button>
                <button class="py-1 px-3 border border-black rounded">1</button>
                <button class="py-1 px-3 border border-gray-300 rounded text-gray-300">2</button>
                <button class="py-1 px-3 border border-gray-300 rounded text-gray-300">3</button>
                <button class="bg-black py-2 px-3 rounded">
                    <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.99902 16.4922L1.49902 8.99219L8.99902 1.49219" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </button>
            </div> --}}

        </div>
    </div>
</div>
