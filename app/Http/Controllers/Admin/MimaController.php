<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Admin;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;

    class MimaController extends Controller
    {
        //修改后台密码
        public function body()
        {
            $body[] = [
                'type' => "form",
                'title' => '修改密码',
                'api' => url(env('ADMIN_PREFIX', 'admin').'/handdle/mima/upmm'),
                'body' => array(
                    [
                        'type' => 'input-password',
                        'name' => 'o_pwd',
                        'label' => '原密码',
                        "required" => true,

                    ],
                    [
                        'type' => 'input-password',
                        'name' => 'n_pwd',
                        'label' => '新密码',
                        "required" => true,

                    ],
                    [
                        'type' => 'input-password',
                        'name' => 'n_pwd2',
                        'label' => '重复新密码',
                        "required" => true,

                    ]
                )
            ];

            $data = [
                'type' => 'page',
                'title' => '修改密码',
                'body' => $body,
            ];
            return $data;
        }

        //    修改密码逻辑
        public function upmm(Request $request)
        {
            $o_pwd = $request->input('o_pwd');
            $n_pwd = $request->input('n_pwd');
            $n_pwd2 = $request->input('n_pwd2');

            if (strlen($o_pwd) < 6 || strlen($n_pwd) < 6) {
                return $this->apiReturn(100,'密码不能少于6位','');
            }

            if (!ctype_alnum($n_pwd)) {
                return $this->apiReturn(100,'密码只能是字母和数字组合','');
            }

            if ($n_pwd != $n_pwd2) {
                return $this->apiReturn(100,'两次密码不一致','');
            }
            //        验证旧密码
            $admin = Auth::guard('admin')->user();
            if (!Hash::check($o_pwd, $admin->password)) {
                return $this->apiReturn(100,'原密码错误','');
            }
            //        修改密码
            $upmm = Admin::find($admin->id);
            $upmm->password = Hash::make($n_pwd);
            $res = $upmm->save();
            if ($res) {
                return $this->apiReturn(0,'修改成功','');
            } else {
                return $this->apiReturn(100,'系统出错','');
            }
        }

    }
