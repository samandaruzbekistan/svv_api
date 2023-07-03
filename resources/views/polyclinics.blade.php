@extends('header')

@section('section')

    @if((session()->has('backData')))
        @switch(session('backData'))
            @case(1)
                <div class="container-fluid pt-4 px-4" >
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Muvaffaqiyatli!</strong> Ma'lumot qo'shildi.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @break

            @case(2)
                <div class="container-fluid pt-4 px-4" >
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Muvaffaqiyatli!</strong> Ma'lumot o'childi.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @break
            @case(3)
                <div class="container-fluid pt-4 px-4" >
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Muvaffaqiyatli!</strong> Ma'lumot o'zgartirildi.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @break

            @default
                Default case...
        @endswitch
    @endif

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4" id="data">
        <div class="bg-light rounded h-100 p-4">
            <div class="row justify-content-between">
                <div class="col-md-4"><h6 class="mb-4">{{ $district->name_uz }} | {{ $district->polyclinics_count }} ta</h6></div>
                <div class="col-md-2"><button type="button" class="btn btn-sm add-btn btn-primary">Yangi qo'shish +</button></div>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nomi</th>
                    <th scope="col">Manzil</th>
                    <th scope="col">Mo'ljal</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Ish vaqti</th>
                    <th scope="col">Bo'limlar</th>
                    <th scope="col">Kenglik</th>
                    <th scope="col">Uzunlik</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($polyclinics as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name_uz }} / {{ $item->name_ru }} / {{ $item->name_en }}</td>
                        <td>{{ $item->address_uz }} / {{ $item->address_ru }} / {{ $item->address_en }}</td>
                        <td>{{ $item->target_uz }} / {{ $item->target_ru }} / {{ $item->target_en }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->work_time }}</td>
                        <td>{{ $item->departments_uz }} / {{ $item->departments_ru }} / {{ $item->departments_en }}</td>
                        <td>{{ $item->latitude }}</td>
                        <td>{{ $item->longitude }}</td>
                        <td><a href="{{ route('edit', ['polyclinic_id' => $item->id]) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a></td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['delete', $item->id]]) !!}
                                <input type="hidden" name="district_id" value="{{ $district->id }}">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(count($polyclinics) == 0)
                <h5 class="text-danger">Poliklinikalar mavjud emas!</h5>
            @endif
        </div>
    </div>
    <!-- Blank End -->


    <div class="container-fluid pt-4 px-4" id="forma" style="display: none">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Yangi tashkilot qo'shish</h6>
            <form action="{{ route('add') }}" method="post">
                @csrf
                <input type="hidden" id="district_id" name="district_id" value="{{ $district->id }}">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomi uz<sup class="text-danger">*</sup></label>
                    <input type="text" name="name_uz" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomi ru<sup class="text-danger">*</sup></label>
                    <input type="text" name="name_ru" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomi en<sup class="text-danger">*</sup></label>
                    <input type="text" name="name_en" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmai3l21" class="form-label">Ish vaqti <sup class="text-danger">*</sup></label>
                    <input type="text" name="work_time" required class="form-control" id="exampleInputEmai3l21" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail221" class="form-label">Manzil uz<sup class="text-danger">*</sup></label>
                    <input type="text" name="address_uz" required class="form-control" id="exampleInputEmail221" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail221" class="form-label">Manzil ru<sup class="text-danger">*</sup></label>
                    <input type="text" name="address_ru" required class="form-control" id="exampleInputEmail221" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail221" class="form-label">Manzil en<sup class="text-danger">*</sup></label>
                    <input type="text" name="address_en" required class="form-control" id="exampleInputEmail221" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmailw21" class="form-label">Mo'ljal uz</label>
                    <input type="text" name="target_uz" class="form-control" id="exampleInputEmailw21" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmailw21" class="form-label">Mo'ljal ru</label>
                    <input type="text" name="target_ru" class="form-control" id="exampleInputEmailw21" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmailw21" class="form-label">Mo'ljal en</label>
                    <input type="text" name="target_en" class="form-control" id="exampleInputEmailw21" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefon <sup class="text-danger">*</sup></label>
                    <input type="text" name="phone" required class="form-control" id="phone">
                </div>
                <div class="mb-3">
                    <label for="aaaa" class="form-label">Axoli soni <sup class="text-danger">*</sup></label>
                    <input type="number" name="population" required class="form-control" id="aaaa">
                </div>
                <div class="mb-3">
                    <label for="aawaa" class="form-label">Bo'limlar uz<sup class="text-danger">*</sup></label>
                    <input type="text" required name="departments_uz" class="form-control" id="aawaa">
                </div>
                <div class="mb-3">
                    <label for="aawaa" class="form-label">Bo'limlar ru<sup class="text-danger">*</sup></label>
                    <input type="text" required name="departments_ru" class="form-control" id="aawaa">
                </div>
                <div class="mb-3">
                    <label for="aawaa" class="form-label">Bo'limlar en<sup class="text-danger">*</sup></label>
                    <input type="text" required name="departments_en" class="form-control" id="aawaa">
                </div>
                <div class="input-group mb-3">
                    <input type="text" required class="form-control" name="latitude" placeholder="Uzunlik (latitude)" aria-label="Username">
                    <span class="input-group-text">X</span>
                    <input type="text" required class="form-control" name="longitude" placeholder="Kenglik (longitude)" aria-label="Server">
                </div>
                <button type="submit" class="btn btn-danger" id="cancel"><i class="bi bi-x"></i> Bekor qilish</button>
                <button type="submit" class="btn btn-primary"><i class="bi bi-cloud-plus-fill"></i> Saqlash</button>
            </form>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).on('click', '.add-btn', function() {
            $('#data').hide();
            $('#forma').show();
        });


        $(document).on('click', '#cancel', function() {
            $('#data').show();
            $('#forma').hide();
        });


    </script>
@endsection
