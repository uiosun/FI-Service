<?php

namespace App\Http\Controllers\Auth;

use App\CitySaved;
use App\Http\Controllers\Controller;
use App\ImmoMap;
use App\ImmoMonster;
use App\ImmoUser;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Facades\Agent;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            $user->generateToken();

            $saveData = null;
            if ($request->from === 'city') {
                $saveData = CitySaved::find($user->id);
                if ($saveData !== null) {
                    $saveData = $saveData->toArray();
                }
            } else if ($request->from === 'immortalize') {  // 修仙传
                $saveData['nowVersion'] = "0.01 (0002)";
                $saveData['player'] = ImmoUser::find(Auth::id());
                if (!$saveData['player']) {
                    $saveData['player'] = ImmoUser::createNew();
                }
                ImmoMap::setMap($saveData['player']->mapId);
                $saveData['monsterId'] = ImmoMonster::getMonsterID($saveData['player']->mapId);  // 当前场景的首个怪物
            }

            return response()->json([
                'data' => $user->toArray(),
                'save' => $saveData,
            ]);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();

        if ($user) {
            $user->api_token = null;
            $user->save();

            return response()->json(['data' => '登录已注销。'], 200);
        } else {
            Auth::logout();

            return redirect('/');
        }
    }
}
