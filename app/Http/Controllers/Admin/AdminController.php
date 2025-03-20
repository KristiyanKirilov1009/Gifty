<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    protected $datatable;
    protected $module;
    protected $filters = false;

    public function __construct()
    {
        View::share(
            [
                'module' => $this->module,
                'datatable' => $this->datatable,
                'filters' => $this->filters
            ]
        );
    }
}
