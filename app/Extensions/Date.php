<?php

namespace App\Extensions;

use Carbon\Carbon;

class Date extends Carbon
{
    /**
     * Get a part of the Carbon object
     *
     * @param string $name
     *
     * @return \DateTimeZone|int|string
     */
    public function __get($name)
    {
        switch ($name) {
            case 'date':
                switch (config('app.locale')) {
                    case 'az':
                    case 'ru':
                        return $this->format('j F Y');

                    case 'en':
                    default:
                        return $this->format('F j, Y');
                }

            case 'iso8601':
                return $this->format(static::ISO8601);
        }

        return parent::__get($name);
    }

    /**
     * Returns date formatted according to given format.
     *
     * @param string $format
     *
     * @return string
     */
    public function format($format)
    {
        $replace = [];

        for ($i = 0, $len = strlen($format); $i < $len; ++$i) {
            $character = $format[$i];

            if (in_array($character, ['D', 'l', 'F', 'M'])) {
                if ($i > 0 && $format[$i - 1] == '\\') {
                    continue;
                }

                switch ($character) {
                    case 'D':
                        $key = parent::format('l');
                        break;

                    case 'M':
                        $key = parent::format('F');
                        break;

                    default:
                        $key = parent::format($character);
                }

                $original = parent::format($character);

                if (in_array($character, ['F', 'M'])) {
                    $translated = trans_choice(
                        'datetime.'.$key,
                        (($i - 2) >= 0 && in_array($format[$i - 2], ['d', 'j'])) ? 1 : 0
                    );
                } else {
                    $translated = __('e.'.$key);
                }

                if (in_array($character, ['D', 'M'])) {
                    $shortTranslated = __('datetime.'.$original);

                    if ($shortTranslated === $original) {
                        $translated = mb_substr($translated, 0, 3);
                    } else {
                        $translated = $shortTranslated;
                    }
                }

                if ($translated && $original != $translated) {
                    $replace[$original] = $translated;
                }
            }
        }

        if ($replace) {
            return str_replace(array_keys($replace), array_values($replace), parent::format($format));
        }

        return parent::format($format);
    }
}