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

use Localheinz\Json\Normalizer\Exception\InvalidIndentStringException;

/**
 * @internal
 */
final class InvalidIndentStringExceptionTest extends AbstractExceptionTestCase
{
    public function testExtendsInvalidArgumentException(): void
    {
        $this->assertClassExtends(\InvalidArgumentException::class, InvalidIndentStringException::class);
    }

    public function testFromSizeAndMinimumSizeReturnsInvalidIndentStringException(): void
    {
        $string = $this->faker()->word;

        $exception = InvalidIndentStringException::fromString($string);

        $this->assertInstanceOf(InvalidIndentStringException::class, $exception);

        $message = \sprintf(
            '"%s" is not a valid indent string',
            $string
        );

        $this->assertSame($message, $exception->getMessage());
        $this->assertSame($string, $exception->string());
    }
}
