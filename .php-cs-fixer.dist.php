<?php

$excludes = [
    'bootstrap/cache',
    'node_modules',
    'public',
    'reports',
    'storage',
    'vendor',
];

$finder = PhpCsFixer\Finder::create()
    ->exclude($excludes)
    ->notName('README.md')
    ->notName('*.blade.php')
    ->notName('*.xml')
    ->notName('*.yml')
    ->notName('*.json')
    ->notName('artisan')
    ->notName('composer.lock')
    ->notName('package-lock.json')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->in(
        [
            __DIR__ . '/app',
            __DIR__ . '/config',
            __DIR__ . '/database',
            __DIR__ . '/resources',
            __DIR__ . '/routes',
            __DIR__ . '/tests',
        ]
    );

$config = new PhpCsFixer\Config();

return $config
    ->setRules(
        [
            'psr_autoloading' => false,
            '@PSR2' => true,
            'blank_line_after_namespace' => true,
            'blank_line_before_statement' => [
                'statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try'],
            ],
            'strict_param' => false,
            'array_syntax' => ['syntax' => 'short'],
            'ordered_imports' => ['sort_algorithm' => 'alpha'],
            'no_unused_imports' => true,
            'braces' => [
                'allow_single_line_closure' => true,
                'position_after_functions_and_oop_constructs' => 'next',
                'position_after_anonymous_constructs' => 'same',
                'position_after_control_structures' => 'same',
            ],
            'class_definition' => true,
            'elseif' => true,
            'function_declaration' => true,
            'indentation_type' => true,
            'line_ending' => true,
            'constant_case' => true,
            'lowercase_keywords' => true,
            'method_argument_space' => ['keep_multiple_spaces_after_comma' => true],
            'no_break_comment' => true,
            'no_closing_tag' => true,
            'no_spaces_after_function_name' => true,
            'no_spaces_inside_parenthesis' => true,
            'no_trailing_whitespace' => true,
            'no_trailing_whitespace_in_comment' => true,
            'single_blank_line_at_eof' => true,
            'single_class_element_per_statement' => [
                'elements' => ['property'],
            ],
            'single_import_per_statement' => true,
            'single_line_after_imports' => true,
            'switch_case_semicolon_to_colon' => true,
            'switch_case_space' => true,
            'visibility_required' => true,
            'encoding' => true,
            'full_opening_tag' => true,
            'phpdoc_align' => ['align' => 'left',],
        ]
    )
    ->setFinder($finder)
    ->setLineEnding("\n")
    ->setUsingCache(true)
    ->setRiskyAllowed(true);
