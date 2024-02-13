<div>
    @component('mail::message')
        <h2> Activation Code</h2>
        <h1>{{ $data }}</h1>
        thanks, <br>
    @endcomponent
    {{ config('app.name') }}    
</div>
