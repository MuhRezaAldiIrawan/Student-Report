
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">{{$title}}</h5>
            </div>
            <div class="modal-body">
                <form id="editform" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="text" value="{{isset($detail) ? $detail->id : ''}}" name="id" hidden>
                    <div class="form-group">
                        <label for="inputAddress">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{{isset($detail) ? $detail->nama : ''}}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{isset($detail) ? $detail->email : ''}}">
                        </div>
                        @if (Str::contains($title, 'Mahasiswa'))
                        <div class="form-group col-md-6">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim"  name="nim" value="{{isset($detail) ? $detail->mahasiswa->nim : ''}}">
                        </div>
                        @elseif (Str::contains($title, 'Dosen'))
                        <div class="form-group col-md-6">
                            <label for="nim">NIDN</label>
                            <input type="text" class="form-control" id="nidn"  name="nidn" value="{{isset($detail) ? $detail->dosen->nidn : ''}}">
                        </div>
                        @endif
                    </div>
                    @if (Str::contains($title, 'Mahasiswa'))
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" id="kelas" placeholder="kelas" name="kelas" value="{{isset($detail) ? $detail->mahasiswa->kelas : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="angkatan">Angkatan</label>
                            <input type="text" class="form-control" id="angkatan"  name="angkatan" value="{{isset($detail) ? $detail->mahasiswa->angkatan : ''}}">
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="inputAddress2">Alamat</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="rumah, apartement atau lantai tempat tinggal" name="alamat" value="{{isset($detail->dosen) ? $detail->dosen->alamat : (isset($detail->mahasiswa) ? $detail->mahasiswa->alamat : '')}}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputState">Jenis Kelamin</label>
                                <select id="inputGender" class="form-control" name="jenis_kelamin">
                                    <option value="Pria" {{ isset($detail->dosen) ? ($detail->dosen->jenis_kelamin == 'Pria' ? 'selected' : '') : (isset($detail->mahasiswa) ? ($detail->mahasiswa->jenis_kelamin == 'Pria' ? 'selected' : '') : '') }}>Pria</option>
                                    <option value="Wanita" {{ isset($detail->dosen) ? ($detail->dosen->jenis_kelamin == 'Wanita' ? 'selected' : '') : (isset($detail->mahasiswa) ? ($detail->mahasiswa->jenis_kelamin == 'Wanita' ? 'selected' : '') : '') }}>Wanita</option>
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Avatar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="avatar">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <label for="role">Role</label>
                        @if (Str::contains($title, 'Mahasiswa'))
                            <input type="text" class="form-control" id="role"  name="role" value="{{isset($detail) ? $detail->role : 'Mahasiswa'}}">
                        @elseif (Str::contains($title, 'Dosen'))
                            <input type="text" class="form-control" id="role"  name="role" value="{{isset($detail) ? $detail->role : 'Dosen'}}">
                        @elseif (Str::contains($title, 'Admin'))
                            <input type="text" class="form-control" id="role"  name="role" value="{{isset($detail) ? $detail->role : 'Admin'}}">
                        @endif
                    </div>
                    <button class="btn btn-default" type="reset" id="cancelbtn">Close</button>
                    <button class="btn btn-primary" id="saveform" >Simpan</button>
                </form>
            </div>
        </div>
    </div>

