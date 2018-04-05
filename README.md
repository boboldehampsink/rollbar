DEPRECATED - Rollbar plugin for Craft CMS
=================

Plugin that allows you to log Craft Errors/Exceptions to Rollbar.

__Important__  
The plugin's folder should be named "rollbar"

Deprecated
=================

With the release of Craft 3 on 4-4-2018, this plugin has been deprecated. You can still use this with Craft 2 but you are encouraged to use (and develop) a Craft 3 version. At this moment, I have no plans to do so.


Features
=================
 - Log Craft Errors/Exceptions to Rollbar
 - Keep Rollbar access token in your config settings
 - Logs the environment you're working on
 - Integrates seamlessly, one click install

Getting started
=================
 - Create a rollbar.php file in craft/config/
 - Set your rollbar config variables in there

Example:
```php
<?php
return array(
    'accessToken' => '123456789'
    'clientToken' => '123456789'
);
?>
```

If you want to get your client token in the templates, just use
`craft.config.get('clientToken', 'rollbar')`

Changelog
=================
### 1.5.3
 - Updated Rollbar to 1.3.1

### 1.5.2
 - Now reports full PHP error message

### 1.5.1
 - Updated Rollbar to 1.2.0

### 1.5.0
 - Don't report 404 errors (thanks to @bossanova808)
 - Updated Rollbar to 1.0.1

### 1.4.2
 - Updated Rollbar to 0.18.2

### 1.4.1
 - Updated Rollbar to 0.16.0

### 1.4.0
 - Moved settings to config file
 - Updated Rollbar to 0.15.0

### 1.3.1
 - Updated Rollbar to 0.11.2

### 1.3.0
 - Added client key setting and variables (thanks to russback)
 - Added a MIT license

### 1.2.0
 - Added a switch to disable reporting in devMode
 - Updated Rollbar PHP API to 0.11.0

### 1.1.1
 - Updated Rollbar PHP API to 0.10.0

### 1.1
 - Rollbar now logs your Craft environment
 - Rollbar is now not exclusive to devMode anymore

### 1.0
 - Initial push to GitHub
