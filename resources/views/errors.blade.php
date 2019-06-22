@if ($errors->any())
<div class="notification is-danger" style="margin-top:1em;">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>
@endif