<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            إضافة خطة مراجعة
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
                    <form action="{{ route('create-review-plan') }}" method="POST">
                        @csrf
                        <div>اسم الخطة: <input type="text" name="name" required></div>
                        <div>الأجزاء</div>

                        @for ($i = 0; $i < 6; $i++)
                            <div class="flex">
                                @for ($j = 0; $j < 5; $j++)
                                    <div class="w-14">
                                        <input type="checkbox" name="juzs[]" value="{{ $juzs[$i * 5 + $j]->id }}"
                                            required>
                                        {{ $juzs[$i * 5 + $j]->id }}
                                    </div>
                                @endfor
                            </div>
                        @endfor

                        <div>عدد أوجه المراجعة اليومية: <input type="number" name="review_faces" step="0.5"
                                min="0.5" max="1208" value="0.5" required>
                        </div>
                        <div>عدد أيام التسميع في كل أسبوع: <input type="number" name="days" step="1"
                                min="1" max="7" value="1" required>
                        </div>
                        <div style="margin-top: 5px">
                            <input type="submit" value="إضافة الخطة">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
