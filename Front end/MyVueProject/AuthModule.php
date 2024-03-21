
<?php
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;
Use Firebase\JWT\Key;
class AuthModule
{
private $secretKey;
private $expirationTime;

public function __construct()
{
// Set the secret key (replace with your own secret key)
$this->secretKey = '123456';

// Set the expiration time for the JWT (in seconds)
$this->expirationTime = 3600; // 1 hour
}

public function generateToken($userId,$pass)
{
// Prepare the payload data
$payload = [
'user_id' => $userId,
'password' => $pass,
'exp' => time() + $this->expirationTime,
];

// Generate the JWT token
$token = JWT::encode($payload, $this->secretKey,'HS256');

return $token;
}

public function validateToken($token)
{

// Attempt to decode the token
//$payload = JWT::decode($token, $this->secretKey, ['HS256']);

$payload = JWT:: decode ($token, new key ($this->secretKey,'HS256'));

$response = [
'token' => $token,
'decodedToken' => $payload
];

//print_r($response);
//echo "<br/>$payload";
// Check if the token has expired
if (time() > $payload->exp) {
return false;
}

return true;

}

public function getUserIdFromToken($token)
{
try {
// Attempt to decode the token
$payload = JWT:: decode ($token, new key ($this->secretKey,'HS256'));

// Check if the token has expired
if (time() > $payload->exp) {
return null;
}

// Return the user ID from the payload
return "User Name:".$payload->user_id.", Password:".$payload->password;
} catch (\Exception $e) {
// Invalid token or other error occurred
return null;
}
}
}
