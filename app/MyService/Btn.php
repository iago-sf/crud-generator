<?php

namespace App\MyService;

class Btn 
{
    public function a($url, $text = null)
    {
        return view('btn.a', [
            'url' => url($url),
            'text' => is_null($text) ? $url : $text,
        ]);
    }

    public function styled_a($url, $text = null, $classes = null)
    {
        $class = '';

        if(!is_null($classes))
        {
            foreach($classes as $e)
            {
                $class = $class . $e . ' ';
            }
        }

        return view('btn.styled_a', [
            'url' => url($url),
            'text' => is_null($text) ? $url : $text,
            'classes' => $class,
        ]);
    }
}