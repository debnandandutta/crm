<?php

namespace Nio\LaravelInstaller\Helpers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

class EnvironmentManager
{
    /**
     * @var string
     */
    private $envPath;

    /**
     * @var string
     */
    private $envExamplePath;

    /**
     * Set the .env and .env.example paths.
     */
    public function __construct()
    {
        $this->envPath = base_path('.env');
        $this->envExamplePath = base_path('.env.example');
    }

    /**
     * Get the content of the .env file.
     *
     * @return string
     */
    public function getEnvContent()
    {
        if (! file_exists($this->envPath)) {
            if (file_exists($this->envExamplePath)) {
                copy($this->envExamplePath, $this->envPath);
            } else {
                touch($this->envPath);
            }
        }

        return file_get_contents($this->envPath);
    }

    /**
     * Get the the .env file path.
     *
     * @return string
     */
    public function getEnvPath()
    {
        return $this->envPath;
    }

    /**
     * Get the the .env.example file path.
     *
     * @return string
     */
    public function getEnvExamplePath()
    {
        return $this->envExamplePath;
    }

    public function checkIsEnvFileWritable()
    {
        return is_writable( $this->getEnvPath() );
    }

    /**
     * Save the edited content to the .env file.
     *
     * @param Request $input
     * @return string
     */
    public function saveFileClassic(Request $input)
    {
        $message = trans('installer_messages.environment.success');

        try {
            file_put_contents($this->envPath, $input->get('envConfig'));
        } catch (Exception $e) {
            $message = trans('installer_messages.environment.errors');
        }

        return $message;
    }

    /**
     * Save the form content to the .env file.
     *
     * @param Request $request
     * @return string
     */
    public function saveFileWizard(Request $request)
    {
        $results = trans('installer_messages.environment.success');

        $envFileData = $this->fileData($request);

        try {
            file_put_contents($this->envPath, $envFileData);
        } catch (Exception $e) {
            $results = trans('installer_messages.environment.errors');
        }

        return $results;
    }

    

    /**
     * Get content of the .env file.
     *
     * @param Request $request
     * @return string
     */
    public function fileData(Request $request)
    {
        $key = $this->getNewKey();
        $data = 
            //'APP_NAME=' . 'Laravel' . "\n" .
        //'APP_DEBUG=' . 'true' . "\n" .
        //'APP_LOG_LEVEL=' . $request->app_log_level . "\n" .
        //'APP_URL=' . 'http://localhost' . "\n\n" .
        'DB_CONNECTION=' . 'mysql' . "\n" .
        'DB_HOST=' . '127.0.0.1' . "\n" .
        'DB_PORT=' . $request->database_port . "\n" .
        'DB_DATABASE=' . $request->database_name . "\n" .
        'DB_USERNAME=' . $request->database_username . "\n" .
        'DB_PASSWORD=' . $request->database_password . "\n\n".
        'APP_ENV=' . 'local' . "\n" .
        'APP_KEY=' . 'base64:Z9tNUxHCN4q9NfvbYi+L68M2kZXjZ5YXLlezJ46sz6c=' . "\n" ;

        /*
'BROADCAST_DRIVER=' . 'log' . "\n" .
        'CACHE_DRIVER=' . 'file' . "\n" .
        'SESSION_DRIVER=' . 'file' . "\n" .
        'SESSION_LIFETIME=' . '120' . "\n".
        'QUEUE_DRIVER=' . 'sync' . "\n"
        'REDIS_HOST=' . $request->redis_hostname . "\n" .
        'REDIS_PASSWORD=' . $request->redis_password . "\n" .
        'REDIS_PORT=' . $request->redis_port . "\n\n" .
        'MAIL_DRIVER=' . $request->mail_driver . "\n" .
        'MAIL_HOST=' . $request->mail_host . "\n" .
        'MAIL_PORT=' . $request->mail_port . "\n" .
        'MAIL_USERNAME=' . $request->mail_username . "\n" .
        'MAIL_PASSWORD=' . $request->mail_password . "\n" .
        'MAIL_ENCRYPTION=' . $request->mail_encryption . "\n\n" .
        'PUSHER_APP_ID=' . $request->pusher_app_id . "\n" .
        'PUSHER_APP_KEY=' . $request->pusher_app_key . "\n" .
        'PUSHER_APP_SECRET=' . $request->pusher_app_secret;*/

        return $data;
    }
    /**
     * Generate a new Application Key
     *
     * @param Request $request
     * @return string
     */
    public function getNewKey()
    {
        $outputLog = new BufferedOutput();
        Artisan::call('key:generate', ["--show"=> true], $outputLog);
        return $outputLog->fetch();
    }
}
