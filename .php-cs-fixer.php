<?php

$finder = PhpCsFixer\Finder::create()
    ->in([__DIR__.'/app', __DIR__.'/database', __DIR__.'/tests'])
    ->name('*.php');

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'no_unused_imports' => true,
        'single_quote' => true,
        'binary_operator_spaces' => ['default' => 'align_single_space_minimal'],
    ])
    ->setFinder($finder);
