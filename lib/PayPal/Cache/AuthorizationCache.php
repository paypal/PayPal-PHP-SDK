<?php

namespace PayPal\Cache;

use PayPal\Core\PPConfigManager;
use PayPal\Validation\JsonValidator;

abstract class AuthorizationCache
{
    public static $CACHE_PATH = '/../../../var/auth.cache';

    /**
     * A pull method which would read the persisted data based on clientId.
     * If clientId is not provided, an array with all the tokens would be passed.
     *
     * @param array|null $config
     * @param string $clientId
     * @return mixed|null
     */
    public static function pull($config = null, $clientId = null)
    {
        // Return if not enabled
        if (!self::isEnabled($config)) { return null; }

        $tokens = null;
        $cachePath = self::cachePath($config);
        if (file_exists($cachePath)) {
            // Read from the file
            $cachedToken = file_get_contents($cachePath);
            if ($cachedToken && JsonValidator::validate($cachedToken, true)) {
                $tokens = json_decode($cachedToken, true);
                if ($clientId && is_array($tokens) && array_key_exists($clientId, $tokens)) {
                    // If client Id is found, just send in that data only
                    return $tokens[$clientId];
                } else if ($clientId) {
                    // If client Id is provided, but no key in persisted data found matching it.
                    return null;
                }
            }
        }
        return $tokens;
    }

    /**
     * Persists the data into a cache file provided in $CACHE_PATH
     *
     * @param array|null $config
     * @param      $clientId
     * @param      $accessToken
     * @param      $tokenCreateTime
     * @param      $tokenExpiresIn
     */
    public static function push($config = null, $clientId, $accessToken, $tokenCreateTime, $tokenExpiresIn)
    {
        // Return if not enabled
        if (!self::isEnabled($config)) { return; }

        $cachePath = self::cachePath($config);
        if (!is_dir(dirname($cachePath))) {
            if (mkdir(dirname($cachePath), 0755, true) == false) {
                return;
            }
        }

        // Reads all the existing persisted data
        $tokens = self::pull();
        $tokens = $tokens ? $tokens : array();
        if (is_array($tokens)) {
            $tokens[$clientId] = array(
                'clientId' => $clientId,
                'accessToken' => $accessToken,
                'tokenCreateTime' => $tokenCreateTime,
                'tokenExpiresIn' => $tokenExpiresIn
            );
        }
        file_put_contents($cachePath, json_encode($tokens));
    }

    /**
     * Determines from the Configuration if caching is currently enabled/disabled
     *
     * @param $config
     * @return bool
     */
    public static function isEnabled($config)
    {
        $config = ($config && is_array($config)) ? $config : PPConfigManager::getInstance()->getConfigHashmap();
        if (array_key_exists("cache.enabled", $config)) {
            $value = $config['cache.enabled'];
            return (trim($value) == true || trim($value) == 'true') ?  true : false;
        }
        return false;
    }
    
    /**
     * Returns the cache file path
     *
     * @param $config
     * @return string
     */
    public static function cachePath($config)
    {
        $config = ($config && is_array($config)) ? $config : PPConfigManager::getInstance()->getConfigHashmap();
        $cachePath = (array_key_exists("cache.FileName", $config)) ? trim($config['cache.FileName']) : null;
        return empty($cachePath) ? __DIR__ . self::$CACHE_PATH : $cachePath;
    }


}
