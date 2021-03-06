<?php

namespace Webasics\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Webasics\Framework\Filesystem\Exception\FileNotFoundException;
use Webasics\Framework\View\Exception\TemplateException;
use Webasics\Framework\View\Exception\ViewHelperException;
use Webasics\Framework\View\Html;

/**
 * Class ViewTest
 * @package Webasics\Tests\Unit
 */
class ViewTest extends TestCase
{

    /**
     * @test
     *
     * @throws FileNotFoundException
     * @throws TemplateException
     * @throws ViewHelperException
     */
    public function itShouldRenderTemplate()
    {
        putenv('APPLICATION_ENV=production');

        $htmlRenderer = new Html();
        $htmlRenderer->setTemplate(__DIR__ . '/../Fixtures/templates/page/index.phtml');
        $htmlRenderer->setVariables(['bla' => 'lol']);
        $result = $htmlRenderer->render();

        $expectedOutput = '<!DOCTYPE html><html lang="de"><head><meta charset="UTF-8"></head><body> Erster Test </body></html>';

        self::assertStringContainsString(
            'Erster Test',
            $result
        );

        self::assertStringContainsString(
            '<!DOCTYPE',
            $result
        );

    }

}