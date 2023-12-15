<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>دار الفلاح</title>
    <style>
        * {
            direction: rtl;
            font-weight: bold;
            border-color: black;
        }

        /* @media print {
            body {
                margin: 1.3cm;
                padding: 1.3cm;
            }
        }

        @page {
            margin: 0;
        } */

        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 3px;
        }
    </style>
</head>

<body>

    <div class="flex items-center justify-between">
        <div>
            <p class="text-3xl align-middle">خطة الحفظ</p>
        </div>
        <div>
            <img src="{{ asset('logo.jpg') }}" alt="الشعار" width="100">
        </div>
    </div>

    <div class="flex mt-5">
        <div class="mx-auto">
            {{ $plan->name }}
        </div>
    </div>

    <div class="flex flex-col mt-8">
        <div>الطالب:</div>
        <div>اسم المعلم:</div>
        <div>تاريخ استلام الجدول:</div>
    </div>

    <div class="flex mt-8">
        <table class="w-full border-black border-2">
            <tr>
                <th class="w-2" rowspan="2">الأسبوع</th>
                <th class="w-14" rowspan="2">التاريخ</th>
                <th class="w-24" rowspan="2">اليوم</th>
                <th colspan="2">الحفظ</th>
                @if ($plan->confirm_faces)
                    <th colspan="2">التثبيت</th>
                @endif
                <th rowspan="2">الإنجاز</th>
            </tr>
            <tr>
                <th>من</th>
                <th>إلى</th>
                @if ($plan->confirm_faces)
                    <th>من</th>
                    <th>إلى</th>
                @endif
            </tr>
            @php
                $days_counter = 0;
                $weeks_counter = 1;
                $parts_counter = 0;
                $start_save = $parts[0]->sura . ' ' . $parts[0]->start;
                $end_save = '';
                $start_confirm = $parts[0]->sura . ' ' . $parts[0]->start;
                $end_confirm = '';
                $border_bottom = 1;
                $save_faces = $plan->save_faces;
                $current_save_faces = 0;
                $confirm_faces = $plan->confirm_faces;
                $current_confirm_faces = 0;
            @endphp
            @if ($plan->is_same)
                @foreach ($parts as $part)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td></td>
                        <td></td>

                    </tr>
                @endforeach
            @else
                @foreach ($parts as $part)
                    @php
                        if ($confirm_faces) {
                            $end_confirm = $end_save;
                            if ($current_save_faces % $save_faces == 0 && $current_confirm_faces % $confirm_faces == 0) {
                                $end_confirm = $end_save;
                                $current_confirm_faces++;
                            } elseif ($current_save_faces % $save_faces == 0 && $current_confirm_faces == $confirm_faces) {
                                $start_confirm = $end_save;
                                $current_confirm_faces = 0;
                            }
                        }
                        if ($current_save_faces % $save_faces == 0) {
                            $start_save = $part->sura . ' ' . $part->start;
                            $current_save_faces++;
                        }

                        if ($current_save_faces == $save_faces) {
                            $current_save_faces = 0;
                        }
                    @endphp
                    @php
                        $days_counter++;
                    @endphp
                    @if ($days_counter % $plan->days === 1)
                        <tr class="border-black border-t-2">
                        @else
                        <tr>
                    @endif

                    @if ($days_counter % $plan->days === 1 && $weeks_counter < $num_weeks)
                        <td rowspan="{{ $plan->days }}">{{ $weeks_counter++ }}</td>
                    @elseif ($days_counter % $plan->days === 1 && $weeks_counter == $num_weeks)
                        <td rowspan="{{ $days_counter % $plan->days }}">{{ $weeks_counter++ }}</td>
                    @endif
                    <td></td>
                    <td></td>

                    </tr>
                @endforeach
            @endif

        </table>
    </div>




    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
