<?php

namespace Craft;

/**
 * Rollbar Variable.
 *
 * Lets you use Rollbar in templates
 *
 * @author    Bob Olde Hampsink <b.oldehampsink@itmundi.nl>
 * @copyright Copyright (c) 2015, Bob Olde Hampsink
 * @license   http://buildwithcraft.com/license Craft License Agreement
 *
 * @link      http://github.com/boboldehampsink
 * @since     1.1
 */
class RollbarVariable
{
    /**
     * Settings.
     *
     * @var object
     */
    private $_settings;

    /**
     * Constructor.
     *
     * Gets plugin settings for internal use.
     */
    public function __construct()
    {
        $this->_settings = craft()->plugins->getPlugin('rollbar')->getSettings();
    }

    /**
     * Returns Client Access Token.
     *
     * @return string
     */
    public function clientAccessToken()
    {
        return $this->_settings->getAttribute('clientAccessToken');
    }

    /**
     * Returns Reporting in devMode.
     *
     * @return string
     */
    public function reportInDevMode()
    {
        return $this->_settings->getAttribute('reportInDevMode');
    }
}
