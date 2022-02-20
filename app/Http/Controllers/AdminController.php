<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function update(Request $request) {
        $acc = DB::table('s_users')->where('Name', $request->input('updatename'))->first();
//        $cars = DB::table('s_vehicle_player')->where('vOwner', $acc->pID)->first();
        $admin = DB::table('s_admin')->where('Name', Session::get('ANickName'))->first();

        if($admin) {

            if($acc) {
                if($request->type == 1) {
                    if ($acc->pLevel <= 3) {
                        DB::update("UPDATE s_users SET pDrugs = ?, pMats = ?, pLevel = ?, pCash = ? WHERE Name = ?", [$acc->pDrugs + 30000, $acc->pMats + 30000, 3, $acc->pCash + 30000, $acc->Name]);
                        $this->alert('success', 'Аккаунт успешно прокачен', 'Успешно');
                    }

                    if ($acc->pLevel > 3) {
                        DB::update("UPDATE s_users SET pDrugs = ?, pMats = ?, pCash = ? WHERE Name = ?", [$acc->pDrugs + 30000, $acc->pMats + 30000, $acc->pCash + 30000, $acc->Name]);
                        $this->alert('success', 'Аккаунт успешно прокачен', 'Успешно');
                    }
                }
                if($request->type == 2) {
                    $cars = DB::table('s_vehicle_player')->where('vOwner', $acc->pID)->first();

                    if(!$cars) {
                        DB::table('s_vehicle_player')->where($request->input('updatename'))->insert([
                            'vModel' => '508',
                            'vOwner' => $acc->pID,
                            'vPos' => "870.330383|-1658.438965|14.141900|174.489395",
                            'vBuyDate' => '2022-02-06',
                        ]);

                        $this->alert('success', 'Днк успешно выдался', 'Успешно');
                    }
                    else { $this->alert('error', 'У игрока уже имеется транспорт', 'Ошибка');}
                }
            }
            else { $this->alert('error', 'Аккаунт не найден', 'Ошибка');}
        }
    }
}
