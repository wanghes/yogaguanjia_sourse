<?php
/*
 * @Description  : 跨域请求中间件
 * @Date         : 2020-11-17
 * @LastEditTime : 2020-12-25
 */

namespace app\middleware;

use Closure;
use think\Request;
use think\Response;

class AllowCrossDomain
{
    /**
     * 处理请求
     * 
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle($request, Closure $next)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Content-type:application/json; charset=UTF-8');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE, HEAD');

        if ($request->isOptions()) {
            return Response::create();
        }
        
        return $next($request);
    }
}
