<?php

$config = (new PhpCsFixer\Config())
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect());

return $config->setRules([
    '@Symfony' => true,
    'array_syntax' => ['syntax' => 'short'],
    'ordered_imports' => true,
    'no_unused_imports' => true,
])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in([
                __DIR__ . '/examples',
                __DIR__ . '/lib/src',
                __DIR__ . '/lib/api',
                __DIR__ . '/test',
            ])
            ->name('*.php')
    );
