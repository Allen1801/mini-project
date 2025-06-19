<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EmployeeTable extends Component
{
    public $employees;

    public function __construct($employees)
    {
        $this->employees = $employees;
    }

    public function render()
    {
        return view('components.employee-table');
    }
}
