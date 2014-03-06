<?php

use Pagekit\Component\Translation\TranslationServiceProvider;

if (!function_exists('__')) {

    /**
     * Translates the given message, alias for method trans()
     */
    function __($id, array $parameters = array(), $domain = 'messages', $locale = null) {
        return TranslationServiceProvider::$translator->trans($id, $parameters, $domain, $locale);
    }
}

if (!function_exists('_c')) {

    /**
     * Translates the given choice message by choosing a translation according to a number, alias for method transChoice()
     */
    function _c($id, $number, array $parameters = array(), $domain = null, $locale = null) {
        return TranslationServiceProvider::$translator->transChoice($id, $number, $parameters, $domain, $locale);
    }
}
