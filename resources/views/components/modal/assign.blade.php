<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Dosen Pembimbing Proposal</h5>
            <button type="button" class="close" data-dismiss="modal">
                <i class="anticon anticon-close"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="formassign" method="POST">
                @csrf
                <input type="text" name="id" id="id" value="{{$data->id}}" hidden>
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="pbb1">Dosen Pembimbing 1</label>
                        <select id="pbb1" name="pbb1" class="form-control select2"
                            data-placeholder="Pilih Dosen PBB 1" data-dropdown-css-class="select2-purple">
                            <option value="">Select</option>
                            @foreach ($dataDosen as $d)
                                <option value="{{ $d->id }}">{{ $d->nama }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-6">
                        <label for="pbb2">Dosen Pembimbing 2</label>
                        <select id="pbb2" name="pbb2" class="form-control select2"
                            data-placeholder="Pilih Dosen PBB 2" data-dropdown-css-class="select2-purple">
                            <option value="">Select</option>
                            @foreach ($dataDosen as $d)
                                <option value="{{ $d->id }}">{{ $d->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer mt-3">
                    <button class="btn btn-default" type="reset" id="cancelbtn">Close</button>
                    <button class="btn btn-primary" id="saveform">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%'
        });
    });
</script>
