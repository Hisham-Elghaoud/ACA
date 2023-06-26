@extends('layouts.app')
@section('content')
<div
        class="relative bg-gradient-to-b  from-neutral-500 to-neutral-700 flex flex-col items-center gap-44 p-6 pt-10  h-[40rem] text-white">
        <img src="{{asset('storage/public/uploads/website/branch.png')}}"
            class="w-full h-full absolute top-0 right-0 object-cover object-center mix-blend-overlay" alt="">


        <h1 class="text-3xl leading-[3rem] md:text-4xl md:leading-[3.5rem] z-20 text-center mt-40 max-w-2xl">تهدف الهيئة
            إلى تحقيق رقابة إدارية فعالة على الجهاز التنفيذي في الدولة</h1>
    </div>

    <div class="px-4 lg:px-12 max-w-container mx-auto">
        <div
            class="bg-white -mt-56 relative py-12 lg:py-24 px-4 lg:px-12 shadow-2xl">
            <div
                class="md:flex gap-8 items-center justify-between xl:justify-start xl:gap-40 px-4 md:px-0 md:pl-8 xl:pl-16 ">
                <p class="text-2xl xl:text-4xl xl:leading-[3rem]  border-r-8 border-primary-100 pr-20 py-4 max-w-xs">
                    نبذة عن هيئة الرقابة الادارية
                </p>
                <p class="font-medium max-w-2xl xl:max-w-3xl xl:text-xl xl:leading-9 leading-8 mt-6 md:mt-0">وريم إيبسوم
                    هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس
                    المحتوى) ويُستخدم
                    في
                    صناعات المطابع ودور النشر.</p>
            </div>

            <iframe class="w-full shadow-2xl mt-20 rounded-md h-[30rem] lg:h-[40rem]"
                src="{{$settings->google_map_link}}"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </div>

    <div class="mt-8 px-4 lg:px-12 max-w-container mx-auto ">
        <div class="shadow-[0_2px_6px_1px_#e7e7e7] rounded-br-md rounded-bl-md pb-8">
            <table class="w-full table-fixed break-words ">
                <thead class="lg:text-right text-xl bg-primary-100 text-white">
                    <th class="py-5 border-b border-gray-300  text-right pr-4 w-32"> #
                    </th>
                    <th class="py-5 border-b border-gray-300  hidden md:table-cell xl:w-60">البيان</th>
                    <th class="py-5 border-b border-gray-300  hidden xl:table-cell">العنوان</th>
                    <th class="py-5 border-b border-gray-300  hidden lg:table-cell">هاتف</th>
                    <th class="py-5 border-b border-gray-300  hidden xl:table-cell">البريد الإلكتروني</th>
                    <th class="py-5 border-b border-gray-300 ">فاكس</th>
                </thead>

                <tbody class="text-sm">
                    @foreach ($branches as $key => $branch)
                    <tr class="border-b border-gray-200  hover:bg-gray-50 ">
                        <td class="py-7 pr-4 ">{{$key + 1}}</td>
                        <td class="hidden md:table-cell text-center lg:text-right">{{$branch->name}}</td>
                        <td class="hidden xl:table-cell">{{$branch->address}}</td>
                        <td class="hidden lg:table-cell"> {{$branch->phone}}</td>
                        <td class="hidden xl:table-cell">{{$branch->email}}</td>
                        <td class="text-center lg:text-right">{{$branch->fax}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$branches->links()}}

            {{-- <div class="mt-16 flex justify-center items-center gap-6">
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
@endsection