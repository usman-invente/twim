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

    'accepted' => 'يجب قبول :attribute.',
'active_url' => ':attribute ليس عنوان URL صالحًا.',
'after' => 'يجب أن يكون :attribute تاريخًا لاحقًا لـ :date.',
'after_or_equal' => 'يجب أن يكون :attribute تاريخًا لاحقًا أو مساويًا لـ :date.',
'alpha' => 'يجب أن يحتوي :attribute على حروف فقط.',
'alpha_dash' => 'يجب أن يحتوي :attribute على حروف وأرقام وشرطات وشرطات سفلية فقط.',
'alpha_num' => 'يجب أن يحتوي :attribute على حروف وأرقام فقط.',
'array' => 'يجب أن يكون :attribute مصفوفة.',
'before' => 'يجب أن يكون :attribute تاريخًا سابقًا لـ :date.',
'before_or_equal' => 'يجب أن يكون :attribute تاريخًا سابقًا أو مساويًا لـ :date.',
'between' => [
'numeric' => 'يجب أن يكون :attribute بين :min و :max.',
'file' => 'يجب أن يكون :attribute بين :min و :max كيلوبايت.',
'string' => 'يجب أن يكون :attribute بين :min و :max من الحروف.',
'array' => 'يجب أن يحتوي :attribute على بين :min و :max من العناصر.',
],
'boolean' => 'يجب أن يكون حقل :attribute صحيحًا أو خطأ.',
'confirmed' => 'تأكيد :attribute غير متطابق.',
'date' => ':attribute ليس تاريخًا صالحًا.',
'date_equals' => 'يجب أن يكون :attribute تاريخًا مساويًا لـ :date.',
'date_format' => 'لا يتوافق :attribute مع الشكل :format.',
'different' => 'يجب أن يكون :attribute و :other مختلفين.',
'digits' => 'يجب أن يحتوي :attribute على :digits رقمًا.',
'digits_between' => 'يجب أن يكون :attribute بين :min و :max رقمًا.',
'dimensions' => ':attribute له أبعاد صورة غير صالحة.',
'distinct' => 'لحقل :attribute قيمة مكررة.',
'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صالح.',
'ends_with' => 'يجب أن ينتهي :attribute بأحد التالي: :values.',
'exists' => ':attribute المحدد غير صالح.',
'file' => 'يجب أن يكون :attribute ملفًا.',
'filled' => 'حقل :attribute يجب أن يحتوي على قيمة.',
'gt' => [
'numeric' => 'يجب أن يكون :attribute أكبر من :value.',
'file' => 'يجب أن يكون :attribute أكبر من :value كيلوبايت.',
'string' => 'يجب أن يكون :attribute أكبر من :value حرفًا.',
'array' => 'يجب أن يحتوي :attribute على أكثر من :value عناصر.',
],
'gte' => [
'numeric' => 'يجب أن يكون :attribute أكبر من أو يساوي :value.',
'file' => 'يجب أن يكون :attribute أكبر من أو يساوي :value كيلوبايت.',
'string' => 'يجب أن يكون :attribute أكبر من أو يساوي :value حرفًا.',
'array' => 'يجب أن يحتوي :attribute على :value عناصر أو أكثر.',
],
'image' => 'يجب أن يكون :attribute صورة.',
'in' => ':attribute المحدد غير صالح.',
'in_array' => 'حقل :attribute غير موجود في :other.',
'integer' => 'يجب أن يكون :attribute عددًا صحيحًا.',
'ip' => 'يجب أن يكون :attribute عنوان IP صالحًا.',
'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صالحًا.',
'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صالحًا.',
'json' => 'يجب أن يكون :attribute سلسلة JSON صالحة.',
'lt' => [
'numeric' => 'يجب أن يكون :attribute أصغر من :value.',
'file' => 'يجب أن يكون :attribute أصغر من :value كيلوبايت.',
'string' => 'يجب أن يكون :attribute أصغر من :value حرفًا.',
'array' => 'يجب أن يحتوي :attribute على أقل من :value عناصر.',
],
'lte' => [
'numeric' => 'يجب أن يكون :attribute أصغر من أو يساوي :value.',
'file' => 'يجب أن يكون :attribute أصغر من أو يساوي :value كيلوبايت.',
'string' => 'يجب أن يكون :attribute أصغر من أو يساوي :value حرفًا.',
'array' => 'لا يجب أن يحتوي :attribute على أكثر من :value عناصر.',
],
'max' => [
'numeric' => 'يجب ألا يكون :attribute أكبر من :max.',
'file' => 'يجب ألا يكون :attribute أكبر من :max كيلوبايت.',
'string' => 'يجب ألا يكون :attribute أكبر من :max حرفًا.',
'array' => 'لا يجب أن يحتوي :attribute على أكثر من :max عناصر.',
],
'mimes' => 'يجب أن يكون :attribute ملفًا من نوع: :values.',
'mimetypes' => 'يجب أن يكون :attribute ملفًا من نوع: :values.',
'min' => [
'numeric' => 'يجب أن يكون :attribute على الأقل :min.',
'file' => 'يجب أن يكون :attribute على الأقل :min كيلوبايت.',
'string' => 'يجب أن يكون :attribute على الأقل :min حرفًا.',
'array' => 'يجب أن يحتوي :attribute على الأقل على :min عُنصرًا.',

],
'multiple_of' => 'يجب أن يكون :attribute مضاعفًا من :value.',
'not_in' => ':attribute المحدد غير صالح.',
'not_regex' => 'صيغة :attribute غير صالحة.',
'numeric' => 'يجب أن يكون :attribute رقمًا.',
'password' => 'كلمة المرور غير صحيحة.',
'present' => 'يجب تقديم حقل :attribute.',
'regex' => 'صيغة :attribute .غير صالحة.',
'required' => 'حقل :attribute مطلوب.',
'required_if' => 'حقل :attribute مطلوب عندما يكون :other هو :value.',
'required_unless' => 'حقل :attribute مطلوب ما لم يكن :other في :values.',
'required_with' => 'حقل :attribute مطلوب عند وجود :values.',
'required_with_all' => 'حقل :attribute مطلوب عندما تكون :values موجودة.',
'required_without' => 'حقل :attribute مطلوب عند عدم وجود :values.',
'required_without_all' => 'حقل :attribute مطلوب عند عدم وجود أي من :values.',
'prohibited' => 'حقل :attribute محظور.',
'prohibited_if' => 'حقل :attribute ممنوع عندما يكون :other هو :value.',
'prohibited_unless' => 'حقل :attribute ممنوع ما لم يكن :other في :values.',

'same' => 'يجب أن يتطابق :attribute و :other.',
'size' => [
'numeric' => 'يجب أن تكون القيمة :size.',
'file' => 'يجب أن يكون :attribute :size كيلوبايت.',
'string' => 'يجب أن يحتوي :attribute على :size حرفًا.',
'array' => 'يجب أن يحتوي :attribute على :size عنصرًا.',
],
'starts_with' => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values',
'string' => 'يجب أن يكون :attribute سلسلة.',
'timezone' => 'يجب أن يكون :attribute نطاقًا زمنيًا صالحًا.',
'unique' => 'قيمة :attribute مُستخدمة من قبل.',
'uploaded' => 'فشل :attribute في التحميل.',
'url' => 'صيغة :attribute غير صالحة.',
'uuid' => ':attribute يجب أن يكون UUID صالحًا.',

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
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
