<?php

if (!function_exists('get_initial_from_name')) {
    function get_initial_from_name($name = '')
    {
        $words = explode(' ', $name);
        $initials = '';

        if (count($words) > 0) {
            $initials .= strtoupper(substr($words[0], 0, 1)); // First name initial
        }

        if (count($words) > 1) {
            $initials .= strtoupper(substr(end($words), 0, 1)); // Last name initial
        }

        return $initials;
    }
       
}


if (!function_exists('generateCustomerRand')) {
    function generateCustomerRand($length = 10)
    {
        // Characters to use for generating the random string
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Initialize the random string with "CU"
        $randomString = 'CU';

        // Calculate the length for the random part
        $randomPartLength = $length - 2;

        // Generate the random part of the string
        for ($i = 0; $i < $randomPartLength; $i++) {
            $index = mt_rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}

if (!function_exists('generateDriverRand')) {
    function generateDriverRand($length = 10)
    {
        // Characters to use for generating the random string
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Initialize the random string with "CU"
        $randomString = 'DR';

        // Calculate the length for the random part
        $randomPartLength = $length - 2;

        // Generate the random part of the string
        for ($i = 0; $i < $randomPartLength; $i++) {
            $index = mt_rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}

if (!function_exists('isValidDRCUCode')) {
    function isValidDRCUCode($code)
    {
        // Define the expected prefixes and length (excluding the prefix)
        $customerPrefix = 'CU';
        $driverPrefix = 'DR';
        $expectedLength = 10 - strlen($customerPrefix); // Assuming both prefixes have the same length

        // Use regular expressions to validate the format
        $customerRegex = '/^' . preg_quote($customerPrefix, '/') . '[a-zA-Z0-9]{' . $expectedLength . '}$/';
        $driverRegex = '/^' . preg_quote($driverPrefix, '/') . '[a-zA-Z0-9]{' . $expectedLength . '}$/';

        // Check if the code matches either the customer or driver format
        if (preg_match($customerRegex, $code) || preg_match($driverRegex, $code)) {
            return true; // Code is valid
        }

        return false; // Code is not valid
    }
}

// app/Helpers/ScraperHelper.php

if (!function_exists('scrape_gas_curl')) {
    function scrape_gas_curl()
    {
        $curl = curl_init(); // Initialize the cURL handle

        // Set the cURL options for the request
        curl_setopt($curl, CURLOPT_URL, 'https://www.caa.ca/gas-prices/#:~:text=CAA%20provides%20the%20daily%20national,This%20information%20is%20updated%20daily.');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        $page = curl_exec($curl);

        curl_close($curl); // Close the cURL handle

        if (!empty($page)) {
            $pokemon_doc = new DOMDocument;
            libxml_use_internal_errors(true);
            $pokemon_doc->loadHTML($page);
            libxml_clear_errors();

            $pokemon_xpath = new DOMXPath($pokemon_doc);

            $price = $pokemon_xpath->evaluate('string(/html/body/section[3]/div/div/div/div/div/div/div[1]/div[1]/div[1]/div[2]/div)');
            $priceNumeric = (float) preg_replace('/[^\d.]/', '', $price);

            return $priceNumeric / 100;
        } else {
            return "Not found";
        }
    }
}



