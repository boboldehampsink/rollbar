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
        return '1.3.1';
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
     * Define plugin settings.
     *
     * @return array
     */
    protected function defineSettings()
    {
        return array(
            'accessToken'      => AttributeType::String,
            'clientAccessToken' =>  AttributeType::String,
            'reportInDevMode'  => AttributeType::Bool,
        );
    }

    /**
     * Get settings template.
     *
     * @return string
     */
    public function getSettingsHtml()
    {
        return craft()->templates->render('rollbar/_settings', array(
           'settings' => $this->getSettings(),
        ));
    }

    /**
     * Initialize Rollbar.
     */
    public function init()
    {
        // Get plugin settings
        $settings = $this->getSettings();

        // See if we have to report in devMode
        if (!$settings->reportInDevMode && craft()->config->get('devMode')) {
            return;
        }

        // Require Rollbar vendor code
        require_once CRAFT_PLUGINS_PATH.'rollbar/vendor/autoload.php';

        // Initialize Rollbar
        $rollbar = \Rollbar::init(array(
            'access_token'  => $settings->accessToken,
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
