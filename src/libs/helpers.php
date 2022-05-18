<?php


//check if any errors are set
function error_class(array $errors, string $field): string
{
    return isset($errors[$field]) ? 'error' : '';
};

//simplify checking for post request
function is_post_request(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
};

//simplify checking for get request
function is_get_request(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'GET';
};

//simplify redirecting user with reusable function
function redirect_to(string $url): void
{
    header('Location:' . $url);
    exit;
};

//simplify redirecting user with data they entered by storing it in the session
function redirect_with(string $url, array $items): void
{
    foreach ($items as $key => $value) {
        $_SESSION[$key] = $value;
    }

    redirect_to($url);
};

function redirect_with_message(string $url, string $message)
{
    // flash('flash_' . uniqid(), $message, $type);
    redirect_to($url);

};

function session_flash(...$keys): array
{
    $data = [];
    foreach ($keys as $key) {
        if (isset($_SESSION[$key])) {
            $data[] = $_SESSION[$key];
            unset($_SESSION[$key]);
        } else {
            $data[] = [];
        }
    }
    return $data;
};






?>