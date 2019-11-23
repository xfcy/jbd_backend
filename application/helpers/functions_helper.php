<?php

use Ramsey\Uuid\Uuid;

if (!function_exists('getUuidWithoutDash')) {

    function getUuidWithoutDash()
    {
        $uuid = '';
        try {
            $uuid = Uuid::uuid4();
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            return str_replace('-', '', $uuid);
        }

    }
}

if (!function_exists('mb_str_replace'))
{
    function mb_str_replace($search, $replace, $subject, &$count = 0)
    {
        if (!is_array($subject))
        {
            $searches = is_array($search) ? array_values($search) : array($search);
            $replacements = is_array($replace) ? array_values($replace) : array($replace);
            $replacements = array_pad($replacements, count($searches), '');
            foreach ($searches as $key => $search)
            {
                $parts = mb_split(preg_quote($search), $subject);
                $count += count($parts) - 1;
                $subject = implode($replacements[$key], $parts);
            }
        }
        else
        {
            foreach ($subject as $key => $value)
            {
                $subject[$key] = mb_str_replace($search, $replace, $value, $count);
            }
        }
        return $subject;
    }
}