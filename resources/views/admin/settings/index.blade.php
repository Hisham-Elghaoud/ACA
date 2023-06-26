@extends('layouts.admin')
@section('content')
    <style type="text/css">
        .settings-tab-opener {
            box-shadow: 0px 6px 12px #ebebeb;
            border-radius: 11px;
            cursor: pointer;
            width: 80px;
            height: 45px;
        }

        .settings-tab-opener.active {
            box-shadow: 0px 6px 12px #c8e0ff !important;
            color: #fff;
            background: #2196f3;
        }

        .taber:not(.active) {
            display: none;
        }

    </style>
    <div class="col-12 py-0 px-3 row">

        <div class="col-12  p-0" style="background: #fff;min-height: 80vh">

            <div class="col-12 px-3 py-4">
                <h4 class="font-4">إعدادات الموقع</h4>
            </div>

            <div class="col-12 row">
                <div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener active"
                    data-opentab="general-tab">
                    <span class="fal fa-wrench me-2"></span> عام
                </div>
                <div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener"
                    data-opentab="appearance-tab">
                    <span class="fal fa-paint-roller me-2"></span> مظهر
                </div>
                <div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener"
                    data-opentab="links-tab">
                    <span class="fal fa-link me-2"></span> روابط
                </div>
                <div class="d-flex justify-content-center align-items-center p-0 m-2 settings-tab-opener"
                    data-opentab="pages-tab">
                    <span class="fal fa-pager me-2"></span> صفحات
                </div>
            </div>

            <form class="col-12 row " id="validate-form" method="POST" action="{{ route('admin.settings.update') }}"
                enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="col-12 col-lg-8 px-3 py-5">

                    <div class="col-12 row p-0 taber active" id="general-tab">
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                اسم الموقع
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <input type="" name="website_name" class="form-control"
                                    value="{{ $settings->website_name }}" maxlength="190">
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                العنوان
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <textarea name="address" class="form-control">{{ $settings->address }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                الرؤية
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <textarea name="vision" class="form-control">{{ $settings->vision }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                باقي الرؤية
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <textarea name="remain_vision" class="form-control">{{ $settings->remain_vision }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                الرسالة
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <textarea name="message" class="form-control">{{ $settings->message }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                باقي الرسالة
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <textarea name="remain_message" class="form-control">{{ $settings->remain_message }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                القيم
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <textarea name="values" class="form-control">{{ $settings->values }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                باقي القيم
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <textarea name="remain_values" class="form-control">{{ $settings->remain_values }}</textarea>
                            </div>
                        </div>

                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                بريد التواصل
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <input type="email" name="contact_email" class="form-control"
                                    value="{{ $settings->contact_email }}">
                            </div>
                        </div>


                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                لوجو الموقع
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <input type="file" name="website_logo" class="form-control">
                                <div class="col-12 p-2">
                                    <img src="{{asset('storage/public')}}/{{ $settings->website_logo() }}" style="width:100px;max-height: 100px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                اللوجو عريض
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <input type="file" name="website_wide_logo" class="form-control">
                                <div class="col-12 p-2">
                                    <img src="{{asset('storage/public')}}/{{ $settings->website_wide_logo() }}" style="width:100px;max-height: 100px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                الصورة المصغرة
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <input type="file" name="website_icon" class="form-control">
                                <div class="col-12 p-2">
                                    <img src="{{asset('storage/public')}}/{{ $settings->website_icon() }}" style="width:100px;max-height: 100px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 row p-0 taber" id="appearance-tab">
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                غلاف الموقع
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <input type="file" name="website_cover" class="form-control">
                                <div class="col-12 p-2">
                                    <img src="{{asset('storage/public')}}/{{ $settings->website_cover() }}" style="width:100px;max-height: 100px;">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 row p-0 taber" id="links-tab">
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                رقم الهاتف
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <input type="" name="phone" class="form-control" value="{{ $settings->phone }}"
                                    maxlength="190">
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                رابط فيس بوك
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <input type="url" name="facebook_link" class="form-control"
                                    value="{{ $settings->facebook_link }}">
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                رابط تويتر
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <input type="url" name="twitter_link" class="form-control"
                                    value="{{ $settings->twitter_link }}">
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                رابط انستجرام
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <input type="url" name="instagram_link" class="form-control"
                                    value="{{ $settings->instagram_link }}">
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                رابط يوتيوب
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <input type="url" name="youtube_link" class="form-control"
                                    value="{{ $settings->youtube_link }}">
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                رابط لينكد ان
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <input type="url" name="linkedin_link" class="form-control"
                                    value="{{ $settings->linkedin_link }}">
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                رابط خرائط قوقل
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <input type="url" name="google_map_link" class="form-control"
                                    value="{{ $settings->google_map_link }}">
                            </div>
                        </div>

                    </div>
                    <div class="col-12 row p-0 taber" id="pages-tab">
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                سياسة الخصوصية
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <textarea name="privacy_page"
                                    class="form-control editor with-file-explorer">{{ $settings->privacy_page }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                شروط الإستخدام
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <textarea name="terms_page"
                                    class="form-control editor with-file-explorer">{{ $settings->terms_page }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                من نحن
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <textarea name="about_page"
                                    class="form-control editor with-file-explorer">{{ $settings->about_page }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">
                                تواصل معنا
                            </div>
                            <div class="col-12 col-lg-9 px-2">
                                <textarea name="contact_page"
                                    class="form-control editor with-file-explorer">{{ $settings->contact_page }}</textarea>
                            </div>
                        </div>
                        <div class="col-12 px-0 d-flex mb-3 row pb-3">
                            <br>
                            <hr>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-lg-8 px-0 d-flex mb-3 row pb-3">

                    <div class="col-12 px-0 d-flex mb-3 row pb-3">
                        <div class="col-12 col-lg-3 px-2 text-lg-end pt-1 pb-3 pb-lg-0">

                        </div>
                        <div class="col-12 col-lg-9 px-2">
                            <button class="btn pb-2 px-4" style="background: #ffa725;border-radius: 0px;color: #fff ">حفظ
                                التغييرات</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('.settings-tab-opener').on('click', function() {
            $('.settings-tab-opener').removeClass('active');
            $(this).addClass('active');
            var open_id = $(this).attr('data-opentab');
            $('.taber').removeClass('active');
            $('.taber#' + open_id).addClass('active');
        });
    </script>
@endsection
