<?php

$config = (new PhpCsFixer\Config())
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect());

return $config->setRules([
    '@Symfony' => true,
])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude('test')
            ->in('lib/src')
    );
