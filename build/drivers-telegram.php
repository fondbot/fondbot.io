<?php

use Sami\Sami;
use Sami\RemoteRepository\GitHubRemoteRepository;
use Sami\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in($dir = '../../drivers-telegram/src')
;

// generate documentation for all v2.0.* tags, the 2.0 branch, and the master one
$versions = GitVersionCollection::create($dir)
    ->add('master');
;

return new Sami($iterator, array(
    'theme'                => 'default',
    'versions'             => $versions,
    'title'                => 'FondBot: Telegram Driver API',
    'build_dir'            => __DIR__.'/build/drivers-telegram/%version%',
    'cache_dir'            => __DIR__.'/cache/drivers-telegram/%version%',
    'remote_repository'    => new GitHubRemoteRepository('fondbot/drivers-telegram', dirname($dir)),
    'default_opened_level' => 2,
));