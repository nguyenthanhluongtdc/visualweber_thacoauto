<?php

namespace Platform\Language\Listeners;

use Platform\Setting\Repositories\Interfaces\SettingInterface;
use Platform\Theme\Events\ThemeRemoveEvent;
use Platform\Widget\Repositories\Interfaces\WidgetInterface;
use Exception;
use Language;

class ThemeRemoveListener
{

    /**
     * Handle the event.
     *
     * @param ThemeRemoveEvent $event
     * @return void
     */
    public function handle(ThemeRemoveEvent $event)
    {
        try {
            $languages = Language::getActiveLanguage(['lang_code']);

            foreach ($languages as $language) {
                app(WidgetInterface::class)->deleteBy(['theme' => $event->theme . '-' . $language->lang_code]);

                app(SettingInterface::class)
                    ->deleteBy(['key', 'like', 'theme-' . $event->theme . '-' . $language->lang_code . '-%']);
            }

        } catch (Exception $exception) {
            info($exception->getMessage());
        }
    }
}
