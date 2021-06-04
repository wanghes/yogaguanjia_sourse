<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;


// 封面文件上传
Route::post('/course/upload_cover', 'MainUpload/upload');

// 封面文件上传
Route::post('/upload/upload_tuanke_cover', 'MainUpload/uploadTuanke');
Route::post('/upload/upload_banke_cover', 'MainUpload/uploadBanke');
Route::post('/upload/teacher_head', 'MainUpload/teacherHead');
Route::post('/upload/teacher_id_card', 'MainUpload/teacherIdCard');
Route::post('/upload/upload_flash_sale_cover', 'MainUpload/uploadFlashSaleCover');
Route::post('/upload/upload_group_purchase_cover', 'MainUpload/uploadGroupPurchaseCover');
Route::post('/upload/focus', 'MainUpload/focus');
Route::post('/upload/card_cover', 'MainUpload/uploadCardCover');

// 上传场馆主的主题图片
Route::post('/upload/venues', 'MainUpload/uploadVenues');

// 视频上传
Route::post('/course/upload_video', 'MainUpload/uploadVideo');
// 用户自己上传用户头像
Route::post('/upload/member_head', 'MainUpload/userHead');

// 针对UEditor的文件上传 主要还是图片
Route::get('upload/ue_upload', 'MainUpload/uploadContentImg');
Route::post('upload/ue_upload', 'MainUpload/uploadContentImg');

