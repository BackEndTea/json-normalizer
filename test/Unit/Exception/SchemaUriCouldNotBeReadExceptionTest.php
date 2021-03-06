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

use Localheinz\Json\Normalizer\Exception\SchemaUriCouldNotBeReadException;

/**
 * @internal
 */
final class SchemaUriCouldNotBeReadExceptionTest extends AbstractExceptionTestCase
{
    public function testExtendsRuntimeException(): void
    {
        $this->assertClassExtends(\RuntimeException::class, SchemaUriCouldNotBeReadException::class);
    }

    public function testFromSchemaUriReturnsSchemaUriCouldNotBeReadException(): void
    {
        $schemaUri = $this->faker()->url;

        $exception = SchemaUriCouldNotBeReadException::fromSchemaUri($schemaUri);

        $this->assertInstanceOf(SchemaUriCouldNotBeReadException::class, $exception);

        $message = \sprintf(
            'Schema URI "%s" does not reference a document that could be read.',
            $schemaUri
        );

        $this->assertSame($message, $exception->getMessage());
        $this->assertSame($schemaUri, $exception->schemaUri());
    }
}
