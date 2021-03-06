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

use Localheinz\Json\Normalizer\Exception\InvalidJsonEncodeOptionsException;

/**
 * @internal
 */
final class InvalidJsonEncodeOptionsExceptionTest extends AbstractExceptionTestCase
{
    public function testExtendsInvalidArgumentException(): void
    {
        $this->assertClassExtends(\InvalidArgumentException::class, InvalidJsonEncodeOptionsException::class);
    }

    public function testFromJsonEncodeOptionsReturnsInvalidJsonEncodeOptionsException(): void
    {
        $jsonEncodeOptions = $this->faker()->randomNumber();

        $exception = InvalidJsonEncodeOptionsException::fromJsonEncodeOptions($jsonEncodeOptions);

        $this->assertInstanceOf(InvalidJsonEncodeOptionsException::class, $exception);

        $message = \sprintf(
            '"%s" is not valid options for json_encode().',
            $jsonEncodeOptions
        );

        $this->assertSame($message, $exception->getMessage());
        $this->assertSame($jsonEncodeOptions, $exception->jsonEncodeOptions());
    }
}
