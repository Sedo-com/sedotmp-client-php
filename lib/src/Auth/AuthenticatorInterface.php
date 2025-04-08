<?php

namespace Sedo\Auth;

use Sedo\Configuration;

interface AuthenticatorInterface
{
    /**
     * Get a valid access token for API authentication.
     *
     * @return string The access token
     */
    public function getAccessToken(): string;

    /**
     * Retrieves the configuration settings.
     *
     * @return Configuration the configuration instance
     */
    public function getConfig(): Configuration;
}
