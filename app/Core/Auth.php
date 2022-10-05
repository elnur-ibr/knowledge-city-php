<?php

namespace App\Core;

use App\Core\Exceptions\WrongCredentialsException;
use App\Core\Exceptions\UnauthorizedException;
use App\Models\User;
use DateTime;

class Auth
{
    /**
     * TTL for session
     */
    public const TTL = 10;

    /**
     * @var array
     */
    protected static $user;

    /**
     * @var string
     */
    protected static string $token;

    /**
     * @var bool
     */
    public static mixed $rememberMe = false;

    /**
     * @param $credentials
     * @return mixed
     * @throws UnauthorizedException
     */
    public static function attempt($credentials, $rememberMe = false): mixed
    {
        self::$rememberMe = $rememberMe;

        static::auth($credentials);

        static::createToken();

        static::setSession();

        return [
            'user'  => self::$user,
            'token' => self::$token,
        ];
    }

    /**
     * @param array $credentials
     * @throws UnauthorizedException
     */
    public static function auth(array $credentials)
    {
        self::$user = User::where('email', $credentials['email'])->first();

        if (
            is_null(self::$user)
            || !self::$user
            || !Hash::check($credentials['password'], self::$user['password'])
        ) {
            self::destroy();
            throw new WrongCredentialsException();
        }
    }

    /**
     * Setting session data
     */
    public static function setSession()
    {
        $_SESSION['id'] = self::$user['id'];
        $_SESSION['token'] = self::$token;

        if (!self::$rememberMe) {
            self::refreshSession();
        }
    }

    /**
     *
     */
    public static function refreshSession()
    {
        $_SESSION['expired_at'] = date("Y-m-d H:i:s", strtotime("+" . self::TTL . " minutes"));
    }

    /**
     * Creats hashed token
     *
     * @return string
     */
    public static function createToken(): string
    {
        $string = self::$user['id'] . '-' . self::$user['email'];

        return self::$token = self::hash($string);
    }

    /**
     * Make hash
     *
     * @param string $string
     * @return string
     */
    public static function hash(string $string): string
    {
        $hash = md5(
            config('app.prefix_salt')
            . $string
            . config('app.sufix_salt')
            . generateRandomString(5)
        );

        return $hash;
    }

    /**
     * @return array
     */
    public static function user()
    {
        return self::$user;
    }

    /**
     * @return string
     */
    public static function token()
    {
        return self::$token;
    }

    /**
     * Session destroy
     */
    public static function destroy()
    {
        session_destroy();
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public static function isExpired(): bool
    {
        return isset($_SESSION['expired_at'])
            && (new DateTime($_SESSION['expired_at'])) <= (new DateTime());
    }
}