@if(count($errors)>0)
    <div class="col-8 mx-auto alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(isset($success) && count($success)>0)
    <div class="col-8 mx-auto alert alert-success">
        <p>{{ $success }}</p>
    </div>
@endif