<?php


//Search Routes

Route::get('search', 'HomeController@table')->name('search');
Route::post('newsletter', 'HomeController@newsletter')->name('newsletter');



Route::get('car-search-by-size', 'HomeController@carSearchBySize')->name('car-search-by-size');

Route::get('moto-search', 'HomeController@motoTyreSearchByModel')->name('moto-search-by-model');

Route::get('moto-search-by-size', 'HomeController@motoTyreSearchBySize')->name('moto-search-by-size');

Route::get('/get_moto_models_by_brand', 'HomeController@getMotoModelsByBrand')->name('get_moto_models_by_brand');

Route::get('/get_moto_engines_by_model', 'HomeController@getMotoEnginesByModel')->name('get_moto_engines_by_model');





Route::get('/','HomeController@index')->name('home');
Route::get('/moto','HomeController@motoHome')->name('moto-home');
Route::get('/car','HomeController@carHome')->name('car-home');
Route::get('/car-retailer','HomeController@carRetailerList')->name('car-retailer-list');
Route::get('/moto-retailer','HomeController@motoRetailerList')->name('moto-retailer-list');

Route::get('retailer/{retailer}', 'HomeController@show')->name('retailer');
Route::get('/contact','HomeController@createForm')->name('contact');
Route::get('/about','HomeController@about')->name('about');
Route::get('/privacy-policy','HomeController@privacyPolicy')->name('privacy-policy');
Route::get('/terms-and-conditions','HomeController@termsConditions')->name('terms-conditions');
Route::get('/return-refund-policy','HomeController@returnRefund')->name('return-refund-policy');


Route::get('/runflat','HomeController@runflat')->name('runflat');
Route::post('/contact','HomeController@contactSubmit')->name('contact.submit');

Route::get('tyre/moto/{slug}', 'HomeController@showMotoTyre')->name('moto-tyre');
Route::get('tyre/car/{slug}', 'HomeController@showCarTyre')->name('car-tyre');


Route::get('tyre-tech-knowledge', 'HomeController@tyreTechKnowledge')->name('tyre-tech-knowledge');
Route::get('car-tech-and-knowledge', 'HomeController@carTyreTechnology')->name('car-tech-and-knowledge');
Route::get('car-tech-and-knowledge/runflat','HomeController@runflat')->name('runflat');
Route::get('car-tech-and-knowledge/pncs','HomeController@pncs')->name('pncs');
Route::get('car-tech-and-knowledge/seal-inside','HomeController@sealInside')->name('seal-inside');
Route::get('pzero','HomeController@pzeroSeries')->name('pzero');
Route::get('cinturato-p7','HomeController@cinturatoSeries')->name('cinturato-p7');
Route::get('scorpion','HomeController@scorpionSeries')->name('scorpion');


//Warranty Registration

Route::get('/warranty-registration/car','WarrantyRegisterController@registerCar')->name('warranty-register-car');
Route::get('/warranty-registration/moto','WarrantyRegisterController@registerMoto')->name('warranty-register-moto');
Route::get('/warranty-registration/car/success', 'WarrantyRegisterController@thankyouCar')->name('warranty-register-car-success');
Route::get('/warranty-registration/moto/success', 'WarrantyRegisterController@thankyouMoto')->name('warranty-register-moto-success');
Route::get('/warranty-registration/car/error', 'WarrantyRegisterController@registrationCarError')->name('warranty-register-car-error');
Route::get('/warranty-registration/moto/error', 'WarrantyRegisterController@registrationMotoError')->name('warranty-register-moto-error');
Route::post('/add-car-warranty','WarrantyRegisterController@addCarWarranty')->name('add-car-warranty');
Route::post('/add-moto-warranty','WarrantyRegisterController@addMotoWarranty')->name('add-moto-warranty');
Route::post('/claim-moto-warranty','WarrantyRegisterController@claimMotoWarranty')->name('claim-moto-warranty');
Route::post('/claim-car-warranty','WarrantyRegisterController@claimCarWarranty')->name('claim-car-warranty');

Route::get('/warranty-claim/car','WarrantyRegisterController@carWarrantyClaim')->name('warranty-claim-car');
Route::get('/warranty-claim/moto','WarrantyRegisterController@motoWarrantyClaim')->name('warranty-claim-moto');
Route::get('/moto-invoice/{invoiceNo}','WarrantyRegisterController@motoInvoiceDetails')->name('get-moto-invoice');
Route::get('/car-invoice/{invoiceNo}','WarrantyRegisterController@carInvoiceDetails')->name('get-car-invoice');

Route::get('/product-sizes/{productId}','WarrantyRegisterController@productSizes')->name('get-product-sizes');
Route::get('/test-file-form', [WarrantyRegisterController::class, 'testFileForm'])->name('test-file-form');
Route::post('/test-file-upload', [WarrantyRegisterController::class, 'testFileUpload'])->name('test-file-upload');

//Models by ModelCombination

Route::post('/models/get_models_by_brand', 'ModelCombinationSearchController@getModelsByBrand')->name('models.get_models_by_brand');
Route::get('/modelcombinations/get_models_by_brand', 'ModelCombinationSearchController@getModelsByBrand')->name('modelcombinations.get_models_by_brand');
Route::get('/modelcombinations/get_years_by_model', 'ModelCombinationSearchController@getYearsByModel')->name('modelcombinations.get_years_by_model');
Route::get('/modelcombinations/get_engines_by_year', 'ModelCombinationSearchController@getEnginesByYear')->name('modelcombinations.get_engines_by_year');


Route::redirect('/home', '/login');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});



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
    Route::post('retailers/media', 'RetailerController@storeMedia')->name('retailers.storeMedia');
    Route::post('retailers/ckmedia', 'RetailerController@storeCKEditorImages')->name('retailers.storeCKEditorImages');
    Route::resource('retailers', 'RetailerController');

    // Social
    Route::delete('socials/destroy', 'SocialController@massDestroy')->name('socials.massDestroy');
    Route::resource('socials', 'SocialController');


    // Home Slider
    Route::delete('home-sliders/destroy', 'HomeSliderController@massDestroy')->name('home-sliders.massDestroy');
    Route::post('home-sliders/media', 'HomeSliderController@storeMedia')->name('home-sliders.storeMedia');
    Route::post('home-sliders/ckmedia', 'HomeSliderController@storeCKEditorImages')->name('home-sliders.storeCKEditorImages');
    Route::resource('home-sliders', 'HomeSliderController');


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
    Route::post('car-registrations/change-status', 'CarRegistrationController@changeRegistrationStatus')->name('car-registrations.warranty-status-change');
  
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

    // Model Combination
    Route::delete('model-combinations/destroy', 'ModelCombinationController@massDestroy')->name('model-combinations.massDestroy');
    Route::resource('model-combinations', 'ModelCombinationController');


    // Moto Brand
    Route::delete('moto-brands/destroy', 'MotoBrandController@massDestroy')->name('moto-brands.massDestroy');
    Route::resource('moto-brands', 'MotoBrandController');

    // Moto Model
    Route::delete('moto-models/destroy', 'MotoModelController@massDestroy')->name('moto-models.massDestroy');
    Route::resource('moto-models', 'MotoModelController');

    // Moto Engine
    Route::delete('moto-engines/destroy', 'MotoEngineController@massDestroy')->name('moto-engines.massDestroy');
    Route::resource('moto-engines', 'MotoEngineController');

    // Moto Width
    Route::delete('moto-widths/destroy', 'MotoWidthController@massDestroy')->name('moto-widths.massDestroy');
    Route::resource('moto-widths', 'MotoWidthController');

    // Moto Size
    Route::delete('moto-sizes/destroy', 'MotoSizeController@massDestroy')->name('moto-sizes.massDestroy');
    Route::resource('moto-sizes', 'MotoSizeController');

    // Moto Ratio
    Route::delete('moto-ratios/destroy', 'MotoRatioController@massDestroy')->name('moto-ratios.massDestroy');
    Route::resource('moto-ratios', 'MotoRatioController');

    // Moto Tyre
    Route::delete('moto-tyres/destroy', 'MotoTyreController@massDestroy')->name('moto-tyres.massDestroy');
    Route::post('moto-tyres/media', 'MotoTyreController@storeMedia')->name('moto-tyres.storeMedia');
    Route::post('moto-tyres/ckmedia', 'MotoTyreController@storeCKEditorImages')->name('moto-tyres.storeCKEditorImages');
    Route::resource('moto-tyres', 'MotoTyreController');
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


