<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        $name = $this->argument('name');
        $serviceName = Str::afterLast($name, '/');
        $serviceName = Str::ucfirst($serviceName);

        $servicePath = Str::replaceLast($serviceName, '', $name);
        $servicePath = Str::replaceLast('/', '', $servicePath);

        $servicePathName = Str::studly($name);

        $filesystem = new Filesystem();
        $basePath = app_path('Services');
        $filePathService = $basePath . Str::start($servicePathName, '/') . '.php';

        if ($filesystem->exists($filePathService)) {
            $this->error('Service already exists!');
            return Command::FAILURE;
        }

        $stubService = $filesystem->get(__DIR__ . '/Stubs/Services/service.stub');
        $stubService = str_replace('{{serviceName}}', $serviceName, $stubService);
        $stubService = str_replace('{{servicePath}}', $servicePath, $stubService);

        $filesystem->ensureDirectoryExists($basePath);
        $filesystem->put($filePathService, $stubService);

        $this->info('Service created successfully!');

        return Command::SUCCESS;
    }
}
