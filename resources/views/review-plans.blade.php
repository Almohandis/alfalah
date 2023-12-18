<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            خطط المراجعة
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
                    @if ($plans->isNotEmpty())
                        <table>
                            <tr>
                                <th>م</th>
                                <th>اسم الخطة</th>
                                <th>الأجزاء</th>
                                <th>عدد أوجه المراجعة</th>
                                <th>أيام الحفظ في الأسبوع</th>
                                <th>تعديل</th>
                                <th>طباعة</th>
                                <th>حذف</th>
                            </tr>
                            @foreach ($plans as $plan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $plan->name }}</td>
                                    <td>[
                                        @php
                                            $i = 0;
                                        @endphp
                                        @for ($i = 0; $i < count($plan->juzs) - 1; $i++)
                                            {{ $plan->juzs[$i]->id }},
                                        @endfor
                                        @php
                                            $last_juz = $plan->juzs[$i]->id;
                                        @endphp
                                        {{ $last_juz }}]
                                    </td>
                                    <td>{{ $plan->review_faces }}</td>
                                    <td>{{ $plan->days }}</td>
                                    <td><a class="underline underline-offset-8 mx-2"
                                            href="{{ route('edit-review-plan', ['plan' => $plan->id]) }}">تعديل</a></td>
                                    <td><a class="underline underline-offset-8 mx-2"
                                            href="{{ route('print-review-plan', ['plan' => $plan->id]) }}"
                                            target="_blank">طباعة</a>
                                    </td>
                                    <td class="flex">
                                        <form action="{{ route('delete-review-plan', ['plan' => $plan->id]) }}"
                                            method="POST">
                                            <input type="submit" class="bg-red-500 py-1 px-4 rounded mx-2"
                                                style="background-color: #ef4444 !important; cursor: pointer"
                                                value="حذف">
                                            @csrf
                                        </form>
                                    </td>
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
