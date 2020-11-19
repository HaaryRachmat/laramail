<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;

class AdminEmployee extends Component
{
    public $admin_employee;
    public function render()
    {
        $this->admin_employee = Employee::orderBy('created_at', 'DESC')->get();
        return view('admin.admin-employee');
    }
}
