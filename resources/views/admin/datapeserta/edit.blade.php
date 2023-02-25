<!-- Modal -->

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peserta</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-start">
        <form action="/updatepeserta/{{$item->id}}" method="post">
        @csrf
        @method('PUT')
        <label for="example-text-input" class="form-control-label ">Username</label>
            <div class="input-group mb-3">

                <span class="btn bg-gradient-primary mb-0 "  id="button-addon1"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#fff" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></span>
                <input type="text" class="form-control " value="{{$item->name}}" name="name" placeholder="Enter Username" aria-label="Example text with button addon" aria-describedby="button-addon1">

            </div>

            <label for="example-text-input" class="form-control-label">Email</label>
            <div class="input-group mb-3">

                <span class="btn bg-gradient-primary mb-0 "  id="button-addon1"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#fff" d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg></span>
                <input  class="form-control " type="email" value="{{$item->email}}" name="email" placeholder="Enter Email" aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>


            <label for="example-text-input" class="form-control-label">Password</label>
            <div class="input-group mb-3">

                <span class="btn bg-gradient-primary mb-0"  id="button-addon1"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#fff" d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg></span>
                <input class="form-control" type="password" name="password" value="{{$item->password}}" placeholder="Enter Password" aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Submit</button>
              </div>
        </form>
      </div>

    </div>
  </div>
</div>
