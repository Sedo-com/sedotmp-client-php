<?php

namespace Sedo\Auth;

interface AuthenticatorInterface
{
    /**
     * Get a valid access token for API authentication
     *
     * @return string The access token
     */
    public function getAccessToken(): string;
}
