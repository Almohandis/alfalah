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

        @page {
            margin: 0;
            border: 1px solid black;
        }

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
        <div>اسم الطالب:</div>
        <div>اسم المعلم:</div>
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
                <th >من</th>
                <th >إلى</th>
                @if ($plan->confirm_faces)
                    <th >من</th>
                    <th >إلى</th>
                @endif
            </tr>
            @php
                $weeks_counter = 1;
                $start_confirm = $parts[0]->sura . ' ' . $parts[0]->start;
                $previous_confirm = '';
                $save_faces = $plan->save_faces * 2;
                $confirm_faces = $plan->confirm_faces * 2;
                $confirm_counter = 0;
                $first_confirm = 0;
            @endphp

            @for ($i = 0; $i <= ceil(count($parts) / ($plan->save_faces * 2) - 1); $i++)
                @if ($i % $plan->days == 0)
                    <tr class="border-black border-t-2">
                    @else
                    <tr>
                @endif
                @if (($i + 1) % $plan->days == 1 && $weeks_counter < $num_weeks)
                    <td rowspan="{{ $plan->days }}">{{ $weeks_counter++ }}</td>
                @elseif (($i + 1) % $plan->days == 1 && $weeks_counter == $num_weeks)
                    <td rowspan="{{ ($i + 1) / $plan->days }}">{{ $weeks_counter++ }}</td>
                @endif

                <td></td>
                <td></td>

                <td>{{ $parts[$i * $save_faces]->sura . ' ' . $parts[$i * $save_faces]->start }}</td>
                @if (ceil(count($parts) / ($plan->save_faces * 2) - 1) != $i)
                    <td>{{ $parts[($i + 1) * $save_faces - 1]->sura . ' ' . $parts[($i + 1) * $save_faces - 1]->end }}
                    </td>
                @else
                    <td>{{ $parts[($i + ((count($parts) % $save_faces) - 1)) * $save_faces]->sura . ' ' . $parts[($i + ((count($parts) % $save_faces) - 1)) * $save_faces]->end }}
                    </td>
                @endif

                @php
                    $previous_confirm = $start_confirm;
                @endphp
                @if ($confirm_faces && $i != 0)
                    @if ($i * $save_faces < $confirm_faces + $save_faces)
                        <td>{{ $start_confirm }}</td>
                        <td>{{ $parts[$first_confirm + $save_faces - 1]->sura . ' ' . $parts[$first_confirm + $save_faces - 1]->end }}
                        </td>
                        @php
                            $first_confirm++;
                        @endphp
                    @else
                        @php
                            $first_confirm++;
                            if ($i != 0) {
                                $confirm_counter++;
                            }
                        @endphp
                        <td>{{ $parts[$confirm_counter]->sura . ' ' . $parts[$confirm_counter]->start }}</td>
                        <td>{{ $parts[$confirm_counter + $confirm_faces - 1]->sura . ' ' . $parts[$confirm_counter + $confirm_faces - 1]->end }}
                        </td>
                    @endif
                @else
                    <td></td>
                    <td></td>
                @endif
                <td></td>
                </tr>
            @endfor
        </table>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
