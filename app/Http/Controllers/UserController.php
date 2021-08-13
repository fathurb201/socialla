<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use Hash;
use Auth;
use JWTAuth;
use JWTException;
use Carbon\Carbon;

class UserController extends Controller
{

    public function getAllUser(Request $request)
    {
        $users = User::all();
        return response()->json($users);
    }

    public function register(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['level'] = 'user';
        $user = User::create($input);
        return $user;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // if (!$user || !Hash::check($credentials['password'], $user->password)) {
        //     return response()->json(['error' => 'Invalid credentials'], 401);
        // }
        // return response()->json(['token' => $user->token], 200);
        // return $credentials;
        if (!$jwt_token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ]);
        }
        $user = User::where('email', $credentials['email'])->first();
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
            'user' => JWTAuth::user()
        ]);
    }

    public function updateProfile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->update($request->all());
        return response()->json([
            'success' => 1,
            'message' => 'Profile updated successfully',
            'data' => $user
        ]);
    }

    public function checkProfile(Request $request)
    {
        $user = JWTAuth::user();
        return $user;
    }

    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json($user);
    }

    // BISA JUGA
    // public function profile()
    // {
    //     $user = JWTAuth::parseToken()->authenticate();
    //     return $user;
    // }

    // public function timeBomb()
    // {
    //     config(['app.locale' => 'id']);
    //     if (Carbon::now('Asia/Jakarta')->format('H:i:s') >= '20:00:00') {
    //         Cart::truncate();
    //         return response()->json([
    //             'mesage' => 'Data keranjang berhasil dihapus. Have a nice day.',
    //             'cart' => Cart::all()
    //         ]);
    //     }
    // }
}
