<?php

namespace Nio\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Nio\LaravelInstaller\Helpers\DatabaseManager;
use Artisan;

class DatabaseController extends Controller
{
    /**
     * @var DatabaseManager
     */
    private $databaseManager;

    /**
     * @param DatabaseManager $databaseManager
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    /**
     * Migrate and seed the database.
     *
     * @return \Illuminate\View\View
     */
    public function database()
    {
        if ( ! $this->checkDatabaseConnection() ){
            return redirect()->route('LaravelInstaller::environmentWizard')->withInput()->withErrors([
                'database_connection' => trans('installer_messages.environment.wizard.form.db_connection_failed'),
            ]);
        }
        $response = $this->databaseManager->migrateAndSeed();

        $success = \File::move(storage_path('index.php'),base_path('public/index.php'));
        $success = \File::move(storage_path('devstar.php'),base_path('config/devstar.php'));
        session()->forget('envConfigData');
        Artisan::call('storage:link'); //php artisan storage:link
        //Artisan::call('cache:clear');
        //Artisan::call('config:clear');
        //Artisan::call('view:clear');

        return redirect()->route('LaravelInstaller::final')
                         ->with(['message' => $response]);
    }

    public function checkDatabaseConnection()
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
