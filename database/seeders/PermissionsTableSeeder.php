<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'vehicle_access',
            ],
            [
                'id'    => 18,
                'title' => 'brand_create',
            ],
            [
                'id'    => 19,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 20,
                'title' => 'brand_show',
            ],
            [
                'id'    => 21,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 22,
                'title' => 'brand_access',
            ],
            [
                'id'    => 23,
                'title' => 'body_create',
            ],
            [
                'id'    => 24,
                'title' => 'body_edit',
            ],
            [
                'id'    => 25,
                'title' => 'body_show',
            ],
            [
                'id'    => 26,
                'title' => 'body_delete',
            ],
            [
                'id'    => 27,
                'title' => 'body_access',
            ],
            [
                'id'    => 28,
                'title' => 'fuel_create',
            ],
            [
                'id'    => 29,
                'title' => 'fuel_edit',
            ],
            [
                'id'    => 30,
                'title' => 'fuel_show',
            ],
            [
                'id'    => 31,
                'title' => 'fuel_delete',
            ],
            [
                'id'    => 32,
                'title' => 'fuel_access',
            ],
            [
                'id'    => 33,
                'title' => 'transmission_create',
            ],
            [
                'id'    => 34,
                'title' => 'transmission_edit',
            ],
            [
                'id'    => 35,
                'title' => 'transmission_show',
            ],
            [
                'id'    => 36,
                'title' => 'transmission_delete',
            ],
            [
                'id'    => 37,
                'title' => 'transmission_access',
            ],
            [
                'id'    => 38,
                'title' => 'engine_create',
            ],
            [
                'id'    => 39,
                'title' => 'engine_edit',
            ],
            [
                'id'    => 40,
                'title' => 'engine_show',
            ],
            [
                'id'    => 41,
                'title' => 'engine_delete',
            ],
            [
                'id'    => 42,
                'title' => 'engine_access',
            ],
            [
                'id'    => 43,
                'title' => 'chassis_create',
            ],
            [
                'id'    => 44,
                'title' => 'chassis_edit',
            ],
            [
                'id'    => 45,
                'title' => 'chassis_show',
            ],
            [
                'id'    => 46,
                'title' => 'chassis_delete',
            ],
            [
                'id'    => 47,
                'title' => 'chassis_access',
            ],
            [
                'id'    => 48,
                'title' => 'year_create',
            ],
            [
                'id'    => 49,
                'title' => 'year_edit',
            ],
            [
                'id'    => 50,
                'title' => 'year_show',
            ],
            [
                'id'    => 51,
                'title' => 'year_delete',
            ],
            [
                'id'    => 52,
                'title' => 'year_access',
            ],
            [
                'id'    => 53,
                'title' => 'category_create',
            ],
            [
                'id'    => 54,
                'title' => 'category_edit',
            ],
            [
                'id'    => 55,
                'title' => 'category_show',
            ],
            [
                'id'    => 56,
                'title' => 'category_delete',
            ],
            [
                'id'    => 57,
                'title' => 'category_access',
            ],
            [
                'id'    => 58,
                'title' => 'car_model_create',
            ],
            [
                'id'    => 59,
                'title' => 'car_model_edit',
            ],
            [
                'id'    => 60,
                'title' => 'car_model_show',
            ],
            [
                'id'    => 61,
                'title' => 'car_model_delete',
            ],
            [
                'id'    => 62,
                'title' => 'car_model_access',
            ],
            [
                'id'    => 63,
                'title' => 'size_create',
            ],
            [
                'id'    => 64,
                'title' => 'size_edit',
            ],
            [
                'id'    => 65,
                'title' => 'size_show',
            ],
            [
                'id'    => 66,
                'title' => 'size_delete',
            ],
            [
                'id'    => 67,
                'title' => 'size_access',
            ],
            [
                'id'    => 68,
                'title' => 'ratio_create',
            ],
            [
                'id'    => 69,
                'title' => 'ratio_edit',
            ],
            [
                'id'    => 70,
                'title' => 'ratio_show',
            ],
            [
                'id'    => 71,
                'title' => 'ratio_delete',
            ],
            [
                'id'    => 72,
                'title' => 'ratio_access',
            ],
            [
                'id'    => 73,
                'title' => 'width_create',
            ],
            [
                'id'    => 74,
                'title' => 'width_edit',
            ],
            [
                'id'    => 75,
                'title' => 'width_show',
            ],
            [
                'id'    => 76,
                'title' => 'width_delete',
            ],
            [
                'id'    => 77,
                'title' => 'width_access',
            ],
            [
                'id'    => 78,
                'title' => 'tyre_create',
            ],
            [
                'id'    => 79,
                'title' => 'tyre_edit',
            ],
            [
                'id'    => 80,
                'title' => 'tyre_show',
            ],
            [
                'id'    => 81,
                'title' => 'tyre_delete',
            ],
            [
                'id'    => 82,
                'title' => 'tyre_access',
            ],
            [
                'id'    => 83,
                'title' => 'faq_section_access',
            ],
            [
                'id'    => 84,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 85,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 86,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 87,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 88,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 89,
                'title' => 'faq_create',
            ],
            [
                'id'    => 90,
                'title' => 'faq_edit',
            ],
            [
                'id'    => 91,
                'title' => 'faq_show',
            ],
            [
                'id'    => 92,
                'title' => 'faq_delete',
            ],
            [
                'id'    => 93,
                'title' => 'faq_access',
            ],
            [
                'id'    => 94,
                'title' => 'warranty_access',
            ],
            [
                'id'    => 95,
                'title' => 'vehicle_type_create',
            ],
            [
                'id'    => 96,
                'title' => 'vehicle_type_edit',
            ],
            [
                'id'    => 97,
                'title' => 'vehicle_type_show',
            ],
            [
                'id'    => 98,
                'title' => 'vehicle_type_delete',
            ],
            [
                'id'    => 99,
                'title' => 'vehicle_type_access',
            ],
            [
                'id'    => 100,
                'title' => 'product_create',
            ],
            [
                'id'    => 101,
                'title' => 'product_edit',
            ],
            [
                'id'    => 102,
                'title' => 'product_show',
            ],
            [
                'id'    => 103,
                'title' => 'product_delete',
            ],
            [
                'id'    => 104,
                'title' => 'product_access',
            ],
            [
                'id'    => 105,
                'title' => 'product_size_create',
            ],
            [
                'id'    => 106,
                'title' => 'product_size_edit',
            ],
            [
                'id'    => 107,
                'title' => 'product_size_show',
            ],
            [
                'id'    => 108,
                'title' => 'product_size_delete',
            ],
            [
                'id'    => 109,
                'title' => 'product_size_access',
            ],
            [
                'id'    => 110,
                'title' => 'city_create',
            ],
            [
                'id'    => 111,
                'title' => 'city_edit',
            ],
            [
                'id'    => 112,
                'title' => 'city_show',
            ],
            [
                'id'    => 113,
                'title' => 'city_delete',
            ],
            [
                'id'    => 114,
                'title' => 'city_access',
            ],
            [
                'id'    => 115,
                'title' => 'retailer_create',
            ],
            [
                'id'    => 116,
                'title' => 'retailer_edit',
            ],
            [
                'id'    => 117,
                'title' => 'retailer_show',
            ],
            [
                'id'    => 118,
                'title' => 'retailer_delete',
            ],
            [
                'id'    => 119,
                'title' => 'retailer_access',
            ],
            [
                'id'    => 120,
                'title' => 'social_create',
            ],
            [
                'id'    => 121,
                'title' => 'social_edit',
            ],
            [
                'id'    => 122,
                'title' => 'social_show',
            ],
            [
                'id'    => 123,
                'title' => 'social_delete',
            ],
            [
                'id'    => 124,
                'title' => 'social_access',
            ],
            [
                'id'    => 125,
                'title' => 'slider_setting_access',
            ],
            [
                'id'    => 126,
                'title' => 'car_slider_create',
            ],
            [
                'id'    => 127,
                'title' => 'car_slider_edit',
            ],
            [
                'id'    => 128,
                'title' => 'car_slider_show',
            ],
            [
                'id'    => 129,
                'title' => 'car_slider_delete',
            ],
            [
                'id'    => 130,
                'title' => 'car_slider_access',
            ],
            [
                'id'    => 131,
                'title' => 'moto_slider_create',
            ],
            [
                'id'    => 132,
                'title' => 'moto_slider_edit',
            ],
            [
                'id'    => 133,
                'title' => 'moto_slider_show',
            ],
            [
                'id'    => 134,
                'title' => 'moto_slider_delete',
            ],
            [
                'id'    => 135,
                'title' => 'moto_slider_access',
            ],
            [
                'id'    => 136,
                'title' => 'warranty_claim_create',
            ],
            [
                'id'    => 137,
                'title' => 'warranty_claim_edit',
            ],
            [
                'id'    => 138,
                'title' => 'warranty_claim_show',
            ],
            [
                'id'    => 139,
                'title' => 'warranty_claim_delete',
            ],
            [
                'id'    => 140,
                'title' => 'warranty_claim_access',
            ],
            [
                'id'    => 141,
                'title' => 'moto_registration_create',
            ],
            [
                'id'    => 142,
                'title' => 'moto_registration_edit',
            ],
            [
                'id'    => 143,
                'title' => 'moto_registration_show',
            ],
            [
                'id'    => 144,
                'title' => 'moto_registration_delete',
            ],
            [
                'id'    => 145,
                'title' => 'moto_registration_access',
            ],
            [
                'id'    => 146,
                'title' => 'car_registration_create',
            ],
            [
                'id'    => 147,
                'title' => 'car_registration_edit',
            ],
            [
                'id'    => 148,
                'title' => 'car_registration_show',
            ],
            [
                'id'    => 149,
                'title' => 'car_registration_delete',
            ],
            [
                'id'    => 150,
                'title' => 'car_registration_access',
            ],
            [
                'id'    => 151,
                'title' => 'site_setting_access',
            ],
            [
                'id'    => 152,
                'title' => 'header_create',
            ],
            [
                'id'    => 153,
                'title' => 'header_edit',
            ],
            [
                'id'    => 154,
                'title' => 'header_show',
            ],
            [
                'id'    => 155,
                'title' => 'header_delete',
            ],
            [
                'id'    => 156,
                'title' => 'header_access',
            ],
            [
                'id'    => 157,
                'title' => 'contact_create',
            ],
            [
                'id'    => 158,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 159,
                'title' => 'contact_show',
            ],
            [
                'id'    => 160,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 161,
                'title' => 'contact_access',
            ],
            [
                'id'    => 162,
                'title' => 'footer_create',
            ],
            [
                'id'    => 163,
                'title' => 'footer_edit',
            ],
            [
                'id'    => 164,
                'title' => 'footer_show',
            ],
            [
                'id'    => 165,
                'title' => 'footer_delete',
            ],
            [
                'id'    => 166,
                'title' => 'footer_access',
            ],
            [
                'id'    => 167,
                'title' => 'email_create',
            ],
            [
                'id'    => 168,
                'title' => 'email_edit',
            ],
            [
                'id'    => 169,
                'title' => 'email_show',
            ],
            [
                'id'    => 170,
                'title' => 'email_delete',
            ],
            [
                'id'    => 171,
                'title' => 'email_access',
            ],
            [
                'id'    => 172,
                'title' => 'page_create',
            ],
            [
                'id'    => 173,
                'title' => 'page_edit',
            ],
            [
                'id'    => 174,
                'title' => 'page_show',
            ],
            [
                'id'    => 175,
                'title' => 'page_delete',
            ],
            [
                'id'    => 176,
                'title' => 'page_access',
            ],
            [
                'id'    => 177,
                'title' => 'menu_setting_access',
            ],
            [
                'id'    => 178,
                'title' => 'page_menu_create',
            ],
            [
                'id'    => 179,
                'title' => 'page_menu_edit',
            ],
            [
                'id'    => 180,
                'title' => 'page_menu_show',
            ],
            [
                'id'    => 181,
                'title' => 'page_menu_delete',
            ],
            [
                'id'    => 182,
                'title' => 'page_menu_access',
            ],
            [
                'id'    => 183,
                'title' => 'other_menu_create',
            ],
            [
                'id'    => 184,
                'title' => 'other_menu_edit',
            ],
            [
                'id'    => 185,
                'title' => 'other_menu_show',
            ],
            [
                'id'    => 186,
                'title' => 'other_menu_delete',
            ],
            [
                'id'    => 187,
                'title' => 'other_menu_access',
            ],
            [
                'id'    => 188,
                'title' => 'model_combination_create',
            ],
            [
                'id'    => 189,
                'title' => 'model_combination_edit',
            ],
            [
                'id'    => 190,
                'title' => 'model_combination_show',
            ],
            [
                'id'    => 191,
                'title' => 'model_combination_delete',
            ],
            [
                'id'    => 192,
                'title' => 'model_combination_access',
            ],
            [
                'id'    => 193,
                'title' => 'moto_tyre_section_access',
            ],
            [
                'id'    => 194,
                'title' => 'moto_brand_create',
            ],
            [
                'id'    => 195,
                'title' => 'moto_brand_edit',
            ],
            [
                'id'    => 196,
                'title' => 'moto_brand_show',
            ],
            [
                'id'    => 197,
                'title' => 'moto_brand_delete',
            ],
            [
                'id'    => 198,
                'title' => 'moto_brand_access',
            ],
            [
                'id'    => 199,
                'title' => 'moto_model_create',
            ],
            [
                'id'    => 200,
                'title' => 'moto_model_edit',
            ],
            [
                'id'    => 201,
                'title' => 'moto_model_show',
            ],
            [
                'id'    => 202,
                'title' => 'moto_model_delete',
            ],
            [
                'id'    => 203,
                'title' => 'moto_model_access',
            ],
            [
                'id'    => 204,
                'title' => 'moto_engine_create',
            ],
            [
                'id'    => 205,
                'title' => 'moto_engine_edit',
            ],
            [
                'id'    => 206,
                'title' => 'moto_engine_show',
            ],
            [
                'id'    => 207,
                'title' => 'moto_engine_delete',
            ],
            [
                'id'    => 208,
                'title' => 'moto_engine_access',
            ],
            [
                'id'    => 209,
                'title' => 'moto_width_create',
            ],
            [
                'id'    => 210,
                'title' => 'moto_width_edit',
            ],
            [
                'id'    => 211,
                'title' => 'moto_width_show',
            ],
            [
                'id'    => 212,
                'title' => 'moto_width_delete',
            ],
            [
                'id'    => 213,
                'title' => 'moto_width_access',
            ],
            [
                'id'    => 214,
                'title' => 'moto_size_create',
            ],
            [
                'id'    => 215,
                'title' => 'moto_size_edit',
            ],
            [
                'id'    => 216,
                'title' => 'moto_size_show',
            ],
            [
                'id'    => 217,
                'title' => 'moto_size_delete',
            ],
            [
                'id'    => 218,
                'title' => 'moto_size_access',
            ],
            [
                'id'    => 219,
                'title' => 'moto_ratio_create',
            ],
            [
                'id'    => 220,
                'title' => 'moto_ratio_edit',
            ],
            [
                'id'    => 221,
                'title' => 'moto_ratio_show',
            ],
            [
                'id'    => 222,
                'title' => 'moto_ratio_delete',
            ],
            [
                'id'    => 223,
                'title' => 'moto_ratio_access',
            ],
            [
                'id'    => 224,
                'title' => 'moto_tyre_create',
            ],
            [
                'id'    => 225,
                'title' => 'moto_tyre_edit',
            ],
            [
                'id'    => 226,
                'title' => 'moto_tyre_show',
            ],
            [
                'id'    => 227,
                'title' => 'moto_tyre_delete',
            ],
            [
                'id'    => 228,
                'title' => 'moto_tyre_access',
            ],
            [
                'id'    => 229,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
