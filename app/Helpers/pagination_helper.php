<?php
if (!function_exists('buildPaginationLink')) {
    function buildPaginationLink($page)
    {
        $params = $_GET;
        $params['page'] = $page;
        return '?' . http_build_query($params);
    }
}

