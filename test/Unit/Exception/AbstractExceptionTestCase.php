<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/json-normalizer
 */

namespace Localheinz\Json\Normalizer\Test\Unit\Exception;

use Localheinz\Json\Normalizer\Exception;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

/**
 * @internal
 */
abstract class AbstractExceptionTestCase extends Framework\TestCase
{
    use Helper;

    final public function testImplementsExceptionInterface(): void
    {
        $this->assertClassImplementsInterface(Exception\ExceptionInterface::class, $this->className());
    }

    final protected function className(): string
    {
        return \preg_replace(
            '/Test$/',
            '',
            \str_replace(
                'Localheinz\\Json\\Normalizer\\Test\\Unit\\Exception\\',
                'Localheinz\\Json\\Normalizer\\Exception\\',
                static::class
            )
        );
    }
}
