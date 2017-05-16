Rollbar plugin for Craft CMS
=================

Plugin that allows you to log Craft Errors/Exceptions to Rollbar.

__Important__  
The plugin's folder should be named "rollbar"

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
