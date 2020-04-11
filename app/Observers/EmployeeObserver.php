<?php

namespace App\Observers;

use App\Employee;
use Illuminate\Support\Facades\Storage;


class EmployeeObserver
{
    /**
     * Handle the employee "created" event.
     *
     * @param  \App\Employee $employee
     * @return void
     */
    public function created(Employee $employee)
    {

    }

    /**
     * Handle the employee "updated" event.
     *
     * @param  \App\Employee $employee
     * @return void
     */
    public function saved(Employee $employee)
    {
        $employee->unsetEventDispatcher();
        if (is_file($employee->file_contract)) {
            if (!empty($employee->getOriginal())) {
                Storage::disk('public')->delete($employee->getOriginal()['file_contract']);
            }
            $directory = $employee->id . '/' . date('Y');
            $url = Storage::disk('public')->putFile($directory, $employee->file_contract->getPathName());
            $employee->file_contract = $url;

            $employee->save();
        }
    }

    /**
     * Handle the employee "deleted" event.
     *
     * @param  \App\Employee $employee
     * @return void
     */
    public function deleting(Employee $employee)
    {
        Storage::disk('public')->delete($employee->getOriginal()['file_contract']);
    }

    /**
     * Handle the employee "restored" event.
     *
     * @param  \App\Employee $employee
     * @return void
     */
    public function restored(Employee $employee)
    {
        //
    }

    /**
     * Handle the employee "force deleted" event.
     *
     * @param  \App\Employee $employee
     * @return void
     */
    public function forceDeleted(Employee $employee)
    {
        //
    }
}
