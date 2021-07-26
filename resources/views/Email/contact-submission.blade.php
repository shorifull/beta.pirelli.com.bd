@component('mail::message')



    <h2>Hello</h2> <br><br>

    You have got an email from :  {{ $contactData['name'] }}  <br><br>

    User details: <br><br>

    Name: {{ $contactData['name'] }} <br>
    Email: {{ $contactData['email'] }} <br>
    Phone: {{ $contactData['phone'] }} <br>
    Subject: {{ $contactData['subject'] }} <br>
    Message: {{ $contactData['message'] }} <br><br>

    Thanks



@component('mail::button', ['url' => 'https://pirelli.com.bd'])
    Visit Website
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
