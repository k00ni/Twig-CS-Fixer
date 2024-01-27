<?php

declare(strict_types=1);

namespace TwigCsFixer\Tests\Rules\Variable\VariableName;

use TwigCsFixer\Rules\Variable\VariableNameRule;
use TwigCsFixer\Tests\Rules\AbstractRuleTestCase;

final class VariableNameRuleTest extends AbstractRuleTestCase
{
    public function testConfiguration(): void
    {
        static::assertSame(
            ['case' => VariableNameRule::SNAKE_CASE],
            (new VariableNameRule())->getConfiguration()
        );

        static::assertSame(
            ['case' => VariableNameRule::PASCAL_CASE],
            (new VariableNameRule(VariableNameRule::PASCAL_CASE))->getConfiguration()
        );
    }

    public function testRule(): void
    {
        $this->checkRule(new VariableNameRule(), [
            'VariableName.Error:2:4',
            'VariableName.Error:4:4',
        ]);
    }

    public function testRuleCamelCase(): void
    {
        $this->checkRule(new VariableNameRule(VariableNameRule::CAMEL_CASE), [
            'VariableName.Error:3:4',
            'VariableName.Error:4:4',
        ]);
    }

    public function testRulePascalCase(): void
    {
        $this->checkRule(new VariableNameRule(VariableNameRule::PASCAL_CASE), [
            'VariableName.Error:1:4',
            'VariableName.Error:2:4',
            'VariableName.Error:3:4',
        ]);
    }
}