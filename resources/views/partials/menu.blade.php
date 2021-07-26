<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('slider_setting_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-images">

                        </i>
                        <span>{{ trans('cruds.sliderSetting.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('car_slider_access')
                            <li class="{{ request()->is("admin/car-sliders") || request()->is("admin/car-sliders/*") ? "active" : "" }}">
                                <a href="{{ route("admin.car-sliders.index") }}">
                                    <i class="fa-fw fas fa-images">

                                    </i>
                                    <span>{{ trans('cruds.carSlider.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('moto_slider_access')
                            <li class="{{ request()->is("admin/moto-sliders") || request()->is("admin/moto-sliders/*") ? "active" : "" }}">
                                <a href="{{ route("admin.moto-sliders.index") }}">
                                    <i class="fa-fw fas fa-images">

                                    </i>
                                    <span>{{ trans('cruds.motoSlider.title') }}</span>

                                </a>
                            </li>
                        @endcan
                            @can('home_slider_access')
                                <li class="{{ request()->is("admin/home-sliders") || request()->is("admin/home-sliders/*") ? "active" : "" }}">
                                    <a href="{{ route("admin.home-sliders.index") }}">
                                        <i class="fa-fw fas fa-images">

                                        </i>
                                        <span>{{ trans('cruds.homeSlider.title') }}</span>

                                    </a>
                                </li>
                            @endcan
                    </ul>
                </li>
            @endcan
            @can('menu_setting_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-bars">

                        </i>
                        <span>{{ trans('cruds.menuSetting.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('page_menu_access')
                            <li class="{{ request()->is("admin/page-menus") || request()->is("admin/page-menus/*") ? "active" : "" }}">
                                <a href="{{ route("admin.page-menus.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.pageMenu.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('other_menu_access')
                            <li class="{{ request()->is("admin/other-menus") || request()->is("admin/other-menus/*") ? "active" : "" }}">
                                <a href="{{ route("admin.other-menus.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.otherMenu.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('site_setting_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.siteSetting.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('header_access')
                            <li class="{{ request()->is("admin/headers") || request()->is("admin/headers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.headers.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.header.title') }}</span>

                                </a>
                            </li>
                        @endcan

                        @can('footer_access')
                            <li class="{{ request()->is("admin/footers") || request()->is("admin/footers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.footers.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.footer.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('email_access')
                            <li class="{{ request()->is("admin/emails") || request()->is("admin/emails/*") ? "active" : "" }}">
                                <a href="{{ route("admin.emails.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.email.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('vehicle_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-car">

                        </i>
                        <span>{{ trans('cruds.car.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('tyre_access')
                            <li class="{{ request()->is("admin/tyres") || request()->is("admin/tyres/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tyres.index") }}">
                                    <i class="fa-fw fas fa-taxi">

                                    </i>
                                    <span>{{ trans('cruds.tyre.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('brand_access')
                            <li class="{{ request()->is("admin/brands") || request()->is("admin/brands/*") ? "active" : "" }}">
                                <a href="{{ route("admin.brands.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.brand.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('body_access')
                            <li class="{{ request()->is("admin/bodies") || request()->is("admin/bodies/*") ? "active" : "" }}">
                                <a href="{{ route("admin.bodies.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.body.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('fuel_access')
                            <li class="{{ request()->is("admin/fuels") || request()->is("admin/fuels/*") ? "active" : "" }}">
                                <a href="{{ route("admin.fuels.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.fuel.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('transmission_access')
                            <li class="{{ request()->is("admin/transmissions") || request()->is("admin/transmissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.transmissions.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.transmission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('engine_access')
                            <li class="{{ request()->is("admin/engines") || request()->is("admin/engines/*") ? "active" : "" }}">
                                <a href="{{ route("admin.engines.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.engine.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('chassis_access')
                            <li class="{{ request()->is("admin/chassis") || request()->is("admin/chassis/*") ? "active" : "" }}">
                                <a href="{{ route("admin.chassis.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.chassis.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('year_access')
                            <li class="{{ request()->is("admin/years") || request()->is("admin/years/*") ? "active" : "" }}">
                                <a href="{{ route("admin.years.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.year.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('category_access')
                            <li class="{{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.categories.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.category.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('car_model_access')
                            <li class="{{ request()->is("admin/car-models") || request()->is("admin/car-models/*") ? "active" : "" }}">
                                <a href="{{ route("admin.car-models.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.carModel.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('width_access')
                            <li class="{{ request()->is("admin/widths") || request()->is("admin/widths/*") ? "active" : "" }}">
                                <a href="{{ route("admin.widths.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.width.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('ratio_access')
                            <li class="{{ request()->is("admin/ratios") || request()->is("admin/ratios/*") ? "active" : "" }}">
                                <a href="{{ route("admin.ratios.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.ratio.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('size_access')
                            <li class="{{ request()->is("admin/sizes") || request()->is("admin/sizes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.sizes.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.size.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('model_combination_access')
                            <li class="{{ request()->is("admin/model-combinations") || request()->is("admin/model-combinations/*") ? "active" : "" }}">
                                <a href="{{ route("admin.model-combinations.index") }}">
                                    <i class="fa-fw fas fa-compress">

                                    </i>
                                    <span>{{ trans('cruds.modelCombination.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('moto_tyre_section_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-motorcycle">

                        </i>
                        <span>{{ trans('cruds.motoTyreSection.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('moto_tyre_access')
                            <li class="{{ request()->is("admin/moto-tyres") || request()->is("admin/moto-tyres/*") ? "active" : "" }}">
                                <a href="{{ route("admin.moto-tyres.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.motoTyre.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('moto_brand_access')
                            <li class="{{ request()->is("admin/moto-brands") || request()->is("admin/moto-brands/*") ? "active" : "" }}">
                                <a href="{{ route("admin.moto-brands.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.motoBrand.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('moto_model_access')
                            <li class="{{ request()->is("admin/moto-models") || request()->is("admin/moto-models/*") ? "active" : "" }}">
                                <a href="{{ route("admin.moto-models.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.motoModel.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('moto_engine_access')
                            <li class="{{ request()->is("admin/moto-engines") || request()->is("admin/moto-engines/*") ? "active" : "" }}">
                                <a href="{{ route("admin.moto-engines.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.motoEngine.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('moto_width_access')
                            <li class="{{ request()->is("admin/moto-widths") || request()->is("admin/moto-widths/*") ? "active" : "" }}">
                                <a href="{{ route("admin.moto-widths.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.motoWidth.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('moto_size_access')
                            <li class="{{ request()->is("admin/moto-sizes") || request()->is("admin/moto-sizes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.moto-sizes.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.motoSize.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('moto_ratio_access')
                            <li class="{{ request()->is("admin/moto-ratios") || request()->is("admin/moto-ratios/*") ? "active" : "" }}">
                                <a href="{{ route("admin.moto-ratios.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.motoRatio.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('faq_section_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-question-circle">

                        </i>
                        <span>{{ trans('cruds.faqSection.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('faq_category_access')
                            <li class="{{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.faq-categories.index") }}">
                                    <i class="fa-fw fas fa-question-circle">

                                    </i>
                                    <span>{{ trans('cruds.faqCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('faq_access')
                            <li class="{{ request()->is("admin/faqs") || request()->is("admin/faqs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.faqs.index") }}">
                                    <i class="fa-fw fas fa-question">

                                    </i>
                                    <span>{{ trans('cruds.faq.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('warranty_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fab fa-servicestack">

                        </i>
                        <span>{{ trans('cruds.warranty.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('vehicle_type_access')
                            <li class="{{ request()->is("admin/vehicle-types") || request()->is("admin/vehicle-types/*") ? "active" : "" }}">
                                <a href="{{ route("admin.vehicle-types.index") }}">
                                    <i class="fa-fw fas fa-ambulance">

                                    </i>
                                    <span>{{ trans('cruds.vehicleType.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('product_access')
                            <li class="{{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                <a href="{{ route("admin.products.index") }}">
                                    <i class="fa-fw fas fa-circle">

                                    </i>
                                    <span>{{ trans('cruds.product.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('product_size_access')
                            <li class="{{ request()->is("admin/product-sizes") || request()->is("admin/product-sizes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.product-sizes.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.productSize.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('city_access')
                            <li class="{{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "active" : "" }}">
                                <a href="{{ route("admin.cities.index") }}">
                                    <i class="fa-fw fas fa-map-signs">

                                    </i>
                                    <span>{{ trans('cruds.city.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('retailer_access')
                            <li class="{{ request()->is("admin/retailers") || request()->is("admin/retailers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.retailers.index") }}">
                                    <i class="fa-fw fas fa-diagnoses">

                                    </i>
                                    <span>{{ trans('cruds.retailer.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('warranty_claim_access')
                            <li class="{{ request()->is("admin/warranty-claims") || request()->is("admin/warranty-claims/*") ? "active" : "" }}">
                                <a href="{{ route("admin.warranty-claims.index") }}">
                                    <i class="fa-fw fas fa-file-signature">

                                    </i>
                                    <span>{{ trans('cruds.warrantyClaim.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('moto_registration_access')
                            <li class="{{ request()->is("admin/moto-registrations") || request()->is("admin/moto-registrations/*") ? "active" : "" }}">
                                <a href="{{ route("admin.moto-registrations.index") }}">
                                    <i class="fa-fw fas fa-motorcycle">

                                    </i>
                                    <span>{{ trans('cruds.motoRegistration.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('car_registration_access')
                            <li class="{{ request()->is("admin/car-registrations") || request()->is("admin/car-registrations/*") ? "active" : "" }}">
                                <a href="{{ route("admin.car-registrations.index") }}">
                                    <i class="fa-fw fas fa-taxi">

                                    </i>
                                    <span>{{ trans('cruds.carRegistration.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('social_access')
                <li class="{{ request()->is("admin/socials") || request()->is("admin/socials/*") ? "active" : "" }}">
                    <a href="{{ route("admin.socials.index") }}">
                        <i class="fa-fw fas fa-people-carry">

                        </i>
                        <span>{{ trans('cruds.social.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('page_access')
                <li class="{{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "active" : "" }}">
                    <a href="{{ route("admin.pages.index") }}">
                        <i class="fa-fw fas fa-file-alt">

                        </i>
                        <span>{{ trans('cruds.page.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('contact_access')
                <li class="{{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.contacts.index") }}">
                        <i class="fa-fw fas fa-envelope">

                        </i>
                        <span>{{ trans('cruds.contact.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>

</aside>
