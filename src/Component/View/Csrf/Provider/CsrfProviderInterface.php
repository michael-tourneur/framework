<?php

namespace Pagekit\Component\View\Csrf\Provider;

interface CsrfProviderInterface
{
    /**
     * Generates a CSRF token.
     */
    public function generate();

    /**
     * Validates a CSRF token.
     *
     * @param  string $token
     * @return bool
     */
    public function validate($token);
}
