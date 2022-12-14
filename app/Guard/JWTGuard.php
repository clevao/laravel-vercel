<?php
namespace App\Guard;
use App\Models\User;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\JWT;
class JWTGuard implements Guard
{
    use GuardHelpers;
    /**
     * @var JWT $jwt
     */
    protected JWT $jwt;
    /**
     * @var Request $request
     */
    protected Request $request;
    /**
     * JWTGuard constructor.
     * @param JWT $jwt
     * @param Request $request
     */
    public function __construct(JWT $jwt, Request $request) {
        $this->jwt = $jwt;
        $this->request = $request;
    }
    public function user() {
        if (! is_null($this->user)) {
            return $this->user;
        }
        if ($this->jwt->setRequest($this->request)->getToken() && $this->jwt->check()) {
            
            $id = $this->jwt->payload()->get('sub');
            $permissions = $this->jwt->payload()->get('permissions');
            $login = $this->jwt->payload()->get('login');
            $this->user = new User();
            $this->user->id = $id;
            $this->user->login = $login;
            $this->user->permissions = $permissions;
            // Set data from custom claims
            return $this->user;
        }
        return null;
    }
    public function validate(array $credentials = []) {
    }
}