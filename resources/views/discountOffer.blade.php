{{-- blade-formatter-disable --}}
@component('mail::message')
# مدونتي

## تخفيض على كتابي الجديد

إشتر كتابي الجديد الآن وأحصل على تخفيض 30% من سعره الأصلي.

@component('mail::button', ['url' => '#', 'color' => 'primary'])
شراء الكتاب
@endcomponent
@endcomponent
