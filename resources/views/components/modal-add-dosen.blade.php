<div class="modal fade bd-example-modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">Tambah Dosen</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">


                <form action="{{route('dosen.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputAddress">Nama</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Nama" name="name">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Alamat</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="rumah, apartement atau lantai tempat tinggal" name="address">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNumber">No. HP</label>
                            <input type="text" class="form-control" id="inputNumber" name="phone">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Jenis Kelamin</label>
                                <select id="inputGender" class="form-control" name="gender">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
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
                        <input type="text" class="form-control" id="role"  name="role" value="Dosen">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>


            </div>
        </div>
    </div>
</div>
