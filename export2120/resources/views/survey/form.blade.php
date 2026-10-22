@extends('layouts.survey')

@section('title', 'Khảo sát nhu cầu về quê ăn Tết')

@section('content')
    <header class="mb-6 text-center">
        <p class="text-sm font-semibold uppercase tracking-wide text-red-700">Chương trình Hành trình mùa Xuân</p>
        <h1 class="mt-2 text-2xl font-bold text-red-800 sm:text-3xl">Khảo sát nhu cầu về quê ăn Tết</h1>
        <p class="mt-3 text-sm text-slate-600 sm:text-base">
            Vui lòng điền đầy đủ thông tin để Ban Tổ chức nắm nhu cầu hỗ trợ sinh viên về quê dịp Tết.
        </p>
    </header>

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

    <form action="{{ route('survey.store') }}" method="POST" class="space-y-6 rounded-2xl bg-white p-5 shadow-lg shadow-red-100 ring-1 ring-red-100 sm:p-8">
        @csrf

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

        <fieldset>
            <legend class="mb-3 text-sm font-semibold text-slate-800">
                Đơn vị đào tạo <span class="text-red-600">*</span>
            </legend>
            <div class="space-y-2">
                @foreach ($trainingUnits as $value => $label)
                    <label class="flex cursor-pointer items-start gap-3 rounded-xl border border-slate-200 px-3 py-2.5 has-[:checked]:border-red-400 has-[:checked]:bg-red-50">
                        <input
                            type="radio"
                            name="training_unit"
                            value="{{ $value }}"
                            class="mt-1 h-4 w-4 accent-red-600"
                            {{ old('training_unit') === $value ? 'checked' : '' }}
                            required
                            data-toggle-other="training_unit_other_wrap"
                        >
                        <span class="text-sm sm:text-base">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
            <div id="training_unit_other_wrap" class="mt-3 {{ old('training_unit') === $otherValue ? '' : 'hidden' }}">
                <label for="training_unit_other" class="mb-2 block text-sm font-medium text-slate-700">Ghi rõ đơn vị đào tạo</label>
                <input
                    type="text"
                    id="training_unit_other"
                    name="training_unit_other"
                    value="{{ old('training_unit_other') }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500"
                    placeholder="Nhập tên đơn vị đào tạo"
                >
            </div>
            @error('training_unit')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            @error('training_unit_other')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </fieldset>

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
                Nhu cầu về tỉnh nào <span class="text-red-600">*</span>
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
                            name="departure_time"
                            value="{{ $value }}"
                            class="h-4 w-4 accent-red-600"
                            {{ old('departure_time') === $value ? 'checked' : '' }}
                            required
                        >
                        <span class="text-sm sm:text-base">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
            @error('departure_time')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset>
            <legend class="mb-3 text-sm font-semibold text-slate-800">
                Hình thức hỗ trợ mong muốn <span class="text-red-600">*</span>
            </legend>
            <div class="space-y-2">
                @foreach ($supportTypes as $value => $label)
                    <label class="flex cursor-pointer items-start gap-3 rounded-xl border border-slate-200 px-3 py-2.5 has-[:checked]:border-red-400 has-[:checked]:bg-red-50">
                        <input
                            type="radio"
                            name="support_type"
                            value="{{ $value }}"
                            class="mt-1 h-4 w-4 accent-red-600"
                            {{ old('support_type') === $value ? 'checked' : '' }}
                            required
                        >
                        <span class="text-sm sm:text-base">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
            @error('support_type')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
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

        bindOtherToggle('training_unit', 'training_unit_other_wrap');
        bindOtherToggle('family_situation', 'family_situation_other_wrap');
    })();
</script>
@endpush
