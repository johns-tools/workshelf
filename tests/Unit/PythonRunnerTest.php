<?php

use App\Services\PythonRunner;
use Illuminate\Support\Facades\Facade;
use Illuminate\Container\Container;

class FakeDisk
{
    public function __construct(private array $files = []) {}

    public function exists(string $path): bool
    {
        return array_key_exists($path, $this->files);
    }

    public function path(string $path): string
    {
        return $this->files[$path] ?? $path;
    }
}

class FakeFilesystemManager
{
    public function __construct(private array $files = []) {}

    public function disk(string $name)
    {
        return new FakeDisk($this->files);
    }
}

it('throws when python directory is missing', function () {
    $container = new Container();
    $container->instance('filesystem', new FakeFilesystemManager([]));
    Facade::setFacadeApplication($container);

    $runner = new PythonRunner();

    expect(fn() => $runner->run('test.py'))
        ->toThrow(RuntimeException::class, 'Missing python directory');
});

it('throws when PYTHON_NAME env is not set', function () {
    $files = [
        'python' => '/tmp',
        'python/test.py' => '/tmp/test.py',
    ];

    $container = new Container();
    $container->instance('filesystem', new FakeFilesystemManager($files));
    Facade::setFacadeApplication($container);

    putenv('PYTHON_NAME');

    $runner = new PythonRunner();

    expect(fn() => $runner->run('test.py'))
        ->toThrow(Exception::class);
});
