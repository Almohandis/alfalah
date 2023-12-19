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

        .page-footer {
            height: 50px;
            position: fixed;
            bottom: 0;
            width: 100%;
            border-top: 1px solid black;
        }

        .page-header {
            height: 150px;
            display: flex;
            justify-content: space-between;
        }

        @media print {
            thead {
                display: table-header-group;
            }

            tfoot {
                display: table-footer-group;
            }
        }

        .invis {
            background-color: white;
            border: none !important;
        }

        @page {
            margin: 1cm 1cm 1cm 1cm;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        td {
            page-break-inside: avoid;
            page-break-after: auto
        }

        tr:nth-child(even) {
            background: #FFF
        }

        tr:nth-child(odd) {
            background: #CCC
        }

        .th {
            background-color: #FFF;
        }

        table {
            text-align: center;
            width: 100%;
            page-break-inside: auto;
            border: none !important;
        }

        th {
            font-weight: bold;
            border-bottom: 1px solid black;
            background: #FFF;
        }

        th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 3px;
        }
    </style>
</head>

<body>

    <div class="page-header">
        <p class="text-3xl" style="align-self: center;">خطة المراجعة</p>

        <div>
            <img src="{{ asset('logo.jpg') }}" alt="الشعار" width="100">
        </div>
    </div>


    <div class="flex mt-10">
        <div class="flex flex-col w-1/2">
            <div>الأجزاء :</div>
            <div>عدد أيام المراجعة :</div>
            <div>أوجه المراجعة اليومية :</div>
        </div>

        <div class="flex flex-col">
            <div>اسم الطالبـ / ـة :</div>
            <div>اسم المعلمـ / ـة :</div>
            <div>تاريخ استلام الجدول:</div>
        </div>
    </div>


    <div class="flex mt-8">
        <table class="w-full border-black border-2">
            <thead>
                <tr>
                    <th class="w-1" rowspan="2">الأسبوع</th>
                    <th class="w-14" rowspan="2">اليوم</th>
                    <th class="w-20" rowspan="2">التاريخ</th>
                    <th colspan="2">المراجعة</th>
                    <th class="w-32" rowspan="2">الإنجاز</th>
                </tr>
                <tr>
                    <th>من</th>
                    <th>إلى</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $weeks_counter = 1;
                    $review_faces = $plan->review_faces * 2;
                    $current_week = -1;
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
                    @elseif($num_days === $num_weeks)
                        <td class="th">{{ $weeks_counter++ }}</td>
                        @php
                            $current_week++;
                        @endphp
                    @endif

                    <td></td>
                    <td></td>

                    {{-- Get the starting of the part by multiplying number of review faces by i --}}
                    <td>{{ $parts[$i * $review_faces]->start_name . ' ' . $parts[$i * $review_faces]->start }}</td>
                    {{-- If the current part is not the last part --}}
                    @if (ceil($num_parts / $review_faces - 1) != $i)
                        <td>{{ $parts[($i + 1) * $review_faces - 1]->end_name . ' ' . $parts[($i + 1) * $review_faces - 1]->end }}
                        </td>
                    @else
                        {{-- If the current part is the last part, calculate the remaining which can be less than a single review face --}}
                        <td>{{ $parts[$i * $review_faces + ($num_parts % $review_faces) - 1]->end_name . ' ' . $parts[$i * $review_faces + ($num_parts % $review_faces) - 1]->end }}
                        </td>
                    @endif

                    <td></td>
                    </tr>
                @endfor
            </tbody>

            <tfoot class="invis">
                <tr class="invis">
                    <td class="invis" style="height: 50px;"></td>
                </tr>
            </tfoot>
        </table>
    </div>



    <div class="page-footer">
        {{-- <p>Date: {{ date('M d, Y') }}, time: {{ date('h:i A') }} </p> --}}
        <p class="text-center">جميع الحقوق محفوظة لدار الفلاح - {{ date('Y') }} &copy;</p>
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
            document.querySelector('tbody').lastElementChild.style.borderBottom = '2px solid black';
            window.print();
        }
    </script>
</body>

</html>
