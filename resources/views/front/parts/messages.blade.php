<div class="container">
    <div class="col-md-12">
        @if(Session::has('success'))
            <div class="alert alert-success">
                <p><strong>{{ Session::get('success') }}</strong></p>
            </div>
        @endif
    </div>
</div>