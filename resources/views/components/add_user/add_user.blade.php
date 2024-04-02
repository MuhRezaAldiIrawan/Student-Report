
<form id="{{$idform}}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="page-header no-gutters has-tab">
        <ul class="nav nav-tabs" >
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#product-edit-basic">Basic Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#product-edit-option">detail Info</a>
            </li>
        </ul>
    </div>
    <div class="tab-content m-t-15">
        <div class="tab-pane fade show active" id="product-edit-basic" >
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama"  name="nama">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" autocomplete="false" name="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="hp">Nomor HP</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">+62</span>
                                <input type="text" class="form-control" id="hp" placeholder="nomor HP" name="hp">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="role">Role</label>
                        <select class="custom-select" id="role" name="role">
                            <option value="Dosen">Dosen</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-semibold" for="password">Password</label>
                        <input type="password" class="form-control" id="password"  name="password" autocomplete="false" >
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="product-edit-option">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="password">NIDN</label>
                        <input type="text" class="form-control" id="nidn"  name="nidn">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat</label>
                            <input type="alamat" class="form-control" id="alamat" placeholder="alamat" autocomplete="false" name="alamat">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-semibold" for="role">Jenis Kelamin</label>
                            <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="prodi">Prodi</label>
                            <input type="prodi" class="form-control" id="prodi" placeholder="prodi" autocomplete="false" name="prodi">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jurusan">Jurusan</label>
                            <input type="jurusan" class="form-control" id="jurusan" placeholder="jurusan" autocomplete="false" name="jurusan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Avatar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="avatar">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <button class="btn btn-primary" id="saveform">
                        <i class="anticon anticon-save"></i>
                        <span>Save</span>
                    </button>
                </div>
            </div>
        </div>

    </div>

</form>
