@extends('layouts.survey')

@section('title', 'Khảo sát chuyến xe "Hành trình mùa xuân năm 2027"')

@section('content')
<header class="mb-6 text-center">
    <!--<p class="text-sm font-semibold uppercase tracking-wide text-red-700">Chương trình Hành trình mùa Xuân</p>-->
    <h1 class="mt-2 text-2xl font-bold text-red-800 sm:text-3xl" style="line-height: 1.4;">Khảo sát nhu cầu đăng ký <br/> Chuyến xe "HÀNH TRÌNH MÙA XUÂN"</h1>
</header>
<ul class="text-justify">Chương trình Hành trình mùa xuân năm 2026 với ý nghĩa nhằm kịp thời quan tâm, chăm lo, hỗ trợ cho sinh viên có hoàn cảnh khó khăn trong dịp Tết Nguyên đán Bính Ngọ năm 2026. Ban Cán sự Đoàn ĐHQG-HCM và Trung tâm Quản lý Ký túc xá và Khu đô thị ĐHQG-HCM khảo sát sinh viên có nhu cầu, cụ thể như sau:
    <li><span class="font-bold">- Thời gian khảo sát:</span> 22/11 – 30/11/2025.</li>
    <li><span class="font-bold">- Đối tượng:</span> Sinh viên nội trú Ký túc xá ĐHQG-HCM và sinh viên đang học tập tại các cơ sở đào tạo thuộc ĐHQG-HCM.</li>
</ul>

    @if ($errors->any())
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <p class="font-semibold">Vui lòng kiểm tra lại các thông tin bắt buộc.</p>
            <ul class="mt-2 list-disc space-y-1 pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('survey.store') }}" method="POST" class="space-y-6 rounded-2xl bg-white p-5 py-4 shadow-lg shadow-red-100 ring-1 ring-red-100 sm:p-8">
        @csrf

        <h2 class="mt-3 text-base text-center font-bold text-red-800 sm:text-2xl">
            THÔNG TIN KHẢO SÁT
        </h2>
        <div>
            <label for="full_name" class="mb-2 block text-sm font-semibold text-slate-800">
                Họ và tên <span class="text-red-600">*</span>
            </label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="{{ old('full_name') }}"
                required
                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-base outline-none ring-red-500 focus:border-red-500 focus:ring-2"
                placeholder="Nguyễn Văn A"
            >
            @error('full_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="mb-2 block text-sm font-semibold text-slate-800">
                Email <span class="text-red-600">*</span>
            </label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
                maxlength="255"
                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-base outline-none ring-red-500 focus:border-red-500 focus:ring-2"
                placeholder="email@example.com"
            >
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="unit_id" class="mb-2 block text-sm font-semibold text-slate-800">
                Đơn vị đào tạo <span class="text-red-600">*</span>
            </label>
            <select
                id="unit_id"
                name="unit_id"
                class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500"
            >
                <option value="">Chọn đơn vị đào tạo</option>
                @foreach ($units as $unit)
                    <option value="{{ $unit->id }}" @selected((string) old('unit_id') === (string) $unit->id)>
                        {{ $unit->name }}
                    </option>
                @endforeach
            </select>
            <!--<div id="university_other_wrap" class="mt-3 {{ old('unit_id') ? 'hidden' : '' }}">
                <label for="university_other" class="mb-2 block text-sm font-medium text-slate-700">
                    Nếu không có trong danh sách, vui lòng ghi rõ đơn vị đào tạo
                </label>
                <input
                    type="text"
                    id="university_other"
                    name="university_other"
                    value="{{ old('university_other') }}"
                    @required(!old('unit_id'))
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500"
                    placeholder="Nhập tên đơn vị đào tạo"
                >
            </div>-->
            @error('unit_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            @error('university_other')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <fieldset>
            <legend class="mb-3 text-sm font-semibold text-slate-800">
                Sinh viên năm thứ mấy <span class="text-red-600">*</span>
            </legend>
            <div class="grid grid-cols-2 gap-2 sm:grid-cols-3">
                @foreach ($studentYears as $value => $label)
                    <label class="flex cursor-pointer items-center gap-2 rounded-xl border border-slate-200 px-3 py-2.5 has-[:checked]:border-red-400 has-[:checked]:bg-red-50">
                        <input
                            type="radio"
                            name="student_year"
                            value="{{ $value }}"
                            class="h-4 w-4 accent-red-600"
                            {{ old('student_year') === $value ? 'checked' : '' }}
                            required
                        >
                        <span class="text-sm sm:text-base">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
            @error('student_year')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </fieldset>

        <div>
            <label for="current_residence" class="mb-2 block text-sm font-semibold text-slate-800">
                Chỗ ở hiện tại <span class="text-red-600">*</span>
            </label>
            <input
                type="text"
                id="current_residence"
                name="current_residence"
                value="{{ old('current_residence') }}"
                required
                class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500"
                placeholder="Ví dụ: KTX Khu A, phòng trọ..."
            >
            @error('current_residence')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <fieldset>
            <legend class="mb-3 text-sm font-semibold text-slate-800">
                Hoàn cảnh gia đình <span class="text-red-600">*</span>
            </legend>
            <div class="space-y-2">
                @foreach ($familySituations as $value => $label)
                    <label class="flex cursor-pointer items-start gap-3 rounded-xl border border-slate-200 px-3 py-2.5 has-[:checked]:border-red-400 has-[:checked]:bg-red-50">
                        <input
                            type="radio"
                            name="family_situation"
                            value="{{ $value }}"
                            class="mt-1 h-4 w-4 accent-red-600"
                            {{ old('family_situation') === $value ? 'checked' : '' }}
                            required
                            data-toggle-other="family_situation_other_wrap"
                        >
                        <span class="text-sm sm:text-base">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
            <div id="family_situation_other_wrap" class="mt-3 {{ old('family_situation') === $otherValue ? '' : 'hidden' }}">
                <label for="family_situation_other" class="mb-2 block text-sm font-medium text-slate-700">Ghi rõ hoàn cảnh gia đình</label>
                <input
                    type="text"
                    id="family_situation_other"
                    name="family_situation_other"
                    value="{{ old('family_situation_other') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500"
                    placeholder="Nhập hoàn cảnh cụ thể"
                >
            </div>
            @error('family_situation')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            @error('family_situation_other')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </fieldset>

        <div>
            <label for="destination_province" class="mb-2 block text-sm font-semibold text-slate-800">
                Nhu cầu về Tỉnh/Thành nào? <span class="text-red-600">*</span>
            </label>
            <select
                id="destination_province"
                name="destination_province"
                required
                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500"
            >
                <option value="">-- Chọn tỉnh thành --</option>
                @foreach ($provinces as $value => $label)
                    <option value="{{ $value }}" {{ old('destination_province') === $value ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            @error('destination_province')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <fieldset>
            <legend class="mb-3 text-sm font-semibold text-slate-800">
                Thời gian mong muốn khởi hành <span class="text-red-600">*</span>
            </legend>
            <div class="space-y-2">
                @foreach ($departureTimes as $value => $label)
                    <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-slate-200 px-3 py-2.5 has-[:checked]:border-red-400 has-[:checked]:bg-red-50">
                        <input
                            type="radio"
                            name="departure_time_range"
                            value="{{ $value }}"
                            class="h-4 w-4 accent-red-600"
                            {{ old('departure_time_range') === $value ? 'checked' : '' }}
                            required
                        >
                        <span class="text-sm sm:text-base">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
            <div id="departure_time_other_wrap" class="mt-3 {{ old('departure_time_range') === \App\Models\Survey::DEPARTURE_TIME_OTHER ? '' : 'hidden' }}">
                <label for="departure_time_other" class="mb-2 block text-sm font-medium text-slate-700">
                    Ngày khởi hành mong muốn <span class="text-red-600">*</span>
                </label>
                <input
                    type="date"
                    id="departure_time_other"
                    name="departure_time_other"
                    lang="vi-VN"
                    value="{{ old('departure_time_other') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500"
                >
                
            </div>
            @error('departure_time_range')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            @error('departure_time_other')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </fieldset>

        <div>
            <label for="student_note" class="mb-2 block text-sm font-semibold text-slate-800">
                Mong muốn của sinh viên (nếu có)
            </label>
            <textarea
                id="student_note"
                name="student_note"
                rows="4"
                maxlength="1000"
                class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500"
                placeholder="Nhập mong muốn của bạn (nếu có)"
            >{{ old('student_note') }}</textarea>
            @error('student_note')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        <div>
            <label class="flex cursor-pointer items-start gap-3 rounded-xl border border-slate-200 px-3 py-3 has-[:checked]:border-red-400 has-[:checked]:bg-red-50">
                <input
                    type="checkbox"
                    name="is_agreed"
                    value="1"
                    class="mt-1 h-4 w-4 accent-red-600"
                    @checked(old('is_agreed'))
                    required
                >
                <span class="text-sm sm:text-base">Tôi đồng ý cung cấp thông tin dữ liệu đã khai báo để phục vụ mục đích khảo sát cho chương trình "Hành trình mùa xuân 2027" <span class="text-red-600">*</span></span>
            </label>
            @error('is_agreed')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <fieldset>
            <div class="space-y-2">
                <label class="flex cursor-pointer items-start gap-3 rounded-xlpx-3 py-2.5 has-[:checked]:border-red-400 has-[:checked]:bg-red-50"><span class="text-sm sm:text-base">Cảm ơn bạn đã thực hiện khảo sát. Thông tin về chương trình Hành trình mùa xuân sẽ sớm được công bố trên các kênh truyền thông của Trung tâm Quản lý Ký túc xá và Khu Đô thị ĐHQG-HCM và Tuổi trẻ ĐHQG-HCM.</span>
                </label></div>
        </fieldset>

        <button
            type="submit"
            class="w-full rounded-xl bg-red-700 px-4 py-3 text-base font-semibold text-white shadow hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
        >
            Gửi khảo sát
        </button>
    </form>
@endsection

@push('scripts')
<script>
    (function () {
        const otherValue = @json($otherValue);

        function bindUniversityOtherToggle() {
            const select = document.getElementById('unit_id');
            const wrap = document.getElementById('university_other_wrap');
            const input = document.getElementById('university_other');

            if (!select || !wrap || !input) {
                return;
            }

            function sync() {
                const isOther = !select.value;
                wrap.classList.toggle('hidden', !isOther);
                input.required = isOther;
            }

            select.addEventListener('change', sync);
            sync();
        }

        function bindOtherToggle(groupName, wrapId) {
            const wrap = document.getElementById(wrapId);
            const input = wrap ? wrap.querySelector('input') : null;

            function sync() {
                const selected = document.querySelector('input[name="' + groupName + '"]:checked');
                const isOther = selected && selected.value === otherValue;
                if (wrap) {
                    wrap.classList.toggle('hidden', !isOther);
                }
                if (input) {
                    input.required = Boolean(isOther);
                    if (!isOther) {
                        input.value = '';
                    }
                }
            }

            document.querySelectorAll('input[name="' + groupName + '"]').forEach(function (radio) {
                radio.addEventListener('change', sync);
            });

            sync();
        }

        bindUniversityOtherToggle();
        bindOtherToggle('family_situation', 'family_situation_other_wrap');

        const departureOtherWrap = document.getElementById('departure_time_other_wrap');
        const departureOtherInput = document.getElementById('departure_time_other');
        const departureRadios = document.querySelectorAll('input[name="departure_time_range"]');

        function syncDepartureOther() {
            const selected = document.querySelector('input[name="departure_time_range"]:checked');
            const isOther = selected && selected.value === @json(\App\Models\Survey::DEPARTURE_TIME_OTHER);

            departureOtherWrap.classList.toggle('hidden', !isOther);
            departureOtherInput.required = Boolean(isOther);

            if (!isOther) {
                departureOtherInput.value = '';
            }
        }

        departureRadios.forEach(function (radio) {
            radio.addEventListener('change', syncDepartureOther);
        });
        syncDepartureOther();
    })();
</script>
@endpush
