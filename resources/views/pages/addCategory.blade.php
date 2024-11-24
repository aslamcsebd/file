<div class="modal fade" id="addCategory" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header p-2">
                <h5 class="modal-title text-center" id="exampleModalLabel">Add category</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body p-2">
                <form action="{{ url('add-category') }}" method="post" enctype="multipart/form-data" class="needs-validation">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="name">Name*</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" required />
                        </div>
                    </div>
                    <div class="modal-footer p-0 justify-content-between border-top-0">
                        <button class="btn btn-sm btn-danger px-4" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-sm btn-success px-4">Save</button>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>
