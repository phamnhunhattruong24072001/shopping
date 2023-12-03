<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name} {--class=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $modelName = $this->option('class');

        $repositoryName = Str::studly($name) . 'Repository';
        $repositoryInterfaceName = $repositoryName . 'Interface';

        $filesystem = new Filesystem();
        $basePath = app_path('Repositories');
        $filePathRepository = $basePath . '/Eloquent/' . $repositoryName . '.php';
        $filePathInterface = $basePath . '/Interface/' . $repositoryInterfaceName . '.php';

        if ($filesystem->exists($filePathRepository) && $filesystem->exists($filePathInterface)) {
            $this->error('Repository already exists!');
            return Command::FAILURE;
        }

        $stubRepository = $filesystem->get(__DIR__ . '/Stubs/repository.stub');
        $stubRepository = str_replace('{{repositoryName}}', $repositoryName, $stubRepository);
        $stubRepository = str_replace('{{modelName}}', $modelName, $stubRepository);

        $filesystem->ensureDirectoryExists($basePath);
        $filesystem->put($filePathRepository, $stubRepository);

        $stubInterface = $filesystem->get(__DIR__ . '/Stubs/repositoryInterface.stub');
        $stubInterface = str_replace('{{repositoryName}}', $repositoryInterfaceName, $stubInterface);

        $filesystem->ensureDirectoryExists($basePath);
        $filesystem->put($filePathInterface, $stubInterface);

        $this->info('Repository created successfully!');
        return Command::SUCCESS;
    }
}
