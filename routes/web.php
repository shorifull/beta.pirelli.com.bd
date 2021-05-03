<?php

//Route::redirect('/', '/login');
//Route::get('/home', function () {
//    if (session('status')) {
//        return redirect()->route('admin.home')->with('status', session('status'));
//    }
//
//    return redirect()->route('admin.home');
//});

/*--------------------------------------------------------------
# Search Routes
--------------------------------------------------------------*/

Route::get('search', 'HomePageController@table')->name('search');
Route::get('categories/{category}', 'HomePageController@category')->name('category');
Route::get('companies/{company}', 'HomePageController@company')->name('company');


Route::get('/','HomeController@index')->name('home');
Route::get('/admin','HomeController@admin')->name('admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Brand
    Route::delete('brands/destroy', 'BrandController@massDestroy')->name('brands.massDestroy');
    Route::resource('brands', 'BrandController');

    // Body
    Route::delete('bodies/destroy', 'BodyController@massDestroy')->name('bodies.massDestroy');
    Route::resource('bodies', 'BodyController');

    // Fuel
    Route::delete('fuels/destroy', 'FuelController@massDestroy')->name('fuels.massDestroy');
    Route::resource('fuels', 'FuelController');

    // Transmission
    Route::delete('transmissions/destroy', 'TransmissionController@massDestroy')->name('transmissions.massDestroy');
    Route::resource('transmissions', 'TransmissionController');

    // Engine
    Route::delete('engines/destroy', 'EngineController@massDestroy')->name('engines.massDestroy');
    Route::resource('engines', 'EngineController');

    // Chassis
    Route::delete('chassis/destroy', 'ChassisController@massDestroy')->name('chassis.massDestroy');
    Route::resource('chassis', 'ChassisController');

    // Year
    Route::delete('years/destroy', 'YearController@massDestroy')->name('years.massDestroy');
    Route::resource('years', 'YearController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Car Model
    Route::delete('car-models/destroy', 'CarModelController@massDestroy')->name('car-models.massDestroy');
    Route::resource('car-models', 'CarModelController');

    // Size
    Route::delete('sizes/destroy', 'SizeController@massDestroy')->name('sizes.massDestroy');
    Route::resource('sizes', 'SizeController');

    // Ratio
    Route::delete('ratios/destroy', 'RatioController@massDestroy')->name('ratios.massDestroy');
    Route::resource('ratios', 'RatioController');

    // Width
    Route::delete('widths/destroy', 'WidthController@massDestroy')->name('widths.massDestroy');
    Route::resource('widths', 'WidthController');

    // Tyre
    Route::delete('tyres/destroy', 'TyreController@massDestroy')->name('tyres.massDestroy');
    Route::post('tyres/media', 'TyreController@storeMedia')->name('tyres.storeMedia');
    Route::post('tyres/ckmedia', 'TyreController@storeCKEditorImages')->name('tyres.storeCKEditorImages');
    Route::resource('tyres', 'TyreController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq
    Route::delete('faqs/destroy', 'FaqController@massDestroy')->name('faqs.massDestroy');
    Route::post('faqs/media', 'FaqController@storeMedia')->name('faqs.storeMedia');
    Route::post('faqs/ckmedia', 'FaqController@storeCKEditorImages')->name('faqs.storeCKEditorImages');
    Route::resource('faqs', 'FaqController');

    // Vehicle Type
    Route::delete('vehicle-types/destroy', 'VehicleTypeController@massDestroy')->name('vehicle-types.massDestroy');
    Route::resource('vehicle-types', 'VehicleTypeController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::resource('products', 'ProductController');

    // Product Size
    Route::delete('product-sizes/destroy', 'ProductSizeController@massDestroy')->name('product-sizes.massDestroy');
    Route::resource('product-sizes', 'ProductSizeController');

    // City
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Retailer
    Route::delete('retailers/destroy', 'RetailerController@massDestroy')->name('retailers.massDestroy');
    Route::resource('retailers', 'RetailerController');

    // Social
    Route::delete('socials/destroy', 'SocialController@massDestroy')->name('socials.massDestroy');
    Route::resource('socials', 'SocialController');

    // Car Slider
    Route::delete('car-sliders/destroy', 'CarSliderController@massDestroy')->name('car-sliders.massDestroy');
    Route::post('car-sliders/media', 'CarSliderController@storeMedia')->name('car-sliders.storeMedia');
    Route::post('car-sliders/ckmedia', 'CarSliderController@storeCKEditorImages')->name('car-sliders.storeCKEditorImages');
    Route::resource('car-sliders', 'CarSliderController');

    // Moto Slider
    Route::delete('moto-sliders/destroy', 'MotoSliderController@massDestroy')->name('moto-sliders.massDestroy');
    Route::post('moto-sliders/media', 'MotoSliderController@storeMedia')->name('moto-sliders.storeMedia');
    Route::post('moto-sliders/ckmedia', 'MotoSliderController@storeCKEditorImages')->name('moto-sliders.storeCKEditorImages');
    Route::resource('moto-sliders', 'MotoSliderController');

    // Warranty Claim
    Route::delete('warranty-claims/destroy', 'WarrantyClaimController@massDestroy')->name('warranty-claims.massDestroy');
    Route::post('warranty-claims/media', 'WarrantyClaimController@storeMedia')->name('warranty-claims.storeMedia');
    Route::post('warranty-claims/ckmedia', 'WarrantyClaimController@storeCKEditorImages')->name('warranty-claims.storeCKEditorImages');
    Route::resource('warranty-claims', 'WarrantyClaimController');

    // Moto Registration
    Route::delete('moto-registrations/destroy', 'MotoRegistrationController@massDestroy')->name('moto-registrations.massDestroy');
    Route::post('moto-registrations/media', 'MotoRegistrationController@storeMedia')->name('moto-registrations.storeMedia');
    Route::post('moto-registrations/ckmedia', 'MotoRegistrationController@storeCKEditorImages')->name('moto-registrations.storeCKEditorImages');
    Route::resource('moto-registrations', 'MotoRegistrationController');

    // Car Registration
    Route::delete('car-registrations/destroy', 'CarRegistrationController@massDestroy')->name('car-registrations.massDestroy');
    Route::post('car-registrations/media', 'CarRegistrationController@storeMedia')->name('car-registrations.storeMedia');
    Route::post('car-registrations/ckmedia', 'CarRegistrationController@storeCKEditorImages')->name('car-registrations.storeCKEditorImages');
    Route::resource('car-registrations', 'CarRegistrationController');

    // Header
    Route::delete('headers/destroy', 'HeaderController@massDestroy')->name('headers.massDestroy');
    Route::post('headers/media', 'HeaderController@storeMedia')->name('headers.storeMedia');
    Route::post('headers/ckmedia', 'HeaderController@storeCKEditorImages')->name('headers.storeCKEditorImages');
    Route::resource('headers', 'HeaderController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    // Footer
    Route::delete('footers/destroy', 'FooterController@massDestroy')->name('footers.massDestroy');
    Route::resource('footers', 'FooterController');

    // Email
    Route::delete('emails/destroy', 'EmailController@massDestroy')->name('emails.massDestroy');
    Route::resource('emails', 'EmailController');

    // Page
    Route::delete('pages/destroy', 'PageController@massDestroy')->name('pages.massDestroy');
    Route::post('pages/media', 'PageController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PageController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::resource('pages', 'PageController');

    // Page Menu
    Route::delete('page-menus/destroy', 'PageMenuController@massDestroy')->name('page-menus.massDestroy');
    Route::resource('page-menus', 'PageMenuController');

    // Other Menu
    Route::delete('other-menus/destroy', 'OtherMenuController@massDestroy')->name('other-menus.massDestroy');
    Route::resource('other-menus', 'OtherMenuController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
