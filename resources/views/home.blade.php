@extends('header')

@section('section')

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
                                    <td><button type="button" class="btn btn-square btn-primary m-2"><i class="bi bi-eye"></i></button></td>
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
            <h6 class="mb-4">Basic Form</h6>
            <form>
                @csrf
                <input type="hidden" id="district_id" name="district_id" value="0">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomi <sup class="text-danger">*</sup></label>
                    <input type="text" name="name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmai3l21" class="form-label">Ish vaqti <sup class="text-danger">*</sup></label>
                    <input type="text" name="work_time" required class="form-control" id="exampleInputEmai3l21" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail221" class="form-label">Manzil <sup class="text-danger">*</sup></label>
                    <input type="text" name="address" required class="form-control" id="exampleInputEmail221" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmailw21" class="form-label">Mo'ljal</label>
                    <input type="text" name="target" class="form-control" id="exampleInputEmailw21" aria-describedby="emailHelp">
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
                    <label for="aawaa" class="form-label">Bo'limlar <sup class="text-danger">*</sup></label>
                    <input type="text" required name="departments" class="form-control" id="aawaa">
                </div>
                <div class="input-group mb-3">
                    <input type="number" required class="form-control" name="longitude" placeholder="Uzunlik (longitude)" aria-label="Username">
                    <span class="input-group-text">X</span>
                    <input type="number" required class="form-control" name="latitude" placeholder="Kenglik (latitude)" aria-label="Server">
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
