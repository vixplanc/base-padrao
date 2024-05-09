<?php

namespace Vixplanc\BasePadrao\Controllers;


use Vixplanc\BasePadrao\Traits\FileHandler;
use App\Http\Controllers\Controller;
use Vixplanc\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{
    use FileHandler;

    public function edit(Request $request) {
        if(self::user_need_change_password()){
            return to_route('profile.edit')
                ->with('erro', 'Para utilizar esse recurso é necessário trocar a senha padrão!')
            ;
        }else{
            $users = User::query();
        if($request->filter_matricula){
            $users = $users->where('name','like', '%' . $request->filter_matricula . '%');
        }
        if($request->filter_cargos){
            $cargos = $request->filter_cargos;
            $users = $users->whereHas('roles',
                function ($query) use ($cargos) {
                    $query->whereIn('name', $cargos);
                    // $query->where('name','like', '%'. $cargos. '%');
                }
            );
        }
        $per_page = 15;
        if($request->per_page){
            $per_page = $request->per_page;
        }
        $page = 0;
        if($request->page){
            $page = $request->page;
        }
        $users->take($per_page)->offset($page*$per_page);
        $users_paginated = json_decode($users->paginate(perPage:$per_page, page:$page)->withQueryString()->toJson());
        return Inertia::render('Admin/Index',
            [
                'users_paginated'=>$users_paginated,
                'roles'=>Role::all(),
                'can' => [
                    'create_user' => $request->user()->can(['active-user', 'set-role', 'remove-role', 'set-active-user', 'remove-active-user']),
                    'edit_permission' => $request->user()->can(['active-user', 'set-role', 'remove-role']),
                    'active_user' => $request->user()->can(['active-user', 'set-active-user', 'remove-active-user']),
                    'permissions' => $request->user()->getPermissionsViaRoles()->pluck('name')
                ],
                'active-actions'=>$request->session()->get('active-actions'),
                'password-actions'=>$request->session()->get('password-actions'),
                'role-actions'=>$request->session()->get('role-actions')
            ]
        );
        }
    }


    public static function user_need_change_password():bool {
        return Hash::check(request()->user()->name ,request()->user()->password);
    }


    public function set_role(User $user, Role $role, Request $request){
        if($request->user()->hasAnyPermission(['set-role'])){
            if(!$user->hasRole($role)){
                $user->assignRole($role);
                return to_route('admin.edit')->with([
                    'role-actions' => Response::HTTP_OK,
                ]);
            }else{
                return to_route('admin.edit')->with([
                    'role-actions' => Response::HTTP_NOT_FOUND,
                ]);
            }
        }
        else{
            return to_route('admin.edit')->with([
                'role-actions' => Response::HTTP_UNAUTHORIZED,
            ]);
        }
    }


    public function remove_role(User $user, Role $role, Request $request){
        if($request->user()->hasAnyPermission(['remove-role'])){
            if($user->hasRole($role)){
                $user->removeRole($role);
                return to_route('admin.edit')->with([
                    'role-actions' => Response::HTTP_OK,
                ]);
            }else{
                return to_route('admin.edit')->with([
                    'role-actions' => Response::HTTP_NOT_FOUND,
                ]);
            }
        }
        else{
            return to_route('admin.edit')->with([
                'role-actions' => Response::HTTP_UNAUTHORIZED,
            ]);
        }
    }


    public function set_active_user(User $user, Request $request){
        if($request->user()->hasAnyPermission(['set-active-user'])){
            if(!$user->hasPermissionTo('active-user')){
                $user->givePermissionTo('active-user');
                return to_route('admin.edit')->with([
                    'active-actions' => Response::HTTP_OK,
                ]);
            }else{
                return to_route('admin.edit')->with([
                    'active-actions' => Response::HTTP_NOT_FOUND,
                ]);
            }
        }
        else{
            return to_route('admin.edit')->with([
                'active-actions' => Response::HTTP_UNAUTHORIZED,
            ]);
        }
    }


    public function remove_active_user(User $user, Request $request){
        if($request->user()->hasAnyPermission(['remove-active-user'])){
            if($user->hasPermissionTo('active-user')){
                $user->revokePermissionTo('active-user');
                return to_route('admin.edit')->with([
                    'active-actions' => Response::HTTP_OK,
                ]);

            }else{
                return to_route('admin.edit')->with([
                    'active-actions' => Response::HTTP_NOT_FOUND,
                ]);
            }
        }
        else{
            return to_route('admin.edit')->with([
                'active-actions' => Response::HTTP_UNAUTHORIZED,
            ]);
        }
    }


    public function remove_password_user(User $user, Request $request){
        if($request->user()->hasPermissionTo('reset-password-user')){
            if(!Hash::check($user->name ,$user->password)){
                $user->password = Hash::make($user->name);
                $user->save();
                return to_route('admin.edit')->with([
                    'password-actions' => Response::HTTP_OK,
                ]);
            }else{
                return to_route('admin.edit')->with([
                    'password-actions' => Response::HTTP_NOT_FOUND,
                ]);
            }
        }
        else{
            return to_route('admin.edit')->with([
                'password-actions' => Response::HTTP_UNAUTHORIZED,
            ]);
        }
    }


    function file_upload(){
        $file = request()->img;
        $file->store();
        $this->uploadFile($file, 'teste');
    }

}
