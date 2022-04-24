<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ApiVerifyEmail;
use App\Models\student;
use App\Models\tutor;
use App\Traits\ResponseTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use ResponseTrait;

    public function __construct() {
       $this->middleware('token.auth', ['except' => ['login', 'register',]]);
    }


     public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->returnError($validator->errors()->toJson(), 400);
        }

        if (! $token = JWTAuth::attempt($validator->validated())) {
            return $this->returnError(['error' => __('auth.failed')], 400);
        }
        $user = Auth::user();
         $user->notification_token   = $request['notification_token'];
         $user->android_version      = $request['android_version'];
         $user->sdk_num              = $request['sdk_num'];
         $user->manufacturer         = $request['manufacturer'];
         $user->model                = $request['model'];
         $user->app_version          = $request['app_version'];
         $user->save();
        return $this->createNewToken($token);
    }



    /**
     * Register a User.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {

       $validator = Validator::make($request->all(), [
            'name'          =>'required|string| max:255',
            'email' => 'required|unique:users',
            'password'      => 'required|string|min:6|confirmed|regex:/[0-9]/',


            ],
            [
                'name.max' => 'يجب الا يزيد الاسم عن 255 حرف',
                'email.unique' => 'البريد الالكتروني مستخدم من قبل',
                'password.min' => 'يجب الا تقل كلمة المرور عن ثمانية حروف',
                'password.confirmed' => 'كلمة المرور غير متطابقة',
            ]);


        if($validator->fails()){

            foreach ($validator->errors()->getMessages() as $message) {
                $error = $message;
                $errors[] = $error;
            }
            return $this->returnError( $errors, 400);
        }

            if($request->input('type')== 'tutor'){

                $user = User::create([

                    'role'              => 'tutor',

                    'name'              => $request['name'],
                    'email'              => $request['email'],
                    'password'          => Hash::make($request['password']),
                    'image'              => $request['image'],

                    'verification_code' =>rand(100000,999999),
                    'notification_token'=> $request['notification_token'],
                    'android_version'   => $request['android_version'],
                    'sdk_num'           => $request['sdk_num'],
                    'manufacturer'      => $request['manufacturer'],
                    'model'             => $request['model'],
                    'app_version'       => $request['app_version'],

                ]);
                tutor::create([
                    'user_id'=> $user->id
                ]);

            }else{

                $user = User::create([

                    'role'              => 'student',

                    'name'              => $request['name'],
                    'email'              => $request['email'],
                    'password'          => Hash::make($request['password']),
                    'image'              => $request['image'],

                    'verification_code' =>rand(100000,999999),
                    'notification_token'=> $request['notification_token'],
                    'android_version'   => $request['android_version'],
                    'sdk_num'           => $request['sdk_num'],
                    'manufacturer'      => $request['manufacturer'],
                    'model'             => $request['model'],
                    'app_version'       => $request['app_version'],

                ]);

                student::create([
                    'user_id'=> $user->id
                ]);

            }


            Mail::to($user->email)->send(new ApiVerifyEmail($user));

        $token = JWTAuth::attempt(['email' => $request['email'], 'password' => $request['password']]);

        return $this->createNewToken($token);

    }

    public function logout(): JsonResponse
    {
        auth()->logout();
        return $this->returnSuccess('تم تسجيل الخروج بنجاح', 200);
    }

    public function userProfile(): JsonResponse
    {
        $user = auth()->user();
        $data = [
            'user_id'       => $user->id,
            'client_id'     => $user->client->id,
            'role'          => $user->role,
            'name'          => $user->name,
            'phone_number'  => $user->phone_number,
            'image'         => $user->client->image,
            'city_id'       => $user->city_id,
            'city'          => $user->city,
        ];

        return $this->returnData('بيانات المستخدم المسجل', $data, '200');
    }

    protected function createNewToken(string $token): JsonResponse
    {
        $expire = auth('api')->factory()->getTTL();
        $expires_in = Carbon::now()->addSeconds($expire);
        return $this->returnData("Here is a valid token",
            [
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => $expires_in,
            ],
            200);
    }


}
