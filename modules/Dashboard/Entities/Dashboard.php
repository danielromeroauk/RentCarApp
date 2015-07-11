<?php namespace Modules\Dashboard\Entities;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model {

    public static function getUnfulfilledAgreements() {

        return DB::table('agreements')
            ->join('status', 'agreements.status_id', '=', 'status.id')
            ->join('clients', 'agreements.client_id', '=', 'clients.id')
            ->join('countries', 'clients.countries_id', '=', 'countries.id')
            ->where('status.name', '=', 'Incumplido')
            ->select('code', 'status.name as status', 'clients.firstname', 'clients.lastname', 'clients.passport',
                'countries.name as country', 'registration_date', 'delivery_date')
            ->get();
    }

    public static function getCountUsers() {

        return array(
            'num_users' => DB::table('users')->count(),
            'num_roles' => DB::table('roles')->count(),
            'num_permissions' => DB::table('permissions')->count(),
            'num_clients' => DB::table('clients')->count(),
            'num_cars' => DB::table('cars')->count(),
            'num_agreements' => DB::table('agreements')->count()
        );
    }
}