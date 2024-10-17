<?php

use App\Models\Setting;

if (! function_exists('setting')) {
    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new Setting();
        }

        if (is_array($key)) {
            return Setting::set($key[0], $key[1]);
        }

        $value = app('settings')->firstWhere('name', $key);

        return is_null($value) ? value($default) : Setting::castValue($value->val, $value->type);
    }
}

if(!function_exists('ar_slug')) {

    function ar_slug(string $string, string $separator = '-') {
        if (is_null($string)) {
            return "";
        }

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }

}


if(!function_exists('short_date_name')) {

    function short_date_name(string $date) {
        $replacement = [
            'دقيقة' =>  'د',
            'دقائق' =>  'د',
            'ساعة' =>  'س',
            'يوم' =>  'ي',
            'أيام' =>  'ي',
            'شهر' =>  'ش',
            'سنة' =>  'ع',
        ];

        return str($date)->replace('منذ', '')->replace(array_keys($replacement), array_values($replacement));
    }
}