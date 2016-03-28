<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Admin Login (backend)
 */
Route::get('admin/login', 'Auth\AuthController@getadmin');
Route::post('admin/login', 'Auth\AuthController@postadmin');

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{

	/*
	 * Specific to Admin Dashboard
	 */
	Route::get('admin/dashboard', 'HomeController@create');

	Route::get('admin', 
  		['as' => 'admin/dashboard', 'uses' => 'HomeController@create']);


	/*
	 * Specific to Admin Logout
	 */
	Route::get('admin/logout', 'Auth\AuthController@AdminLogout');

	/**
	 * Routes that are related to create groups 
	 */
	Route::get('admin/groups/create', 'GroupController@create');
	Route::post('admin/groups/create', 'GroupController@store');

	/**
	 * Routes that are related to list groups 
	 */
	Route::get('admin/groups', 'GroupController@index');
	Route::post('admin/groups', 'GroupController@operations');

	/**
	 * Routes that are related to opertions to edit or delete groups 
	 */
	Route::get('admin/groups/{id}/edit', 'GroupController@edit');
	Route::post('admin/groups/{id}/edit', 'GroupController@update');

	Route::get('admin/groups/{id}/delete', 'GroupController@show');
	Route::post('admin/groups/{id}/delete', 'GroupController@destroy');
	Route::get('admin/groups/all/{string}/delete', 'GroupController@show_all');
	Route::post('admin/groups/all/{string}/delete', 'GroupController@destroy_all');

	Route::get('admin/groups/get', 'GroupController@get');
	Route::get('admin/settings/get', 'HomeController@getsettings');
	/**
	 * Routes that are related to create Admins 
	 */
	Route::get('admin/admins/create', 'Auth\AuthController@createadmins');
	Route::post('admin/admins/create', 'Auth\AuthController@storeadmins');

	/**
	 * list all admins
	 */
	Route::get('admin/admins', 'AdminsController@index');
	Route::post('admin/admins', 'AdminsController@operations');

	Route::get('admin/admins/{id}/edit', 'AdminsController@edit');
	Route::post('admin/admins/{id}/edit', 'AdminsController@update');

	Route::get('admin/admins/{id}/delete', 'AdminsController@show');
	Route::post('admin/admins/{id}/delete', 'AdminsController@destroy');

	Route::get('admin/admins/all/{string}/delete', 'AdminsController@show_all');
	Route::post('admin/admins/all/{string}/delete', 'AdminsController@destroy_all');

	/*
	 * Edit Admin Information
	 */
	Route::get('admin/profile', 'AdminsController@edit_profile');
	Route::post('admin/profile', 'AdminsController@update_profile');


	/**
	 * Routes that are related to create sections 
	 */
	Route::get('admin/sections/create', 'SectionController@create');
	Route::post('admin/sections/create', 'SectionController@store');

	/**
	 * Routes that are related to list sections 
	 */
	Route::get('admin/sections', 'SectionController@index');
	Route::post('admin/sections', 'SectionController@operations');

	/**
	 * Routes that are related to opertions to edit or delete sections 
	 */
	Route::get('admin/sections/{id}/edit', 'SectionController@edit');
	Route::post('admin/sections/{id}/edit', 'SectionController@update');

	Route::get('admin/sections/{id}/delete', 'SectionController@show');
	Route::post('admin/sections/{id}/delete', 'SectionController@destroy');
	Route::get('admin/sections/all/{string}/delete', 'SectionController@show_all');
	Route::post('admin/sections/all/{string}/delete', 'SectionController@destroy_all');

	/**
	 * Routes that are related to create News 
	 */
	Route::get('admin/news/create', 'NewsController@create');
	Route::post('admin/news/create', 'NewsController@store');

	/**
	 * Routes that are related to list news 
	 */
	Route::get('admin/news', 'NewsController@index');
	Route::post('admin/news', 'NewsController@operations');

	/**
	 * Routes that are related to opertions to edit or delete news 
	 */
	Route::get('admin/news/{id}/edit', 'NewsController@edit');
	Route::post('admin/news/{id}/edit', 'NewsController@update');

	Route::get('admin/news/{id}/delete', 'NewsController@show');
	Route::post('admin/news/{id}/delete', 'NewsController@destroy');
	Route::get('admin/news/all/{string}/delete', 'NewsController@show_all');
	Route::post('admin/news/all/{string}/delete', 'NewsController@destroy_all');


	/**
	 * Contact Us related routes (back-end)
	 */
	Route::get('admin/contact-us/gmap', 'ContactUsController@show');
	Route::post('admin/contact-us/gmap', 'ContactUsController@store');

	Route::get('admin/contact-us/gmap/edit', 'ContactUsController@edit');
	Route::post('admin/contact-us/gmap/edit', 'ContactUsController@update');

	Route::get('admin/contact-us/cont-info', 'ContactUsController@create');
	Route::post('admin/contact-us/cont-info', 'ContactUsController@save');

	Route::get('admin/contact-us/cont-info/edit', 'ContactUsController@edit_contact_info');
	Route::post('admin/contact-us/cont-info/edit', 'ContactUsController@update_contact_info');

	Route::get('admin/contact-us/contacts', 'ContactUsController@index');
	Route::post('admin/contact-us/contacts', 'ContactUsController@operations');

	Route::get('admin/contact-us/contacts/all/{id}/delete', 'ContactUsController@show_delete');
	Route::post('admin/contact-us/contacts/all/{id}/delete', 'ContactUsController@destroy');

	Route::get('admin/contact-us/contacts-replied', 'ContactUsController@index_replied');
	Route::post('admin/contact-us/contacts-replied', 'ContactUsController@operations_replied');

	Route::get('admin/contact-us/contacts-replied/all/{id}/delete', 'ContactUsController@show_delete_replied');
	Route::post('admin/contact-us/contacts-replied/all/{id}/delete', 'ContactUsController@destroy_replied');

	Route::get('admin/contact-us/contacts/{id}', 'ContactUsController@single_contact');
	Route::post('admin/contact-us/contacts/{id}', 'ContactUsController@reply_message');

	Route::get('admin/messages/get', 'ContactUsController@get');

			#Pages
		Route::get('admin/pages/create', 'PagesController@create');
		Route::post('admin/pages', 'PagesController@store');
		Route::get('admin/pages', 'PagesController@index');
		Route::get('admin/pages/{id}/edit', 'PagesController@edit');
		Route::patch('admin/pages/{id}', 'PagesController@update');
		//Route::post('admin/pages', 'PagesController@show');
		Route::get('admin/pages/{id}/delete', 'PagesController@destroyconfirm');
		Route::DELETE('admin/pages/{id}/destroy', 'PagesController@destroy');

		#Menus
		//Route::get('admin/menus/create', 'MenusController@create');
		//Route::post('admin/menus', 'MenusController@store');
		Route::get('admin/menus', 'MenusController@index');
		Route::post('admin/menus/{id}', 'MenusController@save');
		//Route::get('admin/menus/{id}/edit', 'MenusController@edit');
		//Route::patch('admin/menus/{id}', 'MenusController@update');
		//Route::get('admin/menus/{id}/delete', 'MenusController@destroyconfirm');
		//Route::DELETE('admin/menus/{id}/destroy', 'MenusController@destroy');
		Route::get('admin/menus/{menu_id}/links', 'MenusController@list_links');
		Route::get('admin/menus/create-link', 'MenusController@create_link');
		Route::post('admin/menus', 'MenusController@store_link');
		Route::get('admin/menus/{menu_id}/links/{link_id}/edit', 'MenusController@edit_link');
		Route::patch('admin/menus/{menu_id}/links/{link_id}', 'MenusController@update_link');
		Route::get('admin/menus/{menu_id}/links/{link_id}/delete', 'MenusController@delete_link');
		Route::DELETE('admin/menus/{menu_id}/links/{link_id}', 'MenusController@destroy_link');

	/**
	 * Routes that are related to list opinions 
	 */
	Route::get('admin/opinions', 'OpinionController@index');
	Route::post('admin/opinions', 'OpinionController@operations');

	/**
	 * Routes that are related to opertions to edit or delete opinions 
	 */
	Route::get('admin/opinions/create', 'OpinionController@create');
	Route::post('admin/opinions/create', 'OpinionController@store');

	Route::get('admin/opinions/{id}/edit', 'OpinionController@edit');
	Route::post('admin/opinions/{id}/edit', 'OpinionController@update');

	Route::get('admin/opinions/{id}/delete', 'OpinionController@show');
	Route::post('admin/opinions/{id}/delete', 'OpinionController@destroy');
	Route::get('admin/opinions/all/{string}/delete', 'OpinionController@show_all');
	Route::post('admin/opinions/all/{string}/delete', 'OpinionController@destroy_all');

	/**
	 * Routes that are related to list advertisements 
	 */
	Route::get('admin/advertisements', 'AdvertisementController@index');
	Route::post('admin/advertisements', 'AdvertisementController@operations');

	/**
	 * Routes that are related to opertions to edit or delete advertisements 
	 */
	Route::get('admin/advertisements/create', 'AdvertisementController@create');
	Route::post('admin/advertisements/create', 'AdvertisementController@store');

	Route::get('admin/advertisements/{id}/edit', 'AdvertisementController@edit');
	Route::post('admin/advertisements/{id}/edit', 'AdvertisementController@update');

	Route::get('admin/advertisements/{id}/delete', 'AdvertisementController@show');
	Route::post('admin/advertisements/{id}/delete', 'AdvertisementController@destroy');
	Route::get('admin/advertisements/all/{string}/delete', 'AdvertisementController@show_all');
	Route::post('admin/advertisements/all/{string}/delete', 'AdvertisementController@destroy_all');

	Route::get('admin/advertisements/{id}/renew', 'AdvertisementController@renew');
	Route::post('admin/advertisements/{id}/renew', 'AdvertisementController@post_renew');

	/**
	 * Routes related to publis settings
	 */
	Route::get('admin/settings/edit', 'SettingsController@edit');
	Route::post('admin/settings/edit', 'SettingsController@update');

	/**
	 * Social Media profile related routes (back-end)
	 *
	 */
	Route::get('admin/social-media', 'SocialMediaController@index');
	Route::post('admin/social-media', 'SocialMediaController@operations');

	Route::get('admin/social-media/create', 'SocialMediaController@create');
	Route::post('admin/social-media/create', 'SocialMediaController@store');

	Route::get('admin/social-media/{id}/edit', 'SocialMediaController@edit');
	Route::post('admin/social-media/{id}/edit', 'SocialMediaController@update');

	Route::get('admin/social-media/{id}/delete', 'SocialMediaController@show');
	Route::post('admin/social-media/{id}/delete', 'SocialMediaController@destroy');

	
	Route::get('admin/social-media/list/all/{id}/delete', 'SocialMediaController@show');
	Route::post('admin/social-media/list/all/{id}/delete', 'SocialMediaController@destroy_all');

	/**
	 * Reports News related routes (back-end)
	 *
	 */
	Route::get('admin/report/news', 'ReportController@index');
	Route::post('admin/report/news', 'ReportController@operations');

	Route::get('admin/report/news/print/{id}', 'ReportController@create');

	/**
	 * Reports Advertisements related routes (back-end)
	 *
	 */
	Route::get('admin/report/advertisements', 'ReportController@index_adv');
	Route::post('admin/report/advertisements', 'ReportController@operations_adv');

	Route::get('admin/report/advertisements/print/{id}', 'ReportController@create_adv');
});
/*********** FRONT-END ROUTES ***************/

Route::get('', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('section/{name}', 'HomeController@section_view');
Route::get('story/{date}/{title}', 'HomeController@news');
Route::get('page/{title}', 'HomeController@get_page');
Route::get('tags/{title}', 'HomeController@get_tags');
Route::get('features/{title}', 'HomeController@get_news_features');
Route::get('opinions', 'HomeController@get_opinion');
Route::post('opinions', 'HomeController@post_opinion');
Route::get('social', 'HomeController@getsocial');
Route::get('tags', 'HomeController@gettags');
Route::get('advs', 'HomeController@getadvs');

/**
 * Contact Us related routes (front-end)
 */
Route::get('contact', 'ContactUsFrontEndController@create');
Route::post('contact', 'ContactUsFrontEndController@store');


// Route group for API versioning
Route::group(array('prefix' => 'api', 'before' => 'auth'), function()
{
    Route::get('sections', 'APIController@sections');
    Route::get('news', 'APIController@news');
    Route::get('groups', 'APIController@groups');
    Route::get('users', 'APIController@users');
    Route::get('news-most-visits', 'APIController@news_most_visits');
    Route::get('settings', 'APIController@settings');
});

// Route group for API versioning Specified for NEWS GROUP BY SECTION ID
Route::group(array('prefix' => 'api', 'before' => 'auth', 'section_id'), function()
{
    Route::get('news-related-section', 'APIController@news_related_section');
});

// Route group for API versioning Specified for NEWS ID (SINGLE NEWS)
Route::group(array('prefix' => 'api', 'before' => 'auth', 'id'), function()
{
    Route::get('news-single', 'APIController@singlenews');
});


// Route group for API versioning Specified for NEWS GROUP BY SECTION ID
Route::group(array('prefix' => 'api', 'before' => 'auth', 'group_id'), function()
{
    Route::get('users-related-groups', 'APIController@users_related_group');
});