<?php

namespace App\Modules\Admin\Dashboard\Controllers;

use App\Modules\Admin\Dashboard\Classes\Base;

class DashboardController extends Base
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(__('public.dashboard_title'));
        $this->title = __('admin.dashboard_page_title');
        $this->content = view('Admin::Dashboard.index')
                        ->with([
                            'title' => $this->title,

                        ])
                        ->render();
        return $this->renderOutput();
    }
}
