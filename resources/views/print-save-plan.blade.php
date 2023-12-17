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

        @media print {
            body {
                margin: 1.3cm;
                padding: 1.3cm;
            }
        }

        /* @page {
            margin: 0;
            border: 1px solid black;
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
        <div>اسم الطالب/ة :</div>
        <div>اسم المعلم/ة :</div>
        <div>تاريخ استلام الجدول:</div>
    </div>

    <div class="flex mt-8">
        <table class="w-full border-black border-2">
            <tr>
                <th class="w-2" rowspan="2">الأسبوع</th>
                <th class="w-14" rowspan="2">اليوم</th>
                <th class="w-24" rowspan="2">التاريخ</th>
                <th colspan="2">الحفظ</th>
                @if ($plan->confirm_faces)
                    <th colspan="2">التثبيت</th>
                @endif
                <th class="w-32" rowspan="2">الإنجاز</th>
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
                $weeks_counter = 1;
                $start_confirm = $parts[0]->name . ' ' . $parts[0]->start;
                $save_faces = $plan->save_faces * 2;
                $confirm_faces = $plan->confirm_faces * 2;
                $current_week = -1;
            @endphp

            @for ($i = 0; $i < $num_days; $i++)
                @if ($i % $plan->days == 0)
                    <tr class="border-black border-t-2">
                    @else
                    <tr>
                @endif
                @if (($i + 1) % $plan->days == 1 && $weeks_counter < $num_weeks)
                    <td rowspan="{{ $plan->days }}">{{ $weeks_counter++ }}</td>
                    @php
                        $current_week++;
                    @endphp
                @elseif (($i + 1) % $plan->days == 1 && $weeks_counter == $num_weeks)
                    <td rowspan="{{ ($i + 1) / $plan->days }}">{{ $weeks_counter++ }}</td>
                    @php
                        $current_week++;
                    @endphp
                @endif

                <td></td>
                <td></td>
                {{-- Without repetition (unique every day) --}}
                @if (!$plan->is_same)
                    {{-- Get the starting of the part by multiplying number of save faces by i --}}
                    <td>{{ $parts[$i * $save_faces]->name . ' ' . $parts[$i * $save_faces]->start }}</td>
                    {{-- If the current part is not the last part --}}
                    @if (ceil($num_parts / $save_faces - 1) != $i)
                        <td>{{ $parts[($i + 1) * $save_faces - 1]->name . ' ' . $parts[($i + 1) * $save_faces - 1]->end }}
                        </td>
                    @else
                        {{-- If the current part is the last part, calculate the remaining which can be less than a single save face --}}
                        <td>{{ $parts[($i + ($num_parts % $save_faces) - 1) * $save_faces]->name . ' ' . $parts[($i + ((count($parts) % $save_faces) - 1)) * $save_faces]->end }}
                        </td>
                    @endif
                @else
                    {{-- With repetition (repeat every day within every week) --}}
                    <td>{{ $parts[$current_week * $save_faces]->name . ' ' . $parts[$current_week * $save_faces]->start }}
                    </td>
                    @if ($current_week != $num_weeks - 1)
                        <td>{{ $parts[($current_week + 1) * $save_faces - 1]->name . ' ' . $parts[($current_week + 1) * $save_faces - 1]->end }}
                        </td>
                    @else
                        <td>{{ $parts[$current_week * $save_faces + ($num_parts % $save_faces) - 1]->name . ' ' . $parts[$current_week * $save_faces + ($num_parts % $save_faces) - 1]->end }}
                        </td>
                    @endif
                @endif

                @if (!$plan->is_same)
                    @if ($confirm_faces && $i != 0)
                        @if ($i * $save_faces <= $confirm_faces)
                            <td>{{ $start_confirm }}</td>
                            <td>{{ $parts[$i * $save_faces - 1]->name . ' ' . $parts[$i * $save_faces - 1]->end }}
                            </td>
                        @else
                            <td>{{ $parts[$i * $save_faces - $confirm_faces]->name . ' ' . $parts[$i * $save_faces - $confirm_faces]->start }}
                            </td>
                            <td>{{ $parts[$i * $save_faces - 1]->name . ' ' . $parts[$i * $save_faces - 1]->end }}
                            </td>
                        @endif
                    @else
                        <td></td>
                        <td></td>
                    @endif
                @else
                    @if ($confirm_faces && $current_week != 0)
                        @if ($current_week * $save_faces <= $confirm_faces)
                            <td>{{ $start_confirm }}</td>
                            <td>{{ $parts[$current_week * $save_faces - 1]->name . ' ' . $parts[$current_week * $save_faces - 1]->end }}
                            </td>
                        @else
                            <td>{{ $parts[$current_week * $save_faces - $confirm_faces]->name . ' ' . $parts[$current_week * $save_faces - $confirm_faces]->start }}
                            </td>
                            <td>{{ $parts[$current_week * $save_faces - 1]->name . ' ' . $parts[$current_week * $save_faces - 1]->end }}
                            </td>
                        @endif
                    @else
                        <td></td>
                        <td></td>
                    @endif
                @endif

                <td></td>
                </tr>
            @endfor
        </table>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
