<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\SavePlan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function savePlans()
    {
        $saves = SavePlan::get();
        return view('save-plans', [
            'saves' =>  $saves,
        ]);
    }
    public function addSavePlan()
    {
        return view('add-save-plan');
    }
    public function addReviewPlan()
    {
        return view('add-review-plan');
    }
    public function createSavePlan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'direction' => 'required',
            'juz'   => 'required',
            'save_faces' => 'required',
            'days'  => 'required',
        ]);
        if ($request->confirm_faces) {
            $request->validate([
                'confirm_faces' => 'required',
            ]);
            if ($request->confirm_faces < $request->save_faces) {
                return redirect()->back()->withErrors('أوجه التثبيت يجب أن تكون أكبر من أو تساوي أوجه الحفظ');
            }
        }
        SavePlan::create([
            'name'  => $request->name,
            'direction' => $request->direction,
            'juz'   => $request->juz,
            'save_faces'    => $request->save_faces,
            'confirm_faces' => $request->confirm_faces,
            'days'  => $request->days,
            'is_same'   => $request->is_same ?? 0,
        ]);
        return redirect()->back()->withSuccess('تم إضافة الخطة بنجاح');
    }
    public function printSavePlan(SavePlan $plan)
    {
        $parts = Part::where('juz', $plan->juz);
        if (!$plan->direction) {
            $parts->orderBy('sura', 'desc')->get();
        } else {
            $parts = $parts->get();
        }

        /**
         * Calculate variables for the table
         */
        $number_of_parts = $parts->count();
        $number_of_actual_parts = ceil($number_of_parts / ($plan->save_faces * 2));
        $number_of_days = $number_of_actual_parts;
        $number_of_weeks = $plan->is_same ? $number_of_actual_parts : $number_of_actual_parts / $plan->days;

        return view('print-save-plan', [
            'parts' => $parts,
            'plan' => $plan,
            'num_parts' =>  $number_of_parts,
            'num_actual_parts'  => $number_of_actual_parts,
            'num_days'  => $number_of_days,
            'num_weeks' => $number_of_weeks,
        ]);
    }
}
