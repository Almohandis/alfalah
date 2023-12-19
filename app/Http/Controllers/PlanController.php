<?php

namespace App\Http\Controllers;

use App\Models\Juz;
use App\Models\Part;
use App\Models\ReviewPlan;
use App\Models\SavePlan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    // Save plans
    public function savePlans()
    {
        $plans = SavePlan::get();
        return view('save-plans', [
            'plans' =>  $plans,
        ]);
    }
    public function addSavePlan()
    {
        return view('add-save-plan');
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
            $parts = $parts->orderBy('rank', 'desc')->get();
            // return $parts;
        } else {
            $parts = $parts->get();
        }

        /**
         * Calculate variables for the table
         */
        $number_of_parts = $parts->count();
        $number_of_actual_parts = ceil($number_of_parts / ($plan->save_faces * 2));
        $number_of_days = $plan->is_same ? $number_of_actual_parts * $plan->days : $number_of_actual_parts;
        $number_of_weeks = $plan->is_same ? $number_of_actual_parts : ceil($number_of_actual_parts / $plan->days);

        // return $number_of_weeks;

        return view('print-save-plan', [
            'parts' => $parts,
            'plan' => $plan,
            'num_parts' =>  $number_of_parts,
            'num_actual_parts'  => $number_of_actual_parts,
            'num_days'  => $number_of_days,
            'num_weeks' => $number_of_weeks,
        ]);
    }
    public function editSavePlan(SavePlan $plan)
    {
        return view('edit-save-plan', [
            'plan' => $plan,
        ]);
    }
    public function updateSavePlan(Request $request, SavePlan $plan)
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
        // return $request;
        $plan->update([
            'name'  => $request->name,
            'direction' => $request->direction,
            'juz'   => $request->juz,
            'save_faces'    => $request->save_faces,
            'confirm_faces' => $request->confirm_faces,
            'days'  => $request->days,
            'is_same'   => $request->is_same ?? 0,
        ]);
        return redirect()->back()->withSuccess('تم تعديل الخطة بنجاح');
    }
    public function deleteSavePlan(SavePlan $plan)
    {
        $plan->delete();
        return redirect()->back()->withSuccess('تم حذف الخطة بنجاح');
    }
    // Review plans
    public function reviewPlans()
    {
        $plans = ReviewPlan::get();
        // return $plans[1]->juzs[0]->id;
        return view('review-plans', [
            'plans' =>  $plans,
        ]);
    }
    public function addReviewPlan()
    {
        $juzs = Juz::get();
        return view('add-review-plan', [
            'juzs'  => $juzs,
        ]);
    }
    public function createReviewPlan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'review_faces' => 'required',
            'days'  => 'required',
            'juzs'  => 'required',
        ]);
        $plan = ReviewPlan::create([
            'name'  => $request->name,
            'review_faces'    => $request->review_faces,
            'days'  => $request->days,
        ]);

        foreach ($request->juzs as $juz) {
            $plan->juzs()->attach($juz);
        }

        return redirect()->back()->withSuccess('تم إضافة الخطة بنجاح');
    }
    public function printReviewPlan(ReviewPlan $plan)
    {
        $juzs = $plan->juzs->pluck('id');
        $parts = Part::whereIn('juz', $juzs)->get();

        $number_of_parts = $parts->count();
        $number_of_actual_parts = ceil($number_of_parts / ($plan->review_faces * 2));
        $number_of_days = $number_of_actual_parts;
        $number_of_weeks = ceil($number_of_actual_parts / $plan->days);

        return view('print-review-plan', [
            'parts' => $parts,
            'plan' => $plan,
            'num_parts' =>  $number_of_parts,
            'num_actual_parts'  => $number_of_actual_parts,
            'num_days'  => $number_of_days,
            'num_weeks' => $number_of_weeks,
        ]);
    }
    public function editReviewPlan(ReviewPlan $plan)
    {
        $juzs = Juz::get();
        return view('edit-review-plan', [
            'plan'  => $plan,
            'juzs'  => $juzs,
        ]);
    }
    public function updateReviewPlan(Request $request, ReviewPlan $plan)
    {
        $request->validate([
            'name' => 'required',
            'review_faces' => 'required',
            'days'  => 'required',
            'juzs'  => 'required',
        ]);
        $plan->create([
            'name'  => $request->name,
            'review_faces'    => $request->review_faces,
            'days'  => $request->days,
        ]);

        $plan->juzs()->detach();

        foreach ($request->juzs as $juz) {
            $plan->juzs()->attach($juz);
        }

        return redirect()->back()->withSuccess('تم تعديل الخطة بنجاح');
    }
    public function deleteReviewPlan(ReviewPlan $plan)
    {
        $plan->delete();
        return redirect()->back()->withSuccess('تم حذف الخطة بنجاح');
    }
}
