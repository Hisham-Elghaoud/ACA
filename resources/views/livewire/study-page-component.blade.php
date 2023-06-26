<div>
    <div  style="background-image: url('{{asset('storage/public/uploads/website/Group.png')}}');"
     class="bg-[url({{asset('storage/public/uploads/website/Group.png')}})] bg-gray-50 h-56 flex items-center border-t border-gray-200">
        <div class="w-full px-4 lg:px-12 max-w-container mx-auto">
            <h2 class="text-4xl">بحوث و دراسات</h2>
            <p class="flex gap-2 mt-8">
                <a href="{{route('home')}}"><span>الرئيسية</span></a>
                <span>-</span>
                <span class="font-medium">بحوث و دراسات</span>
            </p>
        </div>
    </div>

    <div
        class="mt-16 lg:mt-32 px-4 lg:px-12 max-w-container mx-auto grid md:grid-cols-2 xl:grid-cols-[35%_1fr_1fr_15%] gap-4">
        <div class="relative">
            <svg class="absolute right-4 top-1/2 -translate-y-1/2" width="24" height="24" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                    stroke="#1F1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M21.0004 21.0004L16.6504 16.6504" stroke="#1F1F1F" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <input
                class="h-full w-full outline-none border-2 border-gray-300 py-4 pr-14 pl-4 rounded-lg placeholder:text-sm"
                type="text" placeholder="البحث بالإسم  " wire:model.prevent="search_filter">
        </div>

        <select class="form-control" wire:model="search_year_filter">
            <option value="">السنة</option>
            @foreach ($years as $year)
            <option value="{{$year}}"><p class="font-medium lg:pr-10">{{$year}}</p></option>
            @endforeach
          </select>
        {{-- <div class="flex items-center px-4 py-4 gap-2  border-2 border-gray-300 rounded-lg cursor-pointer relative"
            id="decisionYear">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19 4H5C3.89543 4 3 4.89543 3 6V20C3 21.1046 3.89543 22 5 22H19C20.1046 22 21 21.1046 21 20V6C21 4.89543 20.1046 4 19 4Z"
                    stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16 2V6" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8 2V6" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M3 10H21" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <span>السنة </span>
            <svg class="mr-auto" width="13" height="26" viewBox="0 0 13 26" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M0.983087 10.9921C0.655934 11.0356 0.331568 10.8969 0.147338 10.6345C-0.0368757 10.3725 -0.0493393 10.0326 0.115525 9.75891C1.57374 7.34104 4.40377 2.64827 5.75138 0.413616C5.90572 0.157832 6.19117 0 6.49986 0C6.80855 0 7.09399 0.157832 7.24834 0.413616C8.59584 2.64837 11.4259 7.34093 12.8842 9.75891C13.0493 10.0326 13.037 10.3725 12.8528 10.6347C12.6682 10.8967 12.344 11.0356 12.0169 10.9919C10.1881 10.7462 8.34534 10.6232 6.50265 10.6232H6.49706C4.65432 10.6232 2.81152 10.7462 0.982811 10.9919L0.983087 10.9921Z"
                    fill="black" />
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M12.0169 15.0079C12.3441 14.9644 12.6684 15.1031 12.8527 15.3655C13.0369 15.6275 13.0493 15.9674 12.8845 16.2411C11.4263 18.659 8.59623 23.3517 7.24862 25.5864C7.09428 25.8422 6.80883 26 6.50014 26C6.19145 26 5.90601 25.8422 5.75166 25.5864C4.40416 23.3516 1.57413 18.6591 0.115804 16.2411C-0.0492773 15.9674 -0.0370226 15.6275 0.147186 15.3653C0.331829 15.1033 0.655972 14.9644 0.983101 15.0081C2.81187 15.2538 4.65466 15.3768 6.49735 15.3768H6.50294C8.34568 15.3768 10.1885 15.2538 12.0172 15.0081L12.0169 15.0079Z"
                    fill="black" />
            </svg>
            <ul class="bg-white w-full absolute right-0 top-full rounded-md p-3 shadow-[0_3px_8px_0px_#919191] z-30 transition-all duration-200 opacity-0 pointer-events-none -translate-y-3 "
                id="dropDownYear">
                <li class="hover:bg-[#F5F5F5] p-2 rounded-md cursor-pointer">أدمن</li>
                <li class="hover:bg-[#F5F5F5] p-2 rounded-md cursor-pointer">مدير فرع</li>
                <li class="hover:bg-[#F5F5F5] p-2 rounded-md cursor-pointer">موظف</li>
            </ul>
        </div> --}}

        {{-- <div class="flex items-center justify-center px-6 py-4 gap-2  border-2 border-gray-300 rounded-[48px]">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 6H5H21" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6"
                    stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>مسح</span>
        </div> --}}

    </div>

    <div class="mt-16 lg:mt-32 px-4 lg:px-12 max-w-container mx-auto ">
        <div class="shadow-[0_2px_6px_1px_#e7e7e7] rounded-br-md rounded-bl-md pb-8">
            <table class="w-full table-fixed break-words ">
                <thead class="lg:text-right text-xl bg-primary-100 text-white">
                    <th class="py-5 border-b border-gray-300  pr-4 lg:pr-16 xl:w-[35rem]">الإسم</th>
                    <th class="py-5 border-b border-gray-300  hidden xl:table-cell text-center">السنة</th>
                    <th class="py-5 border-b border-gray-300  hidden lg:table-cell text-center">الرقم</th>
                    <th class="py-5 border-b border-gray-300  text-center">الملف </th>
                </thead>

                <tbody class="text-sm">
                    @foreach ($studies as $study)
                    <tr class="border-b border-gray-200  hover:bg-gray-50 ">
                        <td class="text-center lg:text-right pr-4 lg:pr-16 py-7">
                           {{$study->name}}
                        </td>
                        <td class="hidden xl:table-cell text-center">{{$study->year}}</td>
                        <td class="hidden lg:table-cell text-center"> {{$study->study_num}}</td>
                        <td>
                            <a href="storage/{{$study->path}}" target="_blank">
                                <svg class="w-12 mx-auto cursor-pointer" width="55" height="55" viewBox="0 0 55 55"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.8764 29.7444C16.6715 30.3472 16.6715 30.3472 16.2617 31.3523L16.1935 31.4865C15.715 32.7594 14.8953 34.3001 14.3487 35.3052C13.529 35.707 12.7088 36.1089 11.5474 36.779C9.08779 38.186 7.37974 39.1906 6.76497 40.7987C6.42326 41.6697 5.60356 43.8131 7.37976 45.2202C7.99454 45.7562 8.81476 46.0239 9.5663 46.0239C10.386 46.0239 11.1376 45.7562 11.7528 45.2202C12.5726 44.4833 12.9142 43.8131 13.5977 42.5408C13.8026 42.2057 14.0075 41.8039 14.2811 41.2678C15.3743 39.1912 16.0573 37.7842 16.1941 37.5832C16.1941 37.5164 16.2622 37.4491 16.3309 37.3823C16.8093 37.1813 17.3555 36.9804 17.9707 36.7122C20.2253 35.7743 21.1818 35.5066 23.2316 34.8364L24.1881 34.5014C24.9396 34.2336 25.4863 34.0995 26.0329 33.8986C26.7163 33.6308 27.2624 33.4967 27.8091 33.2958C28.2876 33.6976 28.7656 34.1668 29.3804 34.6355C30.6786 35.7074 31.567 36.2434 32.5235 36.5112C33.3432 36.7121 34.5046 36.6453 35.2561 36.4444C37.6476 35.8416 37.7157 34.0995 37.7839 33.3626C37.852 32.3579 37.2372 30.6158 34.5728 30.1471C33.3432 29.9462 32.523 29.9462 31.7714 29.9462C31.0199 29.9462 30.4051 30.013 29.4486 30.1471C29.1755 30.2139 28.8338 30.2812 28.6289 30.2812C27.9455 29.6111 27.4675 28.9415 26.7159 27.9363C25.2809 25.9265 24.3931 24.5199 22.9581 22.041C22.7531 21.7059 22.5482 21.3041 22.3433 20.969C22.4801 20.3662 22.6164 19.6961 22.7531 18.8924L22.9581 17.9546C23.5047 15.4088 23.6415 14.5382 23.2311 12.4611C22.7527 10.1835 21.1814 9.64748 20.3616 9.71435C19.9518 9.71435 18.3119 9.98211 17.629 12.327C17.1505 13.9349 17.2191 15.1406 17.629 16.8154C17.9021 18.021 18.5173 19.4948 19.542 21.3038C19.2003 22.7108 18.7904 23.9832 18.0389 26.1271C17.3546 28.3378 17.0129 29.2085 16.8766 29.7444L16.8764 29.7444ZM11.8886 39.9272C11.6155 40.3963 11.4101 40.865 11.2052 41.2001C10.5218 42.4731 10.3855 42.7408 9.97562 43.1426C9.70254 43.3436 9.36083 43.2094 9.1559 43.0758C9.08775 43.009 8.88282 42.8749 9.36083 41.6687C9.63391 40.9986 10.9321 40.1949 12.0935 39.458C12.0939 39.6594 11.9572 39.7931 11.8885 39.9272L11.8886 39.9272ZM31.9069 32.5579C32.5903 32.5579 33.2732 32.5579 34.2297 32.7589C34.9131 32.893 35.118 33.1607 35.118 33.228V33.6972C35.118 33.6972 35.0499 33.764 34.7082 33.8313C34.2297 33.9654 33.5467 33.9654 33.3418 33.8981C33.0001 33.764 32.4535 33.5631 31.2921 32.6252C31.497 32.5579 31.7019 32.5579 31.9069 32.5579L31.9069 32.5579ZM20.3604 12.9966C20.4285 12.7957 20.4971 12.5947 20.5653 12.5274C20.6334 12.5942 20.6334 12.7284 20.7021 12.9293C20.9751 14.4031 20.9751 14.8718 20.5653 16.8148C20.4971 16.6138 20.4285 16.4129 20.4285 16.2788C20.0873 14.8055 20.0187 14.0684 20.3604 12.9965V12.9966ZM18.7891 32.424L18.8572 32.2898C19.2671 31.2179 19.2671 31.2179 19.5406 30.5482C19.6774 30.079 20.0191 29.1411 20.7702 26.9977C21.1119 26.1266 21.3168 25.3229 21.5218 24.6528C22.5464 26.3944 23.3666 27.7346 24.5961 29.4093C25.0746 30.0122 25.4158 30.5481 25.8257 31.0173C25.6207 31.0841 25.4158 31.1514 25.2109 31.2182C24.7324 31.4191 24.1862 31.5532 23.4346 31.821L22.4782 32.1556C20.7701 32.6916 19.8136 33.0266 18.2423 33.6294C18.4473 33.2275 18.584 32.8256 18.789 32.4238L18.7891 32.424ZM42.3601 32.2898V38.7212L33.5468 38.7207C30.9505 38.7207 28.7644 40.8647 28.7644 43.41L28.764 52.253H8.13077C5.12449 52.253 2.73359 49.8413 2.73359 46.8269L2.73312 8.10614C2.73312 5.15842 5.1927 2.67999 8.13029 2.67999H36.9621C39.5584 2.67999 41.7445 4.55574 42.2912 7.03416C42.7697 6.96734 43.3158 6.96734 43.7943 6.96734C44.2041 6.96734 44.614 6.96734 45.0238 7.03416C44.4777 3.08182 41.0615 0 36.8939 0H8.13041C3.62105 0 0 3.61727 0 8.10614V46.8939C0 51.3823 3.62105 55 8.13041 55H30.13H30.4031C30.4713 55 30.4713 55 30.5399 54.9332C30.608 54.9332 30.608 54.9332 30.6767 54.8664C30.7448 54.8664 30.7448 54.7995 30.8134 54.7995C30.8134 54.7995 30.8816 54.7995 30.8816 54.7327C30.9497 54.6659 31.0184 54.5986 31.0865 54.5318L44.6142 41.0666C44.6142 41.0666 44.6142 40.9998 44.6824 40.9998L44.8192 40.8657C44.8192 40.7988 44.8873 40.7988 44.8873 40.7316C44.8873 40.6647 44.9555 40.6647 44.9555 40.5974C44.9555 40.5306 44.9555 40.5306 45.0236 40.4633V40.3292V40.0615L45.0241 32.2899C44.6142 32.3567 44.1358 32.3567 43.7259 32.3567C43.2478 32.3567 42.7694 32.3567 42.3595 32.2899L42.3601 32.2898ZM31.4971 50.3104V43.4772C31.4971 42.3384 32.3854 41.4673 33.5468 41.4673H40.4472L31.4971 50.3104ZM43.7267 8.57506C37.5093 8.57506 32.4538 13.5325 32.4538 19.6283C32.4538 25.7246 37.5097 30.6816 43.7267 30.6816C49.9441 30.682 55 25.725 55 19.6287C55 13.5324 49.9441 8.57494 43.7267 8.57494V8.57506ZM43.7267 28.6723C38.6707 28.6723 34.503 24.5859 34.503 19.6283C34.503 14.6709 38.6706 10.5843 43.7267 10.5843C48.7826 10.5848 52.9503 14.6712 52.9503 19.6287C52.9503 24.5861 48.8508 28.6722 43.7267 28.6722V28.6723ZM48.3728 16.0111V16.0779V20.8345C48.3728 21.3705 47.8943 21.8391 47.3482 21.8391C46.8015 21.8391 46.3235 21.37 46.3235 20.8345V18.4895L40.8577 23.8489C40.6527 24.0499 40.3792 24.1167 40.1061 24.1167C39.833 24.1167 39.5595 24.0499 39.3545 23.8489C38.9447 23.4471 38.9447 22.8443 39.3545 22.4419L44.8204 17.0825H42.4976C41.9509 17.0825 41.4729 16.6133 41.4729 16.0778C41.4729 15.5418 41.9514 15.0732 42.4976 15.0732H47.3487C47.6217 15.0732 47.8272 15.14 48.0321 15.3409C48.0993 15.4082 48.1679 15.4082 48.1679 15.4755C48.3042 15.6764 48.3728 15.8101 48.3728 16.011L48.3728 16.0111Z"
                                        fill="#B69557" />
                                </svg>
                            </a>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{$studies->links()}}
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
</div>
