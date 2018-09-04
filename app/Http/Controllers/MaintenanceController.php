<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\App;

class MaintenanceController extends Controller
{
	public function index()
    {
        $data = [
            'status' => App::isDownForMaintenance() ? CanvasHelper::MAINTENANCE_MODE_ENABLED : CanvasHelper::MAINTENANCE_MODE_DISABLED,
        ];

        return view('backend.tools.index', compact('data'));
    }


    public function enableMaintenanceMode()
    {
    	dd('inebel');
        // $exitCode = Artisan::call('down');
        // if ($exitCode === 0) {
        //     Session::set('admin_ip', request()->ip());
        //     Session::set('_enable-maintenance-mode', trans('canvas::messages.enable_maintenance_mode_success'));
        // } else {
        //     Session::set('_enable-maintenance-mode', trans('canvas::messages.enable_maintenance_mode_error'));
        // }

        // return redirect()->route('canvas.admin.tools');
    }

    /**
     * Disable Application Maintenance Mode.
     *
     * @return \Illuminate\View\View
     */
    public function disableMaintenanceMode()
    {
    	dd('daisebel');
        // $exitCode = Artisan::call('up');
        // if ($exitCode === 0) {
        //     Session::set('_disable-maintenance-mode', trans('canvas::messages.disable_maintenance_mode_success'));
        // } else {
        //     Session::set('_disable-maintenance-mode', trans('canvas::messages.disable_maintenance_mode_error'));
        // }

        // return redirect()->route('canvas.admin.tools');
    }
}
