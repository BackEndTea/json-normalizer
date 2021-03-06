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

use Localheinz\Json\Normalizer\Exception\SchemaUriReferencesDocumentWithInvalidMediaTypeException;

/**
 * @internal
 */
final class SchemaUriReferencesDocumentWithInvalidMediaTypeExceptionTest extends AbstractExceptionTestCase
{
    public function testExtendsRuntimeException(): void
    {
        $this->assertClassExtends(\RuntimeException::class, SchemaUriReferencesDocumentWithInvalidMediaTypeException::class);
    }

    public function testFromSchemaUriReturnsSchemaUriReferencesDocumentWithInvalidMediaType(): void
    {
        $schemaUri = $this->faker()->url;

        $exception = SchemaUriReferencesDocumentWithInvalidMediaTypeException::fromSchemaUri($schemaUri);

        $this->assertInstanceOf(SchemaUriReferencesDocumentWithInvalidMediaTypeException::class, $exception);

        $message = \sprintf(
            'Schema URI "%s" does not reference a document with media type "application/schema+json".',
            $schemaUri
        );

        $this->assertSame($message, $exception->getMessage());
        $this->assertSame($schemaUri, $exception->schemaUri());
    }
}
