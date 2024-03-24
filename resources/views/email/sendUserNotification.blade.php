<div>
    @component('mail::message')
        <h2> هام : تطبيق مناسبة </h2>
        <p>
            {!! $data !!} <br>
    @endcomponent
    {{ config('app.name') }}
</div>
