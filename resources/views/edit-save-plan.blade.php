<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            تعديل خطة الحفظ
        </h2>
    </x-slot>

    <div class="flex mt-2">
        @if ($errors->any())
            <div class="bg-red-500 mx-auto my-0.5 rounded px-3 py-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-white">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


    @if (session('success'))
        <div class="flex mt-2">
            <div class="bg-green-900 mx-auto my-0.5 rounded px-3 py-4">
                <p class="text-white">{{ session('success') }}</p>
            </div>
        </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('update-save-plan', ['plan' => $plan->id]) }}" method="POST">
                        @csrf
                        <div>اسم الخطة: <input type="text" name="name" value="{{ $plan->name }}" required></div>
                        <div>الجزء كتابة: <input type="text" name="juz_text" value="{{ $plan->juz_text }}" required>
                        </div>
                        <div>عدد الأيام كتابة: <input type="text" name="day_text" value="{{ $plan->day_text }}"
                                required></div>
                        <div>المحفوظ الأسبوعي كتابة: <input type="text" name="face_text" value="{{ $plan->face_text }}"
                                required></div>
                        <div>اتجاه الحفظ:
                            <select name="direction" required>
                                <option @selected($plan->direction) value="1">من الفاتحة إلى الناس</option>
                                <option @selected(!$plan->direction) value="0">من الناس إلى الفاتحة</option>
                            </select>
                        </div>
                        <div>رقم الجزء: <input type="number" name="juz" min="1" max="30"
                                value="{{ $plan->juz }}" required>
                        </div>
                        <div>عدد أوجه الحفظ اليومي: <input type="number" name="save_faces" step="0.5"
                                min="0.5" max="1208" value="{{ $plan->save_faces }}" required>
                        </div>
                        <div>عدد أوجه التثبيت (إن وجد): <input type="number" name="confirm_faces" step="0.5"
                                min="0" max="1208" value="{{ $plan->confirm_faces }}">
                        </div>
                        <div>عدد أيام التسميع في كل أسبوع: <input type="number" name="days" step="1"
                                min="1" max="7" value="{{ $plan->days }}" required>
                        </div>
                        <div>تكرار مقدار الحفظ نفسه في الأسبوع الواحد <input @checked($plan->is_same)
                                type="checkbox" value="1" name="is_same"></div>
                        <div style="margin-top: 5px">
                            <input type="submit" value="حفظ التعديلات">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
