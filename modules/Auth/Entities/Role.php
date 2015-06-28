<?php namespace Modules\Auth\Entities;
   
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {

	protected $table = 'roles';

    protected $fillable = ['name', 'display_name', 'description'];

    public function permission() {

    	return $this->belongsToMany('Modules\Auth\Entities\Permission', 'permission_role', 'permission_id', 'role_id');
    }

}