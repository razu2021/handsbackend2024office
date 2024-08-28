<?php

use App\Http\Controllers\admin\manage_application\addressManageController;
use App\Http\Controllers\admin\manage_application\categoryController;
use App\Http\Controllers\admin\manage_application\emailManageController;
use App\Http\Controllers\admin\manage_application\phoneManageController;
use App\Http\Controllers\admin\manage_application\socialMediaController;
use App\Http\Controllers\admin\manage_application\socialMediaUrlController;
use App\Http\Controllers\admin\manage_application\subCategoryController;
use App\Http\Controllers\admin\recycle\recyclebinController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\manage_application\mainmenuController;


Route::middleware('auth:admin')->group(function () {
    Route::get('admin/dashboard/manage_application/recycle', [recyclebinController::class, 'index']);

    /*-------- manage enrair menu --------*/
    Route::get('admin/dashboard/manage-application/main-menu', [mainmenuController::class, 'index']);
    Route::get('admin/dashboard/manage-application/main-menu/add', [mainmenuController::class, 'add']);
    Route::get('admin/dashboard/manage-application/main-menu/edit/{slug}', [mainmenuController::class, 'edit']);
    Route::get('admin/dashboard/manage-application/main-menu/view/{slug}', [mainmenuController::class, 'view']);
    Route::post('admin/dashboard/manage-application/main-menu/submit', [mainmenuController::class, 'insert']);
    Route::post('admin/dashboard/manage-application/main-menu/update', [mainmenuController::class, 'update']);
    Route::get('admin/dashboard/manage-application/main-menu/softdelete/{id}', [mainmenuController::class, 'softdelete']);
    Route::get('admin/dashboard/manage-application/main-menu/restore/{id}', [mainmenuController::class, 'restore']);
    Route::get('admin/dashboard/manage-application/main-menu/delete/{id}', [mainmenuController::class, 'delete']);
    Route::get('admin/dashboard/manage-application/main-menu/recycle', [mainmenuController::class, 'recycle']);
    Route::get('admin/dashboard/manage-application/main-menu/post_active/{id}', [mainmenuController::class, 'post_active']);
    Route::get('admin/dashboard/manage-application/main-menu/post_deactive/{id}', [mainmenuController::class, 'post_deactive']);
    /*-------- Category menu  enrair menu --------*/
    Route::get('admin/dashboard/manage-application/category', [categoryController::class, 'index']);
    Route::get('admin/dashboard/manage-application/category/add', [categoryController::class, 'add']);
    Route::get('admin/dashboard/manage-application/category/edit/{slug}', [categoryController::class, 'edit']);
    Route::get('admin/dashboard/manage-application/category/view/{slug}', [categoryController::class, 'view']);
    Route::post('admin/dashboard/manage-application/category/submit', [categoryController::class, 'insert']);
    Route::post('admin/dashboard/manage-application/category/update', [categoryController::class, 'update']);
    Route::get('admin/dashboard/manage-application/category/softdelete/{id}', [categoryController::class, 'softdelete']);
    Route::get('admin/dashboard/manage-application/category/restore/{id}', [categoryController::class, 'restore']);
    Route::get('admin/dashboard/manage-application/category/delete/{id}', [categoryController::class, 'delete']);
    Route::get('admin/dashboard/manage-application/category/recycle', [categoryController::class, 'recycle']);
    Route::get('admin/dashboard/manage-application/category/post_active/{id}', [categoryController::class, 'post_active']);
    Route::get('admin/dashboard/manage-application/category/post_deactive/{id}', [categoryController::class, 'post_deactive']);
    
    /*-------- Subcategory menu  --------*/
    Route::get('admin/dashboard/manage-application/subcategory', [subCategoryController::class, 'index']);
    Route::get('admin/dashboard/manage-application/subcategory/add', [subCategoryController::class, 'add']);
    Route::get('admin/dashboard/manage-application/subcategory/edit/{slug}', [subCategoryController::class, 'edit']);
    Route::get('admin/dashboard/manage-application/subcategory/view/{slug}', [subCategoryController::class, 'view']);
    Route::post('admin/dashboard/manage-application/subcategory/submit', [subCategoryController::class, 'insert']);
    Route::post('admin/dashboard/manage-application/subcategory/update', [subCategoryController::class, 'update']);
    Route::get('admin/dashboard/manage-application/subcategory/softdelete/{id}', [subCategoryController::class, 'softdelete']);
    Route::get('admin/dashboard/manage-application/subcategory/restore/{id}', [subCategoryController::class, 'restore']);
    Route::get('admin/dashboard/manage-application/subcategory/delete/{id}', [subCategoryController::class, 'delete']);
    Route::get('admin/dashboard/manage-application/subcategory/recycle', [subCategoryController::class, 'recycle']);
    Route::get('admin/dashboard/manage-application/subcategory/post_active/{id}', [subCategoryController::class, 'post_active']);
    Route::get('admin/dashboard/manage-application/subcategory/post_deactive/{id}', [subCategoryController::class, 'post_deactive']);
    /*-------- add social media  menu  --------*/
    Route::get('admin/dashboard/manage-application/socialmedia', [socialMediaController::class, 'index']);
    Route::get('admin/dashboard/manage-application/socialmedia/add', [socialMediaController::class, 'add']);
    Route::get('admin/dashboard/manage-application/socialmedia/edit/{slug}', [socialMediaController::class, 'edit']);
    Route::get('admin/dashboard/manage-application/socialmedia/view/{slug}', [socialMediaController::class, 'view']);
    Route::post('admin/dashboard/manage-application/socialmedia/submit', [socialMediaController::class, 'insert']);
    Route::post('admin/dashboard/manage-application/socialmedia/update', [socialMediaController::class, 'update']);
    Route::get('admin/dashboard/manage-application/socialmedia/softdelete/{id}', [socialMediaController::class, 'softdelete']);
    Route::get('admin/dashboard/manage-application/socialmedia/restore/{id}', [socialMediaController::class, 'restore']);
    Route::get('admin/dashboard/manage-application/socialmedia/delete/{id}', [socialMediaController::class, 'delete']);
    Route::get('admin/dashboard/manage-application/socialmedia/recycle', [socialMediaController::class, 'recycle']);
    Route::get('admin/dashboard/manage-application/socialmedia/post_active/{id}', [socialMediaController::class, 'post_active']);
    Route::get('admin/dashboard/manage-application/socialmedia/post_deactive/{id}', [socialMediaController::class, 'post_deactive']);
    /*-------- add social media  Route --------*/
    Route::get('admin/dashboard/manage-application/socialmediaurl', [socialMediaUrlController::class, 'index']);
    Route::get('admin/dashboard/manage-application/socialmediaurl/add', [socialMediaUrlController::class, 'add']);
    Route::get('admin/dashboard/manage-application/socialmediaurl/edit/{slug}', [socialMediaUrlController::class, 'edit']);
    Route::get('admin/dashboard/manage-application/socialmediaurl/view/{slug}', [socialMediaUrlController::class, 'view']);
    Route::post('admin/dashboard/manage-application/socialmediaurl/submit', [socialMediaUrlController::class, 'insert']);
    Route::post('admin/dashboard/manage-application/socialmediaurl/update', [socialMediaUrlController::class, 'update']);
    Route::get('admin/dashboard/manage-application/socialmediaurl/softdelete/{id}', [socialMediaUrlController::class, 'softdelete']);
    Route::get('admin/dashboard/manage-application/socialmediaurl/restore/{id}', [socialMediaUrlController::class, 'restore']);
    Route::get('admin/dashboard/manage-application/socialmediaurl/delete/{id}', [socialMediaUrlController::class, 'delete']);
    Route::get('admin/dashboard/manage-application/socialmediaurl/recycle', [socialMediaUrlController::class, 'recycle']);
    Route::get('admin/dashboard/manage-application/socialmediaurl/post_active/{id}', [socialMediaUrlController::class, 'post_active']);
    Route::get('admin/dashboard/manage-application/socialmediaurl/post_deactive/{id}', [socialMediaUrlController::class, 'post_deactive']);
    /*--------  Phone route  --------*/
    Route::get('admin/dashboard/manage-application/phone', [phoneManageController::class, 'index']);
    Route::get('admin/dashboard/manage-application/phone/add', [phoneManageController::class, 'add']);
    Route::get('admin/dashboard/manage-application/phone/edit/{slug}', [phoneManageController::class, 'edit']);
    Route::get('admin/dashboard/manage-application/phone/view/{slug}', [phoneManageController::class, 'view']);
    Route::post('admin/dashboard/manage-application/phone/submit', [phoneManageController::class, 'insert']);
    Route::post('admin/dashboard/manage-application/phone/update', [phoneManageController::class, 'update']);
    Route::get('admin/dashboard/manage-application/phone/softdelete/{id}', [phoneManageController::class, 'softdelete']);
    Route::get('admin/dashboard/manage-application/phone/restore/{id}', [phoneManageController::class, 'restore']);
    Route::get('admin/dashboard/manage-application/phone/delete/{id}', [phoneManageController::class, 'delete']);
    Route::get('admin/dashboard/manage-application/phone/recycle', [phoneManageController::class, 'recycle']);
    Route::get('admin/dashboard/manage-application/phone/post_active/{id}', [phoneManageController::class, 'post_active']);
    Route::get('admin/dashboard/manage-application/phone/post_deactive/{id}', [phoneManageController::class, 'post_deactive']);
    /*--------  Email route  --------*/
    Route::get('admin/dashboard/manage-application/email', [emailManageController::class, 'index']);
    Route::get('admin/dashboard/manage-application/email/add', [emailManageController::class, 'add']);
    Route::get('admin/dashboard/manage-application/email/edit/{slug}', [emailManageController::class, 'edit']);
    Route::get('admin/dashboard/manage-application/email/view/{slug}', [emailManageController::class, 'view']);
    Route::post('admin/dashboard/manage-application/email/submit', [emailManageController::class, 'insert']);
    Route::post('admin/dashboard/manage-application/email/update', [emailManageController::class, 'update']);
    Route::get('admin/dashboard/manage-application/email/softdelete/{id}', [emailManageController::class, 'softdelete']);
    Route::get('admin/dashboard/manage-application/email/restore/{id}', [emailManageController::class, 'restore']);
    Route::get('admin/dashboard/manage-application/email/delete/{id}', [emailManageController::class, 'delete']);
    Route::get('admin/dashboard/manage-application/email/recycle', [emailManageController::class, 'recycle']);
    Route::get('admin/dashboard/manage-application/email/post_active/{id}', [emailManageController::class, 'post_active']);
    Route::get('admin/dashboard/manage-application/email/post_deactive/{id}', [emailManageController::class, 'post_deactive']);
        /*--------  address route  --------*/
    Route::get('admin/dashboard/manage-application/address', [addressManageController::class, 'index']);
    Route::get('admin/dashboard/manage-application/address/add', [addressManageController::class, 'add']);
    Route::get('admin/dashboard/manage-application/address/edit/{slug}', [addressManageController::class, 'edit']);
    Route::get('admin/dashboard/manage-application/address/view/{slug}', [addressManageController::class, 'view']);
    Route::post('admin/dashboard/manage-application/address/submit', [addressManageController::class, 'insert']);
    Route::post('admin/dashboard/manage-application/address/update', [addressManageController::class, 'update']);
    Route::get('admin/dashboard/manage-application/address/softdelete/{id}', [addressManageController::class, 'softdelete']);
    Route::get('admin/dashboard/manage-application/address/restore/{id}', [addressManageController::class, 'restore']);
    Route::get('admin/dashboard/manage-application/address/delete/{id}', [addressManageController::class, 'delete']);
    Route::get('admin/dashboard/manage-application/address/recycle', [addressManageController::class, 'recycle']);
    Route::get('admin/dashboard/manage-application/address/post_active/{id}', [addressManageController::class, 'post_active']);
    Route::get('admin/dashboard/manage-application/address/post_deactive/{id}', [addressManageController::class, 'post_deactive']);




});



require __DIR__.'/adminauth.php';




