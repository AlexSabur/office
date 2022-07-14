<?php

namespace AnourValar\Office;

use Exception;

class Format
{
    const Xlsx = 'xlsx'; // sheets | grid => reader + write
    const Pdf = 'pdf'; // sheets | grid => writer
    const Html = 'html'; // sheets | grid => reader + write
    const Ods = 'ods'; // sheets | grid => reader + write

    private string $format;

    public function __construct(string $format)
    {
        $this->format = $format;
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @return string
     */
    public function fileExtension(): string
    {
        switch ($this->format) {
            case Format::Xlsx:
                return 'xlsx';
            case Format::Pdf:
                return 'pdf';
            case Format::Html:
                return 'html';
            case Format::Ods:
                return 'ods';
        }
    }

    /**
     * MIME
     *
     * @return string
     */
    public function contentType(): string
    {
        switch ($this->format) {
            case Format::Xlsx:
                return 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
            case Format::Pdf:
                return 'application/pdf';
            case Format::Html:
                return 'text/html';
            case Format::Ods:
                return 'application/vnd.oasis.opendocument.spreadsheet';
        }
    }

    /**
     * Polyfill
     *
     * @param string $value
     * @return self|null
     */
    public static function tryFrom(string $value): ?Format
    {
        switch ($value) {
            case Format::Xlsx:
                return new static(Format::Xlsx);
            case Format::Pdf:
                return new static(Format::Pdf);
            case Format::Html:
                return new static(Format::Html);
            case Format::Ods:
                return new static(Format::Ods);
        }

        return null;
    }

    /**
     * Polyfill
     *
     * @param string $value
     * @return self|null
     */
    public static function from(string $value): Format
    {
        switch ($value) {
            case Format::Xlsx:
                return new static(Format::Xlsx);
            case Format::Pdf:
                return new static(Format::Pdf);
            case Format::Html:
                return new static(Format::Html);
            case Format::Ods:
                return new static(Format::Ods);
        }

        throw new Exception('Format type not found');
    }
}
