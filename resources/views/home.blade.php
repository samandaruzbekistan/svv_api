@extends('header')

@section('section')

    @if((session()->has('backData')))
        @switch(session('backData'))
            @case(1)
                 <div class="container-fluid pt-4 px-4" id="data">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Muvaffaqiyatli!</strong> Ma'lumot kiritildi.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                 </div>
                @break

            @case(2)
                Second case...
                @break

            @default
                Default case...
        @endswitch
    @endif

    <!-- Blank Start -->
    <div class="container-fluid pt-4 px-4" id="data">
        <div class="accordion" id="accordionExample">
            @foreach($data as $id => $region)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $id }}" aria-expanded="true" aria-controls="collapseOne">
                            {{ $region->name_uz }}
                        </button>
                    </h2>
                    <div id="collapseOne{{ $id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Tuman ID</th>
                                    <th scope="col">Nomi</th>
                                    <th scope="col">Poliklikalar soni</th>
                                    <th scope="col">Qo'shish</th>
                                    <th scope="col">Ko'rish</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($region->districts as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name_uz }}</td>
                                    <td>{{ $item->polyclinics_count }}</td>
                                    <td><button id="{{ $item->id }}" class="btn btn-square btn-warning m-2 add-btn"><i class="bi bi-plus-circle"></i></button></td>
                                    <td><a href="{{ route('polyclinics', ['district_id' => $item->id]) }}" class="btn btn-square btn-primary m-2"><i class="bi bi-eye"></i></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Blank End -->

    <div class="container-fluid pt-4 px-4" id="forma" style="display: none">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Yangi tashkilot qo'shish</h6>
            <form action="{{ route('add') }}" method="post">
                @csrf
                <input type="hidden" id="district_id" name="district_id" value="0">
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
            let districtID = $(this).attr('id');
            $("#district_id").val(districtID);
            $('#data').hide();
            $('#forma').show();
        });


        $(document).on('click', '#cancel', function() {
            $('#data').show();
            $('#forma').hide();
        });


    </script>
@endsection
