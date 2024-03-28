
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">{{$title}}</h5>
            </div>
            <div class="modal-body">
                <form id="{{$idform}}">
                    @csrf
                    <input type="text" value="{{isset($detail) ? $detail->id : ''}}" name="id" hidden>
                    <div class="form-group">
                        <label for="inputAddress">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama" name="name" value="{{isset($detail) ? $detail->name : ''}}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{isset($detail) ? $detail->email : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Password" name="password" value="{{isset($detail) ? $detail->password : ''}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Alamat</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="rumah, apartement atau lantai tempat tinggal" name="address" value="{{isset($detail) ? $detail->email : ''}}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNumber">No. HP</label>
                            <input type="text" class="form-control" id="inputNumber" name="phone" value="{{isset($detail) ? $detail->phone : ''}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Jenis Kelamin</label>
                                <select id="inputGender" class="form-control" name="gender">
                                    <option value="Pria" {{ isset($detail->gender) ? ($detail->gender == 'Pria' ? 'selected' : '') : '' }}>Pria</option>
                                    <option value="Wanita" {{ isset($detail->gender) ? ($detail->gender == 'Wanita' ? 'selected' : '') : '' }}>Wanita</option>
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
                        <input type="text" class="form-control" id="role"  name="role" value="{{isset($detail) ? $detail->role : 'Dosen'}}">
                    </div>
                    <button class="btn btn-default" type="reset" id="cancelbtn">Close</button>
                    <button class="btn btn-primary" id="saveform" >Simpan</button>
                </form>
            </div>
        </div>
    </div>

