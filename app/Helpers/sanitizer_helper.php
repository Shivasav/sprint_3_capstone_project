<?php

// THIS HELPER METHOD SANITIZES INPUT FIELDS
if (!function_exists('sanitize')) {
    function sanitize($input = '')
    {
        // AT FIRST TRIMMING THE INPUT, REMOVING THE WHITE SPACES.
        $trimmed_input = trim(preg_replace('/\s\s+/', ' ', $input));
        $type = gettype($trimmed_input);
        if ($type == "integer") {
            $sanitized_input = filter_var($trimmed_input, FILTER_SANITIZE_NUMBER_INT);
        } elseif ($type == "double") {
            $sanitized_input = filter_var($trimmed_input, FILTER_SANITIZE_NUMBER_FLOAT);
        } else { // LETS ASSUME IT IS A STRING
            // $sanitized_input = filter_var($trimmed_input, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK);
            $sanitized_input = htmlspecialchars($trimmed_input);
        }

        return $sanitized_input;
    }
}

// THIS HELPER METHOD SANITIZES INPUT FIELDS AND MAKE SURE THAT IT IS NOT EMPTY
if (!function_exists('required')) {
    function required($input = '')
    {
        $trimmed_value = trim($input);
        if (strlen($trimmed_value) > 0) {
            return $trimmed_value;
        } else {
            error(get_phrase('required_fields_can_not_be_empty'), $_SERVER['HTTP_REFERER']);
        }
    }
}