@extends('header')

@section('section')

    <div class="container-fluid pt-4 px-4" >
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Yangi tashkilot qo'shish</h6>
            <form action="{{ route('update') }}" method="post">
                @csrf
                <input type="hidden" id="district_id" name="id" value="{{ $polyclinic->id }}">
                <input type="hidden" id="a333" name="district_id" value="{{ $polyclinic->district_id }}">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomi uz<sup class="text-danger">*</sup></label>
                    <input type="text" name="name_uz" required class="form-control" id="exampleInputEmail1" value="{{ $polyclinic->name_uz }}" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomi ru<sup class="text-danger">*</sup></label>
                    <input type="text" name="name_ru" required class="form-control" value="{{ $polyclinic->name_ru }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomi en<sup class="text-danger">*</sup></label>
                    <input type="text" name="name_en" required class="form-control" value="{{ $polyclinic->name_en }}" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmai3l21" class="form-label">Ish vaqti <sup class="text-danger">*</sup></label>
                    <input type="text" name="work_time" required class="form-control" value="{{ $polyclinic->work_time }}" id="exampleInputEmai3l21" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail221" class="form-label">Manzil uz<sup class="text-danger">*</sup></label>
                    <input type="text" name="address_uz" required class="form-control" value="{{ $polyclinic->address_uz }}" id="exampleInputEmail221" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail221" class="form-label">Manzil ru<sup class="text-danger">*</sup></label>
                    <input type="text" name="address_ru" required class="form-control" value="{{ $polyclinic->address_ru }}" id="exampleInputEmail221" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail221" class="form-label">Manzil en<sup class="text-danger">*</sup></label>
                    <input type="text" name="address_en" required class="form-control" value="{{ $polyclinic->address_en }}" id="exampleInputEmail221" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmailw21" class="form-label">Mo'ljal uz</label>
                    <input type="text" name="target_uz" class="form-control" value="{{ $polyclinic->target_uz }}" id="exampleInputEmailw21" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmailw21" class="form-label">Mo'ljal ru</label>
                    <input type="text" name="target_ru" class="form-control" value="{{ $polyclinic->target_ru }}" id="exampleInputEmailw21" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmailw21" class="form-label">Mo'ljal en</label>
                    <input type="text" name="target_en" class="form-control" value="{{ $polyclinic->target_en }}" id="exampleInputEmailw21" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefon <sup class="text-danger">*</sup></label>
                    <input type="text" name="phone" required class="form-control" value="{{ $polyclinic->phone }}" id="phone">
                </div>
                <div class="mb-3">
                    <label for="aaaa" class="form-label">Axoli soni <sup class="text-danger">*</sup></label>
                    <input type="number" name="population" required value="{{ $polyclinic->population }}" class="form-control" id="aaaa">
                </div>
                <div class="mb-3">
                    <label for="aawaa" class="form-label">Bo'limlar uz<sup class="text-danger">*</sup></label>
                    <input type="text" required name="departments_uz" value="{{ $polyclinic->departments_uz }}" class="form-control" id="aawaa">
                </div>
                <div class="mb-3">
                    <label for="aawaa" class="form-label">Bo'limlar ru<sup class="text-danger">*</sup></label>
                    <input type="text" required name="departments_ru" value="{{ $polyclinic->departments_ru }}" class="form-control" id="aawaa">
                </div>
                <div class="mb-3">
                    <label for="aawaa" class="form-label">Bo'limlar en<sup class="text-danger">*</sup></label>
                    <input type="text" required name="departments_en" value="{{ $polyclinic->departments_en }}" class="form-control" id="aawaa">
                </div>
                <div class="input-group mb-3">
                    <input type="text" required class="form-control" name="latitude" value="{{ $polyclinic->latitude }}" placeholder="Uzunlik (latitude)" aria-label="Username">
                    <span class="input-group-text">X</span>
                    <input type="text" required class="form-control" name="longitude" value="{{ $polyclinic->longitude }}" placeholder="Kenglik (longitude)" aria-label="Server">
                </div>
                <button type="submit" class="btn btn-danger" id="cancel"><i class="bi bi-x"></i> Bekor qilish</button>
                <button type="submit" class="btn btn-primary"><i class="bi bi-cloud-plus-fill"></i> Saqlash</button>
            </form>
        </div>
    </div>




@endsection


