<?php
namespace app\controller;

use think\facade\Request;
use think\facade\Filesystem;
use think\facade\View;
use think\response\Redirect;

class MainUpload {
   public static $UPLOAD_PATH = 'http://source.yogaguanjia.com/storage/';
   // public static $UPLOAD_PATH = 'http://assets.yoga.com/storage/';

   /**
	 * 英文转为中文
	 */
	private static function _languageChange($msg)
	{
		$data = [
			// 上传错误信息
            'filesize not match'                         => '上传文件大小不匹配！',
			'unknown upload error'                       => '未知上传错误！',
			'file write error'                           => '文件写入失败！',
			'upload temp dir not found'                  => '找不到临时文件夹！',
			'no file to uploaded'                        => '没有文件被上传！',
			'only the portion of file is uploaded'       => '文件只有部分被上传！',
			'upload File size exceeds the maximum value' => '上传文件大小超过了最大值！',
			'upload write error'                         => '文件上传保存错误！',
            'extensions to upload is not allowed'        => '文件类型错误'
		];

		return $data[$msg] ?? $msg;
	}

    public function fetchUEConfig() {
        /* 前后端通信相关的配置,注释只允许使用多行方式 */
        $callBack = Request::param('callback');
        $path = root_path() .'public/UEConfig.json';
        if (file_exists($path)) {
            $config = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents($path)), true);
            return $callBack.'('.json_encode($config).')';
        }
        return "";
    }


    public function userHead(){
        // 获取表单上传文件
        try {
            $file = Request::file('file');
            if (null === $file) {
                // 异常代码使用UPLOAD_ERR_NO_FILE常量，方便需要进一步处理异常时使用
                throw new \Exception('请上传文件', UPLOAD_ERR_NO_FILE);
            }   

            validate(['file' => [
                // 限制文件大小(单位b)，这里限制为5M
                'fileSize' => 5 * 1024 * 1024,
                // 限制文件后缀，多个后缀以英文逗号分割
                'fileExt'  => 'gif,jpg,jpeg,png'
            ]])->check(['file' => $file]);

            $savename = Filesystem::disk('public')->putFile('userHead', $file, 'md5');
            return success(["imagePath" => self::$UPLOAD_PATH.$savename]);
            
            
        } catch(\think\exception\ValidateException $e){
            return success(null, '上传失败:'.self::_languageChange($e->getMessage()), 500);
        }   
    }


    public function focus(){
        // 获取表单上传文件
        try {
            $file = Request::file('file');
            if (null === $file) {
                // 异常代码使用UPLOAD_ERR_NO_FILE常量，方便需要进一步处理异常时使用
                throw new \Exception('请上传文件', UPLOAD_ERR_NO_FILE);
            }   

            validate(['file' => [
                // 限制文件大小(单位b)，这里限制为5M
                'fileSize' => 5 * 1024 * 1024,
                // 限制文件后缀，多个后缀以英文逗号分割
                'fileExt'  => 'gif,jpg,jpeg,png'
            ]])->check(['file' => $file]);

            $savename = Filesystem::disk('public')->putFile('focus', $file, 'md5');
            return success(["imagePath" => self::$UPLOAD_PATH.$savename]);
            
            
        } catch(\think\exception\ValidateException $e){
            return success(null, '上传失败:'.self::_languageChange($e->getMessage()), 500);
        }   
    }

    

    public function uploadCardCover(){
        // 获取表单上传文件
        try {
            $file = Request::file('file');
            if (null === $file) {
                // 异常代码使用UPLOAD_ERR_NO_FILE常量，方便需要进一步处理异常时使用
                throw new \Exception('请上传文件', UPLOAD_ERR_NO_FILE);
            }   

            validate(['file' => [
                // 限制文件大小(单位b)，这里限制为5M
                'fileSize' => 5 * 1024 * 1024,
                // 限制文件后缀，多个后缀以英文逗号分割
                'fileExt'  => 'gif,jpg.jpeg,png'
            ]])->check(['file' => $file]);

            $savename = Filesystem::disk('public')->putFile('card_cover', $file, 'md5');
            return success(["imagePath" => self::$UPLOAD_PATH.$savename]);
            
        } catch(\think\exception\ValidateException $e){
            return success(null, '上传失败:'.self::_languageChange($e->getMessage()), 500);
        }   
    }

    public function upload(){
        // 获取表单上传文件
        try {
            $file = Request::file('file');
            if (null === $file) {
                // 异常代码使用UPLOAD_ERR_NO_FILE常量，方便需要进一步处理异常时使用
                throw new \Exception('请上传文件', UPLOAD_ERR_NO_FILE);
            }   

            validate(['file' => [
                // 限制文件大小(单位b)，这里限制为5M
                'fileSize' => 5 * 1024 * 1024,
                // 限制文件后缀，多个后缀以英文逗号分割
                'fileExt'  => 'gif,jpg,jpeg,png'
            ]])->check(['file' => $file]);

            $savename = Filesystem::disk('public')->putFile('course', $file, 'md5');
            return success(["imagePath" => self::$UPLOAD_PATH.$savename]);
            
            
        } catch(\think\exception\ValidateException $e){
            return success(null, '上传失败:'.self::_languageChange($e->getMessage()), 500);
        }   
    }


    // 秒杀封面
    public function uploadFlashSaleCover()
    {
        // 获取表单上传文件
        try {
            $file = Request::file('file');
            if (null === $file) {
                // 异常代码使用UPLOAD_ERR_NO_FILE常量，方便需要进一步处理异常时使用
                throw new \Exception('请上传文件', UPLOAD_ERR_NO_FILE);
            }   

            validate(['file' => [
                // 限制文件大小(单位b)，这里限制为5M
                'fileSize' => 5 * 1024 * 1024,
                // 限制文件后缀，多个后缀以英文逗号分割
                'fileExt'  => 'gif,jpg,jpeg,png'
            ]])->check(['file' => $file]);

            $savename = Filesystem::disk('public')->putFile('flash_sale_cover', $file, 'md5');
            return success(["imagePath" => self::$UPLOAD_PATH.$savename]);
            
        } catch(\think\exception\ValidateException $e){
            return success(null, '上传失败:'.self::_languageChange($e->getMessage()), 500);
        }   
    }

    // 团购封面
    public function uploadGroupPurchaseCover() 
    {
        // 获取表单上传文件
        try {
            $file = Request::file('file');
            if (null === $file) {
                // 异常代码使用UPLOAD_ERR_NO_FILE常量，方便需要进一步处理异常时使用
                throw new \Exception('请上传文件', UPLOAD_ERR_NO_FILE);
            }   

            validate(['file' => [
                // 限制文件大小(单位b)，这里限制为5M
                'fileSize' => 5 * 1024 * 1024,
                // 限制文件后缀，多个后缀以英文逗号分割
                'fileExt'  => 'gif,jpg,jpeg,png'
            ]])->check(['file' => $file]);

            $savename = Filesystem::disk('public')->putFile('group_purchase_cover', $file, 'md5');
            return success(["imagePath" => self::$UPLOAD_PATH.$savename]);
            
        } catch(\think\exception\ValidateException $e){
            return success(null, '上传失败:'.self::_languageChange($e->getMessage()), 500);
        }   
    }

    // 场馆图片
    public function uploadVenues()
    {
        // 获取表单上传文件
        try {
            $file = Request::file('file');
            if (null === $file) {
                // 异常代码使用UPLOAD_ERR_NO_FILE常量，方便需要进一步处理异常时使用
                throw new \Exception('请上传文件', UPLOAD_ERR_NO_FILE);
            }   

            validate(['file' => [
                // 限制文件大小(单位b)，这里限制为5M
                'fileSize' => 5 * 1024 * 1024,
                // 限制文件后缀，多个后缀以英文逗号分割
                'fileExt'  => 'gif,jpg,jpeg,png'
            ]])->check(['file' => $file]);

            $savename = Filesystem::disk('public')->putFile('venues', $file, 'md5');
            return success(["imagePath" => self::$UPLOAD_PATH.$savename]);
            
        } catch(\think\exception\ValidateException $e){
            return success(null, '上传失败:'.self::_languageChange($e->getMessage()), 500);
        }   
    }

    // 团课封面
    public function uploadTuanke()
    {
        // 获取表单上传文件
        try {
            $file = Request::file('file');
            if (null === $file) {
                // 异常代码使用UPLOAD_ERR_NO_FILE常量，方便需要进一步处理异常时使用
                throw new \Exception('请上传文件', UPLOAD_ERR_NO_FILE);
            }   

            validate(['file' => [
                // 限制文件大小(单位b)，这里限制为5M
                'fileSize' => 5 * 1024 * 1024,
                // 限制文件后缀，多个后缀以英文逗号分割
                'fileExt'  => 'gif,jpg,jpeg,png'
            ]])->check(['file' => $file]);

            $savename = Filesystem::disk('public')->putFile('tuanke', $file, 'md5');
            return success(["imagePath" => self::$UPLOAD_PATH.$savename]);
            
            
        } catch(\think\exception\ValidateException $e){
            return success(null, '上传失败:'.self::_languageChange($e->getMessage()), 500);
        }   
    }

    // 班课封面
    public function uploadBanke()
    {
        try {
            $file = Request::file('file');
            if (null === $file) {
                throw new \Exception('请上传文件', UPLOAD_ERR_NO_FILE);
            }   

            validate(['file' => [
                'fileSize' => 5 * 1024 * 1024,
                'fileExt'  => 'gif,jpg,jpeg,png'
            ]])->check(['file' => $file]);

            $savename = Filesystem::disk('public')->putFile('banke', $file, 'md5');
            return success(["imagePath" => self::$UPLOAD_PATH.$savename]);
            
        } catch(\think\exception\ValidateException $e){
            return success(null, '上传失败:'.self::_languageChange($e->getMessage()), 500);
        }   
    }

    public function teacherHead()
    {
        // 获取表单上传文件
        try {
            $file = Request::file('file');
            if (null === $file) {
                // 异常代码使用UPLOAD_ERR_NO_FILE常量，方便需要进一步处理异常时使用
                throw new \Exception('请上传文件', UPLOAD_ERR_NO_FILE);
            }   

            validate(['file' => [
                // 限制文件大小(单位b)，这里限制为5M
                'fileSize' => 5 * 1024 * 1024,
                // 限制文件后缀，多个后缀以英文逗号分割
                'fileExt'  => 'gif,jpg,jpeg,png'
            ]])->check(['file' => $file]);

            $savename = Filesystem::disk('public')->putFile('teacher', $file, 'md5');
            return success(["imagePath" => self::$UPLOAD_PATH.$savename]);
            
            
        } catch(\think\exception\ValidateException $e){
            return success(null, '上传失败:'.self::_languageChange($e->getMessage()), 500);
        }   
    }

    public function teacherIdCard()
    {
        // 获取表单上传文件
        try {
            $file = Request::file('idcard');
            if (null === $file) {
                // 异常代码使用UPLOAD_ERR_NO_FILE常量，方便需要进一步处理异常时使用
                throw new \Exception('请上传文件', UPLOAD_ERR_NO_FILE);
            }   

            validate(['file' => [
                // 限制文件大小(单位b)，这里限制为5M
                'fileSize' => 5 * 1024 * 1024,
                // 限制文件后缀，多个后缀以英文逗号分割
                'fileExt'  => 'gif,jpg,jpeg,png'
            ]])->check(['file' => $file]);

            $savename = Filesystem::disk('public')->putFile('teacher_card', $file, 'md5');
            return success(["imagePath" => self::$UPLOAD_PATH.$savename]);
            
        } catch(\think\exception\ValidateException $e){
            return success(null, '上传失败:'.self::_languageChange($e->getMessage()), 500);
        }   
    }

    public function uploadVideo() {
        try {
            $file = Request::file('video');
            if (null === $file) {
                // 异常代码使用UPLOAD_ERR_NO_FILE常量，方便需要进一步处理异常时使用
                throw new \Exception('请上传文件', UPLOAD_ERR_NO_FILE);
            }   

            validate(['video' => [
                // 限制文件大小(单位b)，这里限制为500M
                'fileSize' => 500 * 1024 * 1024,
                // 限制文件后缀，多个后缀以英文逗号分割
                // 'fileExt'  => 'gif,jpg,png'
            ]])->check(['video' => $file]);
            $savename = Filesystem::disk('public')->putFile('course_video', $file);
            return success(["videoPath" => self::$UPLOAD_PATH.$savename]);
            
        } catch(\think\exception\ValidateException $e){
            return success(null, '上传失败:'.self::_languageChange($e->getMessage()), 500);
        }   
  
    }


    public function uploadContentImg() {
        $action = Request::param('action');
  
        if ($action == 'config') {
            return $this->fetchUEConfig();
      
        } else {
            try {
                $file = Request::file('upfile');
                
                if (null === $file) {
                    // 异常代码使用UPLOAD_ERR_NO_FILE常量，方便需要进一步处理异常时使用
                    throw new \Exception('请上传文件', UPLOAD_ERR_NO_FILE);
                }   
               
                $fileSize = $file->getSize();
                $originalFileName = $file->getOriginalName();
                $originalFileType = $file->getMime();
        
                validate(['upfile' => [
                    // 限制文件大小(单位b)，这里限制为50M
                    'fileSize' => 50 * 1024 * 1024,
                    // 限制文件后缀，多个后缀以英文逗号分割
                    'fileExt'  => 'gif,jpg,png,webp'
                ]])->check(['upfile' => $file]);

                $savename = Filesystem::disk('public')->putFile('upfiles', $file);

                $request = Request::instance();
                $domain = $request->domain();

                $return_json = json_encode([
                    "state"=>"SUCCESS",
                    "url"=> self::$UPLOAD_PATH.$savename,
                    "title" => $originalFileName,
                    "size"=> $fileSize,
                    "type"=> $originalFileType,
                    "original"=>$originalFileName,
                    "domain"=> $domain
                ]);
                return $return_json;
                // $res =  $domain.'/admin/upload/ue_html?result='.$return_json;
                
                // return redirect($res);
                // return '<html><head><script>document.domain = "'.$domain.'";</script></head><body>'.$return_json.'</body></html>';
                
            } catch(\think\exception\ValidateException $e){
                return success(null, '上传失败:'.self::_languageChange($e->getMessage()), 500);
            }   
        }

    }
}