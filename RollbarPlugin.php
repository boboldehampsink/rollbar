<?php

namespace Craft;

/**
 * Rollbar Plugin.
 *
 * Integrates Rollbar into Craft
 *
 * @author    Bob Olde Hampsink <b.oldehampsink@itmundi.nl>
 * @copyright Copyright (c) 2015, Bob Olde Hampsink
 * @license   http://buildwithcraft.com/license Craft License Agreement
 *
 * @link      http://github.com/boboldehampsink
 * @since     1.0
 */
class RollbarPlugin extends BasePlugin
{
    /**
     * Get plugin name.
     *
     * @return string
     */
    public function getName()
    {
        return Craft::t('Rollbar');
    }

    /**
     * Get plugin version.
     *
     * @return string
     */
    public function getVersion()
    {
        return '1.4.1';
    }

    /**
     * Get plugin developer.
     *
     * @return string
     */
    public function getDeveloper()
    {
        return 'Bob Olde Hampsink';
    }

    /**
     * Get plugin developer url.
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://github.com/boboldehampsink';
    }

    /**
     * Initialize Rollbar.
     */
    public function init()
    {
        // Require Rollbar vendor code
        require_once __DIR__.'/vendor/autoload.php';

        // Initialize Rollbar
        \Rollbar::init(array(
            'access_token'  => craft()->config->get('accessToken', 'rollbar'),
            'environment'   => CRAFT_ENVIRONMENT,
        ), false, false);

        // Log Craft Exceptions to Rollbar
        craft()->onException = function ($event) {
            \Rollbar::report_exception($event->exception);
        };

        // Log Craft Errors to Rollbar
        craft()->onError = function ($event) {
            \Rollbar::report_message($event->message);
        };
    }
}
