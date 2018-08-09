<?php

use Sami\Sami;
use Sami\RemoteRepository\GitHubRemoteRepository;
use Sami\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in($dir = __DIR__ . '/repositories/framework/src');

// generate documentation for all v2.0.* tags, the 2.0 branch, and the master one
$versions = GitVersionCollection::create($dir)
    ->add('3.0', 'v3.0')
    ->add('master', 'v3.1-dev');;

return new Sami($iterator, array(
    'theme' => 'default',
    'versions' => $versions,
    'title' => 'FondBot API',
    'build_dir' => __DIR__ . '/build/framework/%version%',
    'cache_dir' => __DIR__ . '/cache/framework/%version%',
    'remote_repository' => new GitHubRemoteRepository('fondbot/framework', dirname($dir)),
    'default_opened_level' => 2,
));