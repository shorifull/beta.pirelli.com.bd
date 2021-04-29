<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Brand
    Route::apiResource('brands', 'BrandApiController');

    // Body
    Route::apiResource('bodies', 'BodyApiController');

    // Fuel
    Route::apiResource('fuels', 'FuelApiController');

    // Transmission
    Route::apiResource('transmissions', 'TransmissionApiController');

    // Engine
    Route::apiResource('engines', 'EngineApiController');

    // Chassis
    Route::apiResource('chassis', 'ChassisApiController');

    // Year
    Route::apiResource('years', 'YearApiController');

    // Category
    Route::apiResource('categories', 'CategoryApiController');

    // Car Model
    Route::apiResource('car-models', 'CarModelApiController');

    // Size
    Route::apiResource('sizes', 'SizeApiController');

    // Ratio
    Route::apiResource('ratios', 'RatioApiController');

    // Width
    Route::apiResource('widths', 'WidthApiController');

    // Tyre
    Route::post('tyres/media', 'TyreApiController@storeMedia')->name('tyres.storeMedia');
    Route::apiResource('tyres', 'TyreApiController');

    // Faq Category
    Route::apiResource('faq-categories', 'FaqCategoryApiController');

    // Faq
    Route::post('faqs/media', 'FaqApiController@storeMedia')->name('faqs.storeMedia');
    Route::apiResource('faqs', 'FaqApiController');

    // Vehicle Type
    Route::apiResource('vehicle-types', 'VehicleTypeApiController');

    // Product
    Route::apiResource('products', 'ProductApiController');

    // Product Size
    Route::apiResource('product-sizes', 'ProductSizeApiController');

    // City
    Route::apiResource('cities', 'CityApiController');

    // Retailer
    Route::apiResource('retailers', 'RetailerApiController');

    // Social
    Route::apiResource('socials', 'SocialApiController');

    // Car Slider
    Route::post('car-sliders/media', 'CarSliderApiController@storeMedia')->name('car-sliders.storeMedia');
    Route::apiResource('car-sliders', 'CarSliderApiController');

    // Moto Slider
    Route::post('moto-sliders/media', 'MotoSliderApiController@storeMedia')->name('moto-sliders.storeMedia');
    Route::apiResource('moto-sliders', 'MotoSliderApiController');

    // Warranty Claim
    Route::post('warranty-claims/media', 'WarrantyClaimApiController@storeMedia')->name('warranty-claims.storeMedia');
    Route::apiResource('warranty-claims', 'WarrantyClaimApiController');

    // Moto Registration
    Route::post('moto-registrations/media', 'MotoRegistrationApiController@storeMedia')->name('moto-registrations.storeMedia');
    Route::apiResource('moto-registrations', 'MotoRegistrationApiController');

    // Car Registration
    Route::post('car-registrations/media', 'CarRegistrationApiController@storeMedia')->name('car-registrations.storeMedia');
    Route::apiResource('car-registrations', 'CarRegistrationApiController');

    // Header
    Route::post('headers/media', 'HeaderApiController@storeMedia')->name('headers.storeMedia');
    Route::apiResource('headers', 'HeaderApiController');

    // Contact
    Route::apiResource('contacts', 'ContactApiController');

    // Footer
    Route::apiResource('footers', 'FooterApiController');

    // Email
    Route::apiResource('emails', 'EmailApiController');

    // Page
    Route::post('pages/media', 'PageApiController@storeMedia')->name('pages.storeMedia');
    Route::apiResource('pages', 'PageApiController');

    // Page Menu
    Route::apiResource('page-menus', 'PageMenuApiController');

    // Other Menu
    Route::apiResource('other-menus', 'OtherMenuApiController');
});
