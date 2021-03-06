<?php

namespace luya\console;

use Yii;
use yii\helpers\Console;
use yii\console\Exception;
use luya\traits\ApplicationTrait;

/**
 * Console/CLI Application.
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class Application extends \yii\console\Application
{
    use ApplicationTrait;

    /**
     * @var bool Mute the Applications ouput, this is used to make application
     * cli tests with no output. The `luya\console\Controller` output/print methods are listening
     * to this property.
     */
    public $mute = false;

    /**
     * Provides an array with all LUYA core commands.
     *
     * Instead of overriding the core command application and merged the value we directly copied them.
     *
     * @see \yii\console\Application::coreCommands()
     */
    public function coreCommands()
    {
        return [
            // yii default commands
            'asset' => 'yii\console\controllers\AssetController',
            'cache' => 'yii\console\controllers\CacheController',
            'fixture' => 'yii\console\controllers\FixtureController',
            'help' => 'yii\console\controllers\HelpController',
            'message' => 'yii\console\controllers\MessageController',
            'serve' => 'yii\console\controllers\ServeController',
            // luya default commands
            'migrate' => 'luya\console\commands\MigrateController',
            'crud' => 'luya\console\commands\CrudController',
            'module' => 'luya\console\commands\ModuleController',
            'import' => 'luya\console\commands\ImportController',
            'health' => 'luya\console\commands\HealthController',
            'aw' => 'luya\console\commands\ActiveWindowController',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function coreComponents()
    {
        return array_merge($this->luyaCoreComponents(), [
            'errorHandler' => ['class' => 'luya\console\ErrorHandler'],
        ]);
    }
}
