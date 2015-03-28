@if ($errors->any())
    <div class="buffer"></div>
    <div class="alert-danger alert">
        <ul>
            @foreach($errors->all() as $error)
                <li class="text-danger">
                    <p>{{ $error }}</p>
                </li>
            @endforeach
        </ul>
    </div>
@endif