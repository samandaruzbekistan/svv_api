@extends('header')

@section('section')
    @if((session()->has('backData')))
        @switch(session('backData'))
            @case(1)
                <div class="container-fluid pt-4 px-4" id="data">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Muvaffaqiyatli!</strong> Ma'lumot yangilandi.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @break

            @case(4)
                <div class="container-fluid pt-4 px-4" id="data">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Xatolik!</strong> Joriy parol notogri kiritildi.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @break

            @default
                Default case...
        @endswitch
    @endif

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Admin parolni yangilash</h6>
                    <form action="{{ route('admin_update') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Joriy parol</label>
                            <input  required type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Yangi parol</label>
                            <input required type="password" name="new_password" class="form-control" id="exampleInputPassword1">
                        </div>

                        <button type="submit" class="btn btn-primary">Yangilash</button>
                    </form>
                </div>
            </div>
    </div>
    <!-- Blank End -->






@endsection



