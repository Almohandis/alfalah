<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Save plans
    Route::get('/save-plans', [PlanController::class, 'savePlans'])->name('save-plans');
    Route::get('/asp', [PlanController::class, 'addSavePlan'])->name('add-save-plan');
    Route::post('/csp', [PlanController::class, 'createSavePlan'])->name('create-save-plan');
    Route::get('/psp/{plan}', [PlanController::class, 'printSavePlan'])->name('print-save-plan');
    Route::get('/esp/{plan}', [PlanController::class, 'editSavePlan'])->name('edit-save-plan');
    Route::post('/usp/{plan}', [PlanController::class, 'updateSavePlan'])->name('update-save-plan');
    Route::post('/dsp/{plan}', [PlanController::class, 'deleteSavePlan'])->name('delete-save-plan');

    // Review plans
    Route::get('/review-plans', [PlanController::class, 'reviewPlans'])->name('review-plans');
    Route::get('/arp', [PlanController::class, 'addReviewPlan'])->name('add-review-plan');
    Route::post('/crp', [PlanController::class, 'createReviewPlan'])->name('create-review-plan');


    Route::get('/print', function () {
        $request = (object) [
            "table" => "<table><tr><th>Company<th>Contact<th>Country<tr><td>Alfreds Futterkiste<td>Maria Anders<td>Germany<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Centro comercial Moctezuma<td>Francisco Chang<td>Mexico<tr><td>Ernst Handel<td>Roland Mendel<td>Austria<tr><td>Island Trading<td>Helen Bennett<td>UK<tr><td>Laughing Bacchus Winecellars<td>Yoshi Tannamuri<td>Canada<tr><td>Magazzini Alimentari Riuniti<td>Giovanni Rovelli<td>Italy</table>"
        ];
        $table = str_replace('\\r|\\n|\\', '', $request->table);

        $path = 'logo.jpg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        date_default_timezone_set("Africa/Cairo");
        $html = '<style>
    
        @page {
            margin: 150px 50px 70px 50px;
        }
    
        img {
            display: block;
            padding:0;
            margin:0;
        }
        p{
            margin:0;
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
        body{
          font-family:system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans","Liberation Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
          margin:5px 10px;
          padding:5px;
        }
        table,tr,td,th,thead,tbody{
          padding:3px 6px;
          margin: 5px;
        }
        tr:nth-child(even) {background: #FFF}
        tr:nth-child(odd) {background: #CCC}
        table{
          border-collapse: collapse;
          text-align:left;
          border-spacing:2px;
          width:100%;
        }
        th{
          font-weight:bold;
          border-bottom:1px solid black;
          background:#FFF;
          text-align:left;
        }
        tr{
          border-bottom:1px solid black;
          border-color:inherit;
          font-size:80%;
        }
        #logo-div{
            margin: 0 auto;
            width:auto;
            position: fixed;
            left: 0px;
            top: -150px;
            right: 0px;
            height: 150px;
            text-align: center;
        }
        #footer{
            display: block;
            padding: 10px;
            bottom: 0px;
            margin-top:auto;
            border-top: 1px solid black;
            position: fixed;
            left: 0px;
            bottom: -70px;
            right: 0px;
            height: 70px;
        }
        .container{
            margin-top:50px;
            position: relative;
            height:auto;
        }
        p{
            margin-bottom:5px;
        }
    
        .footer{
            display: block;
            padding: 10px;
            bottom: 30px;
            margin-top:auto;
            position: fixed;
            left: 0px;
            right: 0px;
        }
    
        </style>
    
        <div id="logo-div">
            <img src="' . $base64 . '" alt="logo" width="100">
            <p>AIGPS</p>
        </div>
        ' . 'The title from request' . '
    
        <div id="footer">
            <p>Date: ' . date("M d, Y") . ', time: ' . date("h:i A") . '</p>
        </div>
    
        <div class="container">
    
            ' .  $table  . '
            <div style="height:180px;"></div>
            <div class="footer">
                <p>Email: aigps.ml@gmail.com</p>
                <p>Tel: +20 154 2015 467</p>
                <br>
                <p>Signature:.......................</p>
                <p>Remarks:.........................</p>
            </div>
        </div>
    
        <script type="text/php">
            $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
            $font = $fontMetrics->get_font("helvetica", "bold");
            $size = 11;
            $color = array(0,0,0);
            $word_space = 0.0;
            $char_space = 0.0;
            $angle = 0.0;
            $pdf->page_text(500, 800, $text, $font, $size, $color, $word_space, $char_space, $angle);
    
        </script>
        ';


        $pdf = Pdf::loadHTML($html);
        $pdf->set_option("isPhpEnabled", true);
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream();
        // return $document->stream('report.pdf', array("Attachment" => true));
    });

    Route::get('test', function () {
        return view('test');
    });
});

require __DIR__ . '/auth.php';
