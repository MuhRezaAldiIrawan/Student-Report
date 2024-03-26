
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">Edit Dosen</h5>
            </div>
            <div class="modal-body">
                <form id="editform">
                    @csrf
                    <div class="form-group">
                        <label for="inputAddress">Nama</label>
                        <input type="text" class="form-control" id="dosenNama" placeholder="Nama" detailName="name" value="{{$detail->name}}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{$detail->email}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Password" name="password" value="{{$detail->password}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Alamat</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="rumah, apartement atau lantai tempat tinggal" name="address" value="{{$detail->address}}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNumber">No. HP</label>
                            <input type="text" class="form-control" id="inputNumber" name="phone" value="{{$detail->phone}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Jenis Kelamin</label>
                                <select id="inputGender" class="form-control" name="gender">
                                    <option value="Pria" {{ $detail->gender !== 'Pria' ?: 'selected' }}>Pria</option>
                                    <option value="Wanita" {{ $detail->gender !== 'Wanita' ?: 'selected' }}>Wanita</option>
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
                    <button class="btn btn-default" type="reset" id="cancelbtn">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveform" >Simpan</button>
                </form>
            </div>
        </div>
    </div>

