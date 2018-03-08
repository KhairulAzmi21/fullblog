<!-- jika terdapat key session bernama suscess, paparkan alert
<!-- method has untuk dapatkan key session -->
@if (session()->has('success') )
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <!-- method get untuk dapatkan value session -->
      {{ session()->get('success') }}
    </div>
@endif

<!-- jika ada sebarang error selepas validate request. -->
<!--  code dibawah akan display semua error tersebut -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
