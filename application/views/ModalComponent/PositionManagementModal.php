<div class="modal fade position-modal" id="positionModal" tabindex="-1" role="dialog" aria-labelledby="positionModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Position</h3>
                <button type="button" class="close" id="closeModalPost" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                    <div class="mb-3">
                                        <div class="form-group mt-3">
                                            <label for="positionName">Position</label>
                                            <input type="text" class="form-control PositionName" name="positionName" id="positionName" placeholder="Input position name" required>
                                            <small><?=form_error('positionName');?></small></input>
                                        </div>
                                        <div class="container-edit-btn">
                                            <button type="submit" class="btn btn-outline-info float-right positionBtn mt-4" id="positionBtn">Add Position</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>