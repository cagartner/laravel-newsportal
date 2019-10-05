<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute يجب أن يكون مقبول.',
    'active_url'           => ':attribute ليس رابط صحيح.',
    'after'                => ':attribute يجب أن يكون تاريخ بعد :date.',
    'alpha'                => ':attribute قد يحتوي فقط علي حروف.',
    'alpha_dash'           => ':attribute قد يحتوي فقط علي حروف وأرقام وداش.',
    'alpha_num'            => ':attribute قد يحتوي فقط علي حروف وأرقام.',
    'array'                => ':attribute يجب أن يكون مصفوفة.',
    'before'               => ':attribute يجب أن يكون تاريخ قبل :date.',
    'between'              => [
        'numeric' => ':attribute يجب أن يكون بين :min و :max.',
        'file'    => ':attribute يجب أن يكون بين :min و :max كيلوبايت.',
        'string'  => ':attribute يجب أن يكون بين :min و :max حرف.',
        'array'   => ':attribute يجب أن يكون بين :min و :max عنصر.',
    ],
    'boolean'              => 'حقل :attribute يجب أن يكون صح أو خطأ.',
    'confirmed'            => 'تأكيد :attribute غير متطابق لكلمة السر.',
    'date'                 => ':attribute ليس تاريخ صحيح.',
    'date_format'          => ':attribute لا يطابق التنسيق :format.',
    'different'            => ':attribute و :other يجب أن يكونوا مختلفين.',
    'digits'               => ':attribute يجب أن يكون :digits رقم.',
    'digits_between'       => ':attribute يجب أن يكون بين :min و :max رقم.',
    'email'                => ':attribute يجب ان يكون عنوان بريد مقبول.',
    'exists'               => 'القيمة المختارة في :attribute غير صالحة.',
    'filled'               => 'حقل :attribute مطلوب.',
    'image'                => 'حقل :attribute يجب أن يكون صورة.',
    'in'                   => 'القيمة المختارة في :attribute غير صالحة.',
    'integer'              => ':attribute يجب أن يكون رقم صحيح.',
    'ip'                   => ':attribute يجب أن يكون IP صحيح.',
    'json'                 => ':attribute يجب أن تكون صيغة JSON صالحة.',
    'max'                  => [
        'numeric' => ':attribute قد لا يكون أكبر من :max.',
        'file'    => ':attribute قد لا يكون أكبر من :max كيلوبايت.',
        'string'  => ':attribute قد لا يكون أكبر من :max حرف.',
        'array'   => ':attribute قد لا يكون أكثر من :max عنصر.',
    ],
    'mimes'                => 'الحقل :attribute لابد ان يكون ملف من النوع: :values.',
    'min'                  => [
        'numeric' => ':attribute يجب أن يكون علي الأقل :min.',
        'file'    => ':attribute يجب أن يكون علي الأقل :min كيلوبايت.',
        'string'  => ':attribute يجب أن يكون علي الأقل :min حرف.',
        'array'   => ':attribute يجب أن يكون على الأقل :min عنصر.',
    ],
    'not_in'               => 'القيمة المختارة في :attribute غير صالحة.',
    'numeric'              => ':attribute لابد ان يكون ارقام.',
    'regex'                => ':attribute التنسيق غير صالح.',
    'required'             => 'ادخال الحقل :attribute ضروري لاتمام العملية',
    'required_if'          => 'حقل :attribute مطلوب عندما :other يكون :value.',
    'required_with'        => 'حقل :attribute مطلوب عندما :values يكون موجود.',
    'required_with_all'    => 'حقل :attribute مطلوب عندما :values يكون موجود.',
    'required_without'     => 'حقل :attribute مطلوب عندما :values غير موجود.',
    'required_without_all' => 'حقل :attribute مطلوب عندما لا شيء من :values تكون موجودة.',
    'same'                 => 'حقل :attribute و :other يجب أن يتطابقوا.',
    'size'                 => [
        'numeric' => ':attribute يجب أن يكون :size.',
        'file'    => ':attribute يجب أن يكون :size كيلو بايت.',
        'string'  => 'لابد ان تكون :attribute اكثر من :size حروف او ارقام ...',
        'array'   => ':attribute يجب أن يحتوي :size عنصر.',
    ],
    'string'               => ':attribute يجب أن يكون نص.',
    'timezone'             => ':attribute يجب أن تكون منطقة صالحة.',
    'unique'               => 'هذا :attribute موجود من قبل.',
    'url'                  => ':attribute تنسيقه غير صحيح.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'رسالة مخصصة',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name'                 => 'الاسم',
        'group'                => 'المجموعة',
        'email'                => 'البريد الالكتروني',
        'basic_photo'          => 'الصورة',
        'password'             => 'كلمة السر',
        'phone'                => 'رقم الجوال',
        'title'                => 'العنوان',
        'news_subject'         => 'موضوع الخبر',
        'dashboard'            => 'لوحة التحكم',
        'pages'                => 'الصفحات',
        'list_pages'           => 'إستعراض الصفحات',
        'create_page'          => 'إنشاء صفحة',
        'code'                 => 'كود',
        'title'                => 'العنوان',
        'body'                 => 'المحتوي',
        'link'                 => 'الرابط',
        'provide_menu_link'    => 'إضافة الصفحة في القائمة',
        'menus'                => 'القوائم',
        'menu_select'          => 'اختر القائمة',
        'created_at'           => 'تاريخ الإنشاء',
        'created_by'           => 'المؤلف',
        'last_update'          => 'تاريخ التحديث',
        'operations'           => 'العمليات',
        'edit'                 => 'تحرير',
        'delete'               => 'حذف',
        'no_results'           => 'لا يوجد نتائج',
        'page'                 => 'صفحة',
        'total'                => 'إجمالي',
        'add_banner'           => 'إضافة بنر',
        'max_size'             => 'المساحة السوي',
        'supported_extantions' => 'الإمتدادات المتاحة',
        'save'                 => 'حفظ',
        'update'               => 'تحديث',
        'edit_page'            => 'تعديل صفحة',
        'saved_successfully'   => 'تم الحفظ بنجاح',
        'updated_successfully' => 'تم التحديث بنجاح',
        'deleted_successfully' => 'تم الحذف بنجاح',
        'image'                => 'البنر',
        'page_delete_confirm'  => 'تأكيد حذف صفحة',
        'delete_confirm_msg'   => 'هل أنت متأكد أنك تريد حذف',
        'cancel'               => 'إلغاء',
    ],

];
