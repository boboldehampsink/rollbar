<pre>
<?php
require 'rollbar.php';

class EchoLogger {
    public function log($level, $message) {
        echo "[Rollbar] $level $message\n";
    }
}

function throw_test_exception($val) {
    throw new Exception("other test exception");
}

function get_current_person() {
    return array('id' => 2, 'username' => 'brian2');
}

function main() {
    $config = array(
        // access token for rollbar.com/rollbar/rollbar-php, a public project
        'access_token' => 'ad865e76e7fb496fab096ac07b1dbabb',
        'environment' => 'test',
        'root' => '/Users/brian/www/rollbar-php',
        //'base_api_url' => 'http://brian.rollbardev.com/api/1/',
        'logger' => new EchoLogger(),
        'error_sample_rates' => array(
            E_NOTICE => 0.5,
            E_USER_ERROR => 1,
            E_USER_NOTICE => 0.5
        ),
        /*'person' => array(
            'idgarbage' => '1',
            'username' => 'brian',
            'email' => 'brianrue@gmail.com'
        ),*/
        'person_fn' => 'get_current_person',
        'included_errno' => E_USER_ERROR | E_USER_NOTICE
    );
    // $config, $set_exception_handler, $set_error_handler
    Rollbar::init($config, true, true);
    
    try {
        throw_test_exception("yo");
    } catch (Exception $e) {
        Rollbar::report_exception($e);
    }

    Rollbar::report_message("hey there", "info");
    Rollbar::report_message("hey there", "info", array("extra" => "data"),
                            array("fingerprint" => "test fingerprint", "title" => "test title"));
    
    trigger_error("test user warning", E_USER_WARNING);
    trigger_error("test user notice", E_USER_NOTICE);
    trigger_error("test user error", E_USER_ERROR);
    
    // raises an E_NOTICE, reported by the error handler
    $foo = $bar2;

    // reported by the exception handler
    throw new Exception("uncaught exception");
}

main();

?>
</pre>
