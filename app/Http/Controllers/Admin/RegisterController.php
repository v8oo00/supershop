<?php

namespace App\Http\Controllers\Admin;
use App\MyClass\Ucpaas;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
   
    public function __construct()
    {

    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:20',
            'phone' => 'required|max:11|unique:admins',
            'password' => 'required|string|min:6',
        ],[
            'name.required' => '昵称未填写',
            'name.max' => '昵称最多20个字符',
            'phone.unique' => '手机号已注册',
            'phone.max'  => '手机号最多11位',
            'phone.required' => '手机号未填写',
            'password.required'=>'密码不能为空',
            'password.min'=>'密码最少6位',
        ]);

        Admin::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'avatar' =>'/admins/images/img.jpg',
            'last_login' =>000000000,
            'ip' => '127.0.0.1',
            'password' => bcrypt($request->password),
        ]);

        return redirect()->action('Admin\LoginController@showLoginForm',[parameters]);
    }

    public function ucpaas_vcode(Request $request)
    {

        $code = randString(6);
        // dd($code);
        $Ucpaas = new Ucpaas(['accountsid'=>'cdaff2f6e0e9ef1f974ad51ced2d293a','token'=>'36ccb740afd000f19b5c0b6edff0a209']);
        $r = $Ucpaas -> SendSms('6401767b5b2a464e9bde32ba077cf94d',190547,$code,$request->phone,'');
        if(substr($r,21,6) == 000000){
            //存储到session里
            $request->session()->put([
                'code'=>[
                    $code,
                    'to'=>[
                        $request->phone,
                        'type'=>'mobile'
                    ],
                ],
            ]);
            return ['state'=>true,'info'=>'发送验证码成功请注意查收'];
        }else{
            return ['state'=>false,'info'=>'发送验证码失败请稍后尝试'];
        }
        // echo $r;
    }

    public function ucpaas_check(Request $request){
        // dump($request->session()->all());

        // dump($request->all());
        if($request->session()->has('code')){
             $code= $request->session()->get('code');

            if($code[0]==$request->code && $code['to'][0]==$request->phone){
                    return 'true';
                }else{
                    return 'false';
                }
        }

        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|string|max:255',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return Admin::create([
    //         'name' => $data['name'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }
}
