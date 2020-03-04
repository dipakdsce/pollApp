<?php
namespace App\Service;

use App\User;
use Illuminate\Support\Facades\Log;

class UserManagementService {
    public static function signUp($params = array())
    {
        $user = new User();
        $user->first_name = $params["firstName"];
        $user->middle_name = empty($params["middleName"]) ? "" : $params["middleName"];
        $user->last_name = $params["lastName"];
        $user->user_type = $params["userType"];
        $user->email = $params["email"];
        $user->password = $params["password"];
        $user->mobile = $params["mobile"];

        try {
            $user->save();
            return \response()->json(["status" => "OK", "message" =>"SignUp Successful"], 200);
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return \response()->json(["status" => "Fail", "message" => "Unable to process the Query"], 500);
        }
    }


    public static function login($params = array())
    {
        try {
            $user = User::where('email', $params["email"])->get();
            if($user[0]->password == $params["password"]) {
                return \response()->json(["status" => "OK", "message" =>"Login Successful"], 200);
            } else {
                return \response()->json(["status" => "Unauthorized", "message" => "Invalid email or password"], 401);
            }
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return \response()->json(["status" => "Fail", "message" => "Unable to process the Query"], 500);
        }
    }
}
