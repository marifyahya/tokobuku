<?php
/*
 * Method to load css files into your project.
 * @param array $css
 */
if ( ! function_exists('load_css'))
{
    function load_css($css)
    {
        if ( ! is_array($css))
        {
            $css = (array) $css;
        }

        $return = '';
        foreach ($css as $c)
        {
            $filemtimeCSS = filemtime('public/' . $c . '.css');
            $return .= '<link rel="stylesheet" href="' . base_url() . 'public/' . $c . '.css?v=' . $filemtimeCSS . '"/>' . "\n";
        }
        return $return;
    }
}

/*
 * Method to load javascript files into your project.
 * @param array $js
 */
if ( ! function_exists('load_js'))
{
    function load_js($js)
    {
        if ( ! is_array($js))
        {
            $js = (array) $js;
        }

        $return = '';
        foreach ($js as $j)
        {
            $filemtimeJS = filemtime('public/' . $j . '.js');
            $return .= '<script type="text/javascript" src="' . base_url() . 'public/' . $j . '.js?v=' . $filemtimeJS . '"></script>' . "\n";
        }
        return $return;
    }

}