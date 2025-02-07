<?php

declare(strict_types=1);

namespace SlamPhpStan\Tests;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use SlamPhpStan\UnusedVariableRule;

/**
 * @covers \SlamPhpStan\UnusedVariableRule
 */
final class UnusedVariableRuleTest extends RuleTestCase
{
    protected function getRule(): Rule
    {
        return new UnusedVariableRule();
    }

    public function testClassConstant()
    {
        $this->analyse(
            [
                __DIR__ . '/TestAsset/UnusedVariableRule/fixture.php',
            ],
            [
                [
                    'Function foo() has an unused variable $var1.',
                    7,
                ],
                [
                    'Function foo() has an unused variable $var10.',
                    49,
                ],
                [
                    'Closure function has an unused variable $var5bis.',
                    27,
                ],
            ]
        );
    }
}
