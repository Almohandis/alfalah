<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>دار الفلاح</title>
    <style>
        * {
            direction: rtl !important;
            font-weight: bold;
            font-family: serif;
        }

        @page {
            margin: 150px 50px 70px 50px;
        }

        img {
            display: block;
            padding: 0;
            margin: 0;
        }

        p {
            margin: 0;
        }

        h1 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 40px;
        }

        h3 {
            font-size: 18px;
            font-weight: normal;
            margin-bottom: 20px;
        }

        body {
            font-family: serif;
            margin: 5px 10px;
            padding: 5px;
        }

        table,
        tr,
        td,
        th,
        thead,
        tbody {
            padding: 3px 6px;
            margin: 5px;
        }

        tr:nth-child(even) {
            background: #FFF
        }

        tr:nth-child(odd) {
            background: #CCC
        }

        table {
            border-collapse: collapse;
            text-align: left;
            border-spacing: 2px;
            width: 100%;
        }

        th {
            font-weight: bold;
            border-bottom: 1px solid black;
            background: #FFF;
            text-align: left;
        }

        tr {
            border-bottom: 1px solid black;
            border-color: inherit;
            font-size: 80%;
        }

        #logo-div {
            margin: 0 auto;
            width: auto;
            position: fixed;
            left: 0px;
            top: -150px;
            right: 0px;
            height: 150px;
            text-align: center;
        }

        #footer {
            display: block;
            padding: 10px;
            bottom: 0px;
            margin-top: auto;
            border-top: 1px solid black;
            position: fixed;
            left: 0px;
            bottom: -70px;
            right: 0px;
            height: 70px;
        }

        .container {
            margin-top: 50px;
            position: relative;
            height: auto;
        }

        p {
            margin-bottom: 5px;
        }

        .footer {
            display: block;
            padding: 10px;
            bottom: 30px;
            margin-top: auto;
            position: fixed;
            left: 0px;
            right: 0px;
        }
    </style>
</head>

<body>
    <div id="logo-div" class="flex items-center justify-between">
        <div>
            <p class="text-3xl align-middle">خطة الحفظ</p>
        </div>
        <div>
            <img src="{{ asset('logo.jpg') }}" alt="الشعار" width="100">
        </div>
    </div>

    <div id="footer">
        <p>Date: {{ date('M d, Y') }}, time: {{ date('h:i A') }} </p>
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


    <div class="container">
        <div class="flex mt-8">
            <table class="w-full border-black border-2">
                <tr>
                    <th class="w-1" rowspan="2">الأسبوع</th>
                    <th class="w-14" rowspan="2">اليوم</th>
                    <th class="w-20" rowspan="2">التاريخ</th>
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
                    // function arDigits($str)
                    // {
                    //     $arabic_eastern = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
                    //     $arabic_western = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                    //     return str_replace($arabic_western, $arabic_eastern, $str);
                    // }
                @endphp

                @for ($i = 0; $i < $num_days; $i++)
                    @if ($i % $plan->days == 0)
                        <tr class="border-black border-t-2">
                        @else
                        <tr>
                    @endif
                    @if (($i + 1) % $plan->days == 1 && $weeks_counter < $num_weeks)
                        <td class="th" rowspan="{{ $plan->days }}">{{ $weeks_counter++ }}</td>
                        @php
                            $current_week++;
                        @endphp
                    @elseif (($i + 1) % $plan->days == 1 && $weeks_counter == $num_weeks)
                        <td class="th" rowspan="{{ ($i + 1) / $plan->days }}">{{ $weeks_counter++ }}</td>
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
        <div style="height:180px;"></div>
        <div class="footer">
            <p>Email: aigps.ml@gmail.com</p>
            <p>Tel: +20 154 2015 467</p>
            <br>
            <p>Signature:.......................</p>
            <p>Remarks:.........................</p>
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        window.onload = function() {
            String.prototype.toIndiaDigits = function() {
                var id = [
                    '٠',
                    '١',
                    '٢',
                    '٣',
                    '٤',
                    '٥',
                    '٦',
                    '٧',
                    '٨',
                    '٩'
                ];
                return this.replace(/[0-9]/g, function(w) {
                    return id[+w]
                });
            }
            let elements = document.querySelectorAll('td');
            for (let i = 0; i < elements.length; i++) {
                elements[i].innerHTML = elements[i].innerHTML.toIndiaDigits();
            }
        }
    </script>

    

</body>

</html>
