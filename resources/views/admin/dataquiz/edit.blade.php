<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Quiz</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-start">
        <form action="/updatequiz/{{$item->id}}" method="post">
        @csrf
            @method('PUT')
            <label for="example-text-input" class="form-control-label">Nama Quiz</label>
            <div class="input-group mb-3">


                <input type="text" class="form-control " value="{{$item->quiz}}"  name="quiz" placeholder="Enter Nama Quiz" aria-label="Example text with button addon" aria-describedby="button-addon1">

            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Date</label>
                    <div class="input-group mb-3">


                        <input type="date" class="form-control " value="{{$item->date}}" name="date" placeholder="Enter Nama Quiz" aria-label="Example text with button addon" aria-describedby="button-addon1">

                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Time</label>
                    <div class="input-group mb-3">


                        <input type="time" class="form-control " value="{{$item->time}}"  name="time" placeholder="Enter Nama Quiz" aria-label="Example text with button addon" aria-describedby="button-addon1">

                    </div>
                  </div>
                </div>

              </div>
            <label for="example-text-input" class="form-control-label">Deskripsi</label>
            <div class="input-group mb-3">


                <textarea class="form-control" name="deskripsi"  id="" cols="30" rows="10">{{$item->deskripsi}}</textarea>

            </div>
            <label for="example-text-input" class="form-control-label">Jenis Quiz</label>
            <div class="input-group mb-3">


                <input type="text" class="form-control "  value="{{$item->jenisquiz}}" name="jenisquiz" placeholder="Enter Jenis Quiz" aria-label="Example text with button addon" aria-describedby="button-addon1">

            </div>
            <label for="example-text-input" class="form-control-label">Info</label>
            <div class="input-group mb-3">


                <textarea class="form-control" name="info" id="" cols="30" rows="10">{{$item->info}}</textarea>

            </div>
            <label for="example-text-input" class="form-control-label">Info 2</label>
            <div class="input-group mb-3">


                <textarea class="form-control" name="info2" id="" cols="30" rows="10">{{$item->info2}}</textarea>

            </div>
            <label for="example-text-input" class="form-control-label">Info 3</label>
            <div class="input-group mb-3">


                <textarea class="form-control" name="info3" id="" cols="30" rows="10">{{$item->info3}}</textarea>

            </div>

        <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn bg-gradient-primary">Submit</button>
          </div>
        </form>
      </div>

    </div>
  </div>
