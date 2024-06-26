
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title h4">{{$title}}</h5>
        </div>
        <div class="modal-body">
            <form action="{{$action}}" method="POST" enctype="multipart/form-data" id="form-importuser">
                @csrf
                <div class="form-group">
                    <label for="formGroupExampleInput2">Import Data with file</label>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="customFile" name="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    @if ($title == "Import Dosen")
                        <a href="{{route('dosen.download-tamplate')}}" style="color: rgb(0, 168, 0); margin-top: 10px" >click here to download tamplate</a>
                    @else
                        <a href="{{route('dosen.download-tamplate')}}" style="color: rgb(0, 168, 0); margin-top: 10px" >click here to download tamplate</a>
                    @endif
                </div>
                <button class="btn btn-primary" type="submit" id="savefile">Upload</button>
            </form>
        </div>
    </div>
</div>

