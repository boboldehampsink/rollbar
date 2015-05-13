<?php

namespace Craft;

class RollbarVariable
{
    private $settings;

    public function __construct()
    {
        $this->settings = craft()->plugins->getPlugin('rollbar')->getSettings();
    }

    public function clientAccessToken()
    {
        return $this->settings->getAttribute('clientAccessToken');
    }

    public function reportInDevMode()
    {
        return $this->settings->getAttribute('reportInDevMode');
    }
}
