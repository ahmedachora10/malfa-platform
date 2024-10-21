<?php

namespace Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Services\UploadFileService;
use Illuminate\Http\UploadedFile;


class SettingController extends Controller
{
    public function __construct(protected UploadFileService $uploadFileService) {}

    public function index(string $locale, $section = '')
    {
        $settings = config('dashboard-settings', []);

        if (count($settings) < 1 )
            return redirect()->route('dashboard');

        $section = str($section)->replace('-', ' ')->value();

        if ($section === '' || !isset($settings[$section]))
            return redirect()->route('settings.index', 'app');

        $settings = $settings[$section];

        return view('dashboard::settings.index', compact('settings'));
    }

    public function store(Request $request, string $locale)
    {
        $rules = Setting::getValidationRules();
        $data = $request->validate($rules, $request->all());

        $validSettings = array_keys($rules);

        foreach ($data as $key => $val) {
            if (in_array($key, $validSettings)) {
                if($val instanceof UploadedFile) {
                    $fullPath = 'storage/'. $this->uploadFileService->update($val, '', 'images/logo');
                    $val = $fullPath;
                }

                Setting::add($key, $val, Setting::getDataType($key));
            }
        }

        return redirect()->back()->with('status', 'Settings has been saved.');
    }
}
