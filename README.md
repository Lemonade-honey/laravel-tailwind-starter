<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel Starter Tamplate

a simple **laravel starter project** build with `tailwind flowbite` and `basic Auth User`. laravel version 11

# Developer Note

catatan developer

## Setup Project

-   install dependencies
    ```
    composer install
    ```
    ```
    npm install
    ```
-   start project
    ```
    php artisan serve
    ```
    ```
    npm run dev
    ```
-   build project
    ```
    npm run build
    ```

## Logger Helper

mempersingkat pembuatan logger class dengan global function, path `app/Helpers/LogHelpers.php`

-   `logDebug` log level Debug
-   `logInfo` log level Info
-   `logWarning` log level Warning
-   `logError` log level Error
-   `logCritical` log level Critical
