<x-mail::message>
# Нова заявка от контактната форма {{ env('APP_NAME') }}

**Име:** {{ $details['name'] }}<br />
**Email:** {{ $details['email'] }}<br />
**Телефон:** {{ $details['phone'] }}<br />

**Message:** {{ $details['description'] }}
</x-mail::message>
