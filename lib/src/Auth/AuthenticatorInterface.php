<?php

namespace Sedo\SedoTMP\Auth;

use Symfony\Component\Cache\Adapter\AdapterInterface;

interface AuthenticatorInterface
{
    /**
     * Get a valid access token for API authentication.
     *
     * @return string The access token
     */
    public function getAccessToken(): string;

    /**
     * Set the cache adapter to use for token caching.
     *
     * @param AdapterInterface $cache The cache adapter
     */
    public function setCache(AdapterInterface $cache): void;

    /**
     * Get the current cache adapter.
     *
     * @return AdapterInterface|null The cache adapter or null if not set
     */
    public function getCache(): ?AdapterInterface;
}
