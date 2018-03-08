<?php
/* How to setup custom helpers (best practice)
1.Within your app/Http directory, create a helpers.php file and add your functions.
2.Within composer.json, in the autoload block, add "files": ["app/Http/helpers.php"].
3.Run composer dump-autoload.
*/
//example method in helpers
if (! function_exists('ucapan_mampu')) {
    function ucapan_mampu()
    {
        return "Selamat datang ke mampu";
    }
}

/*
 * Set selected on select input
 *
 * @param mixed $firstArgument
 * @param mixed $secondArgument
 * @return string
 */
if (!function_exists('set_selected')) {
    function set_selected($firstArgument, $secondArgument)
    {
        if ($firstArgument == $secondArgument) {
            return 'selected';
        }
        return null;
    }
}

if (! function_exists('get_categories')) {
    function get_categories()
    {
        return App\Category::get();
    }
}
