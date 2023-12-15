<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            خطط الحفظ
        </h2>
    </x-slot>
    <style>
        table,
        th,
        td {
            border: 1px solid #504646;
            text-align: center;
            padding: 3px;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($saves->isNotEmpty())
                        <table>
                            <tr>
                                <th>م</th>
                                <th>اسم الخطة</th>
                                <th>اتجاه الحفظ</th>
                                <th>رقم الجزء</th>
                                <th>عدد أوجه الحفظ</th>
                                <th>عدد أوجه التثبيت</th>
                                <th>أيام الحفظ في الأسبوع</th>
                                <th>تكرار المحفوظ؟</th>
                                <th>تعديل</th>
                                <th>طباعة</th>
                                <th>حذف</th>
                            </tr>
                            @foreach ($saves as $save)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $save->name }}</td>
                                    <td>{{ $save->direction ? 'من الفاتحة إلى الناس' : 'من الناس إلى الفاتحة' }}</td>
                                    <td>{{ $save->juz }}</td>
                                    <td>{{ $save->save_faces }}</td>
                                    <td>{{ $save->confirm_faces }}</td>
                                    <td>{{ $save->days }}</td>
                                    <td>{{ $save->is_same ? 'نعم' : 'لا' }}</td>
                                    <td><a class="underline underline-offset-8" href="">تعديل</a></td>
                                    <td><a class="underline underline-offset-8"
                                            href="{{ route('print-save-plan', ['plan' => $save->id]) }}">طباعة</a></td>
                                    <td><a class="underline underline-offset-8" href="">حذف</a></td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div>لا توجد خطط قرآنية</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
