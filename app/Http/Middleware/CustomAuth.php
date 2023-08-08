<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\audit_log;
use Auth;
use URL;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $data=new audit_log();
        $data->user_id=Auth::guard('admin')->user()->id;
        $data->user_name=Auth::guard('admin')->user()->name;
        $data->IP_address=getHostByName(getHostName());
        $data->action_event=Auth::guard('admin')->user()->id;
        $data->datetime=date('d-m-Y ');
        $data->action_event= basename(URL::current());
        $url=explode("/",URL::current());
        if(strlen($url[count($url)-1])>100){
            $data->action_event= $url[count($url)-2].'/'.dDecrypt($url[count($url)-1]);
        }
        $data->data=URL::current();
        $data->save();


        // $mam=$request->route()->getActionName();
        // dd($mam);

        // $act= explode("@",$request->route()->getActionName());
        // dd($act);





    //    $a=\Auth::guard('admin')->user()->getPermissionsViaRoles();
    //    dd($a);

        $permissionNames = \Auth::guard('admin')->user()->getPermissionNames();
        $rollNames = \Auth::guard('admin')->user()->getRoleNames();
        $rollarray=json_decode($rollNames,true);
        //dd($rollarray);

        //dd(\Auth::guard('admin')->user()->hasRole($rollarray));
        //dd($permissionNames);
        //dd($this->guard()->check());
        //dd(\Auth::user());

        //dd(\Auth::guest());
        //dd(($rollarray[0]==="Super Admin"));


        if(\Auth::guest() && \Auth::guard('admin')->user()->hasRole($rollarray) && $rollarray[0]!=='Super Admin'){
            $act= explode("@",$request->route()->getActionName());

             $action=$act[1];
             //dd($action);

            $a=\Auth::guard('admin')->user()->getPermissionsViaRoles();


            $permissions=[];
                foreach($a as $permission){
                    $permissions[]= $permission->name;
                }
              //  dd($permissions);
               // dd(!in_array($action, $permissions));

                    if (!in_array($action, $permissions))
                        {
                            return redirect()->back()->with('error','you have no permission to perform this task');
                        }


        }
        return $next($request);
    }


}
