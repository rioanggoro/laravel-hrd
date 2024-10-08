<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Holiday;
use DB;


class HolidayController extends Controller
{
    /** holidays page */
    public function holiday()
    {
        $holiday = Holiday::all();
        return view('employees.holidays', compact('holiday'));
    }
    
    /** save record */
    public function saveRecord(Request $request)
    {
        $request->validate([
            'nameHoliday' => 'required|string|max:255',
            'holidayDate' => 'required|string|max:255',
        ]);
        
        DB::beginTransaction();
        try {
            $holiday = new Holiday;
            $holiday->name_holiday = $request->nameHoliday;
            $holiday->date_holiday = $request->holidayDate;
            $holiday->save();
            
            DB::commit();
            Toastr::success('Create new holiday successfully :)','Success');
            return redirect()->back();
            
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Holiday fail :)','Error');
            return redirect()->back();
        }
    }
    
    /** update record */
public function updateRecord(Request $request)
{
    DB::beginTransaction();
    try {
        $id = $request->id; // Dapatkan ID dari input hidden
        $holidayName = $request->holidayName;
        $holidayDate = $request->holidayDate;

        // Update data libur
        $update = [
            'name_holiday' => $holidayName,
            'date_holiday' => $holidayDate,
        ];

        Holiday::where('id', $id)->update($update);

        DB::commit();
        Toastr::success('Holiday updated successfully', 'Success');
        return redirect()->back();
    } catch (\Exception $e) {
        DB::rollback();
        Toastr::error('Holiday update failed', 'Error');
        return redirect()->back();
    }
}


    /** delete record */
/** delete record */
public function destroy($id)
{
    DB::beginTransaction();
    try {
        $holiday = Holiday::findOrFail($id);
        $holiday->delete();

        DB::commit();
        Toastr::success('Holiday deleted successfully :)', 'Success');
        return redirect()->back();
    } catch (\Exception $e) {
        DB::rollback();
        Toastr::error('Failed to delete holiday :)', 'Error');
        return redirect()->back();
    }
}

}
