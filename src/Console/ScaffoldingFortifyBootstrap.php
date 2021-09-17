<?php

namespace DavideCariola\ScaffoldingFortifyBootstrap\Console;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ScaffoldingFortifyBootstrap extends Command{

    protected $signature = 'sfb:install';
    protected $description = 'Creazione di uno scaffolding completo di Laravel Fortify e Bootstrap 5';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $this->call('vendor:publish', [
            '--provider' => 'DavideCariola\ScaffoldingFortifyBootstrap\ScaffoldingFortifyBootstrapServiceProvider',
            '--tag' => 'views',
            '--force' => 'true'
        ]);

        $this->call('vendor:publish', [
            '--provider' => 'DavideCariola\ScaffoldingFortifyBootstrap\ScaffoldingFortifyBootstrapServiceProvider',
            '--tag' => 'welcome',
            '--force' => 'true'
        ]);

        $this->call('vendor:publish', [
            '--provider' => 'DavideCariola\ScaffoldingFortifyBootstrap\ScaffoldingFortifyBootstrapServiceProvider',
            '--tag' => 'js',
            '--force' => 'true'
        ]);

        $this->call('vendor:publish', [
            '--provider' => 'DavideCariola\ScaffoldingFortifyBootstrap\ScaffoldingFortifyBootstrapServiceProvider',
            '--tag' => 'css',
            '--force' => 'true'
        ]);


        $this->executeCommand('npm install bootstrap', base_path());
        $this->executeCommand('npm install @popperjs/core', base_path());
        $this->executeCommand('npm install && npm run dev', base_path());
    }


    protected function executeCommand($command, $path)
    {
        $process = (Process::fromShellCommandline($command, $path))->setTimeout(null);

        if ('\\' !== DIRECTORY_SEPARATOR && file_exists('/dev/tty') && is_readable('/dev/tty')) {
            $process->setTty(true);
        }

        $process->run(function ($type, $line) {
            $this->output->write($line);
        });
    }
}