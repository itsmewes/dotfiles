<?php

declare(strict_types=1);

ini_set('memory_limit', '512M');

$finder = PhpCsFixer\Finder::create()
    ->ignoreVCSIgnored(true)
    ->in([
        // Laravel code
       '/Users/wesleymartin/Code/carandclassic/laravel/app/',
       '/Users/wesleymartin/Code/carandclassic/laravel/config/',
       '/Users/wesleymartin/Code/carandclassic/laravel/database/',
       '/Users/wesleymartin/Code/carandclassic/laravel/resources/lang/',
       '/Users/wesleymartin/Code/carandclassic/laravel/routes/',
       '/Users/wesleymartin/Code/carandclassic/laravel/tests/',
        // Nova components
       '/Users/wesleymartin/Code/carandclassic/laravel/nova-components/*/src',
        // Legacy code
       '/Users/wesleymartin/Code/carandclassic/laravel/../cron/php/',
       '/Users/wesleymartin/Code/carandclassic/laravel/../htdocs/',
       '/Users/wesleymartin/Code/carandclassic/laravel/../src/',
    ]);

$config = new PhpCsFixer\Config('Car and Classic');

return $config
    ->setFinder($finder)
    ->setUsingCache(true)
    ->setCacheFile(__DIR__ . '/.php-cs-fixer.cache')
    ->setRiskyAllowed(true)
    ->setRules([
        // https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst
        '@PSR12' => true,

        // Alias (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#alias)
        'no_alias_functions' => ['sets' => ['@all']], // risky
        'no_alias_language_construct_call' => true,
        'no_mixed_echo_print' => true,

        // Array Notation (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#array-notation)
        'array_syntax' => ['syntax' => 'short'],
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_whitespace_before_comma_in_array' => true,
        'normalize_index_brace' => true,
        'trim_array_spaces' => true,
        'whitespace_after_comma_in_array' => ['ensure_single_space' => true],

        // Basic (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#basic)
        'braces_position' => [
            'allow_single_line_anonymous_functions' => false,
            'allow_single_line_empty_anonymous_classes' => false,
            'anonymous_classes_opening_brace' => 'next_line_unless_newline_at_signature_end',
            'anonymous_functions_opening_brace' => 'same_line',
            'classes_opening_brace' => 'next_line_unless_newline_at_signature_end',
            'control_structures_opening_brace' => 'same_line',
            'functions_opening_brace' => 'next_line_unless_newline_at_signature_end',
        ],
        'no_trailing_comma_in_singleline' => true,

        // Casing (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#casing)
        'integer_literal_case' => true,
        'magic_constant_casing' => true,
        'magic_method_casing' => true,
        'native_function_casing' => true,
        'native_type_declaration_casing' => true,

        // Class Notation (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#class-notation)
        'class_attributes_separation' => [
            'elements' => [
                'method' => 'one',
                'trait_import' => 'none',
            ]],
        'class_definition' => ['inline_constructor_arguments' => false, 'space_before_parenthesis' => true],
        'no_null_property_initialization' => true,
        'no_php4_constructor' => true, // risky
        'ordered_class_elements' => ['order' => ['use_trait']], // risky
        'ordered_interfaces' => true, // risky
        'ordered_traits' => true, // risky
        'ordered_types' => ['sort_algorithm' => 'none', 'null_adjustment' => 'always_last'],
        'self_accessor' => true, // risky
        'self_static_accessor' => true,
        'single_class_element_per_statement' => ['elements' => ['const', 'property']],

        // Cast Notation (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#cast-notation)
        'cast_spaces' => true,
        'modernize_types_casting' => true, // risky
        'no_short_bool_cast' => true,
        'no_unset_cast' => true,

        // Comment (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#comment)
        'multiline_comment_opening_closing' => true,
        'no_empty_comment' => true,
        'single_line_comment_spacing' => true,
        'single_line_comment_style' => true,

        // Control Structure (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#control-structure)
        'empty_loop_body' => ['style' => 'braces'],
        'empty_loop_condition' => true,
        'include' => true,
        'no_alternative_syntax' => true,
        'no_superfluous_elseif' => true,
        'no_unneeded_braces' => ['namespaces' => true],
        'no_unneeded_control_parentheses' => true,
        'no_useless_else' => true,
        'simplified_if_return' => true,
        'switch_continue_to_break' => true,
        'trailing_comma_in_multiline' => ['elements' => ['arrays', 'match', 'parameters']],

        // Function Notation (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#function-notation)
        'combine_nested_dirname' => true, // risky
        'implode_call' => true, // risky
        'lambda_not_used_import' => true,
        'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],
        'no_useless_sprintf' => true, // risky
        'nullable_type_declaration_for_default_null_value' => true,

        // Import (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#import)
        'fully_qualified_strict_types' => true,
        'global_namespace_import' => ['import_classes' => true, 'import_constants' => null, 'import_functions' => null],
        'group_import' => false,
        'no_unneeded_import_alias' => true,
        'no_unused_imports' => true,
        'ordered_imports' => ['imports_order' => ['class', 'function', 'const'], 'sort_algorithm' => 'alpha'],
        'single_import_per_statement' => ['group_to_single_imports' => true],

        // Language Construct (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#language-construct)
        'declare_parentheses' => true,
        'nullable_type_declaration' => ['syntax' => 'union'],
        'single_space_around_construct' => true,

        // Operator (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#operator)
        'assign_null_coalescing_to_coalesce_equal' => true,
        'binary_operator_spaces' => true,
        'concat_space' => ['spacing' => 'one'],
        'logical_operators' => true, // risky
        'new_with_parentheses' => ['anonymous_class' => false, 'named_class' => true],
        'no_useless_concat_operator' => true,
        'no_useless_nullsafe_operator' => true,
        'not_operator_with_successor_space' => true,
        'object_operator_without_whitespace' => true,
        'operator_linebreak' => ['only_booleans' => true],
        'standardize_increment' => true,
        'standardize_not_equals' => true,
        'ternary_to_null_coalescing' => true,
        'unary_operator_spaces' => true,

        // List Notation (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#list-notation)
        'list_syntax' => true,

        // Namespace Notation (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#namespace-notation)
        'clean_namespace' => true,
        'no_leading_namespace_whitespace' => true,

        // PHP Tag (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#php-tag)
        'linebreak_after_opening_tag' => true,

        // PHPDoc (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#phpdoc)
        'align_multiline_comment' => ['comment_type' => 'phpdocs_only'],
        'general_phpdoc_tag_rename' => true,
        'no_blank_lines_after_phpdoc' => true,
        'no_empty_phpdoc' => true,
        'no_superfluous_phpdoc_tags' => ['allow_mixed' => true, 'allow_unused_params' => true],
        'phpdoc_add_missing_param_annotation' => ['only_untyped' => false],
        'phpdoc_align' => ['align' => 'left'],
        'phpdoc_annotation_without_dot' => true,
        'phpdoc_indent' => true,
        'phpdoc_inline_tag_normalizer' => true,
        'phpdoc_no_access' => true,
        'phpdoc_no_alias_tag' => ['replacements' => ['type' => 'var', 'link' => 'see']],
        'phpdoc_no_empty_return' => true,
        'phpdoc_no_package' => true,
        'phpdoc_no_useless_inheritdoc' => true,
        'phpdoc_order' => ['order' => ['param', 'return', 'throws']],
        'phpdoc_param_order' => true,
        'phpdoc_return_self_reference' => true,
        'phpdoc_scalar' => true,
        'phpdoc_separation' => [
            'groups' => [
                ['deprecated', 'link', 'see', 'since'],
                ['author', 'copyright', 'license'],
                ['category', 'package', 'subpackage'],
                ['property', 'property-read', 'property-write'],
                ['param', 'return'],
            ],
        ],
        'phpdoc_single_line_var_spacing' => true,
        'phpdoc_summary' => false,
        'phpdoc_tag_casing' => true,
        'phpdoc_tag_type' => true,
        'phpdoc_to_comment' => false,
        'phpdoc_trim' => true,
        'phpdoc_trim_consecutive_blank_line_separation' => true,
        'phpdoc_types' => true,
        'phpdoc_types_order' => ['sort_algorithm' => 'alpha', 'null_adjustment' => 'always_last'],
        'phpdoc_var_annotation_correct_order' => true,
        'phpdoc_var_without_name' => true,

        // Return Notation (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#return-notation)
        'no_useless_return' => true,
        'return_assignment' => true,
        'simplified_null_return' => false,

        // Semicolon (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#semicolon)
        'multiline_whitespace_before_semicolons' => true,
        'no_empty_statement' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'space_after_semicolon' => ['remove_in_empty_for_expressions' => true],

        // String Notation (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#string-notation)
        'no_binary_string' => true,
        'single_quote' => true,

        // Whitespace (https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst#whitespace)
        'array_indentation' => true,
        'blank_line_before_statement' => true,
        'heredoc_indentation' => ['indentation' => 'same_as_start'],
        'method_chaining_indentation' => true,
        'no_extra_blank_lines' => ['tokens' => ['attribute', 'break', 'case', 'continue', 'curly_brace_block', 'default', 'extra', 'parenthesis_brace_block', 'return', 'square_brace_block', 'switch', 'throw', 'use']],
        'no_spaces_around_offset' => true,
        'type_declaration_spaces' => true,
        'types_spaces' => true,
    ]);
