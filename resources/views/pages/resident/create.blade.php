
@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Penduduk</h1>
    </div>

    <div class="row">
        <div class="col">
            <form action="/resident/" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label for="nik">NIK</label>
                            <input type="text" inputmode="numeric" maxlength="16"
                                name="nik" id="nik"
                                class="form-control @error('nik') is-invalid @enderror"
                                value="{{ old('nik') }}">
                            @error('nik')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" id="name" maxlength="100"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender"
                                class="form-control @error('gender') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" name="birth_date" id="birth_date"
                                class="form-control @error('birth_date') is-invalid @enderror"
                                value="{{ old('birth_date') }}">
                            @error('birth_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="birth_place">Tempat Lahir</label>
                            <input type="text" name="birth_place" id="birth_place" maxlength="100"
                                class="form-control @error('birth_place') is-invalid @enderror"
                                value="{{ old('birth_place') }}">
                            @error('birth_place')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Alamat</label>
                            <textarea name="address" id="address" rows="3"
                                class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                            @error('address')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="religion">Agama</label>
                            <select name="religion" id="religion"
                                class="form-control @error('religion') is-invalid @enderror">
                                <option value="">-- Pilih Agama --</option>
                                <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('religion') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('religion') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('religion') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('religion') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                            @error('religion')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="marital_status">Status Perkawinan</label>
                            <select name="marital_status" id="marital_status"
                                class="form-control @error('marital_status') is-invalid @enderror">
                                <option value="">-- Pilih Status Perkawinan --</option>
                                <option value="single" {{ old('marital_status') == 'single' ? 'selected' : '' }}>Belum Kawin</option>
                                <option value="married" {{ old('marital_status') == 'married' ? 'selected' : '' }}>Kawin</option>
                                <option value="divorced" {{ old('marital_status') == 'divorced' ? 'selected' : '' }}>Cerai Hidup</option>
                                <option value="widowed" {{ old('marital_status') == 'widowed' ? 'selected' : '' }}>Cerai Mati</option>
                            </select>
                            @error('marital_status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="occupation">Pekerjaan</label>
                            <input type="text" name="occupation" id="occupation" maxlength="100"
                                class="form-control @error('occupation') is-invalid @enderror"
                                value="{{ old('occupation') }}">
                            @error('occupation')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">Nomor Telepon</label>
                            <input type="tel" inputmode="numeric" name="phone" id="phone" maxlength="15"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="status">Status Penduduk</label>
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="moved" {{ old('status') == 'moved' ? 'selected' : '' }}>Pindah</option>
                                <option value="deceased" {{ old('status') == 'deceased' ? 'selected' : '' }}>Meninggal</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-end" style="gap: 10px">
                            <a href="{{ url('/resident') }}" class="btn btn-outline-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
