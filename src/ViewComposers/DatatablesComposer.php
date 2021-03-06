<?php

namespace Sebastienheyd\Boilerplate\ViewComposers;

use Illuminate\View\View;

class DatatablesComposer
{
    /**
     * Called when view load/datatables.blade.php is called.
     * This is defined in BoilerPlateServiceProvider.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $languages = [
            'en'    => 'English',
            'fr'    => 'French'
        ];

        $locale = config('app.locale');

        $view->with('locale', isset($languages[ $locale ]) ? $languages[ $locale ] : 'English');
    }
}