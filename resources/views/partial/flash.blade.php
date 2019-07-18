@if(isset($_SESSION['fail']))
    <div class="col-sm-12 text-center alert alert-danger" role="alert">
        {{ $_SESSION['fail'] }}
        @php
            unset($_SESSION['fail']);
        @endphp
    </div>
@elseif(isset($_SESSION['success']))
    <div class="col-sm-12 text-center alert alert-success" role="alert">
        {{ $_SESSION['success'] }}
        @php
            unset($_SESSION['success']);
        @endphp
    </div>
@endif