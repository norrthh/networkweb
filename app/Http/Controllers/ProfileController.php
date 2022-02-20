<?php

namespace App\Http\Controllers;

use Illuminate\Database\Connection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function loggins(Request $request) {
        $query = DB::connection('mysql')->table('s_users')->where('Name', $request->input('logins'))->select('Name', 'pKey', 'pID')->first();

        if($query){
            if ($query->pKey == md5(md5($request->input('password')))) {
                usleep(100000); # 0.1s
                Session::put('user_id', $query->pID);
                Session::put('NickName', $request->input('logins'));
                $this->alert("success", "Вы успешно авторизовались", "Успех", "/profile/");
            }
            else {
                $this->alert("error", "Данные введены неверно исправте ошибку и попробуйте снова!","Ошибка");
            }
        } else {
//            $this->alert("error", $request->input('logins'));
             $this->alert("error", "Данные введены неверно исправте ошибку и попробуйте снова!", "Ошибка");
        }
    }

    public function adminauth(Request $request) {
        $query = DB::table('s_admin')->where('Name', Session::get('NickName'))->first();

        if($query) {
            if($request->input('apassword') == $query->password) {
                if($query->level >= 6) {
                    usleep(100000); # 0.1s
                    Session::put('admin_id', $query->id);
                    Session::put('ANickName', Session::get('NickName'));
                    $this->alert("success", "Вы успешно авторизовались под админку", "Успех", '/admin/');
                }
                else { $this->alert('error', "Ваш уровень админки маленький", "Ошибка");}
            }
            else { $this->alert('error', 'Пароль не совпадает', 'Ошибка');}
        }
    }

    public function logout () {
        Cache::forget(Session::get('NickName'));
        Session::flush();

        return redirect()->route('login');
    }
}
